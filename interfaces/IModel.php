<?php

namespace app\interfaces;

interface IModel
{
    public static function getOne($id);
    public function getAll();
    public static function getTableName();
}