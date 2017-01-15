<?php

session_start();


//include_once('connect.php');





// Configuration
function get_configuration($data)
{
	$query = mysql_query("SELECT * FROM " . global_mysql_configuration_table)or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$configuration = mysql_fetch_array($query);
	return($configuration[$data]);
}

// Password

function random_password()
{
	$password = rand('1001', '9999');
	return $password;
}

function encrypt_password($password)
{
	$password = crypt($password, '$1$' . global_salt);
	return($password);
}

function add_salt($password)
{
	$password = '$1$' . substr(global_salt, 0, -1) . '$' . $password;
	return($password);
}

function strip_salt($password)
{
	$password = str_replace('$1$' . substr(global_salt, 0, -1) . '$', '', $password);
	return($password);	
}

// String manipulation

function modify_email($email)
{
	$email = str_replace('@', '(at)', $email);
	$email = str_replace('.', '(dot)', $email);
	return($email);
}

// String validation

function validate_user_name($user_name)
{
	if(preg_match('/^[a-z æøåÆØÅ]{2,12}$/i', $user_name))
	{
		return(true);
	}
}

function validate_user_phone($user_mobile)
{
	if(preg_match('/^[0-9]{10}$/', $user_mobile)) // To make sure leading digit is not zero, use '/^[1-9][0-9]{0,15}$/'
	{
		return(true);
	}
}

function validate_user_email($user_email)
{
	if(filter_var($user_email, FILTER_VALIDATE_EMAIL) && strlen($user_email) < 51)
	{
		return(true);
	}
}



function validate_user_password($user_password)
{
	if(strlen($user_password) > 3 && trim($user_password) != '')
	{
		return(true);
	}
}

function validate_price($price)
{
	if(is_numeric($price))
	{
		return(true);
	}
}

// User validation

