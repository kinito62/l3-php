<?php


class Router
{

    /**
     *
     */


    function process()
    {
        $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
        // Route it up!
        switch ($request_uri[0]) {
            // Home page
            case '/':
                require '../tp3/index.php';
                break;
            // About page
            case '/about':
                require '../tp3/catalogue.php';
                break;
            // Everything else
            default:
                header('HTTP/1.0 404 Not Found');
                require '../tp4/index.php';
                break;
        }
        /**
         * ex http://localhost/
         *
         * $uri = /
         */

        /**
         * ex http://localhost/catalog
         *
         * $uri = /catalog
         */

        /**
         * ex http://localhost/catalog/product
         *
         * $uri = /catalog/product
         */
        $uri = "";

        /**
         * mapping entre $uri et routes.json
         * Prevoir route non connue => 404
         */



        /**
         * instance controller de la route appel de la methode
         */

    }

}