<?php
namespace App\Controller\Components;

use \App\Utils\View;
use \App\Model\Entity\Options as EntityOptions;

class Options{
    public static function loadOptions($tag, $selected = null){
        $itens = '';
        $where = 'tag = "'.$tag.'"';
        $results = EntityOptions::getOptions($where);

        while($opt = $results->fetchObject(EntityOptions::class)){
            $itens .= View::render('components/options/option', [
                'selected' => self::handleSelectedItem($opt->value, $selected),
                'value' => $opt->value,
                'text'  => $opt->text
            ]);
        }

        return $itens;
    }

    private static function handleSelectedItem($option, $item){
        $result = '';
        if($option == $item){
            $result = 'selected';
        }

        return $result;
    }
}