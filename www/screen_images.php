<?php
    
    session_start ();

    if (!isset ($_SESSION ['no']))
    {
        
        $_SESSION ['no'] = 0;
              
    }

    if (!isset ($_SESSION ['last_image']))
    {
        
        $_SESSION ['last_image'] = 0;
              
    }

    if (!isset ($_SESSION ['total_pass']))
    {
        
        $myfile = fopen("data/total_pass.txt", "r");
        $_SESSION ['total_pass'] = fgets($myfile);
        fclose($myfile);
              
    }

    if (!isset ($_SESSION ['total_fail']))
    {
        
        $myfile = fopen("data/total_fail.txt", "r");
        $_SESSION ['total_fail'] = fgets($myfile);
        fclose($myfile);
              
    }

    if (!isset ($_SESSION ['undo_dir']))
    {
              
        $_SESSION ['undo_dir'] = array ();
              
    }

    if (!isset ($_SESSION ['undo_name']))
    {
               
        $_SESSION ['undo_name'] = array ();
              
    }

    if (!isset ($_SESSION ['undo_type']))
    {
                
        $_SESSION ['undo_type'] = array ();
              
    }

    // Declaring function for alert message //
    function alert ($msg)
    {

        echo "<script type='text/javascript'>alert('$msg'); window.location='index.php';</script>";

    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Screen Images</title>
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
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Screen Images</h2>
          </div>
          <div class="col-md-7">

              <div class="p-3 p-lg-5 border">
                
                    <?php

                        $no = $_SESSION ['no'];
                        $emptyArray = []; 
                        $i = 0;

                        $myfile = fopen("data/uploads.txt", "r");

                        while (!feof($myfile))
                        {

                            $emptyArray [$i] = fgets($myfile);
                            $i = $i + 1;

                        }
                   
                        $_SESSION ['last_image'] = $i - 1;
                              
                    ?>
                    
                    <a href="<?php
                       
                                if ($_SESSION ['last_image'] == 0)
                                {
                  
                                    echo "resources/no_image.jpg";

                                }

                                else
                                {
                       
                                    echo $emptyArray [$no];

                                }

                             ?>" target="_blank">
                    <p><img src="<?php 
                                if ($_SESSION ['last_image'] == 0)
                                {
                  
                                    echo "resources/no_image.jpg";

                                }

                                else
                                {
                       
                                    echo $emptyArray [$no];

                                }
                            ?>" width="550" height="550"/></p>
                    </a>

              </div>
           
          </div>
            
          <div class="col-md-5 ml-auto">

            <div class="p-4 border mb-3">
                        
                <div class="form-group row">

                  <div class="col-md-6"> 
                      
                      <?php

                        if ($_SESSION ['last_image'] == 0)
                        {
                  
                            $_SESSION ['image_dir'] = "null";

                        }

                        else
                        {
                      
                            $_SESSION ['image_dir'] = $emptyArray [$no];

                        }

                      ?>

                     <a href='pass_image.php' class='btn btn-primary btn-lg btn-block' style="background-color:green;border-color:green"><b>Pass</b></a>                 
                  </div>

                <div class="col-md-6">  
                    <button class='btn btn-primary btn-lg btn-block' style="background-color:red;border-color:red" onclick="openForm()">Fail</button>
                    
                    <div class="form-popup" id="myForm">
                      <form action="fail_image.php" class="form-container" method="post">
                        <label for="text" class="text-black">Select The Fail Category <span class="text-danger">*</span></label>
                        <br />                  

                            <?php

                                $myfile = fopen("data/fail_categories.txt", "r");

                                while (!feof($myfile))
                                {

                                    $fail_category = fgets($myfile);

                                    if ($fail_category == "")
                                    {
                                    
                                        break;
                          
                                    }
                              
                            ?>

                                <input type="radio" id="<?php echo $fail_category;?>" name="category" value="<?php echo $fail_category;?>">
                                <label for="<?php echo $fail_category;?>"><?php echo $fail_category;?></label><br>                            
                                    
                            <?php
           
                                }

                                fclose($myfile);

                            ?> 
                  
                        <br /><br />

                        <button type="submit" class='btn btn-primary btn-lg btn-block' style="background-color:green;border-color:green">Confirm Selection</button>
                        <button type="button" class='btn btn-primary btn-lg btn-block' style="background-color:red;border-color:red" onclick="closeForm()">Cancel</button>
                      </form>
                    </div>

                    <script>
                        function openForm()
                        {
                          document.getElementById("myForm").style.display = "block";
                        }

                        function closeForm()
                        {
                          document.getElementById("myForm").style.display = "none";
                        }
                    </script>

                    <br />
                </div>

                </div>

                <div class="form-group row">

                  <div class="col-md-6" style="text-align:center">     
                     <a href="previous_image.php"><span class="icon-chevron-left display-3 text-black"></span></a>
                      <br />
                      <label for="text" class="text-black">Previous Image</label>
                  </div>

                    <div class="col-md-6" style="text-align:center">   
                        <a href="next_image.php"><span class="icon-chevron-right display-3 text-black"></span></a> 
                        <br />
                        <label for="text" class="text-black">Next Image</label>
                        <br />
                    </div>

                </div>

                <div class="form-group row">

                  <div class="col-md-6" style="text-align:center">     
                     <a href="first_image.php"><span class="icon-angle-double-left display-3 text-black"></span></a>
                      <br />
                      <label for="text" class="text-black">First Image</label>
                  </div>

                    <div class="col-md-6" style="text-align:center">   
                        <a href="last_image.php"><span class="icon-angle-double-right display-3 text-black"></span></a> 
                        <br />
                        <label for="text" class="text-black">Last Image</label>
                        <br />
                    </div>

                </div>

                <div class="form-group row">

                  <div class="col-md-6" style="text-align:center">     
                     <a href="<?php echo $emptyArray [$no];?>" download><span class="icon-download display-3 text-black"></span></a>
                      <br />
                      <label for="text" class="text-black">Download Current Image</label>
                  </div>

                <div class="col-md-6" style="text-align:center">   
                    <a href="download_uploads_folder.php"><span class="icon-download display-3 text-black"></span><span class="icon-folder display-3 text-black"></span></a> 
                    <br />
                    <label for="text" class="text-black">Download All Images In Uploads Folder</label>
                    <br />
                </div>

                </div>

                <div class="form-group row">

                    <div class="col-md-6" style="text-align:center">   
                        <a href="undo_once.php"><span class="icon-undo display-3 text-black"></span></a> 
                        <br />
                        <label for="text" class="text-black">Undo Once</label>
                        <br />
                    </div>

                    <div class="col-md-6" style="text-align:center">   
                        <a href="undo_all.php"><span class="icon-undo display-3 text-black"></span></a> 
                        <br />
                        <label for="text" class="text-black">Undo All</label>
                        <br />
                    </div>

                </div>

                <div class="form-group row">

                  <div class="col-md-12" style="text-align:center">         
                      
                      <?php 

                        $totalImages = $_SESSION ['total_pass'] + $_SESSION ['total_fail'] + $_SESSION ['last_image'];

                        if ($_SESSION ['total_pass'] == 0 && $_SESSION ['total_fail'] > 0)
                        {
                                             
                            $totalPassed = 0;
                            $totalFailed = ($_SESSION ['total_fail'] / $totalImages) * 100;

                        }

                        else if ($_SESSION ['total_fail'] == 0 && $_SESSION ['total_pass'] > 0)
                        {
                      
                            $totalFailed = 0;
                            $totalPassed = ($_SESSION ['total_pass'] / $totalImages) * 100;

                        }

                        else if ($_SESSION ['total_fail'] == 0 && $_SESSION ['total_pass'] == 0)
                        {
                      
                            $totalPassed = 0;
                            $totalFailed = 0;

                        }

                        else
                        {
                      
                            $totalFailed = ($_SESSION ['total_fail'] / $totalImages) * 100;
                            $totalPassed = ($_SESSION ['total_pass'] / $totalImages) * 100;

                        }
                        

                      ?>
                      
                      <label for="text" class="text-black" style="color:green">Total Image Passed In This Batch: <?php echo $_SESSION ['total_pass']; ?> (<?php echo number_format((float)$totalPassed, 2, '.', ''); ?>%)</label>
                  </div>
                    <div class="col-md-12" style="text-align:center">                        
                      <label for="text" class="text-black" style="color:red">Total Image Failed In This Batch: <?php echo $_SESSION ['total_fail']; ?> (<?php echo number_format((float)$totalFailed, 2, '.', ''); ?>%)</label>
                  </div>
                    <div class="col-md-12" style="text-align:center">                        
                      <label for="text" class="text-black">Total Image Remaining For Screening: <?php echo $_SESSION ['last_image']; ?></label>
                  </div>

                </div>
          
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