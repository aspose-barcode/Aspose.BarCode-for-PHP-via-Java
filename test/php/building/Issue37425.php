<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class Issue37425
{

    private const Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37425/";
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }
    public function test_barcode()
    {
        $fileName = self::Folder . "barcode.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::QR);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("Truth resides silently in the seat of power\r\n~670055", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    public function test_QrCode_uy95()
    {
        $fileName = self::Folder . "QrCode_uy95.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::QR);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("Silence is the ultimate weapon of power\r\n~676321", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    public function test_QrCode_wv31()
    {
        $fileName = self::Folder . "QrCode_wv31.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::QR);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("Silence is the ultimate weapon of power\r\n~677895", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }
}
TestsLauncher::launch('\building\Issue37425', null);

//$issue37425 = new Issue37425();
//$issue37425->test_barcode();
//$issue37425->test_QrCode_uy95();
//$issue37425->test_QrCode_wv31();