<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;
use assist\TestHelper;
use assist\CodetextWithType;
use Aspose\Barcode\DecodeType;
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\BarcodeQualityMode;

class Issue37489
{

    private const Folder = TestsAssist::TESTDATA_ROOT . "Issues/Issue37489/";

    function setUp(): void
    {
        TestsAssist::set_slicense();
    }

    public function test_Health_Form_1_AllTypes()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_1.png");
        TestHelper::checkForFakeBarcodes($fileName, array(new CodetextWithType(DecodeType::CODE_39, "X19228835")), null, null);
    }

    public function test_Health_Form_3_Code39()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_3.png");
        $reader = new BarCodeReader($fileName, null, DecodeType::CODE_39);
        {
            Assert::assertEquals(1, sizeof($reader->readBarCodes()));
            Assert::assertEquals("X19228836", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_Health_Form_3_AllTypes()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_3.png");
        TestHelper::checkForFakeBarcodes($fileName, array(new CodetextWithType(DecodeType::CODE_39, "X19228836")), null, null);
    }

    public function test_Health_Form_4_AllTypes()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_4.png");
        TestHelper::checkForFakeBarcodes($fileName, null, null, null);
    }


    public function test_Health_Form_5_Code39()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_5.png");
        $reader = new BarCodeReader($fileName, null, DecodeType::CODE_39);
        {
            $reader->getQualitySettings()->setBarcodeQuality(BarcodeQualityMode::LOW);
            Assert::assertEquals(1, sizeof($reader->readBarCodes()));
            Assert::assertEquals("X19228832", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_Health_Form_5_AllTypes()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_5.png");
        TestHelper::checkForFakeBarcodes($fileName, array(new CodetextWithType(DecodeType::CODE_39, "X19228832")), null, null);
    }

    public function test_Health_Form_6_AllTypes()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_6.png");
        TestHelper::checkForFakeBarcodes($fileName, array(new CodetextWithType(DecodeType::CODE_39, "X19228832")), null, null);
    }

    public function test_Health_Form_7_Code39()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_7.png");
        $reader = new BarCodeReader($fileName, null, DecodeType::CODE_39);
        {
            Assert::assertEquals(1, sizeof($reader->readBarCodes()));
            Assert::assertEquals("X19228833", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_Health_Form_7_AllTypes()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_7.png");
        TestHelper::checkForFakeBarcodes($fileName, array(new CodetextWithType(DecodeType::CODE_39, "X19228833")), null, null);
    }

    public function test_Health_Form_8_AllTypes()
    {
        $fileName = ta . TestsAssist::pathCombine(this . Folder, "multipage_8.png");
        TestHelper::checkForFakeBarcodes($fileName, null, null, null);
    }

    public function test_Health_Form_9_Code39()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_9.png");
        $reader = new BarCodeReader($fileName, null, DecodeType::CODE_39);
        {
            $reader->setQualitySettings(QualitySettings::getHighPerformance());
            Assert::assertEquals(1, sizeof($reader->readBarCodes()));
            Assert::assertEquals("X19228834", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    public function test_Health_Form_9_AllTypes()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_9.png");
        TestHelper::checkForFakeBarcodes($fileName, array( new CodetextWithType(DecodeType::CODE_39, "X19228834") ), null, null);
    }

    public function test_Health_Form_10_AllTypes()
    {
        $fileName = TestsAssist::pathCombine(self::Folder, "multipage_10.png");
        TestHelper::checkForFakeBarcodes($fileName, null, null, null);
    }
}

TestsLauncher::launch('\building\Issue37489', null);
