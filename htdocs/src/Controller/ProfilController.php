<?php

namespace App\Controller;

use App\Entity\Pari;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfilController extends ClassementController
{
     /**
     * @Route("/profil", name="profil")
     */
    public function index(): Response
    {

        $prono = $this->getDoctrine()->getRepository(Pari::class)->findBy(['idUser' => $this->getUser()->getId()]);


        if ($prono==false){
            throw $this->createNotFoundException('Aucun pari');
        }

        $json = file_get_contents('../euro.json');
        $match = json_decode($json,true);

        $points = $this->PointJoueur($prono,$match);
        $classementJoueur = $this->rangJoueur($this->ClassementDesJoueurs());

        return $this->render('profil/index.html.twig', ['match' => $match , 'prono' => $prono, 'nbpoints' => $points,'classement'=>$classementJoueur]);
    }

    public function PointJoueur($prono, $match):int
    {
        $point = 0;
        foreach ($prono as $pronos) {
            if (isset($match[$pronos->getIdMatch()]["scores"])) {

                if($match[$pronos->getIdMatch()]["scores"]["domicile"] == $pronos->getScoreD()  and $match[$pronos->getIdMatch()]["scores"]["exterieur"] == $pronos->getScoreE()) {
                    $point =$point + 3;
                }
                elseif (($match[$pronos->getIdMatch()]["scores"]["domicile"] > $match[$pronos->getIdMatch()]["scores"]["exterieur"] and $pronos->getScoreD() > $pronos->getScoreE()) or ($match[$pronos->getIdMatch()]["scores"]["domicile"] < $match[$pronos->getIdMatch()]["scores"]["exterieur"] and $pronos->getScoreD() < $pronos->getScoreE())) {
                    $point = $point + 1;
                }
                elseif(($match[$pronos->getIdMatch()]["scores"]["domicile"] > $match[$pronos->getIdMatch()]["scores"]["exterieur"] and $pronos->getScoreD() < $pronos->getScoreE()) or ($match[$pronos->getIdMatch()]["scores"]["domicile"] < $match[$pronos->getIdMatch()]["scores"]["exterieur"] and $pronos->getScoreD() > $pronos->getScoreE())) {
                    $point =$point + 0;
                }
            }
        }
        return $point;
    }

    public function rangJoueur($monClassement):int{
        $position = 0;
        $i = 0;
        do{
            if($monClassement[$i]["user"]->getId() == $this->getUser()->getId()){
                $position = $i + 1;
            }
            $i++;
        }while($i != sizeof($monClassement));
        return $position;
    }

}
