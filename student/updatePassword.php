<?php include 'includes/session.php'; ?>

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
                                    <li><a href="#">Profile</a></li>
                                    <li class="active">Update Password</li>
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
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success']; ?>
                            </div>
                            <?php unset($_SESSION['success']); ?>
                        <?php endif; ?>

                        <!-- Display error message -->
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger"> 
                                <?php echo $_SESSION['error']; ?>
                            </div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Update Profile Password</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form method="Post" action="class/profile.php">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Old
                                                            Password</label>
                                                        <input id="" name="old" type="password"
                                                            class="form-control cc-exp" Required data-val="true"
                                                            data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">New
                                                            Password</label>
                                                        <input id="" name="new" type="password"
                                                            class="form-control cc-exp" data-val="true"
                                                            data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Confirm
                                                            Password</label>
                                                        <input id="" name="confirm" type="password"
                                                            class="form-control cc-exp" data-val="true"
                                                            data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year" ">
                                                    </div>
                                                </div>

                                            </div>
                                            <div>

                                            <input type="hidden" name="action" value="password">

                                                        <input type="hidden" name="id"
                                                            value='<?php echo $user['id'] ?>'>
                                                        <button type="submit" name="submit"
                                                            class="btn btn-success">Update
                                                            Password</button>
                                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
        <?php include 'includes/footer.php'; ?>

    </div>
    <!-- /#right-panel -->

    <!-- JavaScripts -->
    <script>

    </script>
</body>

</html>