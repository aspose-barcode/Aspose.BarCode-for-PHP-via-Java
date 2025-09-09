<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Specify the type of barcode to read.
 *
 * This sample shows how to detect Code39 and Code128 barcodes.
 * @code
 * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 * }
 * @endcode
 */
class DecodeType
{
    /**
     * Unspecified decode type.
     */
    const NONE = -1;

    /**
     * Specifies that the data should be decoded with { <b>CODABAR</b>} barcode specification
     */
    const CODABAR = 0;

    /**
     * Specifies that the data should be decoded with { <b>CODE 11</b>} barcode specification
     */
    const CODE_11 = 1;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>Code 39</b>} basic charset barcode specification: ISO/IEC 16388
     * </p>
     */
    const CODE_39 = 2;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>Code 39</b>} full ASCII charset barcode specification: ISO/IEC 16388
     * </p>
     */
    const CODE_39_FULL_ASCII = 3;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>CODE 93</b>} barcode specification
     * </p>
     */
    const CODE_93 = 5;

    /**
     * Specifies that the data should be decoded with { <b>CODE 128</b>} barcode specification
     */
    const CODE_128 = 6;

    /**
     * Specifies that the data should be decoded with { <b>GS1 CODE 128</b>} barcode specification
     */
    const GS_1_CODE_128 = 7;

    /**
     * Specifies that the data should be decoded with { <b>EAN-8</b>} barcode specification
     */
    const EAN_8 = 8;

    /**
     * Specifies that the data should be decoded with { <b>EAN-13</b>} barcode specification
     */
    const EAN_13 = 9;

    /**
     * Specifies that the data should be decoded with { <b>EAN14</b>} barcode specification
     */
    const EAN_14 = 10;

    /**
     * Specifies that the data should be decoded with { <b>SCC14</b>} barcode specification
     */
    const SCC_14 = 11;

    /**
     * Specifies that the data should be decoded with { <b>SSCC18</b>} barcode specification
     */
    const SSCC_18 = 12;

    /**
     * Specifies that the data should be decoded with { <b>UPC-A</b>} barcode specification
     */
    const UPCA = 13;

    /**
     * Specifies that the data should be decoded with { <b>UPC-E</b>} barcode specification
     */
    const UPCE = 14;

    /**
     * Specifies that the data should be decoded with { <b>ISBN</b>} barcode specification
     */
    const ISBN = 15;

    /**
     * Specifies that the data should be decoded with { <b>Standard 2 of 5</b>} barcode specification
     */
    const STANDARD_2_OF_5 = 16;

    /**
     * Specifies that the data should be decoded with { <b>INTERLEAVED 2 of 5</b>} barcode specification
     */
    const INTERLEAVED_2_OF_5 = 17;

    /**
     * Specifies that the data should be decoded with { <b>Matrix 2 of 5</b>} barcode specification
     */
    const MATRIX_2_OF_5 = 18;

    /**
     * Specifies that the data should be decoded with { <b>Italian Post 25</b>} barcode specification
     */
    const ITALIAN_POST_25 = 19;

    /**
     * Specifies that the data should be decoded with { <b>IATA 2 of 5</b>} barcode specification. IATA (International Air Transport Association) uses this barcode for the management of air cargo.
     */
    const IATA_2_OF_5 = 20;

    /**
     * Specifies that the data should be decoded with { <b>ITF14</b>} barcode specification
     */
    const ITF_14 = 21;

    /**
     * Specifies that the data should be decoded with { <b>ITF6</b>} barcode specification
     */
    const ITF_6 = 22;

    /**
     * Specifies that the data should be decoded with { <b>MSI Plessey</b>} barcode specification
     */
    const MSI = 23;

    /**
     * Specifies that the data should be decoded with { <b>VIN</b>} (Vehicle Identification Number) barcode specification
     */
    const VIN = 24;

    /**
     * Specifies that the data should be decoded with { <b>DeutschePost Ident code</b>} barcode specification
     */
    const DEUTSCHE_POST_IDENTCODE = 25;

    /**
     * Specifies that the data should be decoded with { <b>DeutschePost Leit code</b>} barcode specification
     */
    const DEUTSCHE_POST_LEITCODE = 26;

    /**
     * Specifies that the data should be decoded with { <b>OPC</b>} barcode specification
     */
    const OPC = 27;

    /**
     *  Specifies that the data should be decoded with { <b>PZN</b>} barcode specification. This symbology is also known as Pharma Zentral Nummer
     */
    const PZN = 28;

    /**
     * Specifies that the data should be decoded with { <b>Pharmacode</b>} barcode. This symbology is also known as Pharmaceutical BINARY Code
     */
    const PHARMACODE = 29;

    /**
     * Specifies that the data should be decoded with { <b>DataMatrix</b>} barcode symbology
     */
    const DATA_MATRIX = 30;

    /**
     * Specifies that the data should be decoded with { <b>GS1DataMatrix</b>} barcode symbology
     */
    const GS_1_DATA_MATRIX = 31;

    /**
     * Specifies that the data should be decoded with { <b>QR Code</b>} barcode specification
     */
    const QR = 32;

    /**
     * Specifies that the data should be decoded with { <b>Aztec</b>} barcode specification
     */
    const AZTEC = 33;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>GS1 Aztec</b>} barcode specification
     * </p>
     */
    const GS_1_AZTEC = 81;

    /**
     * Specifies that the data should be decoded with { <b>Pdf417</b>} barcode symbology
     */
    const PDF_417 = 34;

    /**
     * Specifies that the data should be decoded with { <b>MacroPdf417</b>} barcode specification
     */
    const MACRO_PDF_417 = 35;

    /**
     * Specifies that the data should be decoded with { <b>MicroPdf417</b>} barcode specification
     */
    const MICRO_PDF_417 = 36;

    /**
     * Specifies that the data should be decoded with <b>MicroPdf417</b> barcode specification
     */
    const GS_1_MICRO_PDF_417 = 82;

    /**
     * Specifies that the data should be decoded with { <b>CodablockF</b>} barcode specification
     */
    const CODABLOCK_F = 65;
    /**
     * Specifies that the data should be decoded with <b>Royal Mail Mailmark</b> barcode specification.
     */
    const MAILMARK = 66;

    /**
     * Specifies that the data should be decoded with { <b>Australia Post</b>} barcode specification
     */
    const AUSTRALIA_POST = 37;

    /**
     * Specifies that the data should be decoded with { <b>Postnet</b>} barcode specification
     */
    const POSTNET = 38;

    /**
     * Specifies that the data should be decoded with { <b>Planet</b>} barcode specification
     */
    const PLANET = 39;

    /**
     * Specifies that the data should be decoded with USPS { <b>OneCode</b>} barcode specification
     */
    const ONE_CODE = 40;

    /**
     * Specifies that the data should be decoded with { <b>RM4SCC</b>} barcode specification. RM4SCC (Royal Mail 4-state Customer Code) is used for automated mail sort process in UK.
     */
    const RM_4_SCC = 41;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR omni-directional</b>} barcode specification
     */
    const DATABAR_OMNI_DIRECTIONAL = 42;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR truncated</b>} barcode specification
     */
    const DATABAR_TRUNCATED = 43;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR limited</b>} barcode specification
     */
    const DATABAR_LIMITED = 44;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR expanded</b>} barcode specification
     */
    const DATABAR_EXPANDED = 45;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR stacked omni-directional</b>} barcode specification
     */
    const DATABAR_STACKED_OMNI_DIRECTIONAL = 53;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR stacked</b>} barcode specification
     */
    const DATABAR_STACKED = 54;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR expanded stacked</b>} barcode specification
     */
    const DATABAR_EXPANDED_STACKED = 55;

    /**
     * Specifies that the data should be decoded with { <b>Patch code</b>} barcode specification. Barcode symbology is used for automated scanning
     */
    const PATCH_CODE = 46;

    /**
     * Specifies that the data should be decoded with { <b>ISSN</b>} barcode specification
     */
    const ISSN = 47;

    /**
     * Specifies that the data should be decoded with { <b>ISMN</b>} barcode specification
     */
    const ISMN = 48;

    /**
     * Specifies that the data should be decoded with { <b>Supplement(EAN2, EAN5)</b>} barcode specification
     */
    const SUPPLEMENT = 49;

    /**
     * Specifies that the data should be decoded with { <b>Australian Post Domestic eParcel Barcode</b>} barcode specification
     */
    const AUSTRALIAN_POSTE_PARCEL = 50;

    /**
     * Specifies that the data should be decoded with { <b>Swiss Post Parcel Barcode</b>} barcode specification
     */
    const SWISS_POST_PARCEL = 51;

    /**
     * Specifies that the data should be decoded with { <b>SCode16K</b>} barcode specification
     */
    const CODE_16_K = 52;

    /**
     * Specifies that the data should be decoded with { <b>MicroQR Code</b>} barcode specification
     */
    const MICRO_QR = 56;

    /**
     * Specifies that the data should be decoded with <b>RectMicroQR (rMQR) Code</b> barcode specification
     */
    const RECT_MICRO_QR = 83;

    /**
     * Specifies that the data should be decoded with { <b>CompactPdf417</b>} (Pdf417Truncated) barcode specification
     */
    const COMPACT_PDF_417 = 57;

    /**
     * Specifies that the data should be decoded with { <b>GS1 QR</b>} barcode specification
     */
    const GS_1_QR = 58;

    /**
     * Specifies that the data should be decoded with { <b>MaxiCode</b>} barcode specification
     */
    const MAXI_CODE = 59;

    /**
     * Specifies that the data should be decoded with { <b>MICR E-13B</b>} blank specification
     */
    const MICR_E_13_B = 60;

    /**
     * Specifies that the data should be decoded with { <b>Code32</b>} blank specification
     */
    const CODE_32 = 61;

    /**
     * Specifies that the data should be decoded with { <b>DataLogic 2 of 5</b>} blank specification
     */
    const DATA_LOGIC_2_OF_5 = 62;

    /**
     * Specifies that the data should be decoded with { <b>DotCode</b>} blank specification
     */
    const DOT_CODE = 63;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>GS1 DotCode</b>} blank specification
     * </p>
     */
    const GS_1_DOT_CODE = 77;

    /**
     * Specifies that the data should be decoded with { <b>DotCode</b>} blank specification
     */
    const DUTCH_KIX = 64;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC LIC Code39</b>} blank specification
     * </p>
     */
    const HIBC_CODE_39_LIC = 67;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC LIC Code128</b>} blank specification
     * </p>
     */
    const HIBC_CODE_128_LIC = 68;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC LIC Aztec</b>} blank specification
     * </p>
     */
    const HIBC_AZTEC_LIC = 69;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC LIC DataMatrix</b>} blank specification
     * </p>
     */
    const HIBC_DATA_MATRIX_LIC = 70;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC LIC QR</b>} blank specification
     * </p>
     */
    const HIBCQRLIC = 71;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC PAS Code39</b>} blank specification
     * </p>
     */
    const HIBC_CODE_39_PAS = 72;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC PAS Code128</b>} blank specification
     * </p>
     */
    const HIBC_CODE_128_PAS = 73;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC PAS Aztec</b>} blank specification
     * </p>
     */
    const HIBC_AZTEC_PAS = 74;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC PAS DataMatrix</b>} blank specification
     * </p>
     */
    const HIBC_DATA_MATRIX_PAS = 75;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC PAS QR</b>} blank specification
     * </p>
     */
    const HIBCQRPAS = 76;

    /**
     *  Specifies that the data should be decoded with <b>Han Xin Code</b> blank specification
     */
    const HAN_XIN = 78;

    /**
     * Specifies that the data should be decoded with <b>Han Xin Code</b> blank specification
     */
    const GS_1_HAN_XIN = 79;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>GS1 Composite Bar</b>} barcode specification
     * </p>
     */
    const GS_1_COMPOSITE_BAR = 80;

    /**
     * Specifies that data will be checked with all of  1D  barcode symbologies
     */
    const TYPES_1D = 97;

    /**
     * Specifies that data will be checked with all of  1.5D POSTAL  barcode symbologies, like  Planet, Postnet, AustraliaPost, OneCode, RM4SCC, DutchKIX
     */
    const POSTAL_TYPES = 95;

    /**
     * Specifies that data will be checked with most commonly used symbologies
     */
    const MOST_COMMON_TYPES = 96;

    /**
     * Specifies that data will be checked with all of <b>2D</b> barcode symbologies
     */
    const TYPES_2D = 98;

    /**
     * Specifies that data will be checked with all available symbologies
     */
    const ALL_SUPPORTED_TYPES = 99;

    /**
     * Determines if the specified BaseDecodeType contains any 1D barcode symbology
     * @param int $symbology barcode symbology
     * @return bool <b>true</b> if BaseDecodeType contains any 1D barcode symbology; otherwise, returns <b>false</b>.
     */
    public static function is1D(int $symbology): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $isEquals = $client->DecodeType_is1D($symbology);
            $thriftConnection->closeConnection();
            return $isEquals;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified BaseDecodeType contains any Postal barcode symbology
     * @param int symbology The BaseDecodeType to test
     * @return bool Returns <b>true</b> if BaseDecodeType contains any Postal barcode symbology; otherwise, returns <b>false</b>.
     */
    public static function isPostal(int $symbology): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $isEquals = $client->DecodeType_isPostal($symbology);
            $thriftConnection->closeConnection();
            return $isEquals;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified BaseDecodeType contains any 2D barcode symbology
     * @param int symbology The BaseDecodeType to test.
     * @return bool Returns <b>true</b> if BaseDecodeType contains any 2D barcode symbology; otherwise, returns <b>false</b>.
     */
    public static function is2D(int $symbology): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $isEquals = $client->DecodeType_is2D($symbology);
            $thriftConnection->closeConnection();
            return $isEquals;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the BaseDecodeType array contains specified barcode symbology
     * @param int $expectedDecodeType
     * @param array $decodeTypes the BaseDecodeType array
     * @return bool
     * @throws BarcodeException
     */
    public static function containsAny(int $expectedDecodeType, array $decodeTypes): bool
    {
        try
        {
            if (in_array($expectedDecodeType, $decodeTypes, true))
            {
                return true;
            }
            return false;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}