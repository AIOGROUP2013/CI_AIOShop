<script>
    $(document).ready(function() {
        $(".btnupdate").click(function() {
            $rowid = $(this).parent().attr("class");
            $qty = $("." + $rowid).find('.soluongsp').val();
            $.ajax({
                type: "GET",
                url: 'index.php/carts/update',
                data: {
                    rowid: $rowid,
                    qty: $qty
                },
                success: function(data)
                {
                    //$("#div-loaisp").html(data); 

                    $("#danhsachsp").html(data);
                }
            });
        });
        $(".soluongsp").change(function() {
            $rowid = $(this).parent().attr("class");
            $qty = $(this).val();
            $.ajax({
                type: "GET",
                url: 'index.php/carts/update',
                data: {
                    rowid: $rowid,
                    qty: $qty
                },
                success: function(data)
                {
                    //$("#div-loaisp").html(data); 

                    $("#danhsachsp").html(data);
                }
            });
        });
        $(".remove").click(function() {
            if (confirm('Bạn có muốn xóa sản phẩm này không?')) {
                $rowid = $(this).parent().attr("class");
                $.ajax({
                    type: "GET",
                    url: 'index.php/carts/delete',
                    data: {
                        rowid: $rowid
                    },
                    success: function(data)
                    {
                        //$("#div-loaisp").html(data); 

                        $("#danhsachsp").html(data);
                    }
                });
            }
        });
       
    });
</script>
<ul>
    <div class="clear"></div>
    <?php
    $bang = $this->cart->contents();
    foreach ($bang as $items) {
        ?>
        <li class="<?= $items['rowid']; ?>">
            <button class="remove" name="remove-from-cart" title="Remove from cart"><span><!-- / --></span></button>            
            <span class="tensp"><?= $items['name']; ?></span>
            <span class="giasp"><?= $items['price'] . ' VNĐ'; ?> </span>
            <input class="soluongsp" data-type="number" type="number" min="1" title="" data-cart-default-quantity="1" value="<?= $items['qty']; ?>" step="1"
                   name="quantity">
        </li>
    <?php } ?>

</ul>
<div>
    <button name="go-to-checkout" class="btnthanhtoan" title="Checkout" >THANH TOÁN </button>
    <h5 class="tongtien">
        <span class="texttongcong">Tổng cộng:</span> <b>$</b><strong><?= $this->cart->total(); ?></strong> <em>VNĐ</em>
    </h5>
</div>