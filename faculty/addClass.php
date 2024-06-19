<?php include 'includes/session.php';?>

<?php 
include 'includes/header.php'; ?>
<script>

</script>
<body>
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
                                    <li><a href="#">Class</a></li>
                                    <li class="active">View Class</li>
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
                            <div class="card-header">
                                <strong class="card-title">
                                    <h2 align="center">Add New Class</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form id="add-student-form" action="class/Class.php" method="post">
                                            <div class="row">
                                                <!-- Dropdown for Subject -->
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="subject" class="control-label mb-1">Subject Name <span
                                                                class="text-danger">*</span></label>
                                                        <select id="subject" name="subject" class="form-control" required>
                                                            <option value="">Select Subject</option>
                                                            <?php
                                                                $subject_query = "SELECT * FROM subjects";
                                                                $subject_result = mysqli_query($conn, $subject_query);
                                                                while($row = mysqli_fetch_assoc($subject_result)) {
                                                                    echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Dropdown for Faculty -->
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="faculty" class="control-label mb-1">Faculty Name <span
                                                                class="text-danger">*</span></label>
                                                        <select id="faculty" name="faculty" class="form-control" required>
                                                            <option value="">Select Faculty</option>
                                                            <?php
                                                                $faculty_query = "SELECT * FROM users WHERE position = 'Faculty'";
                                                                $faculty_result = mysqli_query($conn, $faculty_query);
                                                                while($row = mysqli_fetch_assoc($faculty_result)) {
                                                                    echo "<option value='".$row['id']."'>".$row['fname']." ".$row['lname']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex ">
                                                <button type="submit" class="btn btn-success">Add New Class</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <script>

    </script>
</body>
</html>
