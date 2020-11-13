<?php

    session_start();

    require("conn.php");

    $conn->query("INSERT INTO lib_wypozyczenia VALUES (null, (SELECT id_user FROM lib_users WHERE name='".$_SESSION['logowanie']."'), '".$_POST['ksiazka']."', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY))");

    $conn->close();

    header("Location: index.php");

?>