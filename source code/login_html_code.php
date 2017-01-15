
<?php
//New user login form
/*******************************************************************************************************************************/
function show_new_user_login_form(){
?>

    <div id="company_name_div"><h1><?php echo global_title; ?></h1>
<h2><i><?php echo global_organization; ?></i></h2>
</div>

<div id ="main_menu_div" style="margin-left:120px">
<div id="navigation-primary" class="sitemenu">
      <ul class="megamenu-1">
	  	  <!--<li class="megamenu-li-first-level" ><a href="/" id="menu_home" class="active" >Home</a></li>-->
	  <li class="megamenu-li-first-level" ><a href="#new_registration" id="menu_register" class="">Home</a></li>
	  <li class="megamenu-li-first-level" id="menu-main-title-383"><a href="#new_user" id="menu_sign_up" class="active" >Business Registration</a></li>
	 <!-- <li class="megamenu-li-first-level" id="menu-main-title-383"><a href="#blogs" title="">Blog</a></li>-->
	   <li class="megamenu-li-first-level" ><a href="#system_configuration" id="menu_system_configuration" class="">System Configuration</a></li>
	  <li class="megamenu-li-first-level" id="menu-main-title-383"><a href ="#contact_us" title="">Contact Us</a></li>
	  </ul>   
 </div>
 </div>
    
	
	 <div class="login_box_div" id="register_div"><div class="login_box_top_div">
	
	<?php 
	if( $_SESSION['register'] == '1'){
	echo 'REGISTRATION';	
	}
	
	if($_SESSION['new'] == '1'){
	
	echo 'SIGN UP ';
	}
	?>
	</div>
     <div class="login_box_body_div">
	 
	<form action="." id="new_user_form"><p>
    
    <label for="user_company_input">Company/Organisation Name:</label><br>
	<input type="text" id="user_company_input" class="class_text_input"><br><br>	
	<label for="user_name_input">Name:</label><br>
	<input type="text" id="user_name_input" class="class_text_input"><br><br>
	<label for="user_mobile_number">Mobile Phone Number:</label><br>
	<input type="text" id="user_mobile_number" class="class_text_input"><br><br>
	<label for="user_email_input">Email:</label><br>
	<input type="text" id="user_email_input" class="class_text_input" autocapitalize="off"><br><br>	
	<label for="user_password_input">Password:</label><br>
	<input type="password" id="user_password_input" class="class_text_input"><br><br>
	<label for="user_password_confirm_input">Confirm password:</label><br>
	<input type="password" id="user_password_confirm_input" class="class_text_input"><br><br>

<?php

	if(global_secret_code != '0')
	{
		echo '<label for="user_secret_code_input">Secret code: <sup><a href="." id="user_secret_code_a" tabindex="-1">What\'s this?</a></sup></label><br><input type="password" id="user_secret_code_input"><br><br>';
	}

?>

    <?php
	if($_SESSION['new'] == '1'){
	?>
	<input type="submit" value="Sign Up">
	<?php
	}
	?>
	
	
	<?php 
	if( $_SESSION['register'] == '1'){
	?>
	<input type="submit" value="Register">
	<?php
	}
	?>
	<!--<input type="submit" value="Create user"> -->

	</p></form>

     <p id="new_user_message_p"></p>
	 <p id="login_message_p"></p>
	
	</div> </div>
	
	
	
	

	
	
	
	<?php 
	if( $_SESSION['register'] == '1'){
	?>
	<div class="box_summary_div" id="registration_info_div"> <p>
	
		 Registration is simple, fast and free!</br> The reservation system is designed for the users. It is easy to manage and comes with many customisation features to suite your business' requirements.</br>Register now and make you business more interactive.
	</p>
	</div>
	
	<div id="information_instruction" class="registration_instructions">
	<p class="blue_p bold_p" style="text-align:center"> Registration Information:</p>
	<ul>
	<li>The company/organisation name is the name of your business or institution</li>
	<li>A unique url is generated based on the supplied name above.</br> For example if you enter Beauty Hair saloon, the url to your reservations will be <span style="color:red"> www.mbbtech.com.au/#BeautyHairSaloon</span></li>
	<li>You must enter a valid phone number and email address. This is important so that you will be able to communicate with your clients and receive notifications about reservations.</li>
	<li>For more information see the <a href="#help">help</a> section.</br> If you have any questions, please <a href="#contact_us">contact us</a></li>
	</ul>
	</div>
	
	
	<?php
	}
	?>
	
	 <?php
	if($_SESSION['new'] == '1'){
	?>
	<div class="box_summary_div" id="registration_info_div"> <p>
	 <p>To make a reservation with your desired business/institution, sign up now. 
	</p> 
	</div>
	
	<div id="information_instruction" class="sign_up_instructions">
	<p class="blue_p bold_p" style="text-align:center"> Registration Information:</p>
	<ul>
	<li>The company/organisation name is the name of the business ori institution you intended to make a reservation with.</li>
	<li>You must enter a valid phone number and email address.</li>
	<li>For more information see the <a href="#help">help</a> section.</br> If you have any questions, please <a href="#contact_us">contact us</a></li>
	</ul>
	</div>
    <?php
    }
    ?>	
	   	


<?php
}
/**********************************************************************************************************************************/
?>


