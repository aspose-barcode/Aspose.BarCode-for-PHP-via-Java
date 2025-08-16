<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use Aspose\Barcode\BarcodeGenerator;
use Aspose\Barcode\ BarcodeImageFormat;
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\CodeLocation;
use Aspose\Barcode\DecodeType;
use Aspose\Barcode\EncodeTypes;
use assist\Assert;
use assist\IOTestUtils;
use assist\TestsLauncher;
use TwoDComponentType;
use assist\TestsAssist;
use assist\TestHelper;

use assist\FrameworkTestUtils;


class GS1CompositeBarTestsExtended
{
    const Folder = \assist\TestsAssist::TESTDATA_ROOT . "/Generation/GS1CompositeBarExtended/";
    const LogFilename = "GenerateRecognizeTest.txt";

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_Main_EncodeDecode_Mode0_Numeric_Test()
    {
        $this->generateAndrecognize2D("(240)0123456789", true, TwoDComponentType::CC_A);
        $this->recognize2D("(240)0123456789", "(240)0123456789_cc_a.png");

        $this->generateAndrecognize2D("(240)012345678", true, TwoDComponentType::CC_A);
        $this->recognize2D("(240)012345678", "(240)012345678_cc_a.png");

        $this->generateAndrecognize2D("(240)aa23456785678", true, TwoDComponentType::CC_A);
        $this->recognize2D("(240)aa23456785678", "(240)aa23456785678_cc_a.png");

        $this->generateAndrecognize2D("(240)aAA45678567", true, TwoDComponentType::CC_A);
        $this->recognize2D("(240)aAA45678567", "(240)aAA45678567_cc_a.png");

        $this->generateAndrecognize2D("10", false, TwoDComponentType::CC_A);
        $this->recognize2D("10", "10_cc_a.png");

        $this->generateAndrecognize2D("0", false, TwoDComponentType::CC_A);
        $this->recognize2D("0", "0_cc_a.png");
    }

    public function test_Main_EncodeDecode_Mode0_Alphanumeric_Test()
    {
        $this->generateAndrecognize2D("A0A1A2A3A4A5A6A7A8A9ABCDEFGHIJKLMNOPQRSTUVWXYZ*,-./", false, TwoDComponentType::CC_B);
        $this->recognize2D("A0A1A2A3A4A5A6A7A8A9ABCDEFGHIJKLMNOPQRSTUVWXYZ*,-./", "A0A1A2A3A4A5A6A7A8A9ABCDEFGHIJKLMNOPQRSTUVWXYZ_,-___cc_b.png");

        $this->generateAndrecognize2D("A501234A50123", false, TwoDComponentType::CC_A);
        $this->recognize2D("A501234A50123", "A501234A50123_cc_a.png");

        $this->generateAndrecognize2D("B", false, TwoDComponentType::CC_A);
        $this->recognize2D("B", "B_cc_a.png");

        $this->generateAndrecognize2D("(90)0K12(10)0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)0K12(10)0123", "(90)0K12(10)0123_cc_a.png");
    }

//    public function test_Main_EncodeDecode_Mode0_ISO646_Test()
//    {
//        $this->generateAndrecognize2D("a0a1a2a3a4a5a6a7a8a9!ABC!DEF!GHI!JK!LM!NOP!QRS!TUV!WX!YZabcdefghijklmnopqrstuvwxyz!\"%&\'()*+,-/:;<=>?_ ", false, TwoDComponentType::CC_C);
//        $this->recognize2D("a0a1a2a3a4a5a6a7a8a9!ABC!DEF!GHI!JK!LM!NOP!QRS!TUV!WX!YZabcdefghijklmnopqrstuvwxyz!\"%&\'()*+,-/:;<=>?_ ", "a0a1a2a3a4a5a6a7a8a9!ABC!DEF!GHI!JK!LM!NOP!QRS!TUV!WX!YZabcdefghijklmnopqrstuvwxyz!_%&_()_+,-__;_=___ _cc_c.png");
//
//        $this->generateAndrecognize2D("50-12345678!12345678", false, TwoDComponentType::CC_B);
//        $this->recognize2D("50-12345678!12345678", "50-12345678!12345678_cc_b.png");
//
//        $this->generateAndrecognize2D("50!-12345678-12345678", false, TwoDComponentType::CC_B);
//        $this->recognize2D("50!-12345678-12345678", "50!-12345678-12345678_cc_b.png");
//
//        $this->generateAndrecognize2D("5!-12345678-1234567", false, TwoDComponentType::CC_B);
//        $this->recognize2D("5!-12345678-1234567", "5!-12345678-1234567_cc_b.png");
//
//        $this->generateAndrecognize2D("!5012ABCDEF!A50123456", false, TwoDComponentType::CC_B);
//        $this->recognize2D("!5012ABCDEF!A50123456", "!5012ABCDEF!A50123456_cc_b.png");
//
//        $this->generateAndrecognize2D("a", false, TwoDComponentType::CC_A);
//        $this->recognize2D("a", "a_cc_a.png");
//    }

