<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','rashi');
define('DB_PASSWORD','');
define('DB_NAME','leave_management');
$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
if(!$conn)
{
    die("ERROR: Could not connect.".mysqli_connect_error());
}
?>