<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="menu-title text-center" style="font-size: 15px;">
                    <?php echo $user['fname'] . ' ' . $user['mname'] . ' ' . $user['lname'] ?>
                </li>
                <li class="menu-position text-center" style="margin: 10px;  font-weight: normal; text-transform: uppercase;"> Faculty</li>
                <li class="<?php echo getCurrentPage() == 'index.php' ? 'active' : ''; ?>">
                    <a href="index.php"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <li class="menu-title">Student Section</li>
                <li
                    class="menu-item-has-children dropdown <?php echo getCurrentPage() == 'student.php' ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-users"></i>Student</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo getCurrentPage() == 'student.php' ? 'active' : ''; ?>"><i
                                class="fa fa-eye"></i> <a href="student.php">View Student</a></li>
                    </ul>
                </li>

                <li
                    class="menu-item-has-children dropdown <?php echo getCurrentPage() == 'subject.php' ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-book"></i>Subject</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo getCurrentPage() == 'subject.php' ? 'active' : ''; ?>"><i
                                class="fa fa-eye"></i> <a href="subject.php">View Subject</a></li>
                    </ul>
                </li>

                <li class="menu-title">Results and Grading</li>
                <li
                    class="menu-item-has-children dropdown <?php echo getCurrentPage() == 'gradeSubject.php' ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-file"></i>Result</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="<?php echo getCurrentPage() == 'gradeSubject.php' ? 'active' : ''; ?>"><i
                                class="fa fa-plus"></i> <a href="gradeSubject.php">Grade Result</a></li>
                    </ul>
                </li>

                <li class="menu-title">Account</li>
                <li
                    class="menu-item-has-children dropdown <?php echo in_array(getCurrentPage(), ['updateProfile.php', 'updatePassword.php']) ? 'active' : ''; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-user-circle"></i>Profile</a>
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

<style>
 .navbar .menu-title {
    line-height: 30px;
}
</style>