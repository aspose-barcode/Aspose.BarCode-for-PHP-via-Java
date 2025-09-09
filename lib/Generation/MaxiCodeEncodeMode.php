<?php

namespace Aspose\Barcode\Generation;

/**
 * Encoding mode for MaxiCode barcodes.
 *
 * @code
 * //Auto mode
 * $codetext = "犬Right狗";
 * $generator = new BarcodeGenerator(EncodeTypes::MAXI_CODE, $codetext))
 * $generator->getParameters()->getBarcode()->getMaxiCode()->setECIEncoding(ECIEncodings::UTF8);
 * $generator->save("test.bmp");
 *
 * //Bytes mode
 * $encodedArr = array( 0xFF, 0xFE, 0xFD, 0xFC, 0xFB, 0xFA, 0xF9 );
 * //encode array to string
 * $strBld = "";
 * foreach($encodedArr as $bval)
 * {
 * $strBld .= $bval;
 * }
 * $codetext = $strBld;
 * $generator = new BarcodeGenerator(EncodeTypes::MAXI_CODE, $codetext);
 * $generator->getParameters()->getBarcode()->getMaxiCode()->setMaxiCodeEncodeMode(MaxiCodeEncodeMode.BYTES);
 * $generator->save(ApiTests::folder."test2.bmp", BarCodeImageFormat::BMP);
 * @endcode
 */
class MaxiCodeEncodeMode
{
    /**
     * <p>
     * In Auto mode, the CodeText is encoded with maximum data compactness.
     * Unicode characters are re-encoded in the ECIEncoding specified encoding with the insertion of an ECI identifier.
     * If a character is found that is not supported by the selected ECI encoding, an exception is thrown.
     * </p>
     */
    const AUTO = 0;

    /**
     * Encode codetext as plain bytes. If it detects any Unicode character, the character will be encoded as two bytes, lower byte first.
     * @deprecated
     */
    const BYTES = 1;

    /**
     * <p>
     * <p>Extended mode which supports multi ECI modes.</p>
     * <p>It is better to use MaxiCodeExtCodetextBuilder for extended codetext generation.</p>
     * <p>Use Display2DText property to set visible text to removing managing characters.</p>
     * <p>ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier</p>
     * <p>All unicode characters after ECI identifier are automatically encoded into correct character codeset.</p>
     * </p>
     * @deprecated
     */
    const EXTENDED_CODETEXT = 2;

    /**
     * Extended mode which supports multi ECI modes.
     * It is better to use MaxiCodeExtCodetextBuilder for extended codetext generation.
     * Use Display2DText property to set visible text to removing managing characters.
     * ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier
     * All unicode characters after ECI identifier are automatically encoded into correct character codeset.
     */
    const EXTENDED = 3;

    /**
     * <p>
     * In Binary mode, the CodeText is encoded with maximum data compactness.
     * If a Unicode character is found, an exception is thrown.
     *  </p>
     */
    const BINARY = 4;

    /**
     * <p>
     * In ECI mode, the entire message is re-encoded in the ECIEncoding specified encoding with the insertion of an ECI identifier.
     * If a character is found that is not supported by the selected ECI encoding, an exception is thrown.
     * Please note that some old (pre 2006) scanners may not support this mode.
     * </p>
     */
    const ECI = 5;
}