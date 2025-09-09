<?php

namespace Aspose\Barcode\Generation;

/**
 * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
 * about the used references for encoding the data in the symbol.
 *
 * Example how to use ECI encoding
 * @code
 *     $generator = new BarcodeGenerator(EncodeTypes::QR);
 *     $generator->setCodeText("12345TEXT");
 *     $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::ECI_ENCODING);
 *     $generator->getParameters()->getBarcode()->getQR()->setQrECIEncoding(ECIEncodings::UTF_8);
 *     $generator->save("test.png", "PNG");
 * @endcode
 */
class ECIEncodings
{

    /**
     * ISO/IEC 8859-1 Latin alphabet No. 1 encoding. ECI Id:"\000003"
     */
    const ISO_8859_1 = 3;
    /**
     * ISO/IEC 8859-2 Latin alphabet No. 2 encoding. ECI Id:"\000004"
     */
    const ISO_8859_2 = 4;
    /**
     * ISO/IEC 8859-3 Latin alphabet No. 3 encoding. ECI Id:"\000005"
     */
    const ISO_8859_3 = 5;
    /**
     * ISO/IEC 8859-4 Latin alphabet No. 4 encoding. ECI Id:"\000006"
     */
    const ISO_8859_4 = 6;
    /**
     * ISO/IEC 8859-5 Latin/Cyrillic alphabet encoding. ECI Id:"\000007"
     */
    const ISO_8859_5 = 7;
    /**
     * ISO/IEC 8859-6 Latin/Arabic alphabet encoding. ECI Id:"\000008"
     */
    const ISO_8859_6 = 8;
    /**
     * ISO/IEC 8859-7 Latin/Greek alphabet encoding. ECI Id:"\000009"
     */
    const ISO_8859_7 = 9;
    /**
     * ISO/IEC 8859-8 Latin/Hebrew alphabet encoding. ECI Id:"\000010"
     */
    const ISO_8859_8 = 10;
    /**
     * ISO/IEC 8859-9 Latin alphabet No. 5 encoding. ECI Id:"\000011"
     */
    const ISO_8859_9 = 11;
    /**
     * ISO/IEC 8859-10 Latin alphabet No. 6 encoding. ECI Id:"\000012"
     */
    const ISO_8859_10 = 12;
    /**
     * ISO/IEC 8859-11 Latin/Thai alphabet encoding. ECI Id:"\000013"
     */
    const ISO_8859_11 = 13;
    //14 is reserved
    /**
     * ISO/IEC 8859-13 Latin alphabet No. 7 (Baltic Rim) encoding. ECI Id:"\000015"
     */
    const ISO_8859_13 = 15;
    /**
     * ISO/IEC 8859-14 Latin alphabet No. 8 (Celtic) encoding. ECI Id:"\000016"
     */
    const ISO_8859_14 = 16;
    /**
     * ISO/IEC 8859-15 Latin alphabet No. 9 encoding. ECI Id:"\000017"
     */
    const ISO_8859_15 = 17;
    /**
     * ISO/IEC 8859-16 Latin alphabet No. 10 encoding. ECI Id:"\000018"
     */
    const ISO_8859_16 = 18;
    //19 is reserved
    /**
     * Shift JIS (JIS X 0208 Annex 1 + JIS X 0201) encoding. ECI Id:"\000020"
     */
    const Shift_JIS = 20;
    //
    /**
     * Windows 1250 Latin 2 (Central Europe) encoding. ECI Id:"\000021"
     */
    const Win1250 = 21;
    /**
     * Windows 1251 Cyrillic encoding. ECI Id:"\000022"
     */
    const Win1251 = 22;
    /**
     * Windows 1252 Latin 1 encoding. ECI Id:"\000023"
     */
    const Win1252 = 23;
    /**
     * Windows 1256 Arabic encoding. ECI Id:"\000024"
     */
    const Win1256 = 24;
    //
    /**
     * ISO/IEC 10646 UCS-2 (High order byte first) encoding. ECI Id:"\000025"
     */
    const UTF16BE = 25;
    /**
     * ISO/IEC 10646 UTF-8 encoding. ECI Id:"\000026"
     */
    const UTF8 = 26;
    //
    /**
     * ISO/IEC 646:1991 International Reference Version of ISO 7-bit coded character set encoding. ECI Id:"\000027"
     */
    const US_ASCII = 27;
    /**
     * Big 5 (Taiwan) Chinese Character Set encoding. ECI Id:"\000028"
     */
    const Big5 = 28;
    /**
     * <p>GB2312 Chinese Character Set encoding. ECI Id:"\000029"</p>
     */
    const GB2312 = 29;
    /**
     * Korean Character Set encoding. ECI Id:"\000030"
     */
    const EUC_KR = 30;
    /**
     * <p>GBK (extension of GB2312 for Simplified Chinese)  encoding. ECI Id:"\000031"</p>
     */
    const GBK = 31;
    /**
     * <p>GGB18030 Chinese Character Set encoding. ECI Id:"\000032"</p>
     */
    const GB18030 = 32;
    /**
     * <p> ISO/IEC 10646 UTF-16LE encoding. ECI Id:"\000033"</p>
     */
    const UTF16LE = 33;
    /**
     * <p> ISO/IEC 10646 UTF-32BE encoding. ECI Id:"\000034"</p>
     */
    const UTF32BE = 34;
    /**
     * <p> ISO/IEC 10646 UTF-32LE encoding. ECI Id:"\000035"</p>
     */
    const UTF32LE = 35;
    /**
     * <p> ISO/IEC 646: ISO 7-bit coded character set - Invariant Characters set encoding. ECI Id:"\000170"</p>
     */
    const INVARIANT = 170;
    /**
     * <p> 8-bit binary data. ECI Id:"\000899"</p>
     */
    const BINARY = 899;

    /**
     * No Extended Channel Interpretation/p>
     */
    const NONE = 0;
}