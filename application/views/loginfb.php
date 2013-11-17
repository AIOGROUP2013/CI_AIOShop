<?php
$return_url = 'http://aio.is-best.net/index.php/loginfb';
if (isset($_GET["logout"]) && $_GET["logout"] == 1) {
//User clicked logout button, distroy all session variables.
    session_destroy();
    header('Location: ' . $return_url);
}
?>
<?php include('header.php'); ?>
<?php include('login.php'); ?>
<?php include('menu.php'); ?>

 <script>
 function AjaxResponse()
 {
	 var myData = 'connect=1'; //For demo, we will pass a post variable, Check process_facebook.php
	 jQuery.ajax({
	 type: "POST",
	 url: "http://aio.is-best.net/index.php/loginfb/facebook_process",
	 dataType:"html",
	 data:myData,
	 success:function(response){
		if (response.indexOf("exist") > 0) {
			window.location = "welcome";
		}
		else $(".contact_form").html(response);
 },
	 error:function (xhr, ajaxOptions, thrownError){
		alert(thrownError);
 	}
 });
 }
 
function LodingAnimate() //Show loading Image
{
	$("#LoginButton").hide(); //hide login button once user authorize the application
	$("#results").html('<img src="<?php echo base_url(); ?>public/icon/loading_login.gif" /> '); //show loading image while we process user
}

function ResetAnimate() //Reset User button
{
	$("#LoginButton").show(); //Show login button 
	$("#results").html(''); //reset element html
}

 </script>
<form class="contact_form" action="<?php echo base_url(); ?>index.php/loginfb/inser_userfb" method="post" name="contact_form">
    <ul>
        <li>
             <h2>Đăng nhập bằng tài khoản Facebook</h2>
             <span class="required_notification">* Trường bắt buộc</span>
        </li>
        <br>
        
        <?php
if (!isset($_SESSION['is_logged_in'])) {
    ?>
        <div id="results">
        </div>
        <center>
        <div id="LoginButton">
        <div class="fb-login-button" onlogin="javascript:CallAfterLogin();" size="medium" scope="publish_stream,email">Connect With Facebook</div>
        </div>
        </center>
    <?php
} else {
    echo 'Hi ' . $_SESSION['user_name'] . '! You are Logged in to facebook, <a href="?logout=1">Log Out</a>.';
}
?>
        
<div id="fb-root"></div>
<script type="text/javascript">
window.fbAsyncInit = function() {
FB.init({appId: '599132286816558',cookie: true,xfbml: true,channelUrl: 'http://aio.is-best.net/public/facebook/channel.php',oauth: true});};
(function() {var e = document.createElement('script');
e.async = true;e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);}());

function CallAfterLogin(){
		FB.login(function(response) {		
		if (response.status === "connected") 
		{
			alert(response.status);
			LodingAnimate(); //Animate login
			FB.api('/me', function(data) {
			  if(data.email == null)
			  {
					//Facbeook user email is empty, you can check something like this.
					alert("You must allow us to access your email id!"); 
					ResetAnimate();

			  }else{
					AjaxResponse();
			  }
		  });
		 }
		 else alert(response.status);
	});
}

</script>

    </ul>
</form>

<?php include('footer.php'); ?>
