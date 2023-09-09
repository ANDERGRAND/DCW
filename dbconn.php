<?php
$conn = @new mysqli("localhost", "root", "", "beauty");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>