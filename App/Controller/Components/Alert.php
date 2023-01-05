<?php

namespace App\Controller\Components;

use \App\Utils\View;

class Alert{

    public static function getError($message){
        return View::render('components/alert/status',[
            'tipo' => 'danger',
            'mensagem' => $message
        ]);
    }

    public static function getSuccess($message){
        return View::render('components/alert/status',[
            'tipo' => 'success',
            'mensagem' => $message
        ]);
    }
}