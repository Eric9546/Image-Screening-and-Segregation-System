<?php

    session_start ();

    // Declaring function for alert message //
    function alert ($msg)
    {

        echo "<script type='text/javascript'>alert('$msg'); window.location='edit_fail_categories.php';</script>";

    }

    // Gathering the input from user //
    $category_to_remove = $_POST ['category']; 

    // Validating the input //
    if (empty ($category_to_remove))
    {

        alert ("Error Please Check Your Fail Category!");

    }  

     // Updating the data file //
     $data = file("data/fail_categories.txt");

     $out = array();

     foreach($data as $line) 
     {
          
         if(trim($line) !== trim($category_to_remove)) 
         {
                    
             $out[] = $line;
         }
     }

     $fp = fopen("data/fail_categories.txt", "w+");
     flock($fp, LOCK_EX);
     foreach($out as $line) 
     {
         fwrite($fp, $line);
     }

     flock($fp, LOCK_UN);
     fclose($fp);  

     // Updating the directory //
     rename("failed_images/" . trim($category_to_remove),"failed_images/" . trim($category_to_remove) . "(Category Removed)");
     alert ("Fail Category Has Been Removed Successfully!");

?>