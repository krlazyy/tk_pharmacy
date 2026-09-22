<?php 
include('../phpqrcode/qrlib.php'); // Include the PHP QR Code library
include('conn.php'); // Database connection

// Directory to save QR codes
$tempDir = "../qrcodes/";
if (!file_exists($tempDir)) {
    mkdir($tempDir, 0777, true);
}

// The content to encode into the QR code
$codeContents = 'This Goes From File';

// Generate a unique filename based on the content
$fileName = '005_file_' . md5($codeContents) . '.png';
$pngAbsoluteFilePath = $tempDir . $fileName;
$urlRelativeFilePath = $tempDir . $fileName;

// Check if the QR code file already exists
if (!file_exists($pngAbsoluteFilePath)) {
    QRcode::png($codeContents, $pngAbsoluteFilePath);
    echo 'Authorized QR code generated!';
} else {
    echo 'File already generated! Using cached file to speed up site.';
}

echo '<hr />';
echo 'Server PNG File: ' . $pngAbsoluteFilePath;
echo '<hr />';
echo '<img src="' . $urlRelativeFilePath . '" alt="QR Code" />';
?>
