<?php

namespace App\Controller;

class NotFoundController
{

    public function error404()
    {
        http_response_code(404);
        echo '404';
    }

}