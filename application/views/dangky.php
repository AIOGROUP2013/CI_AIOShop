<?php include('header.php'); ?>
<?php include($include); ?>
<?php include('menu.php'); ?>

<script type="text/javascript">
        function validatePass(p1, p2) {
            if (p1.value !== p2.value || p1.value === '' || p2.value === '') {
                p2.setCustomValidity('Mật khẩu lặp lại không đúng');

            } else {
            p2.setCustomValidity('');          
            }

    }

</script>
<form class="contact_form" action="<?php echo base_url(); ?>index.php/welcome/kiemtra_dangky_email" method="post" name="contact_form">
    <ul>
        <li>
             <h2>Thông tin tài khoản</h2>
             <span class="required_notification">* Trường bắt buộc</span>
        </li>
            <?php echo validation_errors(); ?>
        <li>
            <label for="name">Tên đăng nhập:</label>
            <input type="text" name='username' value="" placeholder="aioshop" 
 required />
        </li>
        <li>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="info@aioshop.vn" required />
            <span class="form_hint">Email có dạng "name@something.com"</span>
        </li>
        <li>
            <label for="website">Mật khẩu:</label>
            <input type="password" name="password" id="password" pattern="\w{6,}" onchange="
  this.setCustomValidity(this.validity.patternMismatch ? 'Mật khẩu dài hơn 6 ký tự' : ''); " required/>
            <span class="form_hint">Mật khẩu dài hơn 6 ký tự</span>
        </li>
        <li>
            <label for="website">Nhập lại mật khẩu:</label>
            <input type="password" name="cpassword" placeholder="Nhập lại mật khẩu" onfocus="validatePass(document.getElementById('password'), this);" oninput="validatePass(document.getElementById('password'), this);" required/>
            <span class="form_hint">Mật khẩu dài hơn 6 ký tự</span>
        </li>		
	

    </ul>
	<ul>
		<li>
             <h2>Thông tin khách hàng</h2>
             <span class="required_notification">* Trường bắt buộc</span>
        </li>
		
       <li>
            <label>Họ và tên đệm:</label>
            <input type="text" name="ho_tendem" placeholder="Nguyễn Văn" required />
        </li>
        <li>
            <label>Tên:</label>
            <input type="text" name="ten" placeholder="Thanh" required />
        </li>
        <li>
            <label>Số nhà - Tên đường:</label>
            <input type="text" name="sonha_tenduong" placeholder="Số 01 - Nguyễn Duy Trinh" required />
        </li>	
        <li>
            <label>Phường / Xã:</label>
            <input type="text" name="phuong_xa" placeholder="Bình Trưng Đông" required />
        </li>	
        <li>
            <label>Quận / Huyện:</label>
            <input type="text" name="quan_huyen" placeholder="Quận 2" required />
        </li>
        <li>
            <label>Tỉnh / TP:</label>
            <input type="text" name="tinh_tp" placeholder="TP Hồ Chí Minh" required />
        </li>
        <li>
            <label>Mã bưu chính:</label>
            <input type="text" name="ma_buuchinh" placeholder="08" required />
        </li>		
        <li>
            <label>Số điện thoại:</label>
            <input type="text" name="sdt" placeholder="01657990165" required />
        </li>		
		
        <li>
        	<button class="submit" type="submit">Đăng ký</button>
        </li>
	</ul>
</form>

<?php include('footer.php'); ?>
