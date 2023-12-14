<?php
    include("../project9/db.php");

    if(isset($_GET['id']) && $_GET['action']) {
        $id = $_GET['id'];
        $status = $_GET['action'];
        $sql = "UPDATE order_request SET status='$status' WHERE id=$id";
        $result = $conn->query($sql);
    }
    header("Location: adminfinal.php?param=orders");
?>