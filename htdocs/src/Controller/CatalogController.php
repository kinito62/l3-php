<?php

namespace App\Controller;

use App\Entity\Products;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    /**
     * @Route ("/catalog/product", name="catalog")
     */
    public function OneProduct() : Response
    {

        $productRepository = $this->getDoctrine()->getRepository(Products::class);
        $OneProduct = $productRepository->findBy(['Name' =>'eau']);
        //var_dump($tests);

        return $this->render('product.html.twig', [
            'OneProduct' => $OneProduct
        ]);
    }


    /**
     * @Route ("/catalog", name="Catalog")
     */
    public function Products() : Response
    {

        $productRepository = $this->getDoctrine()->getRepository(Products::class);
        $tests = $productRepository->findAll();
        //var_dump($tests);

        return $this->render('catalog.html.twig', [
            'products' => $tests
        ]);
    }

}