<?php

    session_start ();

    $max = $_SESSION ['last_image'] - 1;

    $_SESSION ['no'] = $max;
    header ("Location: screen_images.php");

?>