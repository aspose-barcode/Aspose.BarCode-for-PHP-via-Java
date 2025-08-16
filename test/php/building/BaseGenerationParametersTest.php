<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;



class BaseGenerationParametersTest
{
    private $folder_path = \assist\TestsAssist::RESULTS_ROOT . "BaseGenerationParametersTests /";

     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testBaseGenerationParameters()
      {
          // printTestFullName ($this);

        $barcodeGenerator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::EAN_14, "332211");
        $baseGenerationParameters = $barcodeGenerator->getParameters();
        $baseGenerationParameters->printJavaClassName();

        $expectedBackColor = "#FFFFFF";
        $expectedResolution = 24;
        $expectedRotationAngle = 30;

        $baseGenerationParameters->setBackColor($expectedBackColor);
        $baseGenerationParameters->setResolution($expectedResolution);
        $baseGenerationParameters->setRotationAngle($expectedRotationAngle);

        Assert::assertEquals($expectedBackColor, $baseGenerationParameters->getBackColor());
        Assert::assertEquals($expectedResolution, $baseGenerationParameters->getResolution());
        Assert::assertEquals($expectedRotationAngle, $baseGenerationParameters->getRotationAngle());

        $barcodeGenerator->save($this->folder_path . "BaseGenerationParametersTest1.png", "PNG");
    }
}
TestsLauncher::launch('\building\BaseGenerationParametersTest', null);
