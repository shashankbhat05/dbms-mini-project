<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
    <?php

//learn from w3schools.com
//Unset all the server side variables

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$_SESSION["date"]=$date;


//import database
include("connection.php");





if($_POST){

    $email=$_POST['useremail'];
    $password=$_POST['userpassword'];
    
    $error='<label for="promter" class="form-label"></label>';

    $result= $database->query("select * from webuser where email='$email'");
    if($result->num_rows==1){
        $utype=$result->fetch_assoc()['usertype'];
        if ($utype=='p'){
            //TODO
            $checker = $database->query("select * from patient where pemail='$email' and ppassword='$password'");
            if ($checker->num_rows==1){


                //   Patient dashbord
                $_SESSION['user']=$email;
                $_SESSION['usertype']='p';
                
                header('location: patient/index.php');

            }else{
                $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
            }

        }elseif($utype=='a'){
            //TODO
            $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
            if ($checker->num_rows==1){


                //   Admin dashbord
                $_SESSION['user']=$email;
                $_SESSION['usertype']='a';
                
                header('location: admin/index.php');

            }else{
                $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
            }


        }elseif($utype=='d'){
            //TODO
            $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
            if ($checker->num_rows==1){


                //   doctor dashbord
                $_SESSION['user']=$email;
                $_SESSION['usertype']='d';
                header('location: doctor/index.php');

            }else{
                $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
            }

        }
        
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
    }






    
}else{
    $error='<label for="promter" class="form-label">&nbsp;</label>';
}

?>
<!-- Nvabar css -->
    <style>
       
        body {
            margin: 0;
            padding: 0;
            font-family: Inter, sans-serif;
            /* font-weight:100; */
            font-size:12px;
            background-color: #f2f2f2;
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #272727;
            text-align: right;
        }
        .navbar li {
            float: left;
        }
        .navbar li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .dropdown {
            float: left;
            overflow: hidden;
        }
        .dropdown .dropbtn {
            font-size: 12px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            /* background-color: inherit; */
            /* font-family: inherit; */
            margin: 0;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #272727;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropdown-content:hover {
            background-color: #272727;
        }
        .navs {
            display: flex;
            justify-content: flex-end;
        }
        .abcd:hover {
            background-color: #0979e9;
        }
        .container {
            margin: auto;
            padding: 20px;
            width: 80%;
            max-width: 600px; /* Adjust based on your design */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px; /* Adjust vertical spacing */
        }
        .form-body {
            padding: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .input-text {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #0979e9;
            color: #fff;
            cursor: pointer;
        }
        .login-btn:hover {
            background-color: #055b9b;
        }
        .sub-text {
            margin-top: 10px;
            color: #666;
        }
        .error-msg {
            color: rgb(255, 62, 62);
            text-align: center;
        }
        .header-text , .sub-text{
            text-align: center;
        }
        .zxc:hover{
            background-color: #0979e9;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <ul>
            <li><a class="active" href="index.html"><font class="edoc-logo-sub">DBMS MINI PROJECT</font></a></li>
            <div class="navs">
                <li class="abcd">
                    <div class="dropdown">
                        <a href="" class="dropbtn"><font class="edoc-logo-sub">Login</font></a>
                        <!-- <div class="dropdown-content">
                            <a href="login.php" class="zxc"><font class="edoc-logo-sub">Admin</font></a>
                            <a href="login.php" class="zxc"><font class="edoc-logo-sub">Doctor</font></a>
                            <a href="login.php" class="zxc"><font class="edoc-logo-sub">Patient</font></a>
                        </div> -->
                    </div>
                </li>
                <li class="abcd"><a href="signup.php"><font class="edoc-logo-sub">SignUp</font></a></li>
                <li class="abcd"><a href="about.html"><font class="edoc-logo-sub">About Project</font></a></li>
            </div>
        </ul>
    </div>

    

    <div class="container">
        <div class="form-body" >
            <p class="header-text">Welcome Back!</p>
            <p class="sub-text">Login with your details to continue</p>
            <form action="" method="POST">
                <label for="useremail" class="form-label">Email: </label>
                <input type="email" name="useremail" class="input-text" placeholder="Email Address" required>
                <label for="userpassword" class="form-label">Password: </label>
                <input type="password" name="userpassword" class="input-text" placeholder="Password" required>
                <div class="error-msg">
                    <!-- Error message here -->
                </div>
                <input type="submit" value="Login" class="login-btn">
            </form>
            <p class="sub-text">Don't have an account? <a href="signup.php" class="hover-link1 non-style-link">Sign Up</a></p>
        </div>
    </div>
</body>
</html>
