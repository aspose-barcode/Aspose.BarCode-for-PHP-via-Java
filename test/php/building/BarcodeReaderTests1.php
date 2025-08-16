<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class BarcodeReaderTests1
{
    private $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testReadFromFile()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $file_name = "mzl.jpg";
        $full_path = $this->subfolder.$file_name;
        $reader = new \Aspose\Barcode\BarCodeReader($full_path, null, null);
        $expected_code_text = "99700161000002701082204000";
        $expected_code_type = "Code128";
        foreach($reader->readBarCodes() as $res)
        {
            Assert::assertEquals($expected_code_text, $res->getCodeText("UTF-8"));
            Assert::assertEquals($expected_code_type, $res->getCodeTypeName());
        }
    }

    public function testSetQualitySettings()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $file_name = "mzl.jpg";
        $full_path = $this->subfolder.$file_name;
        $expected_code_text = "99700161000002701082204000";
        $expected_code_type = "Code128";
        $reader = new \Aspose\Barcode\BarCodeReader($full_path, null, null);
        $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getHighPerformance());
        $reader->getQualitySettings()->setAllowMedianSmoothing(true);
        $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);

        foreach($reader->readBarCodes() as $res)
        {
            Assert::assertEquals($expected_code_text, $res->getCodeText("UTF-8"));
            Assert::assertEquals($expected_code_type, $res->getCodeTypeName());
        }
    }


    public function testGetCodeBytes()
    {
        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $expectedCodeBytes = array("57","57","55","48","48","49","54","49","48","48","48","48","48","50","55","48","49","48","56","50","50","48","52","48","48","48");
        $fileName = "mzl.jpg";
        $reader = new \Aspose\Barcode\BarCodeReader(loadImageByName($subfolder, $fileName), null, null);
        foreach($reader->readBarCodes() as $res)
        {
            $actualCodeBytes = $res->getCodeBytes();
            Assert::assertEquals(sizeof($expectedCodeBytes), sizeof($actualCodeBytes));
        }
    }


    public function testRecognitionCode128()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        try
        {
            $fileName = "Code128.jpg";
            $reader = new \Aspose\Barcode\BarCodeReader(loadImageByName($this->subfolder, $fileName), null, \Aspose\Barcode\DecodeType::CODE_128);
            $res = $reader->readBarCodes();
            Assert::assertTrue(sizeof($res) > 0);
            Assert::assertEquals("Code128", $res[0]->getCodeTypeName());
            Assert::assertEquals("<FNC1>BARCODE12345", $res[0]->getCodeText("UTF-8"));
        }
        catch (BarcodeException $e)
        {
            print($e->getMessage());
        }
    }

    public function testRecognitionSetBarCodeImage()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $fileName = "Code128.jpg";
        $reader = new \Aspose\Barcode\BarCodeReader(loadImageByName($this->subfolder, $fileName), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        $reader->setBarCodeImage($this->subfolder . "asposeCode1281.png", null);
        $res = $reader->readBarCodes();
        Assert::assertTrue(sizeof($res) > 0);
        Assert::assertEquals("Code128", $res[0]->getCodeTypeName());
        Assert::assertEquals("Night. Street. Lamp.", $res[0]->getCodeText("UTF-8"));
    }

    public function testRecognitionSetBarCodeImageWithArea()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $fileName = "Code128.jpg";
        $rect1 = new Rectangle(20, 210, 230, 120);
        $reader = new \Aspose\Barcode\BarCodeReader(loadImageByName($this->subfolder, $fileName), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        $reader->setBarCodeImage($this->subfolder . "mzl.jpg", $rect1);
        foreach($reader->readBarCodes() as $res)
        {
            Assert::assertEquals("Code128", $res->getCodeTypeName());
            Assert::assertEquals("99700161000002701082204000", $res->getCodeText("UTF-8"));
        }
    }

    public function testRecognitionSetBarCodeImageWithAreas()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $folder = \assist\TestsAssist::TESTDATA_ROOT."Issues/Issue33502/";
        $fileName = "36828.jpg";
        $rect1 = new Rectangle(30, 40, 260, 300);
        $rect2 = new Rectangle(480, 620, 190, 200);
        $reader = new \Aspose\Barcode\BarCodeReader(loadImageByName($folder, $fileName), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        $reader->setBarCodeImage($folder.$fileName, $rect1, $rect2);
        $res = $reader->readBarCodes();
        Assert::assertTrue(sizeof($res) > 0);
        Assert::assertEquals("QES265", $res[0]->getCodeText("UTF-8"));
        Assert::assertEquals("AUTOMATEDAPPROVAL", $res[1]->getCodeText("UTF-8"));
    }
}

TestsLauncher::launch('\building\BarcodeReaderTests1', null);
//$barcodeReaderTests = new BarcodeReaderTests1();
//$barcodeReaderTests->testReadFromFile();
//$barcodeReaderTests->testSetQualitySettings();
//$barcodeReaderTests->testGetCodeBytes();
//$barcodeReaderTests->testRecognitionCode128();
//$barcodeReaderTests->testRecognitionSetBarCodeImage();
//$barcodeReaderTests->testRecognitionSetBarCodeImageWithArea();
//$barcodeReaderTests->testRecognitionSetBarCodeImageWithAreas();