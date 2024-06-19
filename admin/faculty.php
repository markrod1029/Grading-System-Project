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
                                    <li><a href="#">Departments</a></li>
                                    <li class="active">View Faculty</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                    <h2 align="center">All Faculty</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Faculty Name</th>
                                            <th>Department ID</th>
                                            <th>Position</th>
                                            <th>Email</th>
                                            <th>contact</th>
                                            <th>Address</th>
                                            <th>Date Created</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- Display student data here -->
                                        <?php
                                        $sql = "SELECT * FROM users WHERE position = 'Faculty'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $count ?></td>
                                                    <td><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'] ?>
                                                    </td>
                                                    <td><?php echo $row['user_id'] ?></td>
                                                    <td><?php echo $row['position'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                    <td><?php echo $row['contact'] ?> </td>
                                                    <td><?php echo $row['street'] . ", " . $row['city'] . ", " . $row['province'] ?>
                                                    </td>
                                                    <td><?php echo date('Y-M-d', strtotime($row['created_at'])) ?></td>

                                                    <td class="d-flex justify-content-center">
                                                        <a class="btn btn-primary btn-sm mr-1"
                                                            href='addDepartment.php?id=<?php echo $row['id'] ?>'>
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="class/Department.php" method="post"
                                                            style="display:inline;">
                                                            <input type="hidden" name="position"
                                                                value="<?php echo $row['position'] ?>">
                                                            <input type="hidden" name="user_id"
                                                                value="<?php echo $row['id'] ?>">

                                                            <input type="hidden" name="action" value="delete">
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this Faculty?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>

                                                        </form>

                                                    </td>
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