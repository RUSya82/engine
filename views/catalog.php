<?php /**
 * @var \app\model\Products $product
 */

?>

<?php foreach ($products as $product): ?><b><a href="/?c=product&a=card&id=<?=$product['id']?>"><?=$product['name']?></a></b>
<!--    <p>--><?//=var_dump($products)?><!--</p>-->
    <p><?=$product['description']?></p>
    <p>Стоимость: <?=$product['price']?></p>
    <hr>
<?php endforeach; ?>