    public function test_Main_EncodeDecode_Mode10()
    {
        $this->generateAndrecognize2D("(17)991231(10)ABCD0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(17)991231(10)ABCD0123", "(17)991231(10)ABCD0123_cc_a.png");

        $this->generateAndrecognize2D("(11)991231(10)ABCD0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(11)991231(10)ABCD0123", "(11)991231(10)ABCD0123_cc_a.png");

        $this->generateAndrecognize2D("(10)ABCD0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(10)ABCD0123", "(10)ABCD0123_cc_a.png");

        $this->generateAndrecognize2D("(17)000101", true, TwoDComponentType::CC_A);
        $this->recognize2D("(17)000101", "(17)000101_cc_a.png");

        $this->generateAndrecognize2D("(11)000101", true, TwoDComponentType::CC_A);
        $this->recognize2D("(11)000101", "(11)000101_cc_a.png");

        $this->generateAndrecognize2D("(17)991231(10)ABCD0123(240)0123456789", true, TwoDComponentType::CC_A);
        $this->recognize2D("(17)991231(10)ABCD0123(240)0123456789", "(17)991231(10)ABCD0123(240)0123456789_cc_a.png");

        $this->generateAndrecognize2D("(10)ABCD0123(240)0123456789", true, TwoDComponentType::CC_A);
        $this->recognize2D("(10)ABCD0123(240)0123456789", "(10)ABCD0123(240)0123456789_cc_a.png");

        $this->generateAndrecognize2D("(17)991231(240)0123456789", true, TwoDComponentType::CC_A);
        $this->recognize2D("(17)991231(240)0123456789", "(17)991231(240)0123456789_cc_a.png");
    }

