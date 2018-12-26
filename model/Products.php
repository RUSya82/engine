<?php

namespace app\model {

    class Products extends Model
    {
        public $id;
        public $name;
        public $description;
        public $price;
        /****---- function from interface IModel----*******/
        public function getTableName(){
            return "product";
        }

    }
}

