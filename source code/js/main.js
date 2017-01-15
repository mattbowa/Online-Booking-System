// Show pages

function showabout()
{
	page_load();
	div_hide('#content_div');
	$.get('about.php', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded('about'); });
}






function showlogin()
{
	page_load();
	div_hide('#content_div');

	$.get('login.php', function(data)
	{
		$('#content_div').html(data); 
		div_fadein('#content_div');
		page_loaded();

		var user_email = $('#user_email_input').val();
		var user_password = $('#user_password_input').val();
		var user_company = $('#user_company_input').val();
		//var registration_name = $('#registration_name_input').val();
		//var registration_company = $('#registration_company_input').val();
		//var registration_email = $('#registration_email_input').val();
		//var registration_password = $('#registration_password_input').val();

		if(user_email != '' && user_password != '' && user_company != '' )
		{
			setTimeout(function() { $('#login_form').submit(); }, 20);
		}		
			
		
		/*else if(registration_name != '')
		{
			setTimeout(function() { $('#register_form').submit(); }, 250);
		}*/
		
		else
		{
			input_focus('#user_company_input');
		}
/*		
		else
		{
			input_focus('#registration_name_input');
		}
		*/
		
		
		
	});
}




function register()
{
	//var user_email = $('#user_email_input').val();
	//var user_password = $('#user_password_input').val();
	
	var registration_name = $('#registration_name_input').val();
	var registration_company = $('#registration_company_input').val();
	var registration_email = $('#registration_email_input').val();
	var registration_password = $('#registration_password_input').val();
	

	$('#register_message_p').html('<img src="img/loading.gif" alt="Loading"> Logging in...').slideDown('fast');

	
	

	$.post('login.php?register', { registration_name: registration_name, registration_company: registration_company, registration_email: registration_email, registration_password: registration_password}, function(data)
	{
		if(data == 1)
		{
			input_focus();
			
			setTimeout(function()
				{
					$('#new_user_message_p').html('User created successfully! Logging in... <img src="img/loading.gif" alt="Loading">');
					setTimeout(function() { window.location.replace(''); }, 2000);
				}, 1000);
			
			
		}
		/*
		else
		{
			if(data == '')
			{
				$('#login_message_p').html('<span class="error_span">Wrong email and/or password</span>');
				$('#user_email_input').val('');
				$('#user_password_input').val('');
				input_focus('#registration_email_input');
			}
			else
			{
				$('#login_message_p').html(data);
			}
		}*/
	});
	just_registered();
}



function just_registered()
{
	page_load();
	div_hide('#content_div');
	$.get('login.php?just_registered', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });
	
}





function show_all_options()
{

$('#user_administration').css('display', 'block');	
	$('#database_administration').css('display', 'block');  
	$('#system_configuration').css('display', 'block');
	$('#your_usage').css('display', 'block');
	$('#your_settings').css('display', 'block');
	$('#admin_details').css('display', 'blcok');	
	$('#reservation_table_config').css('block', 'block'); 
	$('#show_reservation_table').css('block', 'block');
	$('#user_registration_setting').css('display', 'block');
	$('#url_setting_options').css('display', 'block');
	
	$('#user_admin').css('background-color', '#4a8cf6');
	$('#database_admin').css('background-color', '#4a8cf6');
	$('#system_config').css('background-color', '#4a8cf6');
	$('#usage').css('background-color', '#4a8cf6');
	$('#settings').css('background-color', '#4a8cf6');
	$('#admin_detail').css('background-color', '#4a8cf6');
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	$('#url_settings').css('background-color', '#4a8cf6');
	$('#show_all').css('background-color', '#d74937');
	
	
	
	
	
	
	$('#hide_table').show();
	$('#reservation_top_right_div').hide();
	$('#reservation_top_left_div').hide();
	$('#reservation_top_center_div').hide();
	$('#reservation_top_center_other_div').show();
	
		var element = document.getElementById("reservation_top_center_other_div");
element.innerHTML = "Show All Settings";
}

function show_reservation_table( info){
$('#user_administration').css('display', 'none');	
	$('#database_administration').css('display', 'none');  
	$('#system_configuration').css('display', 'none');
	$('#your_usage').css('display', 'none');
	$('#your_settings').css('display', 'none');
	$('#admin_details').css('display', 'none');	
	$('#reservation_table_config').css('display', 'none'); 
	$('#show_reservation_table').css('display', 'block');
	$('#user_registration_setting').css('display', 'none');
	$('#url_setting_options').css('display', 'none');
	
	
	$('#user_admin').css('background-color', '#4a8cf6');
	$('#database_admin').css('background-color', '#4a8cf6');
	$('#system_config').css('background-color', '#4a8cf6');
	$('#usage').css('background-color', '#4a8cf6');
	$('#settings').css('background-color', '#4a8cf6');
	$('#admin_detail').css('background-color', '#4a8cf6');
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#d74937');
	$('#show_all').css('background-color', '#4a8cf6');
	$('#url_settings').css('background-color', '#4a8cf6');
	
	
	
	if(info=='settings'){
	$('#hide_edit_table').css('display', 'block');
	$('#reserv_table_settings').css('background-color', '#d74937');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	}
	
	if(info=='table'){
	$('#hide_edit_table').css('display', 'none');
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#d74937');
	}
	
	
	$('#hide_table').show();
	$('#reservation_top_right_div').show();
	$('#reservation_top_left_div').show();
	$('#reservation_top_center_div').show();
	$('#reservation_top_center_other_div').hide();
}

function url_settings()
{

$('#user_administration').css('display', 'none');	
	$('#database_administration').css('display', 'none');  
	$('#system_configuration').css('display', 'none');
	$('#your_usage').css('display', 'none');
	$('#your_settings').css('display', 'none');
	$('#admin_details').css('display', 'none');	
	$('#reservation_table_config').css('display', 'none'); 
	$('#show_reservation_table').css('display', 'none');
	$('#user_registration_setting').css('display', 'none'); 
	$('#url_setting_options').css('display', 'block');
	
	$('#user_admin').css('background-color', '#4a8cf6');
	$('#database_admin').css('background-color', '#4a8cf6');
	$('#system_config').css('background-color', '#4a8cf6');
	$('#usage').css('background-color', '#4a8cf6');
	$('#settings').css('background-color', '#4a8cf6');
	$('#admin_detail').css('background-color', '#4a8cf6');
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	$('#url_settings').css('background-color', '#d74937');
	$('#show_all').css('background-color', '#4a8cf6');
	
	
	
	
	
	
	
	$('#hide_table').hide();
	$('#reservation_top_right_div').hide();
	$('#reservation_top_left_div').hide();
	$('#reservation_top_center_div').hide();
	$('#reservation_top_center_other_div').show();
	
		var element = document.getElementById("reservation_top_center_other_div");
element.innerHTML = "URL Settings";
}



/*
//#reserv_table_settings', 
function reserv_table_settings_button(){

    $('#user_administration').css('display', 'none');	
	$('#database_administration').css('display', 'none');  
	$('#system_configuration').css('display', 'none');
	$('#your_usage').css('display', 'none');
	$('#your_settings').css('display', 'none');
	$('#admin_details').css('display', 'none');
    $('show_reservation_table').css('display', 'none');	
	$('#reservation_table_config').css('display', 'block'); 
	$('#show_reservation_table').css('display', 'none');
	$('#user_registration_setting').css('display', 'none');
	$('#url_setting_options').css('display', 'none');
	
	
	$('#user_admin').css('background-color', '#4a8cf6');
	$('#database_admin').css('background-color', '#4a8cf6');
	$('#system_config').css('background-color', '#4a8cf6');
	$('#usage').css('background-color', '#4a8cf6');
	$('#settings').css('background-color', '#4a8cf6');
	$('#admin_detail').css('background-color', '#4a8cf6');
	$('#reserv_table_settings').css('background-color', '#d74937');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#4a8cf6');
	$('#show_all').css('background-color', '#4a8cf6');
	$('#url_settings').css('background-color', '#4a8cf6');
	
	
	$('#hide_table').show();
	$('#reservation_top_right_div').hide();
	$('#reservation_top_left_div').hide();
	$('#reservation_top_center_div').show();
	$('#reservation_top_center_other_div').hide();
	
		var element = document.getElementById("reservation_top_center_other_div");
element.innerHTML = "Configure and Edit Reservation Table";
	
}
*/






function user_admin_button()
{
    $('#user_administration').css('display', 'block');	
	$('#database_administration').css('display', 'none');  
	$('#system_configuration').css('display', 'none');
	$('#your_usage').css('display', 'none');
	$('#your_settings').css('display', 'none');
	$('#admin_details').css('display', 'none');	
	$('#reservation_table_config').css('display', 'none');
	$('#show_reservation_table').css('display', 'none');
	$('#user_registration_setting').css('display', 'none');
	$('#url_setting_options').css('display', 'none');
	
	$('#user_admin').css('background-color', '#d74937');
	$('#database_admin').css('background-color', '#4a8cf6');
	$('#system_config').css('background-color', '#4a8cf6');
	$('#usage').css('background-color', '#4a8cf6');
	$('#settings').css('background-color', '#4a8cf6');
	$('#admin_detail').css('background-color', '#4a8cf6');
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#4a8cf6');
	$('#show_all').css('background-color', '#4a8cf6');
	$('#url_settings').css('background-color', '#4a8cf6');
	
	
	$('#hide_table').hide();
	$('#reservation_top_right_div').hide();
	$('#reservation_top_left_div').hide();
	$('#reservation_top_center_div').hide();
	$('#reservation_top_center_other_div').show();
	
	var element = document.getElementById("reservation_top_center_other_div");
element.innerHTML = "User Administration";
	
	
}





