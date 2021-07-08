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
    public function index(Request $request): Response
    {
        $product = new Products();
        $form = $this->createForm(CreateProductType::class,$product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $product = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('create_product');
        }
        return $this->render('create_product.html.twig', [
            'controller_name' => 'CreateProductController',
            'form' => $form->createView()
        ]);
    }

}