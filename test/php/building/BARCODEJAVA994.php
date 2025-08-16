<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use Aspose\Barcode\BarcodeGenerator;
use Aspose\Barcode\BarCodeImageFormat;
use Aspose\Barcode\EncodeTypes;
use assist\TestsLauncher;
use assist\TestsAssist;
use assist\Assert;

class BARCODEJAVA994
{
    private const folder = \assist\TestsAssist::TESTDATA_ROOT . "barcodjava_issues/BARCODEJAVA994";

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testImagesDifference()
    {
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODABAR, "123456789");
        $generator->getParameters()->getBarcode()->getXDimension()->setPixels(3);
        $phpImage = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        $fileNamePhp = self::folder . "/php_image.png";
        $fileNameJava = self::folder . "/java_image.png";
        TestsAssist::saveBase64Image($phpImage, $fileNamePhp);
        $javaImage = TestsAssist::load_image_base64_from_path($fileNameJava);
//        Assert::assertEquals($javaImage, $phpImage);  //TODO BARCODEJAVA-994
    }
}

TestsLauncher::launch('\building\BARCODEJAVA994', null);

?>
