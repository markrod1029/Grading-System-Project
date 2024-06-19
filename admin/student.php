<?php include 'includes/session.php';?>

<?php
include 'includes/header.php';
?>

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
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Date Created</th>
                                            <th>Section</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Display student data here -->
                                        <?php
                                        $sql = "SELECT s.*, se.section_name, s.id AS studentid FROM students s LEFT JOIN section se ON s.section_id = se.id";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $count ?></td>
                                                    <td><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'] ?></td>
                                                    <td><?php echo $row['student_id'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                    <td><?php echo $row['contact'] ?></td>
                                                    <td><?php echo $row['street'] . ", " . $row['city'] . ", " . $row['province'] ?></td>
                                                    <td><?php echo date('Y-M-d', strtotime($row['created_at'])) ?></td>
                                                    <td><?php echo $row['section_name'] ?></td>
                                                    <td class="d-flex justify-content-center">
                                                        <a  class="btn btn-success btn-sm mr-1 " href='studentAverage.php?id=<?php echo $row['studentid'] ?>'>
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a  class="btn btn-primary btn-sm mr-1" href='addNewStudent.php?id=<?php echo $row['studentid'] ?>'>
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="class/Student.php" method="post" style="display:inline;">
                                                            <input type="hidden" name="student_id" value="<?php echo $row['id'] ?>">
                                                            <input type="hidden" name="action" value="delete">
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='9' align='center'>No Records Found</td></tr>";
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
