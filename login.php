<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8"/>
<title>Strona </title>
<meta name="description" content="Serwis z kosmetykami Mary Kay"/>
<meta name="keywords" content="makeup, makijaż, Mary, Kay, MaryKay, cosmetics, kosmetyki, wizaż, usta, lips, oczy, eye, podkład, fluid, policzki, cheeks, perfumy, perfumes">
<link rel="stylesheet" href="style.css" type="text/css">
<link rel="stylesheet" href="input_style.css" type="text/css">
<link rel="stylesheet" href="css/fontello.css" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Inspiration&family=Italianno&family=Tangerine:wght@400;700&family=Tiro+Kannada:ital@0;1&display=swap" rel="stylesheet">

</head>

<body>

    <div class="wrapper">
        <div class="header">
            <div class="logo">
                <img id="heart" src="img/heart.png" alt="heart" style="float: left;">
                <span id="hlogo">Mary Kay</span>
                <div style="clear: both;"></div>
            </div>
        </div>
        <div class="content2" style="border-top-left-radius:5px;border-top-right-radius:5px;height:650px;">
        <main>
            <?php
                require('dbconn.php');
                if (isset($_POST["login"]))
                {
                    $login = $_POST["login"];
                    $haslo = $_POST["haslo"];
                    
                    $sql = "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='" . md5($haslo) .  "'";
                    $result = $conn->query($sql);
                    $row=$result->fetch_assoc(); // fetch_assoc();
                    if ($result->num_rows == 1)
                    {
                        $_SESSION['zalogowany'] = true;
                        $_SESSION['login'] = $login;
                        $_SESSION['idUzytkownika'] = $row['id'];
                        unset($_SESSION['blad']);
                        $result->free_result();
                    header("Location: home.php");
                    } 
                    else
                    {
                        echo'<h1 class="textH">LOGOWANIE</h1>
                        <div id="container">
        
                            <form action="login.php" method="post" name="login">
                        
        
                            <input type="text" placeholder="login" name="login">
        
                            <input type="password" placeholder="hasło" name="haslo">
        
                            <input type="submit" value="Zaloguj się" name="submit">
                            <a href="registration.php"><div class="link">Zarejestruj się</div></a>
                            <div style="height:15px;"></div>
                            </form>';
                            $_SESSION['blad'] = '<span style="color:red;">Nieprawidłowy login lub hasło!</span>';
                            echo $_SESSION['blad'];
                        echo '</div>';
                        
                    }
                }
                else
                {
                    $conn->close();
            ?>
                <h1 class="textH">LOGOWANIE</h1>
                <div id="container">

                    <form action="login.php" method="post" name="login">
                

                    <input type="text" placeholder="login" name="login">

                    <input type="password" placeholder="hasło" name="haslo">

                    <input type="submit" value="Zaloguj się" name="submit">
                    <a href="registration.php"><div class="link">Zarejestruj się</div></a>

                    </form>
                </div>
            <?php
                }
            ?>
            </main>
        </div>
        <div class="socials">
            <div class="socialdivs">
                <div class="fb">
                    <i class="icon-facebook"></i>
                </div>
                <div class="yt">
                    <i class="icon-youtube"></i>
                </div>
                <div class="tw">
                    <i class="icon-twitter"></i>
                </div>
                <div class="gplus">
                    <i class="icon-gplus"></i>
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
        <div class="footer">
            <p>Mary Kay &copy; Dziękuję za wizytę, w razie pytań zapraszam do kontaktu</p>
        </div>
    </div>
    
    <script src="jquery-1.11.3.min.js"></script>

    <script>

        $(document).ready(function() {
        var NavY = $('.nav').offset().top;
         
        var stickyNav = function(){
        var ScrollY = $(window).scrollTop();
              
        if (ScrollY > NavY) { 
            $('.nav').addClass('sticky');
        } else {
            $('.nav').removeClass('sticky'); 
        }
        };
         
        stickyNav();
         
        $(window).scroll(function() {
            stickyNav();
        });
        });
        
    </script>

</body>



</html>