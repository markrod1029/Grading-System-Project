<?php include 'includes/session.php';?>
<?php include 'includes/header.php';?>

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
                                    <li><a href="#">Results</a></li>
                                    <li class="active">View Teachers</li>
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
                                    <h2 align="center">All Teachers</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject Name</th>
                                            <th>Teacher Name</th>
                                            <th>Total Students</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Display subject data here -->
                                        <?php

                                        $subject_id = $_GET['subject_id'];
                                        $class_batch = $_GET['class_batch'];
                                        $sql = "SELECT subjects.id AS subject_id, 
                                                       subjects.name AS subject_name, 
                                                       CONCAT(users.fname, ' ', users.mname, ' ', users.lname) AS teacher_name,
                                                       COUNT(DISTINCT students.id) AS total_students,
                                                       subjects.created_at AS date_created,
                                                       class.user_id AS teacher_id
                                                FROM subjects
                                                LEFT JOIN class ON subjects.id = class.subject_id
                                                LEFT JOIN students ON students.section_id = class.section_id
                                                LEFT JOIN users ON class.user_id = users.id
                                                WHERE subjects.id = '$subject_id' AND class.batch = '$class_batch' 
                                                GROUP BY subjects.id, class.user_id";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $count ?></td>
                                                    <td><?php echo $row['subject_name'] ?></td>
                                                    <td><?php echo $row['teacher_name'] ?></td>
                                                    <td><?php echo $row['total_students'] ?></td>
                                                    <td><a href="gradeResult.php?subject_id=<?php echo $row['subject_id'] ?>&teacher_id=<?php echo $row['teacher_id'] ?>&class_batch=<?php echo $class_batch ?>"
                                                            class="btn btn-primary">View Student</a></td>
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

