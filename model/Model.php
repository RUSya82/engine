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
        //var_dump($tableName);
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        $class = get_class($this);
        echo $class;
        return $this->db->queryObj($sql, [':id' => $id], $class);
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }
    abstract public function getTableName();
//    abstract public  function getValues() : string;
//    abstract public function getFields();
//    abstract public  function getParams() : array;
    public function delete()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id'=>$this->id]);
    }
    public function insert()
    {
        $sql = "INSERT INTO {$this->getTableName()} ({$this->getFields()}) VALUES ({$this->getValues()})";
        var_dump($sql);
        return $this->db->execute($sql, $this->getParams());
    }

    public function save()
    {
        //TODO Умный insert, который либо вставить данные в БД либо обновит
    }

    public function update()
    {
        $sql = "UPDATE {$this->getTableName()} SET {$this->getUpdateFields()} WHERE id = :id";
        var_dump($sql);
        return $this->db->execute($sql, $this->getParams());

    }
    public function getUpdateFields(){
        $tmp = '';
        foreach ($this->columns as $val){
            $tmp .= " $val = :$val,";
        }

        $tmp = substr_replace( $tmp, '', -1);
        //var_dump($tmp);
        return $tmp;
    }
    public function getFields() : string {

        return implode(', ', $this->columns);
    }
    public  function getValues() : string {
        $tmp = '';
        $tmp = implode( ', :',$this->columns);
        $tmp = ':' . $tmp;
        var_dump($tmp);
        return $tmp;
    }
    public  function getParams() : array {
        $params =[];
        foreach ($this->columns as $val){
            //echo $val."<br>";
            $params[':'. $val] = $this->$val;
        }
        var_dump($params);
        return $params;
    }

}