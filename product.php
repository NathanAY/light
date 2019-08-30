<?php include_once('part/header.php');

if (isset($_GET['product'])) {

    $currentProduct = $_GET['product'];

    $product = $connect->query("SELECT * FROM products WHERE title = '$currentProduct'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

//   echo "<pre>";
  //  var_dump($product);
  //  echo "</pre>";
}

 ?>

 <div class="content">
     <a href="catalog.php?cat=<?php echo $product['cat']?>"><p>Назад</p></a>
 	<div class="product">
 		<img src="<?php echo $product['img']?>" alt="">
 		<div class="stats">
 			<b><p>Имя: <?php echo $product['rus_name']?></p></b><br>
 			<hr>
 			<p>Цена: <?php echo $product['price']?> руб.</p>
 			<p>Тип: <?php echo $product['type']?></p>
 			<p>Вес: <?php echo $product['mass']?> кг.</p>
 			<p>Ширина: <?php echo $product['width']?> см.</p>
 			<p>Длинна: <?php echo $product['height']?> см.</p>
 			<p>Материал: <?php echo $product['material']?></p>
            <form class="addcart" action="actions/add.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $product['id']?>">
                <input type="submit" value="В корзину">
            </form>
 		</div>

	</div>
 </div>
<?php require_once('part/footer.php') ?>