<?php include 'includes/session.php';?>

<?php
include 'includes/header.php';

$student_id = isset($_GET['id']) ? $_GET['id'] : '';
$is_edit = !empty($student_id);

if ($is_edit) {
    $query = "SELECT * FROM students WHERE id = '$student_id'";
    $result = mysqli_query($conn, $query);
    $student = mysqli_fetch_assoc($result);
}

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
                                    <li class="active"><?php echo $is_edit ? 'Edit Student' : 'Add New Student'; ?></li>
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
                                    <h2 align="center"><?php echo $is_edit ? 'Edit Student' : 'Add New Student'; ?></h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form id="student-form" action="class/Student.php" method="post">
                                            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                                            <input type="hidden" name="action" value="add_edit">
                                            <input type="hidden" name="is_edit" value="<?php echo $is_edit; ?>">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="fname" class="control-label mb-1">Firstname <span class="text-danger">*</span></label>
                                                        <input id="fname" name="fname" type="text" class="form-control" value="<?php echo $is_edit ? $student['fname'] : ''; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="mname" class="control-label mb-1">Middlename</label>
                                                    <input id="mname" name="mname" type="text" class="form-control" value="<?php echo $is_edit ? $student['mname'] : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="lname" class="control-label mb-1">Lastname <span class="text-danger">*</span></label>
                                                    <input id="lname" name="lname" type="text" class="form-control" value="<?php echo $is_edit ? $student['lname'] : ''; ?>" required>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="contact" class="control-label mb-1">Contact No <span class="text-danger">*</span></label>
                                                        <input id="contact" name="contact" type="text" class="form-control" value="<?php echo $is_edit ? $student['contact'] : ''; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="email" class="control-label mb-1">Email <span class="text-danger">*</span></label>
                                                    <input id="email" name="email" type="text" class="form-control" value="<?php echo $is_edit ? $student['email'] : ''; ?>" required>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="street" class="control-label mb-1">Street</label>
                                                        <input id="street" name="street" type="text" class="form-control" value="<?php echo $is_edit ? $student['street'] : ''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="city" class="control-label mb-1">City</label>
                                                    <input id="city" name="city" type="text" class="form-control" value="<?php echo $is_edit ? $student['city'] : ''; ?>">
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="province" class="control-label mb-1">Province</label>
                                                        <input id="province" name="province" type="text" class="form-control" value="<?php echo $is_edit ? $student['province'] : ''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="section_id" class="control-label mb-1">Section ID <span class="text-danger">*</span></label>
                                                    <select id="section_id" name="section_id" class="form-control" required>
                                                        <?php
                                                        // Query to fetch sections
                                                        $query = "SELECT * FROM section";
                                                        $result = mysqli_query($conn, $query);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $selected = $is_edit && $row['id'] == $student['section_id'] ? 'selected' : '';
                                                                echo "<option value='" . $row['id'] . "' $selected>" . $row['section_name'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <p><small><i>Note: By default student's password is set to "<b>Student ID</b>"</i></small></p>
                                                <button type="submit" class="btn btn-success"><?php echo $is_edit ? 'Update Student' : 'Add New Student'; ?></button>
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
    <!-- /#right-panel -->

    <!-- JavaScripts -->
    <script>

    </script>
</body>

</html>
