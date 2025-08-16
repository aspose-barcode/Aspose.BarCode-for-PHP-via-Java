<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';

use Aspose\Barcode\AztecSymbolMode;
use Aspose\Barcode\CodabarChecksumMode;
use Aspose\Barcode\CodabarSymbol;
use Aspose\Barcode\DataMatrixEccType;
use Aspose\Barcode\DataMatrixEncodeMode;
use Aspose\Barcode\DataMatrixVersion;
use Aspose\Barcode\DecodeType;
use Aspose\Barcode\GraphicsUnit;
use Aspose\Barcode\HIBCPASDataLocation;
use Aspose\Barcode\MaxiCodeMode;
use Aspose\Barcode\Pdf417CompactionMode;
use Aspose\Barcode\QRVersion;
use Aspose\Barcode\RectMicroQRVersion;
use assist\AspectRatioTestParam;
use assist\AztecReaderInitializationTestParam;
use assist\AztecSymbolModeTestParam;
use assist\AztectErrorLevelTestParam;
use assist\ColumnsTestParam;
use assist\CustomerInformationInterpretingTypeTestParam;
use assist\DatamatrixEccTestParam;
use assist\DataMatrixEncodeModeTestParam;
use assist\DatamatrixReaderProgrammingTestParam;
use assist\DatamatrixStrucuturedAppendTestParam;
use assist\DatamatrixVersionTestParam;
use assist\DotCodeTestParam;
use assist\HIBCPASTestParam;
use assist\ITF14BorderThicknessTestParam;
use assist\MaxiCodeModeTestParam;
use assist\MicroQREncodeModeTestParam;
use assist\MicroQRErrorLevelTestParam;
use assist\MicroQRVersionTestParam;
use assist\Pdf417CompactionModeTestParam;
use assist\Pdf417ErrorLevelTestParam;
use assist\Pdf417MacroFileIDTestParam;
use assist\Pdf417MacroSegmentCountAndIDTestParam;
use assist\Pdf417TruncateTestParam;
use assist\QREncodeModeTestParam;
use assist\QREncodeTypeAndVersionTestParam;
use assist\QREncodeTypeTestParam;
use assist\QRErrorLevelTestParam;
use assist\QRVersionTestParam;
use assist\RectMicroQREncodeModeTestParam;
use assist\RectMicroQRErrorLevelTestParam;
use assist\RectMicroQRVersionTestParam;
use assist\RowsTestParam;
use assist\BarCodeWidthAndHeightTestParam;
use assist\CodabarChecksumModeTestParam;
use assist\CodabarStartStopSymbolsTestParam;
use Aspose\Barcode\CodeLocation;
use Aspose\Barcode\ComplexBarcodeGenerator;
use Aspose\Barcode\ComplexCodetextReader;
use assist\EnableEscapeTestParam;
use Aspose\Barcode\EncodeTypes;
use Aspose\Barcode\HIBCPASDataType;
use Aspose\Barcode\HIBCPASRecord;
use assist\MarginsTopTestParam;
use assist\ResolutionBarCodeWidthAndHeightTestParam;
use assist\RotationAngleTestParam;
use assist\ShortBarHeightTestParam;
use assist\SupplementDataTestParam;
use assist\SupplementSpaceTestParam;
use assist\Assert;
use assist\HIBCLICTestParam;
use assist\TestsLauncher;

class AllPropertiesGenerationTestsV3
{
    private $codeText = "ABCDEF";
    private $encodeType = \Aspose\Barcode\EncodeTypes::CODE_128;

