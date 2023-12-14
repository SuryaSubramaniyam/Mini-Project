<?php
    session_start();
    include("../project9/db.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    if(!empty($email) && ($password))
        {
            $query = "INSERT INTO user (name,email,password,type) VALUES ('$name', '$email', '$password','user')";
        
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
    <title>Signup</title>
    <link rel="stylesheet" href="style11.css">
</head>
<body>
    <form  action="signupform.php" method="POST">
        <div class="container">
            <h1>Signup</h1>
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
        <button>Sign up</button><br>
        <p>Already have an account signup<a href="login.php">Login</a></p>
    </form>
</body>
</html>