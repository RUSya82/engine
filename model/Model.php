<?php

namespace app\model;

use \app\engine\Db as Db;
use \app\interfaces\IModel as IModel;

abstract class Model implements IModel
{
    public $db;



    public function __construct()
    {
       $this->db = Db::getInstance();
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        var_dump($tableName);
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }
    abstract public function getTableName();
    public function delete()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id'=>$this->id]);
    }
    public function insert()
    {
        //TODO добавить данные
        //То же самое, не нужно передавать параметры, они уже есть в public свойствах класса!
    }

    public function save()
    {
        //TODO Умный insert, который либо вставить данные в БД либо обновит
    }

    public function update()
    {
        //TODO изменить данные
        //если успеете, хотя бы подумать
        //это уже если совсем все что выше просто и понятно
    }

}