function database_admin_button()
{
    $('#user_administration').css('display', 'none');	
	$('#database_administration').css('display' , 'block');  
	$('#system_configuration').css('display', 'none');
	$('#your_usage').css('display', 'none');
	$('#your_settings').css('display', 'none');
	$('#admin_details').css('display', 'none');	
	$('#reservation_table_config').css('display', 'none');
	$('#show_reservation_table').css('display', 'none');
	$('#user_registration_setting').css('display', 'none');
	$('#url_setting_options').css('display', 'none');
	
	$('#user_admin').css('background-color', '#4a8cf6');
	$('#database_admin').css('background-color', '#d74937');
	$('#system_config').css('background-color', '#4a8cf6');
	$('#usage').css('background-color', '#4a8cf6');
	$('#settings').css('background-color', '#4a8cf6');
	$('#admin_detail').css('background-color', '#4a8cf6');
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#4a8cf6');
	$('#show_all').css('background-color', '#4a8cf6');
	$('#url_settings').css('background-color', '#4a8cf6');
	
	$('#hide_table').hide();
	$('#reservation_top_right_div').hide();
	$('#reservation_top_left_div').hide();
	$('#reservation_top_center_div').hide();
	$('#reservation_top_center_other_div').show();
	
	var element = document.getElementById("reservation_top_center_other_div");
element.innerHTML = "Database Administration";
	
}


function system_config_button()
{
    $('#user_administration').css('display', 'none');	
	$('#database_administration').css('display', 'none');  
	$('#system_configuration').css('display', 'block');
	$('#your_usage').css('display', 'none');
	$('#your_settings').css('display', 'none');
	$('#admin_details').css('display', 'none');	
	$('#reservation_table_config').css('display', 'none');
	$('#show_reservation_table').css('display', 'none');
	$('#user_registration_setting').css('display', 'none');
	$('#url_setting_options').css('display', 'none');
	
	$('#user_admin').css('background-color', '#4a8cf6');
	$('#database_admin').css('background-color', '#4a8cf6');
	$('#system_config').css('background-color', '#d74937')
	$('#usage').css('background-color', '#4a8cf6');
	$('#settings').css('background-color', '#4a8cf6');
	$('#admin_detail').css('background-color', '#4a8cf6');
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#4a8cf6');
	$('#show_all').css('background-color', '#4a8cf6');
	$('#url_settings').css('background-color', '#4a8cf6');
	
	$('#hide_table').hide();
	$('#reservation_top_right_div').hide();
	$('#reservation_top_left_div').hide();
	$('#reservation_top_center_div').hide();
	$('#reservation_top_center_other_div').hide();
	
	var element = document.getElementById("reservation_top_center_other_div");
element.innerHTML = "System Configuration";
	
}

function usage_button()
{

 
    $('#user_administration').css('display', 'none');	
	$('#database_administration').css('display', 'none');  
	$('#system_configuration').css('display', 'none');
	$('#your_usage').css('display', 'block');
	$('#your_settings').css('display', 'none');
	$('#admin_details').css('display', 'none');	
	$('#reservation_table_config').css('display', 'none');
	$('#show_reservation_table').css('display', 'none');
	$('#user_registration_setting').css('display', 'none');
	$('#url_setting_options').css('display', 'none');
	
	
	
	$('#user_admin').css('background-color', '#4a8cf6');
	$('#database_admin').css('background-color', '#4a8cf6');
	$('#system_config').css('background-color', '#4a8cf6');
	$('#usage').css('background-color', '#d74937');
	$('#settings').css('background-color', '#4a8cf6');
	$('#admin_detail').css('background-color', '#4a8cf6');
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#4a8cf6');
	$('#show_all').css('background-color', '#4a8cf6');
	$('#url_settings').css('background-color', '#4a8cf6');

	$('#hide_table').hide();
	$('#reservation_top_right_div').hide();
	$('#reservation_top_left_div').hide();
	$('#reservation_top_center_div').hide();
	$('#reservation_top_center_other_div').show();
	
	var element = document.getElementById("reservation_top_center_other_div");
element.innerHTML = "Usage";
	
}

function settings_admin_button()
{
    $('#user_administration').css('display', 'none');	
	$('#database_administration').css('display', 'none');  
	$('#system_configuration').css('display', 'none');
	$('#your_usage').css('display', 'none');
	$('#your_settings').css('display', 'block');
	$('#admin_details').css('display', 'none');	
	$('#reservation_table_config').css('display', 'none');
	$('#show_reservation_table').css('display', 'none');
	$('#user_registration_setting').css('display', 'none');
	$('#url_setting_options').css('display', 'none');
	
	$('#user_admin').css('background-color', '#4a8cf6');
	$('#database_admin').css('background-color', '#4a8cf6');
	$('#system_config').css('background-color', '#4a8cf6');
	$('#usage').css('background-color', '#4a8cf6');
	$('#settings').css('background-color', '#d74937');
	$('#admin_detail').css('background-color', '#4a8cf6');
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#4a8cf6');
	$('#show_all').css('background-color', '#4a8cf6');
	
	$('#hide_table').hide();
	$('#reservation_top_right_div').hide();
	$('#reservation_top_left_div').hide();
	$('#reservation_top_center_div').hide();
	$('#reservation_top_center_other_div').show();
	var element = document.getElementById("reservation_top_center_other_div");
element.innerHTML = "Remainders / Notifications - SMS & Email";
	
}

function admin_details_button()
{
    $('#user_administration').css('display', 'none');	
	$('#database_administration').css('display', 'none');  
	$('#system_configuration').css('display', 'none');
	$('#your_usage').css('display', 'none');
	$('#your_settings').css('display', 'none');
	$('#admin_details').css('display', 'block');
	$('#reservation_table_config').css('display', 'none');
	$('#show_reservation_table').css('display', 'none');
	$('#user_registration_setting').css('display', 'none');
	$('#url_setting_options').css('display', 'none');
	
	$('#hide_table').hide();
	$('#reservation_top_right_div').hide();
	$('#reservation_top_left_div').hide();
	$('#reservation_top_center_div').hide();
	$('#reservation_top_center_other_div').show();
	var element = document.getElementById("reservation_top_center_other_div");
element.innerHTML = "Administrator Details";



$('#user_admin').css('background-color', '#4a8cf6');
	$('#database_admin').css('background-color', '#4a8cf6');
	$('#system_config').css('background-color', '#4a8cf6');
	$('#usage').css('background-color', '#4a8cf6');
	$('#settings').css('background-color', '#4a8cf6');
	$('#admin_detail').css('background-color', '#d74937');	
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#4a8cf6');
	$('#show_all').css('background-color', '#4a8cf6');
	$('#url_settings').css('background-color', '#4a8cf6');
	
}


function show_user_registration(){

$('#user_administration').css('display', 'none');	
	$('#database_administration').css('display', 'none');  
	$('#system_configuration').css('display', 'none');
	$('#your_usage').css('display', 'none');
	$('#your_settings').css('display', 'none');
	$('#admin_details').css('display', 'none');	
	$('#reservation_table_config').css('display', 'none'); 
	$('#show_reservation_table').css('display', 'none');
	$('#user_registration_setting').css('display', 'block');
	$('#url_setting_options').css('display', 'none');
	
	
	$('#user_admin').css('background-color', '#4a8cf6');
	$('#database_admin').css('background-color', '#4a8cf6');
	$('#system_config').css('background-color', '#4a8cf6');
	$('#usage').css('background-color', '#4a8cf6');
	$('#settings').css('background-color', '#4a8cf6');
	$('#admin_detail').css('background-color', '#4a8cf6');
	$('#reserv_table_settings').css('background-color', '#4a8cf6');
	$('#show_reserv_table').css('background-color', '#4a8cf6');
	$('#show_all').css('background-color', '#4a8cf6');
	$('#url_settings').css('background-color', '#4a8cf6');
	$('#user_registration').css('background-color', '#d74937');
	
	
	
	
	$('#hide_table').hide();
	$('#reservation_top_right_div').hide();
	$('#reservation_top_left_div').hide();
	$('#reservation_top_center_div').hide();
	$('#reservation_top_center_other_div').show();
	
		var element = document.getElementById("reservation_top_center_other_div");
element.innerHTML = "New User Registration Settings";
}



//**************************************************************************************************************************/



function hide_show_system_configuration(info){

if(info == 'hide'){
	$('#hide_system_configuration_p').css('display', 'none');
	$('#show_system_configuration_p').css('display', 'block');
	$('#admin_configuration_div').css('display', 'none');
	$('#all_configurations_inner').css('left', '170px');
	
    }
	
if(info == 'show'){
	$('#hide_system_configuration_p').css('display', 'block');
	$('#admin_configuration_div').css('display', 'block');
	$('#all_configurations_inner').css('left', '330px');
	$('#show_system_configuration_p').css('display', 'none');
    }	
}



	

function shownew_user()
{
	page_load();
	div_hide('#content_div');
		$.get('login.php?new_user', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); input_focus('#user_company_input'); });
	
	
	$('#content_div').css('width', '1050px');	
	
}

function show_registration_form()
{
	page_load();
	div_hide('#content_div');
	$.get('login.php?new_registration', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); input_focus('#user_company_input'); });
	
	
	$('#content_div').css('width', '1050px');
		
}

	


