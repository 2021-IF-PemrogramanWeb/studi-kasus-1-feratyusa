<?php

require_once "config.php";

// Get post submit data
$nama = $_POST["nama"];
$username = $_POST["username"];
$password = $_POST["password"];
$confirm_pass = $_POST["confirm-pass"];

// Validate username
$sql_username = "SELECT username FROM users WHERE username='$username'";
if($result = $conn->query($sql_username)){
    if($result->num_rows > 0){
        header("location: register.php?status=username-exist");
        $conn->close();
        exit;
    }
}

// Validate Password
if($password != $confirm_pass){
    header("location: register.php?status=confirm-pass-error");
    $conn->close();
    exit;
}

// Insert into database and hash the password
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$insert_sql = "INSERT INTO users VALUES ('$username', '$password_hash', '$nama')";
if($result = $conn->query($insert_sql)){

    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["login"] = true;
    header("location: index.php?user=$username");

}
else{
    header("location: login.php?status=error");
    $conn->close();
    exit;
}

?>
