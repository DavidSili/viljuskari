<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "viljuskari";
$link = mysql_connect($host, $user, $pass);
mysql_select_db($db_name);
mysql_query("SET NAMES utf8");
?>