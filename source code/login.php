<?php

//include_once('main.php');
include_once('php/main.php');
include_once('login_html_code.php');
include_once('system_config_html.php');




if(isset($_GET['register']))
{
	$registration_name = mysql_real_escape_string($_POST['registration_name']);
	$registration_company = mysql_real_escape_string($_POST['registration_company']);
	$registration_email = $_POST['registration_email'];
	$registration_password = $_POST['registration_password'];
	echo register($registration_name, $registration_company, $registration_email, $registration_password );
}


if(isset($_GET['login']))
{
	/*$user_email = mysql_real_escape_string($_POST['user_email']);
	$user_password = mysql_real_escape_string($_POST['user_password']);
	$user_company = mysql_real_escape_string($_POST['user_company']); 
	$user_remember = $_POST['user_remember'];
	echo login($user_email, $user_password, $user_company, $user_remember);*/
	
	echo login($_POST['user_email'], $_POST['user_password'], $_POST['user_company'], $_POST['user_remember']);
}

elseif(isset($_GET['logout']))
{
	logout();
}
elseif(isset($_GET['create_user']))
{
	/*
	$user_company = mysql_real_escape_string(trim($_POST['user_company']));
	$user_name = mysql_real_escape_string(trim($_POST['user_name']));
	$user_mobile = mysql_real_escape_string(trim($_POST['user_mobile']));
	$user_email = mysql_real_escape_string($_POST['user_email']);
	$user_password = mysql_real_escape_string($_POST['user_password']);
	$user_secret_code = $_POST['user_secret_code'];
	*/
	
	$user_company = (trim($_POST['user_company']));
	$user_name = (trim($_POST['user_name']));
	$user_mobile = (trim($_POST['user_mobile']));
	$user_email = ($_POST['user_email']);
	$user_password = ($_POST['user_password']);
	$user_secret_code = $_POST['user_secret_code'];
	echo create_user($user_company, $user_name, $user_mobile, $user_email, $user_password, $user_secret_code);
}
elseif(isset($_GET['new_user']))
{
$_SESSION['new'] = '1';
 $_SESSION['register'] = '0';
  show_new_user_login_form();
  
} 

elseif(isset($_GET['new_registration']))
{
 $_SESSION['register'] = '1';
 $_SESSION['new'] = '0';
show_new_user_login_form();
 
}
elseif(isset($_GET['forgot_password']))
{
show_forgot_password();
}

elseif(isset($_GET['just_registered']))
{
show_admin_config();
}

elseif(isset($_GET['show_system_config']))
{
show_system_configuration();
}

elseif(isset($_GET['check_url_exists']))
{
$url = (trim($_POST['url']));
echo check_if_ur_exists($url);
}


elseif(isset($_GET['show_company_home']))
{
show_company_home();
}


else
{
show_home_page();
}

?>


	
