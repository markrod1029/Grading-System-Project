<?php include 'includes/session.php'; ?>

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
                                    <li><a href="#">Profile</a></li>
                                    <li class="active">Update Profile</li>
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
                                <strong class="card-title">Update Profile Information</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form method="Post" action="class/Profile.php">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Firstname</label>
                                                        <input id="" name="fname" type="text"
                                                            class="form-control cc-exp"
                                                            value="<?php echo $user['fname']; ?>" Required
                                                            data-val="true"
                                                            data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code"
                                                        class="control-label mb-1">Middlename</label>
                                                    <input id="" name="mname" type="text" class="form-control cc-cvc"
                                                        value="<?php echo $user['mname']; ?>"
                                                        aria-placeholder="Optional" data-val="true"
                                                        data-val-required="Please enter the security code"
                                                        data-val-cc-cvc="Please enter a valid security code"
                                                        placeholder="Optional">
                                                </div>
                                            </div>
                                            <div>

                                                <div class="row">


                                                    <div class="col-6">
                                                        <label for="x_card_code"
                                                            class="control-label mb-1">Lastname</label>
                                                        <input id="" name="lname" type="text"
                                                            class="form-control cc-cvc"
                                                            value="<?php echo $user['lname']; ?>" Required
                                                            data-val="true"
                                                            data-val-required="Please enter the security code"
                                                            data-val-cc-cvc="Please enter a valid security code">
                                                    </div>


                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="x_card_code" class="control-label mb-1">Email
                                                                Address</label>
                                                            <input id="" name="email" type="email"
                                                                class="form-control cc-cvc"
                                                                value="<?php echo $user['email']; ?>" Required
                                                                data-val="true"
                                                                data-val-required="Please enter the security code"
                                                                data-val-cc-cvc="Please enter a valid security code">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Phone
                                                                Number</label>
                                                            <input id="" name="contact" type="text"
                                                                class="form-control cc-exp"
                                                                value="<?php echo $user['contact']; ?>" Required
                                                                data-val="true"
                                                                data-val-required="Please enter the card expiration"
                                                                data-val-cc-exp="Please enter a valid month and year">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Street
                                                                Number</label>
                                                            <input id="" name="street" type="text"
                                                                class="form-control cc-exp"
                                                                value="<?php echo $user['street']; ?>" Required
                                                                data-val="true"
                                                                data-val-required="Please enter the card expiration"
                                                                data-val-cc-exp="Please enter a valid month and year">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">City
                                                                Number</label>
                                                            <input id="" name="city" type="text"
                                                                class="form-control cc-exp"
                                                                value="<?php echo $user['city']; ?>" Required
                                                                data-val="true"
                                                                data-val-required="Please enter the card expiration"
                                                                data-val-cc-exp="Please enter a valid month and year">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Province
                                                                Number</label>
                                                            <input id="" name="province" type="text"
                                                                class="form-control cc-exp"
                                                                value="<?php echo $user['province']; ?>" Required
                                                                data-val="true"
                                                                data-val-required="Please enter the card expiration"
                                                                data-val-cc-exp="Please enter a valid month and year">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value='<?php echo $user['id'] ?>'>
                                                <input type="hidden" name="action" value="profile">

                                                <button type="submit" name="submit" class="btn btn-success">Update
                                                    Profile</button>
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