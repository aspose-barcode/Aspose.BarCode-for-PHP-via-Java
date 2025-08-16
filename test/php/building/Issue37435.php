<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class Issue37435
{
    private const Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37417";
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_DataMatrix_with_arabic_text_throws_no_exception()
    {
        $BarCodeText = "منحة";

        $objBarCodeBuilder = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::DATA_MATRIX, $BarCodeText);

        $objBarCodeBuilder->getParameters()->getBarcode()->getDataMatrix()->setDataMatrixEncodeMode(DataMatrixEncodeMode::FULL);
        $objBarCodeBuilder->getParameters()->getBarcode()->getXDimension()->setPixels(2);

        Assert::assertNotNull($objBarCodeBuilder->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
    }
}

TestsLauncher::launch('\building\Issue37435', null);
