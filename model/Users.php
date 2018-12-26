<?php

namespace app\model;

class Users extends Model
{
    private $id;
    private $login;
    private $pass;
    private $userName;

    public function __construct($id, $login, $pass, $userName)
    {
        $this->id = $id;
        $this->login = $login;
        $this->pass = $pass;
        $this->userName = $userName;
    }

    public function setId($id){$this->id = $id;}
    public function setLogin($login){$this->login = $login;}
    public function setPass($pass){$this->pass = $pass;}
    public function setUserName($userName){$this->userName = $userName;}

    public function getId(){return $this->id;}
    public function getLogin(){return $this->login;}
    public function getPass(){return $this->pass;}
    public function getUserName(){return $this->userName;}

    /****---- function from interface IModel----*******/
    public function getTableName()
    {
        return "users";
    }



}