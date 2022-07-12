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
    <title>Upload Images</title>
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
          
        <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="upload_images.php">Upload Images</a></li>
                    <li><a href="screen_images.php">Screen Images</a></li>

                    <li class="has-children ">
                        <a href="#">View Images</a>
                        <ul class="dropdown">
                            <li><a href="view_passed_images.php">View Passed Images</a></li>
                            <li><a href="view_failed_images.php">View Failed Images</a></li>
                        </ul>
                    </li>

                    <li><a href="edit_fail_categories.php">Edit Fail Categories</a></li>
                    <li><a href="batch_management.php">Batch Management</a></li>
                   
                </ul>
            </nav>
          </div>

          <div class="icons">
 
             <span>

             </span>

        </div>
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Upload Images</h2>
          </div>
          <div class="col-md-7">

            <form action="upload_images_execute.php" method="post" enctype="multipart/form-data">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">

                  <div class="col-md-6">
                    <p><label for="c_subject" class="text-black">Attach Images<span class="text-danger">*</span></label></p>
                    <input type="file" class="btn btn-primary btn-lg btn-block" name="myfile[]" multiple required>
                  </div>

                </div>
                
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Upload Images">           
                  </div>
                </div>
              </div>
            </form>
          </div>
            
          <div class="col-md-5 ml-auto">

            <div class="p-4 border mb-3">
                      
                <p><img src="resources/function1.png" width="275" height="200"/></p>

            </div>
                    
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>