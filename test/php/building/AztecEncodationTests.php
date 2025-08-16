<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';

use Aspose\Barcode\AztecExtCodetextBuilder;
use assist\TestsAssist;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestHelper;

use assist\FrameworkTestUtils;


class AztecEncodationTests
{
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_Aztec_ExtendedCodetext_Encodation_Test()
    {
        $textBuilder = new AztecExtCodetextBuilder();
        $textBuilder->addECICodetext(\Aspose\Barcode\ECIEncodings::Win1251, "Will");
        $textBuilder->addECICodetext(\Aspose\Barcode\ECIEncodings::UTF8, "犬Right狗");
        $textBuilder->addPlainCodetext("t\\e\\\\st");
        $textBuilder->addECICodetext(\Aspose\Barcode\ECIEncodings::Win1251, "привет");
        $textBuilder->addECICodetext(\Aspose\Barcode\ECIEncodings::UTF16BE, "犬Power狗");
        $textBuilder->addPlainCodetext("test");
        $textCodetext = $textBuilder->getExtendedCodetext();
        $str = str_replace("\\000022", "", $textCodetext);
        $str = str_replace("\\000025", "", $str);
        $str = str_replace("\\000026", "", $str);
        $str = str_replace("\\000003", "", $str);

        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, $textCodetext);
        $generator->getParameters()->getBarcode()->getAztec()->setAztecEncodeMode(\Aspose\Barcode\AztecEncodeMode::EXTENDED_CODETEXT);
        $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::AZTEC);
        Assert::assertEquals(1, sizeof($reader->readBarCodes()));
        Assert::assertEquals($str, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }

    public function test_Aztec_Auto_Encodation_Test()
    {
        $codetext = "犬Right狗";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, $codetext);
        {
            $generator->getParameters()->getBarcode()->getAztec()->setECIEncoding(\Aspose\Barcode\ECIEncodings::UTF8);
            $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::AZTEC);
            {
                Assert::assertEquals(1, sizeof($reader->readBarCodes()));
                Assert::assertEquals($codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            }
        }
    }

    public function test_Aztec_AutoWithDefaultECI_Encodation_Test()
    {
        $codetext = "Hello!";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, $codetext);
        {
            $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::AZTEC);
            {
                Assert::assertEquals(1, sizeof($reader->readBarCodes()));
                Assert::assertEquals($codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            }
        }
    }

    public function test_Aztec_ECI_Encodation_Test()
    {
        $codetext = "犬Right狗";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, $codetext);
        {
            $generator->getParameters()->getBarcode()->getAztec()->setAztecEncodeMode(\Aspose\Barcode\AztecEncodeMode::ECI);
            $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::AZTEC);
            {
                Assert::assertEquals(1, sizeof($reader->readBarCodes()));
                Assert::assertEquals($codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            }
        }
    }

    public function Aztec_Russian_ECI_Encodation_Test()
    {
        $codetext = "Привет!";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, $codetext);
        {
            $generator->getParameters()->getBarcode()->getAztec()->setAztecEncodeMode(\Aspose\Barcode\AztecEncodeMode::ECI);
            $generator->getParameters()->getBarcode()->getAztec()->setECIEncoding(\Aspose\Barcode\ECIEncodings::ISO_8859_5);
            $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::AZTEC);
            {
                Assert::assertEquals(1, sizeof($reader->readBarCodes()));
                Assert::assertEquals($codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            }
        }
    }

    public function Aztec_Binary_Encodation_Test()
    {
        $sb = "";
        for ($i = 0;$i < 128; ++$i)
            $sb .= chr($i);
        $codetext = $sb;
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, $codetext);
        {
            $generator->getParameters()->getBarcode()->getAztec()->setAztecEncodeMode(\Aspose\Barcode\AztecEncodeMode::BINARY);
            $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::AZTEC);
            {
                Assert::assertEquals(1, sizeof($reader->readBarCodes()));
                Assert::assertEquals($codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            }
        }
    }

    public function test_Aztec_Bytes_Encodation_Test()
    {
        $sb = "";
        for ($i = 0; $i < 128; ++$i)
            $sb .= chr($i);
        $codetext = $sb;
        $decodedCodetext = "";

        $partsCount = 4;
        $partLength = strlen($codetext) / $partsCount;
        for ($i = 0; $i < $partsCount; $i++)
        {
            $codetextPart = substr($codetext, $i * $partLength, $partLength);
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, $codetextPart);
            {
                $generator->getParameters()->getBarcode()->getAztec()->setStructuredAppendBarcodeId($i + 1);
                $generator->getParameters()->getBarcode()->getAztec()->setStructuredAppendBarcodesCount($partsCount);
                $generator->getParameters()->getBarcode()->getAztec()->setStructuredAppendFileId("ABCD");
                $generator->getParameters()->getBarcode()->getAztec()->setAztecEncodeMode(\Aspose\Barcode\AztecEncodeMode::BYTES);
                $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
                $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::AZTEC);
                {
                    Assert::assertEquals(1, sizeof($reader->readBarCodes()));
                    Assert::assertEquals($i + 1, $reader->getFoundBarCodes()[0]->getExtended()->getAztec()->getStructuredAppendBarcodeId());
                    Assert::assertEquals($partsCount, $reader->getFoundBarCodes()[0]->getExtended()->getAztec()->getStructuredAppendBarcodesCount());
                    Assert::assertEquals("ABCD", $reader->getFoundBarCodes()[0]->getExtended()->getAztec()->getStructuredAppendFileId());
                    $decodedCodetext .= $reader->getFoundBarCodes()[0]->getCodeText("UTF-8");
                }
            }
        }
        Assert::assertEquals($codetext, $decodedCodetext);
    }
}
TestsLauncher::launch('\building\AztecEncodationTests', "");