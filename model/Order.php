<?php
namespace app\model;

class  Order extends Model{

    use \app\traits\Cartdata;

    public $isPayed;
    public $isDelivered;
    public $deliveryAdress;

    public function setIsPayed($isPayed){$this->isPayed = $isPayed;}
    public function setIsDelivered($isDelivered){$this->isDelivered = $isDelivered;}
    public function setDeliveryAdress($deliveryAdress){$this->deliveryAdress = $deliveryAdress;}
    public function __construct($isPayed, $isDelivered, $deliveryAdress){
        $this->isPayed = $isPayed;
        $this->isDelivered = $isDelivered;
        $this->deliveryAdress = $deliveryAdress;
    }
    public function getTableName(){
        return 'orders';
    }
}