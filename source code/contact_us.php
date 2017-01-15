<?php include_once('php/main.php');?>

<div style="margin-top:40px"><h1><?php echo global_title;?></h1> 
        <h2><i><?php echo '<a href="#">'.global_organization.'</a>'; ?></i></h2>
        </div>

<div id ="main_menu_div" style="margin-left:170px; margin-top:20px;">
<div id="navigation-primary" class="system_config">
      <ul class="megamenu-1">
	  <li class="megamenu-li-first-level" ><a href="/" id="menu_home" class="" >Home</a></li>
	  <li class="megamenu-li-first-level" ><a href="#system_configuration" id="menu_system_configuration" class="">System Configuration</a></li>
	  <li class="megamenu-li-first-level" ><a href="#new_registration" id="menu_register" class="">Register Your Business</a></li>
	  <li class="megamenu-li-first-level" id="menu-main-title-383"><a href="#new_user" id="menu_sign_up" class="" >Sign Up</a></li>
	  <li class="megamenu-li-first-level" id="menu-main-title-383"><a href="#blogs" id="blogs">Blog</a></li>
	  <li class="megamenu-li-first-level" id="menu-main-title-383"><a href ="#conatct_us" class="active">Contact Us</a></li>
	  </ul>   
 </div>
 </div>




<div id="contact_div" class="contact_box">

<p>Required fields are <b>bold</b></p>

<form action="contact.php" method="post">
<p><b>Your Name:</b> <input type="text" name="yourname" /><br />
<b>Subject:</b> <input type="text" name="subject" /><br />
<b>E-mail:</b> <input type="text" name="email" /><br />
Website: <input type="text" name="website"></p>

<p>You are enquiring about ?</br>
<input type="radio" name="likeit" value="Yes" /> Registering your business/institution</br>
<input type="radio" name="likeit" value="No" /> Signing up to make a reservation</br>
<input type="radio" name="likeit" value="Not sure" /> Upgrading to a premium service</br>
<input type="radio" name="likeit" value="Not sure" /> Custom service</br>
<input type="radio" name="likeit" value="Not sure" checked="checked" /> Other</br></p>


<p>How did you find us?
<select name="how">
<option value=""> -- Please select -- </option>
<option>Google</option>
<option>Yahoo</option>
<option>Link from a website</option>
<option>Word of mouth</option>
<option>Other</option>
</select>

<p><b>Your comments:</b><br />
<textarea name="comments" rows="10" cols="40"></textarea></p>

<p><input type="submit" value="Send"></p>

<p> </p>
<p>Powered by <a>MBB Technology</a></p>

</form>

</div>
