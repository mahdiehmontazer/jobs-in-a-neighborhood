<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_eqom = "localhost";
$database_eqom = "eqomjob";
$username_eqom = "root";
$password_eqom = "";
$eqom = mysql_connect($hostname_eqom, $username_eqom, $password_eqom) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_eqom, $eqom);
mysql_query("set names utf8");
?>