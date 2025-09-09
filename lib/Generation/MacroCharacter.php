<?php

namespace Aspose\Barcode\Generation;

/**
 * Macro Characters 05 and 06 values are used to obtain more compact encoding in special modes.
 * 05 Macro craracter is translated to "[)>\u001E05\u001D" as decoded data header and "\u001E\u0004" as decoded data trailer.
 * 06 Macro craracter is translated to "[)>\u001E06\u001D" as decoded data header and "\u001E\u0004" as decoded data trailer.
 * <pre>
 * These samples show how to encode Macro Characters in MicroPdf417 and DataMatrix
 * <pre>
 *
 * @code
 * # to generate autoidentified GS1 message like this "(10)123ABC(10)123ABC" in ISO 15434 format you need:
 * $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, "10123ABC\u001D10123ABC");
 * $generator->getParameters()->getBarcode()->getDataMatrix()->setMacroCharacters(MacroCharacter::MACRO_05);
 * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS1DataMatrix);
 * foreach($reader->readBarCodes() as $result)
 *     echo "BarCode CodeText: " . $result->getCodeText();
 * @endcode
 * @code
 * # Encodes MicroPdf417 with 05 Macro the string: "[)>\u001E05\u001Dabcde1234\u001E\u0004"
 * $generator = new BarcodeGenerator(EncodeTypes::MicroPdf417, "abcde1234");
 * $generator->getParameters()->getBarcode()->getPdf417()->setMacroCharacters(MacroCharacter::MACRO_05);
 * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
 * foreach($reader->readBarCodes() as $result)
 *    echo $result->getCodeText();
 * @endcode
 * @code
 * # Encodes MicroPdf417 with 06 Macro the string: "[)>\u001E06\u001Dabcde1234\u001E\u0004"
 * $generator = new BarcodeGenerator(EncodeTypes::MicroPdf417, "abcde1234");
 * $generator->getParameters()->getBarcode()->getPdf417()->setMacroCharacters(MacroCharacter::MACRO_06);
 * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
 * foreach($reader->readBarCodes() as $result)
 *    echo $result->getCodeText();
 * @endcode
 * </pre>
 * </pre>
 */
final class MacroCharacter
{
    /**
     * None of Macro Characters are added to barcode data
     */
    const NONE = 0;

    /**
     * 05 Macro craracter is added to barcode data in first position.
     * GS1 Data Identifier ISO 15434
     * Character is translated to "[)>\u001E05\u001D" as decoded data header and "\u001E\u0004" as decoded data trailer.
     *
     * @code
     * //to generate autoidentified GS1 message like this "(10)123ABC(10)123ABC" in ISO 15434 format you need:
     * $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, "10123ABC\u001D10123ABC");
     * $generator->getParameters()->getBarcode()->getDataMatrix()->setMacroCharacters(MacroCharacter::MACRO_05);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_DATA_MATRIX);
     * foreach($reader->readBarCodes() as $result)
     *     print("BarCode CodeText: ".$result->getCodeText());
     * @endcode
     */
    const MACRO_05 = 5;

    /**
     * 06 Macro craracter is added to barcode data in first position.
     * ASC MH10 Data Identifier ISO 15434
     * Character is translated to "[)>\u001E06\u001D" as decoded data header and "\u001E\u0004" as decoded data trailer.
     */
    const MACRO_06 = 6;
}