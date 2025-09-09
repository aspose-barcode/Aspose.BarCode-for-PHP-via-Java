<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\Pdf417ExtendedParametersDTO;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;
use DateTime;
use Exception;

/**
 *
 * Stores a MacroPdf417 metadata information of recognized barcode
 *
 * This sample shows how to get Macro Pdf417 metadata
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::MacroPdf417, "12345");
 * $generator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroFileID(10);
 * $generator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentsCount(2);
 * $generator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentID(1);
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::MACRO_PDF_417);
 * foreach($reader->readBarCodes() as $result)
 * {
 *     print("BarCode Type: ".$result->getCodeTypeName());
 *     print("BarCode CodeText: ".$result->getCodeText());
 *     print("Macro Pdf417 FileID: ".$result->getExtended()->getPdf417()->getMacroPdf417FileID());
 *     print("Macro Pdf417 Segments: ".$result->getExtended()->getPdf417()->getMacroPdf417SegmentsCount());
 *     print("Macro Pdf417 SegmentID: ".$result->getExtended()->getPdf417()->getMacroPdf417SegmentID());
 * }
 * @endcode
 */
final class Pdf417ExtendedParameters implements Communicator
{
    private Pdf417ExtendedParametersDTO $pdf417ExtendedParametersDTO;

    /**
     * @return Pdf417ExtendedParametersDTO instance
     */
    private function getPdf417ExtendedParametersDTO(): Pdf417ExtendedParametersDTO
    {
        return $this->pdf417ExtendedParametersDTO;
    }

    /**
     * @param $pdf417ExtendedParametersDTO
     */
    private function setQRExtendedParametersDTO($pdf417ExtendedParametersDTO): void
    {
        $this->pdf417ExtendedParametersDTO = $pdf417ExtendedParametersDTO;
    }

    function __construct(Pdf417ExtendedParametersDTO $pdf417ExtendedParametersDTO)
    {
        $this->pdf417ExtendedParametersDTO = $pdf417ExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the file ID of the barcode, only available with MacroPdf417.Value: The file ID for MacroPdf417
     */
    public function getMacroPdf417FileID(): string
    {
        try
        {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417FileID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the segment ID of the barcode,only available with MacroPdf417.Value: The segment ID of the barcode.
     */
    public function getMacroPdf417SegmentID(): int
    {
        try
        {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417SegmentID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro pdf417 barcode segments count. Default value is -1.Value: Segments count.
     */
    public function getMacroPdf417SegmentsCount(): int
    {
        try
        {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417SegmentsCount;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 file name (optional).
     * @return string File name.
     */
    public function getMacroPdf417FileName(): string
    {
        try
        {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417FileName;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 file size (optional).
     * @return int File size.
     */
    public function getMacroPdf417FileSize(): int
    {
        try
        {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417FileSize;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 sender name (optional).
     * @return string Sender name
     */
    public function getMacroPdf417Sender(): string
    {
        try
        {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417Sender;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 addressee name (optional).
     * @return string Addressee name.
     */
    public function getMacroPdf417Addressee(): string
    {
        try
        {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417Addressee;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 time stamp (optional).
     * @return DateTime Time stamp.
     */
    public function getMacroPdf417TimeStamp(): DateTime
    {
        try
        {
            return new DateTime('@' . $this->getPdf417ExtendedParametersDTO()->macroPdf417TimeStamp);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 checksum (optional).
     * @return int Checksum.
     */
    public function getMacroPdf417Checksum(): int
    {
        try
        {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417Checksum;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Indicates whether the segment is the last segment of a Macro PDF417 file.
     */
    public function getMacroPdf417Terminator(): bool
    {
        try
        {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417Terminator;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>Used to instruct the reader to interpret the data contained within the symbol as programming for reader initialization.</p>Value: Reader initialization flag
     */
    public function isReaderInitialization(): bool
    {
        return $this->getPdf417ExtendedParametersDTO()->isReaderInitialization;
    }

    /**
     * <p>Flag that indicates that the barcode must be linked to 1D barcode.</p>Value: Linkage flag
     */
    public function isLinked(): bool
    {
        return $this->getPdf417ExtendedParametersDTO()->isLinked;
    }

    /**
     * Flag that indicates that the MicroPdf417 barcode encoded with 908, 909, 910 or 911 Code 128 emulation codewords.
     * @return bool 128 emulation flag
     */
    public function isCode128Emulation(): bool
    {
        return $this->getPdf417ExtendedParametersDTO()->isCode128Emulation;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Pdf417ExtendedParameters value.
     *
     * @param Pdf417ExtendedParameters $obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(Pdf417ExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->Pdf417ExtendedParameters_equals($this->getPdf417ExtendedParametersDTO(), $obj->getPdf417ExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this Pdf417ExtendedParameters.
     * @return string A string that represents this Pdf417ExtendedParameters.
     * @throws BarcodeException
     */
    public function toString(): string
    {
        try
        {
            return $this->getPdf417ExtendedParametersDTO()->toString;// TODO implement
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

}