<?php
require_once("http://localhost:8888/JavaBridge/java/Java.inc");
//require_once("Java.inc"); // for case when port is 8080
$libs_root = '../../../lib/php7/';

include_once($libs_root.'Generation.php');
include_once($libs_root.'Recognition.php');
include_once($libs_root.'ComplexBarcode.php');
include_once($libs_root.'Joint.php');

function set_license()
{
    print("set license\n");
    $path_to_license_file = readProperty("license_path");
    if (empty($path_to_license_file))
    {
        $path_to_license_file = "lic/Aspose.BarCode.PHP.Java.lic";
    }
    $license = new License();
    if (!file_exists($path_to_license_file))
    {
        print("Path \"" . $path_to_license_file . "\" doesn't exist\n");
    }
    else
    {
        $license->setLicense($path_to_license_file);
    }
    $is_licensed = $license->isLicensed();
    print('is_licensed => ' . $is_licensed."\n");
}

function readProperty(string $propertyName)
{
    $ini_file_path = "assist.ini";
    $ini_array = parse_ini_file($ini_file_path);
    return $ini_array[$propertyName];
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

function saveBase64Image($base64Image, $filePath)
{
    print("Image will be saved to : $filePath"."\n");
    file_put_contents($filePath, base64_decode($base64Image));
}

?>
