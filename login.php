<?php

// Process status
$warning = "";

if(isset($_GET["status"])){
  $status = $_GET["status"];
  switch ($status) {
    case 'forbidden':
      $warning = "Impostor! Login first, please.";
      break;

    case 'login-failed':
      $warning = "Username or password is invalid";
      break;
    
    case 'forbidden':
      $warning = "Oopss, something went wrong. Try again.";
      break;
    
    default:
      $warning = "";
      break;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  </head>
  <body>
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col col-md-6 text-center">
            <img src="image/index.png" alt="logo" width="200" height="200">
            <h5 class="text-danger"><?php echo $warning; ?></h5>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col col-md-6">
            
            <div class="card card-primary">
              <!-- Card Header -->
              <div class="card-header">
                <div class="card-title"><h2>LOGIN</h2></div>
              </div>

              <!-- Form -->
              <form action="login_action.php" method="POST">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="username">User</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" />
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" />
                  </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <p>Don't have an account? <a href="register.php">Create one!</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
