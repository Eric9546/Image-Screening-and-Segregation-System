<?php

    session_start ();

    $no = $_SESSION ['no'];
    $no = $no - 1;

    if ($no < 0)
    {

        header ("Location: screen_images.php");

    }

    else
    {

        $_SESSION ['no'] = $no;
        header ("Location: screen_images.php");
        
    }
 
?>