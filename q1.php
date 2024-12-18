<?php
if (!headers_sent()) {
    header("Content-Type: image/png");

    $logoPath = 'logo.png';

    if (file_exists($logoPath)) {
        $background = imagecreatefrompng($logoPath);
        $backgroundWidth = 400;
        $backgroundHeight = 100;

        $image = imagecreatetruecolor($backgroundWidth, $backgroundHeight);
        imagecopyresampled($image, $background, 0, 0, 0, 0, $backgroundWidth, $backgroundHeight, imagesx($background), imagesy($background));

        $white = imagecolorallocate($image, 255, 255, 255);

        imagestring($image, 5, 50, 40, "Welcome to Our Shop!", $white);

        imagepng($image);

        imagedestroy($image);
        imagedestroy($background);
    } else {
        echo "Logo file not found.";
    }

    exit;
} else {
    echo "PHP headers already sent. Cannot output the image.";
}
?>