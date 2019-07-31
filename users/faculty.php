<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true)
{
    header("location: ../index.php");
    exit;
}
$utype=$_SESSION["usertype"];
if($utype != 4)
{
    header("location: ../PHP/logout.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Leave Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <h1>Faculty </h1>
    <a href="/leave-management/PHP/logout.php">Sign Out..!</a>
</body>
</html>