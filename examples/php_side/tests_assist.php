<?php
require_once("http://localhost:8888/JavaBridge/java/Java.inc");
//require_once("Java.inc"); // for case when port is 8080
include_once('../../lib/Generator.php');
include_once('../../lib/Reader.php');
include_once('../../lib/Complexbarcode.php');
function loadImageByName($subFolder, $fileName)
{
    $filePath = "$subFolder/$fileName";
    $image_data_base64 = load_image_base64_from_path($filePath);
    return $image_data_base64;
}

function load_image_base64_from_path($filePath)
{
    $image_bytes = file_get_contents($filePath);
    $image_data_base64 = base64_encode($image_bytes);
    return $image_data_base64;
}

?>
