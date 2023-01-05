<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class Options{
    public $id;
    public $value;
    public $text;
    public $tag;

    public static function getOptions($where=null, $order=null, $limit=null, $field='*'){
        return (new Database('options'))->select($where, $order, $limit, $field);
    }
}