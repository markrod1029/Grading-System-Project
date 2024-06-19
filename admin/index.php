<?php include 'includes/session.php';?>

<?php
// Query to get the count of each user type
$faculty_query = "SELECT COUNT(*) AS faculty_count FROM users WHERE position = 'Faculty'";
$head_teacher_query = "SELECT COUNT(*) AS head_teacher_count FROM users WHERE position = 'Head Teacher'";
$principal_query = "SELECT COUNT(*) AS principal_count FROM users WHERE position = 'Principal'";
$student_query = "SELECT COUNT(*) AS student_count FROM students";

$faculty_result = mysqli_query($conn, $faculty_query);
$head_teacher_result = mysqli_query($conn, $head_teacher_query);
$principal_result = mysqli_query($conn, $principal_query);
$student_result = mysqli_query($conn, $student_query);

// Fetch the results
$faculty_count = mysqli_fetch_assoc($faculty_result)['faculty_count'];
$head_teacher_count = mysqli_fetch_assoc($head_teacher_result)['head_teacher_count'];
$principal_count = mysqli_fetch_assoc($principal_result)['principal_count'];
$student_count = mysqli_fetch_assoc($student_result)['student_count'];

mysqli_close($conn);
?>

<?php include 'includes/header.php'; ?>

<body>
    <!-- Left Panel -->
    <?php include 'includes/leftMenu.php'; ?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include 'includes/menubar.php'; ?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 align="center"><b>Admin Panel</b></h3>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-sm-6 col-lg-3">
                        <!-- Faculty Count -->
                        <div class="card text-white bg-flat-color-2">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r"><span class="count"><?php echo $faculty_count; ?></span></h3>
                                    <p class="text-light mt-1 m-0">Faculty</p>
                                </div>
                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-keypad"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <!-- Head Teacher Count -->
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r"><span class="count"><?php echo $head_teacher_count; ?></span></h3>
                                    <p class="text-light mt-1 m-0">Head Teacher</p>
                                </div>
                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-network"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <!-- Principal Count -->
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r"><span class="count"><?php echo $principal_count; ?></span></h3>
                                    <p class="text-light mt-1 m-0">Principal</p>
                                </div>
                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-notebook"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <!-- Student Count -->
                        <div class="card text-white bg-flat-color-5">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r"><span class="count"><?php echo $student_count; ?></span></h3>
                                    <p class="text-light mt-1 m-0">Student</p>
                                </div>
                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <?php include 'includes/footer.php';?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
</body>
</html>