function show_system_config()
{
	/*page_load();
	div_hide('#content_div');
		$.get('login.php?show_system_config', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded();  $('#main_menu_div').css('margin-left', '200px');});
	
    page_load('reservation');
	div_hide('#content_div');*/
	
	

	$.get('login.php?show_system_config', function(data)
	{
		$('#content_div').html(data);
		div_fadein('#content_div');
		
		$('<p id = "demoga" class="message_p">Support for this system has been discontinued. For more information or further inquries, please contact the <a href"#contact"> site admin</a></p>').insertAfter('#demo_config');
	setTimeout(function()
		{		
			$("#demoga").slideUp('3000');
		}, 5000);

		//$.get('system_config.php?week='+global_week_number, function(data)
		//{
		//	$('#reservation_table_div').html(data).slideDown('slow', function() { setTimeout(function() { div_fadein('#reservation_table_div'); }, 250); });
		//	page_loaded();
		//});
	});	
		
		
}

function showforgot_password()
{
	page_load();
	div_hide('#content_div');
	$.get('login.php?forgot_password', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });
	
}





function showreservations()
{
	page_load('reservation');
	div_hide('#content_div');
	

	 
	
     if( session_user_is_admin == '1') {
	$.get('logged_in_html.php', function(data)
	
	{
		$('#content_div').html(data);
		div_fadein('#content_div');
		if( session_just_registered == '1'){
			 $('#show_on_registration').css('display', 'block');
			 $('#admin_system_configuration_div').css('top', '173px');
			 }
			 
		
		$.get('reservation.php?week='+global_week_number, function(data)
		{
			$('#reservation_table_div').html(data).slideDown('slow', function() { setTimeout(function() { div_fadein('#reservation_table_div'); }, 250); });
			page_loaded();
		});
	});
	}
	
	
	if( session_user_is_admin == '0'){
	$.get('logged_in_user.php', function(data)
	{
		$('#content_div').html(data);
		div_fadein('#content_div');
		
		if( session_just_signed_up == '1'){
			 $('#show_on_sign_up').css('display', 'block');
			 }	 


		$.get('reservation.php?week='+global_week_number, function(data)
		{
			$('#reservation_table_div').html(data).slideDown('slow', function() { setTimeout(function() { div_fadein('#reservation_table_div'); }, 250); });
			page_loaded();
		});
	});
	}
	
	
	

	
	
}

function showweek(week, option)
{
	if(week == 'next')
	{
		var week = parseInt($('#week_number_span').html()) + 1;
	}
	else if(week == 'previous')
	{
		var week = parseInt($('#week_number_span').html()) - 1;
	}
	else
	{
		var week = parseInt(week);
	}

	if(isNaN(week))
	{
		notify('Invalid week number', 4);
	}
	else
	{
		if(week < 1)
		{
			var week = 52;
		}
		else if(week > 52)
		{
			var week = 1;
		}

		page_load('week');
		div_hide('#reservation_table_div');

		$.get('reservation.php?week='+week, function(data)
		{
			$('#reservation_table_div').html(data);
			$('#week_number_span').html(week);
			div_fadein('#reservation_table_div');
			page_loaded('week');

			if(week != global_week_number)
			{
				$('#reservation_today_button').css('visibility', 'visible');
			}

			if(option == 'today')
			{
				setTimeout(function() { $('#today_span').animate({ opacity: 0 }, 250, function() { $('#today_span').animate({ opacity: 1 }, 250);  }); }, 500);
			}
		});
	}
}

function showcp()
{
	page_load();
	div_hide('#content_div');
	$.get('cp.php', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });
	

}

function showhelp()
{
	page_load();
	div_hide('#content_div');
	$.get('help.php', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });
	
}

function show_blogs_home()
{
	page_load();
	div_hide('#content_div');
	$.get('./blogs/blogs.php', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });
	
}

function show_blogs_home_automation()
{
	page_load();
	div_hide('#content_div');
	$.get('./blogs/home_automation_using_bluetooth.php', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });	
}

function show_blogs_navigating_the_web()
{
	page_load();
	div_hide('#content_div');
	$.get('./blogs/navigating_the_web_using_speech.php', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });	
}


function show_blogs_automated_web_tasks()
{
	page_load();
	div_hide('#content_div');
	$.get('./blogs/automated_web_tasks.php', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });	
}


function show_blogs_smart_water_heating()
{
	page_load();
	div_hide('#content_div');
	$.get('./blogs/smart_water_heating.php', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });	
}


function show_blogs_wireless_sensor_networks()
{
	page_load();
	div_hide('#content_div');
	$.get('./blogs/wireless_sensor_networks.php', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });	
}


function show_contact_form()
{
	page_load();
	div_hide('#content_div');
	$.get('contact_us.php', function(data) { $('#content_div').html(data); div_fadein('#content_div'); page_loaded(); });	
}





// Page load

function page_load(page)
{
	// All
	setTimeout(function()
	{
		if($('#content_div').css('opacity') == 0)
		{
			notify('Loading...', 300);
		}
	}, 500);

	// Individual
	if(page == 'reservation')
	{
		setTimeout(function()
		{
			if($('#reservation_table_div').is(':hidden'))
			{
				notify('Loading...', 300);
			}
		}, 500);
	}	
	else if(page == 'week')
	{
		setTimeout(function()
		{
			if($('#reservation_table_div').css('opacity') == 0)
			{
				notify('Loading...', 300);
			}
		}, 500);
	}
}

function page_loaded(page)
{
	
	// All
	$.get('main.php?day_number', function(data)
	{
		if(data != global_day_number)
		{
			notify('Day have changed. Refreshing...', '300');
			setTimeout(function() { window.location.replace('.'); }, 2000);
		}
	});

	setTimeout(function()
	{
		if($('#notification_inner_cell_div').is(':visible') && $('#notification_inner_cell_div').html() == 'Loading...')
		{
			notify();
		}
	}, 1000);

	read_reservation_details();

	// Individual
	if(page == 'about')
	{
		$('#about_latest_version_p').html('<img src="img/loading.gif" alt="Loading"> Getting latest version...');

		setTimeout(function()
		{
			$.get('main.php?latest_version', function(data)
			{
				if($('#about_latest_version_p').length)
				{
					$('#about_latest_version_p').html(data);
				}
			});
		}, 1000);
	}

setTimeout(function()
{
$('<p id = "demoga" style=" color:#d74937; font-size: 16px;	font-weight: bold;">Support for this system has been discontinued. For more information or further inquries, please contact the <a href"#contact"> site admin</a></p>').insertAfter('#company_name_div');
},2000);
	setTimeout(function()
		{		
			$("#demoga").slideUp('3000');
		}, 10000);	

}

// Login

function login()
{
	var user_email = $('#user_email_input').val();
	var user_password = $('#user_password_input').val();
	var user_company = $('#user_company_input').val();

	$('#login_message_p').html('<img src="img/loading.gif" alt="Loading"> Logging in...').slideDown('fast');

	var remember_me_checkbox = $('#remember_me_checkbox').prop('checked');

	if(remember_me_checkbox)
	{
		var user_remember = 1;
	}
	else
	{
		var user_remember = 0;
	}

	$.post('login.php?login', { user_email: user_email, user_password: user_password, user_company:user_company, user_remember: user_remember }, function(data)
	{
		if(data == 1)
		{
			input_focus();
			setTimeout(function() { window.location.replace('.'); }, 1000);
			
		}
		else
		{
			if(data == '')
			{
				$('#login_message_p').html('<span class="error_span">Wrong email and/or password</span>');
				$('#user_email_input').val('');
				$('#user_password_input').val('');
				$('#user_company_input').val('');
				input_focus('#user_company_input');
			}
			else
			{
				$('#login_message_p').html(data); 
			}
		}
	});
}





function logout()
{
	notify('Logging out...', 300);
	$.get('login.php?logout', function(data) { setTimeout(function() { window.location.replace('.'); }, 1000); });
}





function create_user()
{
    
	var user_company = $('#user_company_input').val();
	var user_name = $('#user_name_input').val();
	var user_mobile = $('#user_mobile_number').val();
	var user_email = $('#user_email_input').val();
	var user_password = $('#user_password_input').val();
	var user_password_confirm = $('#user_password_confirm_input').val();

	if($('#user_secret_code_input').length)
	{
		var user_secret_code =  $('#user_secret_code_input').val();
	}
	else
	{
		var user_secret_code = '';
	}

	if(user_password != user_password_confirm)
	{
		$('#new_user_message_p').html('<span class="error_span">Passwords do not match</span>').slideDown('fast');
		$('#user_password_input').val('');
		$('#user_password_confirm_input').val('');
		input_focus('#user_password_input');
	}
	else
	{
		$('#new_user_message_p').html('<img src="img/loading.gif" alt="Loading"> Creating user...').slideDown('fast');

		$.post('login.php?create_user', { user_company: user_company, user_name: user_name, user_mobile:user_mobile, user_email: user_email, user_password: user_password, user_secret_code: user_secret_code }, function(data)
		{
			if(data == 1)
			{
				

				
					$('#new_user_message_p').html('User created successfully! Logging in... <img src="img/loading.gif" alt="Loading">');
					
					
						var user_remember = 0;
						

						$.post('login.php?login', { user_email: user_email, user_password: user_password, user_company:user_company, user_remember: user_remember }, function(data)
						{
							if(data == 1)
							{
								input_focus();
								setTimeout(function() { window.location.replace('.'); }, 1000);
								
							}
							else
							{
								if(data == '')
								{
									$('#login_message_p').html('<span class="error_span">Wrong email and/or password</span>');
									$('#user_email_input').val('');
									$('#user_password_input').val('');
									$('#user_company_input').val('');
									input_focus('#user_company_input');
								}
								else
								{
									$('#login_message_p').html(data); 
								}
							}
							});			
					
					
					/*setTimeout(function() { window.location.replace('#login'); }, 2000);*/
				
			}
			else    
			{
				input_focus();
				$('#new_user_message_p').html(data);
			}
		});
	}
}


