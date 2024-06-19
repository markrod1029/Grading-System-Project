<?php include 'includes/session.php'; ?>

<?php
// Query to count distinct students linked to the teacher
$student_query = "SELECT COUNT(DISTINCT students.id) AS student_count 
                  FROM students
                  LEFT JOIN class ON students.section_id = class.section_id 
                  WHERE class.user_id = '$teacher_id'";

// Query to count distinct subjects linked to the teacher
$subject_query = "SELECT COUNT(DISTINCT subjects.id) AS subject_count 
                  FROM subjects 
                  LEFT JOIN class ON subjects.id = class.subject_id 
                  WHERE class.user_id = '$teacher_id'";

$student_result = mysqli_query($conn, $student_query);
$subject_result = mysqli_query($conn, $subject_query);

// Fetch the results
$student_count = mysqli_fetch_assoc($student_result)['student_count'];
$subject_count = mysqli_fetch_assoc($subject_result)['subject_count'];

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
                                <h3 align="center"><b>User Panel</b></h3>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-sm-6 col-lg-3">
                        <!-- Subject Count -->
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r"><span class="count"><?php echo $subject_count; ?></span></h3>
                                    <p class="text-light mt-1 m-0">Subjects</p>
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
                                    <p class="text-light mt-1 m-0">Students</p>
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
        <?php include 'includes/footer.php'; ?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
</body>

</html>
