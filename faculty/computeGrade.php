<?php include 'includes/session.php';?>

<?php
include ('../includes/dbconnection.php');

// Fetch existing grades if they exist
$student_id = $_GET['student_id'];
$subject_id = $_GET['subject_id'];
$batch = $_GET['batch'];

$query = "SELECT * FROM grade WHERE student_id = '$student_id' AND subject_id = '$subject_id' AND user_id = '$teacher_id' AND batch = '$batch'";
$result = mysqli_query($conn, $query);
$existingGrade = mysqli_fetch_assoc($result);

include 'includes/header.php'; 
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
                                    <li><a href="#">Result</a></li>
                                    <li class="active">View Grade</li>
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
                                    <h2 align="center"><?php echo $existingGrade ? "Update Grade" : "Add New Grade"; ?></h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form id="add-student-form" action="class/Grade.php" method="post">

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first" class="control-label mb-1">First Quarter
                                                           </label>
                                                        <input id="first" name="first" type="number"
                                                            class="form-control"  value="<?php echo $existingGrade['first_quarter'] ?? ''; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="second" class="control-label mb-1">Second Quarter
                                                            <span class="text-danger">*</span></label>
                                                        <input id="second" name="second" type="number"
                                                            class="form-control" required value="<?php echo $existingGrade['second_quarter'] ?? ''; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="third" class="control-label mb-1">Third Quarter
                                                          </label>
                                                        <input id="third" name="third" type="number"
                                                            class="form-control"  value="<?php echo $existingGrade['third_quarter'] ?? ''; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="fourth" class="control-label mb-1">Fourth Quarter
                                                            </label>
                                                        <input id="fourth" name="fourth" type="number"
                                                            class="form-control"  value="<?php echo $existingGrade['fourth_quarter'] ?? ''; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="final" class="control-label mb-1">Final Grade 
                                                                </label>
                                                        <input id="final" name="final" type="text" class="form-control"
                                                            readonly  value="<?php echo $existingGrade['grade'] ?? ''; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="status" class="control-label mb-1">Status</label>
                                                        <input id="status" name="status" type="text"
                                                            class="form-control" readonly value="<?php echo $existingGrade['result'] ?? ''; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <p><small><i>Note: The Final Grade is calculated as the average of the
                                                            First, Second, Third, and Fourth Quarters. If any quarter
                                                            grade is 0, the Final Grade will be marked as
                                                            "INC".</i></small></p>

                                                <input type="hidden" name="student_id" value="<?php echo $student_id ?>">
                                                <input type="hidden" name="user_id" value="<?php echo $teacher_id; ?>">
                                                <input type="hidden" name="subject_id" value="<?php echo $subject_id ?>">
                                                <input type="hidden" name="subject_name" value="<?php echo $_GET['subject_name'] ?>">
                                                <input type="hidden" name="batch" value="<?php echo $_GET['batch'] ?>">
                                                <input type="hidden" name="teacher_name" value="<?php echo $user['fname'].' '.$user['mname']. ' '.$user['lname']  ?>">


                                                <input type="hidden" name="existing" value="<?php echo $existingGrade ? 1 : 0; ?>">
                                                <button type="submit" class="btn btn-success"><?php echo $existingGrade ? "Update Grade" : "Add Grade"; ?></button>
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
        document.addEventListener('DOMContentLoaded', function () {
            const first = document.getElementById('first');
            const second = document.getElementById('second');
            const third = document.getElementById('third');
            const fourth = document.getElementById('fourth');
            const final = document.getElementById('final');
            const status = document.getElementById('status');

            function calculateFinalGrade() {
                const firstVal = parseFloat(first.value) || 0;
                const secondVal = parseFloat(second.value) || 0;
                const thirdVal = parseFloat(third.value) || 0;
                const fourthVal = parseFloat(fourth.value) || 0;

                if (firstVal === 0 || secondVal === 0 || thirdVal === 0 || fourthVal === 0) {
                    final.value = "INC";
                    status.value = "Failed";
                } else {
                    const finalGrade = (firstVal + secondVal + thirdVal + fourthVal) / 4;
                    final.value = finalGrade.toFixed(2); // Round to 2 decimal places
                    status.value = finalGrade >= 75 ? "Passed" : "Failed";
                }
            }

            first.addEventListener('input', calculateFinalGrade);
            second.addEventListener('input', calculateFinalGrade);
            third.addEventListener('input', calculateFinalGrade);
            fourth.addEventListener('input', calculateFinalGrade);

            // Calculate final grade on page load if there are existing values
            calculateFinalGrade();
        });
    </script>
</body>

</html>
