<?php

    session_start ();

    // Declaring function for alert message //
    function alert ($msg)
    {

        echo "<script type='text/javascript'>alert('$msg'); window.location='screen_images.php';</script>";

    }

    // Gathering user input //
    $record_to_remove = $_SESSION ['image_dir'];
    $fail_category = $_POST ['category'];

    // Validating the input //
    if ($record_to_remove == "null")
    {
             
        alert ("Error No Image Available!");  
        exit();   

    }

    // Validating the input //
    if (empty ($fail_category))
    {

        alert ("Error Please Try Again!");

    }

    else 
    {

        // Updating the data file //
        $data = file("data/uploads.txt");

        $out = array();

        foreach($data as $line) 
        {
          
            if(trim($line) !== trim($record_to_remove)) 
            {
                    
                $out[] = $line;
            }
        }

        $fp = fopen("data/uploads.txt", "w+");
        flock($fp, LOCK_EX);
        foreach($out as $line) 
        {
            fwrite($fp, $line);
        }

        flock($fp, LOCK_UN);
        fclose($fp);  
           
        // Copy the image to the approved folder //
        $file_name = trim($record_to_remove);         
        $new_file_name = str_replace ('uploads', 'failed_images/' . trim($fail_category), $file_name); 
          
        copy (trim($record_to_remove), $new_file_name);

        // Set data for undo //       
        array_push ($_SESSION ['undo_dir'], $new_file_name);
        array_push ($_SESSION ['undo_name'], $file_name);
        array_push ($_SESSION ['undo_type'], "FAIL");  

        // Increase pass counter //
        $_SESSION ['total_fail'] = $_SESSION ['total_fail'] + 1;
        $myfile = fopen("data/total_fail.txt", "w");
        fwrite($myfile, $_SESSION ['total_fail']);
        fclose($myfile);
        header ("Location: screen_images.php");

        // Reset the no //
        $_SESSION ['no'] = 0;
     
    }

?>