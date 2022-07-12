<?php

    session_start ();

    $no = $_SESSION ['no'];
    $max = $_SESSION ['last_image'] - 1;
    $no = $no + 1;

    if ($no > $max)
    {

        header ("Location: screen_images.php");

    }

    else
    {

        $_SESSION ['no'] = $no;
        header ("Location: screen_images.php");

    }

?>