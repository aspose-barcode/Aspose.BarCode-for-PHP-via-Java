<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;


class BarcodeReaderTests2
{
    private $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128/";

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testReadBarCodes1()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $file_name = "mzl.jpg";
        $full_path = $this->subfolder.$file_name;
        $expected_code_text = "99700161000002701082204000";
        $reader = new \Aspose\Barcode\BarCodeReader($full_path, null, null);
        $result = $reader->readBarCodes();
        foreach ($result as $res)
        {
            Assert::assertEquals($expected_code_text, $res->getCodeText("UTF-8"));
        }
    }
    public function testReadBarCodes2()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $file_name = "mzl.jpg";
        $full_path = $this->subfolder.$file_name;
        $expected_code_text = "99700161000002701082204000";
        $reader = new \Aspose\Barcode\BarCodeReader($full_path, null, null);
        $reader->readBarCodes();
        for ($x = 0; $reader->getFoundCount() > $x; $x++)
        {
            $actual_code_text = $reader->getFoundBarCodes()[$x]->getCodeText("UTF-8");
            Assert::assertEquals($expected_code_text, $actual_code_text);
        }
    }

    public function testDetectEncodingEnabled()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");

        $gen = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::QR, null);
        $gen->setCodeText("Слово");
        $gen->getParameters()->getBarcode()->getQR()->setCodeTextEncoding("UTF-8");
        $image = $gen->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);

        $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::QR);
        $reader->setDetectEncoding(true);
        foreach ($reader->readBarCodes() as $res)
        {
            Assert::assertEquals("Слово", $res->getCodeText("UTF-8"));
            Assert::assertEquals("QR", $res->getCodeTypeName());
        }
    }

    public function testCustomerInformationInterpretingType1()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");

        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AUSTRALIA_POST, null);
        $expected_code_text = "59123456781234567";
        $expected_code_type = "AustraliaPost";
        $generator->setCodeText($expected_code_text);
        $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::N_TABLE);
        $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::AUSTRALIA_POST);
        $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::N_TABLE);
        foreach ($reader->readBarCodes() as $res)
        {
            Assert::assertEquals($expected_code_text, $res->getCodeText(false));
            Assert::assertEquals($expected_code_type, $res->getCodeTypeName());
        }
    }

    public function testCustomerInformationInterpretingType2()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");

        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AUSTRALIA_POST, null);
        $generator->setCodeText("6212345678ABCdef123#");
        $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::C_TABLE);
        $image = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        $reader = new \Aspose\Barcode\BarCodeReader($image, null, \Aspose\Barcode\DecodeType::AUSTRALIA_POST);
        $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::C_TABLE);
        foreach ($reader->readBarCodes() as $res)
        {
            Assert::assertEquals( "6212345678ABCdef123#", $res->getCodeText(false));
            Assert::assertEquals("AustraliaPost", $res->getCodeTypeName());
        }
    }
}
TestsLauncher::launch('\building\BarcodeReaderTests2', null);

//$barcodeReaderTests = new BarcodeReaderTests2();
//$barcodeReaderTests->testDetectEncodingEnabled();
//$barcodeReaderTests->testCustomerInformationInterpretingType1();
//$barcodeReaderTests->testCustomerInformationInterpretingType2();
//$barcodeReaderTests->testReadBarCodes1();
//$barcodeReaderTests->testReadBarCodes2();