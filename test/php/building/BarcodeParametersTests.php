<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use Aspose\Barcode\AutoSizeMode;
use Aspose\Barcode\BarcodeGenerator;
use Aspose\Barcode\EncodeTypes;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class BarcodeParametersTests
{
    private $folder_path = \assist\TestsAssist::RESULTS_ROOT . "BarcodeParametersTests /";

     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testBarcodeParameters()
     {
          // printTestFullName ($this);

        $expectedNewCodeText = "UPDATED_NEW";
        $expForeColor = "#0C3925";

        $expAutoSizeMode = AutoSizeMode::NEAREST;
        $expBarCodeHeight = 91;
        $expBarCodeWidth = 133;
        $expBarHeight = 1;

        $barcodeGenerator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_128, "1234567891");
        $baseGenerationParameters = $barcodeGenerator->getParameters();
        $barcodeParameters = $baseGenerationParameters->getBarcode();
        $barcodeParameters -> printJavaClassName();
        $barcodeGenerator->setCodeText($expectedNewCodeText);
        Assert::assertEquals($expectedNewCodeText, $barcodeGenerator->getCodeText("UTF-8"));

        $barcodeParameters->setBarColor($expForeColor);
        Assert::assertEquals($expForeColor, $barcodeParameters->getBarColor());

        $baseGenerationParameters->setAutoSizeMode($expAutoSizeMode);
        Assert::assertEquals($expAutoSizeMode, $baseGenerationParameters->getAutoSizeMode());

         $baseGenerationParameters->getImageHeight()->setMillimeters($expBarCodeHeight);
        Assert::assertEquals($expBarCodeHeight, $baseGenerationParameters->getImageHeight()->getMillimeters());

         $baseGenerationParameters->getImageWidth()->setMillimeters($expBarCodeWidth);
        Assert::assertEquals($expBarCodeWidth, $baseGenerationParameters->getImageWidth()->getMillimeters());

        $barcodeParameters->getBarHeight()->setMillimeters($expBarHeight);
        Assert::assertEquals($expBarHeight, $barcodeParameters->getBarHeight()->getMillimeters());

        $barcodeGenerator->save($this->folder_path . "BarcodeParametersTest1.png", "PNG");
    }
}
TestsLauncher::launch('\building\BarcodeParametersTests', null);
