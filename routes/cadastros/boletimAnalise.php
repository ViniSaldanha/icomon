<?php 

use \App\Http\Response;
use \App\Controller\Cadastros;

$obRouter->get('/cadastros/boletimAnalise',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\Ba::getBAs($request));
    }
]);

$obRouter->get('/cadastros/boletimAnalise/new',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\Ba::getBA($request));
    }
]);

$obRouter->post('/cadastros/boletimAnalise/new',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\Ba::setBA($request));
    }
]);

$obRouter->get('/cadastros/boletimAnalise/{ba}/edit',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Cadastros\Ba::getEditBa($request,$ba));
    }
]);

$obRouter->post('/cadastros/boletimAnalise/{ba}/edit',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Cadastros\Ba::setEditBa($request,$ba));
    }
]);


$obRouter->get('/cadastros/boletimAnalise/{ba}/gerar_pdf',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Cadastros\Ba::getImprimirBa($request,$ba));
    }
]);



$obRouter->post('/cadastros/boletimAnalise/renderTableFromFile', [
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\Ba::renderTableFromFile());
    }
]);

$obRouter->get('/cadastros/boletimAnalise/getItemFromCsv/{id}', [
    'middlewares' => [
        'required-admin-login'
    ],
    function($request, $id){
        return new Response(200,Cadastros\Ba::getItemFromCsv($id));
    }
]);