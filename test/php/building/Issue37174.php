<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;
use DeconvolutionMode;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;
use assist\QRStructuredAppendData;

class Issue37174
{
    /// <summary>
    /// Path to folder with files for testing Issue37174.
    /// </summary>
    private $folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37174/";


    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    private function testRecognizedImage(string $afolder, string $aFilename, $aDecodeType, string $CodeText)
    {
        $this->testRecognizedImageAllowMedianSmoothing($afolder, $aFilename, $aDecodeType, $CodeText, false);
    }

    private function testRecognizedImageAllowMedianSmoothing(string $afolder, string $aFilename, $aDecodeType, string $CodeText, bool $isDeconvolutionModeSlow)
    {
        $fileName = $afolder . $aFilename;
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, $aDecodeType);
        {
            if ($isDeconvolutionModeSlow)
                $reader->getQualitySettings()->setDeconvolution(DeconvolutionMode::SLOW);
            $lCodetexts = array();
            foreach ($reader->readBarCodes() as $result)
                array_push($lCodetexts, $result->getCodeText("UTF-8"));

            Assert::assertEquals(1, sizeof($lCodetexts), "Recognition of " . $aFilename . " failed");
            Assert::assertTrue(in_array($CodeText, $lCodetexts));
        }
    }

    private function testFailedImage(string $afolder, string $aFilename, $aDecodeType)
    {
        $fileName = $afolder . $aFilename;
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, $aDecodeType);
        {
            $lCodetexts = array();
            foreach ($reader->readBarCodes() as $result)
                array_push($lCodetexts, $result->getCodeText("UTF-8"));

            Assert::assertEquals(0, sizeof($lCodetexts), $aFilename . " is ok, need to fix this test");
        }
    }


    public function test_003()
    {
        $fileName = $this->folder . "003.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, array(\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39, \Aspose\Barcode\DecodeType::DATA_MATRIX));
        {
            $lCodetexts = array();
            foreach ($reader->readBarCodes() as $result)
                array_push($lCodetexts, $result->getCodeText("UTF-8"));

            Assert::assertTrue(sizeof($lCodetexts) >= 7, "Recognition of 003.tif failed");
            Assert::assertTrue(in_array("SPACEHOLDER", $lCodetexts));
            Assert::assertTrue(in_array("Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Ind", $lCodetexts));
            //new codes
            Assert::assertEquals(sizeof($lCodetexts), 7, "New recognitions, need to fix this test.");
        }
    }


    public function test_003_Code39_cut_01()
    {
        $this->testRecognizedImage($this->folder, "003_Code39_cut_01.png", array(\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39), "SPACEHOLDER");
    }


    public function test_003_datamatrix_cut_06()
    {
        $this->testRecognizedImage($this->folder, "003_datamatrix_cut_06.png", \Aspose\Barcode\DecodeType::DATA_MATRIX, "Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Ind");
    }


    public function test_003_datamatrix_cut_04()
    {
        $this->testRecognizedImage($this->folder, "003_datamatrix_cut_04.png", \Aspose\Barcode\DecodeType::DATA_MATRIX, "Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Ind");
    }


    public function test_003_datamatrix_cut_01()
    {
        $this->testRecognizedImage($this->folder, "003_datamatrix_cut_01.png", \Aspose\Barcode\DecodeType::DATA_MATRIX, "Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Ind");
    }


    public function test_003_datamatrix_cut_02()
    {
        $this->testRecognizedImageAllowMedianSmoothing($this->folder, "003_datamatrix_cut_02.png", \Aspose\Barcode\DecodeType::DATA_MATRIX, "Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Ind", true);
    }


    public function test_003_datamatrix_cut_03()
    {
        $this->testRecognizedImage($this->folder, "003_datamatrix_cut_03.png", \Aspose\Barcode\DecodeType::DATA_MATRIX, "Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Ind");
    }


    public function test_003_datamatrix_cut_05()
    {
        $this->testRecognizedImage($this->folder, "003_datamatrix_cut_05.png", \Aspose\Barcode\DecodeType::DATA_MATRIX, "Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Indigo Pacific Pte Ltd | 1234567890 | ^ | Ind");
    }
}

TestsLauncher::launch('\building\Issue37174', null);