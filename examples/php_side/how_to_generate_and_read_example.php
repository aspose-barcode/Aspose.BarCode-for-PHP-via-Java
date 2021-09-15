<?php
include_once('ExamplesAssist.php');

function generate_and_read()
{
    set_license();
    $generator = new BarcodeGenerator(EncodeTypes::CODE_128, "12367891011");
    $file_path = "resources/generating/setBarcodeType.png";
    $generator->save($file_path, BarCodeImageFormat::PNG);

    $image_bytes = file_get_contents($file_path);
    $image_data_base64 = base64_encode($image_bytes);
    $reader = new BarCodeReader($image_data_base64, null, DecodeType::ALL_SUPPORTED_TYPES);

    if (sizeof($reader->readBarCodes()) > 0)
    {
        print "Recognized barcode code text: " . $reader->readBarCodes()[0]->getCodeText() . "\n";
        print "Recognized barcode code type: " . $reader->readBarCodes()[0]->getCodeTypeName() . "\n";
    }
    else
    {
        echo "Barcode was not recognized!";
    }

}

generate_and_read();
?>