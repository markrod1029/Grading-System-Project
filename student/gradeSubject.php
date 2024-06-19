<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="">
    <!-- Left Panel -->
    <?php include 'includes/leftMenu.php'; ?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include 'includes/menubar.php'; ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Students</a></li>
                                    <li class="active">View Grades</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display success message -->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                        </div> <!-- .card -->
                    </div><!--/.col-->

                    <?php
                    // Query to get all unique batches for the student
                    $batch_query = "SELECT DISTINCT batch FROM grade WHERE student_id = '$student_id'";
                    $batch_result = mysqli_query($conn, $batch_query);

                    if (mysqli_num_rows($batch_result) > 0) {
                        while ($batch_row = mysqli_fetch_assoc($batch_result)) {
                            $batch = $batch_row['batch'];
                    ?>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Grades for Batch <?php echo $batch; ?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject Name</th>
                                            <th>Teacher Name</th>
                                            <th>Average Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Query to fetch grades for the specific batch
                                        $sql = "SELECT id, subject_name, teacher_name, grade AS average_grade
                                                FROM grade
                                                WHERE student_id = '$student_id' AND batch = '$batch'";

                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            $count = 1;
                                            $total_grades = 0;
                                            $valid_grade_count = 0; // Initialize valid_grade_count

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // Check if the average grade is 'INC' or null
                                                $average_grade = $row['average_grade'];
                                                if ($average_grade != null && $average_grade != 'INC') {
                                                    $total_grades += $average_grade;
                                                    $valid_grade_count++;
                                                }
                                        ?>
                                                <tr>
                                                    <td><?php echo $count ?></td>
                                                    <td><?php echo $row['subject_name'] ?></td>
                                                    <td><?php echo $row['teacher_name'] ?></td>
                                                    <td><?php echo $average_grade ?></td>
                                                </tr>
                                        <?php
                                                $count++;
                                            }

                                            // Compute overall average
                                            if ($valid_grade_count > 0) {
                                                $overall_average = $total_grades / $valid_grade_count;
                                        ?>
                                                <tr>
                                                    <td colspan="3" class="text-center">Overall Average</td>
                                                    <td><?php echo number_format($overall_average, 2) ?></td>
                                                </tr>
                                        <?php
                                            } else {
                                        ?>
                                                <tr>
                                                    <td colspan="3" class="text-center">Overall Average</td>
                                                    <td>INC</td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo '<tr><td colspan="4" class="text-center">No subjects found.</td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php
                        } // End of while loop for batches
                    } else {
                        echo '<div class="col-md-12"><div class="card"><div class="card-header"><strong class="card-title">No batches found.</strong></div></div></div>';
                    }
                    ?>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>

        <?php include 'includes/footer.php'; ?>
        <?php include 'toastr/toastr.php'; ?>
    </div><!-- /#right-panel -->
</body>

</html>
