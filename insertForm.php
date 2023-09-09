<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
    header("Location: index.php");
    exit();
}

// else if(($_SESSION['idUzytkownika']!=29) && ($_SESSION['login']!="admin"))
// {
//     header("Location: index.php")
// }

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
        <div class="nav">
            <ol>
                <?php
                
                if(($_SESSION['idUzytkownika']==29) && ($_SESSION['login']=="admin"))
                {
                    echo '<li><a href="insertForm.php">Zarządzanie</a></li>';
                }
                
                ?>
                <li><a href="index.php">Strona Główna</a></li>
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
        <div class="content2">
            <main>
                <div id="container" style="width:500px;">
                    <form action="insert.php" method="post" name="insert">
                        
                        <input type="file" name="obraz" placeholder="Zdjęcie"><br>
                        <input type="text" name="nazwa" placeholder="nazwa"><br>
                        <br> <textarea  name="opis" cols="50" rows="5" placeholder="Opis"></textarea> <br>
                        <input type="number" name="cena" placeholder="cena"><br>
                        <select style="width: 238px;" name="idKategorii" id="select_kat" placeholder="kategoria">
                                    <?php
                                        require_once 'dbconn.php';

                                        $zapytanie = "SELECT id, kategoria FROM kategorie;";
                                        $result = $conn->query($zapytanie);
                                        while ($row=$result->fetch_array()) {
                                            echo '<option value="' . $row[0] . '">' . $row[1] .  '</option>';
                                            }
                                        $conn->close();
                                    ?>
                                </select><br>
                        <input type="submit" value="Dodaj" name="submit">
                            <a href="home.php"><div class="link">Powrót</div></a>
                    </form>

                </div>
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



