<?php

namespace assist;
include_once('../../assist/TestsAssist.php');

class IOTestUtils
{
    public static function loadToBase64Image($fileName): string
    {
        return TestsAssist::load_image_base64_from_path($fileName);
    }

    public static function saveBase64ImageToFile(string $lpath, $generatedBase64BarcodeImage)
    {
        // open the output file for writing
        $ifp = fopen($lpath, 'wb');

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode(',', $generatedBase64BarcodeImage);

        // we could add validation here with ensuring count( $data ) > 1
        fwrite($ifp, base64_decode($data[1]));

        // clean up the file resource
        fclose($ifp);
    }
}