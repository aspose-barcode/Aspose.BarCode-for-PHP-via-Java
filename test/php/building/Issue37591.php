<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\TestHelper;
use assist\TestsLauncher;
use assist\TestsAssist;
use assist\Assert;

class Issue37591
{
    private const folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37591/php";

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_Codabar_WideNarrowRatio_Default()
    {
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODABAR, "123456789");
        $generator->getParameters()->getBarcode()->getXDimension()->setPixels(3);
        $realImage = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        $fileName = self::folder . "/Codabar_WideNarrowRatio_Default.png";
        $expectedImage = load_image_base64_from_path($fileName);
        TestHelper::compareImagesBase64($expectedImage, $realImage);
    }

    public function test_Codabar_WideNarrowRatio_3()
    {
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODABAR, "123456789");
        $generator->getParameters()->getBarcode()->getXDimension()->setPixels(3);
        $generator->getParameters()->getBarcode()->setWideNarrowRatio(3);
        $realImage = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        $fileName = self::folder . "/Codabar_WideNarrowRatio_3.png";
        $expectedImage = load_image_base64_from_path($fileName);
        TestHelper::compareImagesBase64($expectedImage, $realImage);
    }

    public function test_Codabar_WideNarrowRatio_4()
    {
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODABAR, "123456789");
        $generator->getParameters()->getBarcode()->getXDimension()->setPixels(3);
        $generator->getParameters()->getBarcode()->setWideNarrowRatio(4);
        $realImage = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        $fileName = self::folder . "/Codabar_WideNarrowRatio_4.png";
        $expectedImage = load_image_base64_from_path($fileName);
        TestHelper::compareImagesBase64($expectedImage, $realImage);
    }
}
TestsLauncher::launch('\building\Issue37591', null);

?>
