<?php
include "connection.php";
    $id=$_GET['id'];
	$sql = "delete from studentinfo where id='$id'";
	if (mysqli_query($conn, $sql)) {
	$msg="You have deleted one blood sample.";
	header("location:../student.php?msg=".$msg );
    } else {
    $error="Error deleting record: " . mysqli_error($conn);
    header("location:../student.php?error=".$error );
    }
    mysqli_close($conn);
?>