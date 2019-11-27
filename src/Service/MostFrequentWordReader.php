<?php


namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MostFrequentWordReader
{
    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * @var HttpClient
     */
    private $httpClient;

    public function __construct(ContainerInterface $container, HttpClientInterface $httpClient)
    {
        $this->container = $container;
        $this->httpClient = $httpClient;

    }

    public function getCommonWords(): ?array
    {
        try {
            $response = $this->httpClient->request('GET', $this->container->getParameter('wiki_url'));
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return null;
        }

        return $this->parseResponse($response->getContent());
    }

    /**
     * @param $response
     * @return array
     */
    public function parseResponse($response): array
    {
        $crawler = new Crawler($response);

        $commonWordTable = $crawler->filter('a[class=extiw]')->each(function ($word) {
            return $word->text();
        });

        return $this->getTopWords($commonWordTable);
    }

    /**
     * @param $wordList
     * @return array
     */
    public function getTopWords($wordList): array
    {
        $formatedCommonWords = [];
        foreach ($wordList as $key => $words) {
            if ($key > 49) {
                break;
            }
            $formatedCommonWords[] = $words;
        }
        return $formatedCommonWords;
    }
}