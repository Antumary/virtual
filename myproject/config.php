<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "etutor"; /* Database name */

$con = mysql_connect($host, $user, $password) or die("db np");
mysql_select_db("etutor");
// Check connection
if (!$con) {
  die("Connection failed: " . mysql_connect_error());
}
?>
