<?php 
session_start();
if (isset($_SESSION['adminid'])) {
  header("location:index.php");
}else{
?>
<!DOCTYPE html>
<html>
    <?php $title = "Admin Panal | Register"; ?>
    <?php require 'head.php'; ?>

    <body>
        <?php require 'header.php'; ?>

        <div class="container my-5">
        <form action="file/registration.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name='ademail' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input type="text" name='adname' class="form-control" id="exampleInputName" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputCity" class="form-label">City</label>
            <input type="text" name='adcity' class="form-control" id="exampleInputCity" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPhone" class="form-label">Phone</label>
            <input type="tel" name='adphone' class="form-control" id="exampleInputPhone" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name='adpassword' class="form-control" id="exampleInputPassword1" required>
        </div>
        <button type="submit" name="aregisteration" value="Registration" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
<?php } ?>

