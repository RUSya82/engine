<?php

namespace app\model {

    class Products extends Model
    {
        public $id;
        public $name;
        public $description;
        public $price;
        public $customer_id;
        public $category_id;
        /****---- function from interface IModel----*******/
        public function getTableName(){
            return "products";
        }

    }
}

