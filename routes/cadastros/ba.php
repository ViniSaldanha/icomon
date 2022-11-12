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

$obRouter->post('/cadastros/ba/new',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\Ba::setBA($request));
    }
]);


$obRouter->post('/cadastros/ba/renderTableFromFile', [
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\Ba::renderTableFromFile());
    }
]);

$obRouter->get('/cadastros/ba/getItemFromCsv/{id}', [
    'middlewares' => [
        'required-admin-login'
    ],
    function($request, $id){
        return new Response(200,Cadastros\Ba::getItemFromCsv($id));
    }
]);