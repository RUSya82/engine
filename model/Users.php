<?php

namespace app\model;

class Users extends Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $userName;

    protected $columns = ['id', 'login', 'password','userName'];

    public function __construct($id = null, $login = null, $password = null, $userName = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->userName = $userName;
    }

    public function setId($id){$this->id = $id;}
    public function setLogin($login){$this->login = $login;}
    public function setPass($password){$this->password = $password;}
    public function setUserName($userName){$this->userName = $userName;}

    public function getId(){return $this->id;}
    public function getLogin(){return $this->login;}
    public function getPass(){return $this->password;}
    public function getUserName(){return $this->userName;}

    /****---- function from interface IModel----*******/
    public static function getTableName()
    {
        return "users";
    }



}