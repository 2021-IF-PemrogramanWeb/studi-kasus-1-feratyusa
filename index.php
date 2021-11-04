<?php  

session_start();

if(!isset($_SESSION["login"]) || !isset($_SESSION["username"]) 
  || !isset($_GET["user"]) || $_SESSION["username"] != $_GET["user"] || $_SESSION["login"] != true){
  header("location: login.php");
  exit;
}

require_once "config.php";

// Get the data identifier (asal kota)
if(!isset($_SESSION['asal'])){
    $_SESSION['asal'] = 'Madiun';
}
else if(isset($_GET['asal'])){
    $_SESSION['asal'] = $_GET['asal'];
}

// Get data and pass the array to SESSION
$asal = $_SESSION['asal'];
$sql = "SELECT nama, nrp, ipk, semester FROM data_mahasiswa WHERE asal='$asal' ORDER BY semester ASC";

if($result = $conn->query($sql)){
    $rows = $result;
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
      <div class="container justify-content-between">
        <a class="navbar-brand" href="#">
          <img src="image/index.png" alt="" width="34" height="30" />
        </a>
        <h3><?php echo date('Y-m-d'); ?></h3>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Content -->
    <div class="container">
      <div class="row mt-5">
        <div class="col-2">
          <!-- Left Content -->
          <div class="row mb-2">
            <div class="col">
              <a class="btn btn-info btn-lg" href="index.php?user=<?php echo $_SESSION["username"]; ?>&asal=Madiun">Madiun</a>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col">
              <a class="btn btn-primary btn-lg" href="index.php?user=<?php echo $_SESSION["username"]; ?>&asal=Jakarta">Jakarta</a>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
              <a class="btn btn-info btn-lg" href="graph.php?user=<?php echo $_SESSION["username"]; ?>">Graph</a>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
              <a class="btn btn-info btn-lg" href="#">Export</a>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
              <a class="btn btn-danger btn-lg" href="logout.php">Logout</a>
            </div>
          </div>
          <!-- End Left Content -->
        </div>
        <div class="col">
          <!-- Right Content -->
          <table class="table table-bordered">
            <thead class="table-info">
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">NRP</th>
                <th scope="col">IPK</th>
                <th scope="col">Semester</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($row = $rows->fetch_assoc()){
                  echo '<tr> 
                          <td>'.$row["nama"].'</td> 
                          <td>'.$row["nrp"].'</td> 
                          <td>'.$row["ipk"].'</td> 
                          <td>'.$row["semester"].'</td>
                        </tr>';
                }
              ?>
            </tbody>
          </table>
          <!-- End of Right Content -->
        </div>
      </div>
    </div>
    <!-- End Content -->
  </body>
</html>
