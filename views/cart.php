<?php
?>
<h1><?=$product->getName()?></h1>
<p><?=$product->getDescription()?></p>
<p>Количество: <?=$count?></p>
<p>Стоимость: <?=$count?>*<?=$product->getPrice()?> = <?=$count*$product->getPrice()?> $</p>
