<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';

use Aspose\Barcode\BarCodeConfidence;
use Aspose\Barcode\BarCodeImageFormat;
use Aspose\Barcode\Code128DataPortion;
use Aspose\Barcode\Code128SubType;
use Aspose\Barcode\Internal\Point;
use Aspose\Barcode\Internal\Rectangle;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class Api2Tests
{
     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_SetBarCodeReadType()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $lReader = new \Aspose\Barcode\BarCodeReader(null, null, null);
        $lReader->setBarCodeReadType(\Aspose\Barcode\DecodeType::CODE_128, \Aspose\Barcode\DecodeType::QR, \Aspose\Barcode\DecodeType::PDF_417);

        Assert::assertTrue($lReader->containsAny(\Aspose\Barcode\DecodeType::CODE_128, \Aspose\Barcode\DecodeType::QR, \Aspose\Barcode\DecodeType::PDF_417));
        Assert::assertFalse($lReader->containsAny(\Aspose\Barcode\DecodeType::CODE_39, \Aspose\Barcode\DecodeType::CODE_39, \Aspose\Barcode\DecodeType::CODE_93));
    }

    public function test_ReadBarCodes()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $reader = new \Aspose\Barcode\BarCodeReader((new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_128, "123456"))->generateBarCodeImage(BarCodeImageFormat::PNG), null, array(\Aspose\Barcode\DecodeType::CODE_128));
        {
            $lReadResults = $reader->readBarCodes();
            Assert::assertEquals(sizeof($lReadResults), 1);
            Assert::assertTrue($lReadResults[0]->getCodeType() == (\Aspose\Barcode\DecodeType::CODE_128));
            Assert::assertEquals($lReadResults[0]->getCodeTypeName(), "Code128");
            Assert::assertEquals($lReadResults[0]->getCodeText("UTF-8"), "123456");
            Assert::assertEquals($lReadResults[0]->getCodeBytes(), array("49","50","51","52","53","54"));
            Assert::assertTrue($lReadResults[0]->getReadingQuality() >= 98);
            Assert::assertEquals($lReadResults[0]->getConfidence(), \Aspose\Barcode\BarCodeConfidence::MODERATE);
            Assert::assertFalse($lReadResults[0]->getExtended()->getOneD()->isEmpty(), false);
            Assert::assertFalse($lReadResults[0]->getExtended()->getCode128()->isEmpty(), false);
            Assert::assertEquals($lReadResults[0]->getExtended()->getOneD()->getValue(), "123456");
            Assert::assertEquals($lReadResults[0]->getExtended()->getOneD()->getCheckSum(), ",");
            Assert::assertTrue(abs($lReadResults[0]->getRegion()->getAngle()) <= 3);
            Assert::assertEquals(sizeof($lReadResults[0]->getRegion()->getPoints()), 4);
            Assert::assertFalse($lReadResults[0]->getRegion()->getQuadrangle()->isEmpty());
            Assert::assertFalse($lReadResults[0]->getRegion()->getRectangle()->isEmpty());
        }
    }

    public function test_FoundBarCodes()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $reader = new \Aspose\Barcode\BarCodeReader((new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_128, "123456"))->generateBarCodeImage(BarCodeImageFormat::PNG), null, array(\Aspose\Barcode\DecodeType::CODE_128));
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals($reader->getFoundCount(), 1);
            Assert::assertEquals(sizeOf($reader->getFoundBarCodes()), 1);

            Assert::assertTrue($reader->getFoundBarCodes()[0]->getCodeType() == \Aspose\Barcode\DecodeType::CODE_128);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getCodeType(), \Aspose\Barcode\DecodeType::CODE_128);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getCodeText("UTF-8"), "123456");
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getCodeBytes(), array("49","50","51","52","53","54"));
            Assert::assertTrue($reader->getFoundBarCodes()[0]->getReadingQuality() >= 98);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getConfidence(), \Aspose\Barcode\BarCodeConfidence::MODERATE);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getOneD()->isEmpty(), false);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getCode128()->isEmpty(), false);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getQR()->isEmpty(), true);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getValue(), "123456");
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum(), ",");
            Assert::assertEquals(sizeof($reader->getFoundBarCodes()[0]->getExtended()->getCode128()->getCode128DataPortions()), 1);
            Assert::assertTrue(abs($reader->getFoundBarCodes()[0]->getRegion()->getAngle()) <= 3);
            Assert::assertEquals(sizeOf($reader->getFoundBarCodes()[0]->getRegion()->getPoints()), 4);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getQuadrangle()->isEmpty(), false);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getRectangle()->isEmpty(), false);
        }
    }

    private function assertEqualsCode128DataPortion(Code128DataPortion $actual, Code128DataPortion $expected)
    {
        Assert::assertEquals($actual->getCode128SubType(), $expected->getCode128SubType());
        Assert::assertEquals($actual->getData(), $expected->getData());
    }

    public function test_Extended_Pdf417()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $lGenerator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::MACRO_PDF_417, "123456");
        $lGenerator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroFileID(10);
        $lGenerator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentsCount(2);
        $lGenerator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentID(1);

        $reader = new \Aspose\Barcode\BarCodeReader($lGenerator->generateBarCodeImage(BarCodeImageFormat::PNG), null, array(\Aspose\Barcode\DecodeType::MACRO_PDF_417));
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals($reader->getFoundCount(), 1);
            Assert::assertEquals(sizeOf($reader->getFoundBarCodes()), 1);
            Assert::assertTrue($reader->getFoundBarCodes()[0]->getCodeType() == \Aspose\Barcode\DecodeType::MACRO_PDF_417);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getCodeText("UTF-8"), "123456");
            Assert::assertTrue($reader->getFoundBarCodes()[0]->getReadingQuality() >= 98);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getConfidence(), \Aspose\Barcode\BarCodeConfidence::STRONG);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getOneD()->isEmpty(), true);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getCode128()->isEmpty(), true);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getQR()->isEmpty(), true);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->getMacroPdf417FileID(), "010");
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->getMacroPdf417SegmentsCount(), 2);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->getMacroPdf417SegmentID(), 1);
            Assert::assertTrue(abs($reader->getFoundBarCodes()[0]->getRegion()->getAngle()) <= 3);
            Assert::assertEquals(sizeOf($reader->getFoundBarCodes()[0]->getRegion()->getPoints()), 4);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getQuadrangle()->isEmpty(), false);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getRectangle()->isEmpty(), false);
        }
    }


    public function test_Region()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $reader = new \Aspose\Barcode\BarCodeReader(\assist\TestsAssist::TESTDATA_ROOT . "Recognition\\2D\\"."PDF417\\aspose1.png", null, array(\Aspose\Barcode\DecodeType::PDF_417));
        {

            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals($reader->getFoundCount(), 1);
            Assert::assertEquals(sizeOf($reader->getFoundBarCodes()), 1);


            Assert::assertTrue($reader->getFoundBarCodes()[0]->getCodeType() == (\Aspose\Barcode\DecodeType::PDF_417));
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getCodeText("UTF-8"), "00425453400169");
            Assert::assertTrue(abs($reader->getFoundBarCodes()[0]->getRegion()->getAngle()) <= 3);
            Assert::assertEquals(sizeOf($reader->getFoundBarCodes()[0]->getRegion()->getPoints()), 4);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getQuadrangle()->isEmpty(), false);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getRectangle()->isEmpty(), false);

            $expected = array(new Point(16, 4), new Point(270, 4), new Point(270, 115), new Point(16, 115));
            Assert::assertEquals(sizeOf($reader->getFoundBarCodes()[0]->getRegion()->getPoints()), sizeof($expected));
            for ($i = 0; $i < sizeOf($reader->getFoundBarCodes()[0]->getRegion()->getPoints()); $i++)
            {
                TestsAssist::prt_mess("Counter $i");
                Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getPoints()[$i], $expected[$i]);
            }

            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getPoints(), array(new Point(16, 4), new Point(270, 4), new Point(270, 115), new Point(16, 115)));
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getQuadrangle()->getLeftTop(), new Point(16, 4));
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getQuadrangle()->getRightTop(), new Point(270, 4));
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getQuadrangle()->getRightBottom(), new Point(270, 115));
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getQuadrangle()->getLeftBottom(), new Point(16, 115));

            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getRectangle(), new Rectangle(16, 4, 255, 112));
        }
    }

    public function test_Angle()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $reader = new \Aspose\Barcode\BarCodeReader(\assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue33421/"."1D_90.png", null, array(\Aspose\Barcode\DecodeType::CODE_128));
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals($reader->getFoundCount(), 1);
            Assert::assertEquals(sizeOf($reader->getFoundBarCodes()), 1);

            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getAngle(), 90);
            Assert::assertEquals(sizeOf($reader->getFoundBarCodes()[0]->getRegion()->getPoints()), 4);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getQuadrangle()->isEmpty(), false);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getRegion()->getRectangle()->isEmpty(), false);
    }


    public function test_Three_Barcodes()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $reader = new \Aspose\Barcode\BarCodeReader(\assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue33128/"."Three_Barcodes.png", null, null);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 3);
            Assert::assertEquals($reader->getFoundCount(), 3);
            Assert::assertEquals(sizeOf($reader->getFoundBarCodes()), 3);

            $lResults = array();
            foreach($reader->getFoundBarCodes() as $lRes)
                array_push($lResults, $lRes->getCodeText("UTF-8"));

            Assert::assertEquals(sizeof($lResults), 3);
            Assert::assertTrue(in_array("01234321",$lResults));
            Assert::assertTrue(in_array("Pegasus Imaging - BarcodeXpress 5 - 1D and 2D barcode reader/writer", $lResults));
            Assert::assertTrue(in_array("44123123456123456789", $lResults));
        }
    }
}

//TestsLauncher::launch('\building\Api2Tests', null);
TestsLauncher::launch('\building\Api2Tests', 'setUp', '');