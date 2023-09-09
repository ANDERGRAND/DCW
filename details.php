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
<meta name="keywords" content="makeup, makijaż, Mary, Kay, MaryKay, cosmetics, kosmetyki, wizaż, usta, lips, lipstick, cream, mask, eyebrow, lashes, oczy, eye, podkład, fluid, policzki, cheeks, perfumy, perfumes">
<link rel="stylesheet" href="style.css" type="text/css">
<link rel="stylesheet" href="css/fontello.css" type="text/css">
<script src="details.js" type="text/javascript"></script>
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
        <div class="detcontent">
            <main>
            <?php
                    require_once "dbconn.php";
                    $id = $_GET['id'];
                    $_SESSION['idProduktu'] = $_GET['id'];
                    $b = $_GET['b'];
                    $zapytanie = "SELECT * FROM produkty WHERE id = $id";
                    $result = $conn->query($zapytanie);
                    if ($result->num_rows > 0)
                    {
                        $row=$result->fetch_array();
                        
                            $_SESSION['obraz'] = $row['obraz'];
                            $_SESSION['nazwa'] = $row['nazwa'];
                            $_SESSION['opis'] = $row['opis'];
                            $_SESSION['cena'] = $row['cena'];
                            $_SESSION['idKategorii'] = $row['idKategorii'];
                            $idUzytkownika = $_SESSION['idUzytkownika'];
                            
                                $sql = "SELECT id FROM ulubione WHERE idProduktu=$id AND idUzytkownika = $idUzytkownika";
                                $added = $conn->query($sql)->num_rows > 0;                  
                                $text = $added ? "1" : "0";
                               
                            echo '<div class="square">';
                                echo '<div class="photo">';
                                    echo '<img class="image" style="height:360px;width:300px;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;" src="img/products/'.$_SESSION["obraz"].'" alt="">';
                                echo '</div>';
                                echo '<div id="favourite">';
                                    echo '<img id="fav" item-data="$id" src="img/favourite/fav'.$text.'.png">';
                                echo '</div>';
                                if(($_SESSION['idUzytkownika']==29) && ($_SESSION['login']=="admin"))
                                    {
                                        echo '<div class="option" style="width=200px;">';
                                        echo '<a href="updateForm.php?id='.$id.'"><div class="link">Edytuj produkt</div></a>';
                                        echo '</div>';
                                        echo '<div class="option" style="width=200px;">';
                                        echo '<a href="delete.php?id='.$id.'"><div class="link">Usuń produkt</div></a>';
                                        echo '</div>';
                                    }
                            echo '</div>';

                        
                            echo '<div class="description">';
                                echo '<div class="property">';
                                    echo '<p>'.$_SESSION["nazwa"].'</p>';
                                echo '</div>';
                                echo '<div class="property" style="text-align: start; letter-spacing: 1px; line-height:150%;">';
                                    echo '<p>'.$_SESSION["opis"].'</p>';
                                echo '</div>';
                                echo '<div class="property">';
                                    echo '<p>Cena: '.$_SESSION["cena"].' zł</p>';
                                echo '</div>';
                                echo '<div class="back">';
                                    echo '<a href="'.$b.'.php"><p> POWRÓT </p></a>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="clear"></div>';


                        
                            $result->free_result();
                            $conn->close();
                    }
                    else
                    {
                        echo "error";
                    }
                ?>
                <script src="https://code.jquery.com/jquery-latest.min.js"></script>
                <script src="script.js"></script>
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