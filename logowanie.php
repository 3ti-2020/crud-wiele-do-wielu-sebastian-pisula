<?php

    session_start();

    if(!isset($_SESSION['logowanie'])){
        
        require("conn.php");

        $result = $conn->query("SELECT * FROM lib_users WHERE name='".$_POST['login']."' AND password='".$_POST['password']."'");
    
        if($result->fetch_assoc()){
            $_SESSION['logowanie'] = $_POST['login'];
        }

        $conn->close();

    }

    header("Location: index.php");

?>