function check_if_url_exists(url_id)
{
var url= url_id;



$.post('login.php?check_url_exists', { url: url }, function(data)
		{
		
		   
			
			if(data == 1)
			{
				page_load();
	            div_hide('#content_div');
				
			    $.get('login.php?show_company_home', function(data) { $('#content_div').html(data); div_fadein('#content_div'); 
				page_loaded();  });						
            
			}
			else    
			{					
			    
				input_focus();
				$('#help_plz_message_p').html(data);
				
				
				
				window.location.replace('.');
				
			}
	});

  }





// Reservation

function toggle_reservation_time(id, week, day, time, from)
{
	if(session_user_is_admin == '1')
	{
		if(week < global_week_number || week == global_week_number && day < global_day_number)
		{
			notify('You are reserving back in time. You can do that because you\'re an admin', 4);
		}
		else if(week > global_week_number + global_weeks_forward)
		{
			notify('You are reserving more than '+global_weeks_forward+' weeks forward in time. You can do that because you\'re an admin', 4);
		}
	}

	var user_name = $(id).html();
	
	

	if(user_name == '')
	{
		$(id).html('Wait...'); 

		$.post('reservation.php?make_reservation', { week: week, day: day, time: time }, function(data) 
		{
			if(data == 1)
			{   
			    
				setTimeout(function() { read_reservation(id, week, day, time); }, 1000);
			}
			else
			{
				notify(data, 4);
				setTimeout(function() { read_reservation(id, week, day, time); }, 2000);			
			}
		});
	}
	else
	{
		if(offclick_event == 'mouseup' || from == 'details')
		{
			if(user_name == 'Wait...')
			{
				notify('One click is enough', 4);
			}
			else if(user_name == session_user_name || session_user_is_admin == '1')
			{
				if(user_name != session_user_name && session_user_is_admin == '1')
				{
					var delete_confirm = confirm('This is not your reservation, but because you\'re an admin you can remove other users\' reservations. Are you sure you want to do this?');
				}
				else
				{
					var delete_confirm = true;
				}

				if(delete_confirm)
				{
					$(id).html('Wait...');

					$.post('reservation.php?delete_reservation', { week: week, day: day, time: time }, function(data)
					{
						if(data == 1)
						{
							setTimeout(function() { read_reservation(id, week, day, time); }, 1000);
						}
						else
						{
							notify(data, 4);
							setTimeout(function() { read_reservation(id, week, day, time); }, 2000);
						}
					});
				}
			}
			else
			{
				notify('You can\'t remove other users\' reservations', 2);
			}

			if($('#reservation_details_div').is(':visible'))
			{
				read_reservation_details();
			}
		}
	}
}

function read_reservation(id, week, day, time)
{
	$.post('reservation.php?read_reservation', { week: week, day: day, time: time }, function(data) { $(id).html(data); });
}

function read_reservation_details(id, week, day, time)
{
	if(typeof id != 'undefined' && $(id).html() != '' && $(id).html() != 'Wait...')
	{
		if($('#reservation_details_div').is(':hidden'))
		{
			var position = $(id).position();
			var top = position.top + 50;
			var left = position.left - 100;

			$('#reservation_details_div').html('Getting details...');
			$('#reservation_details_div').css('top', top+'px').css('left', left+'px');
			$('#reservation_details_div').fadeIn('fast');

			reservation_details_id = id;
						reservation_details_week = week;
			reservation_details_day = day;
			reservation_details_time = time;

			$.post('reservation.php?read_reservation_details', { week: week, day: day, time: time }, function(data)
			{
				setTimeout(function()
				{
					if(data == 0)
					{
						$('#reservation_details_div').html('This reservation no longer exists. Wait...');
						
						setTimeout(function()
						{
							if($('#reservation_details_div').is(':visible') && $('#reservation_details_div').html() == 'This reservation no longer exists. Wait...')
							{
								read_reservation(reservation_details_id, reservation_details_week, reservation_details_day, reservation_details_time);
								read_reservation_details();
							}
						}, 2000);
					}
					else
					{
						$('#reservation_details_div').html(data);

						if(offclick_event == 'touchend')
						{
							if($(reservation_details_id).html() == session_user_name || session_user_is_admin == '1')
							{
								var delete_link_html = '<a href="." onclick="toggle_reservation_time(reservation_details_id, reservation_details_week, reservation_details_day, reservation_details_time, \'details\'); return false">Delete</a> | ';
							}
							else
							{
								var delete_link_html = '';
							}

							$('#reservation_details_div').append('<br><br>'+delete_link_html+'<a href="." onclick="read_reservation_details(); return false">Close this</a>');
						}
					}
				}, 500);
			});
		}
	}
	else
	{
		$('div#reservation_details_div').fadeOut('fast');
	}
}

// Admin control panel

function list_users()
{
	$.get('cp.php?list_users', function(data) { $('#users_div').html(data); });
}

function reset_user_password()
{
	if(typeof $(".user_radio:checked").val() !='undefined')
	{
		var user_id = $(".user_radio:checked").val();

		$('#user_administration_message_p').html('<img src="img/loading.gif" alt="Loading"> Resetting password...').slideDown('fast');

		$.post('cp.php?reset_user_password', { user_id: user_id }, function(data)
		{
			if(data == 0)
			{
				$('#user_administration_message_p').html('<span class="error_span">You can change your password at the bottom of this page</span>').slideDown('fast');
			}
			else
			{
				setTimeout(function() { $('#user_administration_message_p').html(data); }, 1000);
			}
		});
	}
	else
	{
		$('#user_administration_message_p').html('<span class="error_span">You must pick a user</span>').slideDown('fast');
	}
}

function change_user_permissions()
{
	if(typeof $(".user_radio:checked").val() !='undefined')
	{
		var user_id = $(".user_radio:checked").val();

		$('#user_administration_message_p').html('<img src="img/loading.gif" alt="Loading"> Changing permissions...').slideDown('fast');

		$.post('cp.php?change_user_permissions', { user_id: user_id }, function(data)
		{
			if(data == 1)
			{
				setTimeout(function()
				{
					list_users();
					$('#user_administration_message_p').html('Permissions changed successfully. The user must re-login to get the new permissions');
				}, 1000);
			}
			else
			{
				$('#user_administration_message_p').html(data);
			}
		});
	}
	else
	{
		$('#user_administration_message_p').html('<span class="error_span">You must pick a user</span>').slideDown('fast');
	}
}

function delete_user_data(delete_data)
{
	if(typeof $(".user_radio:checked").val() !='undefined')
	{
		var delete_confirm = confirm('Are you sure?');

		if(delete_confirm)
		{
			var user_id = $(".user_radio:checked").val();

			$('#user_administration_message_p').html('<img src="img/loading.gif" alt="Loading"> Deleting...').slideDown('fast');

			$.post('cp.php?delete_user_data', { user_id: user_id, delete_data: delete_data }, function(data)
			{
				if(data == 1)
				{
					setTimeout(function()
					{
						$('#user_administration_message_p').slideUp('fast', function()
						{
							if(delete_data == 'reservations')
							{
								list_users();
								get_usage();
							}
							else if(delete_data == 'user')
							{
								list_users();
							}
						});
					}, 1000);
				}
				else
				{
					$('#user_administration_message_p').html(data);
				}
			});
		}
	}
	else
	{
		$('#user_administration_message_p').html('<span class="error_span">You must pick a user</span>').slideDown('fast');
	}
}












function delete_all(delete_data)
{
	if(delete_data == 'reservations')
	{
		var delete_confirm = confirm('Are you sure you want to delete ALL reservations? Database backup is a good idea!');
	}
	else if(delete_data == 'users')
	{
		var delete_confirm = confirm('Are you sure you want to delete ALL users? Database backup is a good idea!');
	}
	else if(delete_data == 'everything')
	{
		var delete_confirm = confirm('Are you sure you want to delete EVERYTHING (including you)? The first user created afterwards will become admin. Database backup is a good idea!');
	}

	if(delete_confirm)
	{
		$('#database_administration_message_p').html('<img src="img/loading.gif" alt="Loading"> Deleting...').slideDown('fast');

		$.post('cp.php?delete_all', { delete_data: delete_data }, function(data)
		{
			if(data == 1)
			{
				setTimeout(function()
				{
					if(delete_data == 'everything')
					{
						window.location.replace('#logout');
					}
					else
					{
						list_users();
						$('#database_administration_message_p').slideUp('fast');
					}
				}, 1000);
			}
			else
			{
				$('#database_administration_message_p').html(data);
			}
		});
	}
}

function save_system_configuration()
{
	var price = $('#price_input').val();

	$('#system_configuration_message_p').html('<img src="img/loading.gif" alt="Loading"> Saving...');
	$('#system_configuration_message_p').slideDown('fast');

	$.post('cp.php?save_system_configuration', { price: price }, function(data)
	{
		if(data == 1)
		{
			input_focus();

			setTimeout(function()
			{
				$('#system_configuration_message_p').slideUp('fast', function()
				{
					get_usage();
				});
			}, 1000);
		}
		else
		{
			input_focus('#price_input');
			$('#system_configuration_message_p').html(data);
		}
	});
}

