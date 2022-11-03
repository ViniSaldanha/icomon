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

$obRouter->get('/cadastros/ba/new',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\Ba::getBA($request));
    }
]);

$obRouter->post('/cadastros/ba/loadFile', [
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\Ba::loadFile());
    }
]);