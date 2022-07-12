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
    <title>Batch Management</title>
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
    </div>
    
    <div class="site-section">
      <div class="container">
          <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Batch Management</h2>
          </div>
          <div class="col-md-7">

              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">                
                    <br />
                    <a href='download_batch.php' class='btn btn-primary btn-lg btn-block' style="background-color:green;border-color:green"><b>Download Current Batch</b></a>
                    <br />
                    <a href='clear_batch.php' class='btn btn-primary btn-lg btn-block' style="background-color:orange;border-color:orange" 
                       onclick="return confirm('This Will Delete All Contents In Passed Images and Failed Images Folder. Proceed?')"><b>Clear Current Batch</b></a>
                    <br />
                    <a href='clear_uploads.php' class='btn btn-primary btn-lg btn-block' style="background-color:red;border-color:red" 
                       onclick="return confirm('This Will Delete All Contents In Uploads Folder. Proceed?')"><b>Clear Uploads Folder</b></a>
                  </div>
          
                </div>
             
              </div>
            
          </div>

          <div class="col-md-5 ml-auto">

            <div class="p-4 border mb-3">
                      
                <p><img src="resources/function6.png" width="370" height="255"/></p>

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

  <script src="js/main.js"></script>
    
  </body>
</html>