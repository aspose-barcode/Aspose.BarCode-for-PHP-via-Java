<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;



class QrGenerationTest
{
    private $codeText = "12345";

     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testQrBase()
       {
          // printTestFullName ($this);

        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::QR, $this->codeText);
        $image_bytes = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        Assert::assertTrue(saveImageResult($image_bytes, \assist\TestsAssist::RESULTS_ROOT . "QrGenerationTests", "testQrBase.png"));
    }

    public function testQrWithErrorLevel()
       {
          // printTestFullName ($this);

        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::QR, $this->codeText);
        $generator->getParameters()->getBorder()->setVisible(true);
        $generator->getParameters()->getBorder()->getWidth()->setPixels(10);
        $image_bytes = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        Assert::assertTrue(saveImageResult($image_bytes, \assist\TestsAssist::RESULTS_ROOT . "QrGenerationTests", "testQrWithErrorLevel.png"));

        Assert::assertTrue(check_image_bytes($image_bytes, $this->codeText, \Aspose\Barcode\DecodeType::QR));
//        Assert::assertTrue(check_image_path(\assist\TestsAssist::RESULTS_ROOT ."QrGenerationTests/testQrWithErrorLevel.png", $this->codeText, \Aspose\Barcode\DecodeType::QR));
    }


}

TestsLauncher::launch('\building\QrGenerationTest', null);
