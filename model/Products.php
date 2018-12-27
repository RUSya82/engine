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
        public $tableFieldsCouns = 6;
        protected $columns = ['id','name', 'description', 'price', 'customer_id','category_id'];

        public function __construct($id = null, $name = null, $description = null, $price = null, $customer_id = null, $category_id = null)
        {
            parent::__construct();
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->price = $price;
            $this->customer_id = $customer_id;
            $this->category_id = $category_id;
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
            //return ':id, :name, :description, :price, :customer_id, :category_id';
        }
        public  function getParams() : array {
            $params =[];
            foreach ($this->columns as $val){
                $params[':'. $val] = $this->$val;
                echo $params[':'. $val] . "<br>";
            }
            var_dump($params);
            return $params;
        }
        /****---- function from interface IModel----*******/
        public function getTableName(){
            return "products";
        }

    }
}

