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
    if($utype != 4)
    {
        header("location: ../PHP/logout.php");
    }

    $result="";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $sql = "INSERT INTO Student_ldb (u_id, d_no, l_date, reason) VALUES (?,?,?,?)";
        if($stmt = mysqli_prepare($conn,$sql))
        {
            mysqli_stmt_bind_param($stmt, "ssss", $uid, $dnumber, $date, $reason);
            $dnumber = $_POST["dnumber"];
            $date = $_POST["date"];
            $reason = $_POST["reason"];
            mysqli_stmt_execute($stmt);
            $result="Submitted successfully";
        }
        else
        {
            $result="ERROR: Try again later..";
        }
    }
    $records=mysqli_query($conn,"SELECT l_id, u_id, d_no, l_date, reason, status FROM Student_ldb WHERE u_id = $uid ORDER BY l_date DESC");
    
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Leave Management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../CSS/student.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script type="text/javascript" src="../js/student.js"></script>
    </head>
    <body>
        <div class="topnav" id="myTopnav">
            <a href="#home" class="active">JECC</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <h1>Welcome <?php echo $uid ?></h1>
        <div class="row">
            <div class="col-50-left open">
                <button id="showbutton" type="button" onclick="showform()" class="request-button"> Open Leave Form </button>
            </div>
            <div class="col-50-right">
                <button type="button" onclick="logout()" class="logout-button"> Log Out </button>
            </div>
        </div>
        <div id="form" class="form-container">
            <form method="post" action="<?php echo htmlspecialchars($SERVER["PHP_SELF"]);?>" >
                <div class="row">
                    <div class="col-25">
                        <label>
                            Duration of leave
                        </label>
                    </div>
                    <div class="col-75">
                        <input type="Number" name="dnumber" min="1" max="5" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="date">
                            From Date
                        </label>
                    </div>
                    <div class="col-75">
                        <input type="Date" name="date" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="reason">
                            Reason for Leave
                        </label>
                    </div>
                    <div class="col-75">
                        <textarea name="reason" maxlength="750" required ></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-50-right">
                        <input type="submit" value="Submit">
                    </div>
                    <div class="col-50-left">
                        <button type="button" onclick="hideform()" class="close-button"> Close Form </button>
                    </div> 
                </div>
            </form>
        </div>
        <div class="<?php echo(!empty($result)) ? 'result': 'hide' ?>">
            <span> <?php echo $result; ?> </span>  
        </div>
        <hr>
        <div class="table-overflow">
            <table>
                <tr>
                    <th>Date</th>
                    <th>No of Days</th>
                    <th>Reason</th>
                    <th >Status</th>
                    <th >Delete</th>
                </tr>
                <?php
                    if(mysqli_num_rows($records)==0)
                    {
                        echo "<tr>";
                            echo "<td colspan='4' class='text-center'> No History found </td>";
                        echo "</tr>";
                    }
                    while ($rec = mysqli_fetch_assoc($records))
                    {
                    
                        echo "<tr>";
                            echo "<td>".$rec['l_date']."</td>";
                            echo "<td>".$rec['d_no']."</td>";
                            echo "<td>".$rec['reason']."</td>";
                            echo "<td class='text-center'>".$rec['status']."</td>";
                            echo "<td><a href='../PHP/sdel.php?id=".$rec['l_id']."&uid=".$rec['u_id']."'>delete</a></td>";
                        echo "</tr>";
                        
                    }
                ?>
            </table>
        </div>
        <div class="footer">
            Copyright @2019
        </div>
    </body>
</html>