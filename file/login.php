<?php
session_start();
    require 'connection.php';
    if(isset($_POST['adlogin'])){
    $ademail=$_POST['ademail'];
    $adpassword=$_POST['adpassword'];
    $sql="select * from adminportal where ademail='$ademail' and adpassword='$adpassword'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($result);
    if($rows_fetched==0){
        $error= "Wrong email or password. Please try again.";
        header( "location:../adminlogin.php?error=".$error);
    }else{
        $row=mysqli_fetch_array($result);
        $_SESSION['ademail']=$row['ademail'];
        $_SESSION['adname']=$row['adname'];
        $_SESSION['adminid']=$row['id'];
        $msg= $_SESSION['adname'].' have logged in.';
        header( "location:../index.php?msg=".$msg);
    } 
  }
?>