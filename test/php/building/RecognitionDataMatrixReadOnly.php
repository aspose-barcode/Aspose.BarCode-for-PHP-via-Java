<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;


class RecognitionDataMatrixReadOnly
{
    private $_folder;

    function setUp(): void
    {
        $this->_folder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/DataMatrix/";
        \assist\TestsAssist::set_slicense();
    }


    //[Category("DataMatrix")]
    public function test_qrcode_png_DataMatrix()
    {
        $reader = new \Aspose\Barcode\BarCodeReader($this->_folder . "qrcode.png", null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


    //[Category("DataMatrix")]
    public function test_AsposeLogo_png_DataMatrix()
    {
        $reader = new \Aspose\Barcode\BarCodeReader($this->_folder . "AsposeLogo.png", null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


    //[Category("DataMatrix")]
    public function test_color_000099_abc_bmp_DataMatrix()
    {
        $reader = new \Aspose\Barcode\BarCodeReader($this->_folder . "color_000099_abc.bmp", null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals("abc", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


    //[Category("DataMatrix")]
    public function test_Errors_abc_error3_png_DataMatrix()
    {
        $reader = new \Aspose\Barcode\BarCodeReader($this->_folder . "Errors\\abc_error3.png", null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }
}

TestsLauncher::launch('\building\RecognitionDataMatrixReadOnly', null);