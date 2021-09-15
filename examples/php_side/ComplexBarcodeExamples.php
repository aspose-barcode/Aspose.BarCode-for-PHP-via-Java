<?php
include_once("ExamplesAssist.php");

class ComplexBarcodeExamples
{
    public function mailmark2DFullyInitializedType29()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        $mailmark2DCodetext = new Mailmark2DCodetext();
        $mailmark2DCodetext->setUPUCountryID("JGB ");
        $mailmark2DCodetext->setInformationTypeID("0");
        $mailmark2DCodetext->setVersionID("1");
        $mailmark2DCodetext->setclass("1");
        $mailmark2DCodetext->setSupplyChainID(123);
        $mailmark2DCodetext->setItemID(1234);
        $mailmark2DCodetext->setDestinationPostCodeAndDPS("QWE1");
        $mailmark2DCodetext->setRTSFlag("0");
        $mailmark2DCodetext->setReturnToSenderPostCode("QWE2");

        $mailmark2DCodetext->setDataMatrixType(Mailmark2DType::TYPE_29);
        $mailmark2DCodetext->setCustomerContent("CUSTOM_DATA");
        $cg = new ComplexBarcodeGenerator($mailmark2DCodetext);
        {
            $res = $cg->generateBarCodeImage(BarCodeImageFormat::PNG);
            $cr = new BarCodeReader($res, null, DecodeType::DATA_MATRIX);
            print(count($cr->readBarCodes())."\n");
            $codeText = $cr->getFoundBarCodes()[0]->getCodeText();
            print("CodeText: ".$codeText);
            $decoded = ComplexCodetextReader::tryDecodeMailmark2D($codeText);
            print("InformationTypeID: ".$decoded->getInformationTypeID()."\n");
            print("DestinationPostCodeAndDPS: ".$decoded->getDestinationPostCodeAndDPS()."\n");
            print("CustomerContent: ".$decoded->getCustomerContent()."\n");
            print("DataMatrixType: ".$decoded->getDataMatrixType()."\n");
            print("BarcodeType: ".$decoded->getBarcodeType()."\n");
        }
    }
}

set_license();
$complexBarcodeExamples = new ComplexBarcodeExamples();
$complexBarcodeExamples->mailmark2DFullyInitializedType29();