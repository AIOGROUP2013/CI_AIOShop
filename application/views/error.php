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
             <h2>Bạn không có quyền truy cập trang này. Vui lòng đăng nhập!</h2>
        </li>
	</ul>

</form>

<?php include('footer.php'); ?>
