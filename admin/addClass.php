<?php include 'includes/header.php'; ?>
<?php include 'includes/session.php'; ?>

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
                                        <form id="add-class-form" action="class/Class.php" method="post">
                                            <div class="row">
                                                <!-- Dropdown for Subject -->
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="subject" class="control-label mb-1">Subject Name
                                                            <span class="text-danger">*</span></label>
                                                        <select id="subject" name="subject" class="form-control"
                                                            required>
                                                            <option value="">Select Subject</option>
                                                            <?php
                                                            $subject_query = "SELECT * FROM subjects";
                                                            $subject_result = mysqli_query($conn, $subject_query);
                                                            while ($row = mysqli_fetch_assoc($subject_result)) {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Dropdown for Faculty -->
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="faculty" class="control-label mb-1">Faculty Name
                                                            <span class="text-danger">*</span></label>
                                                        <select id="faculty" name="faculty" class="form-control"
                                                            required>
                                                            <option value="">Select Faculty</option>
                                                            <?php
                                                            $faculty_query = "SELECT * FROM users WHERE position = 'Faculty'";
                                                            $faculty_result = mysqli_query($conn, $faculty_query);
                                                            while ($row = mysqli_fetch_assoc($faculty_result)) {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['fname'] . " " . $row['lname'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Dropdown for Section -->
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="section_id" class="control-label mb-1">Section Name
                                                            <span class="text-danger">*</span></label>
                                                        <select id="section_id" name="section_id" class="form-control"
                                                            required>
                                                            <option value="">Select Section</option>
                                                            <?php
                                                            $section_query = "SELECT id, section_name FROM section";
                                                            $section_result = mysqli_query($conn, $section_query);
                                                            while ($row = mysqli_fetch_assoc($section_result)) {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['section_name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Dropdown for Batch Year -->
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="batch_year" class="control-label mb-1">Batch Year
                                                            <span class="text-danger">*</span></label>
                                                        <select id="batch_year" name="batch_year"
                                                            class="form-control"></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <input type="hidden" name="action" value="add">
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
        document.addEventListener('DOMContentLoaded', (event) => {
            const batchYearSelect = document.getElementById('batch_year');
            const currentYear = new Date().getFullYear();

            // Loop to add options for 10 years from current year
            for (let i = 0; i < 10; i++) {
                const option = document.createElement('option');
                const year = currentYear + i;
                option.value = year;
                option.textContent = year;
                if (i === 0) {
                    option.selected = true; // Optionally set the first year as the selected option
                }
                batchYearSelect.appendChild(option);
            }
        });

    </script>

</body>

</html>