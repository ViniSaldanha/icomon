<?php

namespace App\Controller;

use \App\Utils\View;

class Page {

    public static function getPagination($request,$obPagination){
        $pages = $obPagination->getPages();

        if(count($pages) <= 1) return '';

        $links = '';
        $url = $request->getRouter()->getCurrentUrl();
        $queryParams = $request->getQueryParams();

        foreach($pages as $page){
            $queryParams['page'] = $page['page'];

            $link = $url. '?'.http_build_query($queryParams);

            $links .= View::render('components/pagination/link', [
                'page' => $page['page'],
                'link' => $link,
                'active' => $page['current'] ? 'active' : ''
            ]);
        }

        return View::render('components/pagination/box', [
            'links' => $links
        ]);
    }

    public static function getPage($title, $content, $currentModule = ''){
        return View::render('layout/page', [
            'title' => $title,
            'header' => self::getHeader(),
            'menu'   => self::getMenu($currentModule),
            'content' => $content,
            'footer' => self::getFooter()
        ]);
    }

    public static function getLoginPage($title, $status){
        return View::render('layout/login', [
            'title' => $title,
            'status' => $status
        ]);
    }

    private static $modules = [
        'home' =>[
            'label' => 'Home',
            'link'  => URL.'/',
            'icon'  => 'home'
        ],
        'cadastro-ba' =>[
            'label' => 'Cadastro BA',
            'link'  => URL.'/cadastros/ba',
            'icon'  => 'table'
        ]
    ];

    private static function getHeader(){
        return View::render('layout/header');
    }

    private static function getMenu($currentModule = ''){
        $links = '';

        foreach(self::$modules as $hash=>$module){
            $links .= View::render('components/menu/link',[
                'label' => $module['label'],
                'link'  => $module['link'],
                'icon'  => $module['icon'],
                'current' => $hash == $currentModule ? 'active' : ''
            ]);
        }

        return View::render('components/menu/box',[
            'links' => $links
        ]);
    }

    private static function getFooter(){
        return View::render('layout/footer');
    }
}