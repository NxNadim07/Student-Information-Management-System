<?php
require 'connection.php';
session_start();
if(!isset($_SESSION['adminid']))
{
	header('location:adminlogin.php');
}
else {
	if(isset($_POST['addteacher'])){
		$adminid=$_SESSION['adminid'];
		$cname=$_POST['cname'];
		$cid=$_POST['cid'];
		$csection=$_POST['csection'];
		$teacherinitial=$_POST['teacherinitial'];
		$cfaculty=$_POST['cfaculty'];
}
		$sql = "INSERT INTO courseinfo (adminid, cid, cname, csection, teacherinitial, cfaculty) VALUES ('$adminid', '$cid', '$cname', '$csection', '$teacherinitial', '$cfaculty' )";
		if ($conn->query($sql) === TRUE) {
			$msg = "You have added record successfully.";
			header( "location:../courses.php?msg=".$msg );
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
            header( "location:../courses.php?error=".$error );
		}
		$conn->close();
}
?>