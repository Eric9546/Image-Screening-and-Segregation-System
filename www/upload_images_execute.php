<?php

    $target_dir = "uploads/";
    $total = count($_FILES['myfile']['tmp_name']);
    $size = 0;

    // Preprocessing of the upload //

    // Check if more than 1000 files //
    if ($total > 1000)
    {

        echo ("<script>location.href = 'limit_error.php';</script>");
        exit();

    }

    for ($i=0; $i < $total ; $i++)
    {

        // Check if image file is a actual image or fake image //
        $check = getimagesize($_FILES["myfile"]["tmp_name"][$i]);
        if($check == false)
        {

            echo ("<script>location.href = 'type_error.php';</script>");
            exit();
            
        } 

        // Check if image file is more than 75MB //
        $size = $size + $_FILES["myfile"]["size"][$i];
        if ($_FILES["myfile"]["size"][$i] > 78643200)
        {

            echo ("<script>location.href = 'image_oversize.php';</script>");
            exit();  

        }

    }

    // Make sure total upload size do not exceed 1000MB //
    if ($size > 1048576000) 
    {

        echo ("<script>location.href = 'total_oversize.php';</script>");
        exit();    

    }

    else
    {  

        $myfile = fopen("data/uploads.txt", "a");

        for ($i=0; $i < $total ; $i++)
        {
      
            $filename = $_FILES['myfile']['name'][$i];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $date = date("Y-m-d") . "-" . date("His" . "-");
            $target_file = $target_dir . $date . $i . "." . $extension;     
            
            fwrite($myfile, $target_file . "\n");

            // Upload the file successfully //
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $target_file)) 
            {

                echo ("<script>location.href = 'upload_success.php';</script>");                        

            } 
      
            // Error while uploading //
            else 
            {

                echo ("<script>location.href = 'error.php';</script>"); 
                exit();           

            }

        }

        fclose($myfile);
 
    }

?>