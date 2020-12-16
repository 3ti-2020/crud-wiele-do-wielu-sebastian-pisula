<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sebastian Pisula gr2</title>
</head>
<body>

    <header class="header">
    <a href="index.html">Egzamin EE.09</a>
    <a href="blog.php">Blog</a>    
    <?php
        if(isset($_SESSION['logowanie'])){
            echo("<h1>ZALOGOWANO</h1>
            <a href='wyloguj.php'>Wyloguj</a>");
        }
    ?>

    </header>

    <nav class="nav">

        <a href="https://github.com/3ti-2020/crud-wiele-do-wielu-sebastian-pisula"><img src="github.png" class="github"></a>

        <?php
        
        if(!isset($_SESSION['logowanie'])){
            echo('<form class="logowanie" action="logowanie.php" method="POST">
        
            admin a<br>

            Login: <input type="text" name="login" required><br>
            Hasło: <input type="password" name="password" required><br>

            <input type="submit" value="zaloguj">

            </form>');
        }else{

            require("conn.php");

            if($conn->query("SELECT * FROM lib_users WHERE name='".$_SESSION['logowanie']."' AND admin='1'")->fetch_assoc()){

                echo("<form action='dodajuzytkownika.php' method='POST'>
                
                Nazwa użytkownika: <input type='text' name='name'><br>
                Hasło użytkownika: <input type='password' name='password'><br>
                <input type='submit' value='Dodaj użytkownika'>
                
                </form>
                <form action='dodajksiazke.php' method='POST'>
                
                Autor: <input type='text' name='name'><br>
                Tytuł: <input type='text' name='tytul'><br>
                <input type='submit' value='Dodaj książkę'>
                
                </form>");
            }

            echo('<form action="wypozycz.php" method="POST">
            Wybierz książkę: <select name="ksiazka">');
            
            $result = $conn->query("SELECT * FROM lib_autor_tytul, lib_autor, lib_tytul WHERE lib_autor_tytul.id_autor=lib_autor.id_autor AND lib_autor_tytul.id_tytul=lib_tytul.id_tytul");

            while($wiersz = $result->fetch_assoc()){
                echo("<option value='".$wiersz['id_autor_tytul']."'>".$wiersz['name']." ".$wiersz['tytul']."</option>");
            }

            echo('</select><br>
            <input type="submit" value="Wypożycz">
            </form>');

        }

        ?>

    </nav>

    <main class="main">

        <?php

            require("conn.php");
    
            if(isset($_SESSION['logowanie'])){

                $result = $conn->query("SELECT lib_autor.name, lib_tytul.tytul, lib_wypozyczenia.data_wypozyczenia, lib_wypozyczenia.data_oddania, id_wypozyczenia FROM lib_wypozyczenia, lib_users, lib_tytul, lib_autor, lib_autor_tytul WHERE lib_wypozyczenia.id_user=lib_users.id_user AND lib_wypozyczenia.id_autor_tytul=lib_autor_tytul.id_autor_tytul AND lib_autor_tytul.id_autor=lib_autor.id_autor AND lib_autor_tytul.id_tytul=lib_tytul.id_tytul AND lib_users.name='".$_SESSION['logowanie']."'");

                echo("<table class='table'>
                <tr><th class='komorka'>Autor</th><th class='komorka'>Tytuł</th><th class='komorka'>Data wypożyczenia</th><th class='komorka'>Data oddania</th><th class='komorka'>Oddaj</th></tr>");

                while($wiersz = $result->fetch_assoc()){
                    echo("<tr><td class='komorka'>".$wiersz['name']."</td><td class='komorka'>".$wiersz['tytul']."</td><td class='komorka'>".$wiersz['data_wypozyczenia']."</td><td class='komorka'>".$wiersz['data_oddania']."</td><td class='komorka'>
                    
                    <form action='oddaj.php' method='POST'>
                        <input type='hidden' name='wypozyczenie' value='".$wiersz['id_wypozyczenia']."'>
                        <input type='submit' value='Oddaj'>
                    </form>
                    
                    </td></tr>");
                }

                echo("</table>");


                if($conn->query("SELECT * FROM lib_users WHERE name='".$_SESSION['logowanie']."' AND admin='1'")->fetch_assoc()){

                    $result = $conn->query("SELECT * FROM lib_autor_tytul, lib_autor, lib_tytul WHERE lib_autor_tytul.id_autor=lib_autor.id_autor AND lib_autor_tytul.id_tytul=lib_tytul.id_tytul");

                    echo("<table class='table'
                    <tr><th class='komorka'>Autor</th><th class='komorka'>Tytuł</th><th class='komorka'>Usuwanie</th></tr>");

                    while($wiersz = $result->fetch_assoc()){
                        echo("<tr><td class='komorka'>".$wiersz['name']."</td><td class='komorka'>".$wiersz['tytul']."</td><td class='komorka'>
                        
                        <form action='usunksiazke.php' method='POST'>
                            <input type='hidden' name='ksiazka' value='".$wiersz['id_autor_tytul']."'>
                            <input type='submit' value='Usuń'>
                        </form>
                        
                        </td></tr>");
                    }
                    echo("</table>");

                    $result = $conn->query("SELECT * FROM lib_users");

                    echo("<table class='table'
                    <tr><th class='komorka'>Użytkownik</th><th class='komorka'>Usuwanie</th></tr>");

                    while($wiersz = $result->fetch_assoc()){
                        echo("<tr><td class='komorka'>".$wiersz['name']."</td><td class='komorka'>
                        
                        <form action='usunuzytkownika.php' method='POST'>
                            <input type='hidden' name='uzytkownik' value='".$wiersz['id_user']."'>
                            <input type='submit' value='Usuń'>
                        </form>
                        
                        </td></tr>");
                    }
                    echo("</table>");
                    
                }

            }else{
                $result = $conn->query("SELECT * FROM lib_autor_tytul, lib_autor, lib_tytul WHERE lib_autor_tytul.id_autor=lib_autor.id_autor AND lib_autor_tytul.id_tytul=lib_tytul.id_tytul");

                echo("<table class='table'>
                <tr><th class='komorka'>Autor</th><th class='komorka'>Ksiazka</th>");

                while($wiersz = $result->fetch_assoc()){
                    echo("<tr><td class='komorka'>".$wiersz['name']."</td><td class='komorka'>".$wiersz['tytul']."</td></tr>");
                }

                echo("</table>");
            }

            $conn->close();

        ?>

    </main>

</body>
</html>
