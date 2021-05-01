<?php 
    include($_SERVER['DOCUMENT_ROOT']. '/admin/config.php');
    session_start();
    // LOGIN USER
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
  
        if (empty($email)) {
            array_push($errors, "username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
  
        if (count($errors) == 0) {
            $query = "SELECT * FROM admin WHERE Username='$username' AND Password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: admin.php');
            }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Login</title>
        <link href="/assets/login_register.css" rel="stylesheet">
    </head>
    <style>
        html{
            background-image: url("/assets/images_admin/nicewall.jpg");
            background-repeat: no-repeat;
            background-position: center;
            height: 100%;
            width: 100%;
        }
    </style>
    <body>
        <div class="login-page">
            <div class="form">
                <form method="POST" action="index.php">
                    <div class="Title">
                        <p>Admin Login</p>
                    </div>
                    <input type="text" placeholder="username" name="username" />
                    <input type="password" placeholder="password" name="password" />
                    <button type="submit" class="btn" name="login_user">login</button>
                </form>
            </div>
        </div>

    </body>

    </html>