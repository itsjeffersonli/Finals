<?php
    include($_SERVER['DOCUMENT_ROOT']. '/admin/config.php');
    session_start();

    $errors = array(); 
    if (isset($_POST['send_mail'])) {
        // receive all input values from the form
            $name = mysqli_real_escape_string($db, $_POST['name']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $title = mysqli_real_escape_string($db, $_POST['title']);
            $subject = mysqli_real_escape_string($db, $_POST['subject']);
    
            // form validation: ensure that the form is correctly filled ...
            // by adding (array_push()) corresponding error unto $errors array
            if (empty($name)) { 
                array_push($errors, "Name is required"); 
            }
            if (empty($email)) { 
                array_push($errors, "Email is required"); 
            }
            if (empty($title)) { 
                array_push($errors, "Title is required"); 
            }
            if (empty($subject)) {
                array_push($errors, "Message is Required");
            }
            
            if (count($errors) == 0) {
                $query = "INSERT INTO inquiries (name, email, title, subject) 
                          VALUES('$name', '$email', '$title', '$subject')";
                mysqli_query($db, $query);
                $to      = '';
                $subject_mail = $title;
                $message = $subject;
                $message = wordwrap($message,70);
        
                mail($to, $subject_mail, $message);
                header('location: Index.php');
            }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
    <link rel="stylesheet" href="/assets/login_register.css">
</head>

<body>
    <div class="register-page">
        <div class="form">
            <div class="Title">
                <p>Inquiries</p>
            </div>
            <form method="POST" action="contact.php">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name..">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Title">
                <label for="subject">Message</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="width: 98%;"></textarea>

                <button type="submit" class="btn" name="send_mail">Send</button>
            </form>
        </div>
</body>

</html>
