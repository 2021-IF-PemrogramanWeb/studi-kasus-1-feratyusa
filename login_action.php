<?php  

    require_once "config.php";

    // Check user login
    $user = trim($_POST["username"]);
    $password_user = trim($_POST["password"]);


    $sql = "SELECT username, password FROM users WHERE username='$user'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $pass_hash = $row["password"];

        if(password_verify($password_user, $pass_hash)){

            // Start Session
            session_start();
            $_SESSION["username"] = $user;
            $_SESSION["login"] = true;
            header("location: index.php?user=$user");
            exit;

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