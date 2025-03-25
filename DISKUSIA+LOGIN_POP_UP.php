<?php
    session_start();

    include "connection.php";

    if(isset($_POST["LOG_OUT"])){
        if (isset($_SESSION['username']))
        {
            unset($_SESSION['username']);
        }
        header("Refresh:0");
    }

    if(isset($_POST["submit_prispevok"])){
        $username = $_SESSION["username"];
        $username = mysqli_real_escape_string($connection, $username);
        $text = $_POST["text"];

        $query = "INSERT INTO diskusia(text, username) VALUES(\"$text\",\"$username\")";

        $result = mysqli_query($connection,$query);
    }

    if(isset($_POST["comment_submit"])){
        $username = $_SESSION["username"];
        $text = $_POST["comment_text"];
        $id = $_POST["id"];

        $query3 = "INSERT INTO komentare(id, text, username) VALUES(\"$id\",\"$text\",\"$username\")";

        $result3 = mysqli_query($connection,$query3);
    }
?>

<?php

include "connection.php";

if(isset($_POST["submit_LOGIN"])){

    $username = $_POST["username"];
    $username = mysqli_real_escape_string($connection, $username);
    $password = $_POST["password"];
    $password = mysqli_real_escape_string($connection, $password);

    if($username && $password){
        $query = "SELECT username from users WHERE username=\"$username\"";
        $result = mysqli_query($connection, $query);

        $sql = "Select * from users where username='$username'";
        $result2 = mysqli_query($connection, $sql);

            if($result->num_rows > 0){
                while($row=mysqli_fetch_assoc($result2)){
                    if (password_verify($password, $row['password'])){ 
                        $_SESSION["username"] = $username;
                    }
                }
            }
    }
}

?>

<!--__________________________________________________________________-->

<!DOCTYPE html>
<html>
<head>
    <title>Osobný web</title>
    <link rel="stylesheet" href="Štýly/Header.css">
    <link rel="stylesheet" href="Štýly/General.css">
    <link rel="stylesheet" href="Štýly/footer.css">
    <link rel="stylesheet" href="Štýly/REGISTER_LOGIN.css">
    <link rel="stylesheet" href="Štýly/dropdown_menu.css" media="all" type="text/css">
    <link rel="stylesheet" href="Štýly/DISKUSIA.css">
    <link rel="stylesheet" href="Štýly/prihlaseny_uzivatel.css" media="all" type="text/css">
    <link rel="stylesheet" href="Štýly/AdminStranka.css" media="all" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
