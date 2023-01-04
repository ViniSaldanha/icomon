<?php 

use \App\Http\Response;
use \App\Controller\Mascara;

$obRouter->get('/mascara/mascaraEncerramento',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Mascara\MascaraEncerramento::getMask($request));
    }
]);

$obRouter->get('/mascara/mascaraEncerramento/new',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Mascara\MascaraEncerramento::getNewMask($request));
    }
]);

$obRouter->post('/mascara/mascaraEncerramento/new',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request){
        return new Response(200,Mascara\MascaraEncerramento::setNewMask($request));
    }
]);

$obRouter->get('/mascara/mascaraEncerramento/{ba}/edit',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Mascara\MascaraEncerramento::getEditMask($request,$ba));
    }
]);

$obRouter->post('/mascara/mascaraEncerramento/{ba}/edit',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Mascara\MascaraEncerramento::setEditMask($request,$ba));
    }
]);

$obRouter->get('/mascara/mascaraEncerramento/{ba}/delete',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Mascara\MascaraEncerramento::getDeleteMask($request,$ba));
    }
]);

$obRouter->post('/mascara/mascaraEncerramento/{ba}/delete',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request,$ba){
        return new Response(200,Mascara\MascaraEncerramento::setDeleteMask($request,$ba));
    }
]);