    public function test_Main_EncodeDecode_Mode11()
    {
        $this->generateAndrecognize2D("(90)K12(10)0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)K12(10)0123", "(90)K12(10)0123_cc_a.png");

        $this->generateAndrecognize2D("(90)A12(10)0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)A12(10)0123", "(90)A12(10)0123_cc_a.png");

        $this->generateAndrecognize2D("(90)9K12(10)0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)9K12(10)0123", "(90)9K12(10)0123_cc_a.png");

        $this->generateAndrecognize2D("(90)9A12(10)0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)9A12(10)0123", "(90)9A12(10)0123_cc_a.png");

        $this->generateAndrecognize2D("(90)99K12(10)0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)99K12(10)0123", "(90)99K12(10)0123_cc_a.png");

        $this->generateAndrecognize2D("(90)99A12(10)0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)99A12(10)0123", "(90)99A12(10)0123_cc_a.png");

        $this->generateAndrecognize2D("(90)999K12(10)0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)999K12(10)0123", "(90)999K12(10)0123_cc_a.png");

        $this->generateAndrecognize2D("(90)999A12(10)0123", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)999A12(10)0123", "(90)999A12(10)0123_cc_a.png");

        $this->generateAndrecognize2D("(90)9AABCDEFGHIJKLMN0123456789(10)0123", true, TwoDComponentType::CC_B);
        $this->recognize2D("(90)9AABCDEFGHIJKLMN0123456789(10)0123", "(90)9AABCDEFGHIJKLMN0123456789(10)0123_cc_b.png");

        $this->generateAndrecognize2D("(90)9AOPQRSTUVWXYZ0123456789(10)0123", true, TwoDComponentType::CC_B);
        $this->recognize2D("(90)9AOPQRSTUVWXYZ0123456789(10)0123", "(90)9AOPQRSTUVWXYZ0123456789(10)0123_cc_b.png");

        $this->generateAndrecognize2D("(90)9K(10)ABC", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)9K(10)ABC", "(90)9K(10)ABC_cc_a.png");

        $this->generateAndrecognize2D("(90)9K(10)/ABC", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)9K(10)/ABC", "(90)9K(10)_ABC_cc_a.png");

        $this->generateAndrecognize2D("(90)K1", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)K1", "(90)K1_cc_a.png");

        $this->generateAndrecognize2D("(90)9K12(8004)23AC(10)ABC", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)9K12(8004)23AC(10)ABC", "(90)9K12(8004)23AC(10)ABC_cc_a.png");

        $this->generateAndrecognize2D("(90)9K12(8004)23AC", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)9K12(8004)23AC", "(90)9K12(8004)23AC_cc_a.png");

        $this->generateAndrecognize2D("(90)9K12(21)23AC(10)ABC", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)9K12(21)23AC(10)ABC", "(90)9K12(21)23AC(10)ABC_cc_a.png");

        $this->generateAndrecognize2D("(90)9K12(21)23AC", true, TwoDComponentType::CC_A);
        $this->recognize2D("(90)9K12(21)23AC", "(90)9K12(21)23AC_cc_a.png");
    }

    public function generateAndrecognize2D($codetext2D, $isAllowOnlyGS1Encoding, $twoDComponentType)
    {
        $gen = GS1CompositeBarTestsExtended::generateWith2DCodetext($codetext2D, $isAllowOnlyGS1Encoding, $twoDComponentType);
        $reader = new \Aspose\Barcode\BarCodeReader($gen->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG), null, \Aspose\Barcode\DecodeType::GS_1_COMPOSITE_BAR);
        GS1CompositeBarTestsExtended::recognize2DStatic($reader, $codetext2D);
    }

    public function recognize2D($codetext2D, $filename)
    {
        $ms = IOTestUtils::loadToBase64Image(GS1CompositeBarTestsExtended::Folder . $filename);
        $reader = new \Aspose\Barcode\BarCodeReader($ms, null, \Aspose\Barcode\DecodeType::GS_1_COMPOSITE_BAR);
        GS1CompositeBarTestsExtended::recognize2DStatic($reader, $codetext2D);
    }

    static function recognize2DStatic($reader, $codetext2D)
    {
        Assert::assertEquals(1, sizeof($reader->readBarCodes()));
        Assert::assertEquals(\Aspose\Barcode\DecodeType::GS_1_COMPOSITE_BAR, $reader->getFoundBarCodes()[0]->getCodeType());
        Assert::assertEquals($codetext2D, $reader->getFoundBarCodes()[0]->getExtended()->getGS1CompositeBar()->getTwoDCodeText());
    }

    static function generateWith2DCodetext($codetext2D, $isAllowOnlyGS1Encoding, $twoDComponentType)
    {
        $fullCodetext = "(21)ABCDEABCDEABCDEABCDE|" . $codetext2D;

        $gen = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::GS_1_COMPOSITE_BAR, $fullCodetext);
        $gen->getParameters()->getBarcode()->getGS1CompositeBar()->setLinearComponentType(\Aspose\Barcode\EncodeTypes::GS_1_CODE_128);
        $gen->getParameters()->getBarcode()->getGS1CompositeBar()->setTwoDComponentType($twoDComponentType);
        $gen->getParameters()->getBarcode()->getGS1CompositeBar()->setAllowOnlyGS1Encoding($isAllowOnlyGS1Encoding);
        $gen->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::NONE);

        return $gen;
    }
}

TestsLauncher::launch('\building\GS1CompositeBarTestsExtended', "");