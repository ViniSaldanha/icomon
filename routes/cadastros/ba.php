<?php 

use \App\Http\Response;
use \App\Controller\Cadastros;

$obRouter->get('/cadastros/ba',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\Ba::getBAs($request));
    }
]);