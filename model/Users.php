<?php

namespace app\model;

class Users extends Model
{
    public $id;
    public $login;
    public $pass;
    /****---- function from interface IModel----*******/
    public function getTableName()
    {
        return "users";
    }



}