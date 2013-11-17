<?php

function createlink($str) {
    return base_url() . "index.php\product?id=" . $str;
}

foreach ($data_nho as $value) {
    ?>
    <div class="bg_product_small_small"  >  <!-- S?n ph?m nh? nhât-->
        <div class="product_small_small" id="<?php echo $value->masp; ?>">
            <div class="images_product_small_small">
                <img src="<?php echo base_url() . "public/images_product/" . $value->duongdan; ?>">
            </div>
            <div class="images_hover_small_small">
                <div class="wrap_images_small_small">
                    <div class="count_sale_small_small"><?php echo $value->sldamua . " đã mua"; ?></div>
                    <div class="cart_small_small"><img class="add_to_cart" src="<?php echo base_url() . "public/icon/cart.png"; ?>"></div>

                </div>
            </div>
            <div class="tittle_product_small_small">
                <p><?php echo $value->tensp; ?></p>
                <div class="price_product_small_small">
                    <span><?php echo $value->giaban; ?><sup>đ</sup></span><strike><?php echo $value->giacu; ?><sup>đ</sup></strike>
                    <a class="muiten_small" id="<?= $value->masp; ?>"  href="<?php echo createlink($value->masp); ?>">  </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>