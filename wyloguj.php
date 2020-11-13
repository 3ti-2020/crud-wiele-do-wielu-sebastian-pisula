<?php

    session_start();

    $_SESSION['logowanie'] = null;

    header("Location: index.php");

?>