<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class Issue37422
{
    /// <summary>
    /// Path to folder with files for testing Issue37391.
    /// </summary>
    private const Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37422/";

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_Health_Form_1_Code39()
    {
        $fileName = self::Folder . "20031819000001_nfnb.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getHighPerformance());
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("X19228835", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    public function test_Health_Form_1_AllTypes()
    {
        $fileName = self::Folder . "20031819000001_nfnb.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getHighPerformance());
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("X19228835", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    public function test_Health_Form_2_Code39()
    {
        $fileName = self::Folder . "20031819000002_nfnb.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getHighPerformance());
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("X19228836", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    public function test_Health_Form_2_AllTypes()
    {
        $fileName = self::Folder . "20031819000002_nfnb.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getHighPerformance());
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("X19228836", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    public function test_Health_Form_3_Code39()
    {
        $fileName = self::Folder . "20031819000003_nfnb.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getHighPerformance());
            Assert::assertEquals(1, sizeOf($reader->readBarCodes()));
            Assert::assertEquals("X19228832", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    public function test_Health_Form_3_AllTypes()
    {
        $fileName = self::Folder . "20031819000003_nfnb.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getHighPerformance());
            Assert::assertEquals(1, sizeOf($reader->readBarCodes()));
            Assert::assertEquals("X19228832", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }
}

TestsLauncher::launch('\building\Issue37422', null);

//$issue37422 = new Issue37422();
//$issue37422->test_Health_Form_1_AllTypes();
//$issue37422->test_Health_Form_1_Code39();
//$issue37422->test_Health_Form_2_AllTypes();
//$issue37422->test_Health_Form_2_Code39();
//$issue37422->test_Health_Form_3_AllTypes();
//$issue37422->test_Health_Form_3_Code39();