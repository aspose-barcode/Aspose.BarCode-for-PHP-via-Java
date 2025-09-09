<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\DataMatrixParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * DataMatrix parameters.
 */
class DataMatrixParameters implements Communicator
{
    private $dataMatrixParametersDto;

    private function getDataMatrixParametersDto(): DataMatrixParametersDTO
    {
        return $this->dataMatrixParametersDto;
    }

    private function setDataMatrixParametersDto(DataMatrixParametersDTO $dataMatrixParametersDto): void
    {
        $this->dataMatrixParametersDto = $dataMatrixParametersDto;
    }

    function __construct(DataMatrixParametersDTO $dataMatrixParametersDto)
    {
        $this->dataMatrixParametersDto = $dataMatrixParametersDto;
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
     * <p>
     * Gets a Datamatrix symbol size.
     * Default value: DataMatrixVersion.Auto.
     * </p>
     */
    public function getDataMatrixVersion(): int
    {
        return $this->getDataMatrixParametersDto()->dataMatrixVersion;
    }

    /**
     * <p>
     * Sets a Datamatrix symbol size.
     * Default value: DataMatrixVersion.Auto.
     * </p>
     */
    public function setDataMatrixVersion(int $value)
    {
        $this->getDataMatrixParametersDto()->dataMatrixVersion = $value;
    }

    /**
     * Gets a Datamatrix ECC type.
     * Default value: DataMatrixEccType::ECC_200.
     */
    public function getDataMatrixEcc(): int
    {
        try
        {
            return $this->getDataMatrixParametersDto()->dataMatrixEcc;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets a Datamatrix ECC type.
     * Default value: DataMatrixEccType::ECC_200.
     */
    public function setDataMatrixEcc(int $value): void
    {
        try
        {
            $this->getDataMatrixParametersDto()->dataMatrixEcc = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode::AUTO.
     */
    public function getDataMatrixEncodeMode(): int
    {
        try
        {
            return $this->getDataMatrixParametersDto()->dataMatrixEncodeMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode::AUTO.
     */
    public function setDataMatrixEncodeMode(int $value): void
    {
        try
        {
            $this->getDataMatrixParametersDto()->dataMatrixEncodeMode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Barcode ID for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function getStructuredAppendBarcodeId(): int
    {
        return $this->getDataMatrixParametersDto()->structuredAppendBarcodeId;
    }

    /**
     * <p>
     * Barcode ID for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function setStructuredAppendBarcodeId(int $value): void
    {
        $this->getDataMatrixParametersDto()->structuredAppendBarcodeId = $value;
    }

    /**
     * <p>
     * Barcodes count for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function getStructuredAppendBarcodesCount(): int
    {
        return $this->getDataMatrixParametersDto()->structuredAppendBarcodesCount;
    }

    /**
     * <p>
     * Barcodes count for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function setStructuredAppendBarcodesCount(int $value): void
    {
        $this->getDataMatrixParametersDto()->structuredAppendBarcodesCount = $value;
    }

    /**
     * <p>
     * File ID for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function getStructuredAppendFileId(): int
    {
        return $this->getDataMatrixParametersDto()->structuredAppendFileId;
    }

    /**
     * <p>
     * File ID for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function setStructuredAppendFileId(int $value): void
    {
        $this->getDataMatrixParametersDto()->structuredAppendFileId = $value;
    }

    /**
     * <p>
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization.
     * Default value: false
     * </p>
     */
    public function isReaderProgramming(): bool
    {
        return $this->getDataMatrixParametersDto()->isReaderProgramming;
    }

    /**
     * <p>
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization.
     * Default value: false
     * </p>
     */
    public function setReaderProgramming(bool $value): void
    {
        $this->getDataMatrixParametersDto()->isReaderProgramming = $value;
    }

    /**
     * ISO/IEC 16022
     * 5.2.4.7 Macro characters
     * 11.3 Protocol for Macro characters in the first position (ECC 200 only)
     * Macro Characters 05 and 06 values are used to obtain more compact encoding in special modes.
     * Can be used only with DataMatrixEccType.Ecc200 or DataMatrixEccType.EccAuto.
     * Cannot be used with EncodeTypes::GS_1_DATA_MATRIX
     * Default value: MacroCharacter::NONE.
     */
    public function getMacroCharacters(): int
    {
        try
        {
            return $this->getDataMatrixParametersDto()->macroCharacters;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * ISO/IEC 16022
     * 5.2.4.7 Macro characters
     * 11.3 Protocol for Macro characters in the first position (ECC 200 only)
     * Macro Characters 05 and 06 values are used to obtain more compact encoding in special modes.
     * Can be used only with DataMatrixEccType.Ecc200 or DataMatrixEccType.EccAuto.
     * Cannot be used with EncodeTypes::GS_1_DATA_MATRIX
     * Default value: MacroCharacter::NONE.
     */
    public function setMacroCharacters(int $value): void
    {
        try
        {
            $this->getDataMatrixParametersDto()->macroCharacters = $value;
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
            return $this->getDataMatrixParametersDto()->columns;
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
            $this->getDataMatrixParametersDto()->columns = $value;
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
            return $this->getDataMatrixParametersDto()->rows;
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
            $this->getDataMatrixParametersDto()->rows = $value;
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
            return $this->getDataMatrixParametersDto()->aspectRatio;
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
            $this->getDataMatrixParametersDto()->aspectRatio = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Gets ECI encoding. Used when DataMatrixEncodeMode is Auto.
     * Default value: ISO-8859-1
     * </p>
     */
    public function getECIEncoding(): int
    {
        return $this->getDataMatrixParametersDto()->eCIEncoding;
    }

    /**
     * <p>
     * Sets ECI encoding. Used when DataMatrixEncodeMode is Auto.
     * Default value: ISO-8859-1
     * </p>
     */
    public function setECIEncoding(int $value): void
    {
        $this->getDataMatrixParametersDto()->eCIEncoding = $value;
    }

    /**
     * Returns a human-readable string representation of this DataMatrixParameters.
     *
     * @return string presentation of this DataMatrixParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->DataMatrixParameters_toString($this->getDataMatrixParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }

}