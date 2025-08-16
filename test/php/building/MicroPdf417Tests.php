<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\IOTestUtils;
use assist\TestsLauncher;
use assist\TestsAssist;
use assist\TestHelper;

class MicroPdf417Tests
{
    const Folder = \assist\TestsAssist::TESTDATA_ROOT . "/Generation/MicroPdf417Tests/";
    const LogFilename = "GenerateRecognizeTest.txt";
    /// <summary>
    /// Prepares to run these tests.
    /// </summary>
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_mode_Linked_912_Test()
    {
        $this->generateAndrecognizeGS1MicroPdf417("(17)991231(10)ABCD", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(17)991231(10)ABCD", true, "(17)991231(10)ABCD_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(15)991231(10)ABCD", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(15)991231(10)ABCD", true, "(15)991231(10)ABCD_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(13)991231(21)ABCD", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(13)991231(21)ABCD", true, "(13)991231(21)ABCD_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(11)991231(21)ABCD", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(11)991231(21)ABCD", true, "(11)991231(21)ABCD_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(13)991231", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(13)991231", true, "(13)991231_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(11)991231", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(11)991231", true, "(11)991231_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(11)991231(21)ABCD(240)123456789012345", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(11)991231(21)ABCD(240)123456789012345", true, "(11)991231(21)ABCD(240)123456789012345_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(11)991231(21)12345(240)ABCD123456789012345", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(11)991231(21)12345(240)ABCD123456789012345", true, "(11)991231(21)12345(240)ABCD123456789012345_ean128linked.png");
    }

    public function test_mode_Linked_914_915_Test()
    {
        $this->generateAndrecognizeGS1MicroPdf417("(10)ABCD12345", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(10)ABCD12345", true, "(10)ABCD12345_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(21)ABCD12345", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(21)ABCD12345", true, "(21)ABCD12345_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(10)ABCD12345(240)123456789012345", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(10)ABCD12345(240)123456789012345", true, "(10)ABCD12345(240)123456789012345_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(21)ABCD12345(240)ABCD123456789012345", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(21)ABCD12345(240)ABCD123456789012345", true, "(21)ABCD12345(240)ABCD123456789012345_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(10)12345(240)123456789012345", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(10)12345(240)123456789012345", true, "(10)12345(240)123456789012345_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(10)12345678901234567(240)123456789012345", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(10)12345678901234567(240)123456789012345", true, "(10)12345678901234567(240)123456789012345_ean128linked.png");
    }

