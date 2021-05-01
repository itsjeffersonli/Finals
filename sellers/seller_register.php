<?php
    include($_SERVER['DOCUMENT_ROOT']. '/admin/config.php');
    session_start();

    // initializing variables
    $email    = "";
    $errors = array(); 

    // REGISTER Seller
    if (isset($_POST['reg_user'])) {
    // receive all input values from the form
        $seller_username = mysqli_real_escape_string($db, $_POST['seller_username']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $telnumber = mysqli_real_escape_string($db, $_POST['number']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($seller_username)) { 
            array_push($errors, "Seller Username is required"); 
        }
        if (empty($name)) { 
            array_push($errors, "Name is required"); 
        }
        if (empty($telnumber)) { 
            array_push($errors, "Cellphone Number is required"); 
        }
        if (empty($email)) { 
            array_push($errors, "Email is required"); 
        }
        if (empty($password)) { 
            array_push($errors, "Password is required"); 
        }

        // first check the database to make sure 
        // a user does not already exist with the same email
        $user_check_query = "SELECT * FROM sellers WHERE Email='$email' LIMIT 1";
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

  	        $query = "INSERT INTO sellers (sellerusername, name, telnumber, email, password) 
  			          VALUES('$seller_username', '$name', '$telnumber', '$email', '$password')";
  	        mysqli_query($db, $query);
  	        $_SESSION['email'] = $email;
  	        header('location: index.php');
        }
    }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Seller Registration</title>
    <link rel="stylesheet" href="/assets/login_register.css">
</head>

<body>
    <div class="register-page">
        <div class="form">
            <div class="Title">
                <p>Seller Registration</p>
            </div>
            <form method="POST" action="seller_register.php">
                <input type="text" placeholder="Seller Username" name="seller_username" value=""/>
                <input type="text" placeholder="name" name="name" value=""/>
                <input type="text" placeholder="TelNumber" name="number" value=""/>
                <input type="text" placeholder="email address" name="email" value="<?php echo $email; ?>" />
                <input type="password" placeholder="password" name="password" />
                <button type="submit" class="btn" name="reg_user">create</button>
                <p class="message">Already registered? <a href="index.php">Sign In</a></p>
            </form>
        </div>
    </div>
</body>

</html>
