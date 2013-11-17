<html>
<head>
<meta charset="utf-8">
<meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>AIO SHOP</title>
    <link rel="stylesheet" href="<?php echo base_url()."public/main.css";?>">
    <link rel="stylesheet" href="<?php echo base_url()."public/style.css";?>">
    <script type="text/javascript" src="<?php echo base_url()."public/javascript/jquery.js";?>" ></script>
    <script type="text/javascript"  src="<?php echo base_url()."public/javascript/Java.js";?>" ></script>
</head>
<body>
<!-- div contain chứa toàn bộ trang web-->
	<article id="contain">
  
    <!--div header trên cùng của trang chứa logo , lời giới thiệu --->
        <header id="top_header">
               <div id="topmenu" >
                   
                      <div id="login_menu">
                          <ul>
                              
                              <li> <a href="<?php echo $link_logout ?>"><?php echo $log_out?></a> </li>
                              <li>
                                  <a href="<?php echo $link ?>"><?php echo $text_after?></a> 
                              </li>
                              <li id="buttonlogin"> <a><?php echo $text_before?>  <img src="<?=base_url()?>public/icon/dropdown_icon.png"></a> </li>


                              <div class="clear"></div>
                          </ul>
                      </div>