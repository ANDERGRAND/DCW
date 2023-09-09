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
                require("dbconn.php");
                if (isset($_POST["login"]))
                {
                    $login = $_POST["login"];
                    $email = $_POST["email"];
                    $haslo = $_POST["haslo"];
                    $sql = "INSERT INTO uzytkownicy (login, haslo, email) VALUES ('$login', '" . md5($haslo) . "', '$email')";
                    $result = $conn->query($sql);
                
                    if ($result)
                    {
                        echo '
                        <div id="container">
                        <h3>Twoje konto zostało utworzone.</h3>
                        <a href="index.php"><div class="link">Kliknij tutaj, aby przejść do logowania</div></a>
                        </div>';
                    }
                    else
                    {
                        echo '<div class="form">
                        <h3>Wymagane pola są puste</h3><br/>
                        <a href="registration.php"><div class="link">Kliknij tutaj aby zarejestrować się ponownie</div></a>
                        </div>';
                    }

                } 
                else
                {
                    $conn->close();
            ?>
            <h1 class="textH">REJESTRACJA</h1>
            <div id="container">
                <form class="form" action="" method="post">
                    <input type="text" name="login" placeholder="Login" required/>
                    <input type="password" name="haslo" placeholder="hasło" required/>
                    <input type="text" name="email" placeholder="email" required/>
                    <input type="submit" name="submit" value="Zarejestruj" class="login-button">
                    <a href="index.php"><div class="link">Logowanie</div></a>
                </form>
            </div>
            <?php } ?>
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