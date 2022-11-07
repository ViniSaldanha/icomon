<?php

namespace App\Controller\Cadastros;

use \App\Controller\Page;
use \App\Utils\View;
use \App\Utils\CSV;

class Ba extends Page{
    const SCRIPT_SRC = "/resources/views/cadastros/ba/carrega-csv.js";
    
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

        return parent::getPage('Preencher BA', $content, 'cadastro-ba', Ba::SCRIPT_SRC);
    }

    public static function renderTableFromFile(){
        if(!isset($_FILES['arquivo-csv'])){
            die("Ocorreu um erro ao carregar o arquivo\n");
        }

        $filePath = $_FILES['arquivo-csv']['tmp_name'];
        $dados = CSV::lerArquivo($filePath, true, ';');
        $linhas = '';

        foreach($dados as $linha){
            $linhas .= View::render('cadastros/ba/dados-csv-item', [
                'ba'            => $linha['BA'],
                'backbone'      => $linha['BACKBONE'],
                'estacao'       => $linha['ESTACAO'],
                'central'       => $linha['CENTRAL'],
                'ga'            => $linha['GA']
            ]);
        }
        
        $content = View::render('cadastros/ba/dados-csv', [
            'itens' => $linhas
        ]);

        return $content;
    }
}