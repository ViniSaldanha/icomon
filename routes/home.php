<?php 

use \App\Http\Response;
use \App\Controller\Home;

$obRouter->get('/',[
    'middlewares' => ['required-admin-login'],
    function($request){
        return new Response(200,Home::getHome($request));
    }
]);

