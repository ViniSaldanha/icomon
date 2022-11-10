<?php

namespace App\Controller\Cadastros;

use \App\Controller\Page;
use \App\Utils\View;
use \App\Utils\CSV;

class Ba extends Page{
    const SCRIPT_SRC = "/resources/views/cadastros/ba/dados-csv.js";
    
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
        $datalist = CSV::lerArquivo($filePath, true, ';');
        $itens = '';

        $_SESSION['ba']['dados-csv'] = $datalist;
      
        foreach($datalist as $row){
            $itens .= View::render('cadastros/ba/dados-csv-item', [
                'ba'            => $row['BA'],
                'backbone'      => $row['BACKBONE'],
                'estacao'       => $row['ESTACAO'],
                'central'       => $row['CENTRAL'],
                'ga'            => $row['GA']
            ]);
        }
        
        $content = View::render('cadastros/ba/dados-csv', [
            'itens' => $itens
        ]);

        return $content;
    }

    public static function getItemFromCsv($id){
        $dadosFromSession = $_SESSION['ba']['dados-csv'];

        $result = $dadosFromSession[$id];
        $resultAsJson = json_encode($result);

        return $resultAsJson;
    }
}