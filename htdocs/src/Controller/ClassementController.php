<?php

namespace App\Controller;

use App\Entity\Pari;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ClassementController extends AbstractController
{
    /**
     * @Route("/classement", name="classement")
     */
    public function index(): Response
    {
        return $this->render('classement/index.html.twig', [
            'array' => $this->ClassementDesJoueurs(),
        ]);
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

    public function ClassementDesJoueurs():array{
        $json = file_get_contents('../euro.json');
        $match = json_decode($json,true);
        $array = array();
        $Dusers = $this->getDoctrine()->getRepository(User::class)->findAll();

        foreach ($Dusers as $user){
            $PronosJ = $this->getDoctrine()->getRepository(Pari::class)->findBy(['idUser' =>$user->getId()]);
            $Nbpoint = $this->PointJoueur($PronosJ, $match);
            array_push($array,array('score'=>$Nbpoint,"user"=>$user));
        }
        rsort($array);

        return $array;
    }
}