    private $DefaultDpi = 96;

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    function test_WideNarrowRationProperties()
    {
        print("##test_WideNarrowRationProperties");
        $_list = array();

        $_list[0] = (new \assist\WideNarrowRatioTestParam(281 - 14, 95, 3)); //default
        $_list[1] = (new \assist\WideNarrowRatioTestParam(233 - 14, 95, 2));
        $_list[2] = (new \assist\WideNarrowRatioTestParam(257 - 14, 95, 2.5));
        $_list[3] = (new \assist\WideNarrowRatioTestParam(377 - 14, 95, 5));

        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_39, $this->codeText);
            {
                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_QRDefault()
    {
        print("##test_QRDefault");
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::QR, $this->codeText);
        {
            $generator->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::BELOW);
            $fakeParam = new MarginsTopTestParam(56, 68, 0, GraphicsUnit::MILLIMETER);
            $fakeParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
        }

    }


    function test_QRProperties()
    {
        print("##test_QRProperties");
        $codeText = "FEDCBA";
        $_list = array();

        array_push($_list, new QREncodeTypeTestParam(56, 55, $codeText, \Aspose\Barcode\QREncodeType::FORCE_QR));
        array_push($_list, new QREncodeTypeTestParam(40, 39, $codeText, \Aspose\Barcode\QREncodeType::AUTO));
        array_push($_list, new QREncodeTypeTestParam(40, 39, $codeText, \Aspose\Barcode\QREncodeType::FORCE_MICRO_QR));

        array_push($_list, new QREncodeTypeAndVersionTestParam(55, 55, $codeText, \Aspose\Barcode\QREncodeType::FORCE_QR, \Aspose\Barcode\QRVersion::VERSION_01));
        array_push($_list, new QREncodeTypeAndVersionTestParam(367, 367, $codeText, \Aspose\Barcode\QREncodeType::FORCE_QR, \Aspose\Barcode\QRVersion::VERSION_40));
        array_push($_list, new QREncodeTypeAndVersionTestParam(55, 55, $codeText, \Aspose\Barcode\QREncodeType::AUTO, \Aspose\Barcode\QRVersion::VERSION_01));
        array_push($_list, new QREncodeTypeAndVersionTestParam(367, 367, $codeText, \Aspose\Barcode\QREncodeType::AUTO, \Aspose\Barcode\QRVersion::VERSION_40));
        array_push($_list, new QREncodeTypeAndVersionTestParam(35, 35, "1234", \Aspose\Barcode\QREncodeType::FORCE_MICRO_QR, \Aspose\Barcode\QRVersion::VERSION_M1));
        array_push($_list, new QREncodeTypeAndVersionTestParam(47, 47, $codeText, \Aspose\Barcode\QREncodeType::FORCE_MICRO_QR, \Aspose\Barcode\QRVersion::VERSION_M4));

        array_push($_list, new QRVersionTestParam(56, 55, $codeText, \Aspose\Barcode\QRVersion::AUTO));
        array_push($_list, new QRVersionTestParam(56, 55, $codeText, \Aspose\Barcode\QRVersion::VERSION_01));
        array_push($_list, new QRVersionTestParam(128, 127, $codeText, \Aspose\Barcode\QRVersion::VERSION_10));
        array_push($_list, new QRVersionTestParam(312, 311, $codeText, \Aspose\Barcode\QRVersion::VERSION_33));

        array_push($_list, new QREncodeModeTestParam(56, 55, $codeText, \Aspose\Barcode\QREncodeMode::AUTO));
        array_push($_list, new QREncodeModeTestParam(56, 55, "ABCDEFEDCBA", \Aspose\Barcode\QREncodeMode::BYTES));
        array_push($_list, new QREncodeModeTestParam(64, 63, "ABCDEFEDCBA", \Aspose\Barcode\QREncodeMode::UTF_16_BEBOM));
        array_push($_list, new QREncodeModeTestParam(56, 55, "ABCDEFFEDCBA", \Aspose\Barcode\QREncodeMode::UTF_8_BOM));

        array_push($_list, new QRErrorLevelTestParam(64, 63, "ABCDEFEDCBA", \Aspose\Barcode\QRErrorLevel::LEVEL_H));
        array_push($_list, new QRErrorLevelTestParam(56, 55, "ABCDEFFEDCBA", \Aspose\Barcode\QRErrorLevel::LEVEL_L));
        array_push($_list, new QRErrorLevelTestParam(56, 55, "ABCDFEDCBA", \Aspose\Barcode\QRErrorLevel::LEVEL_M));
        array_push($_list, new QRErrorLevelTestParam(56, 55, "ABCFEDCBA", \Aspose\Barcode\QRErrorLevel::LEVEL_Q));
        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::QR, $testParam->getExpectedCodeText());
            $generator->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::NONE);
            {
                $testParam->apply($generator);
                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }

    /**
     * TODO BARCODEPHP-981 Unexpected error in test_RectMicroQRProperties(): LicenseException(101) for MicroQREncodeModeTestParam
     */
    public function test_MicroQRProperties()
    {
        $codeText = "FEDCBA";
        $_list = array();

        array_push($_list, new MicroQRVersionTestParam(39, 62, $codeText, QRVersion::AUTO));
        array_push($_list, new MicroQRVersionTestParam(35, 58, $codeText, QRVersion::VERSION_M1));
        array_push($_list, new MicroQRVersionTestParam(39, 62, $codeText, QRVersion::VERSION_M2));
        array_push($_list, new MicroQRVersionTestParam(43, 66, $codeText, QRVersion::VERSION_M3));
        array_push($_list, new MicroQRVersionTestParam(47, 70, $codeText, QRVersion::VERSION_M4));

        array_push($_list, new MicroQREncodeModeTestParam(43, 75, "ABCDEFEDCBA", \Aspose\Barcode\QREncodeMode::BYTES));

        array_push($_list, new MicroQRErrorLevelTestParam(43, 75, "ABCDEFFEDCBA", \Aspose\Barcode\QRErrorLevel::LEVEL_L));
        array_push($_list, new MicroQRErrorLevelTestParam(43, 75, "ABCDFEDCBA", \Aspose\Barcode\QRErrorLevel::LEVEL_M));
        array_push($_list, new MicroQRErrorLevelTestParam(47, 70, "ABCFEDCBA", \Aspose\Barcode\QRErrorLevel::LEVEL_Q));

        foreach ($_list as $testParam) {
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::MICRO_QR, $testParam->getExpectedCodeText());
            $generator->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::BELOW);
            $testParam->apply($generator);
