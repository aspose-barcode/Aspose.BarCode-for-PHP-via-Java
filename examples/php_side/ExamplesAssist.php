<?php

$port = readProperty("port");
print("port number is ".$port."\n");
$java_inc_path = "http://localhost:".$port."/JavaBridge/java/Java.inc";
print("java_inc_path is ".$java_inc_path."\n");
require_once($java_inc_path);
$libs_root = '../../../../../../publish/lib/php7/';
if(!is_dir($libs_root))
{
    $libs_root = '../../lib/php7/';
}

if(!is_dir($libs_root))
{
    $libs_root = '../../lib/';
}

print("libs_root is ".$libs_root."\n");

include_once($libs_root.'Generation.php');
include_once($libs_root.'Recognition.php');
include_once($libs_root.'ComplexBarcode.php');
include_once($libs_root.'Joint.php');


function set_license()
{
    print("set license\n");
    $path_to_license_file = readProperty("license_path");
    print("value path_to_license_file from ini file ".$path_to_license_file)."\n";
    if (empty($path_to_license_file))
    {
        print("value path_to_license_file from ini file was not read. Set default value"."\n");
        $path_to_license_file = "lic/Aspose.BarCode.PHP.Java.lic";
    }
    $license = new License();
    if (!file_exists($path_to_license_file))
    {
        print("Path \"" . $path_to_license_file . "\" doesn't exist\n");
    }
    else
    {
        print("Path \"" . $path_to_license_file . "\" exists\n");
        $license->setLicense($path_to_license_file);
    }
    $is_licensed = $license->isLicensed();
    print('is_licensed => ' . $is_licensed."\n");
}

function readProperty(string $propertyName)
{
    $ini_file_path = "examples.ini";
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


function parse_examples_ini()
{
    $ini_array = parse_ini_file("examples.ini");
    print($ini_array['port']."\n");
    print( $ini_array['license_path']."\n");
    define('port', $ini_array['port']);
    define('license_name', $ini_array['license_path']);
}

//parse_examples_ini();
//set_license();

?>
