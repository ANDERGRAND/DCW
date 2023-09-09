<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8"/>
<title>Strona </title>
<meta name="description" content="Serwis z kosmetykami Mary Kay"/>
<meta name="keywords" content="makeup, makijaż, Mary, Kay, MaryKay, cosmetics, kosmetyki, wizaż, usta, lips, oczy, eye, podkład, fluid, policzki, cheeks, perfumy, perfumes">
<link rel="stylesheet" href="style.css" type="text/css">
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
        <div class="nav">
            <ol>
                <li><a href="home.php">Strona Główna</a></li>
                <li><a href="care.php">Pielęgnacja</a>
                    <ul>
                        <li><a href="care_eye.php">Pod oczy</a></li>
                        <li><a href="care_cleansing.php">Oczyszczające</a></li>
                        <li><a href="care_mask.php">Maseczki</a></li>
                        <li><a href="care_serum.php">Serum</a></li>
                    </ul>
                </li>
                <li><a href="makeup.php">Makijaż</a>
                    <ul>
                        <li><a href="makeup_face.php">Twarz</a></li>
                        <li><a href="makeup_eye.php">Oczy</a></li>
                        <li><a href="makeup_lips.php">Usta</a></li>
                        <li><a href="makeup_accessories.php">Akcesoria</a></li>
                    </ul>
                </li>
                <li><a href="scents.php">Zapachy</a>
                    <ul>
                        <li><a href="scents_men.php">Męskie</a></li>
                        <li><a href="scents_women.php">Damskie</a></li>
                        <li><a href="scents_unisex.php">Unisex</a></li>
                    </ul>
                </li>
                <li><a href="body.php">Ciało</a>
                    <ul>
                        <li><a href="body_moisturizing.php">Nawilżające</a></li>
                        <li><a href="body_washing.php">Myjące</a></li>
                        <li><a href="body_exfoliating.php">Złuszczające</a></li>
                        <li><a href="body_sunshades.php">Przeciwsłoneczne</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Kontakt</a></li>
                <li><a href="logout.php">Wyloguj się</a></li>
            </ol>
        </div>
        <div class="content">
            <main>
                
                
                <?php
                    require_once "dbconn.php";
                    $sql = "SELECT * FROM produkty WHERE idKategorii=20";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0)
                    {
                        while ($row=$result->fetch_array())
                        {
                            $_SESSION['id'] = $row['id'];
                            $id = $row['id'];
                            $_SESSION['obraz'] = $row['obraz'];
                            $_SESSION['nazwa'] = $row['nazwa'];
                            $_SESSION['opis'] = $row['opis'];
                            $_SESSION['cena'] = $row['cena'];
                            $_SESSION['idKategorii'] = $row['idKategorii'];
                            echo '<a href="details.php?id='.$id.'&b=scents_unisex">';
                            echo '<div class="slot">';
                            echo '<img class="image" src="img/products/'.$_SESSION["obraz"].'" alt="">';
                            echo '<div class="sign">';
                            echo '<p>'.$_SESSION["nazwa"].'</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                        }
                            
                    }
                    else
                    {
                        echo "error";
                    }
                    $result->free_result();
                    $conn->close();
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