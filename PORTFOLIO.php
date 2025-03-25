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
    <title>Osobný web</title>
    <link rel="stylesheet" href="Štýly/Header.css">
    <link rel="stylesheet" href="Štýly/General.css">
    <link rel="stylesheet" href="Štýly/MainSection.css">
    <link rel="stylesheet" href="Štýly/footer.css">
    <link rel="stylesheet" href="Štýly/PORTFOLIO.css">
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
            <a class="INTRObutton" id="INTRObutton" href="index.php"><img src="other assets and icons/camera.png" class="photoIconHeader"></a>
            <a class="button_O_MNE" id="button_O_MNE" href="index.php#O_MNE_container">O MNE</a>
            <a class="button_VYBAVENIE" id="button_VYBAVENIE" href="index.php#VYBAVENIE_container">VYBAVENIE</a>
            <a class="button_KONTAKT" id="button_KONTAKT" href="index.php#KONTAKT_container">KONTAKT</a>
            <a class="button_PORTFOLIO">PORTFOLIO</a>
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
            <a class="INTRObutton" id="INTRObutton_dropdown" href="index.php"><img src="other assets and icons/camera.png" class="photoIconHeader"></a>
            <a class="button_O_MNE" id="button_O_MNE_dropdown" href="index.php#O_MNE_container">O MNE</a>
            <a class="button_VYBAVENIE" id="button_VYBAVENIE_dropdown" href="index.php#VYBAVENIE_container">VYBAVENIE</a>
            <a class="button_KONTAKT" id="button_KONTAKT_dropdown" href="index.php#KONTAKT_container">KONTAKT</a>
            <a class="button_PORTFOLIO">PORTFOLIO</a>
            <a class="button_DISKUSIA" href="DISKUSIA.php">DISKUSIA</a>
        </div>
    </div>
    <!--____________________HLAVNA CAST____________________-->
    <section class="main_section">
        <div class="main_section_div_PORTFOLIO">
            <div class="nadpis_PORTFOLIO">MOJE PORTFOLIO FOTIEK</div>
            <div class="fotky_grid">
                <?php
                    include "connection.php";
                    $query = " SELECT filename FROM portfolio";
                    $result = mysqli_query($connection, $query);

                    while($nazov = mysqli_fetch_assoc($result)){
                ?>
                    <div style="display: flex; justify-content: center;">
                    <img class="fotka" src="MojeFotky/<?php print_r($nazov['filename']);?>">
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
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
</body>
</html>