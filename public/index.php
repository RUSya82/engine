<?php
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Products(new Db());


var_dump($product);