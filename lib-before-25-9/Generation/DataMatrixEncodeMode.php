<?php

namespace Aspose\Barcode\Generation;

/**
 * <p>
 * DataMatrix encoder's encoding mode, default to Auto
 * </p><p><hr><blockquote><pre>
 * This sample shows how to do codetext in Extended Mode.
 * <pre>
 * //Auto mode
 * $codetext = "犬Right狗";
 * $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, $codetext);
 * $generator->getParameters()->getBarcode()->getDataMatrix()->setECIEncoding(ECIEncodings::UTF8);
 * $generator->save("test.bmp", BarcodeImageFormat::PNG);
 * //Bytes mode
 * $encodedArr = array( 0xFF, 0xFE, 0xFD, 0xFC, 0xFB, 0xFA, 0xF9 );
 * $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, $encodedArr);
 * $generator->getParameters()->getBarcode()->getDataMatrix()->setDataMatrixEncodeMode(DataMatrixEncodeMode::BINARY);
 * $generator->save("test.bmp", BarcodeImageFormat::PNG);
 * //Extended codetext mode
 * //create codetext
 * $codetextBuilder=new DataMatrixExtCodetextBuilder();
 * $codetextBuilder->addECICodetextWithEncodeMode(ECIEncodings::Win1251,DataMatrixEncodeMode::BYTES,"World");
 * $codetextBuilder->addPlainCodetext("Will");
 * $codetextBuilder->addECICodetext(ECIEncodings::UTF8,"犬Right狗");
 * $codetextBuilder->addCodetextWithEncodeMode(DataMatrixEncodeMode::C40,"ABCDE");
 * //generate codetext
 * $codetext=$codetextBuilder->getExtended();
 * //generate
 * $generator=new BarcodeGenerator(EncodeTypes::DATA_MATRIX,codetext);
 * $generator->getParameters()->getBarcode()->getDataMatrix()->setDataMatrixEncodeMode(DataMatrixEncodeMode::EXTENDED_CODETEXT);
 * $generator->save("test.bmp", BarcodeImageFormat::PNG);
 * </pre>
 * </pre></blockquote></hr></p>
 */
class DataMatrixEncodeMode
{
    /**
     * In Auto mode, the CodeText is encoded with maximum data compactness.
     * Unicode characters are re-encoded in the ECIEncoding specified encoding with the insertion of an ECI identifier.
     * If a character is found that is not supported by the selected ECI encoding, an exception is thrown.
     */
    const AUTO = 0;

    /**
     * <p>
     * Encodes one alphanumeric or two numeric characters per byte
     * </p>
     */
    const ASCII = 1;

    /**
     * Encode 8 bit values
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use Base256 option.
     */
    const BYTES = 6;

    /**
     * <p>
     * Uses C40 encoding. Encodes Upper-case alphanumeric, Lower case and special characters
     * </p>
     */
    const C40 = 8;

    /**
     * <p>
     * Uses Text encoding. Encodes Lower-case alphanumeric, Upper case and special characters
     * </p>
     */
    const TEXT = 9;

    /**
     * <p>
     * Uses EDIFACT encoding. Uses six bits per character, encodes digits, upper-case letters, and many punctuation marks, but has no support for lower-case letters.
     * </p>
     */
    const EDIFACT = 10;

    /**
     * <p>
     * Uses ANSI X12 encoding.
     * </p>
     */
    const ANSIX12 = 11;

    /**
     * <p>
     * <p>ExtendedCodetext mode allows to manually switch encodation schemes and ECI encodings in codetext.</p>
     * <p>It is better to use DataMatrixExtCodetextBuilder for extended codetext generation.</p>
     * <p>Use Display2DText property to set visible text to removing managing characters.</p>
     * <p>ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier</p>
     * <p>All unicode characters after ECI identifier are automatically encoded into correct character codeset.</p>
     * <p></p>
     * <p>Encodation schemes are set in the next format : "\Encodation_scheme_name:text\Encodation_scheme_name:text".</p>
     * <p>Allowed encodation schemes are: EDIFACT, ANSIX12, ASCII, C40, Text, Auto.</p>
     * <p></p>
     * <p>All backslashes (\) must be doubled in text.</p>
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the 'Extended' encode mode
     */
    const EXTENDED_CODETEXT = 12;

    /**
     * ExtendedCodetext mode allows to manually switch encodation schemes and ECI encodings in codetext.
     * It is better to use DataMatrixExtCodetextBuilder for extended codetext generation.
     * Use Display2DText property to set visible text to removing managing characters.
     * ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier
     * All unicode characters after ECI identifier are automatically encoded into correct character codeset.
     *
     * Encodation schemes are set in the next format : "\Encodation_scheme_name:text\Encodation_scheme_name:text".
     * Allowed encodation schemes are: EDIFACT, ANSIX12, ASCII, C40, Text, Auto.
     *
     * All backslashes (\) must be doubled in text.
     */
    const EXTENDED = 13;

    /**
     * Encode 8 bit values
     */
    const BASE_256 = 14;

    /**
     * In Binary mode, the CodeText is encoded with maximum data compactness.
     * If a Unicode character is found, an exception is thrown.
     */
    const BINARY = 15;

    /**
     * In ECI mode, the entire message is re-encoded in the ECIEncoding specified encoding with the insertion of an ECI identifier.
     * If a character is found that is not supported by the selected ECI encoding, an exception is thrown.
     * Please note that some old (pre 2006) scanners may not support this mode.
     */
    const ECI = 16;
}