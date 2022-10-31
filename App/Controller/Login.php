<?php

namespace App\Controller;

use \App\Controller\Page;
use \App\Model\Entity\User;
use \App\Session\Login as SessionAdminLogin;

class Login extends Page{

    public static function getLogin($request,$errorMessage = null){
        $status = !is_null($errorMessage) ? Alert::getError($errorMessage) : '';

        return parent::getLoginPage('Login > Icomon', $status);
    }

    public static function setLogin($request){
        $postVars = $request->getPostvars();
        $email = $postVars['email'] ?? '';
        $senha = $postVars['senha'] ?? '';
        $obUser = User::getUserByEmail($email);
        
        if(!$obUser instanceof User){
            return self::getLogin($request, 'E-mail ou senha inválidos');
        }

        if(!password_verify($senha,$obUser->senha)){
            return self::getLogin($request, 'E-mail ou senha inválidos');
        }

        SessionAdminLogin::Login($obUser);
        $request->getRouter()->redirect('/');
    }

    public static function setLogout($request){
        SessionAdminLogin::Logout();
        $request->getRouter()->redirect('/login');
    }
}