<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;
use Aspose\Barcode\Internal\Rectangle;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class BarCodeReaderDataSetTests
{
    private $filename = "";
    private $codetext = "12345678901234";
    private $readtype = \Aspose\Barcode\DecodeType::CODE_128;
    private $bitmapRect;

     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
        $this->filename = \assist\TestsAssist::TESTDATA_ROOT . "/recognition/1D/Code128/bc-code128.png";
        $this->codetext = "12345678901234";
        $this->readtype = \Aspose\Barcode\DecodeType::CODE_128;
        $this->bitmapRect = new Rectangle(0, 0, 264, 120);
    }

    public function test_SetBarCodeImage_Bitmap()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(null, null, null);
        $reader->setBarCodeReadType($this->readtype);
        $reader->setBarCodeImage(($this->filename));
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }

    public function test_SetBarCodeImage_Bitmap_Rectangle()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(null, null, null);
        $reader->setBarCodeReadType($this->readtype);
        $reader->setBarCodeImage(($this->filename), $this->bitmapRect);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }

    public function test_SetBarCodeImage_Bitmap_RectangleArray()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(null, null, null);
        {
            $reader->setBarCodeReadType($this->readtype);
            $reader->setBarCodeImage(($this->filename), $this->bitmapRect);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_SetBarCodeImage_string()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(null, null, null);
        {
            $reader->setBarCodeReadType($this->readtype);
            $reader->setBarCodeImage($this->filename);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_SetBarCodeImage_Stream()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(null, null, null);
        {
            $reader->setBarCodeReadType($this->readtype);
            $reader->setBarCodeImage(($this->filename));
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_Bitmap()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(($this->filename),null, null);
        {
            $reader->setBarCodeReadType($this->readtype);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_Bitmap_BaseDecodeTypeList()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(($this->filename), null, array($this->readtype, \Aspose\Barcode\DecodeType::CODE_39));
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_Bitmap_BaseDecodeType()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(($this->filename), null, $this->readtype);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_Bitmap_Rectangle_BaseDecodeTypeList()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(($this->filename), $this->bitmapRect->toString(), array($this->readtype, \Aspose\Barcode\DecodeType::CODE_39));
//            $reader = new \Aspose\Barcode\BarCodeReader(($this->filename));
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_Bitmap_Rectangle_BaseDecodeType()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(($this->filename), $this->bitmapRect->toString(), $this->readtype);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_Bitmap_RectangleList_BaseDecodeTypeList()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(($this->filename), array($this->bitmapRect->toString()), array($this->readtype, \Aspose\Barcode\DecodeType::CODE_39));
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }

    public function test_BarCodeReader_Bitmap_RectangleList_BaseDecodeType()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(($this->filename), array($this->bitmapRect->toString()), $this->readtype);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_string()
    {
        $reader = new \Aspose\Barcode\BarCodeReader($this->filename, null, null);
        {
            $reader->setBarCodeReadType($this->readtype);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_string_BaseDecodeTypeList()
    {
        $reader = new \Aspose\Barcode\BarCodeReader($this->filename, null, array($this->readtype, \Aspose\Barcode\DecodeType::CODE_39));
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_string_BaseDecodeType()
    {
        $reader = new \Aspose\Barcode\BarCodeReader($this->filename, null, $this->readtype);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_Stream()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(($this->filename), null, null);
        {
            $reader->setBarCodeReadType($this->readtype);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_Stream_BaseDecodeTypeList()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(($this->filename), null, array($this->readtype, \Aspose\Barcode\DecodeType::CODE_39));
        {
            $reader->setBarCodeReadType($this->readtype);
            Assert::assertEquals(1, sizeof($reader->readBarCodes()));
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

    public function test_BarCodeReader_Stream_BaseDecodeType()
    {
        $reader = new \Aspose\Barcode\BarCodeReader(($this->filename), null, $this->readtype);
        {
            $reader->setBarCodeReadType($this->readtype);
            Assert::assertEquals(1, sizeof($reader->readBarCodes()));
            Assert::assertEquals($this->codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }
}
TestsLauncher::launch('\building\BarCodeReaderDataSetTests', null);
