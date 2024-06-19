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
                                    <li><a href="#">Class</a></li>
                                    <li class="active">View Class</li>
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
                                <strong class="card-title"><h2 align="center">All Class</h2></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Teacher Name</th>
                                            <th>Subject Name</th>
                                            <th>Subject Code</th>
                                            <th>Date Created</th>
                                            <th>Action</th>                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Display student data here -->
                                        <?php
                                        $sql = "SELECT * FROM class 
                                        LEFT JOIN subjects ON class.subject_id = subjects .id
                                        LEFT JOIN (
                                            SELECT * FROM users WHERE position = 'Faculty'
                                        ) AS faculty_users ON class.user_id = faculty_users.id";


                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {?>
                                                <tr>
                                                <td><?php echo $count ?></td>
                                                <td><?php echo $row['fname']. $row['mname']. $row['lname'] ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['subject_code'] ?></td>
                                                <td><?php echo date('Y-M-d', strtotime($row['created_at'])) ?></td>

                                                <td>
                                                    <a href='edit_student.php?id=" . $row['id'] . "'>Edit</a> 
                                                 <a href='delete_student.php?id=" . $row['id'] . "'>Delete</a></td>
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
