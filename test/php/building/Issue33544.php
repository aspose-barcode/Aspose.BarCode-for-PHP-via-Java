<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use BarcodeQualityMode;
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;
use assist\QRStructuredAppendData;

class Issue33544
{
    private $folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue33544/";

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }


    public function testPage1()
    {
        $fileName = $this->folder . "Page1.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals(":AAAB7DWG0TzWBA", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


    public function testPage1Cutted()
    {
        $fileName = $this->folder . "Page1_cutted.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals(":AAAB7DWG0TzWBA", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


    public function testPage2()
    {
        $fileName = $this->folder . "Page2.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        $reader->getQualitySettings()->setBarcodeQuality(BarcodeQualityMode::LOW);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals(":AAAB7DWG0TzWBA", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


    public function testPage2Cutted()
    {
        $fileName = $this->folder . "Page2_cutted.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        $reader->getQualitySettings()->setBarcodeQuality(BarcodeQualityMode::LOW);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals(":AAAB7DWG0TzWBA", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


    public function testPage3()
    {
        $fileName = $this->folder . "Page3.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals(":AAAB7DWG0TzWBA", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


    public function testPage3Cutted()
    {
        $fileName = $this->folder . "Page3_cutted.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals(":AAAB7DWG0TzWBA", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


    public function testPage4Rotated()
    {
        $fileName = $this->folder . "Page4.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        $reader->getQualitySettings()->setBarcodeQuality(BarcodeQualityMode::LOW);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals(":AAAB7DWG0TzWBA", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


    public function testPage5()
    {
        $fileName = $this->folder . "Page5.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 2);
        Assert::assertEquals("(p1:AAAB7DWG0TzWBA)SA20130514a|X:60;Opt:OR;COESA:0%;AP:ApAct;U:UK;COEGL:0%;PV:PI;RG:RUC;CST:None;ACLim:AEMP;YY:IMS-EILP", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        Assert::assertEquals(":AAAB7DWG0TzWBA", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
    }


    public function testPage6()
    {
        $fileName = $this->folder . "Page6.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals(":AAAB7DNGiKyRNg", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


    public function testPage7()
    {
        $fileName = $this->folder . "Page7.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals(":AAAB7DNGiKyRNg", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


    public function testPage8()
    {
        $fileName = $this->folder . "Page8.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            $lCodetexts = array();
            foreach ($reader->readBarCodes() as $result)
                array_push($lCodetexts, $result->getCodeText("UTF-8"));
            Assert::assertEquals(2, sizeof($lCodetexts));
            Assert::assertTrue(in_array("(p1:AAAB7DNGiKyRNg)SA20130514a|X:60;Opt:OR;COESA:0%;AP:ApAct;U:UK;COEGL:0%;PV:PI;RG:RUC;CST:None;ACLim:AEMP;YY:IMS-EILP", $lCodetexts));
            Assert::assertTrue(in_array(":AAAB7DNGiKyRNg", $lCodetexts));
        }
    }
}

TestsLauncher::launch('\building\Issue33544', null);