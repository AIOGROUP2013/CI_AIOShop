<?php

function createlink($str) {
    return base_url() . "index.php\product?id=" . $str;
}

function createlinkcart($str) {
    return base_url() . ".index.cart?id=" . $str;
}
?>

<?php include('header.php'); ?>

<?php include('menu.php'); ?>



<div class="clear_width"></div>
<div id="" class="fri_product" max="<?php echo "$max"; ?>">
    <?php
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

</div>


<div class="clear_width"></div>
<a stt="24" class="buttonsnextListPage"style="background-color: rgb(0, 165, 240);display: block;width: 500px;line-height: 30px;margin: 10px auto;text-align: center;border-radius: 5px;box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.4) inset, 0 1px rgb(255, 255, 255);font-family: sans-serif;cursor: pointer;">Xem thêm</a>
<?php include('edit_product.php'); ?>
<div class="clear_width"></div>
<script>
    $(document).ready(function() {
        var max= $('.fri_product').attr('max');
        
          var tt= $('div[id="'+max+'"]').attr('id');
               if(tt==max) $('.buttonsnextListPage').hide();
        
        
        $(".buttonsnextListPage").click(function() {
            var stt = $(this).attr('stt');
             var base_url="<?= base_url();?>";
            $.ajax({
                type: "POST",
                url: base_url+'index.php/type/ajax',
                data: {
                    stt: stt,
                    type:<?php echo "$type"; ?>
                },
                success: function(data)
                {
                    $('.fri_product').append(data);
               
                var t= $('div[id="'+max+'"]').attr('id');
               if(t==max) $('.buttonsnextListPage').hide();
                else  $(this).attr('stt',stt+24);  
                }
            });
        });
    });


</script>
<?php include('footer.php'); ?>