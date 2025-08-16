<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class PatchCodeFormatsTests
{

     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testPatchCode_A4Page_With_QR_Test()
    {
        $bg = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::PATCH_CODE, "Patch I");
        {
            $bg->getParameters()->getBarcode()->getPatchCode()->setPatchFormat(PatchFormat::A4);
            $bg->getParameters()->getBarcode()->getPatchCode()->setExtraBarcodeText("ExtraBarcodeText");
            $img = $bg->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            $r = new \Aspose\Barcode\BarCodeReader($img, null, null);
            {
                $found = $r->readBarCodes();
                Assert::assertEquals(5, sizeOf($found));
                Assert::assertEquals("Patch I", $found[0]->getCodeText("UTF-8"));
                Assert::assertEquals("ExtraBarcodeText", $found[2]->getCodeText("UTF-8"));
            }
        }
    }


    public function testPatchCode_A4LandscapePage_With_QR_Test()
    {
        $bg = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::PATCH_CODE, "Patch I");
        {
            $bg->getParameters()->getBarcode()->getPatchCode()->setPatchFormat(PatchFormat::A4_LANDSCAPE);
            $bg->getParameters()->getBarcode()->getPatchCode()->setExtraBarcodeText("ExtraBarcodeText");
            $img = $bg->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            $r = new \Aspose\Barcode\BarCodeReader($img, null, null);
            {
                $found = $r->readBarCodes();
                Assert::assertEquals(5, sizeOf($found));
                Assert::assertEquals("Patch I", $found[0]->getCodeText("UTF-8"));
                Assert::assertEquals("ExtraBarcodeText", $found[2]->getCodeText("UTF-8"));
            }
        }
    }


    public function testPatchCode_USLetterPage_With_QR_Test()
    {
        $bg = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::PATCH_CODE, "Patch I");
        {
            $bg->getParameters()->getBarcode()->getPatchCode()->setPatchFormat(PatchFormat::US_LETTER);
            $bg->getParameters()->getBarcode()->getPatchCode()->setExtraBarcodeText("ExtraBarcodeText");
            $img = $bg->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            $r = new \Aspose\Barcode\BarCodeReader($img, null, null);
            {
                $found = $r->readBarCodes();
                Assert::assertEquals(5, sizeOf($found));
                Assert::assertEquals("Patch I", $found[0]->getCodeText("UTF-8"));
                Assert::assertEquals("ExtraBarcodeText", $found[2]->getCodeText("UTF-8"));
            }
        }
    }


    public function testPatchCode_A4Page_With_NoQR_Test()
    {
        $bg = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::PATCH_CODE, "Patch I");
        {
            $bg->getParameters()->getBarcode()->getPatchCode()->setPatchFormat(PatchFormat::A4);
            $bg->getParameters()->getBarcode()->getPatchCode()->setExtraBarcodeText("");
            $img = $bg->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            $r = new \Aspose\Barcode\BarCodeReader($img, null, null);
            {
                $found = $r->readBarCodes();
                Assert::assertEquals(4, sizeOf($found));
                Assert::assertEquals("Patch I", $found[0]->getCodeText("UTF-8"));
            }
        }
    }
}

TestsLauncher::launch('\building\PatchCodeFormatsTests', null);
