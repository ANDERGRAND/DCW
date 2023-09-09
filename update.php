<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
    header("Location: index.php");
    exit();
}
// if(($_SESSION['idUzytkownika']!=29) && ($_SESSION['login']!="admin"))
// {
//     header("Location: index.php")
// }
?>
<?php
require_once "dbconn.php";
$id = $_GET['id'];
$idKat = $_POST["idKategorii"];
$obraz = basename($_FILES["obraz"]["name"]);
$nazwa = $_POST["nazwa"];
$opis = $_POST["opis"];
$cena = $_POST["cena"];


move_uploaded_file($_FILES["obraz"]["tmp_name"], "img/products/" . $obraz);
$zapytanie="UPDATE produkty SET obraz='$obraz', nazwa='$nazwa', opis='$opis', cena='$cena' WHERE id='$id';";
$conn->query($zapytanie);

$conn->close();
header("Location: care.php");
?>