<?php

namespace app\model;

/**
 * Class Category
 * @package app\model
 *
 */
class Category extends Model
{
    protected $id;
    protected $name;
    /**
     * @var array массив с названиями полей в БД
     */
    protected $columns = ['id', 'name'];

    /**
     * Category constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id = null, $name = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}
    public function getName(){return $this->name;}
    public function setName($name){$this->name = $name;}
    public static function getTableName()
    {
        return 'category';
    }
}