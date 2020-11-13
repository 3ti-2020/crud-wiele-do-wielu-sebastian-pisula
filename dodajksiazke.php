<?php

    require("conn.php");

    if(!$conn->query("SELECT * FROM lib_autor WHERE name='".$_POST['name']."'")->fetch_assoc()){
        $conn->query("INSERT INTO lib_autor VALUES (null, '".$_POST['name']."')");
    }
    $id_autor = $conn->query("SELECT * FROM lib_autor WHERE name='".$_POST['name']."'")->fetch_assoc()['id_autor'];
    
    if(!$conn->query("SELECT * FROM lib_tytul WHERE tytul='".$_POST['tytul']."'")->fetch_assoc()){
        $conn->query("INSERT INTO lib_tytul VALUES (null, '".$_POST['tytul']."')");
    }
    $id_tytul = $conn->query("SELECT * FROM lib_tytul WHERE tytul='".$_POST['tytul']."'")->fetch_assoc()['id_tytul'];

    $conn->query("INSERT INTO lib_autor_tytul VALUES (null, '".$id_autor."', '".$id_tytul."')");

    $conn->close();

    header("Location: index.php");

?>