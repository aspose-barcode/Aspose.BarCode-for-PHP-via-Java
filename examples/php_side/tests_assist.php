<?php
require_once("http://localhost:8888/JavaBridge/java/Java.inc");
//require_once("Java.inc"); // for case when port is 8080
include_once('../../lib/Generation.php');
include_once('../../lib/Recognition.php');
include_once('../../lib/ComplexBarcode.php');

function set_license()
{
    $path_to_license_file = "lic/Aspose.BarCode.PHP.Java.lic";
    $license = new License();
    if (!is_exists($path_to_license_file))
    {
        print("Path \"" . $path_to_license_file . "\" doesn't exist\n");
    }
    else
    {
        $license->setLicense($path_to_license_file);
    }
    $is_licensed = $license->isLicensed();
    prt_mess('is_licensed => ' . $is_licensed);
}

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
