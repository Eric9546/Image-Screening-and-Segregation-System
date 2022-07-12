<?php

    // Declaring function for alert message //
    function alert ($msg)
    {

        echo "<script type='text/javascript'>alert('$msg'); window.location='batch_management.php';</script>";

    }

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

    // Clear the uploads folder //
    rrmdir ("uploads");

    // Iniatialize the uploads directory //
    mkdir("uploads");

    // Clear uploads data file //
    $myfile = fopen("data/uploads.txt", "w");

    alert ("Uploads Folder Cleared Successfully!");

?>