<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use BarcodeQualityMode;
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;
use DeconvolutionMode;
use Point;
use Rectangle;
use assist\Assert;
use assist\TestsLauncher;
use XDimensionMode;
use assist\TestsAssist;



class RecognitionIssues_ReadOnly
{
    private $_folder;

    function setUp(): void
    {
        $this->_folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues";
        \assist\TestsAssist::set_slicense();
    }


//[Category("DataMatrix")]
    function test_Issue34141_datamatrixB4L7S02IMG_20150106_150302_jpg_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue34141/datamatrix-B4L7S02-IMG_20150106_150302.jpg"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0);
        }
    }


    //[Category("AustraliaPost")]
    function test_Issue33424_Postal_AustraliaPost_Png_AustraliaPost()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/Postal/AustraliaPost.Png"), null, \Aspose\Barcode\DecodeType::AUSTRALIA_POST);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(16, 4);
            $expectedPoints[1] = new Point(162, 4);
            $expectedPoints[2] = new Point(162, 22);
            $expectedPoints[3] = new Point(16, 22);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.98);
        }
    }


    //[Category("OneCode")]
    function test_Issue33424_Postal_OneCode_Png_OneCode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/Postal/OneCode.Png"), null, \Aspose\Barcode\DecodeType::ONE_CODE);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(16, 4);
            $expectedPoints[1] = new Point(274, 4);
            $expectedPoints[2] = new Point(274, 16);
            $expectedPoints[3] = new Point(16, 16);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.98);
        }
    }


    //[Category("Planet")]
    function test_Issue33424_Postal_Planet_Png_Planet()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/Postal/Planet.Png"), null, \Aspose\Barcode\DecodeType::PLANET);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(16, 4);
            $expectedPoints[1] = new Point(162, 4);
            $expectedPoints[2] = new Point(162, 15);
            $expectedPoints[3] = new Point(16, 15);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.98);
        }
    }


    //[Category("Postnet")]
    function test_Issue33424_Postal_Postnet_Png_Postnet()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/Postal/Postnet.Png"), null, \Aspose\Barcode\DecodeType::POSTNET);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(16, 4);
            $expectedPoints[1] = new Point(162, 4);
            $expectedPoints[2] = new Point(162, 15);
            $expectedPoints[3] = new Point(16, 15);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.98);
        }
    }


    //[Category("RM4SCC")]
    function test_Issue33424_Postal_RM4SCC_Png_RM4SCC()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/Postal/RM4SCC.Png"), null, \Aspose\Barcode\DecodeType::RM_4_SCC);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(16, 4);
            $expectedPoints[1] = new Point(134, 4);
            $expectedPoints[2] = new Point(134, 22);
            $expectedPoints[3] = new Point(16, 22);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.98);
        }
    }


    //[Category("DataMatrix")]
    function test_Issue33424_2D_DataMatrix_Png_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/2D/DataMatrix.Png"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(16, 4);
            $expectedPoints[1] = new Point(35, 4);
            $expectedPoints[2] = new Point(35, 23);
            $expectedPoints[3] = new Point(16, 23);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.98);
        }
    }


    //[Category("QR")]
    function test_Issue33424_2D_QR_Png_QR()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/2D/QR.Png"), null, \Aspose\Barcode\DecodeType::QR);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(16, 4);
            $expectedPoints[1] = new Point(58, 4);
            $expectedPoints[2] = new Point(58, 46);
            $expectedPoints[3] = new Point(16, 46);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.95);
        }
    }


    //[Category("Aztec")]
    function test_Issue33424_2D_Aztec_Png_Aztec()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/2D/Aztec.Png"), null, \Aspose\Barcode\DecodeType::AZTEC);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(16, 4);
            $expectedPoints[1] = new Point(45, 4);
            $expectedPoints[2] = new Point(45, 33);
            $expectedPoints[3] = new Point(16, 33);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.98);
        }
    }


    //[Category("Pdf417")]
    function test_Issue33424_2D_Pdf417_Png_Pdf417()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/2D/Pdf417.Png"), null, \Aspose\Barcode\DecodeType::PDF_417);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(16, 4);
            $expectedPoints[1] = new Point(185, 4);
            $expectedPoints[2] = new Point(185, 66);
            $expectedPoints[3] = new Point(16, 66);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.98);
        }
    }


    //[Category("MacroPdf417")]
    function test_Issue33424_2D_MacroPdf417_Png_MacroPdf417()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/2D/MacroPdf417.Png"), null, \Aspose\Barcode\DecodeType::MACRO_PDF_417);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(16, 4);
            $expectedPoints[1] = new Point(423, 4);
            $expectedPoints[2] = new Point(423, 633);
            $expectedPoints[3] = new Point(16, 633);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.98);
        }
    }


    //[Category("MicroPdf417")]
    function test_Issue33424_2D_MicroPdf417_Png_MicroPdf417()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33424/2D/MicroPdf417.Png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            $expectedPoints = [4];
            $expectedPoints[0] = new Point(118, 45);
            $expectedPoints[1] = new Point(388, 45);
            $expectedPoints[2] = new Point(388, 155);
            $expectedPoints[3] = new Point(118, 155);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            checkBarcodesRegionMatching($reader->getFoundBarCodes()[0]->getRegion(), $expectedPoints, 0.98);
        }
    }


    //[Category("Code128")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_0_27x18_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_0_27x18.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code128")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_1_28x18_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_1_28x18.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code128")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_2_29x18_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_2_29x18.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code128")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_3_30x18_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_3_30x18.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code128")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_4_31x18_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_4_31x18.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code128")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_5_32x18_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_5_32x18.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code128")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_6_33x18_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_6_33x18.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code128")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_7_34x18_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_7_34x18.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code128")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_8_35x18_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_8_35x18.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_74_35x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_74_35x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_75_36x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_75_36x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_76_37x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_76_37x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_77_38x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_77_38x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_78_39x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_78_39x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_79_40x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_79_40x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_80_41x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_80_41x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_81_42x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_81_42x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_82_43x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_82_43x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_83_44x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_83_44x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_84_45x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_84_45x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_85_46x18_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_85_46x18.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_140_25x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_140_25x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_141_26x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_141_26x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_142_27x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_142_27x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_143_28x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_143_28x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_144_29x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_144_29x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_145_30x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_145_30x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_146_31x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_146_31x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_216_25x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_216_25x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_217_26x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_217_26x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_218_27x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_218_27x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_219_28x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_219_28x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_220_29x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_220_29x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_221_30x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_221_30x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33597_TestingDifferentSizes_ReadOnly_222_31x18_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33597/TestingDifferentSizes_ReadOnly_222_31x18.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("DataMatrix")]
    function test_Issue33845_oneDataMatrix_png_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33845/oneDataMatrix.png"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("D000180090955", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Standard2of5")]
    function test_Issue23729_aspose_png_Standard2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue23729/aspose.png"), null, \Aspose\Barcode\DecodeType::STANDARD_2_OF_5);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


    //[Category("Codabar")]
    function test_Issue33516_SymbologyItem_26_Codabar_png_Codabar()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_26_Codabar.png"), null, \Aspose\Barcode\DecodeType::CODABAR);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code11")]
    function test_Issue33516_SymbologyItem_27_Code11_png_Code11()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_27_Code11.png"), null, \Aspose\Barcode\DecodeType::CODE_11);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Standard")]
    function test_Issue33516_SymbologyItem_28_Code39Standard_png_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_28_Code39Standard.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Extended")]
    function test_Issue33516_SymbologyItem_29_Code39Extended_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_29_Code39Extended.png"), null, \Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Standard")]
    function test_Issue33516_SymbologyItem_30_Code93Standard_png_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_30_Code93Standard.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Extended")]
    function test_Issue33516_SymbologyItem_31_Code93Extended_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_31_Code93Extended.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code128")]
    function test_Issue33516_SymbologyItem_32_Code128_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_32_Code128.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("GS1Code128")]
    function test_Issue33516_SymbologyItem_33_GS1Code128_png_GS1Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_33_GS1Code128.png"), null, \Aspose\Barcode\DecodeType::GS_1_CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN8")]
    function test_Issue33516_SymbologyItem_34_EAN8_png_EAN8()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_34_EAN8.png"), null, \Aspose\Barcode\DecodeType::EAN_8);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN13")]
    function test_Issue33516_SymbologyItem_35_EAN13_png_EAN13()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_35_EAN13.png"), null, \Aspose\Barcode\DecodeType::EAN_13);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("1234500000003", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN14")]
    function test_Issue33516_SymbologyItem_36_EAN14_png_EAN14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_36_EAN14.png"), null, \Aspose\Barcode\DecodeType::EAN_14);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SCC14")]
    function test_Issue33516_SymbologyItem_37_SCC14_png_SCC14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_37_SCC14.png"), null, \Aspose\Barcode\DecodeType::SCC_14);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SSCC18")]
    function test_Issue33516_SymbologyItem_38_SSCC18_png_SSCC18()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_38_SSCC18.png"), null, \Aspose\Barcode\DecodeType::SSCC_18);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("(00)123450000000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("UPCA")]
    function test_Issue33516_SymbologyItem_39_UPCA_png_UPCA()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_39_UPCA.png"), null, \Aspose\Barcode\DecodeType::UPCA);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123450000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("UPCE")]
    function test_Issue33516_SymbologyItem_40_UPCE_png_UPCE()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_40_UPCE.png"), null, \Aspose\Barcode\DecodeType::UPCE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("01234505", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ISBN")]
    function test_Issue33516_SymbologyItem_41_ISBN_png_ISBN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_41_ISBN.png"), null, \Aspose\Barcode\DecodeType::ISBN);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("9781234500009", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Standard2of5")]
    function test_Issue33516_SymbologyItem_42_Standard2of5_png_Standard2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_42_Standard2of5.png"), null, \Aspose\Barcode\DecodeType::STANDARD_2_OF_5);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Interleaved2of5")]
    function test_Issue33516_SymbologyItem_43_Interleaved2of5_png_Interleaved2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_43_Interleaved2of5.png"), null, \Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("012345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Matrix2of5")]
    function test_Issue33516_SymbologyItem_44_Matrix2of5_png_Matrix2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_44_Matrix2of5.png"), null, \Aspose\Barcode\DecodeType::MATRIX_2_OF_5);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ItalianPost25")]
    function test_Issue33516_SymbologyItem_45_ItalianPost25_png_ItalianPost25()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_45_ItalianPost25.png"), null, \Aspose\Barcode\DecodeType::ITALIAN_POST_25);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("012345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("IATA2of5")]
    function test_Issue33516_SymbologyItem_46_IATA2of5_png_IATA2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_46_IATA2of5.png"), null, \Aspose\Barcode\DecodeType::IATA_2_OF_5);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123457", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ITF14")]
    function test_Issue33516_SymbologyItem_47_ITF14_png_ITF14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_47_ITF14.png"), null, \Aspose\Barcode\DecodeType::ITF_14);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ITF6")]
    function test_Issue33516_SymbologyItem_48_ITF6_png_ITF6()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_48_ITF6.png"), null, \Aspose\Barcode\DecodeType::ITF_6);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123450", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MSI")]
    function test_Issue33516_SymbologyItem_49_MSI_png_MSI()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_49_MSI.png"), null, \Aspose\Barcode\DecodeType::MSI);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("VIN")]
    function test_Issue33516_SymbologyItem_50_VIN_png_VIN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_50_VIN.png"), null, \Aspose\Barcode\DecodeType::VIN);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345000300000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DeutschePostIdentcode")]
    function test_Issue33516_SymbologyItem_51_DeutschePostIdentcode_png_DeutschePostIdentcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_51_DeutschePostIdentcode.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_IDENTCODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123450000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DeutschePostLeitcode")]
    function test_Issue33516_SymbologyItem_52_DeutschePostLeitcode_png_DeutschePostLeitcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_52_DeutschePostLeitcode.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_LEITCODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345000000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("OPC")]
    function test_Issue33516_SymbologyItem_53_OPC_png_OPC()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_53_OPC.png"), null, \Aspose\Barcode\DecodeType::OPC);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("1234500005", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("PZN")]
    function test_Issue33516_SymbologyItem_54_PZN_png_PZN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_54_PZN.png"), null, \Aspose\Barcode\DecodeType::PZN);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("-1234504", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Pharmacode")]
    function test_Issue33516_SymbologyItem_55_Pharmacode_png_Pharmacode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_55_Pharmacode.png"), null, \Aspose\Barcode\DecodeType::PHARMACODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SwissPostParcel")]
    function test_Issue33516_SymbologyItem_56_SwissPostParcel_png_SwissPostParcel()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33516/SymbologyItem_56_SwissPostParcel.png"), null, \Aspose\Barcode\DecodeType::SWISS_POST_PARCEL);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("981234500000000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MacroPdf417")]
    function test_Issue13470_encode_bmp_MacroPdf417()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue13470/encode.bmp"), null, \Aspose\Barcode\DecodeType::MACRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 15);
            //graphic file is encoded
        }
    }


    //[Category("AllSupportedTypes")]
    function test_Issue34074_ean_upc_png_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue34074/ean_upc.png"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 2);
            Assert::assertEquals("012345678905", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("012345678905", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
        }
    }


