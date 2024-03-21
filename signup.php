<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
    <title>Sign Up</title>
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



if($_POST){

    

    $_SESSION["personal"]=array(
        'fname'=>$_POST['fname'],
        'lname'=>$_POST['lname'],
        'address'=>$_POST['address'],
        'nic'=>$_POST['nic'],
        'dob'=>$_POST['dob']
    );


    print_r($_SESSION["personal"]);
    header("location: create-account.php");




}

?>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Inter, sans-serif;
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
            background-color: inherit;
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
        .loginbutton{
            display:grid;
            grid-template-columns:1fr 1fr;
            grid-gap:5px;
        }
        .sub-text ,.header-text{
            text-align:center;
        }
        .zxc:hover{
            background-color: #0979e9;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a class="active" href="index.html"><font class="edoc-logo-sub">DBMS MINI PROJECT</font></a></li>
            <div class="navs">
                <li class="abcd">
                    <div class="dropdown">
                        <a href="login.php" class="dropbtn"><font class="edoc-logo-sub">Login</font></a>
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
        <div class="form-body">
            <p class="header-text">Let's Get Started</p>
            <p class="sub-text">Add Your Personal Details to Continue</p>
            <form action="" method="POST">
                <label for="fname" class="form-label">First Name: </label>
                <input type="text" name="fname" class="input-text" placeholder="First Name" required>
                <label for="lname" class="form-label">Last Name: </label>
                <input type="text" name="lname" class="input-text" placeholder="Last Name" required>
                <label for="address" class="form-label">Address: </label>
                <input type="text" name="address" class="input-text" placeholder="Address" required>
                <label for="nic" class="form-label">Aadhar : </label>
                <input type="text" name="nic" class="input-text" placeholder="Aadhar Number" required>
                <label for="dob" class="form-label">Date of Birth: </label>
                <input type="date" name="dob" class="input-text" required>
                <div class="error-msg">
                    <!-- Error message here -->
                </div>
                <div class="loginbutton">
                <input type="reset" value="Reset" class="login-btn">
                <input type="submit" value="Next" class="login-btn">
                
                </div>
            </form>
            <p class="sub-text">Already have an account? <a href="login.php" class="hover-link1 non-style-link">Login</a></p>
        </div>
    </div>
</body>
</html>
