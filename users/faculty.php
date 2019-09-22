<?php
    session_start();
    include('../PHP/config.php');
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true)
    {
        header("location: ../index.php");
        exit;
    }
    
    $utype=$_SESSION["usertype"];
    $uid=$_SESSION['userid'];
    if($utype != 3)
    {
        header("location: ../PHP/logout.php");
    }
    $name = mysqli_query($conn,"SELECT stf_name,c_id FROM staff WHERE user_id=$uid");
    $name = mysqli_fetch_assoc($name);
    $c_id = $name['c_id'];
    $_SESSION['c_id'] = $c_id;
    $name = $name['stf_name'];
    $records=mysqli_query($conn,"select ts,l_id,u_id,s_name,c_id,d_no,reason,status,l_date from Student_ldb,student where Student_ldb.u_id=student.user_id and student.c_id=$c_id order by ts desc;
    ");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Leave Management | JECC</title>
        <link rel="stylesheet" type="text/css" href="../CSS/faculty.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="../js/faculty.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="topnav" id="myTopnav">
            <a href="#home" class="active">JECC</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <h1>Welcome <?php echo $name ?></h1>
        <div class="table-overflow">
            <table>
                <tr>
                    <th>Name</th>
                    <th>No of Days</th>
                    <th>Date</th>
                    <th class='m-hide'>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                if(mysqli_num_rows($records)==0)
                {
                    echo "<tr>";
                        echo "<td colspan='6' class='text-center'> Nothing to show </td>";
                    echo "</tr>";
                }
                else
                {
                    while ($rec = mysqli_fetch_assoc($records))
                    {
                        echo "<tr>";
                            echo "<td>".$rec['s_name']."</td>";
                            echo "<td>".$rec['d_no']."</td>";
                            echo "<td>".$rec['l_date']."</td>";
                            echo "<td class='text-overflow m-hide' title='".$rec['reason']."'>".$rec['reason']."</td>";
                            echo "<td class='text-center'>".$rec['status']."</td>";
                            echo "<td><div class='accept-button'><a href='../PHP/actn.php?actn=1&id=".$rec['l_id']."'>Accept</a></div><div class='reject-button'><a href='../PHP/actn.php?actn=0&id=".$rec['l_id']."'>Reject</a></div></td>";
                        echo "</tr>";
                    }
                }

                ?>
            </table>

        </div>
        <button type="button" onclick="logout()" class=""> Log out </button>
</body>
</html>