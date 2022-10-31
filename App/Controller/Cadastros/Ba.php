<?php

namespace App\Controller\Cadastros;

use App\Controller\Page;
use App\Utils\View;

class Ba extends Page{
    
    public static function getBAs($request){
        $content = View::render('cadastros/ba/index', [
            'itens' => '',
            'pagination' => '',
            'status' => ''
        ]);

        return parent::getPage('Cadastro de BA', $content, 'cadastro-ba');
    }

    public static function getBA($request){
        $content = View::render('cadastros/ba/new', [

        ]);

        return parent::getPage('Preencher BA', $content, 'Preencher-ba');
    }
    
}