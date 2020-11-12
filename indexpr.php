<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sebastian Pisula gr2</title>
</head>
<body>
    <div class="cont">
        <div class="one">
            <div class="a"></div>
            <div class="b"></div>
        </div>
        <div class="two">
            <div class="c">
            <h3>Dodaj książkę:</h3>
            <form class="form" action="insert.php" method="POST" autocomplete="off">
                <input class="placeholder" type="text" name="autor" placeholder="autor"></br>
                <input class="placeholder" type="text" name="ksiazka" placeholder="ksiazka"></br>
                <input class="button" type="submit" value="Dodaj">
            </form>
            <h3>Wypożycz Książkę:</h3>
            <form class="form" action="wypożycz.php" method="POST" autocomplete="off">
                <input class="placeholder" type="text" name="ksiazka" placeholder="ksiazka"></br>
                <input class="placeholder" type="text" name="nazwisko" placeholder="nazwisko"></br>
                <input class="button" type="submit" value="Wypożycz">
            </form>
            </div>
            <div class="d">
                <?php
                   $servername="remotemysql.com";
                   $username="w6woVkHv46";
                   $password="3RP6Qu3WOp";
                   $dbname="w6woVkHv46";

                

                    $conn= new mysqli($servername,$username,$password,$dbname);
                    $conn->set_charset("utf8");
                    $result = $conn->query("SELECT * FROM `klienci`");

                    echo("<table class='table'>");
                    echo("<tr>
                    <th>id</th>
                    <th>autor</th>
                    <th>książka</th>
                    <th>Usuń</th>
                    </tr>");

                    while($row=$result->fetch_assoc()){
                        echo("<tr>");
                        echo("<td>".$row['id']."</td>");
                        echo("<td>".$row['autor']."</td>");
                        echo("<td>".$row['ksiazka']."</td>");
                        echo("<td class='td'>  <form class='form' action='delete.php' method='POST'>
                        <input class='text' type='hidden'  name='id' value='$row[id]' placeholder='id'></br>
                     <input class='button_del' type='submit' value='Usun'> </td>");
                        echo("</tr>");
                      };
                     echo("</table>");

                     echo("<br/><br/>");

                    $result = $conn->query("SELECT * FROM `wypozyczenia`");

                    echo("<table class='table'>");
                    echo("<tr>
                    <th>książka</th>
                    <th>nazwisko</th>
                    <th>data_wyp</th>
                    <th>data_odd</th>
                    </tr>");

                    while($wiersz=$result->fetch_assoc()){
                        echo("<tr>");
                        echo("<td>".$wiersz['ksiazka']."</td>");
                        echo("<td>".$wiersz['nazwisko']."</td>");
                        echo("<td>".$wiersz['data_wyp']."</td>");
                        echo("<td>".$wiersz['data_odd']."</td>");
       
                        echo("</tr>");
                       };
                    echo("</table>");
                    
                ?>
            </div>
        </div>
    </div>
</body>
</html>