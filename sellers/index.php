<?php 
    include($_SERVER['DOCUMENT_ROOT']. '/admin/config.php');
    session_start();
    // LOGIN USER
    if (isset($_POST['login_user'])) {
        $seller_username = mysqli_real_escape_string($db, $_POST['seller_username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
  
        if (empty($seller_username)) {
            array_push($errors, "Username is Required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
  
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM sellers WHERE SellerUsername='$seller_username' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['seller_username'] = $seller_username;
                $_SESSION['success'] = "You are now logged in";
                header('location: sellers.php');
            }else {
            echo "Wrong username/password combination";
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
                <form method="POST" action="index.php">
                    <div class="Title">
                        <p>Seller Login</p>
                    </div>
                    <input type="text" placeholder="Seller Username" name="seller_username"/>
                    <input type="password" placeholder="password" name="password" />
                    <button type="submit" class="btn" name="login_user">login</button>
                    <p class="message">Not registered? <a href="seller_register.php">Create an account</a></p>
                </form>
            </div>
        </div>

    </body>

    </html>
