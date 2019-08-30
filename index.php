<?php include_once('part/header.php');


    $products = $connect->query("SELECT * FROM products order by create_date desc LIMIT 0, 4;");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);

 ?>
    <div class="content">
    	<p><b>Новинки</b></p><hr><br>
			<div class="news">
                <?php
                foreach ($products as $product) {
                    ?>
                    <div class="newsi">
                        <div class="indprod">
                            <a href=""><img src="<?php echo $product['img']?>" alt="photo"></a>
                            <p><b><?php echo $product['rus_name']?></b></p>
                            <p><b><?php echo $product['price']?></b></p>
                        </div>
                    </div>
                <?php }?>
			</div>
 </div>
<?php require_once('part/footer.php') ?>