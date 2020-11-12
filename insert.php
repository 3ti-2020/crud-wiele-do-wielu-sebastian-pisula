<?php
        $servername="remotemysql.com";
        $username="w6woVkHv46";
        $password="3RP6Qu3WOp";
        $dbname="w6woVkHv46";
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        $autor = $_POST['autor'];
        $ksiazka = $_POST['ksiazka'];
        
        $result = "INSERT INTO `klienci`(`id`, `autor`, `ksiazka`) VALUES (NULL, $autor, $ksiazka);"

        mysqli_query($conn, $result);

        $conn->close();

        header('Location:indexpr.php');
?>