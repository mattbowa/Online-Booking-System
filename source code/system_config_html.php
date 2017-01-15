<?php

//include_once('main.php');
include_once('php/main.php');
if(isset($_GET['make_reservation']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo make_reservation($week, $day, $time);
}
elseif(isset($_GET['delete_reservation']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo delete_reservation($week, $day, $time);
}
elseif(isset($_GET['read_reservation']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo read_reservation($week, $day, $time);
}
elseif(isset($_GET['read_reservation_details']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo read_reservation_details($week, $day, $time);
}
elseif(isset($_GET['week']))
{
	$week = $_GET['week'];
	
		
	/***************************************************************************/
	?> 
		



		
		<?php
		
        $week = 32;
		echo '<table id="reservation_table"><colgroup span="1" id="reservation_time_colgroup"></colgroup><colgroup span="7" id="reservation_day_colgroup"></colgroup>';

		$days_row = '<tr><td id="reservation_corner_td"><input type="button" class="blue_button small_button" id="reservation_today_button" value="Today"></td><th class="reservation_day_th">Monday</th><th class="reservation_day_th">Tuesday</th><th class="reservation_day_th">Wednesday</th><th class="reservation_day_th">Thursday</th><th class="reservation_day_th">Friday</th>
		<th class="reservation_day_th">Saturday</th><th class="reservation_day_th">Sunday</th></tr>';

		if($week == global_week_number)
		{
		echo highlight_day($days_row);
		}
		else
		{
		echo $days_row;
		}
     
		
		foreach($global_times as $time)
		{
		echo '<tr><th class="reservation_time_th">' . $time . '</th>';

		$i = 0;
       
		while($i < 7)
		//while($i < 5)
		{
		$i++;

		echo '<td><div class="reservation_time_div"><div class="reservation_time_cell_div" id="div:' . $week . ':' . $i . ':' . $time . '" onclick="void(0)">' . "" . '</div></div></td>';
		}

		echo '</tr>';
		}

		echo '</table>';
		}


else
{
}



	?>



<?php

function show_system_configuration(){

?>
<div id="all_configurations">

     <div id="company_name_div" class="system_configuration"><h1><?php echo global_title; ?></h1>
<p class = "by_mbb"><?php echo global_organization; ?></p>
</div>





 

<p style="text-align:center; font-weight:bold; margin-left:-1250px" id="hide_system_configuration_p"><a href="" >[Hide System Configuration Panel]</a></p>
<div id="system_configuration_div" class="system_configuration_header"> System Configuration
		<div class="config_button_area_color">
		<input type="button" class="configuration_button" id="show_all" value="Show All Settings" ></br></br>
		
		<input type="button" class="configuration_button" id="settings" value="Remainders / Notifications - SMS & Email" style="background-color:#d74937"></br></br>
		<input type="button" class="configuration_button" id="reserv_table_settings" value="Configure & Edit Reservation Table" ></br></br>
		
		<input type="button" class="configuration_button" id="url_settings" value=" URL Settings"></br></br>
		<input type="button" class="configuration_button" id="user_registration" value=" New User Registration Settings"></br></br>
		
				
		<input type="button" class="configuration_button" id="database_admin" value="System Management"></br></br>
		 <!--<input type="button" class="configuration_button" id="system_config" value="System configuration"></br></br> 
		<input type="button" class="configuration_button" id="usage" value="Reservation Usage"></br></br>-->
		
		<input type="button" class="configuration_button" id="admin_detail" value="Update Administrator & Users' Details"></br></br>
		<input type="button" class="configuration_button" id="user_admin" value="Manage Users"></br></br>
			
		</div>	
        </div>		
	

	
	

<div id="all_configurations_inner" >
  
	
       
		
		
		<p id = "demo_config" ></br></p>
		<p style=" width:850px; margin-top:40px;  margin-left:-2px">The configuration settings shown on this page are just a demonstration of the features available to MBB technology's Online and reservation system.</b>
		To go through all the settings, use the configuration menu on the left.</b>
		To get started, <a href="#new_registration"> register</a>. 
		Registration is free and only take a few seconds.</p></br>
	
		
			
				
		<div id="your_settings" class="show_me">	
             <div class="box_top_div" id="reservation_top_div"><div id="reservation_top_center_other_div">Remainders / Notifications - SMS & Email </div></div>		
			<hr style="margin-bottom:-5px; margin-top:6px">
			<h3 style="color:#d74937">Notification settings</h3>
			<p>By default, all reservation remainders are sent out at 9am on the day the reservation is due. This can be customised to suit the business needs. For a example, you can set for remainders to be sent out 2 hours before the appoint is due. You can also individually set which users to receives remainders at different times. To sign up to a premium account, please <a href="#contact_us"> contact us </a></p>
			
			<p id="d_sms_reminders_checkbox" class="radio_button">
			<input type="checkbox" id="sms_reminders_checkbox_d">
			<label for="sms_reminders_checkbox_d">Enable sms reminders </label></p>
			<p id="d_sms_message_p"></p>

			<p id="uncheck_email_reminders_checkbox_d" class="radio_button">
			<input type="checkbox" id="email_reminders_checkbox_d">
			<label for="email_reminders_checkbox_d">Enable Email reminders </label></p>
			<p id="d_email_message_p"></p>

			<hr style="margin-bottom:-5px">
			<h3 style="color:#d74937">Notification Message</h3>
			<p><p>Notification messages are the message sent out in the email and SMS remainders. The messages below are the default message sent out in the SMS and email remainders' respectively.</br>
            The messages can be edited to suit the business notification remainders. To change the messages simply make changes below.
			The following are fixed values.
			<li>
            <span style="color:red">[user_name]</span> uniquely identifies a client by their given name.			
			</li>
			<li>
            <span style="color:red">[business_name]</span> This is the business or institution name.			
			</li>
			<li>
            <span style="color:red">[appointment_date] </span> The date the reservation is due .			
			</li>
			<li>
            <span style="color:red">[appointment_time]</span> The time of the appointment.			
			</li>
			If you do not wish to include the either one or all the variables above in the message, simply delete the desired variable.</br>
			The <span style="color:green">text in green</span> can be edited to suite the business message content.
			</p>	  

			<p style="color:#4a8cf6; font-size:12px; font-weight:bold; margin-bottom:0px">Edit SMS Remainder Message:</p>
			<div  style="color:green" id="text_editable" contentEditable="true"><p>
			Hello <span style="color:red">[user_name]</span>,</br> 
			This is a remainder for your appointment with <span style="color:red">[business_name]</span> today, the <span style="color:red">[today's_date]</span> , at <span style="color:red">[appointment_time]</span>.</br> 
			The team,</br>
		    <span style="color:red">[business_name]</span>
			
			</p></div>
			</br>
			<input type="submit" id="d_update_sms_message_button" class="active_configuration_button" value="Update SMS remainder message">
			<p id="d_update_sms_message_p"></p>


			<p style="color:#4a8cf6; font-weight:bold;  font-size:12px; margin-bottom:0px">Edit Email Remainder Message:</p>
			<div  style="color:green" id="text_editable" contentEditable="true">
			<p>Hello <span style="color:red">[user_name]</span>,</br> 
			This is a remainder for your appointment with <span style="color:red">[business_name]</span> today, the <span style="color:red">[today's_date]</span> , at <span style="color:red">[appointment_time]</span>.</br> 
			The team,</br>
		    <span style="color:red">[business_name]</span>.
			</p></div>
			
		    <input type="submit" id="d_update_email_message_button" class="active_configuration_button" value="Update email remainder message">
			<p id="d_update_email_message_p"></p>
			<hr style="margin-top:-5px"></br>
			
			<hr style="margin-bottom:-5px">
			<h3 style="color:#d74937">SMS Feedback  </h3>
			<p>When this setting is enabled, A client is sent a SMS remainder with Instructions to reply with Y (yes) or N (No).</br> 
			This feature is particularly useful because it provides a responsive service that enables the business owner to determine if the client is still able to make the appointment.This gives the option to take appropriate action if there is no response from the client.
			
			<p id="d_uncheck_sms_feedback" class="radio_button">
			<input type="checkbox" id="d_sms_feedback_checkbox">
			<label for="d_sms_feedback_checkbox">Enable SMS feedback </label></p>
			<p id="d_sms_feedback_message_p"></p>
			
			<p id="demo_sms_feedback_message_p"></p>
			<hr style="margin-top:-5px"></br>


			<hr style="margin-bottom:-5px">
			<h3 style="color:#d74937">Real Time Response </h3>
			<p>Real time response is a set of features that creates a an event driven system. These includes options getting real time response when a  client signs up, makes or cancels a reservation and many other event driven real time appropriate responses. Notifications from this feature can be customised to be sent by either email or SMS.</p>
			
			<p id="d_uncheck_real_time" class="radio_button">
			<input type="checkbox" id="d_real_time_checkbox">
			<label for="d_real_time_checkbox">Enable real time response </label></p>
			<p id="d_real_time_message_p"></p>
			
			<hr style="margin-top:-5px; margin-bottom:1px">
		</div>
		
		
	    <div id="show_reservation_table" >
		<div class="box_top_div" id="reservation_top_div"><div id="reservation_top_left_div"><a href="." id="previous_week_a">&lt; Previous week</a></div><div id="reservation_top_center_div">Reservations Table For Week <span id="week_number_span"> <?php echo global_week_number; ?></span></div><div id="reservation_top_center_other_div"></div><div id="reservation_top_right_div"><a href="." id="next_week_a">Next week &gt;</a></div></div>
		
			<h3 class ="h3_heading"> 
			Today's Date:<?php echo date("F j, Y"); ?> </br> <span id="week_number_span"> Current week:<?php echo global_week_number;?>  </span>						
			</h3>
			
			
				
			<hr style="margin-bottom:-5px; margin-top:-6px">
			<h3 style="color:#d74937">Add/Remove reservation days</h3>
			<p>To remove or add reservation days, add or remove the days shown.</p>
			
				
			<p id="d_uncheck_reservation_days" >
			<input type="checkbox" id="d_reservation_days_monday" checked="checked"> 
			<label class ="reservation_days">Monday </label>
			<input type="checkbox" id="d_reservation_days_tuesday" checked="checked"> 
			<label class ="reservation_days">Tuesday </label>
			<input type="checkbox" id="d_reservation_days_wednesday" checked="checked"> 
			<label class ="reservation_days">Wednesday </label>
			<input type="checkbox" id="d_reservation_days_thursday" checked="checked"> 
			<label class ="reservation_days"">Thursday </label>
			<input type="checkbox" id="d_reservation_days_friday" checked="checked"> 
			<label class ="reservation_days">Friday </label>
			<input type="checkbox" id="d_reservation_days_saturday"> 
			<label class ="reservation_days">Saturday</label>
			<input type="checkbox" id="d_reservation_days_sunday" > 
			<label class ="reservation_days">Sunday</label>
			</p>
			
			<p id="d_reservation_days_message_p"></p>
			<input type="button" class="active_configuration_button" id="d_reservation_days_button" value= "Update reservation days"> </br></br>
		
			
			
			
		
			 <h3 style="color:#d74937">Add/Remove reservation times</h3>
			<p>To edit reservation times, simply add or remove the time slots shown below.</p>
			
		    <p id="d_uncheck_reservation_times" >
			<input type="checkbox" id="time_08-09"  > 
			<label class="reservation_times">08-09</label>
			<input type="checkbox" id="time_09-10" checked="checked" > 
			<label class="reservation_times">09-10</label>
			<input type="checkbox" id="time_10-11" checked="checked" > 
			<label class="reservation_times">10-11</label>
			<input type="checkbox" id="time_11-12" checked="checked" > 
			<label class="reservation_times">11-12</label>
			<input type="checkbox" id="time_12-13" checked="checked" > 
			<label class="reservation_times">12-13</label>
			<input type="checkbox" id="time_13-14" checked="checked" > 
			<label class="reservation_times">13-14</label>
			<input type="checkbox" id="time_14-15" checked="checked" > 
			<label class="reservation_times">14-15</label>
			<input type="checkbox" id="time_15-16" checked="checked" > 
			<label class="reservation_times">15-16</label>
			<input type="checkbox" id="time_16-17" checked="checked" > 
			<label class="reservation_times">16-17</label>
			<input type="checkbox" id="time_17-18" > 
			<label class="reservation_times">17-18</label>
			<input type="checkbox" id="time_18-19"  > 
			<label class="reservation_times">18-19</label>
			<input type="checkbox" id="time_19-20"  > 
			<label class="reservation_times">19-20</label>
			</p>
			
			<p id="d_reservation_times_message_p"></p>
			<input type="button" class="active_configuration_button" id="d_reservation_time_button" value= "Update reservation times"></br>
			
			</br>
			<hr style="margin-top:-5px">
			
			
		    
		
		
		<?php
		
		 $week = 32;
		echo '<table id="reservation_table"><colgroup span="1" id="reservation_time_colgroup"></colgroup><colgroup span="7" id="reservation_day_colgroup"></colgroup>';

		$days_row = '<tr><td id="reservation_corner_td"><input type="button" class="blue_button small_button" id="reservation_today_button" value="Today"></td><th class="reservation_day_th">Monday</th><th class="reservation_day_th">Tuesday</th><th class="reservation_day_th">Wednesday</th><th class="reservation_day_th">Thursday</th><th class="reservation_day_th">Friday</th>
		<th class="reservation_day_th">Saturday</th><th class="reservation_day_th">Sunday</th></tr>';

		if($week == global_week_number)
		{
		echo highlight_day($days_row);
		}
		else
		{
		echo $days_row;
		}
           $global_times = array('09-10', '10-11', '11-12', '12-13', '13-14', '14-15', '15-16', '16-17');
		foreach($global_times as $time)
		{
		echo '<tr><th class="reservation_time_th">' . $time . '</th>';

		$i = 0;
       
		while($i < 7)
		//while($i < 5)
		{
		$i++;

		echo '<td><div class="reservation_time_div"><div class="reservation_time_cell_div" id="div:' . $week . ':' . $i . ':' . $time . '" onclick="void(0)">' . "" . '</div></div></td>';
		}

		echo '</tr>';
		}

		echo '</table>';
		
		
		?>
		
		
		
		
		
		
		
		
		
		
				
		</div>	

		
		
		
		<div id="url_setting_options" >
			<div class="box_top_div" id="reservation_top_div"><div id="reservation_top_center_div">URL Settings </div></div>		
			<hr style="margin-bottom:-5px; margin-top:6px">
			<h3 style="color:#d74937">Url Settings</h3>		  
			<p>The default URL to the this reservation service is <span style="color:red; font-weight:bold"> www.mbbtech.com.au/#YourBusinessName</span>
			This URL is automatically created using the business/institution name supplied during the registration process. You can request to change the URL to a different by submitting the desired name.</br>The new url will automatically take into effect after submitting the request. For example if  "Beauty Hair Saloon" is entered. The new url will be <span style="color:red; font-weight:bold"> "www.mbbtech.com.au/#BeautyHairSaloon</span>".</br>
			
            
			<form action="." id="request_new_url_form" autocomplete="off"><p>     
      
			<label for="user_email_input" style="color:red">www.mbbtech.com.au/</label>
			<input type="text" id="new_url_input"  class="class_text_input" value="" autocapitalize="off">		
					
			<p><input type="button" class="active_configuration_button"  id="new_url_button" value="Request a new url"></p>
			</p></form> </br>
			<p id="new_url_message_p"></p>
			<p id="show_after_url_cahnge">The url has been successfully changed to <span style="color:red; font-weight:bold"> www.mbbtech.com.au/#<span id="new_url_name"></span></span>.</p>
			<p>To have the reservation system directly embedded into your website, please <a href="conatct_us"> contact us</a></p>.
			
			<hr style="margin-top:5px; margin-bottom:1px">
			
			<hr style="margin-top:5px; margin-bottom:1px">
		</div>



		



		<div id="database_administration">
			<div class="box_top_div" id="reservation_top_div"><div id="reservation_top_center_div">System Management</div></div>		
			<hr style="margin-bottom:-5px; margin-top:6px">
			<h3 style="color:#d74937">System Management</h3>
			<p class="center_p">
			<input type="button" class="active_configuration_button" id="delete_all_reservations_button" value="Delete all reservations">
			<input type="button" class="active_configuration_button" id="delete_all_users_button" value="Delete all users"> 
			<input type="button" class="active_configuration_button" id="delete_everything_button" value="Delete everything">
			</p>   
			<p>These will require a confirmation. Your user and reservations will not be deleted unless you delete       everything.</p>
			<p id="database_administration_message_p"></p>
			<hr style="margin-top:-5px; margin-bottom:1px">
		</div>




		 <div id="user_registration_setting">
		
			<div class="box_top_div" id="reservation_top_div"><div id="reservation_top_center_div">New User Registration </div></div>		
			<hr style="margin-bottom:-5px; margin-top:6px">
			<h3 style="color:#d74937">Registration settings</h3>
			<p>Registration can be enabled or disabled by selecting the desired setting below. By default, registration is enabled.</p>
			<p class="radio_button">
			<input type="radio" id="enable_registration" name="registration_radio" checked="checked" />
			<label for="enable_registration"  >Enable_Registration</label></p>
			<p id="enable_registration_message_p"></p>
			<p class="under_radio_button"> When selected, users must register before the can make a reservation.</br> The reservation table will only be visible 
			    to users who have signed up to you reservation service.			
			</p>
			
			<p class="radio_button">
			<input type="radio" id="disable_registration" name="registration_radio"   />
			<label for="disable_registration" id="disabling_registration " >Disable Registration</label></p>
			<p id="disable_registration_message_p"></p>
			<p class="under_radio_button"> This is the alternative option. When selected, user reach your reservation table without signing up to your reservation service.</b> Please note that this means that anonymous clients with knowledge of your unique url or who search for your reservation service through our system will be able to make reservations. 			
			</p>			
		
            <input type="button" style="margin-left:36px" class="active_configuration_button" id="d_registration_enabling_button" value="Update registration settings">
			
			<p  id="d_registration_enabling_message_p"></p>
			<hr style="margin-top:-5px"> </br>
			
			<hr style="margin-bottom:-5px"> 
			<h3 style="color:#d74937">Who can sign up</h3>
			<p>This setting restricts users who can sign up to a business' online reservation service. The settings can be set to allow anyone to sign up or restrict the process to only clients with knowledge of the secret code. </p>
			<p class="radio_button">
			<input type="radio" id="registration_anyone" name="who_can_radio" checked="checked" />
			<label for="registration_anyone" >Anyone</label></p>
			<p class="under_radio_button">This options allows any user to sign up to a business reservation service.</p>
			
			<p class="radio_button">
			<input type="radio" id="registration_secret" name="who_can_radio"  />
			<label for="registration_secret" >Set Secret code</label></p>
			<p class="under_radio_button" style="margin-bottom:0px"> With this option, a six digit secret code is set. Anyone is still allowed to sign up to the reservation service , but they must also enter the secret code.</br> This option is necessary when only users with prior knowledge of the secret code are allowed to sign up. </p>
			<span > <label for="user_email_input" style="color:#d74937; font-weight:bold; margin-left:36px">
			Enter Secret Code:</label><input type="text" id="who_can_input" autocapitalize="off" value=""/>
			</span></br></br>
			
			<input type="button" style="margin-left:36px" class="active_configuration_button" id="d_who_can_register_button" value="Update registration access settings">
			</p>
			<p  id="d_who_can_register_message_p"></p>
			
			
			
			<hr style="margin-bottom:-5px">
			<h3 style="color:#d74937">Welcome Email or SMS Message</h3> 
			<p> When enabled, a welcome message is sent to a user when the sign up to a business reservation service. The message is sent out via email.</br> 
			The messages can be edited to suit the business notification remainders. To change the messages simply make changes below.
			The following are fixed values.
			<li>
            <span style="color:red">[user_name]</span> uniquely identifies a client by their given name.			
			</li>
			<li>
            <span style="color:red">[business_name]</span> This is the business or institution name.			
			</li>
			<li>
            <span style="color:red">[appointment_date] </span> The date the reservation is due .			
			</li>
			<li>
            <span style="color:red">[appointment_time]</span> The time of the appointment.			
			</li>
			If you do not wish to include the either one or all the variables above in the message, simply delete the desired variable.</br>
			The <span style="color:green">text in green</span> can be edited to suite the business message content.
			</p></br>
			
			<!--
			<p id="un_check_me_sms_welcome" style="color:#4a8cf6; font-weight:bold; margin-left:10px">
			<input type="checkbox" id="premium_sms_welcome_checkbox" >
			<label for="premium_sms_welcome_checkbox">Enable an sms welcome message  </label></p>
			<p id="premium_sms_welcome_message_p"></p>-->
			
		
			
			<p id="un_check_me_email_remainder" style="color:#4a8cf6; font-weight:bold; margin-left:10px; margin-top:-10px">
			<span id="sms_reminders_span"><input type="checkbox" id="premium_email_welcome_checkbox" checkbox=""></span> 
			<label for="premium_email_welcome_checkbox">Enable an email welcome message </label></p>
			<p id="premium_email_welcome_message_p"></p>
			
			<label for="" style="color:red; font-size:12px; font-weight:bold">Edit Welcome  Message:</label><br>
			<div  style="color:green" id="text_editable" contentEditable="true"><p>
			 Hello <span style="color:red">[user_name]</span>,</br> 
			Thank you for registering with the online reservation service by <span style="color:red">[your_business_name]</span> today, the <span style="color:red">[today's_date]</span> , at <span style="color:red">[appointment_time]</span>.</br> 
			For any questions, please contact us at <span style="color:red">[your_email_address].</span></br>
			The team,</br>
		    <span style="color:red">[your_business_name]</span></p>
			</div>
			
			<input type="submit" class="active_configuration_button" value="Update welcome Message">
			<p id="welcome_email_message_p"></p>		
			<hr style="margin-top:-5px; margin-bottom:1px">
			
		

			
			
			
			
			
			<hr style="margin-bottom:-5px">
			<h3 style="color:#d74937">Additional Features<!--<span class="showhim" tabindex="-1"><a href="" ><sup style="font-style:italic; font-size:10px">Premium Service<sup></a><span class="showme">This service is only available to premium subscribers. To set up a premium user account, please <a href="">contact us</a></span></span>--></h3>
					
			
			<p  id="d_uncheck_me_timed_session" class="radio_button">
			<input type="checkbox" id="d_timed_session_checkbox" > 
			<label for="d_timed_session_checkbox" >One time booking session</label> </p>
			<p id="d_one_timed_message_p"></p>			
			<p class="under_radio_button">Sometimes, it is not necessary for clients to sign up to a services in order to make a reservation. This might be the case when clients only need to book once.</br> When enabled, the feature will send a url with a time limit session to a client's given email address. This unique url will directly lead the client to a business reservation service. The session url can be set to expire within any given time interval.</p>
			
			<p  id="d_uncheck_me_geographical" class="radio_button">
			<input type="checkbox" id="d_geographical_checkbox" >
			<label for="d_geographical_checkbox"  >Restrict users based on geographical location</label> </p>
			<p id="d_geographical_message_p"></p>			
			<p class="under_radio_button">The option allows only users from a certain geographical area to sign up. The setting can be set to select users from only certain cities, states and countries based on their IP address.</br> This helps to limit signing up to only clients living in the areas that a given business operates.</p>
						
			<hr style="margin-top:5px; margin-bottom:1px">
			
			<h3 style="color:#d74937">Custom Service</h3></br>
					
					
			<p class="under_radio_button">At MBB technology, <i>there is always a way</i>!</br> For any other configuration features we have not listed or that which might better suite your business needs, please feel free to <a href="contact_us">contact_us</a>.</p>
			
			<hr style="margin-top:5px; margin-bottom:1px">
			
			
		</div>
		
		
		


		<div id="admin_details">
			
			<div class="box_top_div" id="reservation_top_div"><div id="reservation_top_center_div">Update Administrator And User's Details</div></div>		
			<hr style="margin-bottom:-5px; margin-top:6px">
			<h3 style="color:#d74937">Administrator details</h3>
			
			<p >The Administrator and users' details updated by edidting the fields below.</br> To change user's details make sure you enter their current email correctly.You can then choose to update their email (by entering new email), name and mobile number.</br>
			If you do not intend to change a user's password, the password fields can be left blank.
			</p>
			<div style="margin-left:90px">
			<form action="." id="user_details_form" autocomplete="off"><p>
			
			<div>
			<label for="user_email_input">Current Email:</label><br>
			<input type="text" id="user_email_input" autocapitalize="off" value="<?php //echo $_SESSION['user_email']; ?>"></br></br>
			<label for="user_email_input"> New Email:</label><br>
			<input type="text" id="user_email_input" autocapitalize="off" value="<?php //echo $_SESSION['user_email']; ?>"></br></br>
			<label for="user_name_input">Name:</label><br>
			<input type="text" id="user_name_input" value="<?php //echo $_SESSION['user_name']; ?>"><br><br>
			<label for="user_email_input">Mobile Number:</label><br>
			<input type="text" id="user_email_input" autocapitalize="off" value="<?php //echo $_SESSION['user_email']; ?>">
			</div>
			</div>
			<p><span style="color:#d74937"> To change the Administrator's details, you MUST enter the password.</span> Further, to update an Administrator's password you must enter current password and confirm the new password.</p>
			<div style="margin-left:90px">
			<label for="user_password_input">Current Password:</label><br>
			<input type="password" id="user_password_input"><br><br>
			<label for="user_password_input">New Password:</label><br>
			<input type="password" id="user_password_input"><br><br>
			<label for="user_password_confirm_input">Confirm New Password:</label><br>
			<input type="password" id="user_password_confirm_input">
			
			<p><input type="submit" class="active_configuration_button" value="Update Admin Details"></p>
			</p></form>
			<p id="user_details_message_p"></p>
			</div>
			<hr style="margin-top:-5px; margin-bottom:1px">
		</div>	
		
		
		
		<div id="user_administration" >		
			<div class="box_top_div" id="reservation_top_div"><div id="reservation_top_center_div">Manage Users</div></div>		
			<hr style="margin-bottom:-5px; margin-top:6px">
			<h3 style="color:#d74937">User administration</h3>
			<p>Current users are shown below. You can reset a user's password, make a user an administrator, delete all reservations made by a user and delete a user from the system simply by selecting a desired user and clicking on one of the options below.</p>

			<p class="center_p">
			<input type="button" class="active_configuration_button " id="reset_user_password_button" value="Reset password">
			<input type="button" class="active_configuration_button " id="change_user_permissions_button" value="Make administrator">
			<input type="button" class="active_configuration_button" id="delete_user_reservations_button" value="Delete reservations by user"> 
			<input type="button" class="active_configuration_button" id="delete_user_button" value="Delete user">
			</p>
			<p class="center_p" id="user_administration_message_p"></p>
			
			<hr style="margin-top:-5px; margin-bottom:1px">
			<div id="users_div">
			<?php //echo list_users(); ?>
			</div> 
			<hr style="margin-top:-5px; margin-bottom:1px">
		</div>
		
	




			<!--
		<div id="system_configuration">
		<h3>System configuration</h3>

		<p class="smalltext_p">Changing the price will not affect previous reservations.</p>

		<form action="." id="system_configuration_form"><p>

		<input type="text" id="price_input" value="<?php //echo get_configuration('price'); ?>"> <label for="price_input">Price per reservation, in <?php //echo global_currency; ?></label><br><br>

		<input type="submit" class="active_configuration_button" value="Save configuration">

		</p></form>

		<p id="system_configuration_message_p"></p>

		<hr class="blue_hr thick_hr">
		</div> 


		<div id="your_usage">
			<div class="box_top_div" id="reservation_top_div"><div id="reservation_top_center_div">Reservations</div></div>		
			<hr style="margin-bottom:-5px; margin-top:6px">
			<h3 style="color:#d74937">Reservations and pricing</h3>
			<p >If you have used without making a reservation first, please click the button below. It can't be undone.</p>
			<div id="usage_div"><?php //echo get_usage(); ?></div>
			<p><input type="button" class="active_configuration_button" id="add_one_reservation_button" value="Add 1 to my reservations"></p>
			<p id="usage_message_p"></p>
			<p id="settings_message_p"></p>
			<hr style="margin-top:-5px; margin-bottom:1px">
		</div>
 -->.
	
	
	


		
	</div>	
		
</div>
<?php
}
?>

