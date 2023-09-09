<?php
session_start();
require_once "dbconn.php";
    $id = $_GET["id"];
    $query = "DELETE FROM produkty WHERE id=$id;";
    $conn->query($query);
    $conn->close();
    header("Location: home.php");
?>