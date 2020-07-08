<?php
include_once('tests_assist.php');

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

function generate_and_read()
{
    set_license();
    $generator = new BarcodeGenerator(EncodeTypes::CODE_128, "12367891011");
    $file_path = "resources/generating/setBarcodeType.png";
    $generator->save($file_path, "PNG");

    $image_bytes = file_get_contents($file_path);
    $image_data_base64 = base64_encode($image_bytes);
    $reader = new BarcodeReader($image_data_base64, null, DecodeType::ALL_SUPPORTED_TYPES);

    if ($reader->read())
    {
        print "Recognized barcode code text: " . $reader->getCodeText(false) . "\n";
        print "Recognized barcode code type: " . $reader->getCodeTypeName() . "\n";
    }
    else
    {
        echo "Barcode was not recognized!";
    }

}

generate_and_read();
?>