<?php

namespace Aspose\Barcode\Generation;

/**
 * <p>
 * Encoding mode for Aztec barcodes.
 * </p><p><hr><blockquote><pre>
 * <pre>
 *
 * @code
 * //Auto mode
 * $codetext = "犬Right狗";
 * $generator = new BarcodeGenerator(EncodeTypes::AZTEC, $codetext);
 * $generator->getParameters()->getBarcode()->getAztec()->setECIEncoding(ECIEncodings::UTF_8);
 * $generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 * @code
 * //Bytes mode
 * $encodedArr = [0xFF, 0xFE, 0xFD, 0xFC, 0xFB, 0xFA, 0xF9];
 * //encode array to string
 * $strBld = "";
 * foreach($encodedArr as bval)
 *     $strBld->append(chr(bval));
 * $codetext = $strBld->toString();
 * $generator = new BarcodeGenerator(EncodeTypes::AZTEC, $codetext);
 * $generator->getParameters()->getBarcode()->getAztec()->setAztecEncodeMode(AztecEncodeMode::BYTES);
 * $generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 * @code
 * //Extended codetext mode
 * //create codetext
 * $textBuilder = new AztecExtCodetextBuilder();
 * $textBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $textBuilder->addECICodetext(ECIEncodings::UTF8, "犬Right狗");
 * $textBuilder->addECICodetext(ECIEncodings::UTF16BE, "犬Power狗");
 * $textBuilder->addPlainCodetext("Plain text");
 * //generate codetext
 * $codetext = $textBuilder->getExtendedCodetext();
 * //generate
 * $generator = new BarcodeGenerator(EncodeTypes::AZTEC, codetext);
 * $generator->getParameters()->getBarcode()->getAztec()->setAztecEncodeMode(AztecEncodeMode::EXTENDED_CODETEXT);
 * $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
 * $generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 * </pre>
 * </pre></blockquote></hr></p>
 */
class AztecEncodeMode
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
     * <p>
     * Encode codetext as plain bytes. If it detects any Unicode character, the character will be encoded as two bytes, lower byte first.
     * </p>
     * @deprecated
     */
    const BYTES = 1;

    /**
     * <p>
     * <p>Extended mode which supports multi ECI modes.</p>
     * <p>It is better to use AztecExtCodetextBuilder for extended codetext generation.</p>
     * <p>Use Display2DText property to set visible text to removing managing characters.</p>
     * <p>ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier</p>
     * <p>All unicode characters after ECI identifier are automatically encoded into correct character codeset.</p>
     * </p>
     * @deprecated
     */
    const EXTENDED_CODETEXT = 2;
    /**
     * <p>
     * <p>Extended mode which supports multi ECI modes.</p>
     * <p>It is better to use AztecExtCodetextBuilder for extended codetext generation.</p>
     * <p>Use Display2DText property to set visible text to removing managing characters.</p>
     * <p>ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier</p>
     * <p>All unicode characters after ECI identifier are automatically encoded into correct character codeset.</p>
     * </p>
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