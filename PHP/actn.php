<?php
	session_start();
    include('config.php');
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true)
    {
        header("location: ../index.php");
        exit;
    }
    $utype=$_SESSION["usertype"];
    if($utype != 3)
    {
        header("location: logout.php");
    }
    $l_id=$_GET['l_id'];
    $c_id = mysqli_query($conn,"select c_id from student where user_id=(select u_id from Student_ldb where l_id=$l_id)");
    $c_id = mysqli_fetch_assoc($c_id);
    $c_id = $c_id['c_id'];
    if($c_id = $_SESSION['c_id'])
    {
        if($_GET['actn']==1)
        {
    	    $sql = "UPDATE Student_ldb SET status = 'APPROVED' WHERE l_id=?";
    	    if($stmt = mysqli_prepare($conn,$sql))
            {
                mysqli_stmt_bind_param($stmt, "s",$id);
                $id=$_GET['id'];
                mysqli_stmt_execute($stmt);
                $result="Deleted successfully";
            }
        }
        elseif($_GET['actn']==0)
        {
            $sql = "UPDATE Student_ldb SET status = 'REJECTED' WHERE l_id=?";
    	    if($stmt = mysqli_prepare($conn,$sql))
            {
                mysqli_stmt_bind_param($stmt, "s",$id);
                $id=$_GET['id'];
                mysqli_stmt_execute($stmt);
                $result="Deleted successfully";
            }
        }
    }
    else
    {
    	header("location: logout.php");
    }
    header("location: ../users/faculty.php");
?>
