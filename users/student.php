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
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Leave Management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../CSS/student.css">
        <script type="text/javascript" src="../js/student.js"></script>
    </head>
    <body>
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
                    <div class="col-50-left">
                        <button type="button" onclick="hideform()" class="close-button"> Close Form </button>
                    </div>
                    <div class="col-50-right">
                        <input type="submit" value="Submit">
                    </div> 
                </div>
            </form>
        </div>
        <div class="<?php echo $sclass;?>">
            <span> <?php echo $result; ?></span>  
        </div>
    </body>
</html>