<?php
$fileURL = isset($_GET['link']) ? $_GET['link'] : '';

$title = isset($_GET['title']) ? $_GET['title'] : 'downloaded_file';
$fileType = isset($_GET['fileType']) ? $_GET['fileType'] : 'mp4';

if (!empty($fileURL) && substr($fileURL, 0, 8) === 'https://') {
    // $fileContent = file_get_contents($fileURL);

     $fileName = $title . '.' . $fileType;

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment;filename=\"$fileName\"");
    header("Content-Transfer-Encoding: binary");
    header("Content-Type: application/octet-stream");

    readfile($fileURL);
} else {
    echo "Invalid file URL provided.";
}
