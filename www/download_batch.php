<?php

    // Copy the passed images to be downloaded //
    $src = "passed_images";
    $dst = "downloads/passed_images";
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) 
    {
        if (( $file != '.' ) && ( $file != '..' )) 
    {
            if ( is_dir($src . '/' . $file) ) 
            {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else 
            {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);

    // Copy the failed images to be downloaded //
    function xcopy($source, $dest, $permissions = 0755)
    {
        $sourceHash = hashDirectory($source);
        // Check for symlinks
        if (is_link($source)) 
        {
            return symlink(readlink($source), $dest);
        }

        // Simple copy for a file
        if (is_file($source)) 
        {
            return copy($source, $dest);
        }

        // Make destination directory
        if (!is_dir($dest)) 
        {
            mkdir($dest, $permissions);
        }

        // Loop through the folder
        $dir = dir($source);
        while (false !== $entry = $dir->read()) 
        {
            // Skip pointers
            if ($entry == '.' || $entry == '..') 
            {
                continue;
            }

            // Deep copy directories
            if($sourceHash != hashDirectory($source."/".$entry))
            {
                 xcopy("$source/$entry", "$dest/$entry", $permissions);
            }
        }

        // Clean up
        $dir->close();
        return true;
    }

    // In case of coping a directory inside itself, there is a need to hash check the directory otherwise and infinite loop of coping is generated

    function hashDirectory($directory){
        if (! is_dir($directory)){ return false; }

        $files = array();
        $dir = dir($directory);

        while (false !== ($file = $dir->read())){
            if ($file != '.' and $file != '..') {
                if (is_dir($directory . '/' . $file)) { $files[] = hashDirectory($directory . '/' . $file); }
                else { $files[] = md5_file($directory . '/' . $file); }
            }
        }

        $dir->close();

        return md5(implode('', $files));
    }
    
    // Calling the function //
    xcopy ("failed_images", "downloads/failed_images");

    // Get real path for our folder
    $rootPath = realpath('downloads');

    // Set zip file name //
    $file_name = date("Y-m-d") . "-" . date("His") . ".zip";

    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open("downloads/" . $file_name, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    // Create recursive directory iterator
    /** @var SplFileInfo[] $files */
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file)
    {
        // Skip directories (they would be added automatically)
        if (!$file->isDir())
        {
            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);

            // Add current file to archive
            $zip->addFile($filePath, $relativePath);
        }
    }

    // Zip archive will be created only after closing object
    $zip->close();

    function downloadFiles($dir, $file)
    {
        header("Content-type: application/force-download");
        header('Content-Disposition: inline; filename="' . $dir . $file . '"');
        header("Content-Transfer-Encoding: Binary");
        header("Content-length: " . filesize($dir . $file));
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        readfile("$dir$file");
    }

    // Set the directory //
    $dir = "downloads/";
    
    // Prompt the download //
    $download = downloadFiles($dir,$file_name);

    // Remove the files from web server //
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

    // Clear the directory //
    rrmdir($dir);

    // Iniatialize the directory //
    mkdir("downloads");

    header ("Location: batch_management.php");

?>