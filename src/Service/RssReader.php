<?php


namespace App\Service;

use App\Entity\RssFeed;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RssReader
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct(EntityManagerInterface $em, ContainerInterface $container, HttpClientInterface $httpClient)
    {
        $this->em = $em;
        $this->container = $container;
        $this->httpClient = $httpClient;
    }

    public function processRssFeed(): void
    {

        try {
            $response = $this->httpClient->request('GET', $this->container->getParameter('rss_url'));
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return;
        }

        $updatedAt = $this->getUpdatedAt($response->getContent());
        if (!$this->checkLastUpdateTime($updatedAt)) {
            $stripedResponse = preg_replace('/(?=[^ ]*[^A-Za-z \'-])([^ ]*)(?:\\s+|$)/', '', strip_tags($response->getContent()));
            $formatedRssResponse = $this->formatRssResponse($stripedResponse);
            $this->saveRssFeed($formatedRssResponse, $updatedAt);
        }
    }

    /**
     * @param $updatedAt
     * @return bool
     */
    private function checkLastUpdateTime($updatedAt): bool
    {
        $repository = $this->em->getRepository(RssFeed::class);
        $previousUpdatedAt = $repository->findOneBy(['updated_at' => $updatedAt]);
        if ((bool)$previousUpdatedAt) {
            return (bool)$updatedAt < $previousUpdatedAt;
        }
        return false;

    }

    /**
     * @param $response
     * @return \DateTime
     * @throws \Exception
     */
    private function getUpdatedAt($response): \DateTime
    {
        $crawler = new Crawler($response);
        $updatedAt = $crawler->filter('updated')->first()->text();
        $date = new \DateTime();
        return $date->setTimestamp(strtotime($updatedAt));
    }

    /**
     * @param $response
     * @return array
     */
    private function formatRssResponse($response): array
    {
        $lowerCasedResponse = strtolower($response);
        return array_count_values(str_word_count($lowerCasedResponse, 1));
    }

    /**
     * @param $rssFeed
     * @param $updatedAt
     */
    private function saveRssFeed($rssFeed, $updatedAt): void
    {
        $this->deleteOldRssFeed();
        $entity = new RssFeed();
        foreach ($rssFeed as $word => $count) {
            $entity->setWord($word);
            $entity->setCount($count);
            $entity->setUpdatedAt($updatedAt);
            $this->em->persist($entity);
            $this->em->flush();
            $this->em->clear();
        }
    }

    private function deleteOldRssFeed(): void
    {
        $connection = $this->em->getConnection();
        $platform = $connection->getDatabasePlatform();
        $connection->executeUpdate($platform->getTruncateTableSQL('rss_feed', true));
    }
}