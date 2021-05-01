<?php 
    include($_SERVER['DOCUMENT_ROOT']. '/admin/config.php');
    session_start();

    // initializing variables
    $email    = "";
    $errors = array(); 

    // REGISTER USER
    if (isset($_POST['reg_user'])) {
    // receive all input values from the form
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);


        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($name)) { 
            array_push($errors, "Name is required"); 
        }
        if (empty($email)) { 
            array_push($errors, "Email is required"); 
        }
        if (empty($password)) { 
            array_push($errors, "Password is required"); 
        }

        // first check the database to make sure 
        // a user does not already exist with the same email
        $user_check_query = "SELECT * FROM users WHERE Email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
  
        if ($user) { // if user exists
            if ($user['email'] === $email) {
            array_push($errors, "email already exists");
            }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
  	        $password = md5($password);//encrypt the password before saving in the database

  	        $query = "INSERT INTO users (name, email, password) 
  			          VALUES('$name', '$email', '$password')";
  	        mysqli_query($db, $query);
  	        $_SESSION['email'] = $email;
  	        header('location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="/assets/login_register.css">
</head>

<body>
    <div class="register-page">
        <div class="form">
            <div class="Title">
                <p>User Registration</p>
            </div>
            <form method="POST" action="register.php">
                <input type="text" placeholder="name" name="name" value=""/>
                <input type="text" placeholder="email address" name="email" value="<?php echo $email; ?>" />
                <input type="password" placeholder="password" name="password" />
                <button type="submit" class="btn" name="reg_user">create</button>
                <p class="message">Already registered? <a href="login.php">Sign In</a></p>
            </form>
        </div>
    </div>
</body>

</html>