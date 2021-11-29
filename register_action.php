<?php

// Get post submit data
$nama = trim($_POST["nama"]);
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
$confirm_pass = trim($_POST["confirm-pass"]);

// Validate input and Check length
if(strlen($nama) > 50 || strlen($nama) < 1 || !ctype_alnum($nama)){
    header("location: register.php?status=invalid-name");
    exit;
}
if(strlen($username) > 20 || strlen($username) < 1 || !ctype_alnum($nama)){
    header("location: register.php?status=invalid-username");
    exit;
}
if(strlen($password) > 20 || strlen($password) < 8){
    header("location: register.php?status=invalid-password");
    exit;
}

require_once "config.php";

// // Validate username
$stmt = $conn->prepare('SELECT username FROM users WHERE username = ?');
$stmt->bind_param('s', $user); // 's' specifies the variable type => 'string'
$stmt->execute();
$stmt->bind_result($username);
$stmt->store_result();

if($stmt->num_rows > 1){
    header("location: register.php?status=username-exist");
    $conn->close();
    exit;
}

$stmt->close();

// Validate Password
if($password != $confirm_pass){
    header("location: register.php?status=confirm-pass-error");
    $conn->close();
    exit;
}

// Insert into database and hash the password
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare('INSERT INTO users VALUES (?, ?, ?)');
$stmt->bind_param('sss', $username, $password_hash, $nama); // 's' specifies the variable type => 'string'
$stmt->execute();

if($stmt->affected_rows == 1){

    session_start();
    $_SESSION["nama"] = $nama;
    $_SESSION["login"] = true;
    header("location: index.php");

}
else{
    header("location: register.php?status=error");
    $conn->close();
    exit;
}

?>
