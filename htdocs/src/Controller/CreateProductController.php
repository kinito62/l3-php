<?php

namespace App\Controller;

use App\Entity\Products;
use Cassandra\Type\UserType;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use App\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CreateProductType;


class CreateProductController extends AbstractController
{
    /**
     * @Route ("/catalog/createproduct", name="create_product")
     */
    public function index(): Response
    {

        $form = $this->createForm(UserType::class);

        return $this->render('create_product.html.twig', [
            'controller_name' => 'CreateProductController',
        ]);
    }

}