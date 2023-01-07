<?php

namespace App\Controller;

use App\Controller\Page;
use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page {

    public static function getHome(){
        $obOrganization = new Organization();

        $content = View::render('layout/home', [
            'name' => $obOrganization->name
        ]);
        
        return parent::getPage('ICOMON', $content, 'home');
    }
}