    public function test_mode_Linked_906_907_Test()
    {
        $this->generateAndrecognizeGS1MicroPdf417("(240)123456789012345(240)ABCD123456789012345", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(240)123456789012345(240)ABCD123456789012345", true, "(240)123456789012345(240)ABCD123456789012345_ean128linked.png");

        $this->generateAndrecognizeGS1MicroPdf417("(240)ABCD123456789012345(240)123456789012345", true);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(240)ABCD123456789012345(240)123456789012345", true, "(240)ABCD123456789012345(240)123456789012345_ean128linked.png");
    }

    public function test_mode_903_905_Test()
    {
        $this->generateAndrecognizeGS1MicroPdf417("(01)12345678901231", false);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(01)12345678901231", false, "(01)12345678901231_ean128.png");

        $this->generateAndrecognizeGS1MicroPdf417("(01)12345678901231(240)ABCD123456789012345", false);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(01)12345678901231(240)ABCD123456789012345", false, "(01)12345678901231(240)ABCD123456789012345_ean128.png");

        $this->generateAndrecognizeGS1MicroPdf417("(01)12345678901231(240)123456789012345", false);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(01)12345678901231(240)123456789012345", false, "(01)12345678901231(240)123456789012345_ean128.png");

        $this->generateAndrecognizeGS1MicroPdf417("(241)123456789012345(241)ABCD123456789012345", false);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(241)123456789012345(241)ABCD123456789012345", false, "(241)123456789012345(241)ABCD123456789012345_ean128.png");

        $this->generateAndrecognizeGS1MicroPdf417("(241)ABCD123456789012345(241)123456789012345", false);
        MicroPdf417Tests::recognizeGS1MicroPdf417("(241)ABCD123456789012345(241)123456789012345", false, "(241)ABCD123456789012345(241)123456789012345_ean128.png");
    }

    public function test_mode_908_911_Test()
    {
        $this->generateAndRecognizeMicroPdf417("a\u{001d}1222322323", true, MacroCharacter::NONE);
        $this->recognizeMicroPdf417("a\u{001d}1222322323", true, "a_1222322323_Code128_None.png");

        $this->generateAndRecognizeMicroPdf417("B\u{001d}1222322323", true, MacroCharacter::NONE);
        $this->recognizeMicroPdf417("B\u{001d}1222322323", true, "B_1222322323_Code128_None.png");

        $this->generateAndRecognizeMicroPdf417("00\u{001d}1222322323", true, MacroCharacter::NONE);
        $this->recognizeMicroPdf417("00\u{001d}1222322323", true, "00_1222322323_Code128_None.png");

        $this->generateAndRecognizeMicroPdf417("99\u{001d}1222322323", true, MacroCharacter::NONE);
        $this->recognizeMicroPdf417("99\u{001d}1222322323", true, "99_1222322323_Code128_None.png");

        $this->generateAndRecognizeMicroPdf417("123456789012345678", true, MacroCharacter::NONE);
        $this->recognizeMicroPdf417("123456789012345678", true, "123456789012345678_Code128_None.png");

        $this->generateAndRecognizeMicroPdf417("ABCDE123456789012345678", true, MacroCharacter::NONE);
        $this->recognizeMicroPdf417("ABCDE123456789012345678", true, "ABCDE123456789012345678_Code128_None.png");

        $this->generateAndRecognizeMicroPdf417("123456789012345678ABCDE", true, MacroCharacter::NONE);
        $this->recognizeMicroPdf417("123456789012345678ABCDE", true, "123456789012345678ABCDE_Code128_None.png");
    }

    public function test_mode_916_917_Test()
    {
        $this->generateAndRecognizeMicroPdf417("123456789012345678", false, MacroCharacter::MACRO_05);
        $this->recognizeMicroPdf417("[)>\u{001E}05\u{001d}123456789012345678\u{001E}\u{0004}", false, "123456789012345678_notCode128_Macro05.png");

        $this->generateAndRecognizeMicroPdf417("ABCDE123456789012345678", false, MacroCharacter::MACRO_05);
        $this->recognizeMicroPdf417("[)>\u{001E}05\u{001d}ABCDE123456789012345678\u{001E}\u{0004}", false, "ABCDE123456789012345678_notCode128_Macro05.png");

        $this->generateAndRecognizeMicroPdf417("123456789012345678ABCDE", false, MacroCharacter::MACRO_05);
        $this->recognizeMicroPdf417("[)>\u{001E}05\u{001d}123456789012345678ABCDE\u{001E}\u{0004}", false, "123456789012345678ABCDE_notCode128_Macro05.png");

        $this->generateAndRecognizeMicroPdf417("123456789012345678", false, MacroCharacter::MACRO_06);
        $this->recognizeMicroPdf417("[)>\u{001E}06\u{001d}123456789012345678\u{001E}\u{0004}", false, "123456789012345678_notCode128_Macro06.png");

        $this->generateAndRecognizeMicroPdf417("ABCDE123456789012345678", false, MacroCharacter::MACRO_06);
        $this->recognizeMicroPdf417("[)>\u{001E}06\u{001d}ABCDE123456789012345678\u{001E}\u{0004}", false, "ABCDE123456789012345678_notCode128_Macro06.png");

        $this->generateAndRecognizeMicroPdf417("123456789012345678ABCDE", false, MacroCharacter::MACRO_06);
        $this->recognizeMicroPdf417("[)>\u{001E}06\u{001d}123456789012345678ABCDE\u{001E}\u{0004}", false, "123456789012345678ABCDE_notCode128_Macro06.png");
    }

    public function test_mode_918_921_Test()
    {
        $this->generateAndRecognizeMicroPdf417Flags("ABCDE123456789012345678", EncodeTypes::MICRO_PDF_417, true, false);
        $this->recognizeMicroPdf417Flags("ABCDE123456789012345678", true, false, "ABCDE123456789012345678_MicroPdf417_linked_notRI.png");

        $this->generateAndRecognizeMicroPdf417Flags("ABCDE123456789012345678", EncodeTypes::MICRO_PDF_417, false, true);
        $this->recognizeMicroPdf417Flags("ABCDE123456789012345678", false, true, "ABCDE123456789012345678_MicroPdf417_notlinked_RI.png");

        $this->generateAndRecognizeMicroPdf417Flags("ABCDE123456789012345678", EncodeTypes::PDF_417, true, false);
        $this->recognizeMicroPdf417Flags("ABCDE123456789012345678", true, false, "ABCDE123456789012345678_Pdf417_linked_notRI.png");

        $this->generateAndRecognizeMicroPdf417Flags("ABCDE123456789012345678", EncodeTypes::PDF_417, false, true);
        $this->recognizeMicroPdf417Flags("ABCDE123456789012345678", false, true, "ABCDE123456789012345678_Pdf417_notlinked_RI.png");
    }


//    private void AddLogSplitter(String message)
//    {
//        StringTestUtils.WriteStringToFile(Global.PathCombine(Folder, LogFilename), "\n" + message + "\n", true);
//    }
//
//    private void GenerateToFileMicroPdf417Flags(String codetext, SymbologyEncodeType encode, boolean isLinked, boolean isReaderInitialization)
//    {
//        String res = String.Empty;
//        String postfix = "_" + encode.ToString();
//        if (isLinked)
//            postfix += "_linked";
//        else
//            postfix += "_notlinked";
//        if (isReaderInitialization)
//            postfix += "_RI";
//        else
//            postfix += "_notRI";
//        String filename = IOTestUtils.GetFixedFilename(codetext + postfix, ".png");
//        //generate file
//        BarcodeGenerator gen = generateMicroPdf417Flags(codetext, encode, isLinked, isReaderInitialization);
//        FrameworkTestUtils.StoreBitmap(Global.PathCombine(Folder, filename), $gen->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
//        //generateAndrecognizeMicroPdf417Flags
//        res += "generateAndrecognizeMicroPdf417Flags(" + StringTestUtils.ConvertNormalStringToCSharpString(codetext) + ", EncodeTypes::"+ encode .ToString() +
//                ", " + isLinked.ToString().ToLower() + ", " + isReaderInitialization.ToString().ToLower() + ");\n";
//        //recognizeMicroPdf417Flags
//        res += "recognizeMicroPdf417Flags(" + StringTestUtils.ConvertNormalStringToCSharpString(codetext) + ", " + isLinked.ToString().ToLower()
//                + ", " + isReaderInitialization.ToString().ToLower() + ", \"" + filename + "\");\n\n";
//        StringTestUtils.WriteStringToFile(Global.PathCombine(Folder, LogFilename), res, true);
//    }

    private function generateAndrecognizeMicroPdf417Flags(String $codetext, int $encode, bool $isLinked, bool $isReaderInitialization)
    {
        $gen = MicroPdf417Tests::generateMicroPdf417Flags($codetext, $encode, $isLinked, $isReaderInitialization);
        $reader = new \Aspose\Barcode\BarCodeReader($gen->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG), null, array(\Aspose\Barcode\DecodeType::MICRO_PDF_417, \Aspose\Barcode\DecodeType::PDF_417, \Aspose\Barcode\DecodeType::MACRO_PDF_417));
        Assert::assertEquals(1, sizeOf($reader->readBarCodes()));
        Assert::assertTrue(in_array($reader->getFoundBarCodes()[0]->getCodeType(), array(\Aspose\Barcode\DecodeType::MICRO_PDF_417, \Aspose\Barcode\DecodeType::PDF_417, \Aspose\Barcode\DecodeType::MACRO_PDF_417)));
        Assert::assertEquals($codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        Assert::assertEquals($isLinked, $reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->isLinked());
        Assert::assertEquals($isReaderInitialization, $reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->isReaderInitialization());
    }

    private function recognizeMicroPdf417Flags(string $codetext, bool $isLinked, bool $isReaderInitialization, string $filename)
    {
        $ms = IOTestUtils::loadToBase64Image(MicroPdf417Tests::Folder . $filename);
        $reader = new \Aspose\Barcode\BarCodeReader($ms, null, array(\Aspose\Barcode\DecodeType::MICRO_PDF_417, \Aspose\Barcode\DecodeType::PDF_417, \Aspose\Barcode\DecodeType::MACRO_PDF_417));
        Assert::assertEquals(1, sizeOf($reader->readBarCodes()));
        Assert::assertTrue(in_array($reader->getFoundBarCodes()[0]->getCodeType(), array(\Aspose\Barcode\DecodeType::MICRO_PDF_417, \Aspose\Barcode\DecodeType::PDF_417, \Aspose\Barcode\DecodeType::MACRO_PDF_417)));
        Assert::assertEquals($codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        Assert::assertEquals($isLinked, $reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->isLinked());
        Assert::assertEquals($isReaderInitialization, $reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->isReaderInitialization());
    }

    private static function generateMicroPdf417Flags(string $codetext, int $encode, bool $isLinked, bool $isReaderInitialization) : BarcodeGenerator
    {
        $gen = new \Aspose\Barcode\BarcodeGenerator($encode, $codetext);
        $gen->getParameters()->getBarcode()->getPdf417()->setLinked($isLinked);
        $gen->getParameters()->getBarcode()->getPdf417()->setReaderInitialization($isReaderInitialization);
        $gen->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::NONE);
        return $gen;
    }

    private function generateAndRecognizeMicroPdf417(string $codetext, bool $isCode128Emulation, int $macroCharacter)
    {
        $gen = $this->generateMicroPdf417($codetext, $isCode128Emulation, $macroCharacter);
        $reader = new \Aspose\Barcode\BarCodeReader($gen->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        Assert::assertEquals(1, sizeOf($reader->readBarCodes()));
        Assert::assertEquals(\Aspose\Barcode\DecodeType::MICRO_PDF_417, $reader->getFoundBarCodes()[0]->getCodeType());
        Assert::assertEquals(MicroPdf417Tests::codetextWithMacroCharacter($codetext, $macroCharacter), $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        Assert::assertEquals($isCode128Emulation, $reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->isCode128Emulation());
    }

    private static function codetextWithMacroCharacter(string $codetext, int $macroCharacter) : string
    {
        $result = "";
        $Macro05Header = "[)>\u{001E}05\u{001d}";
        $Macro06Header = "[)>\u{001E}06\u{001d}";
        $MacroTrailer = "\u{001E}\u{0004}";

        if (MacroCharacter::MACRO_05 == $macroCharacter)
            $result .= $Macro05Header;
        if (MacroCharacter::MACRO_06 == $macroCharacter)
            $result .= $Macro06Header;

        $result .= $codetext;

        if (MacroCharacter::NONE != $macroCharacter)
            $result .= $MacroTrailer;
        return $result;
    }

    private function recognizeMicroPdf417(string $codetext, bool $isCode128Emulation, string $filename) : void
    {
        $ms = IOTestUtils::loadToBase64Image(MicroPdf417Tests::Folder . $filename);
        $reader = new \Aspose\Barcode\BarCodeReader($ms, null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        Assert::assertEquals(1, sizeOf($reader->readBarCodes()));
        Assert::assertEquals(\Aspose\Barcode\DecodeType::MICRO_PDF_417, $reader->getFoundBarCodes()[0]->getCodeType());
        Assert::assertEquals($codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        Assert::assertEquals($isCode128Emulation, $reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->isCode128Emulation());
    }

    private static function generateMicroPdf417(string $codetext, bool $isCode128Emulation, int $macroCharacter) : BarcodeGenerator
    {
        $gen = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::MICRO_PDF_417, $codetext);
        $gen->getParameters()->getBarcode()->getPdf417()->setCode128Emulation($isCode128Emulation);
        $gen->getParameters()->getBarcode()->getPdf417()->setMacroCharacters($macroCharacter);
        $gen->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::NONE);
        return $gen;
    }

    private function generateAndrecognizeGS1MicroPdf417(string $codetext, bool $isLinked) : void
    {
        $gen = MicroPdf417Tests::generateGS1MicroPdf417($codetext, $isLinked);
        $reader = new \Aspose\Barcode\BarCodeReader($gen->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG), null, \Aspose\Barcode\DecodeType::GS_1_MICRO_PDF_417);
        Assert::assertEquals(1, sizeOf($reader->readBarCodes()));
        Assert::assertEquals(\Aspose\Barcode\DecodeType::GS_1_MICRO_PDF_417, $reader->getFoundBarCodes()[0]->getCodeType());
        Assert::assertEquals($codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        Assert::assertEquals($isLinked, $reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->isLinked());
    }

    private function recognizeGS1MicroPdf417(string $codetext, bool $isLinked, string $filename) : void
    {
        $ms = IOTestUtils::loadToBase64Image(MicroPdf417Tests::Folder . $filename);
        $reader = new \Aspose\Barcode\BarCodeReader($ms, null, \Aspose\Barcode\DecodeType::GS_1_MICRO_PDF_417);
        Assert::assertEquals(1, sizeOf($reader->readBarCodes()));
        Assert::assertEquals(\Aspose\Barcode\DecodeType::GS_1_MICRO_PDF_417, $reader->getFoundBarCodes()[0]->getCodeType());
        Assert::assertEquals($codetext, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        Assert::assertEquals($isLinked, $reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->isLinked());
    }

    private static function generateGS1MicroPdf417(string $codetext, bool $isLinked) : BarcodeGenerator
    {
        $gen = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::GS_1_MICRO_PDF_417, $codetext);
        $gen->getParameters()->getBarcode()->getPdf417()->setLinked($isLinked);
        $gen->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::NONE);
        return $gen;
    }

}
TestsLauncher::launch('\building\MicroPdf417Tests', null);