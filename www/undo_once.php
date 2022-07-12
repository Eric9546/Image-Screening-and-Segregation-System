<?php

    session_start ();

    // Declaring function for alert message //
    function alert ($msg)
    {

        echo "<script type='text/javascript'>alert('$msg'); window.location='screen_images.php';</script>";

    }

    $arrayLength = count($_SESSION ['undo_dir']);
    $index = $arrayLength - 1;

    if ($arrayLength < 1)
    {

        alert ("No Action To Be Undone!");

    }

    else if ($_SESSION ['undo_type'][$index] == "PASS")
    {

        // Remove image from passed folder //
        unlink ($_SESSION ['undo_dir'][$index]);

        // Update the uploads data file //
        $data = file("data/uploads.txt");
        $record = $_SESSION ['undo_name'][$index] . "\n";

        // Update the array //
        unset ($_SESSION ['undo_dir'][$index]);
        unset ($_SESSION ['undo_name'][$index]);
        unset ($_SESSION ['undo_type'][$index]);

        $out = array();

        foreach($data as $line) 
        {
            
            $out[] = $line;     
      
        }

        $fp = fopen("data/uploads.txt", "w+");
        flock($fp, LOCK_EX);
        fwrite ($fp, $record);
        foreach($out as $line) 
        {
            fwrite($fp, $line);
        }

        flock($fp, LOCK_UN);
        fclose($fp);       
    
        // Decrease pass counter //
        $_SESSION ['total_pass'] = $_SESSION ['total_pass'] - 1;
        $myfile = fopen("data/total_pass.txt", "w");
        fwrite($myfile, $_SESSION ['total_pass']);
        fclose($myfile);
        header ("Location: screen_images.php");

    }

    else
    {

        // Remove image from failed folder //
        unlink ($_SESSION ['undo_dir'][$index]);

        // Update the uploads data file //
        $data = file("data/uploads.txt");
        $record = $_SESSION ['undo_name'][$index] . "\n";

        // Update the array //
        unset ($_SESSION ['undo_dir'][$index]);
        unset ($_SESSION ['undo_name'][$index]);
        unset ($_SESSION ['undo_type'][$index]);

        $out = array();

        foreach($data as $line) 
        {
            
            $out[] = $line;     
      
        }

        $fp = fopen("data/uploads.txt", "w+");
        flock($fp, LOCK_EX);
        fwrite ($fp, $record);
        foreach($out as $line) 
        {
            fwrite($fp, $line);
        }

        flock($fp, LOCK_UN);
        fclose($fp);  

        // Decrease fail counter //
        $_SESSION ['total_fail'] = $_SESSION ['total_fail'] - 1;
        $myfile = fopen("data/total_fail.txt", "w");
        fwrite($myfile, $_SESSION ['total_fail']);
        fclose($myfile);
        header ("Location: screen_images.php");

    }

?>