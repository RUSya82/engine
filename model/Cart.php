<?php
namespace app\model;

class  Cart extends Model{
    use \app\traits\Cartdata;
    public function getTableName()
    {
        return 'carts';
    }
}