<?php
//forgot password
/********************************************************************************************************************************/
function show_forgot_password(){
?>
<div class="box_div" id="login_div"><div class="box_top_div"><a href="#">Start</a> &gt; Forgot password</div><div class="box_body_div">

	<p>Contact one of the admins below by email and write that you've forgotten your password, and you will get a new one. The password can be changed after logging in.</p>

	<?php echo list_admin_users(); ?>

	</div></div>
<?php
}
/*************************************************************************************************************************************/
?>













<?php
//homepage
/********************************************************************************************************************************/
function show_company_home(){
?>

<div id="company_name_div" class="logging_company_name"><h1><?php echo global_title; ?> For</br>
<h4><?php echo $_SESSION['login_company_name']; ?></h4>
</h1>
<p class = "by_mbb"><?php echo global_organization; ?></p>
</div>





 

 <div class="login_box_div" id="company_login_div"><div class="login_box_top_div">Log In</div><div class="login_box_body_div">

	<form action="." id="company_login_form" autocomplete="off"><p>     
	
     <input type="text" id="user_company_input" style ="display:none" class="class_text_input" value="<?php echo $_SESSION['login_company_name'];?>" autocapitalize="off">
	 
	<label for="user_email_input">Email:</label><br>
	<input type="text" id="user_email_input"  class="class_text_input" value="<?php echo get_login_data('user_email'); ?>" autocapitalize="off"><br><br>
	
	<label for="user_password_input">Password:</label><br>
	<input type="password" id="user_password_input" class="class_text_input" value="<?php echo get_login_data('user_password'); ?>" autocapitalize="off"><br><br>
	
	<?php 
	
	$secret_code = get_current_secrect_code();
	if ( strlen($secret_code) > 4){ ?>
	
	<label for="user_password_input">Secret code:</label><br>
	<input type="password" id="user_secret_input" class="class_text_input" value="" autocapitalize="off"><br><br>
	<?php
	}
	?>
	
	<!--
	<input type="checkbox" id="remember_me_checkbox" checked=""> <label for="remember_me_checkbox">Remember me</label><br><br>		
	<input type="submit" value="Log in">
	</p></form> 

	<p id="login_message_p"></p>
	<p style="text-align:center"><a href="#new_user">New user</a> | <a href="#forgot_password">Forgot password</a>  </p>
	-->
	<input type="checkbox" id="remember_me_checkbox" > <label for="remember_me_checkbox">Keep me signed in</label><br><br>		
	<input type="submit" value="Log in">
	</p></form> 

	<p id="login_message_p"></p>
	<p style="text-align:center"><span style="color:green"> New here? </span><a href="#new_user">Sign up</a>  <!--| <a href="#forgot_password">Forgot password</a> --> </p>

	</div></div>
	
	
	
	
	
 
 
<!--<div id="user_secret_code_div">Secret code is used to only allow certain people to create a new user. Contact the webmaster by email at <span id="email_span"></span> to get the secret code.</div>

	<script type="text/javascript">$('#email_span').html('<a href="mailto:'+$.base64.decode('<?php //echo base64_encode(global_webmaster_email); ?>')+'">'+$.base64.decode('<?php //echo base64_encode(global_webmaster_email); ?>')+'</a>');</script> -->

<div class="box_summary_div" id="company_logging_in_info_div"> <p>
	
		 Welcome to the online reservation & booking service provided by  <?php echo $_SESSION['login_company_name']; ?>. </br>If you have not signed up to this service yet, please <a href="#sign_up">sign up</a>. </br>If you have any questions regarding the reservation service provided by <?php echo $_SESSION['login_company_name']; ?>, contact the administrator at for this service at <span style="color:#4a8cf6"><?php $email= $_SESSION['login_company_name']; echo get_admin_email($email); ?></span>.
	</p>


<div id="information_instruction" class="company_logging_in_instructions">
	<p class="blue_p bold_p" style="text-align:center"> Logging In Information:</p>
	<ul>
	<li>This login page is only for the reservation service provided by <?php echo $_SESSION['login_company_name']; ?></li>
	<li>To log into another reservation service, go the service provider url. Alternatively go to <a href="">MBB Technology's homepage</a>.</li>
	<li>For more information, please visit the <a href="#help"> help </a> page.
	
	</ul>

	

</div>
	
	
	


<?php

}
/***********************************************************************************************************************************/
?>





