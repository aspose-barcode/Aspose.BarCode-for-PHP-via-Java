<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsAssist;
use assist\TestsLauncher;

class ComplexBarcodeTests
{
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_ComplexBarcode_Empty()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $swissQRCodetext = new SwissQRCodetext(null);

        $cg = new ComplexBarcodeGenerator($swissQRCodetext);
        $res = $cg->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);

        $cr = new \Aspose\Barcode\BarCodeReader($res, null, \Aspose\Barcode\DecodeType::QR);
        $cr->readBarCodes();
        $test = ComplexCodetextReader::tryDecodeSwissQR($cr->readBarCodes()[0]->getCodeText("UTF-8"));

        $this->printBill($swissQRCodetext->getBill());
        print("\n");
        $this->printBill($test->getBill());
        print("\n");
        Assert::assertEquals($swissQRCodetext->getBill(), $test->getBill());
    }

    public function test_ComplexBarcode_PartlyInitialized()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $swissQRCodetext = new SwissQRCodetext(null);
        $swissQRCodetext->getBill()->setAccount("Account");
        $swissQRCodetext->getBill()->setBillInformation("BillInformation");

        $cg = new ComplexBarcodeGenerator($swissQRCodetext);
        $res = $cg->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);

        $cr = new \Aspose\Barcode\BarCodeReader($res, null, \Aspose\Barcode\DecodeType::QR);
        $cr->readBarCodes();
        $test = ComplexCodetextReader::tryDecodeSwissQR($cr->readBarCodes()[0]->getCodeText("UTF-8"));

        $this->printBill($swissQRCodetext->getBill());
        print("\n");
        $this->printBill($test->getBill());
        print("\n");
        Assert::assertEquals($swissQRCodetext->getBill(), $test->getBill());
    }

    private function printBill(SwissQRBill $bill)
    {
        print("Bill:".
             " Amount:".$bill->getAmount().
            "; Currency:".$bill->getCurrency().
            "; Version:".$bill->getVersion());
        print("\n");
    }

    public function test_ComplexBarcode_FullyInitialized()
    {
        // print("\n---\nfunction '".__FUNCTION__."'\n");
        $swissQRCodetext = new SwissQRCodetext(null);
        $swissQRCodetext->getBill()->setAccount("Account");
        $swissQRCodetext->getBill()->setBillInformation("BillInformation");
        $swissQRCodetext->getBill()->setAmount(1024);
        $swissQRCodetext->getBill()->getCreditor()->setName("Creditor.Name");
        $swissQRCodetext->getBill()->getCreditor()->setAddressLine1("Creditor.AddressLine1");
        $swissQRCodetext->getBill()->getCreditor()->setAddressLine2("Creditor.AddressLine2");
        $swissQRCodetext->getBill()->getCreditor()->setCountryCode("Nl");
        $swissQRCodetext->getBill()->setUnstructuredMessage("UnstructuredMessage");
        $swissQRCodetext->getBill()->setReference("Reference");
        $swissQRCodetext->getBill()->addalternativeScheme(new AlternativeScheme("AlternativeSchemeInstruction1"));
        $swissQRCodetext->getBill()->addalternativeScheme(new AlternativeScheme("AlternativeSchemeInstruction2"));
        $swissQRCodetext->getBill()->setDebtor(new Address(null));
        $swissQRCodetext->getBill()->getDebtor()->setName("Debtor.Name");
        $swissQRCodetext->getBill()->getDebtor()->setAddressLine1("Debtor.AddressLine1");
        $swissQRCodetext->getBill()->getDebtor()->setAddressLine2("Debtor.AddressLine2");
        $swissQRCodetext->getBill()->getDebtor()->setCountryCode("Lux");

        $cg = new ComplexBarcodeGenerator($swissQRCodetext);
        $res = $cg->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);

        $cr = new \Aspose\Barcode\BarCodeReader($res, null, \Aspose\Barcode\DecodeType::QR);
        print("\n");
        print('sizeof($cr->readBarCodes()) > 0 : '.sizeof($cr->readBarCodes()) > 0);
        $test = ComplexCodetextReader::tryDecodeSwissQR($cr->readBarCodes()[0]->getCodeText("UTF-8"));


        $this->printBill($swissQRCodetext->getBill());
        print("\n");
        $this->printBill($test->getBill());
        print("\n");
        Assert::assertEquals($swissQRCodetext->getBill(), $test->getBill());
    }


}

$complexBarcodeTests = new ComplexBarcodeTests();
$complexBarcodeTests->test_ComplexBarcode_Empty();
$complexBarcodeTests->test_ComplexBarcode_PartlyInitialized();
$complexBarcodeTests->test_ComplexBarcode_FullyInitialized();
