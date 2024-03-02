<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Patient</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $nic=$_POST['nic'];
        $date=$_POST['date'];
        $email=$_POST['email'];
        $tele=$_POST['Tele'];
        $address=$_POST['address'];

        
     
            if($result->num_rows==1){
                $error='1';
            }else{

                $sql1="insert into patient(pemail,pname,pnic,ptel,pdob,paddress,ppassword) values('$email','$name','$nic','$tele','$date','$address','123');";
                $sql2="insert into webuser values('$email','p')";

                $database->query($sql1);
                $database->query($sql2);

                //echo $sql1;
                //echo $sql2;
                $error= '4';
                
            }
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: patient.php?action=add&error=".$error);
    ?>
    
   

</body>
</html>