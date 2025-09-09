<?php

namespace Aspose\Barcode\Generation;

/**
 * Specifies the type of barcode to encode.
 */
class EncodeTypes
{

    /**
     * Unspecified encode type.
     */
    const  NONE = -1;

    /**
     * Specifies that the data should be encoded with CODABAR barcode specification
     */
    const  CODABAR = 0;

    /**
     * Specifies that the data should be encoded with CODE 11 barcode specification
     */
    const  CODE_11 = 1;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>Code 39</b>} basic charset barcode specification: ISO/IEC 16388
     * </p>
     */
    const CODE_39 = 2;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>Code 39</b>} full ASCII charset barcode specification: ISO/IEC 16388
     * </p>
     */
    const CODE_39_FULL_ASCII = 3;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>CODE 93</b>} barcode specification
     * </p>
     */
    const CODE_93 = 5;

    /**
     * Specifies that the data should be encoded with CODE 128 barcode specification
     */
    const  CODE_128 = 6;

    /**
     * Specifies that the data should be encoded with GS1 Code 128 barcode specification. The codetext must contains parentheses for AI.
     */
    const  GS_1_CODE_128 = 7;

    /**
     * Specifies that the data should be encoded with EAN-8 barcode specification
     */
    const  EAN_8 = 8;

    /**
     * Specifies that the data should be encoded with EAN-13 barcode specification
     */
    const  EAN_13 = 9;

    /**
     * Specifies that the data should be encoded with EAN14 barcode specification
     */
    const  EAN_14 = 10;

    /**
     * Specifies that the data should be encoded with SCC14 barcode specification
     */
    const  SCC_14 = 11;

    /**
     * Specifies that the data should be encoded with SSCC18 barcode specification
     */
    const  SSCC_18 = 12;

    /**
     * Specifies that the data should be encoded with UPC-A barcode specification
     */
    const  UPCA = 13;

    /**
     * Specifies that the data should be encoded with UPC-E barcode specification
     */
    const  UPCE = 14;

    /**
     * Specifies that the data should be encoded with isBN barcode specification
     */
    const  ISBN = 15;

    /**
     * Specifies that the data should be encoded with ISSN barcode specification
     */
    const  ISSN = 16;

    /**
     * Specifies that the data should be encoded with ISMN barcode specification
     */
    const  ISMN = 17;

    /**
     * Specifies that the data should be encoded with Standard 2 of 5 barcode specification
     */
    const  STANDARD_2_OF_5 = 18;

    /**
     * Specifies that the data should be encoded with INTERLEAVED 2 of 5 barcode specification
     */
    const  INTERLEAVED_2_OF_5 = 19;

    /**
     * Represents Matrix 2 of 5 BarCode
     */
    const  MATRIX_2_OF_5 = 20;

    /**
     * Represents Italian Post 25 barcode.
     */
    const  ITALIAN_POST_25 = 21;

    /**
     * Represents IATA 2 of 5 barcode.IATA (International Air Transport Assosiation) uses this barcode for the management of air cargo.
     */
    const  IATA_2_OF_5 = 22;

    /**
     * Specifies that the data should be encoded with ITF14 barcode specification
     */
    const  ITF_14 = 23;

    /**
     * Represents ITF-6  Barcode.
     */
    const  ITF_6 = 24;

    /**
     * Specifies that the data should be encoded with MSI Plessey barcode specification
     */
    const  MSI = 25;

    /**
     * Represents VIN (Vehicle Identification Number) Barcode.
     */
    const  VIN = 26;

    /**
     * Represents Deutsch Post barcode, This EncodeType is also known as Identcode,CodeIdentcode,German Postal 2 of 5 Identcode,
     * Deutsch Post AG Identcode, Deutsch Frachtpost Identcode,  Deutsch Post AG (DHL)
     */
    const  DEUTSCHE_POST_IDENTCODE = 27;

    /**
     * Represents Deutsch Post Leitcode Barcode,also known as German Postal 2 of 5 Leitcode, CodeLeitcode, Leitcode, Deutsch Post AG (DHL).
     */
    const  DEUTSCHE_POST_LEITCODE = 28;

    /**
     * Represents OPC(Optical Product Code) Barcode,also known as , VCA Barcode VCA OPC, Vision Council of America OPC Barcode.
     */
    const  OPC = 29;

    /**
     * Represents PZN barcode.This EncodeType is also known as Pharmacy central number, Pharmazentralnummer
     */
    const  PZN = 30;

    /**
     * Represents Code 16K barcode.
     */
    const  CODE_16_K = 31;

    /**
     * Represents Pharmacode barcode.
     */
    const  PHARMACODE = 32;

    /**
     * 2D barcode symbology DataMatrix
     */
    const  DATA_MATRIX = 33;

    /**
     * Specifies that the data should be encoded with QR Code barcode specification
     */
    const  QR = 34;

    /**
     * Specifies that the data should be encoded with Aztec barcode specification
     */
    const  AZTEC = 35;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>GS1 Aztec</b>} barcode specification. The codetext must contains parentheses for AI.
     * </p>
     */
    const GS_1_AZTEC = 81;

    /**
     * Specifies that the data should be encoded with Pdf417 barcode specification
     */
    const  PDF_417 = 36;

    /**
     * Specifies that the data should be encoded with MacroPdf417 barcode specification
     */
    const  MACRO_PDF_417 = 37;

    /**
     * 2D barcode symbology DataMatrix with GS1 string format
     */
    const  GS_1_DATA_MATRIX = 48;

    /**
     * Specifies that the data should be encoded with MicroPdf417 barcode specification
     */
    const  MICRO_PDF_417 = 55;

    /**
     * Specifies that the data should be encoded with <b>GS1MicroPdf417</b> barcode specification
     */
    const GS_1_MICRO_PDF_417 = 82;

    /**
     * 2D barcode symbology QR with GS1 string format
     */
    const  GS_1_QR = 56;

    /**
     * Specifies that the data should be encoded with MaxiCode barcode specification
     */
    const  MAXI_CODE = 57;

    /**
     * Specifies that the data should be encoded with DotCode barcode specification
     */
    const  DOT_CODE = 60;

    /**
     * Represents Australia Post Customer BarCode
     */
    const  AUSTRALIA_POST = 38;

    /**
     * Specifies that the data should be encoded with Postnet barcode specification
     */
    const  POSTNET = 39;

    /**
     * Specifies that the data should be encoded with Planet barcode specification
     */
    const  PLANET = 40;

    /**
     * Specifies that the data should be encoded with USPS OneCode barcode specification
     */
    const  ONE_CODE = 41;

    /**
     * Represents RM4SCC barcode. RM4SCC (Royal Mail 4-state Customer Code) is used for automated mail sort process in UK.
     */
    const  RM_4_SCC = 42;

    /**
     * Represents Royal Mail Mailmark barcode.
     */
    const MAILMARK = 66;

    /**
     * Specifies that the data should be encoded with GS1 Databar omni-directional barcode specification.
     */
    const  DATABAR_OMNI_DIRECTIONAL = 43;

    /**
     * Specifies that the data should be encoded with GS1 Databar truncated barcode specification.
     */
    const  DATABAR_TRUNCATED = 44;

    /**
     * Represents GS1 DATABAR limited barcode.
     */
    const  DATABAR_LIMITED = 45;

    /**
     * Represents GS1 Databar expanded barcode.
     */
    const  DATABAR_EXPANDED = 46;

    /**
     * Represents GS1 Databar expanded stacked barcode.
     */
    const  DATABAR_EXPANDED_STACKED = 52;

    /**
     * Represents GS1 Databar stacked barcode.
     */
    const  DATABAR_STACKED = 53;

    /**
     * Represents GS1 Databar stacked omni-directional barcode.
     */
    const  DATABAR_STACKED_OMNI_DIRECTIONAL = 54;

    /**
     * Specifies that the data should be encoded with Singapore Post Barcode barcode specification
     */
    const  SINGAPORE_POST = 47;

    /**
     * Specifies that the data should be encoded with Australian Post Domestic eParcel Barcode barcode specification
     */
    const  AUSTRALIAN_POSTE_PARCEL = 49;

    /**
     * Specifies that the data should be encoded with Swiss Post Parcel Barcode barcode specification. Supported types: Domestic Mail, International Mail, Additional Services (new)
     */
    const  SWISS_POST_PARCEL = 50;

    /**
     * Represents Patch code barcode
     */
    const  PATCH_CODE = 51;

    /**
     * Specifies that the data should be encoded with Code32 barcode specification
     */
    const  CODE_32 = 58;

    /**
     * Specifies that the data should be encoded with DataLogic 2 of 5 barcode specification
     */
    const  DATA_LOGIC_2_OF_5 = 59;

    /**
     * Specifies that the data should be encoded with Dutch KIX barcode specification
     */
    const  DUTCH_KIX = 61;

    /**
     * Specifies that the data should be encoded with UPC coupon with GS1-128 Extended Code barcode specification.
     * An example of the input string:
     * BarCodeBuilder->setCodetext("514141100906(8102)03"),
     * where UPCA part is "514141100906", GS1Code128 part is (8102)03.
     */
    const  UPCA_GS_1_CODE_128_COUPON = 62;

    /**
     * Specifies that the data should be encoded with UPC coupon with GS1 DataBar addition barcode specification.
     *
     * An example of the input string:
     * @code
     * BarcodeGenerator->setCodetext("514141100906(8110)106141416543213500110000310123196000"),
     * @endcode
     * where UPCA part is "514141100906", DATABAR part is "(8110)106141416543213500110000310123196000".
     * To change the caption, use barCodeBuilder->getCaptionAbove()->setText("company prefix + offer code");
     */
    const  UPCA_GS_1_DATABAR_COUPON = 63;

    /**
     * Specifies that the data should be encoded with Codablock-F barcode specification.
     */
    const  CODABLOCK_F = 64;

    /**
     * Specifies that the data should be encoded with GS1 Codablock-F barcode specification. The codetext must contains parentheses for AI.
     */
    const  GS_1_CODABLOCK_F = 65;

    /**
     * Specifies that the data should be encoded with <b>GS1 Composite Bar</b> barcode specification. The codetext must contains parentheses for AI. 1D codetext and 2D codetext must be separated with symbol '/'
     */
    const GS_1_COMPOSITE_BAR = 67;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC LIC Code39Standart</b>} barcode specification.
     * </p>
     */
    const HIBC_CODE_39_LIC = 68;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC LIC Code128</b>} barcode specification.
     * </p>
     */
    const HIBC_CODE_128_LIC = 69;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC LIC Aztec</b>} barcode specification.
     * </p>
     */
    const HIBC_AZTEC_LIC = 70;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC LIC DataMatrix</b>} barcode specification.
     * </p>
     */
    const HIBC_DATA_MATRIX_LIC = 71;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC LIC QR</b>} barcode specification.
     * </p>
     */
    const HIBCQRLIC = 72;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC PAS Code39Standart</b>} barcode specification.
     * </p>
     */
    const HIBC_CODE_39_PAS = 73;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC PAS Code128</b>} barcode specification.
     * </p>
     */
    const HIBC_CODE_128_PAS = 74;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC PAS Aztec</b>} barcode specification.
     * </p>
     */
    const HIBC_AZTEC_PAS = 75;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC PAS DataMatrix</b>} barcode specification.
     * </p>
     */
    const HIBC_DATA_MATRIX_PAS = 76;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC PAS QR</b>} barcode specification.
     * </p>
     */
    const HIBCQRPAS = 77;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>GS1 DotCode</b>} barcode specification. The codetext must contains parentheses for AI.
     * </p>
     */
    const GS_1_DOT_CODE = 78;

    /**
     * Specifies that the data should be encoded with <b>Han Xin</b> barcode specification
     */
    const HAN_XIN = 79;

    /**
     * 2D barcode symbology QR with GS1 string format
     */
    const GS_1_HAN_XIN = 80;

    /**
     * Specifies that the data should be encoded with <b>MicroQR Code</b> barcode specification
     */
    const MICRO_QR = 83;

    /**
     * Specifies that the data should be encoded with <b>RectMicroQR (rMQR) Code</b> barcode specification
     */
    const RECT_MICRO_QR = 84;

    public static function parse(string $encodeTypeName): int
    {
        if ($encodeTypeName == "CODABAR") return 0;

        else if ($encodeTypeName == "CODE_11") return 1;

        else if ($encodeTypeName == "CODE_39") return 2;

        else if ($encodeTypeName == "CODE_39_FULL_ASCII") return 3;

        else if ($encodeTypeName == "CODE_93") return 5;

        else if ($encodeTypeName == "CODE_128") return 6;

        else if ($encodeTypeName == "GS_1_CODE_128") return 7;

        else if ($encodeTypeName == "EAN_8") return 8;

        else if ($encodeTypeName == "EAN_13") return 9;

        else if ($encodeTypeName == "EAN_14") return 10;

        else if ($encodeTypeName == "SCC_14") return 11;

        else if ($encodeTypeName == "SSCC_18") return 12;

        else if ($encodeTypeName == "UPCA") return 13;

        else if ($encodeTypeName == "UPCE") return 14;

        else if ($encodeTypeName == "ISBN") return 15;

        else if ($encodeTypeName == "ISSN") return 16;

        else if ($encodeTypeName == "ISMN") return 17;

        else if ($encodeTypeName == "STANDARD_2_OF_5") return 18;

        else if ($encodeTypeName == "INTERLEAVED_2_OF_5") return 19;

        else if ($encodeTypeName == "MATRIX_2_OF_5") return 20;

        else if ($encodeTypeName == "ITALIAN_POST_25") return 21;

        else if ($encodeTypeName == "IATA_2_OF_5") return 22;

        else if ($encodeTypeName == "ITF_14") return 23;

        else if ($encodeTypeName == "ITF_6") return 24;

        else if ($encodeTypeName == "MSI") return 25;

        else if ($encodeTypeName == "VIN") return 26;

        else if ($encodeTypeName == "DEUTSCHE_POST_IDENTCODE") return 27;

        else if ($encodeTypeName == "DEUTSCHE_POST_LEITCODE") return 28;

        else if ($encodeTypeName == "OPC") return 29;

        else if ($encodeTypeName == "PZN") return 30;

        else if ($encodeTypeName == "CODE_16_K") return 31;

        else if ($encodeTypeName == "PHARMACODE") return 32;

        else if ($encodeTypeName == "DATA_MATRIX") return 33;

        else if ($encodeTypeName == "QR") return 34;

        else if ($encodeTypeName == "AZTEC") return 35;

        else if ($encodeTypeName == "GS_1_AZTEC") return 81;

        else if ($encodeTypeName == "PDF_417") return 36;

        else if ($encodeTypeName == "MACRO_PDF_417") return 37;

        else if ($encodeTypeName == "GS_1_DATA_MATRIX") return 48;

        else if ($encodeTypeName == "MICRO_PDF_417") return 55;

        else if ($encodeTypeName == "GS_1_QR") return 56;

        else if ($encodeTypeName == "MAXI_CODE") return 57;

        else if ($encodeTypeName == "DOT_CODE") return 60;

        else if ($encodeTypeName == "AUSTRALIA_POST") return 38;

        else if ($encodeTypeName == "POSTNET") return 39;

        else if ($encodeTypeName == "PLANET") return 40;

        else if ($encodeTypeName == "ONE_CODE") return 41;

        else if ($encodeTypeName == "RM_4_SCC") return 42;

        else if ($encodeTypeName == "MAILMARK") return 66;

        else if ($encodeTypeName == "DATABAR_OMNI_DIRECTIONAL") return 43;

        else if ($encodeTypeName == "DATABAR_TRUNCATED") return 44;

        else if ($encodeTypeName == "DATABAR_LIMITED") return 45;

        else if ($encodeTypeName == "DATABAR_EXPANDED") return 46;

        else if ($encodeTypeName == "DATABAR_EXPANDED_STACKED") return 52;

        else if ($encodeTypeName == "DATABAR_STACKED") return 53;

        else if ($encodeTypeName == "DATABAR_STACKED_OMNI_DIRECTIONAL") return 54;

        else if ($encodeTypeName == "SINGAPORE_POST") return 47;

        else if ($encodeTypeName == "AUSTRALIAN_POSTE_PARCEL") return 49;

        else if ($encodeTypeName == "SWISS_POST_PARCEL") return 50;

        else if ($encodeTypeName == "PATCH_CODE") return 51;

        else if ($encodeTypeName == "CODE_32") return 58;

        else if ($encodeTypeName == "DATA_LOGIC_2_OF_5") return 59;

        else if ($encodeTypeName == "DUTCH_KIX") return 61;

        else if ($encodeTypeName == "UPCA_GS_1_CODE_128_COUPON") return 62;

        else if ($encodeTypeName == "UPCA_GS_1_DATABAR_COUPON") return 63;

        else if ($encodeTypeName == "CODABLOCK_F") return 64;

        else if ($encodeTypeName == "GS_1_CODABLOCK_F") return 65;

        else if ($encodeTypeName == "GS_1_COMPOSITE_BAR") return 67;

        else if ($encodeTypeName == "HIBC_CODE_39_LIC") return 68;

        else if ($encodeTypeName == "HIBC_CODE_128_LIC") return 69;

        else if ($encodeTypeName == "HIBC_AZTEC_LIC") return 70;

        else if ($encodeTypeName == "HIBC_DATA_MATRIX_LIC") return 71;

        else if ($encodeTypeName == "HIBCQRLIC") return 72;

        else if ($encodeTypeName == "HIBC_CODE_39_PAS") return 73;

        else if ($encodeTypeName == "HIBC_CODE_128_PAS") return 74;

        else if ($encodeTypeName == "HIBC_AZTEC_PAS") return 75;

        else if ($encodeTypeName == "HIBC_DATA_MATRIX_PAS") return 76;

        else if ($encodeTypeName == "HIBCQRPAS") return 77;

        else if ($encodeTypeName == "GS_1_DOT_CODE") return 78;

        else if ($encodeTypeName == "HAN_XIN") return 79;

        else if ($encodeTypeName == "GS_1_HAN_XIN") return 80;

        else if ($encodeTypeName == "MICRO_QR") return 83;

        else if ($encodeTypeName == "RECT_MICRO_QR") return 84;

        else return -1;
    }
}