//    //[Category("Code128")]
    public function test_Issue33572_IMG0convSmall_png_Code128()
    {
        $img = $this->_folder . "/Issue33572/IMG0convSmall.png";
        $reader = new \Aspose\Barcode\BarCodeReader($img, new Rectangle(43, 1120, 30, 580), \Aspose\Barcode\DecodeType::CODE_128);
        {
            $reader->getQualitySettings()->setBarcodeQuality(BarcodeQualityMode::LOW);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("TMG1000000000090000000800000001", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("AllSupportedTypes")]
    function test_Issue33441_booklandbarcode_png_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33441/bookland-bar-code.png"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            //Assert::assertTrue(reader.Read(), "Read image: @/'Issue33441/bookland-bar-code.png/' failed. ");
            $values = [];
            $results = $reader->readBarCodes();
            for ($i = 0; $i < sizeof($results); $i++) {
                $result = $results[$i];
                $values[$i] = $result->getCodeText("UTF-8");
            }

            Assert::assertTrue(in_array("9780735200449", $values));
            Assert::assertTrue(in_array("51299", $values));
        }
        print("Test for \"Issue33441/bookland-bar-code.png\" has completed successfully.");
    }


//[Category("DataMatrix")]
    function test_Issue33586_Untitled2_jpg_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33586/Untitled2.jpg"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            $reader->getQualitySettings()->setDeconvolution(DeconvolutionMode::SLOW);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals(":AAAAvGg0ByEJ9w|ac", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("QR")]
    function test_Issue33677_image004_gif_QR()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33677/image004.gif"), null, \Aspose\Barcode\DecodeType::QR);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("MSI")]
    function test_Issue33412_Outputpage85_bmp_MSI()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage85.bmp"), null, \Aspose\Barcode\DecodeType::MSI);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("AllSupportedTypes")]
    function test_Issue33412_Outputpage85_bmp_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage85.bmp"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("AllSupportedTypes")]
    function test_Issue33412_Outputpage47_bmp_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage47.bmp"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("AllSupportedTypes")]
    function test_Issue33412_Outputpage157_bmp_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage157.bmp"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("AllSupportedTypes")]
    function test_Issue33412_Outputpage151_bmp_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage151.bmp"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("PatchCode")]
    function test_Issue33412_Outputpage151_bmp_PatchCode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage151.bmp"), null, \Aspose\Barcode\DecodeType::PATCH_CODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("PatchCode")]
    function test_Issue33412_Outputpage157_bmp_PatchCode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage157.bmp"), null, \Aspose\Barcode\DecodeType::PATCH_CODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("PatchCode")]
    function test_Issue33412_Outputpage35_bmp_PatchCode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage35.bmp"), null, \Aspose\Barcode\DecodeType::PATCH_CODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("PatchCode")]
    function test_Issue33412_Outputpage47_bmp_PatchCode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage47.bmp"), null, \Aspose\Barcode\DecodeType::PATCH_CODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("PatchCode")]
    function test_Issue33412_Outputpage68_bmp_PatchCode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage68.bmp"), null, \Aspose\Barcode\DecodeType::PATCH_CODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("PatchCode")]
    function test_Issue33412_Outputpage85_bmp_PatchCode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage85.bmp"), null, \Aspose\Barcode\DecodeType::PATCH_CODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("PatchCode")]
    function test_Issue33412_Outputpage94_bmp_PatchCode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage94.bmp"), null, \Aspose\Barcode\DecodeType::PATCH_CODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("EAN8")]
    function test_Issue33412_Outputpage151_bmp_EAN8()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage151.bmp"), null, \Aspose\Barcode\DecodeType::EAN_8);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("UPCE")]
    function test_Issue33412_Outputpage151_bmp_UPCE()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage151.bmp"), null, \Aspose\Barcode\DecodeType::UPCE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("Matrix2of5")]
    function test_Issue33412_Outputpage157_bmp_Matrix2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage157.bmp"), null, \Aspose\Barcode\DecodeType::MATRIX_2_OF_5);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("Codabar")]
    function test_Issue33412_Outputpage157_bmp_Codabar()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33412/Outputpage157.bmp"), null, \Aspose\Barcode\DecodeType::CODABAR);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("Code128")]
