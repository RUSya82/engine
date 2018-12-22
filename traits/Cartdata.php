<?php
/**
 * Created by PhpStorm.
 * User: Salom
 * Date: 22.12.2018
 * Time: 17:38
 */

namespace app\traits;
/**
 * Trait Cartdata
 * @package app\traits
 * Трейт для Cart и Product для исключения повторения кода
 */

trait Cartdata
{
    private $id;
    private $products = [];
    private $totalPrice;
    private $idUser;
    private $date;
    /*********---getters&setters----****/
    public function setId($id){$this->id = $id;}
    public function setProducts($products){$this->products = $products;}
    public function setIdUser($idUser){$this->idUser = $idUser;}
    public function setDate($date){$this->date = $date;}
    public function getId(){return $this->id;}
    public function getProducts(){return $this->products;}
    public function getTotalPrice(){return $this->totalPrice;}
    public function getIdUser(){return $this->idUser;}
    public function getDate(){return $this->date;}
    /****---- Расчет цены корзины(заказа)----*******/
    public  function countTotalPrice(array $product){
        //пока заглушка
        return 355;
    }
}