<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;



class RecognitionMicroPDF417SingleImagesTests
{

private $_folder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/MicroPDF417/";

     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }


//[Category("MicroPdf417")]
function test_text_1_png_MicroPdf417() {
$reader = new BarcodeReader(pathCombine($this->_folder, "text_1.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("DBARCODE 2D", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_text_2_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "text_2.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("MicroPDF417", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_text_3_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "text_3.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 2);
            Assert::assertEquals("MicroPDF417", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("MicroPDF417", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_text_4_gif_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "text_4.gif"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("DBARCODE 2D", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_text_5_gif_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "text_5.gif"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("NpAlP5t5Y5bdppkcfY6FPPjaRahhKi9MEi9Z1agSyzdBvosmeBgrNti8GjTyXLv06OYGpKlF2oQZvhpms5DJCS9V9BSRGr4nEnFgQl6", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_text_6_gif_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "text_6.gif"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("INVOICE #010264783", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_text_7_gif_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "text_7.gif"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("Questions are expected to range from a security vacuum in Northern Africa to new cables suggesting that Ambassador Christopher Stevens, who was killed in the September 11 assault.", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_text_8_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "text_8.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("Other questions could involve the State Department response to the terrorist bombing of the U.S.", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_text_9_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "text_9.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("Other 12.", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_text_10_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "text_10.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("Other 12345.", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_1_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_1.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("0123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_2_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_2.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("70123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_3_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_3.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("0123456789012345678901234567890123456789123", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_4_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_4.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("01234567890123456789012345678901234567891234", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_5_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_5.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("012345678901234567890123456789012345678912345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_6_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_6.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("012345678901234567890123456789012345678901234567890123456789012345678901234567891234567", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_7_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_7.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("0123456789012345678901234567890123456789012345678901234567890123456789012345678912345678", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_8_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_8.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("01234567890123456789012345678901234567890123456789012345678901234567890123456789123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_9_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_9.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_10_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_10.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_binary_1_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "binary_1.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123A", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_binary_2_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "binary_2.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123AZ", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_binary_3_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "binary_3.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123AZt", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_binary_4_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "binary_4.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123AZt R", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_binary_5_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "binary_5.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123AZt R58", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_binary_6_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "binary_6.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123AZt R58?", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_binary_7_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "binary_7.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("123AZt R58? Yz", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_binary_8_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "binary_8.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("Subscriptions purchased from this website last 12 months. Prices do not include applicable taxes.", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_binary_9_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "binary_9.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("Windows Embedded is a family of operating systems that offers familiar tools and technologies for developers and IT Professionals.", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_binary_10_jpg_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "binary_10.jpg"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("NpAlP5t5Y5bdppkcfY6FPPjaRahhKi9MEi9Z1agSyzdBvosmeBgrNti8GjTyXLv06OYGpKlF2oQZvhpms5DJCS9V9BSRGr4nEnFgQl6", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_ecc1_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_ecc1.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("0123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_ecc2_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_ecc2.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("70123456", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_ecc3_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_ecc3.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("0123456789012345678901234567890123456789123", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_ecc4_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_ecc4.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("01234567890123456789012345678901234567891234", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_ecc5_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_ecc5.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("012345678901234567890123456789012345678912345", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_ecc6_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_ecc6.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("012345678901234567890123456789012345678901234567890123456789012345678901234567891234567", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_ecc7_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_ecc7.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("0123456789012345678901234567890123456789012345678901234567890123456789012345678912345678", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_ecc8_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_ecc8.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("01234567890123456789012345678901234567890123456789012345678901234567890123456789123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_ecc9_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_ecc9.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }


    //[Category("MicroPdf417")]
    function test_numeric_ecc10_png_MicroPdf417() {
    $reader = new BarcodeReader(pathCombine($this->_folder, "numeric_ecc10.png"), null, \Aspose\Barcode\DecodeType::MICRO_PDF_417);
        {
            Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
            Assert::assertEquals("01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        }
    }
}

TestsLauncher::launch('\building\RecognitionMicroPDF417SingleImagesTests', null);