function user_name_exists($user_name)
{
	$query = mysql_query("SELECT * FROM " . global_mysql_users_table . " WHERE user_name='$user_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	if(mysql_num_rows($query) > 0)
	{
		return(true);
	}
}

function user_email_exists($user_email)
{
	$query = mysql_query("SELECT * FROM " . global_mysql_users_table . " WHERE user_email='$user_email'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	if(mysql_num_rows($query) > 0)
	{
		return(true);
	}
}

// Login

function get_login_data($data)
{
	if($data == 'user_email' && isset($_COOKIE[global_cookie_prefix . '_user_email']))
	{
		return($_COOKIE[global_cookie_prefix . '_user_email']);
	}
	elseif($data == 'user_password' && isset($_COOKIE[global_cookie_prefix . '_user_password']))
	{
		return($_COOKIE[global_cookie_prefix . '_user_password']);
	}
	elseif($data == 'user_company' && isset($_COOKIE[global_cookie_prefix . '_user_company']))
	{
		return($_COOKIE[global_cookie_prefix . '_user_company']);
	}
	elseif($data == 'registration_company' && isset($_COOKIE[global_cookie_prefix . '_registration_company']))
	{
		return($_COOKIE[global_cookie_prefix . '_registration_company']);
	}
	elseif($data == 'registration_name' && isset($_COOKIE[global_cookie_prefix . '_registration_name']))
	{
		return($_COOKIE[global_cookie_prefix . '_registration_name']);
	}
	elseif($data == 'registration_email' && isset($_COOKIE[global_cookie_prefix . '_registration_email']))
	{
		return($_COOKIE[global_cookie_prefix . '_registration_email']);
	}
	elseif($data == 'registration_password' && isset($_COOKIE[global_cookie_prefix . '_registration_password']))
	{
		return($_COOKIE[global_cookie_prefix . '_registration_password']);
	}
	
}




function login($user_email, $user_password, $user_company, $user_remember)
{
	
	/*if(validate_user_name($user_name) != true)
	{
		return('<span class="error_span">Name must be <u>letters only</u> and be <u>2 to 12 letters long</u>.</span>');
	}*/
	if(validate_user_email($user_email) != true)
	{
		return('<span class="error_span">Email must be a valid email address and be no more than 50 characters long</span>');
	}
	elseif(validate_user_password($user_password) != true)
	{
		return('<span class="error_span">Password must be at least 4 characters</span>');
	}
	elseif(global_secret_code != '0' && $user_secret_code != global_secret_code)
	{
		return('<span class="error_span">Wrong secret code</span>');
	}
	
	$user_password_encrypted = encrypt_password($user_password);
	$user_password = add_salt($user_password);
	
	
	$database = $user_company;
	
 $_SESSION['company_name'] = $user_company;
	
	$company_name = $user_company;
	
	if(isset($_SESSION['new_user_db'])){
	$database = $_SESSION['new_user_db'];
	}
   else{	
	$database = $user_company;
	}
	
	$_SESSION['db'] = $database;
	
	connect_to_db();
	
	/*if(user_name_exists($user_name) == true)
	{
		return('<span class="error_span">Name is already in use. If you have the same name as someone else, use another spelling that identifies you</span>');
	}*/
	
	/*if(user_email_exists($user_email) == true)
	     {
		    return('<span class="error_span">Email is already registered. <a href="#forgot_password">Forgot your password?</a></span>');
	     }
		 */
	
	$query = mysql_query("SELECT * FROM " . global_mysql_users_table . " WHERE user_email='$user_email' AND user_password='$user_password_encrypted' AND company_name='$company_name' OR user_email='$user_email' AND user_password='$user_password' AND company_name='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	if(mysql_num_rows($query) == 1)
	{
			$user = mysql_fetch_array($query);

			$_SESSION['user_id'] = $user['user_id'];
			$_SESSION['user_is_admin'] = $user['user_is_admin'];
			$_SESSION['user_email'] = $user['user_email'];
			$_SESSION['user_name'] = $user['user_name'];
			$_SESSION['user_reservation_reminder'] = $user['user_reservation_reminder'];
			$_SESSION['logged_in'] = '1';
			$_SESSION['db'] = $database;

			if($user_remember == '1')
			{
				$user_password = strip_salt($user['user_password']);

				setcookie(global_cookie_prefix . '_user_email', $user['user_email'], time() );
				setcookie(global_cookie_prefix . '_user_password', $user_password, time() );
				setcookie(global_cookie_prefix . '_user_company', $user_password, time() );
				
			}

			return(1);
	}
}

function check_login()
{
	//if(isset($_SESSION['logged_in']))
		//{
			
	$database = $_SESSION['db'];
	
	$company_name = $_SESSION['company_name'];
	   
	
	connect_to_db();

		$user_id = $_SESSION['user_id'];
		$query = mysql_query("SELECT * FROM " . global_mysql_users_table . " WHERE user_id='$user_id' AND company_name='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

		if(mysql_num_rows($query) == 1)
		{
			return(true);
		}
		else
		{
			logout();
			echo '<script type="text/javascript">window.location.replace(\'.\');</script>';
		}
	//} 
	//else
	//{
		//logout();
		//echo '<script type="text/javascript">window.location.replace(\'.\');</script>';
	//}
}

function check_if_ur_exists($url){

$database = 'sydney';
connect_to_db();


$query = mysql_query("SELECT * FROM configuration WHERE url='$url'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

		if(mysql_num_rows($query) == 1)
		{
		  $user = mysql_fetch_array($query);
		  $_SESSION['login_company_name'] = $user['company'];
			return(1);
		}

//"UPDATE " . global_mysql_configuration_table . " SET price='$price'"


/*$query = mysql_query("UPDATE configuration SET url='$url'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');*/
//mysql_close($connect_me);

return(0);
}

function logout()
{
	session_unset();
	setcookie(global_cookie_prefix . '_user_email', '', time() - 60);
	setcookie(global_cookie_prefix . '_user_password', '', time() - 60);
	setcookie(global_cookie_prefix . '_user_company', '', time() - 60);
	


}

function create_user($user_company, $user_name,$user_mobile, $user_email, $user_password, $user_secret_code)
{

    //$database = $user_company;
	$database = 'sydney';
	
	$company_name = $user_company;
	
	if(validate_user_phone($user_mobile) != true)
	{
		return('<span class="error_span"> Phone invalid <u>letters only</u> and be <u>2 to 12 letters long</u>. If your name is longer, use a short version of your name</span>');
	}
	
	
	if(validate_user_name($user_name) != true)
	{
		return('<span class="error_span">Name must be <u>letters only</u> and be <u>2 to 12 letters long</u>. If your name is longer, use a short version of your name</span>');
	}
	elseif(validate_user_email($user_email) != true)
	{
		return('<span class="error_span">Email must be a valid email address and be no more than 50 characters long</span>');
	}
	elseif(validate_user_password($user_password) != true)
	{
		return('<span class="error_span">Password must be at least 4 characters</span>');
	}
	elseif(global_secret_code != '0' && $user_secret_code != global_secret_code)
	{
		return('<span class="error_span">Wrong secret code</span>');
	}
	/*elseif(user_name_exists($user_name) == true)
	{
		return('<span class="error_span">Name is already in use. If you have the same name as someone else, use another spelling that identifies you</span>');
	}*/
	
	else
	{	
	
		//if( $_SESSION['register'] == '1'){
			/*********************************DB REGISTRATION***************************************************/
			//$con=mysqli_connect("localhost","root","");
			
			
			/*
			$sql="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'";
			$result = mysqli_query($con,$sql);
			
			if(mysqli_num_rows($result) == 1)
            { 
			  return('<span class="error_span">The company name you are trying to register already exists. Please use a different company name.</span>');
			  }
			  
			
			*/
			

	
			
			
			//$sql="CREATE DATABASE $database";
			// mysqli_query($con,$sql);  
		  
			//  connect to database 
			//$con=mysqli_connect("localhost","root","","$database");
			// Check connection


		/*	 $configuration =" CREATE TABLE IF NOT EXISTS phpmyreservation_configuration (
			 id int(10) NOT NULL AUTO_INCREMENT,
			 price float NOT NULL,
			 PRIMARY KEY (id)
			 ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2" ;

			 mysqli_query($con,$configuration);
			
			//Dumping data for table `phpmyreservation_configuration
			 mysqli_query($con,"INSERT INTO phpmyreservation_configuration (id, price) VALUES
			 (1, 2)");   */
			/* 
		   
			  $reservations = "CREATE TABLE IF NOT EXISTS reservations_table (
			  company_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  reservation_id int(10) NOT NULL AUTO_INCREMENT,
			  reservation_made_time datetime NOT NULL,
			  reservation_year smallint(4) NOT NULL,
			  reservation_week tinyint(2) NOT NULL,
				reservation_day tinyint(1) NOT NULL,
				reservation_time varchar(100) COLLATE utf8_unicode_ci NOT NULL,
				reservation_price float NOT NULL,
				reservation_user_id int(10) NOT NULL,
				reservation_user_email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
				reservation_user_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
				PRIMARY KEY (reservation_id)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1" ;

				mysqli_query($con,$reservations); */
				
/*
			   $sql = "CREATE TABLE IF NOT EXISTS users_table (
			    company_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
				user_id int(10) NOT NULL AUTO_INCREMENT,
				user_is_admin tinyint(1) NOT NULL,
				user_email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
				user_password varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
				user_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
				user_mobile bigint(20) NOT NULL,
				user_reservation_reminder tinyint(1) NOT NULL,
				PRIMARY KEY (user_id)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1" ;

				mysqli_query($con,$sql) ;

				mysqli_close($con);*/
				
				//$_SESSION['new_user_db'] = $database;
				
				

          /********************************************************************************************/	


	 
	    //$_SESSION['new_user_db'] = $database;
	    connect_to_db();	
 /*
        if(user_email_exists($user_email) == true)
	     {
		    return('<span class="error_span">Email is already registered. <a href="#forgot_password">Forgot your password?</a></span>');
	     } 
		 */
	
		$query = mysql_query("SELECT * FROM " . global_mysql_users_table . " WHERE company_name='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

		if(mysql_num_rows($query) == 0)
		{
			$user_is_admin = '1';
			$_SESSION['just_registered'] = '1';
			$url=$company_name;
			$sms_msg='Hello [user_name] , This is a remainder for your appointment with [business_name] today, the [today_date] , at [appointment_time] . The team,    [business_name] .';
			
			$email_msg='Hello [user_name] , This is a remainder for your appointment with [business_name] today, the [today_date] , at [appointment_time] . The team,    [business_name] .';
			
			$welcome_msg='Hello [user_name] , This is a remainder for your appointment with [business_name] today, the [today_date] , at [appointment_time] . The team,    [business_name] .';
			
			
			
			
			mysql_query (" INSERT INTO configuration (secret_code, company, sms_message, email_message, welcome_email_message, enable_sms, enable_email, enable_email_verification, registration_enabling, who_can, url) VALUES
            (0, '$company_name', '$sms_msg', '$email_msg', '$welcome_msg', 0, 0,0, 1, 0, '$url')")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		}
		else
		{
			$user_is_admin = '0';
			$_SESSION['just_signed_up'] = '1';
			
			send_mail_if_enabled();		
			}

		$user_password = encrypt_password($user_password);
		

		mysql_query("INSERT INTO " . global_mysql_users_table . " (company_name,user_is_admin,user_email,user_password,user_name,user_mobile,user_reservation_reminder) VALUES ('$company_name',$user_is_admin,'$user_email','$user_password','$user_name','$user_mobile','0')")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		
		
		$url=$company_name;
		$_SESSION['url']=$url;
		
		$_SESSION['company_name'] = $company_name ;
		
		
		
		
		

		$user_password = strip_salt($user_password);

		setcookie(global_cookie_prefix . '_user_email', $user_email, time() +60 );
		setcookie(global_cookie_prefix . '_user_password', $user_password, time() + 60 );
		setcookie(global_cookie_prefix . '_user_company', $user_company, time() + 60);

		return(1);
	}
}

function send_mail_if_enabled()
{
$company_name = $_SESSION['company_name'];
	
	$query = mysql_query("SELECT * FROM configuration WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$user = mysql_fetch_array($query);

	if($user['enable_email_verification'] == 1){
	   $myemail="matt.mwansa@yahoo.com";
	   $subject="go fool";
	   $message="let go";
	   mail($myemail, $subject, $message);
 }
 }







function list_admin_users()
{
	$query = mysql_query("SELECT * FROM " . global_mysql_users_table . " WHERE user_is_admin='1' ORDER BY user_name")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	if(mysql_num_rows($query) < 1)
	{
		return('<span class="error_span">There are no admins</span>');
	}
	else
	{
		$return = '<table id="forgot_password_table"><tr><th>Name</th><th>Email</th></tr>';

		$i = 0;

		while($user = mysql_fetch_array($query))
		{
			$i++;

			$return .= '<tr><td>' . $user['user_name'] . '</td><td><span id="email_span_' . $i . '"></span></td></tr><script type="text/javascript">$(\'#email_span_' . $i . '\').html(\'<a href="mailto:\'+$.base64.decode(\'' . base64_encode($user['user_email']) . '\')+\'">\'+$.base64.decode(\'' . base64_encode($user['user_email']) . '\')+\'</a>\');</script>';
		}

		$return .= '</table>';

		return($return);
	}
}

// Reservations

function highlight_day($day)
{
	$day = str_ireplace(global_day_name, '<span id="today_span">' . global_day_name . '</span>', $day);
	return $day;
}


function read_reservation($week, $day, $time)
{
     $company_name = $_SESSION['company_name'];
	 $user_name = $_SESSION['user_name'];
	 $is_admin = $_SESSION['user_is_admin']; 
	
	$query = mysql_query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' 
	AND company_name='$company_name' AND reservation_day='$day' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$reservation = mysql_fetch_array($query);
	
	if( $is_admin == 1){    
		if((strcmp( $reservation['reservation_user_name'], $user_name ) === 0 )){
				return( ' <span style="color:red">'.$reservation['reservation_user_name'].'</span>');
			}
		else{	
			return($reservation['reservation_user_name']);
			}
	}		
	
	if( strcmp( $reservation['reservation_user_name'], $user_name ) === 0){
	  return($reservation['reservation_user_name']);
	  }	
	  
     if( $reservation['reservation_user_name'] != '') {
	 return ('Reserved');
	}
	
	  	
	return($reservation['reservation_user_name']);
	
}

function read_reservation_details($week, $day, $time)
{
	 $company_name = $_SESSION['company_name'];
	
	$query = mysql_query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND company_name='$company_name' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$reservation = mysql_fetch_array($query);

	if(empty($reservation))
	{
		return(0);
		
	}
	else
	{
		return('<b>Reservation made:</b> ' . $reservation['reservation_made_time'] . '<br><b>User\'s email:</b> ' . $reservation['reservation_user_email']);
	}
}

function make_reservation($week, $day, $time)
{
	$user_id = $_SESSION['user_id'];
	$user_email = $_SESSION['user_email'];
	$user_name = $_SESSION['user_name'];
	$price = global_price;
	
	$user_reservation_id = $_SESSION['user_id'];
	
	
	
	
	$company_name = $_SESSION['company_name'];

	if($week == '0' && $day == '0' && $time == '0')
	{
		mysql_query("INSERT INTO " . global_mysql_reservations_table . " (company_name,reservation_made_time,reservation_week,reservation_day,reservation_time,reservation_price,reservation_user_id,reservation_user_email,reservation_user_name) VALUES ( '$company_name',now(),'$week','$day','$time','$price','$user_id','$user_email','$user_name')")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

		return(1);
	}
	elseif($week < global_week_number && $_SESSION['user_is_admin'] != '1' || $week == global_week_number && $day < global_day_number && $_SESSION['user_is_admin'] != '1')
	{
		return('You can\'t reserve back in time');
	}
	elseif($week > global_week_number + global_weeks_forward && $_SESSION['user_is_admin'] != '1')
	{
		return('You can only reserve ' . global_weeks_forward . ' weeks forward in time');
	}
	else
	{
		$query = mysql_query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day'AND company_name='$company_name' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

		if(mysql_num_rows($query) < 1)
		{
			$year = global_year;

			mysql_query("INSERT INTO " . global_mysql_reservations_table . " (company_name, reservation_made_time,reservation_year,reservation_week,reservation_day,reservation_time,reservation_price,reservation_user_id,reservation_user_email,reservation_user_name) VALUES ('$company_name',now(),'$year','$week','$day','$time','$price','$user_id','$user_email','$user_name')")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

			return(1);
		}
		else
		{
			return('Someone else just reserved this time');
		}
	}
}

function delete_reservation($week, $day, $time)
{

      $company_name = $_SESSION['company_name'];
	 
	if($week < global_week_number && $_SESSION['user_is_admin'] != '1' || $week == global_week_number && $day < global_day_number && $_SESSION['user_is_admin'] != '1')
	{
		return('You can\'t reserve back in time');
	}
	elseif($week > global_week_number + global_weeks_forward && $_SESSION['user_is_admin'] != '1')
	{
		return('You can only reserve ' . global_weeks_forward . ' weeks forward in time');
	}
	else
	{
		$query = mysql_query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time' AND company_name='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		$user = mysql_fetch_array($query);

		if($user['reservation_user_id'] == $_SESSION['user_id'] || $_SESSION['user_is_admin'] == '1')
		{
			mysql_query("DELETE FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

			return(1);
		}
		else
		{
			return('You can\'t remove other users\' reservations');
		}
	}
}

// Admin control panel

function list_users()
{
    
	$company_name = $_SESSION['company_name'];
	
	$query = mysql_query("SELECT * FROM " . global_mysql_users_table . " WHERE company_name='$company_name' ORDER BY user_is_admin DESC, user_name")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	$users = '<table id="users_table"><tr><th>ID</th><th>Admin</th><th>Name</th><th>Email</th><th>Reminders</th><th>Usage</th><th>Cost</th><th></th></tr>';

	while($user = mysql_fetch_array($query))
	{
		$users .= '<tr id="user_tr_' . $user['user_id'] . '"><td><label for="user_radio_' . $user['user_id'] . '">' . $user['user_id'] . '</label></td><td>' . $user['user_is_admin'] . '</td><td><label for="user_radio_' . $user['user_id'] . '">' . $user['user_name'] . '</label></td><td><label for="user_radio_' . $user['user_id'] . '">' . $user['user_email'] . '</label></td><td>' . $user['user_reservation_reminder'] . '</td><td>' . count_reservations($user['user_id']) . '</td><td>' . cost_reservations($user['user_id']) . ' ' . global_currency . '</td><td><input type="radio" name="user_radio" class="user_radio" id="user_radio_' . $user['user_id'] . '" value="' . $user['user_id'] . '"></td></tr>';
	}

	$users .= '</table>';

	return($users);
}

function reset_user_password($user_id)
{
	$password = random_password();
	$password_encrypted = encrypt_password($password);

	mysql_query("UPDATE " . global_mysql_users_table . " SET user_password='$password_encrypted' WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	if($user_id == $_SESSION['user_id'])
	{
		return(0);
	}
	else
	{
		return('The password to the user with ID ' . $user_id . ' is now "' . $password . '". The user can now log in and change the password');
	}
}

function change_user_permissions($user_id)
{
	if($user_id == $_SESSION['user_id'])
	{
		return('<span class="error_span">Sorry, you can\'t use your superuser powers to remove them</span>');
	}
	else
	{
		mysql_query("UPDATE " . global_mysql_users_table . " SET user_is_admin = 1 - user_is_admin WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

		return(1);
	}
}

function delete_user_data($user_id, $data)
{
	if($user_id == $_SESSION['user_id'] && $data != 'reservations')
	{
		return('<span class="error_span">Sorry, self-destructive behaviour is not accepted</span>');
	}
	else
	{
		if($data == 'reservations')
		{
			mysql_query("DELETE FROM " . global_mysql_reservations_table . " WHERE reservation_user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		}
		elseif($data == 'user')
		{
			mysql_query("DELETE FROM " . global_mysql_users_table . " WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
			mysql_query("DELETE FROM " . global_mysql_reservations_table . " WHERE reservation_user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		}

		return(1);
	}
}

function delete_all($data)
{
	$user_id = $_SESSION['user_id'];

	if($data == 'reservations')
	{
		mysql_query("DELETE FROM " . global_mysql_reservations_table . " WHERE reservation_user_id!='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	}
	elseif($data == 'users')
	{
		mysql_query("DELETE FROM " . global_mysql_users_table . " WHERE user_id!='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		mysql_query("DELETE FROM " . global_mysql_reservations_table . " WHERE reservation_user_id!='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	}
	elseif($data == 'everything')
	{
		mysql_query("DELETE FROM " . global_mysql_users_table . "")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		mysql_query("DELETE FROM " . global_mysql_reservations_table . "")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	}

	return(1);
}

function save_system_configuration($price)
{
	if(validate_price($price) != true)
	{
		return('<span class="error_span">Price must be a number (use . and not , if you want to use decimals)</span>');
	}
	else
	{
		mysql_query("UPDATE " . global_mysql_configuration_table . " SET price='$price'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	}

	return(1);
}

// User control panel

function get_usage()
{
	$usage = '<table id="usage_table"><tr><th>Reservations</th><th>Cost</th><th>Current price per reservation</th></tr><tr><td>' . count_reservations($_SESSION['user_id']) . '</td><td>' . cost_reservations($_SESSION['user_id']) . ' ' . global_currency . '</td><td>' . global_price . ' ' . global_currency . '</td></tr></table>';
	return($usage);
}

function count_reservations($user_id)
{
	$query = mysql_query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$count = mysql_num_rows($query);
	return($count);
}

function cost_reservations($user_id)
{
	$query = mysql_query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	$cost = 0;

	while($reservation = mysql_fetch_array($query))
	{
		$cost =+ $cost + $reservation['reservation_price'];	
	}

	return($cost);
}

function get_reservation_reminders()
{
	$user_id = $_SESSION['user_id'];
	$query = mysql_query("SELECT * FROM " . global_mysql_users_table . " WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$user = mysql_fetch_array($query);

	if($user['user_reservation_reminder'] == 1)
	{
		$return = '<input type="checkbox" id="reservation_reminders_checkbox" checked="checked">';
	}
	else
	{
		$return = '<input type="checkbox" id="reservation_reminders_checkbox">';
	}

	return($return);
}



function get_sms_reminders()  
{
	$company_name = $_SESSION['company_name'];
	
	$query = mysql_query("SELECT * FROM configuration WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$user = mysql_fetch_array($query);

	if($user['enable_sms'] == 1)
	{
		$return = '<input type="checkbox" id="sms_reminders_checkbox" checked="checked">';
	}
	else
	{
		$return = '<input type="checkbox" id="sms_reminders_checkbox">';
	}

	return($return);
}

function get_email_verification() 
{
	$company_name = $_SESSION['company_name'];
	
	$query = mysql_query("SELECT * FROM configuration WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$user = mysql_fetch_array($query);

	if($user['enable_email_verification'] == 1)
	{
		$return = '<input type="checkbox" id="email_verification_checkbox" checked="checked">';
	}
	else
	{
		$return = '<input type="checkbox" id="email_verification_checkbox">';
	}

	return($return);
}




function get_email_reminders()
{

    $company_name = $_SESSION['company_name'];
	
	$query = mysql_query("SELECT * FROM configuration WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$user = mysql_fetch_array($query);

	if($user['enable_email'] == 1)
	{
		$return = '<input type="checkbox" id="email_reminders_checkbox" checked="checked">';
	}
	else
	{
		$return = '<input type="checkbox" id="email_reminders_checkbox">';
	}

	return($return);
}	


function toggle_reservation_reminder()
{
	$user_id = $_SESSION['user_id'];
	mysql_query("UPDATE " . global_mysql_users_table . " SET user_reservation_reminder = 1 - user_reservation_reminder WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	return(1);
}


function toggle_sms_reminder()
{
	$company_name = $_SESSION['company_name'];
	
	mysql_query("UPDATE configuration SET enable_sms = 1 - enable_sms WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	return(1);
}

function toggle_email_verification()
{
	$company_name = $_SESSION['company_name'];
	
	mysql_query("UPDATE configuration SET enable_email_verification = 1 - enable_email_verification WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	return(1);
}

function toggle_email_reminder()
{
	$company_name = $_SESSION['company_name'];
	mysql_query("UPDATE configuration SET enable_email = 1 - enable_email WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	return(1);
}





function change_user_details($user_name, $user_email, $user_password)
{
    
	$user_id = $_SESSION['user_id'];

	if(validate_user_name($user_name) != true)
	{
		return('<span class="error_span">Name must be <u>letters only</u> and be <u>2 to 12 letters long</u>. If your name is longer, use a short version of your name</span>');
	}
	if(validate_user_email($user_email) != true)
	{
		return('<span class="error_span">Email must be a valid email address and be no more than 50 characters long</span>');
	}
	elseif(validate_user_password($user_password) != true && !empty($user_password))
	{
		return('<span class="error_span">Password must be at least 4 characters</span>');
	}
	elseif(user_name_exists($user_name) == true && $user_name != $_SESSION['user_name'])
	{
		return('<span class="error_span">Name is already in use. If you have the same name as someone else, use another spelling that identifies you</span>');
	}
	elseif(user_email_exists($user_email) == true && $user_email != $_SESSION['user_email'])
	{
		return('<span class="error_span">Email is already registered</span>');
	}
	else
	{
		if(empty($user_password))
		{
			mysql_query("UPDATE " . global_mysql_users_table . " SET user_name='$user_name', user_email='$user_email' WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		}
		else
		{
			$user_password = encrypt_password($user_password);

			mysql_query("UPDATE " . global_mysql_users_table . " SET user_name='$user_name', user_email='$user_email', user_password='$user_password' WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		}

		mysql_query("UPDATE " . global_mysql_reservations_table . " SET reservation_user_name='$user_name', reservation_user_email='$user_email' WHERE reservation_user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

		$_SESSION['user_name'] = $user_name;
		$_SESSION['user_email'] = $user_email;

		$user_password = strip_salt($user_password);

		setcookie(global_cookie_prefix . '_user_email', $user_email, time() + 3600 * 24 * intval(global_remember_login_days));
		setcookie(global_cookie_prefix . '_user_password', $user_password, time() + 3600 * 24 * intval(global_remember_login_days));

		return(1);
	}
}









function update_sms_details($user_name)
{
	$company_name = $_SESSION['company_name'];

	
		mysql_query("UPDATE  configuration  SET sms_message='$user_name' WHERE company='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		

		return(1);
	
}

function update_email_details($user_name)
{
	$company_name = $_SESSION['company_name'];

	
		mysql_query("UPDATE  configuration  SET email_message='$user_name' WHERE company='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		

		return(1);
	
}

function update_welcome_email_msg($user_name)
{
	$company_name = $_SESSION['company_name'];

	
		mysql_query("UPDATE  configuration  SET welcome_email_message='$user_name' WHERE company='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		

		return(1);
	
}

function get_current_sms_message(){

$company_name = $_SESSION['company_name'];

	$query = mysql_query("SELECT * FROM configuration WHERE company='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	
	$result = mysql_fetch_array($query);

	if($result['sms_message'] )
$sms_message= $result['sms_message'];

$span_start = ' <span style="color:red">[';
$span_end = ']</span> ';
$sms_message = str_replace("[user_name],", "[user_name],</br>", $sms_message);
$sms_message = str_replace("[appointment_time].", "[appointment_time].</br>", $sms_message);
$sms_message = str_replace("team, ", "team, </br>", $sms_message);

$sms_message = str_replace("[", $span_start, $sms_message);
$sms_message = str_replace("]", $span_end, $sms_message);


return($sms_message);
}


function get_current_email_message(){
   $company_name = $_SESSION['company_name'];
   
	$query = mysql_query("SELECT * FROM configuration WHERE company='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	
	$result = mysql_fetch_array($query);

	if($result['email_message'] )
    $email_message= $result['email_message'];
	
$span_start = ' <span style="color:red">[';
$span_end = ']</span> ';
 $email_message = str_replace("[user_name],", "[user_name],</br>", $email_message);
 $email_message = str_replace("[appointment_time].", "[appointment_time].</br>", $email_message);
 $email_message = str_replace("team, ", "team, </br>", $email_message);

 $email_message = str_replace("[", $span_start, $email_message);
 $email_message = str_replace("]", $span_end, $email_message);

	
    return($email_message);
}


function get_welcome_email_message(){
$company_name = $_SESSION['company_name'];

	$query = mysql_query("SELECT * FROM configuration WHERE company='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	
	$result = mysql_fetch_array($query);

	if($result['welcome_email_message'] )
    $welcome_email_message= $result['welcome_email_message'];
	
	
$span_start = ' <span style="color:red">[';
$span_end = ']</span> ';
 $welcome_email_message = str_replace("[user_name],", "[user_name],</br>", $welcome_email_message);
 $welcome_email_message = str_replace("[appointment_time].", "[appointment_time].</br>", $welcome_email_message);
 $welcome_email_message = str_replace("team, ", "team, </br>", $welcome_email_message);

 $welcome_email_message = str_replace("[", $span_start, $welcome_email_message);
 $welcome_email_message = str_replace("]", $span_end, $welcome_email_message);
	
	
    return($welcome_email_message);
}



function registration_settings($user_name)
{
	$company_name = $_SESSION['company_name'];

	
		mysql_query("UPDATE  configuration  SET registration='$user_name' WHERE company='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		

		return(1);
	
}

function registration_enabling($enable_id)
{
	$company_name = $_SESSION['company_name'];

	
		mysql_query("UPDATE  configuration  SET registration_enabling='$enable_id' WHERE company='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		

		return(1);
	
}

function check_registration_settings_radio(){
   $company_name = $_SESSION['company_name'];
   $anyone=0;
   $secret=0;
   $disable=0;
   
   
	$query = mysql_query("SELECT * FROM configuration WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$user = mysql_fetch_array($query);
	
	if($user['registration'] == 1){
	$return = 	
'<input type="radio" id="new_user_registration_anyone" name="reg_radio" checked="checked" />
<label for="new_user_registration_settings" id="anyone" ><span style="top:-11px">Allow anyone to register</span></label></br>
<input type="radio" id="new_user_registration_secret_code" name="reg_radio"   />
<label for="new_user_registration_settings" id="secret_code  ><span style="top:-11px">Set secret registration code</span></label></br>
<input type="radio" id="new_user_registration_disable" name="reg_radio"   />
<label for="new_user_registration_settings" id="disable" ><span style="top:-11px">Disable registration.</span></label></br>';
	}
	
	else if($user['registration'] == 2){
	$return = 	
'<input type="radio" id="new_user_registration_anyone" name="reg_radio"   />
<label for="new_user_registration_settings" id="anyone" ><span style="top:-11px">Allow anyone to register</span></label></br>
<input type="radio" id="new_user_registration_secret_code" name="reg_radio"  checked="checked"/>
<label for="new_user_registration_settings" id="secret_code ><span style="top:-11px">Set secret registration code</span></label></br>
<input type="radio" id="new_user_registration_disable" name="reg_radio"  />
<label for="new_user_registration_settings" id="disable" ><span style="top:-11px">Disable registration.</span></label></br>';
	}
	

else{
$return = 	
'<input type="radio" id="new_user_registration_anyone"  />
<label for="new_user_registration_settings" id="anyone" ><span style="top:-11px">Allow anyone to register</span></label></br>
<input type="radio" id="new_user_registration_secret_code" />
<label for="new_user_registration_settings" id="secret_code ><span style="top:-11px">Set secret registration code</span></label></br>
<input type="radio" id="new_user_registration_disable"  />
<label for="new_user_registration_settings" id="disable" ><span style="top:-11px">Disable registration.</span></label></br>';
}	

	return($return);

}


function check_registration_enabling_radio(){
   $company_name = $_SESSION['company_name'];
      
   
	$query = mysql_query("SELECT * FROM configuration WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$user = mysql_fetch_array($query);
	
	if($user['registration_enabling'] == 1){
	        $return =' 	
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
			</p>';	
            }

    else{
        $return = '	
		    <p class="radio_button">
			<input type="radio" id="enable_registration" name="registration_radio"  />
			<label for="enable_registration"  >Enable_Registration</label></p>
			<p id="enable_registration_message_p"></p>
			<p class="under_radio_button"> When selected, users must register before the can make a reservation.</br> The reservation table will only be visible 
			    to users who have signed up to you reservation service.			
			</p>
			
			<p class="radio_button">
			<input type="radio" id="disable_registration" name="registration_radio"  checked="checked"  />
			<label for="disable_registration" id="disabling_registration " >Disable Registration</label></p>
			<p id="disable_registration_message_p"></p>
			<p class="under_radio_button"> This is the alternative option. When selected, user reach your reservation table without signing up to your reservation service.</b> Please note that this means that anonymous clients with knowledge of your unique url or who search for your reservation service through our system will be able to make reservations. 			
			</p>';	
            } 


    return($return);
}


function check_who_can_register_radio(){

$company_name = $_SESSION['company_name'];
      
   
	$query = mysql_query("SELECT * FROM configuration WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$user = mysql_fetch_array($query);
	
	if($user['who_can'] == 0){
	        $return =
			'<p class="radio_button">
			<input type="radio" id="registration_anyone" name="who_can_radio" checked="checked" />
			<label for="registration_anyone" >Anyone</label></p>
			<p class="under_radio_button">This options allows any user to sign up to a business reservation service.</p>
			
			<p class="radio_button">
			<input type="radio" id="registration_secret" name="who_can_radio"  />
			<label for="registration_secret" >Set secret code</label></p>
			<p class="under_radio_button" style="margin-bottom:0px"> With this option, a six digit secret code is set. Anyone is still allowed to sign up to the reservation service , but they must also enter the secret code.</br> This option is necessary when only users with prior knowledge of the secret code are allowed to sign up.</br> Before you set or update the secret code, make sure the set secret code radio button is enabled. </p>';
			}
			
    else{
	        $return =
			'<p class="radio_button">
			<input type="radio" id="registration_anyone" name="who_can_radio"  />
			<label for="registration_anyone" >Anyone</label></p>
			<p class="under_radio_button">This options allows any user to sign up to a business reservation service.</p>
			
			<p class="radio_button">
			<input type="radio" id="registration_secret" name="who_can_radio" checked="checked"  />
			<label for="registration_secret" >Set Secret code</label></p>
			<p class="under_radio_button" style="margin-bottom:0px"> With this option, a six digit secret code is set. Anyone is still allowed to sign up to the reservation service , but they must also enter the secret code.</br> This option is necessary when only users with prior knowledge of the secret code are allowed to sign up.</br> Before you set or update the secret code, make sure the set secret code radio button is enabled.</p>';
			}
			
	return $return;
}	

function get_current_secrect_code(){

if(isset($_SESSION['company_name'])){
$company_name = $_SESSION['company_name'];
}
else
{
$company_name = $_SESSION['login_company_name'];
connect_to_db();
}

      
   
	$query = mysql_query("SELECT * FROM configuration WHERE company ='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$user = mysql_fetch_array($query);
	
	if($user['who_can'] != 0){
	  return $user['who_can'];
	  }
	 return (''); 

}


function update_who_can_register($who_can_id, $who_can_value){

$company_name = $_SESSION['company_name'];

	  
		mysql_query("UPDATE  configuration  SET who_can='$who_can_value' WHERE company='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		

		return(1);
	

}

function get_admin_email($company_name){

$query = mysql_query("SELECT * FROM users_table WHERE company_name ='$company_name' AND user_is_admin = '1'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$admin_email = mysql_fetch_array($query);
	
	$email = $admin_email['user_email'];
	
	return $email;

}

function change_url($new_url)
{

$company_name = $_SESSION['company_name'];
	  
		mysql_query("UPDATE  configuration  SET url ='$new_url' WHERE company='$company_name'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		

		return(1);

}

function get_current_url(){

$company_name = $_SESSION['company_name'];

$query = mysql_query("SELECT * FROM configuration WHERE company ='$company_name' ")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$current_url = mysql_fetch_array($query);
	
	$url = $current_url['url'];
	
	return $url;

}





?>
