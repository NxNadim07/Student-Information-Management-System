<?php
include "connection.php";
    $id=$_GET['id'];
	$sql = "delete from courseinfo where id='$id'";
	if (mysqli_query($conn, $sql)) {
	$msg="You have deleted one blood sample.";
	header("location:../courses.php?msg=".$msg );
    } else {
    $error="Error deleting record: " . mysqli_error($conn);
    header("location:../courses.php?error=".$error );
    }
    mysqli_close($conn);
?>