<?php

namespace Aspose\Barcode\Generation;

/**
 * Encoding mode for MaxiCode barcodes.
 *
 * This sample shows how to genereate MaxiCode barcodes using ComplexBarcodeGenerator
 * @code
 * //Mode 2 with standart second message
 * $maxiCodeCodetext = new MaxiCodeCodetextMode2();
 * $maxiCodeCodetext->setPostalCode("524032140");
 * $maxiCodeCodetext->setCountryCode(056);
 * $maxiCodeCodetext->setServiceCategory(999);
 * maxiCodeStandardSecondMessage = new MaxiCodeStandardSecondMessage();
 * $maxiCodeStandardSecondMessage->setMessage("Test message");
 * $maxiCodeCodetext->setSecondMessage($maxiCodeStandardSecondMessage);
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext);
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 2 with structured second message
 * $maxiCodeCodetext = new MaxiCodeCodetextMode2();
 * $maxiCodeCodetext->setPostalCode("524032140");
 * $maxiCodeCodetext->setCountryCode(056);
 * $maxiCodeCodetext->setServiceCategory(999);
 * maxiCodeStructuredSecondMessage = new MaxiCodeStructuredSecondMessage();
 * $maxiCodeStructuredSecondMessage->add("634 ALPHA DRIVE");
 * $maxiCodeStructuredSecondMessage->add("PITTSBURGH");
 * $maxiCodeStructuredSecondMessage->add("PA");
 * $maxiCodeStructuredSecondMessage->setYear(99);
 * $maxiCodeCodetext->setSecondMessage($maxiCodeStructuredSecondMessage);
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext);
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 3 with standart second message
 * $maxiCodeCodetext = new MaxiCodeCodetextMode3();
 * $maxiCodeCodetext->setPostalCode("B1050");
 * $maxiCodeCodetext->setCountryCode(056);
 * $maxiCodeCodetext->setServiceCategory(999);
 * $maxiCodeStandardSecondMessage = new MaxiCodeStandardSecondMessage();
 * $maxiCodeStandardSecondMessage->setMessage("Test message");
 * $maxiCodeCodetext->setSecondMessage($maxiCodeStandardSecondMessage);
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext);
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 3 with structured second message
 * $maxiCodeCodetext = new MaxiCodeCodetextMode3();
 * $maxiCodeCodetext->setPostalCode("B1050");
 * $maxiCodeCodetext->setCountryCode(056);
 * $maxiCodeCodetext->setServiceCategory(999);
 * $maxiCodeStructuredSecondMessage = new MaxiCodeStructuredSecondMessage();
 * $maxiCodeStructuredSecondMessage->add("634 ALPHA DRIVE");
 * $maxiCodeStructuredSecondMessage->add("PITTSBURGH");
 * $maxiCodeStructuredSecondMessage->add("PA");
 * $maxiCodeStructuredSecondMessage->setYear(99);
 * $maxiCodeCodetext->setSecondMessage($maxiCodeStructuredSecondMessage);
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext();
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 4
 * $maxiCodeCodetext = new MaxiCodeStandardCodetext();
 * $maxiCodeCodetext->setMode(MaxiCodeMode::MODE_4);
 * $maxiCodeCodetext->setMessage("Test message");
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext();
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 5
 * $maxiCodeCodetext = new MaxiCodeStandardCodetext();
 * $maxiCodeCodetext->setMode(MaxiCodeMode::MODE_5);
 * $maxiCodeCodetext->setMessage("Test message");
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext())
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 6
 * $maxiCodeCodetext = new MaxiCodeStandardCodetext();
 * $maxiCodeCodetext->setMode(MaxiCodeMode::MODE_6);
 * $maxiCodeCodetext->setMessage("Test message");
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext();
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 * @endcode
 */
class MaxiCodeMode
{
    /**
     * Mode 2 encodes postal information in the first message and data in the second message.
     * Has a 9-digit postal code and is used only in the USA.
     */
    const MODE_2 = 2;

    /**
     * Mode 3 encodes postal information in the first message and data in the second message.
     * Has a 6-character alphanumeric postal code and is used worldwide.
     */
    const MODE_3 = 3;

    /**
     *  Mode 4 encodes data in the first and second messages with short ECC correction.
     */
    const MODE_4 = 4;

    /**
     * Mode 5 encodes data in the first and second messages with long ECC correction.
     */
    const MODE_5 = 5;

    /**
     * Mode 6 encodes data in the first and second messages with short ECC correction.
     * Used to encode devices.
     */
    const MODE_6 = 6;
}