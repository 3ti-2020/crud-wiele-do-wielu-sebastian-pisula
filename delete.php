<?php
    $servername="remotemysql.com";
    $username="w6woVkHv46";
    $password="3RP6Qu3WOp";
    $dbname="w6woVkHv46";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $id=$_POST['id'];

    $result = "DELETE FROM `klienci` WHERE id=$id";

    mysqli_query($conn, $result);

    $conn->close();

    header("Location:indexpr.php");
?>    