// User control panel

function get_usage()
{
	$.get('cp.php?get_usage', function(data) { $('#usage_div').html(data); });
}

function get_reservation_reminders()
{
	$.get('cp.php?get_reservation_reminders', function(data) { $('#reservation_reminders_span').html(data); });
}

function get_sms_reminders()
{
	$.get('cp.php?get_sms_reminders', function(data) { $('#sms_reminders_span').html(data); });
}

function get_email_reminders()
{
$.get('cp.php?get_email_reminders', function(data) { $('#email_reminders_span').html(data); });
}


function add_one_reservation()
{
	$('#usage_message_p').html('<img src="img/loading.gif" alt="Loading"> Saving...').slideDown('fast');

	$.post('reservation.php?make_reservation', { week: '0', day: '0', time: '0' }, function(data)
	{
		if(data == 1)
		{
			setTimeout(function()
			{
				if($('#users_div').length)
				{
					list_users();
				}

				get_usage();
				$('#usage_message_p').slideUp('fast');
			}, 1000);
		}
		else
		{
			$('#usage_message_p').html(data);
		}
	});
}

function toggle_reservation_reminder()
{
	$('#settings_message_p').html('<img src="img/loading.gif" alt="Loading"> Saving...').slideDown('fast');

	$.post('cp.php?toggle_reservation_reminder', function(data)
	{
		if(data == 1)
		{
			setTimeout(function()
			{
				if($('#users_div').length)
				{
					list_users();		
				}

				get_reservation_reminders();
				$('#settings_message_p').slideUp('fast');
			}, 1000);
		}
		else
		{
			$('#settings_message_p').html(data);
		}
	});
}

function toggle_sms_reminder()
{
	$('#sms_message_p').html('<img src="img/loading.gif" alt="Loading"> Saving SMS message settings...').slideDown('fast');

	$.post('cp.php?toggle_sms_reminder', function(data)
	{
		if(data == 1)
		{
			setTimeout(function()
			{
				

				get_sms_reminders();
				$('#sms_message_p').slideUp('fast');
			}, 1000);
		}
		else
		{
			$('#sms_message_p').html(data);
		}
	});
}

function toggle_email_verification()
{
	$('#email_verification_message_p').html('<img src="img/loading.gif" alt="Loading"> Saving email verification settings settings...').slideDown('fast');

	$.post('cp.php?toggle_email_verification', function(data)
	{
		if(data == 1)
		{
			setTimeout(function()
			{
				

				get_sms_reminders();
				$('#email_verification_message_p').slideUp('fast');
			}, 1000);
		}
		else
		{
			$('#email_verification_message_p').html(data);
		}
	});
}



function toggle_email_reminder()
{
	$('#email_message_p').html('<img src="img/loading.gif" alt="Loading"> Saving Email message settings...').slideDown('fast');

	$.post('cp.php?toggle_email_reminder', function(data)
	{
		if(data == 1)
		{
			setTimeout(function()
			{
				
				get_email_reminders();
				$('#email_message_p').slideUp('fast');
			}, 1000);
		}
		else
		{
			$('#email_message_p').html(data);
		}
	});
}



function toggle_demonstration_checkbox(message_p)
{	

if(message_p == 'sms_demonstration_checkbox'){	
$('#sms_demonstration_message_p').html('<img src="img/loading.gif" alt="Loading"> Support for this system has been discontinued. For more information or further inquries, please contact the <a href"#contact"> site admin</a>').slideDown('fast');
			setTimeout(function()
			{			
				
				$('#sms_demonstration_message_p').slideUp('fast');
			}, 5000);
			
			//document.getElementByID("sms_demonstration_checkbox").setAttribute("checkbox","");
}

if(message_p == 'email_demonstration_checkbox'){	
$('#email_demonstration_message_p').html('<img src="img/loading.gif" alt="Loading"> Support for this system has been discontinued. For more information or further inquries, please contact the <a href"#contact"> site admin</a>').slideDown('fast');
			setTimeout(function()
			{			
				
				$('#email_demonstration_message_p').slideUp('fast');
			}, 5000);
}

if(message_p == 'reservation_days'){	
$('#reservation_days_message_p').html('<img src="img/loading.gif" alt="Loading"> Support for this system has been discontinued. For more information or further inquries, please contact the <a href"#contact"> site admin</a>').slideDown('fast');
			setTimeout(function()
			{			
				
				$('#reservation_days_message_p').slideUp('fast');
			}, 5000);
}

if(message_p == 'reservation_times'){	
$('#reservation_times_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p"> The settings on this page are just a demonstration </br> of the features avaliable. To get started, <a href"#register"> register</a> your business and set up your configuration</p>').slideDown('fast');
			setTimeout(function()
			{			
				
				$('#reservation_times_message_p').slideUp('fast');
			}, 5000);
}


		
}




function demo_update_sms_message_details(){

$('#demo_update_sms_remainder_message_p').html('<img src="img/loading.gif" alt="Loading"> The settings on this page are just a demonstration </br> of the features avaliable. To get started, <a href"#register"> register</a> your business and set up your configuration').slideDown('fast');
			setTimeout(function()
			{			
				
				$('#demo_update_sms_remainder_message_p').slideUp('fast');
			}, 5000);
}

function demo_update_email_message_details(){

$('#demo_update_email_remainder_message_p').html('<img src="img/loading.gif" alt="Loading"> The settings on this page are just a demonstration </br> of the features avaliable. To get started, <a href"#register"> register</a> your business and set up your configuration').slideDown('fast');
			setTimeout(function()
			{			
				
				$('#demo_update_email_remainder_message_p').slideUp('fast');
			}, 5000);
}


function toggle_demo_sms_feedback_checkbox(){
$('#demo_sms_feedback_message_p').html('<img src="img/loading.gif" alt="Loading"> The settings on this page are just a demonstration </br> of the features avaliable. To get started, <a href"#register"> register</a> your business and set up your configuration').slideDown('fast');
			setTimeout(function()
			{			
				
				$('#demo_sms_feedback_message_p').slideUp('fast');
			}, 5000);
}

function toggle_demo_real_time_response_checkbox(){
$('#demo_real_time_response_message_p').html('<img src="img/loading.gif" alt="Loading"> The settings on this page are just a demonstration </br> of the features avaliable. To get started, <a href"#register"> register</a> your business and set up your configuration').slideDown('fast');
			setTimeout(function()
			{			
				
				$('#demo_real_time_response_message_p').slideUp('fast');
			}, 5000);
}

function change_user_details()
{
	var user_name = $('#user_name_input').val();
	var user_email = $('#user_email_input').val();
	var user_password = $('#user_password_input').val();
	var user_password_confirm = $('#user_password_confirm_input').val();

	if(user_password != user_password_confirm)
	{
		$('#user_details_message_p').html('<span class="error_span">Passwords do not match</span>').slideDown('fast');
		$('#user_password_input').val('');
		$('#user_password_confirm_input').val('');
		input_focus('#user_password_input');
	}
	else
	{	
		$('#user_details_message_p').html('<img src="img/loading.gif" alt="Loading"> Saving and refreshing...').slideDown('fast');

		$.post('cp.php?change_user_details', { user_name: user_name, user_email: user_email, user_password: user_password }, function(data)
		{
			if(data == 1)
			{
				input_focus();
				setTimeout(function() { window.location.replace('.'); }, 1000);
			}
			else
			{
				input_focus();
				$('#user_details_message_p').html(data);
			}
		});
	}
}


function update_sms_message_details()
{

var user_name = $('#sms_remainder_msg').text();
		
		$('#update_sms_remainder_message_p').html('<img src="img/loading.gif" alt="Loading"> Updating SMS remainder msg...').slideDown('fast');

		$.post('cp.php?update_sms_details', { user_name: user_name}, function(data)
		{
			if(data == 1)
			{
				input_focus();
				setTimeout(function() { window.location.replace('.'); }, 1000);
			}
			else
			{
				input_focus();
				$('#update_sms_remainder_message_p').html(data);
			}
		});
	
}

function update_email_message_details()
{
var user_name = $('#email_remainder_msg').text();
		
		$('#update_email_remainder_message_p').html('<img src="img/loading.gif" alt="Loading"> Updating Email remainder msg...').slideDown('fast');

		$.post('cp.php?update_email_details', { user_name: user_name}, function(data)
		{
			if(data == 1)
			{
				input_focus();
				setTimeout(function() { window.location.replace('.'); }, 1000);
			}
			else
			{
				input_focus();
				$('#update_email_remainder_message_p').html(data);
			}
		});
	
}



// UI

function div_fadein(id)
{
	setTimeout(function()
	{
		if(global_css_animations == 1)
		{
			$(id).addClass('div_fadein');
		}
		else
		{
			$(id).animate({ opacity: 1 }, 250);
		}
	}, 1);
}

function div_hide(id)
{
	$(id).removeClass('div_fadein');
	$(id).css('opacity', '0');
}

