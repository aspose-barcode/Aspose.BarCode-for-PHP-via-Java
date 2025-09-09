<?php

namespace Aspose\Barcode\Recognition;

/**
 * Defines the interpreting type(C_TABLE or N_TABLE) of customer information for AustralianPost BarCode.
 */
class  CustomerInformationInterpretingType
{

    /**
     * Use C_TABLE to interpret the customer information. Allows A..Z, a..z, 1..9, space and # sing.
     *
     * @code
     * $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, "5912345678ABCde");
     * $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::C_TABLE);
     * $image = $generator->generateBarcodeImage(BarcodeImageFormat::PNG);
     * $reader = new BarCodeReader($image, DecodeType::AUSTRALIA_POST);
     * $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::C_TABLE);
     * foreach($reader->readBarCodes() as $result)
     * {
     *     print("BarCode Type: ".$result->getCodeType());
     *     print("BarCode CodeText: ".$result->getCodeText());
     * }
     * @endcode
     */
    const C_TABLE = 0;

    /**
     * Use N_TABLE to interpret the customer information. Allows digits.
     *
     * @code
     *  $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, "59123456781234567");
     *  $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::N_TABLE);
     *  $image = $generator->generateBarcodeImage(BarcodeImageFormat::PNG);
     *  $reader = new BarCodeReader($image, DecodeType::AUSTRALIA_POST);
     *  $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::N_TABLE);
     *  foreach($reader->readBarCodes() as $result)
     *  {
     *     print("BarCode Type: ".$result->getCodeType());
     *     print("BarCode CodeText: ".$result->getCodeText());
     *  }
     * @endcode
     */
    const N_TABLE = 1;

    /**
     * Do not interpret the customer information. Allows 0, 1, 2 or 3 symbol only.
     *
     * @code
     * $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, "59123456780123012301230123");
     * $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::OTHER);
     * $image = $generator->generateBarcodeImage(BarcodeImageFormat::PNG);
     * $reader = new BarCodeReader($image, DecodeType::AUSTRALIA_POST);
     * $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::OTHER));
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode Type: ".$result->getCodeType());
     *    print("BarCode CodeText: ".$result->getCodeText());
     * }
     * @endcode
     */
    const OTHER = 2;
}