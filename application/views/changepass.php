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
             <h2>Đổi mật khẩu cá nhân</h2>
             <span class="required_notification">* Trường bắt buộc</span>
        </li>
            <?php echo validation_errors(); ?>
			        <li>
            <label for="website">Mật khẩu hiện tại:</label>
            <input type="password" name="password" id="password" pattern="\w{6,}" onchange="
  this.setCustomValidity(this.validity.patternMismatch ? 'Mật khẩu dài hơn 6 ký tự' : ''); " required/>
            <span class="form_hint">Mật khẩu dài hơn 6 ký tự</span>
        </li>
        <li>
            <label for="website">Mật khẩu mới:</label>
            <input type="password" name="password" id="password" pattern="\w{6,}" onchange="
  this.setCustomValidity(this.validity.patternMismatch ? 'Mật khẩu dài hơn 6 ký tự' : ''); " required/>
            <span class="form_hint">Mật khẩu dài hơn 6 ký tự</span>
        </li>
        <li>
            <label for="website">Nhập lại mật khẩu mới:</label>
            <input type="password" name="cpassword" placeholder="Nhập lại mật khẩu" onfocus="validatePass(document.getElementById('password'), this);" oninput="validatePass(document.getElementById('password'), this);" required/>
            <span class="form_hint">Mật khẩu dài hơn 6 ký tự</span>
        </li>
		<li>
        	<button class="submit" type="submit">Đổi mật khẩu</button>
        </li>	

</form>

<?php include('footer.php'); ?>
