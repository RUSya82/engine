<?php


class Products extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function getTableName()
    {
        return "product";
    }

}

