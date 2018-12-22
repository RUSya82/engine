<?php

namespace app\model;

use \app\engine\Db as Db;
use \app\interfaces\IModel as IModel;

abstract class Model implements IModel
{
    protected $db;


    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function getOne($id) {
        $tableName = getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll() {
        $tableName = getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }


}