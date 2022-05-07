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

    <form class="container" action="file/teacherInfoAdd.php" method="post">
        <div class="d-flex">
            <input class="form-control mt-5 ms-2" name="cid" type="text" placeholder="Course" required>
            <input class="form-control mt-5 ms-2" name="cname" type="text" placeholder="Course Name" required>
            <input class="form-control mt-5 ms-2" name="csection" type="text" placeholder="Section" required>
            <input class="form-control mt-5 ms-2" name="teacherinitial" type="text" placeholder="Teacher Initial" required>
            <input class="form-control mt-5 ms-2" name="cfaculty" type="text" placeholder="Faculty" required>
        </div>
        <div class="d-flex justify-content-center mt-3">
          <button type="submit" name="addteacher" value="Add Teacher" class="btn btn-primary mb-3">Assign Teacher</button>
        </div>
    </form>
    
    <?php if(isset($_SESSION['adminid'])){
        $adminid=$_SESSION['adminid'];
        $sql = "select * from courseinfo where adminid='$adminid'";
        $result = mysqli_query($conn, $sql);
    }
    ?>
    <table class="table table-striped container table-dark table-hover text-center table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course Code</th>
                <th scope="col">Course Name</th>
                <th scope="col">Section</th>
                <th scope="col">Teacher Initial</th>
                <th scope="col">Faculty</th>
                <th scope="col">X</th>
            </tr>
        </thead>
        <?php while($row = mysqli_fetch_array($result)) { ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo ++$counter; ?></td>
                <td><?php echo $row['cid'] ?></td>
                <td><?php echo $row['cname'] ?></td>
                <td><?php echo $row['csection'] ?></td>
                <td><?php echo $row['teacherinitial'] ?></td>
                <td><?php echo $row['cfaculty'] ?></td>
                <td><a href="file/delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
<?php } ?>