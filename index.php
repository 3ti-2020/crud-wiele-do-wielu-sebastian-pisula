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
    <div class="one"></div>
    <div class="two">
        <?php
         
         //<------------------------------table1----------------------->//
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "spr";

          $conn = new mysqli($servername, $username, $password, $dbname);
          $conn->set_charset("utf8");
          $result = $conn->query("SELECT * FROM country WHERE Capital>1000 LIMIT 30");

          echo("<table>");
          echo("<tr>
          <th>Kapitał<th>
          <th>Państwo<th>
          </tr>");
          
          while($row=$result->fetch_assoc()){
              echo("<tr>");
              echo("<td>".$row['Capital']."</td><td>".$row['Name']."</td>");
              echo("</tr>");
          }
          
          echo("</table>");


          //<------------------------------table2----------------------->//
          

            
        ?>
    </div>
    <div class="three"></div>
</div>
    
</body>
</html>