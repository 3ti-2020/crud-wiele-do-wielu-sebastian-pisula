<?php

    require("conn.php");

    $conn->query("DELETE FROM lib_autor_tytul WHERE id_autor_tytul='".$_POST['ksiazka']."'");

    $conn->close();

    header("Location: index.php");

?>