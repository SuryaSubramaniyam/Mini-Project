<?php
    session_start();
    include("../project9/db.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstname = $_POST['firstname'];
        $lasttname = $_POST['lasttname'];
        $email = $_POST['email'];
        $message = $_POST['message'];
            if(!empty($email) && ($firstname))
        {
            $query = "INSERT INTO contact (firstname,lastname,email,message) VALUES 
            ('$firstname','$lasttname','$email','$message')";
        
            mysqli_query($conn,$query);
                echo "Successfully registered";
        }
    else{
        echo "<script type='text/javascript'> alter('please enter valid information')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact form</title>
    <link rel="stylesheet" href="style18.css">
</head>
<body>
    <div class="container">
        <div class="img">
            <img src="./img/contacct.jpg">
        </div>
    <form action="contactform.php" method="post">
        <h1>contact us</h1>
            <div class="form-group">
                <label for="first name">First Name:</label>
                <input type="text" name="firstname"  placeholder="Enter your first name" required>
            </div>
            <div class="form-group">
                <label for="last name">Last Name:</label>
                <input type="text" name="lasttname"  placeholder="Enter your last name" required>
            </div>
            <div class="form-group">
                <label for="email"> Email:</label>
                <input type="email" name="email"  placeholder="Enter your Mail" required>
            </div>
            <div class="form-group">
                <label for="last name">Sent a Message</label>
                <textarea name="message" rows="10" cols="50">Enter the message int this box</textarea>
            </div>
            <button>Send</button>
        </form>
    </div>
</body>
</html>