<?php include_once('php/main.php'); ?>

<div id="header_inner_div">

<div id="header_inner_left_div">

<?php
{   if(  ( isset($_SESSION['logged_in']))  || (isset ($_SESSION['login_company_name']))  ){ 
	echo '<span><img class="image_class" src="image.jpg"  > <a href="">Home </a></span> | <a href="#blogs">Blog</a> | <a href="#new_registration">Register Your Business</a> |
   <a href="#new_user" >Sign Up</a>   ';
	}
	else{
	echo '<span><img class="image_class" src="image.jpg"  > <a href="">Home </a></span> ';
	}
}?>
</div>

<div id="header_inner_center_div">

<?php
/*
if(isset($_SESSION['logged_in']))
{
	echo '<b>Week ' . global_week_number . ' - ' . global_day_name . ' ' . date('jS F Y') . '</b>';
}
*/
?>

</div><div id="header_inner_right_div">

<?php

if(isset($_SESSION['logged_in']))
{
?>  
<span style="color:blue; font-size:12px; font-weight:bold"> 
G'Day <?php echo $_SESSION['user_name'];?> 
<?php if($_SESSION['user_is_admin']==1){ ?>
</span> - <span style="color:red; font-size:12px; font-weight:bold">Logged in as Administrator</span>
<?php ; }
echo' | <a href="#help">Help</a> | <a href="#">  Contact Us</a> | <a href="#logout">Log out</a>';
}
else
{
	echo '<a href="#new_user">New user </a>   |   <a href="#help">Help</a> | <a href="#contact_us">  Contact Us</a> ' ;
}

?>

</div></div>
