<?php

namespace App\Controller;

use App\Entity\RssFeed;
use App\Service\MostFrequentWordReader;
use App\Service\RssReader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @var RssReader
     */
    private $rssReader;

    /**
     * @var MostFrequentWordReader
     */
    private $mostFrequentWordReader;
    /**
     * HomeController constructor.
     */
    public function __construct(RssReader $rssReader, MostFrequentWordReader $mostFrequentWordReader)
    {
        $this->rssReader = $rssReader;
        $this->mostFrequentWordReader = $mostFrequentWordReader;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(RssFeed::class);
        $this->rssReader->processRssFeed();
        $commonWords = $this->mostFrequentWordReader->getCommonWords();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'most_frequent_words' =>  $repository->getMostFrequentWords($commonWords),
            'rss_feed' => $repository->getRssFeed()
        ]);
    }
}
