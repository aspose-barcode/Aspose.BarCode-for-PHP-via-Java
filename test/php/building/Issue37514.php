<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class Issue37514
{
    private const Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37514/";

     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

private function GenerateAndRecognize($encType, $EncCodetext, $decType,
                                      $resCodeType, $resCodetext)
    {
        $generator = new \Aspose\Barcode\BarcodeGenerator($encType, $EncCodetext);
        {
            $bmp = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            {
                $reader = new \Aspose\Barcode\BarCodeReader($bmp, null, $decType);
                {
                    Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
                    Assert::assertEquals($resCodetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
                    Assert::assertEquals($resCodeType, $reader->getFoundBarCodes()[0]->getCodeType());
                }
            }
        }
    }


    public function test_ITF6()
{
        $fileName = self::Folder. "ITF6.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, [\Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5, \Aspose\Barcode\DecodeType::ITF_6]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123457", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals(\Aspose\Barcode\DecodeType::ITF_6, $reader->getFoundBarCodes()[0]->getCodeType());
        }
    }


    public function test_FakeITF6()
{
$fileName = self::Folder. "FakeITF6.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, [\Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5, \Aspose\Barcode\DecodeType::ITF_6]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals(\Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5, $reader->getFoundBarCodes()[0]->getCodeType());
        }
    }


    public function test_FakeITF6_ITF6()
{
$fileName = self::Folder. "FakeITF6.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::ITF_6);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals(\Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5, $reader->getFoundBarCodes()[0]->getCodeType());
        }
    }


    public function test_GeneratedImages()
{
$this->GenerateAndRecognize(\Aspose\Barcode\EncodeTypes::ITF_6, "12345", \Aspose\Barcode\DecodeType::ITF_6, \Aspose\Barcode\DecodeType::ITF_6, "123457");
        $this->GenerateAndRecognize(\Aspose\Barcode\EncodeTypes::ITF_6, "123457", \Aspose\Barcode\DecodeType::ITF_6, \Aspose\Barcode\DecodeType::ITF_6, "123457");
        $this->GenerateAndRecognize(\Aspose\Barcode\EncodeTypes::ITF_6, "123456", \Aspose\Barcode\DecodeType::ITF_6, \Aspose\Barcode\DecodeType::ITF_6, "123457");
        $this->GenerateAndRecognize(\Aspose\Barcode\EncodeTypes::INTERLEAVED_2_OF_5, "123456", \Aspose\Barcode\DecodeType::ITF_6, \Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5, "123456");
        $this->GenerateAndRecognize(\Aspose\Barcode\EncodeTypes::ITF_6, "222222", \Aspose\Barcode\DecodeType::ITF_6, \Aspose\Barcode\DecodeType::ITF_6, "222228");
        $this->GenerateAndRecognize(\Aspose\Barcode\EncodeTypes::ITF_6, "22222", \Aspose\Barcode\DecodeType::ITF_6, \Aspose\Barcode\DecodeType::ITF_6, "222228");
    }
}

TestsLauncher::launch('\building\Issue37514', null);
