<?php include 'includes/session.php';?>

<?php
include 'includes/header.php';

$subject_id = isset($_GET['id']) ? $_GET['id'] : '';
$is_edit = !empty($subject_id);

if ($is_edit) {
    $query = "SELECT * FROM subjects WHERE id = '$subject_id'";
    $result = mysqli_query($conn, $query);
    $subject = mysqli_fetch_assoc($result);
}
?>

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
                                    <li><a href="#">Subjects</a></li>
                                    <li class="active"><?php echo $is_edit ? 'Edit Subject' : 'Add New Subject'; ?></li>
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
                                    <h2 align="center"><?php echo $is_edit ? 'Edit Subject' : 'Add New Subject'; ?></h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form id="add-edit-subject-form" action="class/Subject.php" method="post">
                                            <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
                                            <input type="hidden" name="action" value="add_edit">
                                            <input type="hidden" name="is_edit" value="<?php echo $is_edit; ?>">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="subject" class="control-label mb-1">Subject Name <span class="text-danger">*</span></label>
                                                        <input id="subject" name="subject" type="text" class="form-control" value="<?php echo $is_edit ? $subject['name'] : ''; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success"><?php echo $is_edit ? 'Update Subject' : 'Add New Subject'; ?></button>
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
</body>
</html>
