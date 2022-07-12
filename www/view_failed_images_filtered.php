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
    <title>View Failed Images</title>
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
    <link rel="stylesheet" href="css/popup.css">
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
          <div class="title-section text-center mb-5 col-12">

              <?php

                $fail_category = trim($_POST ['category']);
                   
                if (empty ($fail_category))
                {

                    echo ("<script>location.href = 'view_failed_images.php';</script>");

                }

              ?>

            <h2 class="text-uppercase">Images That Have Failed Inspection Under The Category: <?php echo $fail_category; ?></h2>
              <br />
               <h4>

                    <a href="download_passed_folder.php"><span class="icon-download display-3 text-pink"></span><span class="icon-folder display-3 text-pnk"></span></a> 
                    <br />
                    
                    <?php

                        $log_directory = 'failed_images/' . $fail_category . '/' ;

                        $results_array = array();

                        if (is_dir($log_directory))
                        {
                            if ($handle = opendir($log_directory))
                            {

                                $total = 0;

                                //Notice the parentheses I added:
                                while(($file = readdir($handle)) !== FALSE)
                                {

                                        $results_array[] = $file;
                                        $total = $total + 1;

                                }

                                closedir($handle);

                            }

                        }

                        $image_total = $total - 2;

                        echo '<label for="text" class="text-black">Download All ' . $image_total . ' Images</label>';

                    ?>
      
                    <br />

               </h4>                  
              
          </div>
        </div>
        <div class="row">           

            <?php 
                
                for ($i=2; $i<$total; $i++)
                {
                    
                    echo '<div class="col-lg-4 col-md-6 item-entry mb-4">';
                    echo '<a href="' . $log_directory . $results_array[$i] . '" class="product-item md-height bg-gray d-block" target="_blank">';
                    echo '<img src="' . $log_directory . $results_array[$i] . '" alt="Image" class="img-fluid">';
                    echo '</a>';
                    echo '<h5 class="item-price"><a href="passed_images/' . $results_array[$i] . '" target="_blank">'. $results_array[$i] . str_repeat('&nbsp;', 5) . '</a>';
                    echo '<a href="' . $log_directory . $results_array[$i] . '" download><span class="icon-download display-4 text-black"></span></a>';
                    echo '</h5>';
                    echo '</div>';

                }
                          
            ?>     

        </div>
      </div>

        <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>

        <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
            } else {
            mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        </script>

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