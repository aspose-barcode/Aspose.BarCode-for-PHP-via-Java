<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class GenerateAndReadTests
{

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    function generateAndRead(): void
    {
        $folder_path = \assist\TestsAssist::RESULTS_ROOT . "GenerateAndReadTests/";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_128, "12367891011");
        $file_path = $folder_path . "generateAndRead.png";
        $generator->save($file_path, "PNG");
        Assert::assertFileExists($file_path);

        $image_bytes = file_get_contents($file_path);
        $image_data_base64 = base64_encode($image_bytes);
        $reader = new \Aspose\Barcode\BarCodeReader($image_data_base64, null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        $code_text_exp = "12367891011";
        $code_type_exp = "Code128";
        foreach ($reader->readBarCodes() as $res)
        {
            $code_text_act = $res->getCodeText("UTF-8");
            Assert::assertEquals($code_text_exp, $code_text_act);
            $code_type_act = $res->getCodeTypeName();
            Assert::assertEquals($code_type_exp, $code_type_act);
        }
    }
}

TestsLauncher::launch('\building\GenerateAndReadTests', null);
