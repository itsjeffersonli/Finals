<?php 
    include($_SERVER['DOCUMENT_ROOT']. '/admin/config.php');
    session_start();
    // LOGIN USER
    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
  
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
  
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE Email='$email' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "You are now logged in";
                header('location: home.php');
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

    <body>
        <div class="login-page">
            <div class="form">
                <form method="POST" action="login.php">
                    <div class="Title">
                        <p>User Login</p>
                    </div>
                    <input type="text" placeholder="email" name="email" />
                    <input type="password" placeholder="password" name="password" />
                    <button type="submit" class="btn" name="login_user">login</button>
                    <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                </form>
            </div>
        </div>

    </body>

    </html>
