<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';

use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\BarCodeRegionParameters;
use Aspose\Barcode\ChecksumValidation;
use Aspose\Barcode\CustomerInformationInterpretingType;
use Aspose\Barcode\DecodeType;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Point;
use Aspose\Barcode\Internal\Rectangle;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist as ta;
use develop\BarcodeReaderTest;
use TypeError;


class BarcodeReaderTests
{
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testAllSupportedTypes()
    {
        // printTestFullName ($this);

        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        $fileName = "mzl.jpg";
        $expectedResult = "99700161000002701082204000";
        $reader = new BarcodeReader(ta::loadImageByName($subfolder, $fileName), null, null);
        Assert::assertTrue(sizeof($reader->readBarCodes()) > 0);
        Assert::assertEquals($expectedResult, $reader->readBarCodes()[0]->getCodeText("UTF-8"));
    }


    public function testGetCodeBytes()
    {
        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $expectedCodeBytes = array("57", "57", "55", "48", "48", "49", "54", "49", "48", "48", "48", "48", "48", "50", "55", "48", "49", "48", "56", "50", "50", "48", "52", "48", "48", "48");
        $fileName = "mzl.jpg";
        $reader = new BarcodeReader(ta::loadImageByName($subfolder, $fileName), null, null);
        foreach ($reader->readBarCodes() as $res) {
            $actualCodeBytes = $res->getCodeBytes();
            Assert::assertEquals(sizeof($expectedCodeBytes), sizeof($actualCodeBytes));
        }
    }

    public function testReadFromImageFile()
    {
        // printTestFullName ($this);

        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        $file_name = "mzl.jpg";
        $full_path = $subfolder . "/" . $file_name;
        ta::prt(file_exists($full_path));
        $expected_code_text = "99700161000002701082204000";
        $expected_code_type = "Code128";
        $reader = new BarcodeReader($full_path, null, null);
        foreach ($reader->readBarCodes() as $res) {
            print($res->getCodeText("UTF-8"));
            print("\n");
            print($res->getCodeTypeName());
            Assert::assertEquals($expected_code_text, $res->getCodeText("UTF-8"));
            Assert::assertEquals($expected_code_type, $res->getCodeTypeName());
        }
    }

    public function testSetQualitySettings1()
    {
        // printTestFullName ($this);

        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        $file_name = "mzl.jpg";
        $full_path = $subfolder . "/" . $file_name;
        ta::prt(file_exists($full_path));
        $expected_code_text = "99700161000002701082204000";
        $expected_code_type = "Code128";
        $reader = new BarcodeReader($full_path, null, null);
        $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getHighPerformance());

