<?php

// $db_name = "id17884788_db_mahasiswa";
// $db_username = "id17884788_studikasus1";
// $db_password = "EePBuhK0Hj164bhc";

$db_servername = "localhost";
$db_name = "db_mahasiswa";
$db_username = "root";
$db_password = "";

// Create connection
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    header("location: login.php?status=connection_failed");
    exit;
}

?>