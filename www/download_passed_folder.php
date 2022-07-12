<?php

    // Get real path for our folder
    $rootPath = realpath('passed_images');

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

    // Remove the zip file from web server //
    array_map ('unlink', array_filter((array) glob("downloads/*")));

?>