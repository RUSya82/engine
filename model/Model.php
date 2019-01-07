<?php

namespace app\model;

use \app\engine\Db as Db;
use \app\interfaces\IModel as IModel;

abstract class Model implements IModel
{
    public $db;
    protected $columns = []; // тут не используется
    /*
     * массив columns - это список полей таблицы БД, ввёл для того, чтобы можно было в этом абстрактном классе прописать
     *  все нужные служебные методы,
     * а в каждом потомке просто будет свой columns, точнее заполнен по своему. Понимаю, что это наверное своего рода костыль
     * но ничего другого я придумать не смог(
    */

    public function __construct()
    {
       $this->db = Db::getInstance();
    }

    /**
     * возвращает объект вызвавшего класса, с заполненными полями из БД
     * @param $id - id записи в БД
     * @return mixed - объект класса, который вызвал функцию
     */
    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [':id' => $id], get_called_class());
    }

//    public function getOne($id) {
//        $tableName = static::getTableName();
//        $sql = "SELECT * FROM {$tableName} WHERE idx = :id";
//        return Db::getInstance()->queryObject($sql, [":id" => $id], static::class);
//    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }
    abstract public static function getTableName();

    /**
     * Удаление записи в БД по id
     * @return mixed
     */
    public function delete()
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
        return $this->db->execute($sql, [':id'=>$this->id]);
    }

    /**
     * Вставка объекта(его данных) в БД
     * @return mixed
     */
    public function insert()
    {
        $sql = "INSERT INTO {$this->getTableName()} ({$this->getFields()}) VALUES ({$this->getValues()})";
        var_dump($sql);
        var_dump($this->getParams());
        return $this->db->execute($sql, $this->getParams());
    }

    public function save()
    {
        //TODO Умный insert, который либо вставить данные в БД либо обновит
    }

    public function update()
    {
        $sql = "UPDATE {$this->getTableName()} SET {$this->getUpdateFields()} WHERE id = :id";
        //var_dump($sql);
        return $this->db->execute($sql, $this->getParams());

    }

    /**
     * подготавливает строку типа id = :id, name = :name, description = :description для функции update()
     * @return mixed|string
     */
    public function getUpdateFields(){
        $tmp = '';
        foreach ($this->columns as $val){
            $tmp .= " $val = :$val,";
        }
        $tmp = substr_replace( $tmp, '', -1);
        //var_dump($tmp);
        return $tmp;
    }
    /**
     * подготавливает строку из массива columns для запроса в виде 'id, name, description ...'
     * @return string - строка из массива columns, разделённая запятыми
     */
    public function getFields() : string {

        return implode(', ', $this->columns);
    }

    /**
     * @return string
     */
    public  function getValues() : string {
        $tmp = implode( ', :',$this->columns);
        $tmp = ':' . $tmp;
        //var_dump($tmp);
        return $tmp;
    }

    /**
     * Функция возвращает массив параметров для запроса через PDO вида [':id'=>2, и.т.д]
     * @return array
     */
    public  function getParams() : array {
        $params =[];
        foreach ($this->columns as $val){
            $params[':'. $val] = $this->$val;
        }
        //var_dump($params);
        return $params;
    }

}