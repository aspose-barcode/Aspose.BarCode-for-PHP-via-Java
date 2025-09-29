<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\Pdf417ParametersDTO;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;
use DateTime;
use Exception;

/**
 * <p>
 * PDF417 parameters. Contains PDF417, MacroPDF417, MicroPDF417 and GS1MicroPdf417 parameters.
 * MacroPDF417 requires two fields: Pdf417MacroFileID and Pdf417MacroSegmentID. All other fields are optional.
 * MicroPDF417 in Structured Append mode (same as MacroPDF417 mode) requires two fields: Pdf417MacroFileID and Pdf417MacroSegmentID. All other fields are optional.
 * <pre>
 * These samples show how to encode UCC/EAN-128 non Linked modes in GS1MicroPdf417
 * <pre>
 *
 * # Encodes GS1 UCC/EAN-128 non Linked mode 905 with AI 01 (GTIN)
 * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(01)12345678901231");
 * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
 * foreach ($reader->readBarCodes() as $result)
 *    echo $result->getCodeText();
 *
 * # Encodes GS1 UCC/EAN-128 non Linked modes 903, 904 with any AI
 * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(241)123456789012345(241)ABCD123456789012345");
 * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
 * foreach ($reader->readBarCodes() as $result)
 *    echo $result->getCodeText();
 * </pre>
 * </pre>
 * </p>
 */
class Pdf417Parameters implements Communicator
{
    private $pdf417ParametersDto;

    private function getPdf417ParametersDto(): Pdf417ParametersDTO
    {
        return $this->pdf417ParametersDto;
    }

    private function setPdf417ParametersDto(Pdf417ParametersDTO $pdf417ParametersDto): void
    {
        $this->pdf417ParametersDto = $pdf417ParametersDto;
    }

    function __construct(Pdf417ParametersDTO $pdf417ParametersDto)
    {
        $this->pdf417ParametersDto = $pdf417ParametersDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
    }

