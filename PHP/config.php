<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','0000');
define('DB_NAME','leave_management');
$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
if(!$conn)
{
    die("ERROR: Could not connect.".mysqli_connect_error());
}
?>