function notify(text, time)
{
	if(typeof text != 'undefined')
	{
		if(typeof notify_timeout != 'undefined')
		{
			clearTimeout(notify_timeout);
		}

		$('#notification_inner_cell_div').css('opacity', '1');

		if($('#notification_div').is(':hidden'))
		{
			$('#notification_inner_cell_div').html(text);
			$('#notification_div').slideDown('fast');
		}
		else
		{
			$('#notification_inner_cell_div').animate({ opacity: 0 }, 250, function() { $('#notification_inner_cell_div').html(text); $('#notification_inner_cell_div').animate({ opacity: 1 }, 250); });
		}

		notify_timeout = setTimeout(function() { $('#notification_inner_cell_div').animate({ opacity: 0 }, 250, function() { $('#notification_div').slideUp('fast'); }); }, 1000 * time);
	}
	else
	{
		if($('#notification_div').is(':visible'))
		{
			$('#notification_inner_cell_div').animate({ opacity: 0 }, 250, function() { $('#notification_div').slideUp('fast'); });
		}
	}
}

function input_focus(id)
{
	if(offclick_event == 'touchend')
	{
		$('input').blur();
	}
	if(typeof id != 'undefined')
	{
		$(id).focus();
	}
}





function premium_service_checkbox(premium_p)
{	

	if(premium_p == 'real_time_response'){	
	$('#premium_real_time_response_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#premium_real_time_response_message_p').slideUp('fast');
				}, 5000);
				 $('#un_check_me_real_time_response').html( '<input type="checkbox" id="sms_feedback_premium_service"> <label for="demonstration_checkbox">Enable Real Time Response </label>') 
				
		}
		
	if(premium_p == 'sms_feedback'){	
	$('#premium_sms_feedback_response_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#premium_sms_feedback_response_message_p').slideUp('fast');
				}, 5000);
				 $('#un_check_me_sms_feedback').html( '<input type="checkbox" id="sms_feedback_premium_service"> <label for="demonstration_checkbox">Enable SMS feedback </label>') 
				
		}

if(premium_p == 'one_timed'){	
	$('#one_timed_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#one_timed_message_p').slideUp('fast');
				}, 5000);
				 $('#un_check_me_timed_session').html( '<input type="checkbox" id="One time booking session"> <label for="demonstration_checkbox">Enable SMS feedback </label>') 
				
		}		
		
		
	
if(premium_p == 'reservation_days'){	
	$('#premium_reservation_days_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#premium_reservation_days_message_p').slideUp('fast');
				}, 5000);
				
		
		
			 $('#un_check_me_reservation_days').html( '<input type="checkbox" id="One time booking session"> <label for="demonstration_checkbox">Enable SMS feedback </label>');
}
 if(premium_p == 'reservation_times'){	
	$('#premium_reservation_times_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#premium_reservation_times_message_p').slideUp('fast');
				}, 5000);
				
				
				 $('#un_check_me_reservation_days').html( '<input type="checkbox" id="One time booking session"> <label for="demonstration_checkbox">Enable SMS feedback </label>');
}
				
		

if(premium_p == 'sms_welcome_message'){	
	$('#premium_sms_welcome_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#premium_sms_welcome_message_p').slideUp('fast');
				}, 5000);
				 $('#un_check_me_sms_welcome').html( '<input type="checkbox" id="One time booking session"> <label for="demonstration_checkbox">Enable an sms welcome message </label>') 
				
		}
		

		
	if(premium_p == 'email_welcome_message'){	
	$('#premium_email_welcome_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#premium_email_welcome_message_p').slideUp('fast');
				}, 5000);
		$('#un_check_me_email_remainder').html( '<input type="checkbox" id="One time booking session"> <label for="demonstration_checkbox">Enable an email welcome message </label>') 
    }
	
	if(premium_p == 'geographical'){	
	$('#geographical_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#geographical_message_p').slideUp('fast');
				}, 5000);
		$('#un_check_me_geographical').html( '<input type="checkbox" id="One time booking session"> <label for="demonstration_checkbox">Enable an email welcome message </label>') 
    }	
	
	
	if(premium_p == 'welcome_message'){	
	$('#welcome_email_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#welcome_email_message_p').slideUp('fast');
				}, 5000);
		
    }
	
	
	
	if(premium_p == 'reservation_time'){	
	$('#reservation_times_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#reservation_times_message_p').slideUp('fast');
		}, 5000);
		 $('#uncheck_reservation_times').html
		 ( '<input type="checkbox" id="time_08-09"  > \
			<label class="reservation_times">08-09</label>\
			<input type="checkbox" id="time_09-10" checked="checked" >\
			<label class="reservation_times">09-10</label>\
			<input type="checkbox" id="time_10-11" checked="checked" >\
			<label class="reservation_times">10-11</label>\
			<input type="checkbox" id="time_11-12" checked="checked" >\
			<label class="reservation_times">11-12</label>\
			<input type="checkbox" id="time_12-13" checked="checked" >\
			<label class="reservation_times">12-13</label>\
			<input type="checkbox" id="time_13-14" checked="checked" >\
			<label class="reservation_times">13-14</label>\
			<input type="checkbox" id="time_14-15" checked="checked" >\
			<label class="reservation_times">14-15</label>\
			<input type="checkbox" id="time_15-16" checked="checked" > \
			<label class="reservation_times">15-16</label>\
			<input type="checkbox" id="time_16-17" checked="checked" > \
			<label class="reservation_times">16-17</label>\
			<input type="checkbox" id="time_17-18" > \
			<label class="reservation_times">17-18</label>\
			<input type="checkbox" id="time_18-19"  > \
			<label class="reservation_times">18-19</label>\
			<input type="checkbox" id="time_19-20"  > \
			<label class="reservation_times">19-20</label>') 		
	}
	
	
	
	if(premium_p == 'reservation_days'){	
		
	$('#reservation_days_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">This service is only available to our premium service subscribers.</br> To setup a premium account, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#reservation_days_message_p').slideUp('fast');
		}, 5000);
		 $('#uncheck_reservation_days').html
		 ( '<input type="checkbox" id="reservation_days_monday" checked="checked"> \
			<label class ="reservation_days">Monday </label>\
			<input type="checkbox" id="reservation_days_tuesday" checked="checked"> \
			<label class ="reservation_days">Tuesday </label>\
			<input type="checkbox" id="reservation_days_wednesday" checked="checked"> \
			<label class ="reservation_days">Wednesday </label>\
			<input type="checkbox" id="reservation_days_thursday" checked="checked"> \
			<label class ="reservation_days">Thursday </label>\
			<input type="checkbox" id="reservation_days_friday" checked="checked"> \
			<label class ="reservation_days">Friday </label>\
			<input type="checkbox" id="reservation_days_saturday"> \
			<label class ="reservation_days">Saturday</label>\
			<input type="checkbox" id="reservation_days_sunday" > \
			<label class ="reservation_days">Sunday</label>') 		
	}
	
		
		
}
	


	
	
	
function registration_enabling()
{
   var enable_id = '';
   
  if ($('#enable_registration').is(':checked'))
  {
    var enable_id = 1;
	
	  $('#registration_enabling_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">Registration for your reservation service is now enabled.</br> Saving the settings....').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#registration_enabling_message_p').slideUp('fast');
				}, 3000);
   }
   
  if ($('#disable_registration').is(':checked'))
  {
     var enable_id = 0;
	 
    $('#registration_enabling_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">Registration for your reservation service is now disabled.</br> Saving the settings....').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#registration_enabling_message_p').slideUp('fast');
				}, 3000);
  }		
		if(typeof (enable_id) !='undefined'){
		$.post('cp.php?registration_enabling', { enable_id: enable_id}, function(data)
		{
		
		if(data == 1)
				{
					setTimeout(function()
					{
						$('#new_user_registration_p').slideUp('fast', function()
						{
						});
					}, 1000);
				}
				else
				{
					$('#new_user_registration_p').html(data);
				}
			});
		}      
	   
}	
	
	

function who_can_register()
{

 var who_can_id = '';
   
  if ($('#registration_anyone').is(':checked'))
  {
    var who_can_id = 0;
	var who_can_value = 0;
   var element = document.getElementById("who_can_input");
	  
	
	  $('#who_can_register_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">Registration access is now allowed for anyone to register to your online reservation service.</br> Saving the settings....').slideDown('fast');
				setTimeout(function()
				{			
					
					$('#who_can_register_message_p').slideUp('fast');
				}, 3000);
				element.value= "";
   }
   
  if ($('#registration_secret').is(':checked'))
  {
        var text_input = $('#who_can_input').val();
		
		 if (text_input.length > 4){
			var who_can_id = 1;
			var who_can_value = text_input;
			 
			$('#who_can_register_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">Registration access is now restricted only to users who know the secret code.</br> Saving the settings....').slideDown('fast');
						setTimeout(function()
						{			
							
							$('#who_can_register_message_p').slideUp('fast');
						}, 3000);
         }
		else
		{
		   var who_can_id = ''; 
		   $('#who_can_secret_error_p').html('<img src="img/loading.gif" alt="Loading" />Please enter correct secret code..').slideDown('fast');
		    setTimeout(function()
						{			
							
							$('#who_can_secret_error_p').slideUp('fast');
						}, 3000);
		
		}
	}	
		
	if(typeof (who_can_id ) !='undefined'){
	$.post('cp.php?who_can_register', { who_can_id : who_can_id , who_can_value:who_can_value}, function(data)
	{

	if(data == 1)
		{
			
		}
		else
		{
			
		}
	});
	}      
	   
}









