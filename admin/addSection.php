<?php include 'includes/session.php';?>

<?php
include 'includes/header.php';

$section_id = isset($_GET['id']) ? $_GET['id'] : '';
$is_edit = !empty($section_id);

if ($is_edit) {
    $query = "SELECT * FROM section WHERE id = '$section_id'";
    $result = mysqli_query($conn, $query);
    $section = mysqli_fetch_assoc($result);
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
                                    <li><a href="#">Sections</a></li>
                                    <li class="active"><?php echo $is_edit ? 'Edit Section' : 'Add New Section'; ?></li>
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
                                    <h2 align="center"><?php echo $is_edit ? 'Edit Section' : 'Add New Section'; ?></h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form id="add-edit-section-form" action="class/Section.php" method="post">
                                            <input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
                                            <input type="hidden" name="action" value="add_edit">
                                            <input type="hidden" name="is_edit" value="<?php echo $is_edit; ?>">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="section" class="control-label mb-1">Section Name <span class="text-danger">*</span></label>
                                                        <input id="section" name="section" type="text" class="form-control" value="<?php echo $is_edit ? $section['section_name'] : ''; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="code" class="control-label mb-1">Room Code <span class="text-danger">*</span></label>
                                                        <input id="code" name="code" type="text" class="form-control" value="<?php echo $is_edit ? $section['room_code'] : ''; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success"><?php echo $is_edit ? 'Update Section' : 'Add New Section'; ?></button>
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
