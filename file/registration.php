<?php
require 'connection.php';
if(isset($_POST['aregisteration'])){
	$adname=$_POST['adname'];
	$ademail=$_POST['ademail'];
	$adpassword=$_POST['adpassword'];
	$adphone=$_POST['adphone'];
	$adcity=$_POST['adcity'];
	$check_email = mysqli_query($conn, "SELECT ademail FROM adminportal where ademail = '$ademail' ");
	if(mysqli_num_rows($check_email) > 0){
	echo "No New record created successfully";
    header( "location:../adminlogin.php?error=".$error );
}else{
	$sql = "INSERT INTO adminportal (adname, ademail, adpassword, adphone, adcity)
	VALUES ('$adname','$ademail', '$adpassword', '$adphone', '$adcity')";
	if ($conn->query($sql) === TRUE) {
		$msg = 'You have successfully registered. Please, login to continue.';
		header( "location:../adminlogin.php?msg=".$msg );
		echo "New record created successfully";
		
	} else {
		$error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:../index.php?error=".$error );
	}
	$conn->close();
}
}
?>