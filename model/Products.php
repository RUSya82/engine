<?php

namespace app\model {

    class Products extends DbModel
    {
        protected $id;
        public $name;
        public $description;
        public $price;
        protected $customer_id;
        protected $category_id;
        /**********----getters&setters----**********/
        public function setId($id): void{$this->changedColumns[] = 0;$this->id = $id;}
        public function setName($name): void{$this->changedColumns[] = 1;$this->name = $name;}
        public function setDescription($description): void{$this->changedColumns[] = 2;$this->description = $description;}
        public function setPrice($price): void{$this->changedColumns[] = 3;$this->price = $price;}
        public function setCustomerId($customer_id): void{$this->changedColumns[] = 4;$this->customer_id = $customer_id;}
        public function setCategoryId($category_id): void{$this->changedColumns[] = 5;$this->category_id = $category_id;}
        public function getId(){return $this->id;}
        public function getName(){return $this->name;}
        public function getDescription(){return $this->description;}
        public function getPrice(){return $this->price;}
        public function getCustomerId(){return $this->customer_id;}
        public function getCategoryId(){return $this->category_id;}

        /**
         * @var array - массив полей таблицы данного класса в БД
         */
        protected $columns = ['id','name', 'description', 'price', 'customer_id','category_id'];
        protected $changedColumns = [];

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
        /****---- function from interface IModel----*******/
        public static function getTableName(){
            return "products";
        }


    }
}

