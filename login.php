<?php
    session_start();
    include("../project9/db.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['name'];
        $password = $_POST['password'];

    if(!empty($name) && ($password))
        {
            $query = "INSERT INTO user (name,password) VALUES ('$name', '$password')";
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
    <title>User Login</title>
    <link rel="stylesheet" href="style15.css">
</head>
<body>
    <form action="login.php" method="post">
        <div class="container">
        <h1>User Login</h1>
            <label for="name">Username:</label>
            <input type="text" name="name" required>
            <label for="password">password:</label>
            <input type="password" name="password" required>
            <button type="button" onclick="alert('succesfully login!')">Login</button>
            <p>dont have an account signup<a href="signupform.php">signup</a></p>
       </div>
    </form>
</body>
</html>