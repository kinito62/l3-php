<?php

namespace App\Controller;

use App\Entity\Pari;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class PariController extends AbstractController
{
    /**
     * @Route("/pari", name="pari",methods={"POST"})
     * @param Request $request
     * return Response
     */
    public function index(Request $request, UserInterface $user): Response
    {

        $ScoreD = $request->request->get("ScoreDomicile");
        $ScoreE = $request->request->get("ScoreExterieur");
        $userId = $user->getId();
        $matchid = $request->request->get("matchId");

        $entityManager = $this->getDoctrine()->getManager();

        $pari = new Pari();
        $pari->setScoreD($ScoreD);
        $pari->setScoreE($ScoreE);
        $pari->setIdUser($userId);
        $pari->setIdMatch($matchid);

        $entityManager->persist($pari);
        $entityManager->flush();

        return $this->redirectToRoute("profil");

        //return $this->render('pari/index.html.twig', [
        //    'controller_name' => 'PariController',
        //]);
    }
}
