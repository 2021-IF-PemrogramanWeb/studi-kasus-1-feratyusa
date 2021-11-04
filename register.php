<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  </head>
  <body>
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col col-md-6 text-center">
            <img src="image/index.png" alt="logo" width="200" height="200">
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col col-md-6">
            
            <div class="card card-primary">
              <!-- Card Header -->
              <div class="card-header">
                <div class="card-title"><h2>REGISTER</h2></div>
              </div>

              <!-- Form -->
              <form action="register_action.php" method="POST">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" />
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <label for="confirm-pass">Confirmation Password</label>
                        <input type="password" class="form-control" name="confirm-pass" placeholder="Confirmation Password" />
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
