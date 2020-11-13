<?php

    require("conn.php");

    $conn->query("DELETE FROM lib_users WHERE id_user='".$_POST['uzytkownik']."'");

    $conn->close();

    header("Location: index.php");

?>