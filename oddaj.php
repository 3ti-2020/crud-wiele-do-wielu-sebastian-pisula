<?php

    session_start();

    require("conn.php");

    $conn->query("DELETE FROM lib_wypozyczenia WHERE id_wypozyczenia='".$_POST['wypozyczenie']."' AND id_user=(SELECT id_user FROM lib_users WHERE name='".$_SESSION['logowanie']."')");

    $conn->close();
    
    header("Location: index.php");

?>