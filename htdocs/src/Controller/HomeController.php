<?php

namespace App\Controller;

use PHPUnit\Util\Test;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route ("/", name="home")
     */
    public function view(TestRepository $testRepository) : Response
    {
        $en = $this->getDoctrine()->getManager();

        $test = new Test();
        $test->setName('Tapis');
        $test->setPrice('64');

        $en->persist($test);
        $en->flush();

        $productRepository = $this->getDoctrine()->getRepository(Test::class);
        $tests = $productRepository->findBy(['name' =>'Tapis']);
        var_dump(tests);
        die;

        return $this->render("home.html.twig");

    }

}