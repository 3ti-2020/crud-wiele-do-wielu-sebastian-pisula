<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="szuk.css">
    <title>Document</title>
</head>
<body>
    <?php
        $servername = "remotemysql.com";
        $username = "w6woVkHv46";
        $password = "3RP6Qu3WOp";
        $dbname = "w6woVkHv46";
        $conn = new mysqli($servername, $username, $password, $dbname);

        $result_posty = $conn->query("SELECT * FROM blog_posty JOIN blog_posty_tagi USING(id_post) WHERE id_tag =".$_POST['szukaj-tag']);

        while($row_posty = $result_posty->fetch_assoc()){
            echo(
                "<div class='post'>
                <h3 class='tytul'>".$row_posty['tytul']."</h3>
                <p>".$row_posty['tresc']."</p>
            ");

            $result_tagi = $conn->query("SELECT * FROM blog_tagi JOIN blog_posty_tagi USING(id_tag) WHERE blog_posty_tagi.id_post = ".$row_posty['id_post']);

            while($row_tagi = $result_tagi->fetch_assoc()){
                echo("
                    <form action='szukaj.php' method='post'>
                        <input type='hidden' name='szukaj-tag' value='".$row_tagi['id_tag']."'>
                        <input type='submit' value='".$row_tagi['nazwa']."'>
                    </form>
                ");
            }
            echo("</div>");
        }
    ?>
</body>
</html>