//[Category("AustraliaPost")]
    function test_Issue33253_Combined_Fail_1_png_Code128_AustraliaPost()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33253/Combined_Fail_1.png"), null, [\Aspose\Barcode\DecodeType::CODE_128, \Aspose\Barcode\DecodeType::AUSTRALIA_POST]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("Code93Standard")]
//[Category("AustraliaPost")]
    function test_Issue33253_Combined_Fail_2_png_Code93Standard_AustraliaPost()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33253/Combined_Fail_2.png"), null, [\Aspose\Barcode\DecodeType::CODE_93, \Aspose\Barcode\DecodeType::AUSTRALIA_POST]);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals(1, $reader->getFoundCount());
        Assert::assertEquals("505 My Road Drive", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


//[Category("Code128")]
//[Category("AustraliaPost")]
    function test_Issue33253_Combined_Fail_3_png_Code128_AustraliaPost()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33253/Combined_Fail_3.png"), null, [\Aspose\Barcode\DecodeType::CODE_128, \Aspose\Barcode\DecodeType::AUSTRALIA_POST]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("Code39Extended")]
//[Category("Code39Standard")]
    function test_Issue33136_cisco_image4_png_Code39Extended_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33136/cisco_image4.png"), null, [\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 3);
            Assert::assertEquals("043071", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("043073", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
            Assert::assertEquals("043074", $reader->getFoundBarCodes()[2]->getCodeText("UTF-8"));
        }
    }


//[Category("Code39Extended")]
//[Category("Code39Standard")]
    function test_Issue33136_cisco_image4_png_Code39Extended_Code39Standard2()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33136/cisco_image4.png"), null, [\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 3);
            Assert::assertEquals("043071", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("043073", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
            Assert::assertEquals("043074", $reader->getFoundBarCodes()[2]->getCodeText("UTF-8"));
        }
    }


//[Category("Code39Extended")]
//[Category("Code39Standard")]
    function test_Issue33136_cisco_image2_png_Code39Extended_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33136/cisco_image2.png"), null, [\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39]);
        {
            $reader->getQualitySettings()->setXDimension(XDimensionMode::SMALL);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 2);
            Assert::assertEquals("046342", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("046341", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
        }
    }


//[Category("Code39Extended")]
//[Category("Code39Standard")]
    function test_Issue33136_cisco_image2_png_Code39Extended_Code39Standard2()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33136/cisco_image2.png"), null, [\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39]);
        {
            $reader->getQualitySettings()->setXDimension(XDimensionMode::SMALL);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 2);
            Assert::assertEquals("046342", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("046341", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
        }
    }


//[Category("Code39Extended")]
//[Category("Code39Standard")]
    function test_Issue33136_cisco_image1_png_Code39Extended_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33136/cisco_image1.png"), null, [\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 2);
            Assert::assertEquals("046348", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("046347", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
        }
    }


//[Category("Code39Extended")]
//[Category("Code39Standard")]
    function test_Issue33136_cisco_image1_png_Code39Extended_Code39Standard2()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33136/cisco_image1.png"), null, [\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 2);
            Assert::assertEquals("046348", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("046347", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
        }
    }


//[Category("Code39Extended")]
//[Category("Code39Standard")]
    function test_Issue33136_cisco_image0_png_Code39Extended_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33136/cisco_image0.png"), null, [\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 2);
            Assert::assertEquals("046346", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("046344", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
        }
    }

    function test_Issue33127_Three_Barcodes_png_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33127/Three_Barcodes.png"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 3);
            Assert::assertEquals("01234321", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("Pegasus Imaging - BarcodeXpress 5 - 1D and 2D barcode reader/writer", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
            Assert::assertEquals("44123123456123456789", $reader->getFoundBarCodes()[2]->getCodeText("UTF-8"));
        }
    }


//[Category("Pharmacode")]
    function test_Issue33254_Pharmacode_3_Nok_png_Pharmacode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33254/Pharmacode_3_Nok.png"), null, \Aspose\Barcode\DecodeType::PHARMACODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("Pharmacode")]
    function test_Issue33254_Pharmacode_7_Nok_png_Pharmacode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33254/Pharmacode_7_Nok.png"), null, \Aspose\Barcode\DecodeType::PHARMACODE);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("DataMatrix")]
    function test_Issue33810_2_PNG_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33810/2.PNG"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("10056004350113100300004", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

//[Category("RM4SCC")]
    function test_Issue33731_cisco_image3_png_RM4SCC()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33731/cisco_image3.png"), null, \Aspose\Barcode\DecodeType::RM_4_SCC);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }

//[Category("DataMatrix")]
    function test_Issue33657_1code_2_png_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33657/1code_2.png"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("DataMatrix")]
    function test_Issue33657_1code_2_inverted_png_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33657/1code_2_inverted.png"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("8000258038", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }

//[Category("DataMatrix")]
    function test_Issue33327_datamatrix144x144_gif_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33327/datamatrix144x144.gif"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("DataMatrix")]
    function test_Issue32427_dataMatrix_GreenBG_png_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue32427/dataMatrix_GreenBG.png"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals("abc", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


//[Category("Code128")]
    function test_Issue19105_exampleimage_lines_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue19105/exampleimage_lines.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("AllSupportedTypes")]
    function test_Issue13748_BIL01192010NY00FL_309_png_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue13748/BIL-01192010-NY-00-FL_309.png"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("MSI")]
    function test_Issue13748_BIL01192010NY00FL_309_png_MSI()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue13748/BIL-01192010-NY-00-FL_309.png"), null, \Aspose\Barcode\DecodeType::MSI);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("Pdf417")]
    function test_Issue28279_SD1Macro1_png_Pdf417()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue28279/SD1Macro1.png"), null, \Aspose\Barcode\DecodeType::PDF_417);
        {
            $reader->getQualitySettings()->setAllowIncorrectBarcodes(true);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
        }
    }


