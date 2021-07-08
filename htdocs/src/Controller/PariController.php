<?php

namespace App\Controller;

use App\Entity\Pari;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PariController extends AbstractController
{
    /**
     * @Route("/pari", name="pari")
     */
    public function index(Request $request): Response
    {

        $ScoreD = $request->request->get("form")["score_d"];
        $ScoreE = $request->request->get("form")["score_e"];

        $entityManager = $this->getDoctrine()->getManager();

        $pari = new Pari();
        $pari->setScoreD($ScoreD);
        $pari->setScoreE($ScoreE);
        $entityManager->persist($pari);
        $entityManager->flush();

        return $this->render('pari/index.html.twig', [
            'controller_name' => 'PariController',
        ]);
    }
}
