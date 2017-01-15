<?php
include_once('main.php');
if(check_login() != true) { exit; }
?>

<div id="all_configurations">

<div id="all_configurations_user">
        <div id="company_name_div" class="logged_in_user"><h1><?php echo global_title; ?> For</br>
		<h4><?php echo $_SESSION['db']; ?></h4>
		</h1>
		<p class = "by_mbb"><?php echo global_organization; ?></p>
		</div></br>
	
     <!-- <p style=" width:850px" id=" show_on_sign_up"> -->
	  <p style=" width:850px" id="">
	  Hello <span style="color:blue;  font-weight:bold"> <?php echo $_SESSION['user_name'];?> !</span></br> Welcome to the online reservation and booking system for <?php echo $_SESSION['db']; ?>. To make a reservation, simply click in the desired free time slot in the reservation table. If you have any questions about the reservations, contact the administrator  for this service at <span style="color:#4a8cf6"><?php $email = $_SESSION['db']; echo get_admin_email($email); ?></span>. For further imformation on how the reservation system works, please see the <a href="#help">help section</a>.
	  </p>
		
		
		<div id="show_reservation_table" class="show_me">
		<div class="box_top_div" id="reservation_top_div"><div id="reservation_top_left_div"><a href="." id="previous_week_a">&lt; Previous week</a></div><div id="reservation_top_center_div">Reservations Table For Week <span id="week_number_span"> <?php echo global_week_number; ?></span></div><div id="reservation_top_center_other_div"></div><div id="reservation_top_right_div"><a href="." id="next_week_a">Next week &gt;</a></div></div>
		
			<h3 class ="h3_heading"> 
			Today's Date:<?php echo date("F j, Y"); ?> </br> <span id="week_number_span"> Current week:<?php echo global_week_number;?>  </span>						
			</h3>
           </p> 
			<hr style="margin-bottom:-5px; margin-top:-6px">
			
			
	 
		<div id="reservation_table_div"></div><hr style="margin-top:10px"><div id="reservation_details_div">
		</div></div>
		
		
</div>		
</div>