//            echo ("width = ". $testParam->getExpectedWidth() . "heigh = t" . $testParam->getExpectedHeight()
//                . "codeText = " . $testParam->getExpectedCodeText()
//                . "qRErrorLevel = " . $testParam->qRErrorLevel);
            echo $testParam;
            $base_64_image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            $testParam->checkResult($base_64_image);
        }
    }

    public function test_RectMicroQRProperties()
    {
        $codeText = "FEDCBA";
        $_list = array();

        array_push($_list, new RectMicroQRVersionTestParam(99, 53, $codeText, RectMicroQRVersion::AUTO));
        array_push($_list, new RectMicroQRVersionTestParam(99, 53, $codeText, RectMicroQRVersion::R7x43));
        array_push($_list, new RectMicroQRVersionTestParam(131, 65, $codeText, RectMicroQRVersion::R13x59));
        array_push($_list, new RectMicroQRVersionTestParam(291, 73, $codeText, RectMicroQRVersion::R17x139));

        array_push($_list, new RectMicroQREncodeModeTestParam(131, 49, "ABCDEFEDCBA", \Aspose\Barcode\QREncodeMode::BYTES));
        array_push($_list, new RectMicroQREncodeModeTestParam(131, 53, "FCBA", \Aspose\Barcode\QREncodeMode::UTF_16_BEBOM));
        array_push($_list, new RectMicroQREncodeModeTestParam(167, 53, "FEDCBAABCDEF", \Aspose\Barcode\QREncodeMode::UTF_8_BOM));

        array_push($_list, new RectMicroQRErrorLevelTestParam(167, 53, "ABCDEFFEDCBA", \Aspose\Barcode\QRErrorLevel::LEVEL_H));
        array_push($_list, new RectMicroQRErrorLevelTestParam(131, 49, "ABCDFEDCBA", \Aspose\Barcode\QRErrorLevel::LEVEL_M));

        foreach ($_list as $testParam) {
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::RECT_MICRO_QR, $testParam->getExpectedCodeText());
            $generator->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::BELOW);
            $testParam->apply($generator);
            $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
        }
    }


    function test_DataMatrixProperties()
    {
        $_list = array();

        array_push($_list, new DatamatrixEccTestParam(37, 60, $this->codeText, DataMatrixEccType::ECC_AUTO));
        array_push($_list, new DatamatrixEccTestParam(36, 58, $this->codeText, DataMatrixEccType::ECC_000));
        array_push($_list, new DatamatrixEccTestParam(44, 66, $this->codeText, DataMatrixEccType::ECC_080));
        array_push($_list, new DatamatrixEccTestParam(44, 66, $this->codeText, DataMatrixEccType::ECC_100));
        array_push($_list, new DatamatrixEccTestParam(56, 68, $this->codeText, DataMatrixEccType::ECC_140));
        array_push($_list, new DatamatrixEccTestParam(56, 68, $this->codeText, DataMatrixEccType::ECC_140));
        array_push($_list, new DatamatrixEccTestParam(37, 60, $this->codeText, DataMatrixEccType::ECC_200));

        array_push($_list, new DatamatrixVersionTestParam(77, 90, $this->codeText, DataMatrixEccType::ECC_200, DataMatrixVersion::ECC200_32x32));
        array_push($_list, new DatamatrixVersionTestParam(301, 314, $this->codeText, DataMatrixEccType::ECC_AUTO, DataMatrixVersion::ECC200_144x144));
// TODO       array_push($_list, new DatamatrixVersionTestParam(39, 62, $this->codeText, DataMatrixEccType::ECC_000, DataMatrixVersion::ECC000_100_13x13));
        array_push($_list, new DatamatrixVersionTestParam(43, 66, $this->codeText, DataMatrixEccType::ECC_050, DataMatrixVersion::ECC000_100_15x15));
        array_push($_list, new DatamatrixVersionTestParam(43, 66, $this->codeText, DataMatrixEccType::ECC_080, DataMatrixVersion::ECC000_100_15x15));
        array_push($_list, new DatamatrixVersionTestParam(43, 66, $this->codeText, DataMatrixEccType::ECC_100, DataMatrixVersion::ECC000_100_15x15));
        array_push($_list, new DatamatrixVersionTestParam(111, 124, $this->codeText, DataMatrixEccType::ECC_140, DataMatrixVersion::ECC000_140_49x49));
        array_push($_list, new DatamatrixVersionTestParam(189, 50, $this->codeText, DataMatrixEccType::ECC_AUTO, DataMatrixVersion::DMRE_12x88));
        array_push($_list, new DatamatrixVersionTestParam(301, 42, $this->codeText, DataMatrixEccType::ECC_200, DataMatrixVersion::DMRE_8x144));


        array_push($_list, new DataMatrixEncodeModeTestParam(37, 60, $this->codeText, DataMatrixEncodeMode::AUTO));
        array_push($_list, new DataMatrixEncodeModeTestParam(41, 64, $this->codeText, DataMatrixEncodeMode::ASCII));
        array_push($_list, new DataMatrixEncodeModeTestParam(37, 60, $this->codeText, DataMatrixEncodeMode::C40));
        array_push($_list, new DataMatrixEncodeModeTestParam(37, 60, $this->codeText, DataMatrixEncodeMode::ANSIX12));
        array_push($_list, new DataMatrixEncodeModeTestParam(42, 64, $this->codeText, DataMatrixEncodeMode::BYTES));
        array_push($_list, new DataMatrixEncodeModeTestParam(42, 64, $this->codeText, DataMatrixEncodeMode::EDIFACT));
        array_push($_list, new DataMatrixEncodeModeTestParam(46, 68, $this->codeText, DataMatrixEncodeMode::TEXT));

        array_push($_list, new DatamatrixStrucuturedAppendTestParam(37, 60, $this->codeText, 0, 0, 0));
        array_push($_list, new DatamatrixStrucuturedAppendTestParam(45, 68, $this->codeText, 1, 2, 10));
        array_push($_list, new DatamatrixStrucuturedAppendTestParam(45, 68, $this->codeText, 16, 16, 64516));
        array_push($_list, new DatamatrixStrucuturedAppendTestParam(45, 68, $this->codeText, 6, 8, 1));

        array_push($_list, new DatamatrixReaderProgrammingTestParam(37, 60, $this->codeText, false));
        array_push($_list, new DatamatrixReaderProgrammingTestParam(41, 64, $this->codeText, true));


        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::DATA_MATRIX, $testParam->getExpectedCodeText());
            $generator->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::BELOW);
            {
                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_AztecProperties()
    {
        $codeText = "ABCDEFFEDCBA";
        $_list = array();

        array_push($_list, new AztecSymbolModeTestParam(44, 75, $codeText, AztecSymbolMode::AUTO, 0));
        array_push($_list, new AztecSymbolModeTestParam(44, 75, $codeText, AztecSymbolMode::COMPACT, 0));
        array_push($_list, new AztecSymbolModeTestParam(52, 74, $codeText, AztecSymbolMode::FULL_RANGE, 0));
        array_push($_list, new AztecSymbolModeTestParam(44, 75, $codeText, AztecSymbolMode::AUTO, 1));
        array_push($_list, new AztecSymbolModeTestParam(44, 75, $codeText, AztecSymbolMode::COMPACT, 1));
        array_push($_list, new AztecSymbolModeTestParam(52, 74, $codeText, AztecSymbolMode::FULL_RANGE, 1));
        array_push($_list, new AztecSymbolModeTestParam(315, 328, $codeText, AztecSymbolMode::AUTO, 32));
        array_push($_list, new AztecSymbolModeTestParam(59, 82, $codeText, AztecSymbolMode::COMPACT, 3));
        array_push($_list, new AztecSymbolModeTestParam(315, 328, $codeText, AztecSymbolMode::FULL_RANGE, 32));
        array_push($_list, new AztecSymbolModeTestParam(179, 192, $codeText, AztecSymbolMode::AUTO, 16));
        array_push($_list, new AztecSymbolModeTestParam(51, 75, $codeText, AztecSymbolMode::COMPACT, 2));
        array_push($_list, new AztecSymbolModeTestParam(215, 228, $codeText, AztecSymbolMode::FULL_RANGE, 20));
        array_push($_list, new AztecSymbolModeTestParam(36, 48, "1", AztecSymbolMode::RUNE, 0));

        array_push($_list, new AztecReaderInitializationTestParam(44, 75, $codeText, AztecSymbolMode::AUTO, 0, true));
        array_push($_list, new AztecReaderInitializationTestParam(44, 75, $codeText, AztecSymbolMode::COMPACT, 0, true));
        array_push($_list, new AztecReaderInitializationTestParam(52, 74, $codeText, AztecSymbolMode::FULL_RANGE, 0, true));

        array_push($_list, new AztectErrorLevelTestParam(44, 75, $codeText, 23));
        array_push($_list, new AztectErrorLevelTestParam(44, 75, $codeText, 5));
        array_push($_list, new AztectErrorLevelTestParam(52, 74, $codeText, 70));
        array_push($_list, new AztectErrorLevelTestParam(103, 116, $codeText, 95));

        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, $testParam->getExpectedCodeText());
            $generator->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::BELOW);
            {
                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_2DProperties()
    {
        $_list = array();

        array_push($_list, new ColumnsTestParam(186, 85, $this->codeText, 1)); //default
        array_push($_list, new ColumnsTestParam(220, 49, $this->codeText, 2));
        array_push($_list, new ColumnsTestParam(254, 37, $this->codeText, 3));

        array_push($_list, new RowsTestParam(219, 67, $this->codeText, 9)); //default
        array_push($_list, new RowsTestParam(253, 43, $this->codeText, 5));
        array_push($_list, new RowsTestParam(186, 85, $this->codeText, 12));

        array_push($_list, new AspectRatioTestParam(186, 85, $this->codeText, 3)); //default
        array_push($_list, new AspectRatioTestParam(186, 133, $this->codeText, 5));
        array_push($_list, new AspectRatioTestParam(186, 61, $this->codeText, 2));

        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::PDF_417, $testParam->getExpectedCodeText());
            {
                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_ITF14Properties()
    {
        $_list = array();

        array_push($_list, ITF14BorderThicknessTestParam::construct(634, 181, 4.8, GraphicsUnit::MILLIMETER, 620, 121, 18)); //default
        array_push($_list, ITF14BorderThicknessTestParam::construct(634, 181, 5, GraphicsUnit::PIXEL, 620, 121, 5));

        array_push($_list, new ITF14BorderThicknessTestParam(634, 181, 4.8, GraphicsUnit::MILLIMETER, 620, 121, 18, ITF14BorderType::BAR)); //default
        array_push($_list, new ITF14BorderThicknessTestParam(634, 217, 4.8, GraphicsUnit::MILLIMETER, 620, 121, 18, ITF14BorderType::BAR_OUT));
        array_push($_list, new ITF14BorderThicknessTestParam(670, 181, 4.8, GraphicsUnit::MILLIMETER, 620, 121, 18, ITF14BorderType::FRAME));
        array_push($_list, new ITF14BorderThicknessTestParam(670, 217, 4.8, GraphicsUnit::MILLIMETER, 620, 121, 18, ITF14BorderType::FRAME_OUT));
        array_push($_list, new ITF14BorderThicknessTestParam(634, 181, 4.8, GraphicsUnit::MILLIMETER, 620, 120, 18, ITF14BorderType::NONE));
        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::ITF_14, null);
            {
                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }

    function test_Pdf417Properties()
    {
        $_list = array();

        array_push($_list, new Pdf417ErrorLevelTestParam(186, 49, $this->codeText, \Aspose\Barcode\Pdf417ErrorLevel::LEVEL_0));  //default
        array_push($_list, new Pdf417ErrorLevelTestParam(186, 61, $this->codeText, \Aspose\Barcode\Pdf417ErrorLevel::LEVEL_1));
        array_push($_list, new Pdf417ErrorLevelTestParam(186, 85, $this->codeText, \Aspose\Barcode\Pdf417ErrorLevel::LEVEL_2));
        array_push($_list, new Pdf417ErrorLevelTestParam(186, 133, $this->codeText, \Aspose\Barcode\Pdf417ErrorLevel::LEVEL_3));
        array_push($_list, new Pdf417ErrorLevelTestParam(186, 229, $this->codeText, \Aspose\Barcode\Pdf417ErrorLevel::LEVEL_4));
        array_push($_list, new Pdf417ErrorLevelTestParam(219, 217, $this->codeText, \Aspose\Barcode\Pdf417ErrorLevel::LEVEL_5));
        array_push($_list, new Pdf417ErrorLevelTestParam(253, 277, $this->codeText, \Aspose\Barcode\Pdf417ErrorLevel::LEVEL_6));
        array_push($_list, new Pdf417ErrorLevelTestParam(321, 325, $this->codeText, \Aspose\Barcode\Pdf417ErrorLevel::LEVEL_7));
        array_push($_list, new Pdf417ErrorLevelTestParam(423, 403, $this->codeText, \Aspose\Barcode\Pdf417ErrorLevel::LEVEL_8));

        array_push($_list, new Pdf417TruncateTestParam(186, 85, $this->codeText, false)); //default
        array_push($_list, new Pdf417TruncateTestParam(117, 85, $this->codeText, true));

        array_push($_list, new Pdf417CompactionModeTestParam(186, 85, $this->codeText, Pdf417CompactionMode::AUTO)); //default
        array_push($_list, new Pdf417CompactionModeTestParam(186, 85, $this->codeText, Pdf417CompactionMode::TEXT));

        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::PDF_417, $this->codeText);
            {
                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_MacroPdf417Properties()
    {
        $_list = array();

        array_push($_list, new Pdf417MacroFileIDTestParam(186, 85, $this->codeText, -1)); //default
        array_push($_list, new Pdf417MacroFileIDTestParam(186, 115, $this->codeText, 15900));
        array_push($_list, new Pdf417MacroFileIDTestParam(186, 109, $this->codeText, 899));

        array_push($_list, new Pdf417MacroSegmentCountAndIDTestParam(186, 85, $this->codeText, -1, -1)); //default
        array_push($_list, new Pdf417MacroSegmentCountAndIDTestParam(186, 127, $this->codeText, 2, 1));
        array_push($_list, new Pdf417MacroSegmentCountAndIDTestParam(186, 127, $this->codeText, 12, 1));
        array_push($_list, new Pdf417MacroSegmentCountAndIDTestParam(186, 133, $this->codeText, 2, 3));
        array_push($_list, new Pdf417MacroSegmentCountAndIDTestParam(186, 127, $this->codeText, 12, 3));
        array_push($_list, new Pdf417MacroSegmentCountAndIDTestParam(186, 127, $this->codeText, 22, 55));
        array_push($_list, new Pdf417MacroSegmentCountAndIDTestParam(186, 127, $this->codeText, 122, 55));

        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::MACRO_PDF_417, $this->codeText);
            {
                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_CodabarProperties()
    {
        $codeText = "654767879894234354364";

        $_list = array();

        $_list[0] = (new CodabarChecksumModeTestParam(521, 95, $codeText, CodabarChecksumMode::MOD_16));  //default
        $_list[1] = (new CodabarChecksumModeTestParam(521, 95, $codeText, CodabarChecksumMode::MOD_10));

        $_list[2] = (new CodabarStartStopSymbolsTestParam(521, 95, $codeText, CodabarSymbol::A, CodabarSymbol::A));  //default
        $_list[3] = (new CodabarStartStopSymbolsTestParam(521, 95, $codeText, CodabarSymbol::A, CodabarSymbol::B));
        $_list[4] = (new CodabarStartStopSymbolsTestParam(521, 95, $codeText, CodabarSymbol::A, CodabarSymbol::D));
        $_list[5] = (new CodabarStartStopSymbolsTestParam(521, 95, $codeText, CodabarSymbol::B, CodabarSymbol::A));
        $_list[6] = (new CodabarStartStopSymbolsTestParam(521, 95, $codeText, CodabarSymbol::C, CodabarSymbol::D));
        $_list[7] = (new CodabarStartStopSymbolsTestParam(521, 95, $codeText, CodabarSymbol::C, CodabarSymbol::A));
        $_list[8] = (new CodabarStartStopSymbolsTestParam(521, 95, $codeText, CodabarSymbol::C, CodabarSymbol::B));
        $_list[9] = (new CodabarStartStopSymbolsTestParam(521, 95, $codeText, CodabarSymbol::C, CodabarSymbol::C));
        $_list[10] = (new CodabarStartStopSymbolsTestParam(521, 95, $codeText, CodabarSymbol::C, CodabarSymbol::D));
        $_list[11] = (new CodabarStartStopSymbolsTestParam(521, 95, $codeText, CodabarSymbol::D, CodabarSymbol::C));
        for ($i = 0; $i < sizeof($_list); $i++) {
            print("### counter -> $i ");
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODABAR, $codeText);
            $testParam->apply($generator);
            $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
        }
    }


    function test_SupplementProperties()
    {
        $codeText = "1234567890128";

        $_list1 = array();

        $list1[0] = (new SupplementSpaceTestParam(178, 107, 4, GraphicsUnit::MILLIMETER));  //default
        $list1[1] = (new SupplementSpaceTestParam(167, 107, 1, GraphicsUnit::MILLIMETER));
        $list1[2] = (new SupplementSpaceTestParam(201, 107, 10, GraphicsUnit::MILLIMETER));
        $list1[3] = (new SupplementSpaceTestParam(178, 107, 15, GraphicsUnit::PIXEL));
        $list1[4] = (new SupplementSpaceTestParam(188, 107, 25, GraphicsUnit::PIXEL));

        for ($i = 0; $i < sizeof($list1); $i++) {
            $testParam = $list1[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::EAN_13, $codeText);
            {
                $generator->getParameters()->getBarcode()->getSupplement()->setSupplementData("12345");

                $testParam->apply($generator);
                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }

        $_list2 = [];
        $list2[0] = (SupplementDataTestParam::construct(189, 107, $codeText, "12345"));
        $list2[1] = (new SupplementDataTestParam(259, 159, "602003", "25432", EncodeTypes::INTERLEAVED_2_OF_5));

        for ($i = 0; $i < sizeof($list2); $i++) {
            $testParam = $list2[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator($testParam->getEncodeType(), $codeText);
            {
                $generator->getParameters()->getBarcode()->getSupplement()->getSupplementSpace()->setMillimeters(7);

                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }

    function test_RotationAngleProperties()
    {
        $_list = array();

        $_list[0] = (RotationAngleTestParam::construct(216, 159, 0));  //default
        $_list[1] = (RotationAngleTestParam::construct(216, 159, 180));
        $_list[2] = (RotationAngleTestParam::construct(159, 216, 270));

        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator($this->encodeType, $this->codeText);
            {
                $testParam->apply($generator);
                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_CustomerInformationInterpretingTypeProperties()
    {
        $_list = array();

        array_push($_list, new CustomerInformationInterpretingTypeTestParam(159, 53, "1123456789", CustomerInformationInterpretingType::OTHER, CustomerInformationInterpretingType::OTHER)); //default
        array_push($_list, new CustomerInformationInterpretingTypeTestParam(159, 53, "1123456789", CustomerInformationInterpretingType::OTHER, CustomerInformationInterpretingType::N_TABLE));
        array_push($_list, new CustomerInformationInterpretingTypeTestParam(159, 53, "1123456789", CustomerInformationInterpretingType::N_TABLE, CustomerInformationInterpretingType::N_TABLE));
        array_push($_list, new CustomerInformationInterpretingTypeTestParam(219, 53, "5912345678ABCde", CustomerInformationInterpretingType::C_TABLE, CustomerInformationInterpretingType::C_TABLE));
        array_push($_list, new CustomerInformationInterpretingTypeTestParam(279, 53, "6279438541AaaBaa 155", CustomerInformationInterpretingType::C_TABLE, CustomerInformationInterpretingType::C_TABLE));

        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AUSTRALIA_POST, $testParam->codeText);
            {
                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_EnableEscapeProperties()
    {
        $_list = array();

        $_list[0] = (new EnableEscapeTestParam(304, 159, "ABC\\013DEF", "ABC\\013DEF", false)); //default
        $_list[1] = (new EnableEscapeTestParam(260, 159, "ABC\rDEF", "ABC\\013DEF", true));
        $_list[2] = (new EnableEscapeTestParam(282, 159, "ABC\\CRDEF", "ABC\\CRDEF", false));
        $_list[3] = (new EnableEscapeTestParam(260, 159, "ABC\rDEF", "ABC\\CRDEF", true));

        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator($this->encodeType, $testParam->codeText);
            {
                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_ShortBarHeightProperties()
    {
        $_list = array();

        $_list[0] = (new ShortBarHeightTestParam(240, 53, 22, 11, 3, GraphicsUnit::MILLIMETER));
        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::POSTNET, "1234567890");
            {
                $testParam->apply($generator);
                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }

        $_list[0] = (new ShortBarHeightTestParam(240, 114, 76, 40, 40, GraphicsUnit::PIXEL));

        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::POSTNET, "1234567890");
            {
                $generator->getParameters()->getBarcode()->getBarHeight()->setMillimeters(20);
                $testParam->apply($generator);

                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_BarcodeWidthAndHeightProperties()
    {
        $_list = array();
        $_list[0] = (BarCodeWidthAndHeighttestParam::construct(700, 300, EncodeTypes::CODE_128, 700, GraphicsUnit::PIXEL, 300, GraphicsUnit::PIXEL));
        $_list[1] = (BarCodeWidthAndHeighttestParam::construct(700, 300, EncodeTypes::QR, 700, GraphicsUnit::PIXEL, 300, GraphicsUnit::PIXEL));
        $_list[2] = (BarCodeWidthAndHeighttestParam::construct(700, 300, EncodeTypes::AZTEC, 700, GraphicsUnit::PIXEL, 300, GraphicsUnit::PIXEL));
        $_list[3] = (BarCodeWidthAndHeighttestParam::construct(700, 300, EncodeTypes::DATA_MATRIX, 700, GraphicsUnit::PIXEL, 300, GraphicsUnit::PIXEL));
        $_list[4] = (BarCodeWidthAndHeighttestParam::construct(700, 300, EncodeTypes::DATABAR_STACKED, 700, GraphicsUnit::PIXEL, 300, GraphicsUnit::PIXEL));

        $_list[5] = (BarCodeWidthAndHeighttestParam::construct(300, 100, EncodeTypes::CODE_39, 300, GraphicsUnit::PIXEL, 100, GraphicsUnit::PIXEL));

        $_list[6] = (new ResolutionBarCodeWidthAndHeightTestParam(300, 100, EncodeTypes::CODE_39, 300, GraphicsUnit::PIXEL, 100, GraphicsUnit::PIXEL, $this->DefaultDpi));
        $_list[7] = (new ResolutionBarCodeWidthAndHeightTestParam(300, 100, EncodeTypes::CODE_39, 300, GraphicsUnit::PIXEL, 100, GraphicsUnit::PIXEL, 120));

        $_list[8] = (BarCodeWidthAndHeighttestParam::construct(288, 472, EncodeTypes::DATA_MATRIX, 3, GraphicsUnit::INCH, 125, GraphicsUnit::MILLIMETER));
        $_list[9] = (new ResolutionBarCodeWidthAndHeightTestParam(288, 472, EncodeTypes::DATA_MATRIX, 3, GraphicsUnit::INCH, 125, GraphicsUnit::MILLIMETER, $this->DefaultDpi));
        $_list[10] = (new ResolutionBarCodeWidthAndHeightTestParam(360, 590, EncodeTypes::DATA_MATRIX, 3, GraphicsUnit::INCH, 125, GraphicsUnit::MILLIMETER, 120));
        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator($testParam->EncodeType, null);
            {
                $testParam->apply($generator);

                //double check
                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }


    function test_DotCodeProperties()
    {
        $_list = array();

        array_push($_list, new DotCodeTestParam(328, 245, "ABCDEF-1", -1, -1)); //default
        array_push($_list, new DotCodeTestParam(853, 110, "ABCDEF0", 5, -1));
        array_push($_list, new DotCodeTestParam(718, 125, "ABCDEF1", 6, -1));
        array_push($_list, new DotCodeTestParam(163, 560, "ABCDEF127", -1, 10));
        array_push($_list, new DotCodeTestParam(178, 515, "ABCDEF127", -1, 11));
        for ($i = 0; $i < sizeof($_list); $i++) {
            $testParam = $_list[$i];
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::DOT_CODE, $testParam->getExpectedCodeText());
            $generator->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::BELOW);
            {
                $testParam->apply($generator);
                $res = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
                $testParam->checkResult($res);
            }
        }
    }

    function test_MaxiCodeProperties()
    {
        $_list = array();

        array_push($_list, new MaxiCodeModeTestParam(592, 575, "ABCDEF-4", MaxiCodeMode::MODE_4, 0, -1)); //default
        array_push($_list, new MaxiCodeModeTestParam(592, 575, "ABCDEF-4", MaxiCodeMode::MODE_4, 1, 3));
        array_push($_list, new MaxiCodeModeTestParam(592, 575, "ABCDEF-5", MaxiCodeMode::MODE_5, 1, 2));
        array_push($_list, new MaxiCodeModeTestParam(592, 564, "ABCDEF127DEF654GHIABCDEF127DEF654GHIABCDEF127DEF654GHIABCDEF127DEF654GHIABCDEF127DEF654GHI-6", MaxiCodeMode::MODE_6, 0, -1));

        foreach ($_list as $testParam) {
            $complexGenerator = new ComplexBarcodeGenerator($testParam->maxiCodeCodetext);
            {
                $complexGenerator->getParameters()->getBarcode()->getCodeTextParameters()->setLocation(\Aspose\Barcode\CodeLocation::BELOW);
                $complexGenerator->getParameters()->getBarcode()->getMaxiCode()->setMaxiCodeStructuredAppendModeBarcodeId($testParam->maxiCodeStructuredAppendModeBarcodeId);
                $complexGenerator->getParameters()->getBarcode()->getMaxiCode()->setMaxiCodeStructuredAppendModeBarcodesCount($testParam->maxiCodeStructuredAppendModeBarcodesCount);
                $testParam->checkResult($complexGenerator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }

    public function test_HIBCProperties()
    {
        $_list = array();
        array_push($_list, new HIBCLICTestParam(523, 96, EncodeTypes::HIBC_CODE_39_LIC, CodetextType::Primary, "A999", "1234567", 5, HIBCLICDateFormat::NONE, (new \DateTime())->setTimestamp(0), null, null, (new \DateTime())->setTimestamp(0), -1, 'L'));
//        array_push($_list,new HIBCLICTestParam(699, 95, EncodeTypes::HIBC_CODE_128_LIC, CodetextType::Secondary, null, null, -1, HIBCLICDateFormat::YYMMDDHH, new DateTime('now'), "LOT123", null, (new \DateTime())->setTimestamp(0), -1, 'L'));
//        array_push($_list,new HIBCLICTestParam(59, 59, EncodeTypes::HIBC_AZTEC_LIC, CodetextType::Combined, "A999", "1234", 0, HIBCLICDateFormat::NONE, (new \DateTime())->setTimestamp(0), "LOT123", null, (new \DateTime())->setTimestamp(0), -1, 'L'));
//        array_push($_list,new HIBCLICTestParam(57, 57, EncodeTypes::HIBC_DATA_MATRIX_LIC, CodetextType::Combined, "A999", "1234", 5, HIBCLICDateFormat::MMYY, new DateTime('now'), "LOT123", "", (new \DateTime())->setTimestamp(0), 500, 'L'));
//        array_push($_list,new HIBCLICTestParam(71, 71, EncodeTypes::HIBCQRLIC, CodetextType::Combined, "A999", "123456789012345678", 5, HIBCLICDateFormat::YYJJJHH, new DateTime('now'), null, "SERIAL123", new DateTime('now'), -1, 'L'));
//        array_push($_list,new HIBCLICTestParam(59, 59, EncodeTypes::HIBC_AZTEC_LIC, CodetextType::Combined, "A999", "1", 5, HIBCLICDateFormat::YYYYMMDD, new DateTime('now'), "", "SERIAL123", new DateTime('now'), -1, 'L'));
//        array_push($_list,new HIBCLICTestParam(71, 71, EncodeTypes::HIBCQRLIC, CodetextType::Combined, "A999", "1234", 9, HIBCLICDateFormat::YYMMDD, (new \DateTime())->setTimestamp(0), "LOT123", "SERIAL123", (new \DateTime())->setTimestamp(0), 0, 'L'));

        foreach ($_list as $testParam) {
            $generator = new ComplexBarcodeGenerator($testParam->expectedComplexCodetext);
            {
                $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
            }
        }
    }

    public function test_HIBCProperties_AllSupportedTypes()
    {
        $typesList = array(
            EncodeTypes::HIBC_CODE_39_LIC,
            EncodeTypes::HIBC_CODE_128_LIC,
            EncodeTypes::HIBC_AZTEC_LIC,
            EncodeTypes::HIBC_DATA_MATRIX_LIC,
            EncodeTypes::HIBCQRLIC);

        $codetext = "+A99912345675/$$3221014LOT123/SSERIAL123/16D20221014/Q500C";
        foreach ($typesList as $type) {
            $generator = new \Aspose\Barcode\BarcodeGenerator($type, $codetext);
            {
                $bitmap = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
                $reader = new \Aspose\Barcode\BarCodeReader($bitmap, null, DecodeType::ALL_SUPPORTED_TYPES);
                {
                    Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
                    $decodedCodetext = $reader->getFoundBarCodes()[0]->getCodeText("UTF-8");
                    Assert::assertEquals($codetext, $decodedCodetext);
                }
            }
        }
    }

    public function test_HIBCPASPropertiesComplexCodetext()
    {
        $records = array(
            new HIBCPASRecord(HIBCPASDataType::LABELER_IDENTIFICATION_CODE, "A123"),
            new HIBCPASRecord(HIBCPASDataType::SERVICE_IDENTIFICATION, "SERVICE123"),
            new HIBCPASRecord(HIBCPASDataType::DATE_TIME, "AAAAAAAAAAAAAAA"),
            new HIBCPASRecord(HIBCPASDataType::USER_DEFINED, "123456789012345"));

        $_list = array();
        array_push($_list, new HIBCPASTestParam(363, 96, "HIBC_CODE_39_PAS", HIBCPASDataLocation::PATIENT, array($records[0])));
        array_push($_list, new HIBCPASTestParam(413, 96, "HIBC_CODE_128_PAS", HIBCPASDataLocation::USER_DEFINED, array($records[1])));
        array_push($_list, new HIBCPASTestParam(67, 67, "HIBC_AZTEC_PAS", HIBCPASDataLocation::DEVICES_AND_MATERIALS, $records));
        array_push($_list, new HIBCPASTestParam(65, 65, "HIBC_DATA_MATRIX_PAS", HIBCPASDataLocation::DEVICES_AND_MATERIALS, $records));
        array_push($_list, new HIBCPASTestParam(55, 55, "HIBCQRPAS", HIBCPASDataLocation::DEVICES_AND_MATERIALS, array($records[3])));

        foreach ($_list as $testParam) {
            $generator = new ComplexBarcodeGenerator($testParam->expectedComplexCodetext);
            $testParam->checkResult($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
        }
    }

    public function test_HIBCPASProperties()
    {
        $codetextsList = array();
        array_push($codetextsList, "+/AAA123V");
        array_push($codetextsList, "AAA123");
        array_push($codetextsList, "AAA123/Z123456789012345");

        foreach ($codetextsList as $expectedCodetext) {

            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::HIBCQRPAS, $expectedCodetext);
            {
                $reader = new \Aspose\Barcode\BarCodeReader($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG), null, \Aspose\Barcode\DecodeType::HIBCQRPAS);
                {
                    Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
                    $codetext = $reader->getFoundBarCodes()[0]->getCodeText("UTF-8");
                    $complexCodetext = ComplexCodetextReader::tryDecodeHIBCPAS($codetext);
                    $expectedComplexCodetext = ComplexCodetextReader::tryDecodeHIBCPAS($expectedCodetext);
                    Assert::assertEquals($expectedComplexCodetext, $complexCodetext);
                }
            }
        }
    }
}

//TestsLauncher::launch('\building\AllPropertiesGenerationTestsV3', "test_MicroQRProperties");
TestsLauncher::launch('\building\AllPropertiesGenerationTestsV3', null);