    /**
     * Pdf417 symbology type of BarCode's compaction mode.
     * Default value: Pdf417CompactionMode::AUTO.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the Pdf417EncodeMode property.
     */
    public function getPdf417CompactionMode(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417CompactionMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Pdf417 symbology type of BarCode's compaction mode.
     * Default value: Pdf417CompactionMode::AUTO.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the Pdf417EncodeMode property.
     */
    public function setPdf417CompactionMode(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417CompactionMode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies Pdf417 encode mode.
     * Default value: Auto.
     */
    public function getPdf417EncodeMode(): int
    {
        return $this->getPdf417ParametersDto()->pdf417EncodeMode;
    }

    /**
     * Identifies Pdf417 encode mode.
     * Default value: Auto.
     */
    public function setPdf417EncodeMode(int $value): void
    {
        $this->getPdf417ParametersDto()->pdf417EncodeMode = $value;
    }

    /**
     * Gets Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     */
    public function getPdf417ErrorLevel(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417ErrorLevel;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     */
    public function setPdf417ErrorLevel(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417ErrorLevel = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Whether Pdf417 symbology type of BarCode is truncated (to reduce space).
     */
    public function getPdf417Truncate(): bool
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417Truncate;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Whether Pdf417 symbology type of BarCode is truncated (to reduce space).
     */
    public function setPdf417Truncate(bool $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417Truncate = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function getColumns(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->columns;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function setColumns(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->columns = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function getRows(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->rows;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function setRows(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->rows = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return $this->getPdf417ParametersDto()->aspectRatio;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->aspectRatio = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Getsmacro Pdf417 barcode's file ID.
     * Used for MacroPdf417.
     */
    public function getPdf417MacroFileID(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417MacroFileID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode's file ID.
     * Used for MacroPdf417.
     */
    public function setPdf417MacroFileID(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroFileID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode's segment ID, which starts from 0, to MacroSegmentsCount - 1.
     */
    public function getPdf417MacroSegmentID(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417MacroSegmentID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode's segment ID, which starts from 0, to MacroSegmentsCount - 1.
     */
    public function setPdf417MacroSegmentID(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroSegmentID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode segments count.
     */
    public function getPdf417MacroSegmentsCount(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417MacroSegmentsCount;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode segments count.
     */
    public function setPdf417MacroSegmentsCount(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroSegmentsCount = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode file name.
     * @return
     */
    public function getPdf417MacroFileName(): string
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417MacroFileName;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode file name.
     * @param string $value
     */
    public function setPdf417MacroFileName(string $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroFileName = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode time stamp.
     */
    public function getPdf417MacroTimeStamp(): DateTime
    {
        try
        {
            return new DateTime('@' . $this->getPdf417ParametersDto()->pdf417MacroTimeStamp);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode time stamp.
     */
    public function setPdf417MacroTimeStamp(DateTime $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroTimeStamp = $value->getTimestamp() . "";
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode sender name.
     */
    public function getPdf417MacroSender(): string
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417MacroSender;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode sender name.
     */
    public function setPdf417MacroSender(string $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroSender = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode addressee name.
     */
    public function getPdf417MacroAddressee(): string
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417MacroAddressee;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode addressee name.
     */
    public function setPdf417MacroAddressee(string $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroAddressee = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 file size.
     * @return int file size field contains the size in bytes of the entire source file.
     */
    public function getPdf417MacroFileSize(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417MacroFileSize;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 file size.
     * @param int $value The file size field contains the size in bytes of the entire source file.
     */
    public function setPdf417MacroFileSize(int $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroFileSize = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Gets macro Pdf417 barcode checksum.
     * @return int checksum field contains the value of the 16-bit (2 bytes) CRC checksum using the CCITT-16 polynomial.
     */
    public function getPdf417MacroChecksum(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417MacroChecksum;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Sets macro Pdf417 barcode checksum.
     * @param int $value The checksum field contains the value of the 16-bit (2 bytes) CRC checksum using the CCITT-16 polynomial.
     */
    public function setPdf417MacroChecksum(int $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroChecksum = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol. Not applied for Macro PDF417 text fields.
     * Current implementation consists all well known charset encodings.
     */
    public function getPdf417ECIEncoding(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417ECIEncoding;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol. Not applied for Macro PDF417 text fields.
     * Current implementation consists all well known charset encodings.
     */
    public function setPdf417ECIEncoding(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417ECIEncoding = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. Applies for Macro PDF417 text fields.
     */
    public function getPdf417MacroECIEncoding(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417MacroECIEncoding;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. Applies for Macro PDF417 text fields.
     */
    public function setPdf417MacroECIEncoding(int $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroECIEncoding = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Used to tell the encoder whether to add Macro PDF417 Terminator (codeword 922) to the segment.
     * Applied only for Macro PDF417.
     */
    public function getPdf417MacroTerminator(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->pdf417MacroTerminator;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Used to tell the encoder whether to add Macro PDF417 Terminator (codeword 922) to the segment.
     * Applied only for Macro PDF417.
     */
    public function setPdf417MacroTerminator(int $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->pdf417MacroTerminator = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization
     * @return
     */
    public function isReaderInitialization(): bool
    {
        try
        {
            return $this->getPdf417ParametersDto()->isReaderInitialization;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization
     * @param bool $value
     */
    public function setReaderInitialization(bool $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->isReaderInitialization = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Macro Characters 05 and 06 values are used to obtain more compact encoding in special modes.
     * Can be used only with MicroPdf417 and encodes 916 and 917 MicroPdf417 modes
     * Default value: MacroCharacters.None.
     * </p><p><hr><blockquote><pre>
     * These samples show how to encode Macro Characters in MicroPdf417
     * <pre>
     * @code
     * # Encodes MicroPdf417 with 05 Macro the string: "[)>\u001E05\u001Dabcde1234\u001E\u0004"
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "abcde1234");
     * $generator->getParameters()->getBarcode()->getPdf417()->setMacroCharacters(MacroCharacter::MACRO_05);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *     echo $result->getCodeText();
     * @endcode
     *
     * @code
     * # Encodes MicroPdf417 with 06 Macro the string: "[)>\u001E06\u001Dabcde1234\u001E\u0004"
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "abcde1234");
     * $generator->getParameters()->getBarcode()->getPdf417()->setMacroCharacters(MacroCharacter::MACRO_06);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *     echo $result->getCodeText());
     * @endcode
     * </pre>
     * </pre></blockquote></hr></p>
     */
    public function getMacroCharacters(): int
    {
        return $this->getPdf417ParametersDto()->macroCharacters;
    }

    /**
     * <p>
     * Macro Characters 05 and 06 values are used to obtain more compact encoding in special modes.
     * Can be used only with MicroPdf417 and encodes 916 and 917 MicroPdf417 modes
     * Default value: MacroCharacters.None.
     * </p><p><hr><blockquote><pre>
     * These samples show how to encode Macro Characters in MicroPdf417
     * <pre>
     * @code
     * # Encodes MicroPdf417 with 05 Macro the string: "[)>\u001E05\u001Dabcde1234\u001E\u0004"
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "abcde1234");
     * $generator->getParameters()->getBarcode()->getPdf417()->setMacroCharacters(MacroCharacter::MACRO_05);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *     echo $result->getCodeText();
     *
     * @endcode
     * @code
     *
     * # Encodes MicroPdf417 with 06 Macro the string: "[)>\u001E06\u001Dabcde1234\u001E\u0004"
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "abcde1234");
     * $generator->getParameters()->getBarcode()->getPdf417()->setMacroCharacters(MacroCharacter::MACRO_06);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *    echo $result->getCodeText();
     * @endcode
     * </pre>
     * </pre></blockquote></hr></p>
     */
    public function setMacroCharacters(int $value): void
    {
        $this->getPdf417ParametersDto()->macroCharacters = $value;
    }

    /**
     * <p>
     * Defines linked modes with GS1MicroPdf417, MicroPdf417 and Pdf417 barcodes
     * With GS1MicroPdf417 symbology encodes 906, 907, 912, 913, 914, 915 "Linked" UCC/EAN-128 modes
     * With MicroPdf417 and Pdf417 symbologies encodes 918 linkage flag to associated linear component other than an EAN.UCC
     * </p><p><hr><blockquote><pre>
     * These samples show how to encode "Linked" UCC/EAN-128 modes in GS1MicroPdf417 and Linkage Flag (918) in MicroPdf417 and Pdf417 barcodes
     * <pre>
     * @code
     * # Encodes GS1 Linked mode 912 with date field AI 11 (Production date) and AI 10 (Lot number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(11)991231(10)ABCD");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     *
     * @endcode
     * @code
     * # Encodes GS1 Linked mode 912 with date field AI 13 (Packaging date) and AI 21 (Serial number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(13)991231(21)ABCD");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     *
     * @endcode
     * @code
     * # Encodes GS1 Linked mode 912 with date field AI 15 (Sell-by date) and AI 10 (Lot number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(15)991231(10)ABCD");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     *
     * @endcode
     * @code
     * # Encodes GS1 Linked mode 912 with date field AI 17 (Expiration date) and AI 21 (Serial number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(17)991231(21)ABCD");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     *
     * @endcode
     * @code
     * # Encodes GS1 Linked mode 914 with AI 10 (Lot number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(10)ABCD12345");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     *
     * @endcode
     * @code
     * # Encodes GS1 Linked mode 915 with AI 21 (Serial number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(21)ABCD12345");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     *
     * @endcode
     * @code
     * # Encodes GS1 Linked modes 906, 907 with any AI
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(240)123456789012345");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     *
     * @endcode
     * @code
     * # Encodes MicroPdf417 NON EAN.UCC Linked mode 918
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "ABCDE123456789012345678");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     *
     * @endcode
     * @code
     * # Encodes Pdf417 NON EAN.UCC Linked mode 918
     * $generator = new BarcodeGenerator(EncodeTypes::PDF_417, "ABCDE123456789012345678");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     *
     * @endcode
     * </pre>
     * </pre></blockquote></hr></p>
     */
    public function isLinked(): bool
    {
        return $this->getPdf417ParametersDto()->isLinked;
    }

    /**
     * <p>
     * Defines linked modes with GS1MicroPdf417, MicroPdf417 and Pdf417 barcodes
     * With GS1MicroPdf417 symbology encodes 906, 907, 912, 913, 914, 915 "Linked" UCC/EAN-128 modes
     * With MicroPdf417 and Pdf417 symbologies encodes 918 linkage flag to associated linear component other than an EAN.UCC
     * </p><p><hr><blockquote><pre>
     * These samples show how to encode "Linked" UCC/EAN-128 modes in GS1MicroPdf417 and Linkage Flag (918) in MicroPdf417 and Pdf417 barcodes
     * <pre>
     *
     * @code
     * # Encodes GS1 Linked mode 912 with date field AI 11 (Production date) and AI 10 (Lot number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(11)991231(10)ABCD");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     * # Encodes GS1 Linked mode 912 with date field AI 13 (Packaging date) and AI 21 (Serial number)
     * @endcode
     * @code
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(13)991231(21)ABCD");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     * @endcode
     * @code
     * # Encodes GS1 Linked mode 912 with date field AI 15 (Sell-by date) and AI 10 (Lot number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(15)991231(10)ABCD");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     * @endcode
     * @code
     * # Encodes GS1 Linked mode 912 with date field AI 17 (Expiration date) and AI 21 (Serial number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(17)991231(21)ABCD");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     * @endcode
     * @code
     * # Encodes GS1 Linked mode 914 with AI 10 (Lot number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(10)ABCD12345");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     * @endcode
     * @code
     * # Encodes GS1 Linked mode 915 with AI 21 (Serial number)
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(21)ABCD12345");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     * @endcode
     * @code
     * # Encodes GS1 Linked modes 906, 907 with any AI
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_MICRO_PDF_417, "(240)123456789012345");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     * @endcode
     * @code
     * # Encodes MicroPdf417 NON EAN.UCC Linked mode 918
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "ABCDE123456789012345678");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     * @endcode
     * @code
     * # Encodes Pdf417 NON EAN.UCC Linked mode 918
     * $generator = new BarcodeGenerator(EncodeTypes::PDF_417, "ABCDE123456789012345678");
     * $generator->getParameters()->getBarcode()->getPdf417()->setLinked(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *         echo $result->getCodeText() . " IsLinked:" . $result->getExtended()->getPdf417()->isLinked();
     * @endcode
     * </pre>
     * </pre></blockquote></hr></p>
     */
    public function setLinked(bool $value): void
    {
        $this->getPdf417ParametersDto()->isLinked = $value;
    }

    /**
     * <p>
     * Can be used only with MicroPdf417 and encodes Code 128 emulation modes
     * Can encode FNC1 in second position modes 908 and 909, also can encode 910 and 911 which just indicate that recognized MicroPdf417 can be interpret as Code 128
     * </p><p><hr><blockquote><pre>
     * These samples show how to encode Code 128 emulation modes with FNC1 in second position and without. In this way MicroPdf417 can be decoded as Code 128 barcode
     * <pre>
     *
     * @code
     * # Encodes MicroPdf417 in Code 128 emulation mode with FNC1 in second position and Application Indicator "a", mode 908.
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "a\u001d1222322323");
     * $generator->getParameters()->getBarcode()->getPdf417()->setCode128Emulation(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *     echo $result->getCodeText() . " IsCode128Emulation:" . $result->getExtended()->getPdf417()->isCode128Emulation();
     * @endcode
     * @code
     * # Encodes MicroPdf417 in Code 128 emulation mode with FNC1 in second position and Application Indicator "99", mode 909.
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "99\u001d1222322323");
     * $generator->getParameters()->getBarcode()->getPdf417()->setCode128Emulation(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *     echo $result->getCodeText() . " IsCode128Emulation:" . $result->getExtended()->getPdf417()->isCode128Emulation();
     * @endcode
     * @code
     * # Encodes MicroPdf417 in Code 128 emulation mode, modes 910, 911
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "123456789012345678");
     * $generator->getParameters()->getBarcode()->getPdf417()->setCode128Emulation(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *     echo $result->getCodeText() . " IsCode128Emulation:" + result.Extended.Pdf417.IsCode128Emulation().toString());
     * @endcode
     * </pre>
     * </pre></blockquote></hr></p>
     */
    public function isCode128Emulation(): bool
    {
        return $this->getPdf417ParametersDto()->isCode128Emulation;
    }

    /**
     * <p>
     * Can be used only with MicroPdf417 and encodes Code 128 emulation modes
     * Can encode FNC1 in second position modes 908 and 909, also can encode 910 and 911 which just indicate that recognized MicroPdf417 can be interpret as Code 128
     * </p><p><hr><blockquote><pre>
     * These samples show how to encode Code 128 emulation modes with FNC1 in second position and without. In this way MicroPdf417 can be decoded as Code 128 barcode
     * <pre>
     *
     * @code
     * # Encodes MicroPdf417 in Code 128 emulation mode with FNC1 in second position and Application Indicator "a", mode 908.
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "a\u001d1222322323");
     * $generator->getParameters()->getBarcode()->getPdf417()->setCode128Emulation(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *     echo $result->getCodeText() . " IsCode128Emulation:" + result.Extended.Pdf417.IisCode128Emulation().toString());
     * @endcode
     * @code
     * # Encodes MicroPdf417 in Code 128 emulation mode with FNC1 in second position and Application Indicator "99", mode 909.
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "99\u001d1222322323");
     * $generator->getParameters()->getBarcode()->getPdf417()->setCode128Emulation(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *     echo $result->getCodeText() . " IsCode128Emulation:" . $result->getExtended()->getPdf417()->isCode128Emulation();
     * @endcode
     * @code
     * # Encodes MicroPdf417 in Code 128 emulation mode, modes 910, 911
     * $generator = new BarcodeGenerator(EncodeTypes::MICRO_PDF_417, "123456789012345678");
     * $generator->getParameters()->getBarcode()->getPdf417()->setCode128Emulation(true);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::MICRO_PDF_417);
     * foreach($reader->readBarCodes() as $result)
     *    echo $result->getCodeText() . " IsCode128Emulation:" . $result->getExtended()->getPdf417()->isCode128Emulation()));
     * @endcode
     * </pre>
     * </pre></blockquote></hr></p>
     */
    public function setCode128Emulation(bool $value): void
    {
        $this->getPdf417ParametersDto()->isCode128Emulation = $value;
    }

    /**
     * Returns a human-readable string representation of this Pdf417Parameters.
     *
     * @return string that represents this Pdf417Parameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->Pdf417Parameters_toString($this->getPdf417ParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}