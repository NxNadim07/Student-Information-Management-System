<?php
include "connection.php";
    $stid=$_GET['stid'];
	$paymentStatus = "Paid";
	$sql = "update studentinfo SET paymentStatus = '$paymentStatus' WHERE stid = '$stid'";
    if (mysqli_query($conn, $sql)) {
	$msg="You have accepted the request.";
	header("location:../student.php?msg=".$msg );
    } else {
    $error= "Error changing status: " . mysqli_error($conn);
    header("location:../student.php?error=".$error );
    }
    mysqli_close($conn);
?>