function change_url()
{


     
 var text_input = $('#new_url_input').val();
		
		 if (text_input.length > 2){			
						 
			$('#new_url_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">Changing the url.</br> Saving the settings....').slideDown('fast');
						setTimeout(function()
						{			
							
							$('#new_url_message_p').slideUp('fast');
						}, 3000);
         }  
		

	$.post('cp.php?change_url', { text_input : text_input }, function(data)
	{

	if(data == 1)
		{
		
		$('#show_after_url_cahnge').css('display', 'block');
		var element = document.getElementById("new_url_name");
         element.innerHTML = text_input;
			
		}
		else
		{
			
		}
	});
}      
	   






















	
function demonstration_checkbox(demo_p)
{	
	if(demo_p == 'sms_remainders'){	
	$('#d_sms_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">Support for this system has been discontinued. For more information or further inquries, please contact the <a href"#contact"> site admin</a></p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_sms_message_p').slideUp('fast');
		}, 5000);
		 $('#uncheck_sms_reminders_checkbox_d').html
		 ( '<input type="checkbox" id="sms_reminders_checkbox_d"><label for="sms_reminders_checkbox_d">Enable sms reminders </label>') 		
	}
	
	if(demo_p == 'email_remainders'){	
	$('#d_email_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_email_message_p').slideUp('fast');
		}, 5000);
		 $('#uncheck_email_reminders_checkbox_d').html
		 ( '<input type="checkbox" id="email_reminders_checkbox_d">	<label for="email_reminders_checkbox_d">Enable Email reminders </label></p>') 		
	}
	
	if(demo_p == 'update_sms_message'){	
	$('#d_update_sms_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_update_sms_message_p').slideUp('fast');
		}, 5000);
		 		
	}	
	
	if(demo_p == 'update_email_message'){	
	$('#d_update_email_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_update_email_message_p').slideUp('fast');
		}, 5000);
		 		
	}	
	

	if(demo_p == 'sms_feedback'){	
	$('#d_sms_feedback_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_sms_feedback_message_p').slideUp('fast');
		}, 5000);
		 $('#d_uncheck_sms_feedback').html
		 ( '<input type="checkbox" id="d_sms_feedback_checkbox"><label for="d_sms_feedback_checkbox">Enable SMS feedback </label>') 		
	}	
	
   if(demo_p == 'real_time'){	
	$('#d_real_time_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_real_time_message_p').slideUp('fast');
		}, 5000);
		 $('#d_uncheck_real_time').html
		 ( '<input type="checkbox" id="d_sms_feedback_checkbox"><label for="d_sms_feedback_checkbox">Enable SMS feedback </label>') 		
	}	
	
	
	if(demo_p == 'registration_enabling'){	
	$('#d_registration_enabling_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_registration_enabling_message_p').slideUp('fast');
		}, 5000);
	}
	
	
	
	if(demo_p == 'registration_access'){	
	$('#d_who_can_register_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_who_can_register_message_p').slideUp('fast');
		}, 5000);
	}
	

	
	if(demo_p == 'one_time_session'){	
	$('#d_one_timed_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_one_timed_message_p').slideUp('fast');
		}, 5000);
		 $('#d_uncheck_me_timed_session').html
		 ( '<input type="checkbox" id="d_timed_session_checkbox" >	<label for="d_timed_session_checkbox" >One time booking session</label> ') 		
	}
	
	
	if(demo_p == 'geographical'){	
	$('#d_geographical_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_geographical_message_p').slideUp('fast');
		}, 5000);
		 $('#d_uncheck_me_geographical').html
		 ( '			<input type="checkbox" id="d_geographical_checkbox" >	<label for="d_geographical_checkbox"  >Restrict users based on geographical location</label>') 		
	}
	
	
	
	if(demo_p == 'reservation_days'){	
	$('#d_reservation_days_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_reservation_days_message_p').slideUp('fast');
		}, 5000);
		 $('#d_uncheck_reservation_days').html
		 ( '<input type="checkbox" id="d_reservation_days_monday" checked="checked"> \
			<label class ="reservation_days">Monday </label>\
			<input type="checkbox" id="d_reservation_days_tuesday" checked="checked"> \
			<label class ="reservation_days">Tuesday </label>\
			<input type="checkbox" id="d_reservation_days_wednesday" checked="checked"> \
			<label class ="reservation_days">Wednesday </label>\
			<input type="checkbox" id="d_reservation_days_thursday" checked="checked"> \
			<label class ="reservation_days">Thursday </label>\
			<input type="checkbox" id="d_reservation_days_friday" checked="checked"> \
			<label class ="reservation_days">Friday </label>\
			<input type="checkbox" id="d_reservation_days_saturday"> \
			<label class ="reservation_days">Saturday</label>\
			<input type="checkbox" id="d_reservation_days_sunday" > \
			<label class ="reservation_days">Sunday</label>') 		
	}
	
	
	
	
	
	
	if(demo_p == 'reservation_time'){	
	$('#d_reservation_times_message_p').html('<img src="img/loading.gif" alt="Loading" /> <p class="message_p">The features on this page are just a demonstartion of the configuration features that MBB technologys reservation and booking system has.</br> To get started, please register you business/institution in to access all these features and other custom service.</br> Registration is quick, simple and FREE. If you have any questions or queries, please <a href="contact">contact us</a>.</p>').slideDown('fast');
		setTimeout(function()
		{			
			
			$('#d_reservation_times_message_p').slideUp('fast');
		}, 5000);
		 $('#d_uncheck_reservation_times').html
		 ( '<input type="checkbox" id="time_08-09"  > \
			<label class="reservation_times">08-09</label>\
			<input type="checkbox" id="time_09-10" checked="checked" >\
			<label class="reservation_times">09-10</label>\
			<input type="checkbox" id="time_10-11" checked="checked" >\
			<label class="reservation_times">10-11</label>\
			<input type="checkbox" id="time_11-12" checked="checked" >\
			<label class="reservation_times">11-12</label>\
			<input type="checkbox" id="time_12-13" checked="checked" >\
			<label class="reservation_times">12-13</label>\
			<input type="checkbox" id="time_13-14" checked="checked" >\
			<label class="reservation_times">13-14</label>\
			<input type="checkbox" id="time_14-15" checked="checked" >\
			<label class="reservation_times">14-15</label>\
			<input type="checkbox" id="time_15-16" checked="checked" > \
			<label class="reservation_times">15-16</label>\
			<input type="checkbox" id="time_16-17" checked="checked" > \
			<label class="reservation_times">16-17</label>\
			<input type="checkbox" id="time_17-18" > \
			<label class="reservation_times">17-18</label>\
			<input type="checkbox" id="time_18-19"  > \
			<label class="reservation_times">18-19</label>\
			<input type="checkbox" id="time_19-20"  > \
			<label class="reservation_times">19-20</label>') 		
	}
	
	
	


	
}	
	
	
	
	
	
	



// Document ready

