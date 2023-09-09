<?php
session_start();
require("dbconn.php");

$idUzytkownika = $_SESSION["idUzytkownika"];
$idProduktu = $_SESSION["idProduktu"];

$sql="SELECT id FROM ulubione WHERE idProduktu=$idProduktu AND idUzytkownika=$idUzytkownika";
$dodaj="INSERT INTO ulubione (idProduktu, idUzytkownika) VALUES ( $idProduktu, $idUzytkownika)";

$result=$conn->query($sql);

if($result->num_rows < 1){
    $conn->query($dodaj);
    echo "1";
}
else{
    
$row=$result->fetch_object();
$usun="DELETE FROM ulubione WHERE id=$row->id;";
    $conn->query($usun);
    echo "0";
}
    
    
$conn->close();
?>