<?php
namespace App\Controller\Components;

use \App\Utils\View;
use \App\Model\Entity\Options as EntityOptions;

class Options{
    public static function loadOptions($tag){
        $itens = '';
        $where = 'tag = "'.$tag.'"';
        $results = EntityOptions::getOptions($where);

        while($opt = $results->fetchObject(EntityOptions::class)){
            $itens .= View::render('components/options/option', [
                'value' => $opt->value,
                'text'  => $opt->text
            ]);
        }

        return $itens;
    }
}