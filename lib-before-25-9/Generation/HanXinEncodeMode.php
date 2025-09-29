<?php

namespace Aspose\Barcode\Generation;

/**
 * <p>
 * Han Xin Code encoding mode. It is recommended to use Auto with ASCII / Chinese characters or Unicode for Unicode characters.
 * </p><p><hr><blockquote><pre>
 *  <pre>
 *  // Auto mode
 *  $codetext = "1234567890ABCDEFGabcdefg,Han Xin Code";
 *  $generator = new BarcodeGenerator(EncodeTypes::HAN_XIN, codetext);
 *  $generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 *  // Bytes mode
 *  $encodedArr = array(0xFF, 0xFE, 0xFD, 0xFC, 0xFB, 0xFA, 0xF9);
 *
 *  //encode array to string
 *  StringBuilder strBld = new StringBuilder();
 *  for (byte bval : encodedArr)
 *      strBld.append((char) bval);
 *  $codetext = strBld.toString();
 *
 *  $generator = new BarcodeGenerator(EncodeTypes::HAN_XIN, codetext);
 *  $generator->getParameters()->getBarcode()->getHanXin()->setHanXinEncodeMode(HanXinEncodeMode::BYTES);
 *  $generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 *  // ECI mode
 *  $codetext = "ΑΒΓΔΕ";
 *  $generator = new BarcodeGenerator(EncodeTypes::HAN_XIN, codetext);
 *  $generator->getParameters()->getBarcode()->getHanXin()->setHanXinEncodeMode(HanXinEncodeMode::ECI);
 *  $generator->getParameters()->getBarcode()->getHanXin()->setHanXinECIEncoding(ECIEncodings::ISO_8859_7);
 *  $generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 *  // URI mode
 *  $codetext = "https://www.test.com/%BC%DE%%%ab/search=test";
 *  $generator = new BarcodeGenerator(EncodeTypes::HAN_XIN, codetext);
 *  $generator->getParameters()->getBarcode()->getHanXin()->setHanXinEncodeMode(HanXinEncodeMode::URI);
 *  $generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 *  // Extended mode - TBD
 *  </pre>
 *  </pre></blockquote></hr></p>
 */
class HanXinEncodeMode
{
    /**
     * <p>
     * Sequence of Numeric, Text, ECI, Binary Bytes and 4 GB18030 modes changing automatically.
     * </p>
     */
    const AUTO = 0;
    /**
     * <p>
     * Binary byte mode encodes binary data in any form and encodes them in their binary byte. Every byte in
     * Binary Byte mode is represented by 8 bits.
     * </p>
     */
    const BINARY = 1;
    /**
     * <p>
     * Extended Channel Interpretation (ECI) mode
     * </p>
     */
    const ECI = 2;
    /**
     * <p>
     * Unicode mode designs a way to represent any text data reference to UTF8 encoding/charset in Han Xin Code.
     * </p>
     */
    const UNICODE = 3;
    /**
     * <p>
     * URI mode indicates the data represented in Han Xin Code is Uniform Resource Identifier (URI)
     * reference to RFC 3986.
     * </p>
     */
    const URI = 4;
    /**
     * <p>
     * Extended mode  will allow more flexible combinations of other modes, this mode is currently not implemented.
     * </p>
     */
    const EXTENDED = 5;
}