<?php 
session_start();

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        include_once './includes/connect.php';
        $sql = "INSERT INTO employee (`Name_Prefix`,`First_Name`,`Last_Name`,`E_Mail`,`User_Name`,`Password`) 
        VALUES ('".$_POST["prefix"]."','".$_POST["firstname"]."', '".$_POST["lastname"]."','".$_POST["email"]."','".$_POST["username"]."','".$_POST["password"]."')";

        if (mysqli_query($mysqli, $sql)) {
          echo "New record created successfully";
          $mysqli->close();
          header("location: login.php");
        } else {
            $mysqli->close();
            echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
    }
} 
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
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="img/illustration.svg" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">Dashboard</h1>
            <h2 class="mb-4">Sign Up Here!</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
            <form id="signupForm" action="sign-up.php" method="POST" class="mt-4">
              <div class="form-group mb-4 row">
                  <div class="col-md-2">
                    <select name="prefix" class="form-control border-0 shadow form-control-lg">
                      <option>Mr.</option>
                      <option>Mrs.</option>
                      <option>Dr.</option>
                    </select>
                  </div>
                    <div class="col-md-5">
                      <input type="text" name="firstname" placeholder="First name" class="form-control border-0 shadow form-control-lg">
                    </div>
                    <div class="col-md-5">
                      <input type="text" name="lastname" placeholder="Last name" class="form-control border-0 shadow form-control-lg">
                    </div>
              </div>
              <div class="form-group mb-4">
                <input type="text" name="username" placeholder="Username" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="email" name="email" placeholder="Email address" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="password" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet">
              </div>
              <button type="submit" class="btn btn-primary shadow px-5">Save changes</button>
            </form>
          </div>
        </div>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
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