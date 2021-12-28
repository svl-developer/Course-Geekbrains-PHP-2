
<?php

if($catalog){ 
foreach($catalog as $product):?>

		<div class="ItemBox">							
			<table class="productItem">		
			<tr>
		  <td>
			<div class='Itemphoto'>
			<a href="index.php?c=page&act=product&id=<?=$product["id"]?>">
			<img src="img/img_smal/<?=$product['img_smal']?>"></a>
		  </td>
		</div>
			
	    <td class="Color_bottom_product">
		  <div class='ItempName'>
			<p><?=$product['title']?></p>
		  </div>
		  <div class='ItempPrice'>
			<p>Цена <?=$product['price']?> р </p>
		  </div>
		  <div id='ItemBuy'><a  href="index.php?c=page&act=product&id=<?=$product["id"]?>">Добавить в корзину</a></div>
		</td>
		</tr>		
	</table>
</div>
<?php endforeach;
}

?>
<?php if(isset($text)){echo "<script>alert('$text')
	</script>";}?>

<script src="../js/mycart.php"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


	