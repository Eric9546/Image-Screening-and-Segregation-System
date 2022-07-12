<?php
    
    session_start ();

    // Declaring function for alert message //
    function alert ($msg)
    {

        echo "<script type='text/javascript'>alert('$msg'); window.location='index.php';</script>";

    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    

    <div class="site-navbar bg-white py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <fo$ action="#" method="post">
            <input type="text" class="fo$-control" placeholder="Search keyword and hit enter...">
          </fo$>  
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div>
              <a href="index.php" class="js-logo-clone"><img src="resources/logo.png" width="110" height="55" alt="Image"/></a>
            </div>
          </div>    
        </div>
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center mb-5 col-12">
            <h2 class="text-uppercase">Welcome To The Image Screening and Segregation System!</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="upload_images.php" class="product-item md-height bg-gray d-block" style="height:300px; width:300px">
              <img src="resources/function1.png" alt="Image" class="img-fluid" height="250" width="250">
            </a>
            <h5 class="item-price"><a href="upload_image.php">Upload Images</a></h5>
          </div>
          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="screen_images.php" class="product-item md-height bg-gray d-block" style="height:300px; width:300px">
              <img src="resources/function2.jpg" alt="Image" class="img-fluid" height="200" width="200">
            </a>
            <h5 class="item-price"><a href="screen_images.php">Screen Images</a></h5>
          </div>

          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="view_passed_images.php" class="product-item md-height bg-gray d-block" style="height:300px; width:300px">
              <img src="resources/function3.png" alt="Image" class="img-fluid" height="200" width="200">
            </a>
            <h5 class="item-price"><a href="view_passed_images.php">View Passed Images</a></h5>
          </div>
          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="view_failed_images.php" class="product-item md-height bg-gray d-block" style="height:300px; width:300px">
              <img src="resources/function4.png" alt="Image" class="img-fluid" height="200" width="200">
            </a>
            <h5 class="item-price"><a href="view_failed_images.php">View Failed Images</a></h5>
          </div>

          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="edit_fail_categories.php" class="product-item md-height bg-gray d-block" style="height:300px; width:300px">
              <img src="resources/function5.jpg" alt="Image" class="img-fluid" height="200" width="200">
            </a>
            <h5 class="item-price"><a href="edit_fail_categories.php">Edit Fail Categories</a></h5>
          </div>

             <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="batch_management.php" class="product-item md-height bg-gray d-block" style="height:300px; width:300px">
              <img src="resources/function6.png" alt="Image" class="img-fluid" height="200" width="200">
            </a>
            <h5 class="item-price"><a href="batch_management.php">Batch Management</a></h5>
          </div>
          

        </div>
      </div>
    </div>

    <footer class="site-footer custom-border-top">
        <div class="container">

            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>

                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All Rights Reserved Ideal Vision Integration.

                    </p>
                </div>

            </div>
        </div>
    </footer>

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>