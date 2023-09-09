<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
    header("Location: index.php");
    exit();
}

?>
<?php
require_once "dbconn.php";
$idKat = $_POST["idKategorii"];
$obraz = basename($_FILES["obraz"]["name"]);
$nazwa = $_POST["nazwa"];
$opis = $_POST["opis"];
$cena = $_POST["cena"];


move_uploaded_file($_FILES["obraz"]["tmp_name"], "img/products/" . $obraz);
$zapytanie="INSERT INTO produkty (obraz, nazwa, opis, cena, idKategorii) VALUES
            ('$obraz', '$nazwa', '$opis', '$cena', '$idKat')";
$conn->query($zapytanie);

$conn->close();
header("Location: care.php");
?>