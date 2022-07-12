<?php

    // Declaring function for alert message //
    function alert ($msg)
    {

        echo "<script type='text/javascript'>alert('$msg'); window.location='batch_management.php';</script>";

    }

    session_start ();

    // Declare function to clear the folders //
    function rrmdir($dir) 
    { 
       if (is_dir($dir)) 
        { 
         $objects = scandir($dir);
         foreach ($objects as $object)
         { 
           if ($object != "." && $object != "..") 
            { 
             if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
               rrmdir($dir. DIRECTORY_SEPARATOR .$object);
             else
               unlink($dir. DIRECTORY_SEPARATOR .$object); 
           } 
         }
         rmdir($dir); 
       } 
    }

    // Clear the passed images folder //
    rrmdir ("passed_images");

    // Iniatialize the passed_images directory //
    mkdir("passed_images");

    // Clear the failed images folder //
    rrmdir ("failed_images");

    // Iniatialize the failed_images directory //
    mkdir("failed_images");

    $myfile = fopen("data/fail_categories.txt", "r");

    while (!feof($myfile))
    {

        $fail_category = fgets($myfile);
        $directory = "failed_images/" . trim($fail_category);
        mkdir ($directory);

    }

    fclose($myfile);

    // Update the counter files //
    $myfile = fopen("data/total_pass.txt", "w");
    fwrite($myfile, 0);
    fclose($myfile);

    $myfile = fopen("data/total_fail.txt", "w");
    fwrite($myfile, 0);
    fclose($myfile);

    // Reset the session //
    session_unset();
    session_destroy();

    alert ("Batch Cleared Successfully!");

?>