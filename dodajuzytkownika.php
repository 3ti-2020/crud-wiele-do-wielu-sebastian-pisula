<?php

    require("conn.php");

    if(!$conn->query("SELECT * FROM lib_users WHERE name='".$_POST['name']."'")->fetch_assoc()){
        $conn->query("INSERT INTO lib_users VALUES (null, '".$_POST['name']."', '".$_POST['password']."', 0)");
    }

    $conn->close();

    header("Location: index.php");


?>