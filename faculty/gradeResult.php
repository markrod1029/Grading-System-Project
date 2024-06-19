<?php include 'includes/session.php';?>
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
                                    <li class="active">View Students</li>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <h2 align="center">All Students</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Student ID</th>
                                            <th>Grade</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Display student data here -->
                                        <?php
                                        $subject_id = $_GET['subject_id'];
                                        $class_batch = $_GET['class_batch'];
                                        $sql = "SELECT students.*, grade.grade, grade.result, grade.created_at, students.id AS studentid, grade.created_at AS date, class.batch AS batch_year FROM students 
                                                LEFT JOIN class ON class.section_id = students.section_id
                                                LEFT JOIN grade ON grade.student_id = students.id AND grade.subject_id = '$subject_id' AND grade.user_id = '$teacher_id' AND grade.batch = '$class_batch'
                                                WHERE class.user_id = '$teacher_id' AND class.subject_id = '$subject_id' AND class.batch = '$class_batch' ";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $count ?></td>
                                                    <td><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'] ?></td>
                                                    <td><?php echo $row['student_id'] ?></td>
                                                    <td><?php echo $row['grade'] ?? 'N/A' ?></td>
                                                    <td><?php echo $row['result'] ?? 'N/A' ?></td>
                                                    <td><?php echo isset($row['date']) ? date('Y-M-d', strtotime($row['date'])) : 'N/A' ?></td>
                                                    <td><a href="computeGrade.php?student_id=<?php echo $row['studentid'] ?>&subject_id=<?php echo $subject_id ?>&subject_name=<?php echo $_GET['subject_name'] ?>&batch=<?php echo $row['batch_year'] ?>"
                                                            class="btn btn-primary">Compute Grade</a></td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>

        <?php include 'includes/footer.php'; ?>
        <?php include 'toastr/toastr.php'; ?>
    </div><!-- /#right-panel -->
</body>

</html>