//[Category("Pdf417")]
    function test_Issue28279_SD1Macro2_png_Pdf417()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue28279/SD1Macro2.png"), null, \Aspose\Barcode\DecodeType::PDF_417);
        {
            $reader->getQualitySettings()->setAllowIncorrectBarcodes(true);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
        }
    }


//[Category("Code39Extended")]
//[Category("Code39Standard")]
    function test_Issue28448_ga_edit_300dbi_jpg_Code39Extended_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue28448/ga_edit_300dbi.jpg"), null, [\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("2-CERTIFICATIONS", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("Code39Extended")]
//[Category("Code39Standard")]
    function test_Issue28448_ga_noedit_300dpi_jpg_Code39Extended_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue28448/ga_noedit_300dpi.jpg"), null, [\Aspose\Barcode\DecodeType::CODE_39_FULL_ASCII, \Aspose\Barcode\DecodeType::CODE_39]);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("2-CERTIFICATIONS", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("AllSupportedTypes")]
    function test_Issue31285_Aspose_BarCode144x144_bmp_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue31285/Aspose.BarCode144x144.bmp"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("AllSupportedTypes")]
    function test_Issue31285_TextTooLong_bmp_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue31285/TextTooLong.bmp"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("DataMatrix")]
    function test_Issue32427_color_101010_NOTHING_FOUND_bmp_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue32427/color_101010_NOTHING_FOUND.bmp"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("NOTHING FOUND", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("DataMatrix")]
    function test_Issue32427_color_000099_abc_bmp_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue32427/color_000099_abc.bmp"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals("abc", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


