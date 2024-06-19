<?php
include 'includes/session.php';
include 'includes/header.php';
?>

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
                                <h3 align="center"><b>Student Subjects</b></h3>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-sm-6">
                        <!-- Subject Count -->
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count">
                                            <?php
                                            // Query to count subjects of the student
                                            $subject_count_query = "SELECT COUNT(subjects.id) AS subject_count
                                                                   FROM subjects
                                                                   LEFT JOIN class ON subjects.id = class.subject_id
                                                                   LEFT JOIN students ON students.section_id = class.section_id
                                                                   WHERE students.id = '$student_id'";
                                            $subject_count_result = mysqli_query($conn, $subject_count_query);
                                            $subject_count = mysqli_fetch_assoc($subject_count_result)['subject_count'];
                                            echo $subject_count;
                                            ?>
                                        </span>
                                    </h3>
                                    <p class="text-light mt-1 m-0 ">Total Subjects</p>
                                </div>
                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-note2"></i>
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
