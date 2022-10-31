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
    
}