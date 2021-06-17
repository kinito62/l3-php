<?php

namespace App\Controller;

use App\Entity\Product;

class CatalogController extends AbstractController
{

    public function view()
    {
        $list_product = [];

        $list_product[] = new Product('Lampe', 10);
        $list_product[] = new Product('Tapis', 100);
        echo $this->render('catalogue/view.phtml', ['products' => $list_product]);
    }

}