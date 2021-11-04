<?php

session_start();

if(!isset($_SESSION["login"]) || !isset($_SESSION["username"]) 
      || !isset($_GET["user"]) || $_SESSION["username"] != $_GET["user"] || $_SESSION["login"] != true){
  session_unset();
  session_destroy();
  header("location: login.php");
  exit;
}

require_once "config.php";

// Count data at semester 1 - 8
$q_semester1 = "SELECT COUNT(*) as total FROM data_mahasiswa WHERE semester=1";
$q_semester2 = "SELECT COUNT(*) as total FROM data_mahasiswa WHERE semester=2";
$q_semester3 = "SELECT COUNT(*) as total FROM data_mahasiswa WHERE semester=3";
$q_semester4 = "SELECT COUNT(*) as total FROM data_mahasiswa WHERE semester=4";
$q_semester5 = "SELECT COUNT(*) as total FROM data_mahasiswa WHERE semester=5";
$q_semester6 = "SELECT COUNT(*) as total FROM data_mahasiswa WHERE semester=6";
$q_semester7 = "SELECT COUNT(*) as total FROM data_mahasiswa WHERE semester=7";
$q_semester8 = "SELECT COUNT(*) as total FROM data_mahasiswa WHERE semester=8";

$_res1 = $conn->query($q_semester1);
$_res2 = $conn->query($q_semester2);
$_res3 = $conn->query($q_semester3);
$_res4 = $conn->query($q_semester4);
$_res5 = $conn->query($q_semester5);
$_res6 = $conn->query($q_semester6);
$_res7 = $conn->query($q_semester7);
$_res8 = $conn->query($q_semester8);

$res1 = $_res1->fetch_assoc();
$res2 = $_res2->fetch_assoc();
$res3 = $_res3->fetch_assoc();
$res4 = $_res4->fetch_assoc();
$res5 = $_res5->fetch_assoc();
$res6 = $_res6->fetch_assoc();
$res7 = $_res7->fetch_assoc();
$res8 = $_res8->fetch_assoc();

$sem1 = $res1["total"];
$sem2 = $res2["total"];
$sem3 = $res3["total"];
$sem4 = $res4["total"];
$sem5 = $res5["total"];
$sem6 = $res6["total"];
$sem7 = $res7["total"];
$sem8 = $res8["total"];

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Graph</title>
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
          <canvas id="graph"></canvas>
          <!-- End of Right Content -->
        </div>
      </div>
    </div>
    <!-- End Content -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
      const a = <?php echo $sem1 ?>,
        b = <?php echo $sem2; ?>,
        c = <?php echo $sem3; ?>,
        d = <?php echo $sem4; ?>,
        e = <?php echo $sem5; ?>,
        f = <?php echo $sem6; ?>,
        g = <?php echo $sem7; ?>,
        h = <?php echo $sem8; ?>;
      
      const labels = ["1", "2", "3", "4", "5", "6", "7", "8"];
      const data = {
        labels: labels,
        datasets: [
          {
          label: "Mahasiswa",
          backgroundColor: "rgb(255, 99, 132)",
          borderColor: "rgb(255, 99, 132)",
          data: [a,b,c,d,e,f,g,h],
          },
        ],
      };

      const config = {
        type: "bar",
        data: data,
        options: { responsive: true, maintainAspectRation: false },
      };

      const myChart = new Chart(document.getElementById("graph"), config);
    </script>

  </body>
</html>
