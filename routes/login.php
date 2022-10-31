<?php 

use \App\Http\Response;
use \App\Controller\Login;

$obRouter->get('/login',[
    'middlewares' => [
        'required-admin-logout'    
    ],
    function($request){
        return new Response(200, Login::getLogin($request));
    }
]);

$obRouter->post('/login',[
    'middlewares' => [
        'required-admin-logout'    
    ],
    function($request){
        return new Response(200, Login::setLogin($request));
    }
]);

$obRouter->get('/logout',[
    'middlewares' => [
        'required-admin-login'    
    ],
    function($request){
        return new Response(200, Login::setLogout($request));
    }
]);


?>