        foreach ($reader->readBarCodes() as $res) {
            print($res->getCodeText("UTF-8"));
            print("\n");
            print($res->getCodeTypeName());
            Assert::assertEquals($expected_code_text, $res->getCodeText("UTF-8"));
            Assert::assertEquals($expected_code_type, $res->getCodeTypeName());
        }
    }

    public function testSetQualitySettings2()
    {
        // printTestFullName ($this);

        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        $file_name = "mzl.jpg";
        $full_path = $subfolder . "/" . $file_name;
        ta::prt(file_exists($full_path));
        $expected_code_text = "99700161000002701082204000";
        $expected_code_type = "Code128";
        $reader = new BarcodeReader($full_path, null, null);
        $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getHighPerformance());
        foreach ($reader->readBarCodes() as $res) {
            print("BarCode CodeText: " . $res->getCodeText("UTF-8"));
            print("\n");
            print($res->getCodeTypeName());
            Assert::assertEquals($expected_code_text, $res->getCodeText("UTF-8"));
            Assert::assertEquals($expected_code_type, $res->getCodeTypeName());
        }
    }

    public function testSetQualitySettings3()
    {
        // printTestFullName ($this);

        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        $file_name = "mzl.jpg";
        $full_path = $subfolder . "/" . $file_name;
        ta::prt(file_exists($full_path));
        $expected_code_text = "99700161000002701082204000";
        $expected_code_type = "Code128";
        $reader = new BarcodeReader($full_path, null, null);
        $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getNormalQuality());
        foreach ($reader->readBarCodes() as $res) {
            print("BarCode CodeText: " . $res->getCodeText("UTF-8"));
            print("\n");
            print($res->getCodeTypeName());
            Assert::assertEquals($expected_code_text, $res->getCodeText("UTF-8"));
            Assert::assertEquals($expected_code_type, $res->getCodeTypeName());
        }
    }

    public function testChecksumValidation()
    {
        // printTestFullName ($this);

        $reader = new BarcodeReader(null, null, null);
        $reader->getBarcodeSettings()->setChecksumValidation(ChecksumValidation::OFF);
        Assert::assertEquals($reader->getBarcodeSettings()->getChecksumValidation(), ChecksumValidation::OFF);
    }

    public function testStripFNC()
    {
        // printTestFullName ($this);

        $reader = new BarcodeReader(null, null, null);
        Assert::assertFalse($reader->getBarcodeSettings()->getStripFNC());
        $reader->getBarcodeSettings()->setStripFNC(true);
        Assert::assertTrue($reader->getBarcodeSettings()->getStripFNC());
    }

    public function testChecksum()
    {
        // printTestFullName ($this);

        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        $fileName = "mzl.jpg";
        $expectedResult = "99700161000002701082204000";
        $checksum = "a";
        $reader = new BarcodeReader(ta::loadImageByName($subfolder, $fileName), null, null);
        Assert::assertTrue(sizeof($reader->readBarCodes()) > 0);
        Assert::assertEquals($expectedResult, $reader->readBarCodes()[0]->getCodeText("UTF-8"));
        Assert::assertEquals($checksum, $reader->readBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
    }

    public function testSetBarCodeReadTypeThrowException()
    {
        $type_expected = "AUSTRALIA_POST";
        $reader = new BarcodeReader(null, null, null);
        try {
            $reader->setBarCodeReadType($type_expected);
        } catch (TypeError $exc) {
            Assert::assertStringContainsString("Argument 1 passed to BarCodeReader::setBarCodeReadType() must be of the type int, string given", $exc->getMessage());
        }
    }

    public function testRecognitionCode128()
    {
        // printTestFullName ($this);

        try {
            $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
            $fileName = "Code128.jpg";
            $reader = new BarcodeReader(ta::loadImageByName($subfolder, $fileName), null, \Aspose\Barcode\DecodeType::CODE_128);

            Assert::assertTrue(sizeof($reader->readBarCodes()) > 0);
            Assert::assertEquals("Code128", $reader->readBarCodes()[0]->getCodeTypeName());
            Assert::assertEquals("<FNC1>BARCODE12345", $reader->readBarCodes()[0]->getCodeText("UTF-8"));
        } catch (BarcodeException $e) {
            ta::prt($e->getMessage());
        }
    }

    public function testRecognitionSetBarCodeImage()
    {
        // printTestFullName ($this);

        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        $fileName = "Code128.jpg";
        $reader = new BarcodeReader(ta::loadImageByName($subfolder, $fileName), null, DecodeType::ALL_SUPPORTED_TYPES);
        $reader->setBarCodeImage($subfolder . "/asposeCode1281.png", null);

        $res = $reader->readBarCodes();
        Assert::assertTrue(sizeof($res) > 0);
        Assert::assertEquals("Code128", $res[0]->getCodeTypeName());
        Assert::assertEquals("Night. Street. Lamp.", $res[0]->getCodeText("UTF-8"));
    }

    public function testRecognitionSetBarCodeImageWithArea()
    {
        // printTestFullName ($this);

        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        $fileName = "Code128.jpg";
        $rect1 = new Rectangle(20, 210, 230, 120);
        $reader = new BarcodeReader(ta::loadImageByName($subfolder, $fileName), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        $reader->setBarCodeImage($subfolder . "/mzl.jpg", $rect1);

        foreach ($reader->readBarCodes() as $res) {
            ta::prt("CodeType Name : " . $res->getCodeTypeName());
            ta::prt("CodeText: " . $res->getCodeText("UTF-8"));
            Assert::assertEquals("Code128", $res->getCodeTypeName());
            Assert::assertEquals("99700161000002701082204000", $res->getCodeText("UTF-8"));
        }
    }

    public function testRecognitionArea()
    {
        // printTestFullName ($this);

        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";
        $rect1 = new Rectangle(20, 210, 230, 120);
        $rect2 = new Rectangle(10, 110, 130, 20);
//        $reader = new BarcodeReader($subfolder . "/mzl.jpg", array($rect1->toString(), $rect2->toString()), array(\Aspose\Barcode\DecodeType::AZTEC, \Aspose\Barcode\DecodeType::AUSTRALIA_POST));
        $reader = new BarcodeReader($subfolder . "/mzl.jpg", $rect1, $rect2, array(\Aspose\Barcode\DecodeType::AZTEC, \Aspose\Barcode\DecodeType::AUSTRALIA_POST));

        Assert::assertTrue(sizeof($reader->readBarCodes()) == 0);
    }

    public function testRecognitionSetBarCodeImageWithAreas()
    {
        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue33502/";
        $fileName = "36828.jpg";
        $rect1 = new Rectangle(30, 40, 260, 300);
        $rect2 = new Rectangle(480, 620, 190, 200);
        $reader = new BarcodeReader(ta::loadImageByName($subfolder, $fileName), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        $imageResource = $subfolder . $fileName;
        $reader->setBarCodeImage($imageResource, $rect1, $rect2);

        $res = $reader->readBarCodes();
        Assert::assertTrue(sizeof($res) > 0);
        Assert::assertEquals("QES265", $res[0]->getCodeText("UTF-8"));
        Assert::assertEquals("AUTOMATEDAPPROVAL", $res[1]->getCodeText("UTF-8"));
        Assert::assertTrue(true);
    }

    public function testRegion()
    {
        // printTestFullName ($this);

        $folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue33482/";
        $fileName = $folder . "images2.jpg";
        $reader = new BarcodeReader($fileName, null, \Aspose\Barcode\DecodeType::CODE_39);
        $res = $reader->readBarCodes();
        Assert::assertTrue(sizeof($res) > 0);
        Assert::assertEquals("123456L", $res[0]->getCodeText("UTF-8"));
        $expectedPoints = array();
        $expectedPoints[0] = new Point(11, 13);
        $expectedPoints[1] = new Point(11, 79);
        $expectedPoints[2] = new Point(203, 13);
        $expectedPoints[3] = new Point(203, 79);
        $region = $res[0]->getRegion();
        ta::checkBarcodesRegionMatching($region, $expectedPoints, 0.8);
    }

    public function testDetectEncodingEnabled()
    {
        // printTestFullName ($this);

        $gen = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::QR, null);
        $gen->setCodeText("Слово", "UTF-8");
//        $gen->getParameters()->getBarcode()->getQR()->setCodeTextEncoding("UTF-8");
        $image = $gen->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);

        $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::QR);
        $reader->getBarcodeSettings()->setDetectEncoding(true);
        foreach ($reader->readBarCodes() as $res) {
            print("CodeText:" . $res->getCodeText("UTF-8"));
            print "\n";
            print("CodeType:" . $res->getCodeTypeName());
            Assert::assertEquals("Слово", $res->getCodeText("UTF-8"));
            Assert::assertEquals("QR", $res->getCodeTypeName());
        }
//        Assert::assertTrue($reader->read());
    }

    public function testCustomerInformationInterpretingType1()
    {
        // printTestFullName ($this);

        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AUSTRALIA_POST, null);
        $generator->setCodeText("59123456781234567");
        $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::N_TABLE);
        $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::AUSTRALIA_POST);
        $reader->getBarcodeSettings()->getAustraliaPost()->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::N_TABLE);
        foreach ($reader->readBarCodes() as $res) {
            print("CodeText:" . $res->getCodeText("UTF-8"));
            print "\n";
            print("CodeType:" . $res->getCodeTypeName());
            Assert::assertEquals($res->getCodeText("UTF-8"), "59123456781234567");
            Assert::assertEquals("AustraliaPost", $res->getCodeTypeName());
        }
    }

    public function testCustomerInformationInterpretingType2()
    {
        // printTestFullName ($this);

        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AUSTRALIA_POST, null);
        $generator->setCodeText("6212345678ABCdef123#");
        $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::C_TABLE);
        $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        $reader = new \Aspose\Barcode\BarCodeReader($image, null, array(\Aspose\Barcode\DecodeType::AUSTRALIA_POST, \Aspose\Barcode\DecodeType::AZTEC));
        $reader->getBarcodeSettings()->getAustraliaPost()->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::C_TABLE);
        foreach ($reader->readBarCodes() as $res) {
            print("CodeText:" . $res->getCodeText("UTF-8"));
            print "\n";
            print("CodeType:" . $res->getCodeTypeName());
            Assert::assertEquals($res->getCodeText("UTF-8"), "6212345678ABCdef123#");
            Assert::assertEquals("AustraliaPost", $res->getCodeTypeName());
        }
    }

    /**
     * Create rectangle from points array
     *
     * @param region      Barcode region
     * @param points      points array
     * @param minMatching rectangles matching from 0 to 1
     */
    private static function checkBarcodesRegionMatching(BarCodeRegionParameters $region, array $points, $minMatching)
    {
        //do quick solutuion by rectangles intersection
        $lRegRect = self::createRectangleFromPoints($region->getPoints());
        $lPointsRect = self::createRectangleFromPoints($points);

        //intersect rect
        $lIntersectRect = Rectangle::intersect($lRegRect, $lPointsRect);
        if ($lIntersectRect == null)
            Assert::fail("Barcode rectangle " . $lRegRect->toString() . " and rectangle " . $lPointsRect->toString() . " don't intersect.\n");

        //match
        $lRegRectSquare = $lRegRect->width * $lRegRect->height;
        $lPointsRectSquare = $lPointsRect->width * $lPointsRect->height;
        $lIntersectRectSquare = $lIntersectRect->width * $lIntersectRect->height;
        $lMaxResultedRect = max($lRegRectSquare, $lPointsRectSquare);
        $lMatching = $lIntersectRectSquare / $lMaxResultedRect;

        //write
        echo("Barcode rectangle " . $lRegRect->toString() . " and rectangle " . $lPointsRect->toString() . " intersect in rectangle " . $lIntersectRect->toString() . " with matching " . ($lMatching * 100.0) . "%");

        if ($lMatching < $minMatching)
            Assert::fail("Barcode rectangle " . $lRegRect->toString() . " and rectangle " . $lPointsRect->toString() . " intersect in rectangle " . $lIntersectRect->toString() . " with matching " . ($lMatching * 100.0) . "%\n" . "Required matching is " . ($minMatching * 100.0) . "%\n");
    }

    /**
     * Create rectangle from points array
     *
     * @param points points array
     * @return rectangle from the points
     */
    private static function createRectangleFromPoints(array $points): Rectangle
    {
        $lMinX = (int)$points[0]->x;
        $lMaxX = (int)$points[0]->x;
        $lMinY = (int)$points[0]->y;
        $lMaxY = (int)$points[0]->y;
        for ($i = 0; $i < sizeof($points); ++$i) {
            $lItem = $points[$i];
            $lMinX = min($lMinX, $lItem->x);
            $lMaxX = max($lMaxX, $lItem->x);
            $lMinY = min($lMinY, $lItem->y);
            $lMaxY = max($lMaxY, $lItem->y);
        }

        return new Rectangle($lMinX, $lMinY, $lMaxX - $lMinX + 1, $lMaxY - $lMinY + 1);
    }


}

TestsLauncher::launch('\building\BarcodeReaderTests', '');