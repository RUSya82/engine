<?php

namespace app\engine;

class Db
{
    private $config = [
        'engine' => 'mysql',
        'host' => 'localhost',
        'database' => 'sport',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8'
    ];



    public function queryOne($sql, $param = []) {
        return [];
    }

    public function queryAll($sql, $param = []) {
        return [];
    }

}