<?php
require 'connection.php';
session_start();
if(!isset($_SESSION['adminid']))
{
	header('location:adminlogin.php');
}
else {
	if(isset($_POST['add'])){
		$adminid=$_SESSION['adminid'];
		$sname=$_POST['sname'];
		$stid=$_POST['stid'];
		$ssection=$_POST['ssection'];
		$sphone=$_POST['sphone'];
		$check_data = mysqli_query($conn, "SELECT stid, sphone FROM studentinfo where stid='$stid' AND sphone='$sphone' ");
		if(mysqli_num_rows($check_data) > 0){
			$error= 'You have already added this blood sample.';
			header( "location:../student.php?error=".$error );
}else{
		$sql = "INSERT INTO studentinfo (adminid, stid, sname, ssection, sphone) VALUES ('$adminid', '$stid', '$sname', '$ssection', '$sphone')";
		if ($conn->query($sql) === TRUE) {
			$msg = "You have added record successfully.";
			header( "location:../student.php?msg=".$msg );
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
            header( "location:../student.php?error=".$error );
		}
		$conn->close();
	}
}
}
?>