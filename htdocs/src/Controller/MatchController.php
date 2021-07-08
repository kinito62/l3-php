<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchController extends AbstractController
{
    /**
     * @Route("/match", name="match")
     */
    public function index(): Response
    {
        $json = file_get_contents('../euro.json');
        $match = json_decode($json,true);
        return $this->render('match/index.html.twig', ['match' => $match]);
    }
}