<?php 

use \App\Http\Response;
use \App\Controller\Cadastros;

$obRouter->get('/cadastros/mascaraEncerramento',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\MascaraEncerramento::getMask($request));
    }
]);

$obRouter->get('/cadastros/mascaraEncerramento/new',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\MascaraEncerramento::getNewMask($request));
    }
]);

$obRouter->post('/cadastros/mascaraEncerramento/new',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Cadastros\MascaraEncerramento::setNewMask($request));
    }
]);

$obRouter->get('/cadastros/mascaraEncerramento/{ba}/edit',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Cadastros\MascaraEncerramento::getEditMask($request,$ba));
    }
]);

$obRouter->post('/cadastros/mascaraEncerramento/{ba}/edit',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Cadastros\MascaraEncerramento::setEditMask($request,$ba));
    }
]);

$obRouter->get('/cadastros/mascaraEncerramento/{ba}/delete',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Cadastros\MascaraEncerramento::getDeleteMask($request,$ba));
    }
]);

$obRouter->post('/cadastros/mascaraEncerramento/{ba}/delete',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Cadastros\MascaraEncerramento::setDeleteMask($request,$ba));
    }
]);

