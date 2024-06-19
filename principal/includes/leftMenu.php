<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title text-center" style="font-size: 15px;">
                    <?php echo $user['fname'] . ' ' . $user['mname'] . ' ' . $user['lname'] ?>
                </li>
                <li class="menu-title text-center" style="margin-top: -20px; font-weight: normal;"> Principal</li>
                <li class="<?php echo getCurrentPage() == 'index.php' ? 'active' : ''; ?>">
                    <a href="index.php"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <li class="menu-title">Faculty and Dept.</li>

                <li
                    class="menu-item-has-children dropdown <?php echo in_array(getCurrentPage(), ['headTeacher.php', 'faculty.php']) ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-bars"></i>Departments
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo getCurrentPage() == 'headTeacher.php' ? 'active' : ''; ?>">
                            <a href="headTeacher.php"><i class="fa fa-users"></i>Head Teacher</a>
                        </li>
                        <li class="<?php echo getCurrentPage() == 'faculty.php' ? 'active' : ''; ?>">
                            <a href="faculty.php"><i class="fa fa-users"></i>Faculty</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Student Section</li>
                <li
                    class="menu-item-has-children dropdown <?php echo getCurrentPage() == 'student.php' ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-users"></i>Student
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo getCurrentPage() == 'student.php' ? 'active' : ''; ?>">
                            <a href="student.php"><i class="fa fa-eye"></i>View Student</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="menu-item-has-children dropdown <?php echo getCurrentPage() == 'subject.php' ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-book"></i>Subject
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo getCurrentPage() == 'subject.php' ? 'active' : ''; ?>">
                            <a href="subject.php"><i class="fa fa-eye"></i>View Subject</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="menu-item-has-children dropdown <?php echo getCurrentPage() == 'section.php' ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-book"></i>Year & Section
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo getCurrentPage() == 'section.php' ? 'active' : ''; ?>">
                            <a href="section.php"><i class="fa fa-eye"></i>View Section</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="menu-item-has-children dropdown <?php echo getCurrentPage() == 'class.php' ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-book"></i>Class
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo getCurrentPage() == 'class.php' ? 'active' : ''; ?>">
                            <a href="class.php"><i class="fa fa-eye"></i>View Class</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Results and Grading</li>
                <li
                    class="menu-item-has-children dropdown <?php echo getCurrentPage() == 'gradeSubject.php' ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-file"></i>Result
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo getCurrentPage() == 'gradeSubject.php' ? 'active' : ''; ?>">
                            <a href="gradeSubject.php"><i class="fa fa-plus"></i>Grade Result</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Account</li>
                <li
                    class="menu-item-has-children dropdown <?php echo in_array(getCurrentPage(), ['updateProfile.php', 'updatePassword.php']) ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-user-circle"></i>Profile
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo getCurrentPage() == 'updateProfile.php' ? 'active' : ''; ?>">
                            <a href="updateProfile.php"><i class="fa fa-user"></i>Update Profile</a>
                        </li>
                        <li class="<?php echo getCurrentPage() == 'updatePassword.php' ? 'active' : ''; ?>">
                            <a href="updatePassword.php"><i class="fa fa-user"></i>Update Password</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="../logout.php"><i class="menu-icon fa fa-power-off"></i>Logout</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>