</head>
<body>

    <img src="background/background.jpg" style="position: fixed; top: 0; z-index: -1;">

    <!--____________________LOGOUT____________________-->

        <?php
            if(isset($_SESSION["username"])){   
                echo "<div class=\"LOGOUT_LOGIN_BUTTON_DISKUSIA\">
                    <form action=\"DISKUSIA.php\" method=\"post\" class=\"LOGOUT_button\">
                        <input type=\"submit\" name=\"LOG_OUT\" value=\"LOG_OUT\">
                    </form>
                </div>";
            }
        ?>

    <!--____________________PRIDANIE_PRISPEVKU_DO_DISKUSIE____________________-->

    <?php
    if(isset($_SESSION["username"])){   
            echo "<div class=\"pridanie_prispevku\">
            <p style=\"color: white; font-size: 19px;\">TU MOZES PRIDAT PRISPEVOK DO DISKUSIE</p>
            <form action=\"DISKUSIA.php\" method=\"post\" class=\"pridanie_prispevku_container\">
                <textarea class=\"text_prispevku\" name=\"text\" placeholder=\"Napíš text\"></textarea>
                <input class=\"submit_button_prispevky\" type=\"submit\" name=\"submit_prispevok\" value=\"Pridať príspevok do diskusie\"> 
            </form>
            </div>";
        }
    ?>

    <!--____________________REGISTER/LOGIN_POP_UP____________________-->
    
    <!--_____REGISTER_____-->
    <div class="REGISTER_POP_UP" id="REGISTER_POP_UP">
        <div class="REGISTER_POP_UP_BG"></div>
        <div class="REGISTER_CONTAINER">
            <a class="close_POP_UP" onclick="REGISTRACIA_POP_UP()">X</a>
            <p class="REGISTRACIA_LOGIN_TEXT">REGISTRÁCIA</p>
            <form action="DISKUSIA+REG_POP_UP.php" method="post" class="register_form_container">
                <input type="text" name="username" placeholder="Používatelské Meno"/> <br>
                <input type="password" name="password" placeholder="Heslo"/> <br>
                <input type="submit" name="submit_REGISTER">
                <div id="REGISTRACIA_info" class="REGISTRACIA_info"></div>
	        </form>
        </div>
    </div>

    <!--_____LOGIN_____-->
    <div class="LOGIN_POP_UP_active" id="LOGIN_POP_UP_active">
        <div class="LOGIN_POP_UP_BG"></div>
        <div class="LOGIN_CONTAINER">
            <a class="close_POP_UP" onclick="LOGIN_POP_UP_from_active()">X</a>
            <p class="REGISTRACIA_LOGIN_TEXT">PRIHLASENIE</p>
            <form action="DISKUSIA+LOGIN_POP_UP.php" method="post" class="login_form_container">
                <input type="text" name="username" placeholder="Používatelské Meno"/> <br>
                <input type="password" name="password" placeholder="Heslo"/> <br>
                <input type="submit" name="submit_LOGIN">
                <div class="LOGIN_info">
                    <?php

                        include "connection.php";

                        if(isset($_POST["submit_LOGIN"])){

                            $username = $_POST["username"];
                            $username = mysqli_real_escape_string($connection, $username);
                            $password = $_POST["password"];
                            $password = mysqli_real_escape_string($connection, $password);

                            

                            if($username && $password){
                                $query = "SELECT username from users WHERE username=\"$username\"";
                                $result = mysqli_query($connection, $query);

                                $sql = "Select * from users where username='$username'";
                                $result2 = mysqli_query($connection, $sql);

                                if($result->num_rows > 0){
                                    while($row=mysqli_fetch_assoc($result2)){
                                        if (password_verify($password, $row['password'])){ 
                                            echo $username . " bol si úspešne prihlásený";
                                        }else{
                                            echo "Prihlásenie neprebehlo úspešne, skús to ešte raz";
                                        }
                                    }
                                }else{
                                    echo "Prihlásenie neprebehlo úspešne, skús to ešte raz";
                                }
                            }
                        }

                    ?>
                </div>
	        </form>
        </div>
    </div>

    <!--____________________HEADER____________________-->
    <header>
        <div class="header_container">
            <a class="INTRObutton" id="INTRObutton" href="index.php"><img src="other assets and icons/camera.png" class="photoIconHeader"></a>
            <a class="button_O_MNE" id="button_O_MNE" href="index.php#O_MNE_container">O MNE</a>
            <a class="button_VYBAVENIE" id="button_VYBAVENIE" href="index.php#VYBAVENIE_container">VYBAVENIE</a>
            <a class="button_KONTAKT" id="button_KONTAKT" href="index.php#KONTAKT_container">KONTAKT</a>
            <a class="button_PORTFOLIO" href="PORTFOLIO.php">PORTFOLIO</a>
            <a class="button_DISKUSIA">DISKUSIA</a>
            
        </div>
    </header>

    <!--____________________PRIHLASENY_UZIVATEL____________________-->

    <div class="prihlaseny_uzivatel_DISKUSIA">
        <p class="prihlaseny_text">
        <?php
            if(isset($_SESSION["username"])){
                echo "Prihlásený užívateľ " . $_SESSION["username"];
                if($_SESSION["username"] == "admin"){
                    echo "<a class=\"admin_redirect\" href=\"AdminStranka.php\">admin_stranka</a>";
                }
            }else{
                echo "Nie si prihlásený";
            }

            
        ?>
        </p>
    </div>

    <!--____________________DROPDOWN____________________-->

    <div class="dropdown_menu">
        <button onclick="dropdown()" class="dropdown_btn"><img class="dropdown_menu_icon" src="other assets and icons/dropdown_menu_icon.png"></button>
        <div class="dropdown_content" id="dropdown_content">
            <a class="INTRObutton" id="INTRObutton_dropdown" href="index.php"><img src="other assets and icons/camera.png" class="photoIconHeader"></a>
            <a class="button_O_MNE" id="button_O_MNE_dropdown" href="index.php#O_MNE_container">O MNE</a>
            <a class="button_VYBAVENIE" id="button_VYBAVENIE_dropdown" href="index.php#VYBAVENIE_container">VYBAVENIE</a>
            <a class="button_KONTAKT" id="button_KONTAKT_dropdown" href="index.php#KONTAKT_container">KONTAKT</a>
            <a class="button_PORTFOLIO" href="PORTFOLIO.php">PORTFOLIO</a>
            <a class="button_DISKUSIA">DISKUSIA</a>
        </div>
    </div>
    <!--____________________HLAVNA CAST____________________-->
    <section class="main_section_DISKUSIA">
        <div class="main_section_DISKUSIA_div" style="padding-bottom: 1000px;">
        <?php

            include "connection.php";
            $query = "SELECT id, text, username FROM diskusia";
            $result = mysqli_query($connection, $query);

            while($diskusiaUdaje = mysqli_fetch_assoc($result)){
        ?>
            <div class="majitel_prispevku"><?php print_r($diskusiaUdaje['username'])?>:</div>
            <div class="prispevok"><?php print_r($diskusiaUdaje['text'])?></div>
        <?php
                $id = $diskusiaUdaje['id'];
                $query2 = "SELECT id, text, username FROM komentare WHERE id=\"$id\"";
                $result2 = mysqli_query($connection, $query2);

        ?>
            <div class="KOMENTARE_text">KOMENTARE :</div>
        <?php

                while($komentareUdaje = mysqli_fetch_assoc($result2)){
        ?>  
                <div class="komentar_container"> 
                    <p class="komentar_majitel"><?php print_r($komentareUdaje['username'])?>:</p>
                    <p class="komentar"><?php print_r($komentareUdaje['text'])?></p>
                </div>
        <?php
                }
                
                if(isset($_SESSION["username"])){
        ?>
                    <form action="DISKUSIA.php" class="komentar_formular" method="post">
                        <input style="display: none;" name="id" value=<?php print_r($diskusiaUdaje['id'])?>>
                        <p class="komentuj_text">Komentuj na tento príspevok :</p>
                        <input type="text" name="comment_text" class="comment_textfield" placeholder="Sem napíš svoj komentár">
                        <input type="submit" name="comment_submit" value="odoslať">
                    </form>
        <?php
                }
            }
        ?>
        </div>
        <div class="blank_div"></div>
    </section>
    <!--______________________________FOOTER_______________________________-->
    <footer>
        <div class="footer_container">
            <div>Copyright &#169 2023 Tomáš Zachar</div>
        </div>
    </footer>
    <!--___________________________________________________________________-->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="JavaScript/MainJS.js"></script>
    <script src="JavaScript/dropdownJS.js"></script>
    <script src="JavaScript/REGISTER_LOGIN_POP_UP.js"></script>
</body>
</html>