$(document).ready( function()
{
	// Detect touch support
	if('ontouchstart' in document.documentElement)
	{
		onclick_event = 'touchstart';
		offclick_event = 'touchend';
	}
	else
	{
		onclick_event = 'mousedown';
		offclick_event = 'mouseup';
	}

	// Visual feedback on click
	$(document).on(onclick_event, 'input:submit, input:button, .reservation_time_div', function() { $(this).css('opacity', '0.5'); });
	$(document).on(offclick_event+ ' mouseout', 'input:submit, input:button, .reservation_time_div', function() { $(this).css('opacity', '1.0'); });

	// Buttons
	$(document).on('click', '#reservation_today_button', function() { showweek(global_week_number, 'today'); });
	$(document).on('click', '#reset_user_password_button', function() { reset_user_password(); });
	$(document).on('click', '#change_user_permissions_button', function() { change_user_permissions(); });
	$(document).on('click', '#delete_user_reservations_button', function() { delete_user_data('reservations'); });
	$(document).on('click', '#delete_user_button', function() { delete_user_data('user'); });
	$(document).on('click', '#new_user_registration_button', function() { new_user_registration_settings('user'); });
	
	$(document).on('click', '#delete_all_reservations_button', function() { delete_all('reservations'); });
	$(document).on('click', '#delete_all_users_button', function() { delete_all('users'); });
	$(document).on('click', '#delete_everything_button', function() { delete_all('everything'); });
	$(document).on('click', '#add_one_reservation_button', function() { add_one_reservation(); });
	$(document).on('click', '#registration_enabling_button', function() { registration_enabling(); });
	$(document).on('click', '#who_can_register_button', function() { who_can_register(); });
	$(document).on('click', '#update_welcome_email_message', function() { premium_service_checkbox('welcome_message'); });
	$(document).on('click', '#new_url_button', function() { change_url(); });
	
	
	

	
	
	///////////////////////////after registration////////////////////////////////////////////////
	
	$(document).on('click', '#show_reserv_table', function() { show_reservation_table('table'); });
	$(document).on('click', '#user_registration', function() { show_user_registration(); }); 
	$(document).on('click', '#url_settings', function() { url_settings(); }); 
	$(document).on('click', '#show_all', function() { show_all_options(); }); 
	$(document).on('click', '#user_admin', function() { user_admin_button(); });
	$(document).on('click', '#database_admin', function() { database_admin_button(); });
	$(document).on('click', '#system_config', function() { system_config_button(); });
	$(document).on('click', '#usage', function() { usage_button(); });
	$(document).on('click', '#settings', function() { settings_admin_button(); });
	$(document).on('click', '#admin_detail', function() { admin_details_button(); });
	$(document).on('click', '#reserv_table_settings', function() { show_reservation_table('settings'); });
	$(document).on('click', '#add_remove', function() { add_remove_days(); });
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////
	
function support(demo_p)
{	
	
	$('<p id = "demoga" class="message_p">Support for this system has been discontinued. For more information or further inquries, please contact the <a href"#contact"> site admin</a></p>').insertAfter( demo_p);
	setTimeout(function()
		{		
			$("#demoga").slideUp('3000');
		}, 2000);
		
}	


	// Forms
	$(document).on('submit', '#login_form', function() { support('#login_message_p'); return false; }); 
	$(document).on('submit', '#company_login_form', function() { support('#login_message_p'); return false; }); 
	//$(document).on('submit', '#register_form', function() { register(); return false });
	$(document).on('submit', '#new_user_form', function() {/* create_user();*/support('#login_message_p'); return false; });
	$(document).on('submit', '#registration_form', function() { registration(); return false });
	$(document).on('submit', '#system_configuration_form', function() { save_system_configuration(); return false; });
	$(document).on('submit', '#user_details_form', function() { change_user_details(); return false; });
	$(document).on('submit', '#update_sms_message', function() { update_sms_message_details(); return false; });
	$(document).on('submit', '#demo_update_sms_message', function() { demo_update_sms_message_details(); return false; });
	$(document).on('submit', '#demo_update_email_message', function() { demo_update_email_message_details(); return false; });
	$(document).on('submit', '#update_email_message', function() { update_email_message_details(); return false; });
	$(document).on('submit', '#update_welcome_email_message', function() { update_welcome_email_message(); return false; });
	

	
	//demonstration checkboxes & buttons
	$(document).on('click', '#sms_reminders_checkbox_d', function() { support('#d_sms_reminders_checkbox'); });	
	$(document).on('click', '#email_reminders_checkbox_d', function() { demonstration_checkbox('email_remainders'); });
	$(document).on('click', '#d_update_sms_message_button', function() { demonstration_checkbox('update_sms_message'); });
	$(document).on('click', '#d_update_email_message_button', function() { demonstration_checkbox('update_email_message'); });
	$(document).on('click', '#d_sms_feedback_checkbox', function() { demonstration_checkbox('sms_feedback'); });
	$(document).on('click', '#d_real_time_checkbox', function() { demonstration_checkbox('real_time'); });
	$(document).on('click', '#d_registration_enabling_button', function() { demonstration_checkbox('registration_enabling'); });
	$(document).on('click', '#d_who_can_register_button', function() { demonstration_checkbox('registration_access'); });
	$(document).on('click', '#d_geographical_checkbox', function() { demonstration_checkbox('geographical'); });
	$(document).on('click', '#d_timed_session_checkbox', function() { demonstration_checkbox('one_time_session'); });
	$(document).on('click', '#d_reservation_days_button, #d_reservation_days_monday, #d_reservation_days_tuesday, #d_reservation_days_wednesday, #d_reservation_days_thursday, #d_reservation_days_friday, #d_reservation_days_saturday, #d_reservation_days_sunday', function() { demonstration_checkbox('reservation_days'); });
	
	$(document).on('click', '#d_reservation_time_button, #time_08-09, #time_09-10, #time_10-11, #time_11-12, #time_12-13, #time_13-14, #time_14-15, #time_15-16,  #time_16-17, #time_17-18, #time_18-19, #time_19-20', function() { demonstration_checkbox('reservation_time'); });
	
	
	
	
	
	
	
		
	
	
		

	// Checkboxes
	$(document).on('click', '#reservation_reminders_checkbox', function() { toggle_reservation_reminder(); });
	$(document).on('click', '#sms_reminders_checkbox', function() { toggle_sms_reminder(); });
	$(document).on('click', '#email_verification_checkbox', function() { toggle_email_verification(); });
	$(document).on('click', '#email_reminders_checkbox', function() { toggle_email_reminder(); });
	$(document).on('click', '#sms_demonstration_checkbox', function() { toggle_demonstration_checkbox('sms_demonstration_checkbox'); });
	$(document).on('click', '#email_demonstration_checkbox', function() { toggle_demonstration_checkbox('email_demonstration_checkbox'); });
	$(document).on('click', '#demo_sms_feedback_checkbox', function() { toggle_demo_sms_feedback_checkbox(); });
	$(document).on('click', '#reservation_days', function() { toggle_demonstration_checkbox('reservation_days'); });
	$(document).on('click', '#demo_span_reservation_times', function() { toggle_demonstration_checkbox('reservation_times'); });
	$(document).on('click', '#demo_real_time_response_checkbox', function() {toggle_demo_real_time_response_checkbox();});
	
	//premium checkboxes
	$(document).on('click', '#real_time_premium_service', function() { premium_service_checkbox('real_time_response'); });
	$(document).on('click', '#sms_feedback_premium_service', function() { premium_service_checkbox('sms_feedback'); });
	$(document).on('click', '#premium_reservation_days', function() { premium_service_checkbox('reservation_days'); });	
	$(document).on('click', '#premium_span_reservation_times', function() { premium_service_checkbox('reservation_times'); });
	$(document).on('click', '#premium_email_welcome_checkbox', function() { premium_service_checkbox('email_welcome_message'); });
	$(document).on('click', '#premium_sms_welcome_checkbox', function() { premium_service_checkbox('sms_welcome_message'); });
	$(document).on('click', '#premium_timed_session_checkbox', function() { premium_service_checkbox('one_timed'); });
	$(document).on('click', '#premium_geographical_checkbox', function() { premium_service_checkbox('geographical'); });
	
	$(document).on('click', '#reservation_time_button, #p_time_08-09, #p_time_09-10, #p_time_10-11, #p_time_11-12, #p_time_12-13, #p_time_13-14, #p_time_14-15, #p_time_15-16,  #p_time_16-17, #p_time_17-18, #p_time_18-19,#p_time_19-20', function() { premium_service_checkbox('reservation_time'); });
	
	$(document).on('click', '#reservation_days_button, #reservation_days_monday, #reservation_days_tuesday, #reservation_days_wednesday, #reservation_days_thursday, #reservation_days_friday, #reservation_days_saturday, #reservation_days_sunday', function() { premium_service_checkbox('reservation_days'); });
	
	
	
	
	
	
		
	
	
	



	// Links
	$(document).on('click mouseover', '#user_secret_code_a', function() { div_fadein('#user_secret_code_div'); return false; });
	$(document).on('click', '#previous_week_a', function() { showweek('previous'); return false; });
	$(document).on('click', '#next_week_a', function() { showweek('next'); return false; });
	$(document).on('click', '#hide_system_configuration_p', function() {hide_show_system_configuration('hide'); return false; });
	$(document).on('click', '#show_system_configuration_p', function() {hide_show_system_configuration('show'); return false; });
	
	
	
	
	// Divisions
	$(document).on('mouseout', '.reservation_time_cell_div', function() { read_reservation_details(); });

	$(document).on('click', '.reservation_time_cell_div', function()
	{
		var array = this.id.split(':');
		toggle_reservation_time(this, array[1], array[2], array[3], array[0]);
	});

	$(document).on('mousemove', '.reservation_time_cell_div', function()
	{
		var array = this.id.split(':');
		read_reservation_details(this, array[1], array[2], array[3]);
	});

	// Mouse pointer
	$(document).on('mouseover', 'input:button, input:submit, .reservation_time_div', function() { this.style.cursor = 'pointer'; });
});










// Hash change

function hash()
{
	var hash = window.location.hash.slice(1);

	if(hash == '')
	{
		if(typeof session_logged_in != 'undefined')
		{
			showreservations();				
         		  		
		}		
		
				  
		else
		{
			showlogin();
		}
	}
	
	
	
	else
	{
		if(hash == 'about')
		{
			showabout();
		}
		else if(hash == 'new_user')
		{
			shownew_user();
		}
		else if(hash == 'forgot_password')
		{
			showforgot_password();
		}
		else if(hash == 'new_registration')
		{
			show_registration_form();
		}
		else if(hash == 'system_configuration')
		{
			show_system_config();
		}
		
		else if(hash == 'help')
		{
			showhelp();
		}
		else if(hash == 'cp')
		{
			showcp();
		}
		else if(hash == 'logout')
		{
			logout();
		}
		else if(hash == 'blogs')
		{
			show_blogs_home();
		}
		
		else if(hash == 'home_automation_using_bluetooth')
		{
			show_blogs_home_automation();
		}
		
		else if(hash == 'navigating_the_web_using_speech')
		{
			show_blogs_navigating_the_web();
		}
	     
		 
		else if(hash == 'automated_web_tasks')
		{
			show_blogs_automated_web_tasks();
		} 
		
		
		else if(hash == 'smart_water_heating')
		{
			show_blogs_smart_water_heating();
		}
		
				
		else if(hash == 'wireless_sensor_networks')
		{
			show_blogs_wireless_sensor_networks();
		}
		
		else if(hash == 'contact_us')
		{
			show_contact_form();
		}
		
		
		else if(hash.length > 1  ) 
		{
		/*var url=hash;*/
			check_if_url_exists(hash);
		}	
        
        else 
       {
	   			window.location.replace('.');
		}
	}
}

// Window load

$(window).load(function()
{
	// Make sure cookies are enabled
	$.cookie(global_cookie_prefix+'_cookies_test', '1');
	var test_cookies_cookie = $.cookie(global_cookie_prefix+'_cookies_test');

	if(test_cookies_cookie == null)
	{
		window.location.replace('error.php?error_code=3');
	}
	else
	{
		$.cookie(global_cookie_prefix+'_cookies_test', null);
        
		
		
		hash();

		$(window).bind('hashchange', function ()
		{	       
        
		hash();				 
			
		});
		
	}
});

// Settings

$(document).ready( function()
{
	$.ajaxSetup({ cache: false });
	
	
});
