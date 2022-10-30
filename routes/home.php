<?php 

use \App\Http\Response;
use \App\Controller\Home;

$obRouter->get('/',[
    'middlewares' => ['required-admin-logout'],
    function($request){
        return new Response(200,Home::getHome($request));
    }
]);