//[Category("DataMatrix")]
    function test_Issue32427_color_000099_MAMA_MILA_RAMU_123_bmp_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue32427/color_000099_MAMA_MILA_RAMU_123.bmp"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("MAMA_MILA_RAMU_123", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("DataMatrix")]
    function test_Issue32427_color_green_abc_bmp_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue32427/color_green_abc.bmp"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals("abc", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }


//[Category("IATA2of5")]
    function test_Issue33231_aspose_invalidechecksum_png_IATA2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33231/aspose_invalidechecksum.png"), null, \Aspose\Barcode\DecodeType::IATA_2_OF_5);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "false is ok");
        }
    }


//[Category("DataMatrix")]
    function test_Issue33257_Barcode200DPIC_png_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33257/Barcode200DPIC.png"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("DatabarOmniDirectional")]
    function test_Issue33268_GS1_DataBar_Omnidirectional_jpg_DatabarOmniDirectional()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33268/GS1_DataBar_Omnidirectional.jpg"), null, \Aspose\Barcode\DecodeType::DATABAR_OMNI_DIRECTIONAL);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)76123456789008", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("DatabarOmniDirectional")]
    function test_Issue33268_rss14_png_DatabarOmniDirectional()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33268/rss14.png"), null, \Aspose\Barcode\DecodeType::DATABAR_OMNI_DIRECTIONAL);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)01234567890128", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("DatabarLimited")]
    function test_Issue33269_xam2_png_DatabarLimited()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33269/xam2.png"), null, \Aspose\Barcode\DecodeType::DATABAR_LIMITED);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)00123456789012", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("Pdf417")]
    function test_Issue33326_barcode0_jpg_Pdf417()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33326/barcode0.jpg"), null, \Aspose\Barcode\DecodeType::PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("AllSupportedTypes")]
    function test_Issue33403_cutted_png_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33403/cutted.png"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("AllSupportedTypes")]
    function test_Issue33429_Test4_jpg_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33429/Test4.jpg"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            $reader->getQualitySettings()->setXDimension(XDimensionMode::SMALL);
            $reader->getQualitySettings()->setBarcodeQuality(BarcodeQualityMode::LOW);
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 6);
            Assert::assertEquals("Samuel", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
            Assert::assertEquals("wws super", $reader->getFoundBarCodes()[2]->getCodeText("UTF-8"));
            Assert::assertEquals("www.si-wws.de", $reader->getFoundBarCodes()[3]->getCodeText("UTF-8"));
            Assert::assertEquals("Test1", $reader->getFoundBarCodes()[4]->getCodeText("UTF-8"));
            Assert::assertEquals("Test2", $reader->getFoundBarCodes()[5]->getCodeText("UTF-8"));
        }
    }


