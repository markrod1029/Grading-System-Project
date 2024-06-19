<?php include 'includes/session.php';?>

<?php
include 'includes/header.php'; ?>



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
                                <strong class="card-title">
                                    <h2 align="center">All Class</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Section Name</th>
                                            <th>Room Code</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Display student data here -->
                                        <?php
                                        $sql = "SELECT * FROM section";


                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $count ?></td>
                                                    <td><?php echo $row['section_name'] ?></td>
                                                    <td><?php echo $row['room_code'] ?></td>
                                                    <td><?php echo date('Y-M-d', strtotime($row['created_at'])) ?></td>

                                                    <td  class="d-flex justify-content-center">

                                                        <a class="btn btn-primary btn-sm" href='addSection.php?id=<?php echo $row['id'] ?>'>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                        <form action="class/Section.php" method="post"
                                                            style="display:inline;">
                                                            <input type="hidden" name="section_id"
                                                                value="<?php echo $row['id'] ?>">
                                                            <input type="hidden" name="action" value="delete">
                                                            <button type="submit" class="btn btn-danger btn-sm ml-1"
                                                                onclick="return confirm('Are you sure you want to delete this section?')">
                                                        <i class=" fas fa-trash"></i>
                                                            </button>
                                                        </form>
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