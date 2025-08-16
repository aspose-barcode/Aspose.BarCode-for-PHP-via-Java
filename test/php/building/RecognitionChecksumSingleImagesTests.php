<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;



class RecognitionChecksumSingleImagesTests
{
    private $_folder;

     function setUp(): void
    {
        $this->_folder = \assist\TestsAssist::TESTDATA_ROOT."Recognition/ChecksumTest/";
        \assist\TestsAssist::set_slicense();
    }


//[Category("Codabar")]
    function test_Codabar_01_png_Codabar()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Codabar_01.png"), null, \Aspose\Barcode\DecodeType::CODABAR);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Codabar")]
    function test_Codabar_02_png_Codabar()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Codabar_02.png"), null, \Aspose\Barcode\DecodeType::CODABAR);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Codabar")]
    function test_Codabar_03_png_Codabar()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Codabar_03.png"), null, \Aspose\Barcode\DecodeType::CODABAR);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("580945", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Codabar")]
    function test_Codabar_04_png_Codabar()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Codabar_04.png"), null, \Aspose\Barcode\DecodeType::CODABAR);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("654767879894234354364", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Codabar")]
    function test_Codabar_05_png_Codabar()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Codabar_05.png"), null, \Aspose\Barcode\DecodeType::CODABAR);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code11")]
    function test_Codabar_06_png_Code11()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Codabar_06.png"), null, \Aspose\Barcode\DecodeType::CODE_11);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code11")]
    function test_Codabar_07_png_Code11()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Codabar_07.png"), null, \Aspose\Barcode\DecodeType::CODE_11);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123-456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code11")]
    function test_Codabar_08_png_Code11()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Codabar_08.png"), null, \Aspose\Barcode\DecodeType::CODE_11);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("-123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code11")]
    function test_Codabar_09_png_Code11()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Codabar_09.png"), null, \Aspose\Barcode\DecodeType::CODE_11);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456-", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code11")]
    function test_Codabar_010_png_Code11()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Codabar_010.png"), null, \Aspose\Barcode\DecodeType::CODE_11);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456-789-45", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code128")]
    function test_Code128_01_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code128_01.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("X-Factor Live ;on; Tuesday 23th", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code128")]
    function test_Code128_02_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code128_02.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("54987SD", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code128")]
    function test_Code128_03_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code128_03.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456%", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code128")]
    function test_Code128_04_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code128_04.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("Only for U-u-U-2-3-$-5", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Standard")]
    function test_Code39Standard_01_png_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code39Standard_01.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Standard")]
    function test_Code39Standard_02_png_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code39Standard_02.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("54987SD", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Standard")]
    function test_Code39Standard_03_png_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code39Standard_03.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("465AF45%", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Standard")]
    function test_Code39Standard_04_png_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code39Standard_04.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("7687DDE3", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Extended")]
    function test_Code39Extended_01_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code39Extended_01.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Standard")]
    function test_Code39Extended_02_png_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code39Extended_02.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Extended")]
    function test_Code39Extended_03_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code39Extended_03.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345WErt3", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Extended")]
    function test_Code39Extended_04_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code39Extended_04.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("76790Dty$", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code39Extended")]
    function test_Code39Extended_05_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code39Extended_05.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("oiutrRR45\$er", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Standard")]
    function test_Code93Standard_01_png_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Standard_01.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Standard")]
    function test_Code93Standard_02_png_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Standard_02.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("54987SD", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Standard")]
    function test_Code93Standard_03_png_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Standard_03.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("465AF45%", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Standard")]
    function test_Code93Standard_04_png_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Standard_04.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("7687DDE3", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Extended")]
    function test_Code93Extended_01_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Extended_01.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Standard")]
    function test_Code93Extended_02_png_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Extended_02.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Standard")]
    function test_Code93Extended_03_png_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Extended_03.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Extended")]
    function test_Code93Extended_04_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Extended_04.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Extended")]
    function test_Code93Extended_05_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Extended_05.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345WErt3", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Extended")]
    function test_Code93Extended_06_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Extended_06.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("76790Dty^", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Extended")]
    function test_Code93Extended_07_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Code93Extended_07.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("oiutrRR45\$er", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Standard2of5")]
    function test_Standard2of5_01_png_Standard2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Standard2of5_01.png"), null, \Aspose\Barcode\DecodeType::STANDARD_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("23", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Standard2of5")]
    function test_Standard2of5_02_png_Standard2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Standard2of5_02.png"), null, \Aspose\Barcode\DecodeType::STANDARD_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("5423", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Standard2of5")]
    function test_Standard2of5_03_png_Standard2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Standard2of5_03.png"), null, \Aspose\Barcode\DecodeType::STANDARD_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Standard2of5")]
    function test_Standard2of5_04_png_Standard2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Standard2of5_04.png"), null, \Aspose\Barcode\DecodeType::STANDARD_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("215767698732", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Interleaved2of5")]
    function test_Interleaved2of5_01_png_Interleaved2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Interleaved2of5_01.png"), null, \Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("23", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Interleaved2of5")]
    function test_Interleaved2of5_02_png_Interleaved2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Interleaved2of5_02.png"), null, \Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("001117", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Interleaved2of5")]
    function test_Interleaved2of5_03_png_Interleaved2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Interleaved2of5_03.png"), null, \Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Interleaved2of5")]
    function test_Interleaved2of5_04_png_Interleaved2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Interleaved2of5_04.png"), null, \Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("0958349873298732", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Matrix2of5")]
    function test_Matrix2of5_01_png_Matrix2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Matrix2of5_01.png"), null, \Aspose\Barcode\DecodeType::MATRIX_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("23", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Matrix2of5")]
    function test_Matrix2of5_02_png_Matrix2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Matrix2of5_02.png"), null, \Aspose\Barcode\DecodeType::MATRIX_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Matrix2of5")]
    function test_Matrix2of5_03_png_Matrix2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Matrix2of5_03.png"), null, \Aspose\Barcode\DecodeType::MATRIX_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("5456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Matrix2of5")]
    function test_Matrix2of5_04_png_Matrix2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Matrix2of5_04.png"), null, \Aspose\Barcode\DecodeType::MATRIX_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("786796435234234324324454", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ItalianPost25")]
    function test_ItalianPost25_01_png_ItalianPost25()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ItalianPost25_01.png"), null, \Aspose\Barcode\DecodeType::ITALIAN_POST_25);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("23", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ItalianPost25")]
    function test_ItalianPost25_02_png_ItalianPost25()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ItalianPost25_02.png"), null, \Aspose\Barcode\DecodeType::ITALIAN_POST_25);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("05464652", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ItalianPost25")]
    function test_ItalianPost25_03_png_ItalianPost25()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ItalianPost25_03.png"), null, \Aspose\Barcode\DecodeType::ITALIAN_POST_25);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ItalianPost25")]
    function test_ItalianPost25_04_png_ItalianPost25()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ItalianPost25_04.png"), null, \Aspose\Barcode\DecodeType::ITALIAN_POST_25);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("022223", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("IATA2of5")]
    function test_IATA2of5_01_png_IATA2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "IATA2of5_01.png"), null, \Aspose\Barcode\DecodeType::IATA_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123235", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("IATA2of5")]
    function test_IATA2of5_02_png_IATA2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "IATA2of5_02.png"), null, \Aspose\Barcode\DecodeType::IATA_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("54232", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("IATA2of5")]
    function test_IATA2of5_03_png_IATA2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "IATA2of5_03.png"), null, \Aspose\Barcode\DecodeType::IATA_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1234565", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("IATA2of5")]
    function test_IATA2of5_04_png_IATA2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "IATA2of5_04.png"), null, \Aspose\Barcode\DecodeType::IATA_2_OF_5);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("2157334347887323", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ITF14")]
    function test_ITF14_01_png_ITF14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ITF14_01.png"), null, \Aspose\Barcode\DecodeType::ITF_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12300000000006", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ITF14")]
    function test_ITF14_02_png_ITF14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ITF14_02.png"), null, \Aspose\Barcode\DecodeType::ITF_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("54646520000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ITF14")]
    function test_ITF14_03_png_ITF14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ITF14_03.png"), null, \Aspose\Barcode\DecodeType::ITF_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345600000001", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ITF14")]
    function test_ITF14_04_png_ITF14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ITF14_04.png"), null, \Aspose\Barcode\DecodeType::ITF_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("21573343478872", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ITF6")]
    function test_ITF6_01_png_ITF6()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ITF6_01.png"), null, \Aspose\Barcode\DecodeType::ITF_6);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ITF6")]
    function test_ITF6_02_png_ITF6()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ITF6_02.png"), null, \Aspose\Barcode\DecodeType::ITF_6);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("546465", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ITF6")]
    function test_ITF6_03_png_ITF6()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ITF6_03.png"), null, \Aspose\Barcode\DecodeType::ITF_6);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ITF6")]
    function test_ITF6_04_png_ITF6()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ITF6_04.png"), null, \Aspose\Barcode\DecodeType::ITF_6);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("222230", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DeutschePostIdentcode")]
    function test_DeutschePostIdentcode_01_png_DeutschePostIdentcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "DeutschePostIdentcode_01.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_IDENTCODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123000000006", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DeutschePostIdentcode")]
    function test_DeutschePostIdentcode_02_png_DeutschePostIdentcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "DeutschePostIdentcode_02.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_IDENTCODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("546465200007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DeutschePostIdentcode")]
    function test_DeutschePostIdentcode_03_png_DeutschePostIdentcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "DeutschePostIdentcode_03.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_IDENTCODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DeutschePostIdentcode")]
    function test_DeutschePostIdentcode_04_png_DeutschePostIdentcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "DeutschePostIdentcode_04.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_IDENTCODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789123", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DeutschePostLeitcode")]
    function test_DeutschePostLeitcode_01_png_DeutschePostLeitcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "DeutschePostLeitcode_01.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_LEITCODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12300000000006", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DeutschePostLeitcode")]
    function test_DeutschePostLeitcode_02_png_DeutschePostLeitcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "DeutschePostLeitcode_02.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_LEITCODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("54646520000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DeutschePostLeitcode")]
    function test_DeutschePostLeitcode_03_png_DeutschePostLeitcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "DeutschePostLeitcode_03.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_LEITCODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345678900000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DeutschePostLeitcode")]
    function test_DeutschePostLeitcode_04_png_DeutschePostLeitcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "DeutschePostLeitcode_04.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_LEITCODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345678912340", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("GS1Code128")]
    function test_GS1Code128_01_png_GS1Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "GS1Code128_01.png"), null, \Aspose\Barcode\DecodeType::GS_1_CODE_128);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1234567", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("GS1Code128")]
    function test_GS1Code128_02_png_GS1Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "GS1Code128_02.png"), null, \Aspose\Barcode\DecodeType::GS_1_CODE_128);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("GS1Code128")]
    function test_GS1Code128_03_png_GS1Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "GS1Code128_03.png"), null, \Aspose\Barcode\DecodeType::GS_1_CODE_128);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345678912345678", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("GS1Code128")]
    function test_GS1Code128_04_png_GS1Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "GS1Code128_04.png"), null, \Aspose\Barcode\DecodeType::GS_1_CODE_128);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN8")]
    function test_EAN8_01_png_EAN8()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN8_01.png"), null, \Aspose\Barcode\DecodeType::EAN_8);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12300006", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN8")]
    function test_EAN8_02_png_EAN8()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN8_02.png"), null, \Aspose\Barcode\DecodeType::EAN_8);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345670", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN8")]
    function test_EAN8_03_png_EAN8()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN8_03.png"), null, \Aspose\Barcode\DecodeType::EAN_8);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("45321306", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN8")]
    function test_EAN8_04_png_EAN8()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN8_04.png"), null, \Aspose\Barcode\DecodeType::EAN_8);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("10000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN13")]
    function test_EAN13_01_png_EAN13()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN13_01.png"), null, \Aspose\Barcode\DecodeType::EAN_13);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1234567000008", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN13")]
    function test_EAN13_02_png_EAN13()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN13_02.png"), null, \Aspose\Barcode\DecodeType::EAN_13);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1234567890005", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN13")]
    function test_EAN13_03_png_EAN13()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN13_03.png"), null, \Aspose\Barcode\DecodeType::EAN_13);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1234567891231", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN13")]
    function test_EAN13_04_png_EAN13()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN13_04.png"), null, \Aspose\Barcode\DecodeType::EAN_13);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1000000000009", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN14")]
    function test_EAN14_01_png_EAN14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN14_01.png"), null, \Aspose\Barcode\DecodeType::EAN_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345670000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN14")]
    function test_EAN14_02_png_EAN14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN14_02.png"), null, \Aspose\Barcode\DecodeType::EAN_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345678900005", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN14")]
    function test_EAN14_03_png_EAN14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN14_03.png"), null, \Aspose\Barcode\DecodeType::EAN_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345678912343", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("EAN14")]
    function test_EAN14_04_png_EAN14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "EAN14_04.png"), null, \Aspose\Barcode\DecodeType::EAN_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)10000000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SCC14")]
    function test_SCC14_01_png_SCC14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "SCC14_01.png"), null, \Aspose\Barcode\DecodeType::SCC_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345670000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SCC14")]
    function test_SCC14_02_png_SCC14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "SCC14_02.png"), null, \Aspose\Barcode\DecodeType::SCC_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345678900005", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SCC14")]
    function test_SCC14_03_png_SCC14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "SCC14_03.png"), null, \Aspose\Barcode\DecodeType::SCC_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345678912343", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SCC14")]
    function test_SCC14_04_png_SCC14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "SCC14_04.png"), null, \Aspose\Barcode\DecodeType::SCC_14);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)10000000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SSCC18")]
    function test_SSCC18_01_png_SSCC18()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "SSCC18_01.png"), null, \Aspose\Barcode\DecodeType::SSCC_18);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(00)123456789000000005", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SSCC18")]
    function test_SSCC18_02_png_SSCC18()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "SSCC18_02.png"), null, \Aspose\Barcode\DecodeType::SSCC_18);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(00)123450000000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SSCC18")]
    function test_SSCC18_03_png_SSCC18()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "SSCC18_03.png"), null, \Aspose\Barcode\DecodeType::SSCC_18);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(00)123456789123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SSCC18")]
    function test_SSCC18_04_png_SSCC18()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "SSCC18_04.png"), null, \Aspose\Barcode\DecodeType::SSCC_18);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(00)100000000000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("UPCA")]
    function test_UPCA_01_png_UPCA()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "UPCA_01.png"), null, \Aspose\Barcode\DecodeType::UPCA);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789005", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("UPCA")]
    function test_UPCA_02_png_UPCA()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "UPCA_02.png"), null, \Aspose\Barcode\DecodeType::UPCA);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123450000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("UPCA")]
    function test_UPCA_03_png_UPCA()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "UPCA_03.png"), null, \Aspose\Barcode\DecodeType::UPCA);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123456789128", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("UPCA")]
    function test_UPCA_04_png_UPCA()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "UPCA_04.png"), null, \Aspose\Barcode\DecodeType::UPCA);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("100000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("UPCE")]
    function test_UPCE_01_png_UPCE()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "UPCE_01.png"), null, \Aspose\Barcode\DecodeType::UPCE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("01234565", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("UPCE")]
    function test_UPCE_02_png_UPCE()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "UPCE_02.png"), null, \Aspose\Barcode\DecodeType::UPCE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("01234505", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("UPCE")]
    function test_UPCE_03_png_UPCE()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "UPCE_03.png"), null, \Aspose\Barcode\DecodeType::UPCE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("01234565", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("UPCE")]
    function test_UPCE_04_png_UPCE()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "UPCE_04.png"), null, \Aspose\Barcode\DecodeType::UPCE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("01000009", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ISBN")]
    function test_ISBN_01_png_ISBN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ISBN_01.png"), null, \Aspose\Barcode\DecodeType::ISBN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("9782121212340", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ISBN")]
    function test_ISBN_02_png_ISBN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ISBN_02.png"), null, \Aspose\Barcode\DecodeType::ISBN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("9781234500009", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ISBN")]
    function test_ISBN_03_png_ISBN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ISBN_03.png"), null, \Aspose\Barcode\DecodeType::ISBN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("9781234567897", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("ISBN")]
    function test_ISBN_04_png_ISBN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ISBN_04.png"), null, \Aspose\Barcode\DecodeType::ISBN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("9781000000009", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MSI")]
    function test_MSI_01_png_MSI()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "MSI_01.png"), null, \Aspose\Barcode\DecodeType::MSI);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("21212123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MSI")]
    function test_MSI_02_png_MSI()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "MSI_02.png"), null, \Aspose\Barcode\DecodeType::MSI);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MSI")]
    function test_MSI_03_png_MSI()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "MSI_03.png"), null, \Aspose\Barcode\DecodeType::MSI);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345678912345678", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("PZN")]
    function test_PZN_01_png_PZN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "PZN_01.png"), null, \Aspose\Barcode\DecodeType::PZN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("-2124522", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("PZN")]
    function test_PZN_02_png_PZN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "PZN_02.png"), null, \Aspose\Barcode\DecodeType::PZN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("-1234504", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("PZN")]
    function test_PZN_03_png_PZN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "PZN_03.png"), null, \Aspose\Barcode\DecodeType::PZN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("-1234562", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("PZN")]
    function test_PZN_04_png_PZN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "PZN_04.png"), null, \Aspose\Barcode\DecodeType::PZN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("-1000002", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("VIN")]
    function test_VIN_01_png_VIN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "VIN_01.png"), null, \Aspose\Barcode\DecodeType::VIN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("21245212145600000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("VIN")]
    function test_VIN_02_png_VIN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "VIN_02.png"), null, \Aspose\Barcode\DecodeType::VIN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345000300000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("VIN")]
    function test_VIN_03_png_VIN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "VIN_03.png"), null, \Aspose\Barcode\DecodeType::VIN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345678712345678", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("VIN")]
    function test_VIN_04_png_VIN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "VIN_04.png"), null, \Aspose\Barcode\DecodeType::VIN);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("10000000800000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Postnet")]
    function test_Postnet2_01_png_Postnet()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Postnet2_01.png"), null, \Aspose\Barcode\DecodeType::POSTNET);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("56789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("5", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Planet")]
    function test_Planet_01_png_Planet()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "Planet_01.png"), null, \Aspose\Barcode\DecodeType::PLANET);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("5", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("RM4SCC")]
    function test_RM4SCC_01_png_RM4SCC()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "RM4SCC_01.png"), null, \Aspose\Barcode\DecodeType::RM_4_SCC);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1234567890", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("6", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("AustraliaPost")]
    function test_AustraliaPost_01_png_AustraliaPost()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "AustraliaPost_01.png"), null, \Aspose\Barcode\DecodeType::AUSTRALIA_POST);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1112345678", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals(" 26 44 19 15", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("OneCode")]
    function test_OneCode_01_png_OneCode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "OneCode_01.png"), null, \Aspose\Barcode\DecodeType::ONE_CODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("44999000000123456789941078350", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("1481", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Code93Extended")]
    function test_ChecksumException_01_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumException_01.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("505 My Road Drive", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("AllSupportedTypes")]
    function test_ChecksumException_02_png_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumException_02.png"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("505 My Road Drive", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Extended_Code93Standard")]
    function test_ChecksumException_03_png_Code93Extended_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumException_03.png"), null, [\Aspose\Barcode\DecodeType::CODE_93, \Aspose\Barcode\DecodeType::CODE_93]);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("505 My Road Drive", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Standard")]
    function test_ChecksumException_04_png_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumException_04.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("505 ALL", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Extended")]
    function test_ChecksumException_05_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumException_05.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("505 ALL", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code93Extended_Code93Standard")]
    function test_ChecksumException_06_png_Code93Extended_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumException_06.png"), null, [\Aspose\Barcode\DecodeType::CODE_93, \Aspose\Barcode\DecodeType::CODE_93]);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("505 ALL", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("AllSupportedTypes")]
    function test_ChecksumException_07_png_AllSupportedTypes()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumException_07.png"), null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("505 ALL", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Codabar")]
    function test_ChecksumPresence_Codabar_0_png_Codabar()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Codabar_0.png"), null, \Aspose\Barcode\DecodeType::CODABAR);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("Code11")]
    function test_ChecksumPresence_Code11_1_png_Code11()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Code11_1.png"), null, \Aspose\Barcode\DecodeType::CODE_11);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("2", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Code39Standard")]
    function test_ChecksumPresence_Code39Standard_2_png_Code39Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Code39Standard_2.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345F", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("F", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Code39Extended")]
    function test_ChecksumPresence_Code39Extended_3_png_Code39Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Code39Extended_3.png"), null, \Aspose\Barcode\DecodeType::CODE_39);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345F", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("F", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Code93Standard")]
    function test_ChecksumPresence_Code93Standard_4_png_Code93Standard()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Code93Standard_4.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("Z ", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Code93Extended")]
    function test_ChecksumPresence_Code93Extended_5_png_Code93Extended()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Code93Extended_5.png"), null, \Aspose\Barcode\DecodeType::CODE_93);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("Z ", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Code128")]
    function test_ChecksumPresence_Code128_6_png_Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Code128_6.png"), null, \Aspose\Barcode\DecodeType::CODE_128);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("6", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("GS1Code128")]
    function test_ChecksumPresence_GS1Code128_7_png_GS1Code128()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_GS1Code128_7.png"), null, \Aspose\Barcode\DecodeType::GS_1_CODE_128);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("6", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("EAN8")]
    function test_ChecksumPresence_EAN8_8_png_EAN8()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_EAN8_8.png"), null, \Aspose\Barcode\DecodeType::EAN_8);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("EAN13")]
    function test_ChecksumPresence_EAN13_9_png_EAN13()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_EAN13_9.png"), null, \Aspose\Barcode\DecodeType::EAN_13);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("1234500000003", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("3", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("EAN14")]
    function test_ChecksumPresence_EAN14_10_png_EAN14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_EAN14_10.png"), null, \Aspose\Barcode\DecodeType::EAN_14);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("L", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("SCC14")]
    function test_ChecksumPresence_SCC14_11_png_SCC14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_SCC14_11.png"), null, \Aspose\Barcode\DecodeType::SCC_14);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("L", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("SSCC18")]
    function test_ChecksumPresence_SSCC18_12_png_SSCC18()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_SSCC18_12.png"), null, \Aspose\Barcode\DecodeType::SSCC_18);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(00)123450000000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("UPCA")]
    function test_ChecksumPresence_UPCA_13_png_UPCA()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_UPCA_13.png"), null, \Aspose\Barcode\DecodeType::UPCA);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123450000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("UPCE")]
    function test_ChecksumPresence_UPCE_14_png_UPCE()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_UPCE_14.png"), null, \Aspose\Barcode\DecodeType::UPCE);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("01234505", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("5", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("ISBN")]
    function test_ChecksumPresence_ISBN_15_png_ISBN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_ISBN_15.png"), null, \Aspose\Barcode\DecodeType::ISBN);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("9781234500009", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("9", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Standard2of5")]
    function test_ChecksumPresence_Standard2of5_16_png_Standard2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Standard2of5_16.png"), null, \Aspose\Barcode\DecodeType::STANDARD_2_OF_5);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123457", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Interleaved2of5")]
    function test_ChecksumPresence_Interleaved2of5_17_png_Interleaved2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Interleaved2of5_17.png"), null, \Aspose\Barcode\DecodeType::INTERLEAVED_2_OF_5);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123457", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Matrix2of5")]
    function test_ChecksumPresence_Matrix2of5_18_png_Matrix2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Matrix2of5_18.png"), null, \Aspose\Barcode\DecodeType::MATRIX_2_OF_5);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123457", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("ItalianPost25")]
    function test_ChecksumPresence_ItalianPost25_19_png_ItalianPost25()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_ItalianPost25_19.png"), null, \Aspose\Barcode\DecodeType::ITALIAN_POST_25);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123457", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("IATA2of5")]
    function test_ChecksumPresence_IATA2of5_20_png_IATA2of5()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_IATA2of5_20.png"), null, \Aspose\Barcode\DecodeType::IATA_2_OF_5);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123457", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("ITF14")]
    function test_ChecksumPresence_ITF14_21_png_ITF14()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_ITF14_21.png"), null, \Aspose\Barcode\DecodeType::ITF_14);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("MSI")]
    function test_ChecksumPresence_MSI_22_png_MSI()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_MSI_22.png"), null, \Aspose\Barcode\DecodeType::MSI);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123455", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("5", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("VIN")]
    function test_ChecksumPresence_VIN_23_png_VIN()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_VIN_23.png"), null, \Aspose\Barcode\DecodeType::VIN);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345000300000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("3", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("DeutschePostIdentcode")]
    function test_ChecksumPresence_DeutschePostIdentcode_24_png_DeutschePostIdentcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_DeutschePostIdentcode_24.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_IDENTCODE);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("123450000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("0", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("DeutschePostLeitcode")]
    function test_ChecksumPresence_DeutschePostLeitcode_25_png_DeutschePostLeitcode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_DeutschePostLeitcode_25.png"), null, \Aspose\Barcode\DecodeType::DEUTSCHE_POST_LEITCODE);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345000000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("0", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("Pharmacode")]
    function test_ChecksumPresence_Pharmacode_26_png_Pharmacode()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_Pharmacode_26.png"), null, \Aspose\Barcode\DecodeType::PHARMACODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("DatabarOmniDirectional")]
    function test_ChecksumPresence_DatabarOmniDirectional_27_png_DatabarOmniDirectional()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_DatabarOmniDirectional_27.png"), null, \Aspose\Barcode\DecodeType::DATABAR_OMNI_DIRECTIONAL);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("DatabarTruncated")]
    function test_ChecksumPresence_DatabarTruncated_28_png_DatabarTruncated()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_DatabarTruncated_28.png"), null, \Aspose\Barcode\DecodeType::DATABAR_TRUNCATED);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("DatabarLimited")]
    function test_ChecksumPresence_DatabarLimited_29_png_DatabarLimited()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_DatabarLimited_29.png"), null, \Aspose\Barcode\DecodeType::DATABAR_LIMITED);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(01)12345000000007", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("7", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }


    //[Category("DatabarExpanded")]
    function test_ChecksumPresence_DatabarExpanded_30_png_DatabarExpanded()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_DatabarExpanded_30.png"), null, \Aspose\Barcode\DecodeType::DATABAR_EXPANDED);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("(98765)<FNC1>12345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("SwissPostParcel")]
    function test_ChecksumPresence_SwissPostParcel_31_png_SwissPostParcel()
    {
        $reader = new BarcodeReader(pathCombine($this->_folder, "ChecksumPresence_SwissPostParcel_31.png"), null, \Aspose\Barcode\DecodeType::SWISS_POST_PARCEL);
        {
            $reader->setChecksumValidation(ChecksumValidation::ON);
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals("981234500000000000", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("", $reader->getFoundBarCodes()[0]->getExtended()->getOneD()->getCheckSum());
        }
    }

}

TestsLauncher::launch('\building\RecognitionChecksumSingleImagesTests', null);
