<?php



function connect_to_db(){
//$host = $server;
//$user_name = $username;
//$pass_word = $password;
$db = 'mbbte438_kitwe';

$host = 'localhost';
$db_user_name = 'mbbte438_zambia';
$pass_word = 'passw0rd';
//$db = 'k';



mysql_connect("$host", "$db_user_name", "$pass_word")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
   mysql_select_db("$db")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
   mysql_set_charset('utf8');
   return(1);
}


?>