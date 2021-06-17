<?php

namespace App\Controller;


class CatologController extends AbstractController
{

    public function view()
    {
        //echo 'Bienvenue sur le catalogue';
        $list_product = ['steak'];
        echo $this->render('catalogue/view.phtml', ['products' => $list_product]);
    }

}