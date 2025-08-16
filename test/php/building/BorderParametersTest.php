<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;



class BorderParametersTest
{
    private $folder_path = \assist\TestsAssist::RESULTS_ROOT . "BorderParametersTests/";

     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testSetAustralianPostShortBarHeight()
       {
          // printTestFullName ($this);

        $barcodeGenerator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AUSTRALIA_POST, "1134567891");
        $baseGenerationParameters = $barcodeGenerator->getParameters();
        $barcodeParameters = $baseGenerationParameters->getBarcode();
        $australianPostParameters = $barcodeParameters->getAustralianPost();
        $australianPostParameters->getAustralianPostShortBarHeight()->setPixels(2);
        $image_to_save = $this->folder_path . "testHeight.png";
        $barcodeGenerator->save($image_to_save, "PNG");
        Assert::assertTrue(is_exists($image_to_save));
    }

    public function testBorderParameters()
       {
          // printTestFullName ($this);

        $expBorderColor = "#AAAAAA";
        $expDashStyle = \Aspose\Barcode\BorderDashStyle::DOT;
        $expVisible = true;

        $barcodeGenerator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_128, "1234567891");
        $borderParameters = $barcodeGenerator->getParameters()->getBorder();
        $borderParameters->printJavaClassName();

        $unit = $borderParameters->getWidth();
        $expectedMm = 2;
        $unit->setMillimeters($expectedMm);

        $borderParameters->setVisible($expVisible);
        $borderParameters->setColor($expBorderColor);
        $borderParameters->setDashStyle($expDashStyle);

        Assert::assertTrue($borderParameters->getVisible());
        Assert::assertEquals($expectedMm, $borderParameters->getWidth()->getMillimeters());
        Assert::assertEquals($expBorderColor, $borderParameters->getColor());
        Assert::assertEquals($expDashStyle, $borderParameters->getDashStyle());

        $barcodeGenerator->save($this->folder_path . "BorderParametersTest1.png", "PNG");
    }
}
TestsLauncher::launch('\building\BorderParametersTest', null);
