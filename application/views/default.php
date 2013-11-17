<?php

function createlink($str) {
    return base_url() ."index.php\product?id=" . $str;
}

function createlinkcart($str) {
    return base_url() . ".index.cart?id=" . $str;
}
?>

<?php include('header.php'); ?>
<?php include('login.php'); ?>
<?php include('menu.php'); ?>
 <?php
           $sp= new Sanpham();
           $sp->getObject("masp=".$id);
            ?>
  <div id="default_product">
               <div class="default_left">
                   <div class="images_default">
                       <img src="<?php echo base_url()."public/images_product/".$sp->get_duongdan(); ?>">
                   </div>
               </div>
               <div class="default_right">
                   
                   <h1 class="product_title"><?php echo $sp->get_tensp(); ?></h1>
                   <p><?php echo $sp->get_mota(); ?>  </p>
                 <hr>
                 <div class="list_price">Giá gốc: <?php echo $sp->get_giacu(); ?><sup>đ</sup>
                       (-45%)
                   </div>
                 <div class="sell_price"><?php echo $sp->get_giaban();?><sup>đ</sup></div>
                   <div class="mua_ngay">
                       <a href="#"></a><!--Mua ngay -->
                   </div>
               </div>

           </div>
        </div>
        <div class="clear"></div>
        <div class="default_bottom">
            <table border="0">
                <tr>
                    <th>Điểm nổi bật</th>
                    <th>Điều kiện</th>
                </tr>
                <tr>
                    <td style="width: 50%">
                        <p>- Đầm hoa vintage fashion là trang phục không thể thiếu trong bộ sưu tập thời trang của bạn gái.</p>
                       <p> - Form dáng xếp ly xòe cổ điển, cổ U và tay con đơn giản, mang đến cho phái đẹp vẻ ngoài dịu dàng, thanh lịch</p>
                       <p> Chất liệu tuyết tâm in hoa mềm mịn và cực kỳ thông thoáng,  tạo cảm giác thoải mái tối ưu </p>
                     <p>   - Họa tiết hoa đầy nữ tính, kết hợp màu sắc được phối tinh tế, là điểm cộng hoàn hảo cho gu thời trang của bạn gái.</p>
                    </td>
                    <td style="width: 50%;">
                     <?php
                        $ts= new Thamso();
                        $ts->getObject("tenthamso='DIEUKIEN'");
                        echo $ts->get_giatri();
                     ?>
                    </td>
                </tr>
            </table>

        </div>
                    <div class="clear_width"></div>

<?php include('footer.php'); ?>