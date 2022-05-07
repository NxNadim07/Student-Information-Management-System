<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container fw-bolder">
            <div class="d-flex align-items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/North-South-University-logo-03.png?20190724102519" style="width:60px;">
                <a class="navbar-brand" href="index.php">Admin Portal</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php if (isset($_SESSION['adminid'])) { ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>

                <?php } else{ ?>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminregistration.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminlogin.php">Login</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>