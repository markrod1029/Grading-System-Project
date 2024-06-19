<?php
session_start();
if (isset($_SESSION['student'])) {
    header('location:student/index.php');
    exit();
}
if (isset($_SESSION['admin'])) {
    header('location:admin/index.php');
    exit();
}
if (isset($_SESSION['faculty'])) {
    header('location:faculty/index.php');
    exit();
}
if (isset($_SESSION['principal'])) {
    header('location:principal/index.php');
    exit();
}
if (isset($_SESSION['head'])) {
    header('location:headteacher/index.php');
    exit();
}
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="Login Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="img/logo.jpg">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <style>
        body {
            background-image: url('img/background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .sufee-login {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            z-index: 1;
            position: relative;
        }

        .login-content {
            z-index: 1;
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .login-form {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .login-logo img {
            width: 100px;
            border-radius: 50%;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="sufee-login">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <div class="login-logo">
                        <a href="index.php">
                            <img class="align-content" src="img/logo.jpg" alt="">
                        </a>
                    </div>

                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "<br>
                        <div class='alert alert-danger alert-dismissible'>
                            " . $_SESSION['error'] . "
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        </div>";
                        unset($_SESSION['error']);
                    }
                    if (isset($_SESSION['success'])) {
                        echo "
                        <div class='alert alert-success alert-dismissible'>
                            " . $_SESSION['success'] . "
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        </div>";
                        unset($_SESSION['success']);
                    }
                    ?>
                    <form action="loginProcess.php" method="POST">
                        <div class="form-group" style="font-size:13px;">
                            <label>Email address</label>
                            <input type="text" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group" style="font-size:13px;">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
