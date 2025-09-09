<?php

namespace Aspose\Barcode\Generation;

/**
 * <p>
 * Pdf417 barcode encode mode
 * </p>
 */
class Pdf417EncodeMode
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
     * In Binary mode, the CodeText is encoded with maximum data compactness.
     * If a Unicode character is found, an exception is thrown.
     *  </p>
     */
    const BINARY = 1;

    /**
     * <p>
     * In ECI mode, the entire message is re-encoded in the ECIEncoding specified encoding with the insertion of an ECI identifier.
     * If a character is found that is not supported by the selected ECI encoding, an exception is thrown.
     * Please note that some old (pre 2006) scanners may not support this mode.
     * </p>
     */
    const ECI = 2;

    /**
     * <p>
     * <p>Extended mode which supports multi ECI modes.</p>
     * <p>It is better to use Pdf417ExtCodetextBuilder for extended codetext generation.</p>
     * <p>Use Display2DText property to set visible text to removing managing characters.</p>
     * <p>ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier</p>
     * <p>All unicode characters after ECI identifier are automatically encoded into correct character codeset.</p>
     * </p>
     */
    const EXTENDED = 3;
}