//[Category("QR")]
    function test_Issue33430_qr_error_ab_png_QR()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33430/qr_error_ab.png"), null, \Aspose\Barcode\DecodeType::QR);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 0, "Now ok, need to fix this test");
        }
    }


//[Category("ISBN")]
    function test_Issue19264_IMG1_png_ISBN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue19264/IMG1.png"), null, \Aspose\Barcode\DecodeType::ISBN);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 4);
            Assert::assertEquals("9785318001116", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("0785342354638", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
            Assert::assertEquals("9785318001116", $reader->getFoundBarCodes()[2]->getCodeText("UTF-8"));
            Assert::assertEquals("9785318001116", $reader->getFoundBarCodes()[3]->getCodeText("UTF-8"));
        }
    }


//[Category("QR")]
    function test_Issue33429_bigQR_png_QR()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33429/bigQR.png"), null, \Aspose\Barcode\DecodeType::QR);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("Pdf417")]
    function test_Issue33429_tmp_bmp_Pdf417()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33429/tmp.bmp"), null, \Aspose\Barcode\DecodeType::PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("ABCDEF", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


//[Category("DataMatrix")]
    function test_Issue33429_Outputpage68_bmp_DataMatrix()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Issue33429/Outputpage68.bmp"), null, \Aspose\Barcode\DecodeType::DATA_MATRIX);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("00000000001200370000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }
}

TestsLauncher::launch('\building\RecognitionIssues_ReadOnly', null);
