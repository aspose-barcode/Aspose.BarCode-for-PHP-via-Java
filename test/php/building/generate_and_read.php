<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;

include_once('./tests_assist.php');
include_once('Assert.php');

function generate_and_read()
{
    $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_128, "12367891011");
    $file_path = "../../resources/generating/generate_and_read.png";
    $generator->save($file_path, "PNG");
    Assert::assertFileExists($file_path);

    $image_bytes = file_get_contents($file_path);
    $image_data_base64 = base64_encode($image_bytes);
    $reader = new BarcodeReader($image_data_base64, null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
    $code_text_exp = "12367891011";
    $code_type_exp = "Code128";
    if ($reader->read())
    {
        $code_text_act = $reader->getCodeText(false);
        Assert::assertEquals($code_text_exp, $code_text_act, null);
        $code_type_act = $reader->getCodeTypeName(false);
        Assert::assertEquals($code_type_exp, $code_type_act, null);
    }
}

generate_and_read();