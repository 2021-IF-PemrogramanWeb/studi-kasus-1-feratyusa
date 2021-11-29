<?php  

    require_once "config.php";

    // Check user login
    $user = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $password_hash = "";
    $nama = "";

    $stmt = $conn->prepare('SELECT username, password, nama FROM users WHERE username = ?');
    $stmt->bind_param('s', $user); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->bind_result($username, $password_hash, $nama);
    $stmt->store_result();

    if($stmt->num_rows == 1){
        // Fetch the rows
        if($stmt->fetch()){
            if(password_verify($password, $password_hash)){
                // Start Session
                session_start();
                $_SESSION["nama"] = $nama;
                $_SESSION["login"] = true;
                header("location: index.php");
                exit;
            }
            else{
                echo $password_hash;
                header("location: login.php?status=login-failed");
                exit;
            }
        }
        else{
            header("location: login.php?status=login-failed");
            exit;
        }
    }
    else{
        header("location: login.php?status=login-failed");
        exit;
    }

?>