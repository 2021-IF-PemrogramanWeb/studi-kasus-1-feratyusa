<?php

$db_servername = "localhost";
$db_name = "id17884788_db_mahasiswa";
$db_username = "id17884788_studikasus1";
$db_password = "4l115_r4hm4S";

// Create connection
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    header("location: login.html?status=connection_failed");
    exit;
}

?>