<?php
//homepage
/********************************************************************************************************************************/
function show_home_page(){
?>

<div id="company_name_div"><h1><?php echo global_title; ?></h1>
<p class = "by_mbb"><?php echo global_organization; ?></p>
</div>
<p id="help_plz_message_p"></p>

<div id ="main_menu_div">
<div id="navigation-primary" class="sitemenu">
      <ul class="megamenu-1">
	  <!--<li class="megamenu-li-first-level" ><a href="/" id="menu_home" class="active" >Home</a></li>-->
	  <li class="megamenu-li-first-level" ><a href="#new_registration" id="menu_register" class="active">Home</a></li>
	  <li class="megamenu-li-first-level" id="menu-main-title-383"><a href="#new_user" id="menu_sign_up" class="" >Business Registration</a></li>
	 <!-- <li class="megamenu-li-first-level" id="menu-main-title-383"><a href="#blogs" title="">Blog</a></li>-->
	   <li class="megamenu-li-first-level" ><a href="#system_configuration" id="menu_system_configuration" class="">System Configuration</a></li>
	  <li class="megamenu-li-first-level" id="menu-main-title-383"><a href ="#contact_us" title="">Contact Us</a></li>
	  </ul>   
 </div>
 </div>

 

 <div class="login_box_div" id="login_div"><div class="login_box_top_div">Log In To Make A Reservation</div><div class="login_box_body_div">

	<form action="." id="login_form" autocomplete="off"><p>     
	
    
     <label for="user_company_input">Company/Institution:<span class="showhim" tabindex="-1"><a href="" ><sup>What is this ?<sup></a><span class="showme">This is the Company or business with which you would like to make a reservation with</span></span> </label><br>
	 <input type="text" id="user_company_input" class="class_text_input" value="<?php echo get_login_data('user_company'); ?>" autocapitalize="off"><br><br>
	 
	<label for="user_email_input">Email:</label><br>
	<input type="text" id="user_email_input"  class="class_text_input" value="<?php echo get_login_data('user_email'); ?>" autocapitalize="off"><br><br>
	
	<label for="user_password_input">Password:</label><br>
	<input type="password" id="user_password_input" class="class_text_input" value="<?php echo get_login_data('user_password'); ?>" autocapitalize="off"><br><br>
	
	<input type="checkbox" id="remember_me_checkbox" > <label for="remember_me_checkbox">Keep me signed in</label><br><br>		
	<input type="submit" value="Log in">
	</p></form> 
	<p id="login_message_p"></p>
	<p style="text-align:center"><span style="color:green"> New here? </span><a href="#new_user">Sign up</a>  <!--| <a href="#forgot_password">Forgot password</a> --> </p>

	</div></div>
 
 
<!--<div id="user_secret_code_div">Secret code is used to only allow certain people to create a new user. Contact the webmaster by email at <span id="email_span"></span> to get the secret code.</div>

	<script type="text/javascript">$('#email_span').html('<a href="mailto:'+$.base64.decode('<?php //echo base64_encode(global_webmaster_email); ?>')+'">'+$.base64.decode('<?php //echo base64_encode(global_webmaster_email); ?>')+'</a>');</script> -->


<div class="box_summary_div" id="summary_div"> <p>MBB technology's online booking & reservation is a fast and reliable system that is being rapidly adopted by small business and organizations across Australia.</br>The systems enables users to effectively make and manage their appointments in a timely and effective manner using a user friendly interface.
</p>
</div>	






<div  id="features_list_div" class=" features_list">
<div id="features_headline"> Features Of the System</div>
<ul class="features_rings" >
<ul>


<span class="show_features"><a href="">
<li>Free registration</a>
</li>
<span class="show_features_hover">Registration is 100% free</span></span>

<span class="show_features"><a href="">
<li>An extensive range of customisation options</a>
</li>
<span class="show_features_hover">The system comes equipped with a rich set of customisation features to suit any business reservation requirements.</span></span>

<span class="show_features"><a href="">
<li>SMS & email remainders</a>
</li>
<span class="show_features_hover">The system allows an easy set up of SMS & email remainders.</span></span>

<span class="show_features"><a href="">
<li>Friendly user interface</a>
</li>
<span class="show_features_hover">Making reservations is very easy. Users just have to click on a available time slot. </span></span>

<span class="show_features"><a href="">
<li>Get a unique URL</a>
</li>
<span class="show_features_hover">Get a unique url that clients can use to directly use to access the a business's reservation table .</a></span></span>

<span class="show_features" > <a href="#system_configuration" style="color:#d74937">view all the custom options</a></span>

</ul>

</ul>
</div>
		
	
	<div class="sign_new_company_box_div" id="sign_up_div"><div class="registration_box_top_div"><i style="color:red;font-size:12px; font-weight:bold">Free </i> Register Your Business </div>
	<p style="margin-top:20px">In today's digital age, business and institutions are rapidly embracing digital technology to help them expand and manage their client base.</br> This shift is  driven mainly by the cost saving and convenience of interacting with clients that the technology has brought forth.</br></br> 
	MBB technology's Online Booking and Reservation System  aims to help small business and institutions to effectively manage their resource booking and reservations.</br></br>
	 Registration is simple, fast and comes with a tonne of customisation features to suite your business' requirements.</br>Register now and make you business more interactive.
	</p>
	<input type="button" class="other_button" style="position:relative; top: -15px" id="new_registration" value="Register" onclick="window.location='#new_registration';"></br></br></br>
	
	 
	<!--
	<p>For users intending to make appointments, MBB technology's Online Booking and Reservation System offers an easy and quick way make and manage appointments.</br>
	To get started simply sign up with the company you wish to make an appointment. Registration is free! And most importantly, you get to choose decide not to receive SMS remainders during out of business hours!.</br>
	For further imformation and to learn how how system works, please visit the <a href="">help and FAQ</a> page.
	</p> 
	<input type="button" class="other_button" style="position:relative; top: -15px" id="new_registration" value="Sign Up" onclick="window.location='#new_user';"></br>
	-->

	</div>

		

<div class="companpy_info" id="company_content"> <p> MBB technology aims to provides integrated solutions over the web to help people control or access the services ,tools and devices they need from anywhere, at any time and on any device.</br>
By Combining the latest and cutting edge technology spanning from Web & Mobile Applications to Embedded Systems, we strive to make technology fun and accessible by delivering innovation through simplicity. </br></br>

The flexibility and capabilities of our technical team ensures the ability to satisfy any challenges that your business or institution might face in today's rapidly changing information technology landscape. </br></br>
To learn more about our company,  please visit the <a href="#blogs">company blog</a>. At MBB technology, <i>there is always a way</i>! </br>
For any questions or queries that you may, please feel free to <a href="">contact us</a>.
</p>
	
	
	
	
	</div> 	
	
	
	


<?php

}
/***********************************************************************************************************************************/
?>

