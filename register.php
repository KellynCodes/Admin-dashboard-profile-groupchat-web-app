<?php 

session_start();

include 'conn.php';

if(isset($_POST["register"])){
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = $_POST['status'];
  $about_you = $_POST['about_you'];


      $sql = "SELECT * FROM members where email = '$email'"; //checking if email already exist or not
      $exe = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($exe);
     

      if($num == 0){
        $sql = "INSERT INTO  members(email, username, password,status,about_you) values('$email', '$username', '$password', '$status', '$about_you')";
        $execute = mysqli_query($conn,$sql);

        // directing user to the main page if all the information provided is accepted
        header("Location: dashboard/index.php");

      }else{
        $msg = "Email address already exist";
        $msgtype = "info";
      }

   

}else{
  $msg = 'Email should be more than 3 characters';
  $msgtype = 'danger';
}


$sql ="SELECT * FROM members where username = '$username' and password = '$password";
$execute = mysqli_query($conn,$sql);
$num =mysqli_num_rows($execute);
if($num == 1){
  while($row=mysqli_fetch_array($execute)){
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['status'] = $row['status'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['about_you'] = $row['about_you'];
  }
  }else{
    echo mysqli_error($conn);
}


}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HeroBiz Bootstrap Template - Home 3</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz - v2.1.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-header">
          <h2>Register Today</h2>
          <p>Register Today to enjoy the free training on unlimited computer skills</p>
        </div>

      </div>

     
      <div class="container">

        <div class="row gy-5 gx-lg-5">

        <div class="col-md-2"></div>

          <div class="col-lg-8 shadow rounded">
            <form  method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="alert alert-<?php echo $msgtype ?> text-center"><?php echo $msg ?></div>
              <div class="form-group mt-3" >
                <input type="email" class="form-control" value="<?php echo $email ?>" name="email"  placeholder="Your Email" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" value="<?php echo $username ?>" name="username"  placeholder="Username" required>
              </div>
              
              <div class="form-group mt-3">
                <input type="password" class="form-control" value="<?php echo $password ?>" name="password"  placeholder="Password" required>
              </div>
              
              <div class="form-group mt-3">
                <textarea class="form-control" name="about_you" placeholder="Brief Text About You...(optional)"></textarea>
              </div>
              
              <input type="hidden" value="active" name="status">
              
              <div class="text-center" ><button type="submit" name="register">Register</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>