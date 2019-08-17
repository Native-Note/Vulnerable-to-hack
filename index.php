<?php
session_start();
// if(!isset($_SESSION['login_user'])){
//   header("location: login.php");
// }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <?php include './includes/header.php'; ?>
    <div class="d-flex align-items-stretch">
      <?php include './includes/sidebar.php'; ?>
      <div class="page-holder w-100 d-flex flex-wrap">
          <div class="container-fluid px-xl-5">
            <section class="py-5">
              <div class="row">
                <div class="col-lg-12 mb-12">
                  <div class="card">
                    <div class="card-header">
                      <h6 class="text-uppercase mb-0">Employee Information</h6>
                    </div>
                    <div class="card-body">
                      <table class="table card-text">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>D. Birth</th>
                            <th>Joining</th>
                            <th>Salary</th>
                            <th>Hike</th>
                            <th>Phone</th>
                            <th>Place</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          include_once './includes/connect.php';
                          $limit = 50;
                          $query = "SELECT * FROM employee ";
                          if(isset($_GET['search'])){
                            $query .= "where First_Name LIKE '%".$_GET['search']."%' OR Middle_Initial LIKE '%".$_GET['search']."%' OR Last_Name LIKE '%".$_GET['search']."%' ";  
                          }
                          if(isset($_GET['id'])){
                            $query .= "where Emp_ID = '".$_GET['id']."' ";  
                          }
                          if(isset($_GET['gender'])){
                            $query .= "where Gender = '".$_GET['gender']."' ";  
                          }
                          if(isset($_GET['limit'])){
                            $limit = $_GET['limit'];
                          }
                          $query .= "limit " . $limit;
                      
                          if ($result = $mysqli->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                          ?>
                          <tr>
                            <td scope="row"><?= $row["First_Name"] . " " . $row["Middle_Initial"] . " " . $row["Last_Name"] . " (".$row["Gender"].")"; ?></td>
                            <td><?= $row["E_Mail"]; ?></td>
                            <td><?php
                            $date = new DateTime($row["Date_of_Birth"]);
                            echo $date->format('jS F Y');
                            ?></td>
                            <td><?php
                            $date = new DateTime($row["Date_of_Joining"]);
                            echo $date->format('jS F Y');
                            ?></td>
                            <td><?= $row["Salary"]; ?></td>
                            <td><?= $row["Last_Hike"]; ?></td>
                            <td><?= $row["Phone_No"]; ?></td>
                            <td><?= $row["Place_Name"]; ?></td>
                          </tr>

                          <?php 
                          }
                          $result->free();
                        } else {
                          ?>
                          <tr>
                            <td>
                              No result found
                            </td>
                          <tr>
                          <?php
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 text-center text-md-left text-primary">
                  <p class="mb-2 mb-md-0">ABC &copy; 2019</p>
                </div>
                <div class="col-md-6 text-center text-md-right text-gray-400">
                  <p class="mb-0">Design by ABC</p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>