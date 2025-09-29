<?php

namespace Aspose\Barcode\Generation;

/**
 * <p>
 * Encoding mode for QR barcodes.
 * </p>
 * <p><hr><blockquote><pre>
 * Example how to use ECI encoding
 * <pre>
 *     $generator = new BarcodeGenerator(EncodeTypes::QR, "12345TEXT");
 *     $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::ECI_ENCODING);
 *     $generator->getParameters()->getBarcode()->getQR()->setQrECIEncoding(ECIEncodings::UTF8);
 *     $generator->save("test.png", BarcodeImageFormat::PNG);
 * </pre>
 * </pre></blockquote></hr></p>
 *      <p><hr><blockquote><pre>
 *  Example how to use FNC1 first position in Extended Mode
 *  <pre>
 *      $textBuilder = new QrExtCodetextBuilder();
 *      $textBuilder->addPlainCodetext("000%89%%0");
 *      $textBuilder->addFNC1GroupSeparator();
 *      $textBuilder->addPlainCodetext("12345&lt;FNC1&gt;");
 *      //generate barcode
 *      $generator = new BarcodeGenerator(EncodeTypes::QR);
 *      $generator->setCodeText(textBuilder->getExtended());
 *      $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::EXTENDED_CODETEXT);
 *      $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
 *      $generator->save("d:/test.png", BarcodeImageFormat::PNG);
 * </pre>
 *      *
 * This sample shows how to use FNC1 second position in Extended Mode.
 * <pre>
 *
 *    //create codetext
 *    $textBuilder = new QrExtCodetextBuilder();
 *    $textBuilder->addFNC1SecondPosition("12");
 *    $textBuilder->addPlainCodetext("TRUE3456");
 *    //generate barcode
 *    $generator = new BarcodeGenerator(EncodeTypes::QR);
 *    $generator->setCodeText(textBuilder->getExtended());
 *    $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
 *    $generator->save("d:/test.png", BarcodeImageFormat::PNG);
 *    </pre>
 *
 *    This sample shows how to use multi ECI mode in Extended Mode.
 *    <pre>
 *
 *   //create codetext
 *   $textBuilder = new QrExtCodetextBuilder();
 *   $textBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 *   $textBuilder->addECICodetext(ECIEncodings::UTF8, "Right");
 *   $textBuilder->addECICodetext(ECIEncodings::UTF16BE, "Power");
 *   $textBuilder->addPlainCodetext("t\e\\st");
 *   //generate barcode
 *   $generator = new BarcodeGenerator(EncodeTypes::QR);
 *   $generator->setCodeText(textBuilder->getExtended());
 *   $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::EXTENDED_CODETEXT);
 *   $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
 *   $generator->save("d:/test.png", BarcodeImageFormat::PNG);
 *  </pre>
 *  </pre></blockquote></hr></p>
 */
class QREncodeMode
{
    /**
     * In Auto mode, the CodeText is encoded with maximum data compactness.
     * Unicode characters are encoded in kanji mode if possible, or they are re-encoded in the ECIEncoding specified encoding with the insertion of an ECI identifier.
     * If a character is found that is not supported by the selected ECI encoding, an exception is thrown.
     */

    const AUTO = 0;
    /**
     * Encode codetext as plain bytes. If it detects any Unicode character, the character will be encoded as two bytes, lower byte first.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the 'SetCodeText' method to convert the message to byte array with specified encoding.
     */
    const BYTES = 1;

    /**
     * Encode codetext with UTF8 encoding with first ByteOfMark character.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the 'SetCodeText' method with UTF8 encoding to add a byte order mark (BOM) and encode the message. After that, the CodeText can be encoded using the 'Auto' mode.
     */
    const UTF_8_BOM = 2;


    /**
     * Encode codetext with UTF8 encoding with first ByteOfMark character. It can be problems with some barcode scanners.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the 'SetCodeText' method with BigEndianUnicode encoding to add a byte order mark (BOM) and encode the message. After that, the CodeText can be encoded using the 'Auto' mode.
     */
    const UTF_16_BEBOM = 3;

    /**
     * Encode codetext with value set in the ECIEncoding property. It can be problems with some old (pre 2006) barcode scanners.
     * This mode is not supported by MicroQR barcodes.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use ECI option.
     */
    const ECI_ENCODING = 4;

    /**
     * Extended Channel mode which supports FNC1 first position, FNC1 second position and multi ECI modes.</para>
     * It is better to use QrExtCodetextBuilder for extended codetext generation.</para>
     * Use Display2DText property to set visible text to removing managing characters.</para>
     * Encoding Principles:</para>
     * All symbols "\" must be doubled "\\" in the codetext.</para>
     * FNC1 in first position is set in codetext as as "&lt;FNC1&gt;"</para>
     * FNC1 in second position is set in codetext as as "&lt;FNC1(value)&gt;". The value must be single symbols (a-z, A-Z) or digits from 0 to 99.</para>
     * Group Separator for FNC1 modes is set as 0x1D character '\\u001D' </para>
     * If you need to insert "&lt;FNC1&gt;" string into barcode write it as "&lt;\FNC1&gt;" </para>
     * ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier</para>
     * To disable current ECI mode and convert to default JIS8 mode zero mode ECI indetifier is set. "\000000"</para>
     * All unicode characters after ECI identifier are automatically encoded into correct character codeset.</para>
     * This mode is not supported by MicroQR barcodes.</para>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the 'Extended' encode mode.
     */
    const EXTENDED_CODETEXT = 5;

    /**
     * Extended Channel mode which supports FNC1 first position, FNC1 second position and multi ECI modes.</para>
     * It is better to use QrExtCodetextBuilder for extended codetext generation.</para>
     * Use Display2DText property to set visible text to removing managing characters.</para>
     * Encoding Principles:</para>
     * All symbols "\" must be doubled "\\" in the codetext.</para>
     * FNC1 in first position is set in codetext as as "&lt;FNC1&gt;"</para>
     * FNC1 in second position is set in codetext as as "&lt;FNC1(value)&gt;". The value must be single symbols (a-z, A-Z) or digits from 0 to 99.</para>
     * Group Separator for FNC1 modes is set as 0x1D character '\\u001D' </para>
     * If you need to insert "&lt;FNC1&gt;" string into barcode write it as "&lt;\FNC1&gt;" </para>
     * ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier</para>
     * To disable current ECI mode and convert to default JIS8 mode zero mode ECI indetifier is set. "\000000"</para>
     * All unicode characters after ECI identifier are automatically encoded into correct character codeset.</para>
     * This mode is not supported by MicroQR barcodes.</para>
     */
    const EXTENDED = 6;

    /**
     * In Binary mode, the CodeText is encoded with maximum data compactness.
     * If a Unicode character is found, an exception is thrown.
     */
    const BINARY = 7;

    /**
     * In ECI mode, the entire message is re-encoded in the ECIEncoding specified encoding with the insertion of an ECI identifier.
     * If a character is found that is not supported by the selected ECI encoding, an exception is thrown.
     * Please note that some old (pre 2006) scanners may not support this mode.
     * This mode is not supported by MicroQR barcodes.
     */
    const ECI = 8;
}