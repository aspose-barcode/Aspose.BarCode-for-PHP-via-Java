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
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getEncodeMode().
     */
    public function getPdf417EncodeMode(): int
    {
        return $this->getPdf417ParametersDto()->encodeMode;
    }

    /**
     * Identifies Pdf417 encode mode.
     * Default value: Auto.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setEncodeMode().
     */
    public function setPdf417EncodeMode(int $value): void
    {
        $this->getPdf417ParametersDto()->encodeMode = $value;
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol. Not applied for Macro PDF417 text fields.
     * Current implementation consists all well known charset encodings.
     * </p>
     */
    public function getECIEncoding(): int
    {
        return $this->getPdf417ParametersDto()->eciEncoding;
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol. Not applied for Macro PDF417 text fields.
     * Current implementation consists all well known charset encodings.
     * </p>
     */
    public function setECIEncoding(int $value): void
    {
        $this->getPdf417ParametersDto()->eciEncoding = $value;
    }

    /**
     * <p>
     * Gets Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     * </p>
     * @return Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     */
    public function getErrorLevel(): int
    {
        return $this->getPdf417ParametersDto()->errorLevel;
    }

    /**
     * <p>
     * Sets Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     * </p>
     * @param value Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     */
    public function setErrorLevel(int $value): void
    {
        $this->getPdf417ParametersDto()->errorLevel = $value;
    }

    /**
     * Gets Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getErrorLevel().
     */
    public function getPdf417ErrorLevel(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->errorLevel;
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
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setErrorLevel().
     */
    public function setPdf417ErrorLevel(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->errorLevel = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    } /**
 * <p>
 * Whether Pdf417 symbology type of BarCode is truncated (to reduce space).
 * Also known as CompactPDF417. Rigth row indicator and right stop pattern are removed in this mode.
 * </p>
 */
    public function getTruncate(): bool
    {
        return $this->getPdf417ParametersDto()->truncate;
    }

    /**
     * <p>
     * Whether Pdf417 symbology type of BarCode is truncated (to reduce space).
     * Also known as CompactPDF417. Rigth row indicator and right stop pattern are removed in this mode.
     * </p>
     */
    public function setTruncate(bool $value): void
    {
        $this->getPdf417ParametersDto()->truncate = $value;
    }

    /**
     * Whether Pdf417 symbology type of BarCode is truncated (to reduce space).
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getTruncate().
     */
    public function getPdf417Truncate(): bool
    {
        try
        {
            return $this->getPdf417ParametersDto()->truncate;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Whether Pdf417 symbology type of BarCode is truncated (to reduce space).
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setTruncate().
     */
    public function setPdf417Truncate(bool $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->truncate = $value;
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
     * <p>
     * MacroPdf417 barcode's file ID (Required field).
     * MicroPDF417 barcode's file ID (Required field for Structured Append mode)
     * </p>
     */
    public function getMacroPdf417FileID(): int
    {
        return $this->getPdf417ParametersDto()->macroPdf417FileID;
    }

    /**
     * <p>
     * MacroPdf417 barcode's file ID (Required field).
     * MicroPDF417 barcode's file ID (Required field for Structured Append mode)
     * </p>
     */
    public function setMacroPdf417FileID(int $value): void
    {
        $this->getPdf417ParametersDto()->macroPdf417FileID = $value;
    }

    /**
     * Getsmacro Pdf417 barcode's file ID.
     * Used for MacroPdf417.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417FileID().
     */
    public function getPdf417MacroFileID(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->macroPdf417FileID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode's file ID.
     * Used for MacroPdf417.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417FileID().
     */
    public function setPdf417MacroFileID(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->macroPdf417FileID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * MacroPdf417 barcode's segment ID (Required field), which starts from 0, to MacroSegmentsCount - 1.
     * MicroPDF417 barcode's segment ID (Required field for Structured Append mode)
     * </p>
     */
     public function getMacroPdf417SegmentID(): int
    {
        return $this->getPdf417ParametersDto()->macroPdf417SegmentID;
    }

    /**
     * <p>
     * MacroPdf417 barcode's segment ID (Required field), which starts from 0, to MacroSegmentsCount - 1.
     * MicroPDF417 barcode's segment ID (Required field for Structured Append mode)
     * </p>
     */
    public function setMacroPdf417SegmentID(int $value): void
    {
        $this->getPdf417ParametersDto()->macroPdf417SegmentID = $value;
    }

    /**
     * Gets macro Pdf417 barcode's segment ID, which starts from 0, to MacroSegmentsCount - 1.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417SegmentID().
     */
    public function getPdf417MacroSegmentID(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->macroPdf417SegmentID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode's segment ID, which starts from 0, to MacroSegmentsCount - 1.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417SegmentID().
     */
    public function setPdf417MacroSegmentID(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->macroPdf417SegmentID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
    /**
     * <p>
     * MacroPdf417 barcode segments count (optional field).
     * MicroPDF417 barcode segments count (optional field for Structured Append mode)
     * </p>
     */
    public function getMacroPdf417SegmentsCount(): int
    {
        return $this->getPdf417ParametersDto()->macroPdf417SegmentsCount;
    }

    /**
     * <p>
     * MacroPdf417 barcode segments count (optional field).
     * MicroPDF417 barcode segments count (optional field for Structured Append mode)
     * </p>
     */
    public function setMacroPdf417SegmentsCount(int $value): void
    {
        $this->getPdf417ParametersDto()->macroPdf417SegmentsCount = $value;
    }

    /**
     * Gets macro Pdf417 barcode segments count.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417SegmentsCount().
     */
    public function getPdf417MacroSegmentsCount(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->macroPdf417SegmentsCount;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * MacroPdf417 barcode file name (optional field).
     * MicroPDF417 barcode file name (optional field for Structured Append mode)
     * </p>
     */
    public function getMacroPdf417FileName() : string
    {
        return $this->getPdf417ParametersDto()->macroPdf417FileName;
    }

    /**
     * <p>
     * MacroPdf417 barcode file name (optional field).
     * MicroPDF417 barcode file name (optional field for Structured Append mode)
     * </p>
     */
    public function setMacroPdf417FileName(string $value): void
    {
        $this->getPdf417ParametersDto()->macroPdf417FileName = $value;
    }

    /**
     * Sets macro Pdf417 barcode segments count.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417SegmentsCount().
     */
    public function setPdf417MacroSegmentsCount(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->macroPdf417SegmentsCount = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode file name.
     * @return
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417FileName().
     */
    public function getPdf417MacroFileName(): string
    {
        try
        {
            return $this->getPdf417ParametersDto()->macroPdf417FileName;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode file name.
     * @param string $value
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417FileName().
     */
    public function setPdf417MacroFileName(string $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->macroPdf417FileName = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * MacroPdf417 barcode time stamp (optional field).
     * MicroPDF417 barcode time stamp (optional field for Structured Append mode)
     * </p>
     */
    public function getMacroPdf417TimeStamp() : DateTime
    {
        try
        {
            return new DateTime('@' . $this->getPdf417ParametersDto()->macroPdf417TimeStamp);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * MacroPdf417 barcode time stamp (optional field).
     * MicroPDF417 barcode time stamp (optional field for Structured Append mode)
     * </p>
     */
    public function setMacroPdf417TimeStamp(DateTime $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->macroPdf417TimeStamp = $value->getTimestamp() . "";
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode time stamp.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417TimeStamp().
     */
    public function getPdf417MacroTimeStamp(): DateTime
    {
        try
        {
            return new DateTime('@' . $this->getPdf417ParametersDto()->macroPdf417TimeStamp);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode time stamp.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417TimeStamp().
     */
    public function setPdf417MacroTimeStamp(DateTime $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->macroPdf417TimeStamp = $value->getTimestamp() . "";
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * MacroPdf417 barcode sender name (optional field).
     * MicroPDF417 barcode sender name (optional field for Structured Append mode)
     * </p>
     */
    public function getMacroPdf417Sender(): string
    {
        return $this->getPdf417ParametersDto()->macroPdf417Sender;
    }

    /**
     * <p>
     * MacroPdf417 barcode sender name (optional field).
     * MicroPDF417 barcode sender name (optional field for Structured Append mode)
     * </p>
     */
    public function setMacroPdf417Sender(string $value): void
    {
        $this->getPdf417ParametersDto()->macroPdf417Sender = $value;
    }

    /**
     * Gets macro Pdf417 barcode sender name.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417Sender().
     */
    public function getPdf417MacroSender(): string
    {
        try
        {
            return $this->getPdf417ParametersDto()->macroPdf417Sender;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode sender name.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417Sender().
     */
    public function setPdf417MacroSender(string $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->macroPdf417Sender = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * MacroPdf417 barcode addressee name (optional field).
     * MicroPDF417 barcode addressee name (optional field for Structured Append mode)
     * </p>
     */
    public function getMacroPdf417Addressee() : string
    {
        return $this->getPdf417ParametersDto()->macroPdf417Addressee;
    }

    /**
     * <p>
     * MacroPdf417 barcode addressee name (optional field).
     * MicroPDF417 barcode addressee name (optional field for Structured Append mode)
     * </p>
     */
    public function setMacroPdf417Addressee(string $value): void
    {
        $this->getPdf417ParametersDto()->macroPdf417Addressee = $value;
    }

    /**
     * Gets macro Pdf417 barcode addressee name.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417Addressee().
     */
    public function getPdf417MacroAddressee(): string
    {
        try
        {
            return $this->getPdf417ParametersDto()->macroPdf417Addressee;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode addressee name.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417Addressee().
     */
    public function setPdf417MacroAddressee(string $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->macroPdf417Addressee = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * MacroPdf417 file size (optional field).
     * MicroPDF417 file size (optional field for Structured Append mode)
     * The file size field contains the size in bytes of the entire source file.
     * </p>
     */
    public function getMacroPdf417FileSize() : int
    {
        return $this->getPdf417ParametersDto()->macroPdf417FileSize;
    }

    /**
     * <p>
     * MacroPdf417 file size (optional field).
     * MicroPDF417 file size (optional field for Structured Append mode)
     * The file size field contains the size in bytes of the entire source file.
     * </p>
     */
    public function setMacroPdf417FileSize(int $value): void
    {
        $this->getPdf417ParametersDto()->macroPdf417FileSize = $value;
    }

    /**
     * Gets macro Pdf417 file size.
     * @return int file size field contains the size in bytes of the entire source file.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417FileSize().
     */
    public function getPdf417MacroFileSize(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->macroPdf417FileSize;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 file size.
     * @param int $value The file size field contains the size in bytes of the entire source file.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417FileSize().
     */
    public function setPdf417MacroFileSize(int $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->macroPdf417FileSize = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
    /**
     * <p>
     * MacroPdf417 barcode checksum (optional field).
     * MicroPDF417 barcode checksum (optional field for Structured Append mode)
     * The checksum field contains the value of the 16-bit (2 bytes) CRC checksum using the CCITT-16 polynomial. x^16 + x^12 + x^5 + 1
     * </p>
     */
    public function getMacroPdf417Checksum() : int
    {
        return $this->getPdf417ParametersDto()->macroPdf417Checksum;
    }

    /**
     * <p>
     * MacroPdf417 barcode checksum (optional field).
     * MicroPDF417 barcode checksum (optional field for Structured Append mode)
     * The checksum field contains the value of the 16-bit (2 bytes) CRC checksum using the CCITT-16 polynomial. x^16 + x^12 + x^5 + 1
     * </p>
     */
    public function setMacroPdf417Checksum(int $value): void
    {
        $this->getPdf417ParametersDto()->macroPdf417Checksum = $value;
    }

    /**
     *  Gets macro Pdf417 barcode checksum.
     * @return int checksum field contains the value of the 16-bit (2 bytes) CRC checksum using the CCITT-16 polynomial.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417Checksum().
     */
    public function getPdf417MacroChecksum(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->macroPdf417Checksum;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Sets macro Pdf417 barcode checksum.
     * @param int $value The checksum field contains the value of the 16-bit (2 bytes) CRC checksum using the CCITT-16 polynomial.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417Checksum().
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
     * <p>
     * Identifies Pdf417 encode mode.
     * Default value: Auto.
     * </p>
     */
    public function getEncodeMode() : int
    {
        return $this->getPdf417ParametersDto()->encodeMode;
    }

    /**
     * <p>
     * Identifies Pdf417 encode mode.
     * Default value: Auto.
     * </p>
     */
    public function setEncodeMode(int $value): void
    {
        $this->getPdf417ParametersDto()->encodeMode = $value;
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
            return $this->getPdf417ParametersDto()->eciEncoding;
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
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setECIEncoding().
     */
    public function setPdf417ECIEncoding(int $value): void
    {
        try
        {
            $this->getPdf417ParametersDto()->eciEncoding = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. Applies for Macro PDF417 text fields.
     * </p>
     */
    public function getMacroPdf417ECIEncoding(): int
    {
        return $this->getPdf417ParametersDto()->macroPdf417ECIEncoding;
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. Applies for Macro PDF417 text fields.
     * </p>
     */
    public function setMacroPdf417ECIEncoding(int $value): void
    {
        $this->getPdf417ParametersDto()->macroPdf417ECIEncoding = $value;
    }

    /**
     * Extended Channel Interpretation Identifiers. Applies for Macro PDF417 text fields.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417ECIEncoding().
     */
    public function getPdf417MacroECIEncoding(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->macroPdf417ECIEncoding;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. Applies for Macro PDF417 text fields.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417ECIEncoding().
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
     * <p>
     * Used to tell the encoder whether to add Macro PDF417 Terminator (codeword 922) to the segment.
     * Applied only for Macro PDF417.
     * </p>
     */
    public function getMacroPdf417Terminator(): int
    {
        return $this->getPdf417ParametersDto()->macroPdf417Terminator;
    }

    /**
     * <p>
     * Used to tell the encoder whether to add Macro PDF417 Terminator (codeword 922) to the segment.
     * Applied only for Macro PDF417.
     * </p>
     */
    public function setMacroPdf417Terminator(int $value): void
    {
        $this->getPdf417ParametersDto()->macroPdf417Terminator = $value;
    }

    /**
     * Used to tell the encoder whether to add Macro PDF417 Terminator (codeword 922) to the segment.
     * Applied only for Macro PDF417.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMacroPdf417Terminator().
     */
    public function getPdf417MacroTerminator(): int
    {
        try
        {
            return $this->getPdf417ParametersDto()->macroPdf417Terminator;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Used to tell the encoder whether to add Macro PDF417 Terminator (codeword 922) to the segment.
     * Applied only for Macro PDF417.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMacroPdf417Terminator().
     */
    public function setPdf417MacroTerminator(int $value)
    {
        try
        {
            $this->getPdf417ParametersDto()->macroPdf417Terminator = $value;
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