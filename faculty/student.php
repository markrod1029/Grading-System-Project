<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="">
    <!-- Left Panel -->
    <?php include 'includes/leftMenu.php'; ?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header -->
        <?php include 'includes/menubar.php'; ?>
        <!-- Header -->

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
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Subjects</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Display student data here -->
                                        <?php
                                        $sql = "SELECT students.id, 
                                                       CONCAT(students.fname, ' ', students.mname, ' ', students.lname) AS student_name, 
                                                       students.student_id, 
                                                       students.email, 
                                                       students.contact, 
                                                       CONCAT(students.street, ', ', students.city, ', ', students.province) AS address, 
                                                       GROUP_CONCAT(subjects.name SEPARATOR ', ') AS subject_name,
                                                       students.created_at
                                                FROM students
                                                LEFT JOIN class ON class.section_id = students.section_id
                                                LEFT JOIN subjects ON class.subject_id = subjects.id
                                                WHERE class.user_id = '$teacher_id'
                                                GROUP BY students.id";

                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $count ?></td>
                                                    <td><?php echo $row['student_name'] ?></td>
                                                    <td><?php echo $row['student_id'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                    <td><?php echo $row['contact'] ?></td>
                                                    <td><?php echo $row['address'] ?></td>
                                                    <td><?php echo $row['subject_name'] ?></td>
                                                    <td><?php echo date('Y-M-d', strtotime($row['created_at'])) ?></td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='8' align='center'>No students found for this teacher.</td></tr>";
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
