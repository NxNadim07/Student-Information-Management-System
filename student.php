<?php 
  require 'file/connection.php';
  session_start();
  if(!isset($_SESSION['adminid']))
  {
  header('location:adminlogin.php');
  }
  else {
      $counter = 0;
?>
<!DOCTYPE html>
<html>
<?php $title="Admin Panal | Add Student Info"; ?>
<?php require 'head.php'; ?>
<body>
  <?php require 'header.php'; ?>

    <form class="container" action="file/infoAdd.php" method="post">
        <div class="d-flex">
            <input class="form-control mt-5 ms-2" name="stid" type="text" placeholder="ID" required>
            <input class="form-control mt-5 ms-2" name="sname" type="text" placeholder="Name" required>
            <input class="form-control mt-5 ms-2" name="ssection" type="text" placeholder="Section" required>
            <input class="form-control mt-5 ms-2" name="sphone" type="text" placeholder="Phone Number" required>
        </div>
        <div class="d-flex justify-content-center mt-3">
          <button type="submit" name="add" value="Add" class="btn btn-primary mb-3">Add Student</button>
        </div>
    </form>
    
    <?php if(isset($_SESSION['adminid'])){
        $adminid=$_SESSION['adminid'];
        $sql = "select * from studentinfo where adminid='$adminid'";
        $result = mysqli_query($conn, $sql);
    }
    ?>
    <table class="table table-striped container table-dark table-hover text-center table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Section</th>
                <th scope="col">Phone Number</th>
                <th scope="col-3" colspan="3">Payment</th>
                <th scope="col">X</th>
            </tr>
        </thead>
        <?php while($row = mysqli_fetch_array($result)) { ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo ++$counter; ?></td>
                <td><?php echo $row['stid'] ?></td>
                <td><?php echo $row['sname'] ?></td>
                <td><?php echo $row['ssection'] ?></td>
                <td><?php echo $row['sphone'] ?></td>
                <td><?php echo $row['paymentStatus'];?></td>
                <td><?php if($row['paymentStatus'] == 'Paid') { ?> <a href="" class="btn btn-success disabled">Accepted</a> <?php }
                else{ ?>
                    <a href="file/accept.php?stid=<?php echo $row['stid'];?>" class="btn btn-success">Paid</a>
                <?php } ?>
                </td>
                <td><?php if($row['paymentStatus'] == 'Not Paid'){ ?> <a href="" class="btn btn-danger disabled">Rejected</a> <?php }
                else{ ?>
                    <a href="file/reject.php?stid=<?php echo $row['stid'];?>" class="btn btn-danger">Not Paid</a>
                <?php } ?>
                </td>
                <td><a href="file/sdelete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
<?php } ?>