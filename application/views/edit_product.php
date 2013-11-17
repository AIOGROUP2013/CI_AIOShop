<script>
    var idclick;
    var hide;
   $.event.add(window, "scroll", function() {
      $('#bg_edit_product').css({position: 'fixed', right: '10px',bottom: '0'});
             
    });
    $('.product_small_small,.product_small,.product_large,.product_avg').hover(
       
        function () {
           idclick=  $(this).attr('id');
            hide=$(this).parent();
              $(this).append(' <img onclick="myFunction()" class="image_edit_product longtrieu" src="<?= base_url();?>public/pencil.gif" style="position: absolute;bottom: 7px;right: 4px;cursor: pointer">');
        },
        function () {
           
              $('.image_edit_product').remove();
        }
    );
function readURL(input)
{
    
      if (input.files && input.files[0])
              {
                
                    var reader = new FileReader();
                   reader.onload = function (e)
                                          {
                                                $('#edit_images img')
                                                .attr('src',e.target.result);
                                          };
                   reader.readAsDataURL(input.files[0]);
                   }
}

   
function myFunction()
{
    
    var base_url="<?= base_url();?>";
     $('#bg_edit_product').show();
      $.ajax({
                type: "POST",
                url: base_url+'index.php/getproduct',
                data: {
                    id:idclick
                },
                success: function(data)
                {
                var getData = $.parseJSON(data);
                $('#edit_masp').val(getData[0].masp);
                $('#edit_tensp').val(getData[0].tensp);
                $('#edit_giacu').val(getData[0].giacu);
                $('#edit_giaban').val(getData[0].giaban);
                $('#edit_mota').val(getData[0].mota);
                $('#img_edit_product').attr('src',base_url+'public/images_product/'+getData[0].duongdan);
                }
            });
              $('#btnthem').click(function(){
               $('#edit_masp').val('');
                $('#edit_tensp').val('');
                $('#edit_giacu').val('');
                $('#edit_giaban').val('');
                $('#edit_mota').val('');
                $('#img_edit_product').removeAttr('src');

    });
    
      $('#btnxoa').click(function(){
           var base_url="<?= base_url();?>";
            $.ajax({
                type: "POST",
                url: base_url+'index.php/edit_product/delete',
                data: {
                    masp:  $('#edit_masp').val()
                },
                success: function(data)
                {
                      $('#bg_edit_product').hide();
                      hide.hide();
                }
            });
              
    });
}

</script>  
<div id="bg_edit_product">
    <form method="POST" action="<?php echo base_url()?>index.php/edit_product" enctype="multipart/form-data" >
                <div id="edit_product">
        <ul>
            <li>
                <label>Mã sản phẩm</label><input name="masp" type="text" style="text-align: center" readonly id="edit_masp">
            </li>
            <li>
                <label>Tên sản phẩm</label><input name="tensp"type="text" id="edit_tensp">
            </li>
            <li>
                <label>Loại sản phẩm</label>
                <select name="loaisp" id="select_edit_product" class="select medium">
                    <option value="1">First option</option>
                    <option value="2">Second option</option>
                    <option value="3">Third option</option>
                </select>
            </li>
            <li>
                <div style="clear: both"></div>
                <label>Giá cũ</label><input name="giacu"type="text" id="edit_giacu">
            </li>
            <li>
                <div style="clear: both"></div>
                <label>Giá bán</label><input name="giaban" type="text" id="edit_giaban">
            </li>
            <li><div style="clear: both"></div>
                <label>Mô tả</label>
                <div style="clear: both"></div>
                <textarea id="edit_mota" name="mota">

                </textarea>
            </li>
            <li>
                <div id="edit_images">
                        <label>Ảnh</label>
                        <div style="clear: both"></div>
                        <img id="img_edit_product">
                        <input type="file" name="file" style="width: 100%" id="edit_anh" onchange="readURL(this);">
                </div>
            </li>
            <li>
                <input type="submit" name="btnluu" class="btnsave_product" title="Lưu"   id="btnluu" value="Lưu"/>
                <input type="button" name="btnthem" class="btnsave_product" title="Thêm mới" id="btnthem" value="Thêm mới"/>
                <input type="button" name="btnxoa" class="btnsave_product" title="Xóa" id="btnxoa" value="Xóa"/>
            </li>
        </ul>
        <a class="btn_exit" title="Exit"></a>
    </div>
    </form>
</div>