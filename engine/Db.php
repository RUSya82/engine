<?php

namespace app\engine;

use app\traits\TSingletone;

class Db
{
    use TSingletone;

    private $config = [
        'engine' => 'mysql',
        'host' => 'localhost',
        'database' => 'sport',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8'
    ];

    /**
     * подготовка конфига для БД
     * @return string
     */
    protected function prepareQueryString(){
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['engine'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']);
    }
    /****---массив опций PDO----****/
    private $options = [
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ];

    private $connect = null;    //коннект к БД

    /**
     * Функция соединения с БД
     * @return null|\PDO - соединение с БД
     */
    public function getConnection(){
        if(!$this->connect){
            $this->connect = new \PDO(
                $this->prepareQueryString(),
                $this->config['user'],
                $this->config['password'],
                $this->options
            );

        }
        return $this->connect;
    }

    /**
     * Единая функция запроса к БД
     * @param $sql  - текст запроса
     * @param array $param  -   передаваемые в запрос параметры
     * @return bool|\PDOStatement возвращает объект PDOStatment - результат запроса
     */
    public function query($sql, $param =[]){
        //var_dump($param);
        $statement = $this->getConnection()->prepare($sql);
        $statement->execute($param);
        return $statement;
    }

    /**
     * Функция для запроса без получения данных из БД
     * @param $sql - текст запроса
     * @param array $param -   передаваемые в запрос параметры
     * @return bool
     */
    public function execute($sql, $param = []){
        $this->query($sql, $param);
        return true;
    }

    /**
     * функция для получения одной записи из БД
     * @param $sql - текст запроса
     * @param array $param-   передаваемые в запрос параметры
     * @return mixed    - результат запроса в виде аасоциативного массива
     */
    public function queryOne($sql, $param = []) {
        var_dump($sql);
        return $this->queryAll($sql,$param)[0];
    }

    public function queryObject($sql, $params, $class) {
        $statement = $this->query($sql, $params);
        $statement -> setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,$class);
        return $statement->fetch();
    }


    /**
     * Функция для получения нескольких записей из БД
     * @param $sql
     * @param array $param
     * @return array
     */
    public function queryAll($sql, $param = []) {
        return $this->query($sql, $param)->fetchAll();
    }

    public function lastInsertId(){
        return $this->connect->lastInsertId();
    }

}