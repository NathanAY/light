<?php include_once('part/header.php');

 $cats = $connect->query("SELECT * FROM cat");
 $cats = $cats->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['cat'])) {
    $currentCat = $_GET['cat'];

    $products = $connect->query("SELECT * FROM products WHERE cat = '$currentCat'");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);

} else {
    $products = $connect->query("SELECT * FROM products");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
}
 ?>

 <div class="content">
 	<div class="menu mar">
        <?php foreach ($cats as $cat) {?>
 		<a href="catalog.php?cat=<?php echo $cat['name']?>"  class="menui"><i class="fa fa-lightbulb-o" aria-hidden="true"></i><?php echo $cat['rus_name']?></a>
    <?php }?>
 	</div>
		<div class="catalog">
        <?php
            foreach ($products as $product) {
        ?>
			<div class="card">
				<div class="cardinside">
					<a href="product.php?product=<?php echo $product['title']?>">
						<img src="<?php echo $product['img']?>" alt="">
					</a>
				<b><?php echo $product['rus_name']?></b>
                    <form class="addcart" action="actions/add.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $product['id']?>">
                        <input type="submit" value="В корзину">
                    </form>
						<div class="price"><b><?php echo $product['price']?></b></div>
				</div>
			</div>
            <?php }?>
		</div>
     <?php
     if (!$products) {
         echo "<div class=\"catnot\"><b>Категорий не найдено</b></div>";
     }?>
 </div>
<?php require_once('part/footer.php') ?>
