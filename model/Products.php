<?php

namespace app\model {

    class Products extends Model
    {
        protected $id;
        protected $name;
        protected $description;
        protected $price;
        protected $customer_id;
        protected $category_id;

        /**
         * @param null $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @param null $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @param null $description
         */
        public function setDescription($description): void
        {
            $this->description = $description;
        }

        /**
         * @param null $price
         */
        public function setPrice($price): void
        {
            $this->price = $price;
        }

        /**
         * @param null $customer_id
         */
        public function setCustomerId($customer_id): void
        {
            $this->customer_id = $customer_id;
        }

        /**
         * @param null $category_id
         */
        public function setCategoryId($category_id): void
        {
            $this->category_id = $category_id;
        }

        /**
         * @param array $columns
         */
        public function setColumns(array $columns): void
        {
            $this->columns = $columns;
        }

        /**
         * @return null
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return null
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @return null
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @return null
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @return null
         */
        public function getCustomerId()
        {
            return $this->customer_id;
        }

        /**
         * @return null
         */
        public function getCategoryId()
        {
            return $this->category_id;
        }

        /**
         * @return array
         */
        public function getColumns(): array
        {
            return $this->columns;
        }
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
        /****---- function from interface IModel----*******/
        public function getTableName(){
            return "products";
        }

    }
}

