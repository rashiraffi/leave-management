<?php
	session_start();
    include('config.php');
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true)
    {
        header("location: ../index.php");
        exit;
    }
    $uid=$_SESSION['userid'];
    $utype=$_SESSION["usertype"];
    if($utype != 4)
    {
        header("location: logout.php");
    }
    $u_id=$_GET['uid'];
    if($uid == $u_id)
    {
    	$sql = "DELETE from Student_ldb WHERE l_id=? and u_id=?";
    	if($stmt = mysqli_prepare($conn,$sql))
        {
            mysqli_stmt_bind_param($stmt, "ss",$id,$u_id);
            $id=$_GET['id'];
    		$u_id=$_GET['uid'];
            mysqli_stmt_execute($stmt);
            $result="Deleted successfully";
        }
    }
    else
    {
    	header("location: ../users/student.php");
    }
    header("location: ../users/student.php");
?>
