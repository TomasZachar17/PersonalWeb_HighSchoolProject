<?php
    session_start();

    if(isset($_POST["LOG_OUT"])){
        if (isset($_SESSION['username']))
        {
            unset($_SESSION['username']);
        }
        header("Refresh:0");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tomáš Zachar</title>
    <link rel="stylesheet" href="Štýly/Header.css" media="all" type="text/css">
    <link rel="stylesheet" href="Štýly/General.css" media="all" type="text/css">
    <link rel="stylesheet" href="Štýly/MainSection.css" media="all" type="text/css">
    <link rel="stylesheet" href="Štýly/footer.css" media="all" type="text/css">
    <link rel="stylesheet" href="Štýly/INTRO.css" media="all" type="text/css">
    <link rel="stylesheet" href="Štýly/dropdown_menu.css" media="all" type="text/css">
    <link rel="stylesheet" href="Štýly/prihlaseny_uzivatel.css" media="all" type="text/css">
    <link rel="stylesheet" href="Štýly/AdminStranka.css" media="all" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
</head>
<body>
    <img src="background/background.jpg" style="position: fixed; top: 0; z-index: -1;">

    <!--____________________HEADER____________________-->
    <header>
        <div class="header_container">
            <a class="INTRObutton" id="INTRObutton"><img src="other assets and icons/camera.png" class="photoIconHeader"></a>
            <a class="button_O_MNE" id="button_O_MNE">O MNE</a>
            <a class="button_VYBAVENIE" id="button_VYBAVENIE">VYBAVENIE</a>
            <a class="button_KONTAKT" id="button_KONTAKT">KONTAKT</a>
            <a class="button_PORTFOLIO" href="PORTFOLIO.php">PORTFOLIO</a>
            <a class="button_DISKUSIA" href="DISKUSIA.php">DISKUSIA</a>
        </div>
    </header>
    <!--____________________PRIHLASENY_UZIVATEL____________________-->

    <div class="prihlaseny_uzivatel" id="prihlaseny_uzivatel">
        <p class="prihlaseny_text">
        <?php
            if(isset($_SESSION["username"])){
                echo "Prihlásený užívateľ " . $_SESSION["username"];
            }else{
                echo "Nie si prihlásený";
            }
        ?>
        </p>
    
        <?php

            if(isset($_SESSION["username"])){   
                echo "<div class=\"LOGOUT_LOGIN_BUTTON\">
                    <form action=\"\" method=\"post\">
                        <input type=\"submit\" name=\"LOG_OUT\" value=\"LOG_OUT\">
                    </form>
                </div>";
            }else{
                echo"<div class=\"LOGOUT_LOGIN_BUTTON\">
                    <form action=\"DISKUSIA+LOGIN_POP_UP.php\" method=\"post\">
                        <input type=\"submit\" name=\"LOG_IN\" value=\"LOG_IN\">
                    </form>
                </div>";
                echo"<div class=\"REGISTER_BUTTON\">
                    <form action=\"DISKUSIA+REG_POP_UP.php\" method=\"post\">
                        <input type=\"submit\" name=\"REGISTER\" value=\"REGISTER\">
                    </form>
                </div>";
            }
        ?>
    </div>
    
    <?php

        if(isset($_SESSION["username"])){   
            if($_SESSION["username"] == "admin"){
                echo "<a class=\"admin_redirect\" href=\"AdminStranka.php\">admin_stranka</a>";
            }
        }
    ?>
    
    <!--____________________DROPDOWN____________________-->

    <div class="dropdown_menu">
        <button onclick="dropdown()" class="dropdown_btn"><img class="dropdown_menu_icon" src="other assets and icons/dropdown_menu_icon.png"></button>
        <div class="dropdown_content" id="dropdown_content">
            <a class="INTRObutton" id="INTRObutton_dropdown"><img src="other assets and icons/camera.png" class="photoIconHeader"></a>
            <a class="button_O_MNE" id="button_O_MNE_dropdown">O MNE</a>
            <a class="button_VYBAVENIE" id="button_VYBAVENIE_dropdown">VYBAVENIE</a>
            <a class="button_KONTAKT" id="button_KONTAKT_dropdown">KONTAKT</a>
            <a class="button_PORTFOLIO" href="PORTFOLIO.php">PORTFOLIO</a>
            <a class="button_DISKUSIA" href="DISKUSIA.php">DISKUSIA</a>
        </div>
    </div>

    <!--__________________________INTRO_________________________-->

    <div class="INTRO_container">
        <div class="INTRO">
            <img src="other assets and icons/camera.png" class="photoIcon">
            <p class="meno">Tomáš Zachar</p>
            <p class="povolanie">Fotograf</p>
        </div>
    </div>

    <!--____________________HLAVNA CAST____________________-->
    <section class="main_section">
        <div class="main_section_div">
            <div class="O_MNE_container" id="O_MNE_container">
                <div class="O_MNE_nadpis">O MNE</div>
                <div class="O_MNE_text">Vítam vás na mojej stránke, volám sa Tomáš Zachar, a som fotograf. Fotím už skoro 2 roky a mojou špecialitou sú portréty a “lifestyle” fotografie.</div>
                <div class="O_MNE_text">Fotím hlavne preto, lebo rád zachytávam špeciálne momenty a rád odovzdávam luďom ich fotky, na ktorých sa cítia že vyzerajú dobre.</div>
                <div class="O_MNE_text">Taktiež fotím rôzne akcie ako napríklad plesy alebo stužkové slávnosti.</div>
                <div class="O_MNE_text">Baví ma taktiež strana fotenia o ktorej sa menej hovorí a to je úprava fotiek, berem to ako formu umenia a baví ma sa v tom rozvíjať a učiť sa nové techniky.</div>
            </div>
            <div style="padding-bottom: 50px; background-color: lightgrey;"></div>
            <div class="VYBAVENIE_container" id="VYBAVENIE_container">
                <div class="VYBAVENIE_nadpis">VYBAVENIE</div>
                <div class="VYBAVENIE_text">Fotoaparát - Sony Alpha 6400</div>
                <div class="VYBAVENIE_text">Objektív - Sony E-mount 50mm AF</div>
                <div class="VYBAVENIE_text">SD karta -  Lexar Professional 64gb 250 MB/s</div>
                <div class="VYBAVENIE_text">Program na úpravu fotik - Adobe Lightroom</div>
            </div>
            <div style="display: flex; justify-content: space-between; padding-left: 20px; padding-right: 20px; margin-bottom: 50px;">
                <img src="other assets and icons/fotak.jpg" style="height: 150px;">
                <img src="other assets and icons/objektiv.jpg" style="height: 150px;">
                <img src="other assets and icons/SDkarta.webp" style="height: 150px;">
                <img src="other assets and icons/LightRoom.png" style="height: 150px;">
            </div>
            <div style="padding-bottom: 50px; background-color: lightgrey;"></div>
            <div class="KONTAKT_container" id="KONTAKT_container">
                <div class="KONTAKT_nadpis">KONTAKT NA MŇA</div>
                <div class="KONTAKT_text">e-mail : tomas.zachar.hockey@gmail.com</div>
                <div class="KONTAKT_text">tel. číslo : +421 948 088 485</div>
            </div>
            
        </div>
    </section>

    <!--______________________________FOOTER_______________________________-->

    <footer>
        <div class="footer_container">
            <div>Copyright &#169 2023 Tomáš Zachar</div>
        </div>
    </footer>

    <!--________________________________________________________________-->  
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>  
    <script src="JavaScript/MainJS.js"></script>
    <script src="JavaScript/dropdownJS.js"></script>
</body>
</html>