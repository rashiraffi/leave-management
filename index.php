<?php
session_start();
include('PHP/config.php');
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["usertype"] == 4)
{
    header("location: users/student.php");
    exit;
}
$userid=$password="";
$userid_err=$password_err="";
$error="";
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $userid = $_POST["Userid"];
    /* $password = sha1(trim($_POST["inputpassword"])); */
    $password = $_POST["inputPassword"];
    $sql = "select password, usertype from users where userid = '$userid'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $psd = $row['password'];
        $utype = $row['usertype'];
        if($password==$psd)
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $userid;
            $_SESSION['usertype'] = $utype;
            if($utype == 1)
            {
                header("location: users/principal.php");
            }
            elseif($utype == 2)
            {
                header("location: users/hod.php");
            }
            elseif($utype == 3)
            {
                header("location: users/faculty.php");
            }
            elseif($utype == 4)
            {
                header("location: users/student.php");
            }
            else
            {
                $error = "Oops! Something went wrong. Please contact administrator.";
            }
        }
        else
        {
            $password_err = "Incorrect password.";
        }
    }
    else
    {
        $userid_err = "Invalid Username.";
    }
}






?>
<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" type="text/css" href="CSS/login.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            
        </header>

        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sign In</h5>
                            <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-label-group">
                                    <input type="text" id="Userid" name="Userid" class="form-control" placeholder="User ID" required autofocus>
                                    <label for="userid">User ID</label>
                                    <span> <?php echo $userid_err; ?> </span>
                                </div>
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                    <span> <?php echo $password_err; ?> </span>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                                <span> <?php echo $utype; ?> </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>