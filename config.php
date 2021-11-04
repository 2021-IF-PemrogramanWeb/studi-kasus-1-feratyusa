<?php

$db_servername = "localhost";
$db_username = "id17884126_studikasus1";
$db_password = "4l115_r4hm4S";
$db_name = "id17884126_db_mahasiswa";

// Create connection
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    header("location: login.html?status=connection_failed");
    exit;
}

?>