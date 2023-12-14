<?php
    session_start();
    include("../project9/db.php");

    $param = '';
    if(isset($_GET['param'])) {
        $param = $_GET['param'];
    }
    if(!$_SESSION['username']) {
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="style19.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            .customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            .customers tr:nth-child(even){background-color: #f2f2f2;}
            .customers tr:nth-child(odd):hover{background-color: green;}
            .customers tr:nth-child(even):hover{background-color: maroon;}
            .customers tr:hover {background-color: #ddd;}
            .customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="side-bar">
            <h1>Catering service</h1>
            <ul>
                <li><a href="#"><i class="fa fa-fw fa-home"></i>Dashboard</a></li>
                <li><a href="?param=orders"><i class="fa fa-bell"></i>Orders</a></li>
                <li><a href="?param=customers"><i class="fa fa-fw fa-user"></i>Customers</a></li>
                <li><a href="?param=feedback"><i class="fa fa-fw fa-envelope"></i>feedback</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Welcome to the Admin Dashboard &nbsp &nbsp  &nbsp &nbsp&nbsp &nbsp<a href="?param=logout"><i class="fa fa-sign-out"></i>Logout</a>
            </h1>
            <?php 
                if($param == 'customers') {

                    include('adminfinaluser.php');
                } else if($param == 'orders') {


                    include('orders.php');
                } else if($param == 'feedback') {


                    include('feedback.php');
                
                

                } else if($param == 'logout') {

                    session_destroy();
                    header("Location: admin.php");

                }
            ?>
        </div>
    </body>
</html>