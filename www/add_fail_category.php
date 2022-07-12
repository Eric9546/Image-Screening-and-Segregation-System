<?php

    session_start ();

    // Declaring function for alert message //
    function alert ($msg)
    {

        echo "<script type='text/javascript'>alert('$msg'); window.location='edit_fail_categories.php';</script>";

    }

    // Gathering user input //
    $fail_category = $_POST ['fail_category'];

    // Validating the input //
    if (empty ($fail_category))
    {

        alert ("Error Please Check Your Fail Category!");

    }

    else 
    {

        // Check if fail category exists //
        $directory  = "failed_images/" . $fail_category;
        if (file_exists($directory))
        {

            alert ("Fail Category Already Exists!");

        }

        else
        {

            // Insert into database //
            $myfile = fopen("data/fail_categories.txt", "a");
            fwrite($myfile, $fail_category . "\n");
            fclose($myfile);

            // Make new folder for the fail category //
            $directory  = "failed_images/" . $fail_category;
            mkdir ($directory);

            alert ("Fail Category Added Successfully!");

        }

    }
  
?>