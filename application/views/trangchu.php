<?php

function createlink($str) {
    return base_url() ."index.php\product?id=" . $str;
}

function createlinkcart($str) {
    return base_url() . ".index.cart?id=" . $str;
}
?>

<?php include('header.php'); ?>
<?php include($include); ?>
<?php include('menu.php'); ?>

                    <!-- Hai sản phẩm đầu tiên -->
                    <div id="frist_product" class="fri_product">
                        <div class="bg_product" >  <!-- S?n ph?m l?n-->
                            <div class="product_large" id="<?php echo $data[0]->masp; ?>">
                                <div class="images_product">
                                    <img src="<?php echo base_url() . "public/images_product/" . $data[0]->duongdan; ?>">
                                </div>
                                <div class="images_hover">
                                    <div class="wrap_images">
                                        <div class="count_sale"><?php echo $data[0]->sldamua . " đã mua"; ?></div>

                                        <div class="cart"><img class="add_to_cart" src="<?php echo base_url() . "public/icon/cart.png"; ?>"></div>

                                    </div>
                                </div>
                                <div class="tittle_product">
                                    <p><?php echo $data[0]->tensp; ?></p>
                                    <div class="price_product">
                                        <span><?php echo $data[0]->giaban; ?><sup>đ</sup></span><strike><?php echo $data[0]->giacu; ?><sup>d</sup></strike>
                                        <a class="muiten"  id="<?=$data[0]->masp;?>" href="<?php echo createlink($data[0]->masp); ?> "></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- sản phẩm nhỏ -->
                        <div class="bg_product_small">  <!-- Sản phẩm nhỏ-->
                            <div class="product_small"  id="<?php echo $data_avg[0]->masp; ?>">
                                <div class="images_product_small">
                                    <img src="<?php echo base_url() . "public/images_product/" . $data_avg[0]->duongdan; ?>">
                                </div>
                                <div class="images_hover_small">
                                    <div class="wrap_images_small">
                                        <div class="count_sale_small"><?php echo $data_avg[0]->sldamua . " đã mua"; ?></div>

                                        <div class="cart_small"><img class="add_to_cart" src="<?php echo base_url() . "public/icon/cart.png"; ?>"></div>
                                    </div>
                                </div>
                                <div class="tittle_product">
                                    <p><?php echo $data_avg[0]->tensp; ?></p>
                                    <div class="price_product">
                                        <span><?php echo $data_avg[0]->giaban; ?><sup>đ</sup></span><strike><?php echo $data_avg[0]->giacu; ?><sup>đ</sup></strike>
                                        <a class="muiten" id="<?=$data_avg[0]->masp ;?>" href="<?php echo createlink($data_avg[0]->masp); ?> ">  </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <!-- Hàng có 3 sản phẩm -->
                    <div id="frist_product2" class="fri_product">
                        <?php
                        for ($i = 1; $i < 4; $i++) {
                            ?>
                            <div class="bg_product_small">  <!-- Sản phẩm nhỏ-->
                                <div class="product_small" id="<?php echo $data_avg[$i]->masp; ?>">
                                    <div class="images_product_small">
                                        <img src="<?php echo base_url() . "public/images_product/" . $data_avg[$i]->duongdan; ?>">
                                    </div>
                                    <div class="images_hover_small">
                                        <div class="wrap_images_small">
                                            <div class="count_sale_small"><?php echo $data_avg[$i]->sldamua . " đã mua"; ?></div>

                                            <div class="cart_small"><a href="#"><img class="add_to_cart" src="<?php echo base_url() . "public/icon/cart.png"; ?>"></a></div>
                                        </div>
                                    </div>
                                    <div class="tittle_product">
                                        <p><?php echo $data_avg[$i]->tensp; ?></p>
                                        <div class="price_product">
                                            <span><?php echo $data_avg[$i]->giaban; ?><sup>đ</sup></span><strike><?php echo $data_avg[$i]->giacu; ?><sup>đ</sup></strike>
                                            <a class="muiten" id="<?=$data_avg[$i]->masp ;?>" href="<?php echo createlink($data_avg[$i]->masp); ?> "> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="clear"></div>
                    </div>

                    <div class="clear_width"></div>
                    <!-- Hàng có 3 sản phẩm một sản phẩm trung bình 2 sản phẩm nhỏ nhất-->
                    <div id="" class="fri_product">
                        <!-- s?n ph?m trung bình-->
                        <div class="bg_product_avg">  <!-- S?n ph?m trung bình-->
                            <div class="product_avg" id="<?php echo $data_lon[0]->masp; ?>">
                                <div class="images_product_avg">
                                    <img src="<?php echo base_url() . "public/images_product/" . $data_lon[0]->duongdan; ?>">
                                </div>
                                <div class="images_hover_avg">
                                    <div class="wrap_images_avg">
                                        <div class="count_sale_avg"><?php echo $data_lon[0]->sldamua . " đã mua"; ?></div>
                                        <div class="cart_avg"><img class="add_to_cart" src="<?php echo base_url() . "public/icon/cart.png"; ?>"></div>

                                    </div>
                                </div>
                                <div class="tittle_product">
                                    <p><?php echo $data_lon[0]->tensp; ?></p>
                                    <div class="price_product">
                                        <span><?php echo $data_lon[0]->giaban; ?><sup>đ</sup></span><strike><?php echo $data_lon[0]->giacu; ?><sup>đ</sup></strike>
                                        <a class="muiten" id="<?=$data_lon[0]->masp;?>" href="<?php echo createlink($data_lon[0]->masp); ?>"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- s?n ph?m nh?  nh?t-->
                        <div class="bg_product_small_small">  <!-- S?n ph?m nh? nhât-->
                            <div class="product_small_small" id="<?php echo $data_nho[0]->masp; ?>">
                                <div class="images_product_small_small">
                                    <img src="<?php echo base_url() . "public/images_product/" . $data_nho[0]->duongdan; ?>">
                                </div>
                                <div class="images_hover_small_small">
                                    <div class="wrap_images_small_small">
                                        <div class="count_sale_small_small"><?php echo $data_nho[0]->sldamua . " đã mua"; ?></div>
                                        <div class="cart_small_small"><img class="add_to_cart" src="<?php echo base_url() . "public/icon/cart.png"; ?>"></div>

                                    </div>
                                </div>
                                <div class="tittle_product_small_small">
                                    <p><?php echo $data_nho[0]->tensp; ?></p>
                                    <div class="price_product_small_small">
                                        <span><?php echo $data_nho[0]->giaban; ?><sup>đ</sup></span><strike><?php echo $data_nho[0]->giacu; ?><sup>đ</sup></strike>
                                        <a class="muiten_small" id="<?= $data_nho[0]->masp; ?>" href="<?php echo createlink($data_nho[0]->masp); ?>"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- s?n ph?m nh? nh?t-->
                        <div class="bg_product_small_small">  <!-- S?n ph?m nh? nhât-->
                            <div class="product_small_small"  id="<?php echo $data_nho[1]->masp; ?>">
                                <div class="images_product_small_small">
                                    <img src="<?php echo base_url() . "public/images_product/" . $data_nho[1]->duongdan; ?>">
                                </div>
                                <div class="images_hover_small_small">
                                    <div class="wrap_images_small_small">
                                        <div class="count_sale_small_small"><?php echo $data_nho[1]->sldamua . " đã mua"; ?></div>
                                        <div class="cart_small_small"><img class="add_to_cart" src="<?php echo base_url() . "public/icon/cart.png"; ?>"></div>

                                    </div>
                                </div>
                                <div class="tittle_product_small_small">
                                    <p><?php echo $data_nho[1]->tensp; ?></p>
                                    <div class="price_product_small_small">
                                        <span><?php echo $data_nho[1]->giaban; ?><sup>đ</sup></span><strike><?php echo $data_nho[1]->giacu; ?><sup>đ</sup></strike>
                                        <a class="muiten_small" id="<?= $data_nho[1]->masp; ?>" href="<?php echo createlink($data_nho[1]->masp); ?>"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    for ($j = 1; $j <= 3; $j++) {
                        ?>

                        <div class="clear_width"></div>
                        <div id="" class="fri_product">
                            <?php
                            for ($i = 4 * $j - 2; $i < 4 * ($j + 1) - 2; $i++) {
                                ?>
                                <div class="bg_product_small_small"  >  <!-- S?n ph?m nh? nhât-->
                                    <div class="product_small_small" id="<?php echo $data_nho[$i]->masp; ?>">
                                        <div class="images_product_small_small">
                                            <img src="<?php echo base_url() . "public/images_product/" . $data_nho[$i]->duongdan; ?>">
                                        </div>
                                        <div class="images_hover_small_small">
                                            <div class="wrap_images_small_small">
                                                <div class="count_sale_small_small"><?php echo $data_nho[$i]->sldamua . " đã mua"; ?></div>
                                                <div class="cart_small_small"><img class="add_to_cart" src="<?php echo base_url() . "public/icon/cart.png"; ?>"></div>

                                            </div>
                                        </div>
                                        <div class="tittle_product_small_small">
                                            <p><?php echo $data_nho[$i]->tensp; ?></p>
                                            <div class="price_product_small_small">
                                                <span><?php echo $data_nho[$i]->giaban; ?><sup>đ</sup></span><strike><?php echo $data_nho[$i]->giacu; ?><sup>đ</sup></strike>
                                                <a class="muiten_small" id="<?= $data_nho[$i]->masp; ?>"  href="<?php echo createlink($data_nho[$i]->masp); ?>">  </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    <?php } ?>
                        </div>
                        <?php } ?>
                        
            
	<?php include('edit_product.php'); ?>
                    <div class="clear_width"></div>

<?php include('footer.php'); ?>