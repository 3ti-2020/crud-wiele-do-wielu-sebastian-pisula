<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<div class="cont">
        <div class="one div">
            <div class="one1">

            </div>
            <div class="one2">
                    <h1>Tytuł</h1>
            </div>
            <div class="one3">
                     

            </div>


        </div>

        <div class="two div">
            <div class="two1">
            
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "spr";

            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn->set_charset("utf8");
            $result = $conn->query("SELECT * FROM `city` WHERE CountryCode = 'POL' LIMIT 10");
            echo("<table>");
            echo("<tr>
            <th>nazwa</th>
            </tr>");
            while($row=$result->fetch_assoc()){
                echo("<tr>");
                echo("<td>".$row['Name']."</td>");
                echo("</tr>");
            }
            echo("</table>");
            
                
            ?>
            </div>
            <div class="two2">
                <div class="a1">
                    <a href="index.php">link1</a>
                </div>
                <div class="a2">
                    <a href="index2.php">link2</a>    
                </div>
                <div class="a3">
                    <a href="index3.php">link3</a>    
                </div>
                <div class="a3">
                    <a href="index4.php">link4</a>    
                </div>
           
            </div>

            

    </div>

        

        


    </div>
    
</body>
</html>