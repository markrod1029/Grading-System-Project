<?php include 'includes/session.php';?>

<?php
include 'includes/header.php';

 $user_id = isset($_GET['id']) ? $_GET['id'] : '';
 $is_edit = !empty($user_id);

if ($is_edit) {
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
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
                                    <li><a href="#">Departments</a></li>
                                    <li class="active"><?php echo $is_edit ? 'Edit Department' : 'Add New Department'; ?></li>
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
                                <strong class="card-title"><?php echo $is_edit ? 'Edit Department' : 'Add New Department'; ?></strong>

                                </strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form id="faculty-form" action="class/Department.php" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                            <input type="hidden" name="action" value="add_edit">
                                            <input type="hidden" name="is_edit" value="<?php echo $is_edit; ?>">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="fname" class="control-label mb-1">Firstname <span class="text-danger">*</span></label>
                                                        <input id="fname" name="fname" type="text" class="form-control" value="<?php echo $is_edit ? $user['fname'] : ''; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="mname" class="control-label mb-1">Middlename</label>
                                                    <input id="mname" name="mname" type="text" class="form-control" value="<?php echo $is_edit ? $user['mname'] : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="lname" class="control-label mb-1">Lastname <span class="text-danger">*</span></label>
                                                    <input id="lname" name="lname" type="text" class="form-control" value="<?php echo $is_edit ? $user['lname'] : ''; ?>" required>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="contact" class="control-label mb-1">Contact No <span class="text-danger">*</span></label>
                                                        <input id="contact" name="contact" type="text" class="form-control" value="<?php echo $is_edit ? $user['contact'] : ''; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="email" class="control-label mb-1">Email <span class="text-danger">*</span></label>
                                                    <input id="email" name="email" type="text" class="form-control" value="<?php echo $is_edit ? $user['email'] : ''; ?>" required>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="street" class="control-label mb-1">Street</label>
                                                        <input id="street" name="street" type="text" class="form-control" value="<?php echo $is_edit ? $user['street'] : ''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="city" class="control-label mb-1">City</label>
                                                    <input id="city" name="city" type="text" class="form-control" value="<?php echo $is_edit ? $user['city'] : ''; ?>">
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="province" class="control-label mb-1">Province</label>
                                                        <input id="province" name="province" type="text" class="form-control" value="<?php echo $is_edit ? $user['province'] : ''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 <?php echo $is_edit ? 'd-none' : ''  ?>">
                                                    <label for="position" class="control-label mb-1">Position <span class="text-danger">*</span></label>
                                                    <select id="position" name="position" class="form-control" required >
                                                        <option value="Faculty" <?php echo $is_edit && $user['position'] == 'Faculty' ? 'selected' : ''; ?>>Faculty</option>
                                                        <option value="Principal" <?php echo $is_edit && $user['position'] == 'Principal' ? 'selected' : ''; ?>>Principal</option>
                                                        <option value="Head Teacher" <?php echo $is_edit && $user['position'] == 'Head Teacher' ? 'selected' : ''; ?>>Head Teacher</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <p><small><i>Note: By default Department's password is set to "<b>Department ID</b>"</i></small></p>
                                                <button type="submit" class="btn btn-success"><?php echo $is_edit ? 'Update Department' : 'Add New Department'; ?></button>
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
