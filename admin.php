<?php
    session_start();
    include("../project9/db.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['name'];
        $password = $_POST['password'];

        if(!empty($name) && ($password))
        {
            $query = "SELECT * FROM  user WHERE name = '$name' and password = '$password' and type = 'admin'";

            $result = mysqli_query($conn,$query);

            // Fetch all
        $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if(count($resultArray) > 0)
        {
            $_SESSION['username'] = $name;
            // Redirect browser
            header("Location: adminfinal.php");
            } else {
            echo "<script type='text/javascript'> alert('Enter Valid Credentials!')</script>";
        }
        // Free result set
        mysqli_free_result($result);
        } else {
            echo "<script type='text/javascript'> alert('please enter valid information')</script>";
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style14.css">
</head>
<body>
    <form  action="" method="POST">
        <div class="container">
            <h1>Admin Login</h1>
                <div>
                    <label for="name">Username</label>
                    <input type="text" id="name" name="name"  required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"   required>
                </div>
                <button>Login</button>
        </div>
       
</body>
</html>