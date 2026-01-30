<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\CodabarParametersDTO;
use Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Codabar parameters.
 */
class CodabarParameters implements Communicator
{
    private $codabarParametersDto;

    private function getCodabarParametersDto(): CodabarParametersDTO
    {
        return $this->codabarParametersDto;
    }

    private function setCodabarParametersDto(CodabarParametersDTO $codabarParametersDto): void
    {
        $this->codabarParametersDto = $codabarParametersDto;
    }

    function __construct(CodabarParametersDTO $codabarParametersDto)
    {
        $this->codabarParametersDto = $codabarParametersDto;
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
     * Get the checksum algorithm for Codabar barcodes.
     * Default value: CodabarChecksumMode.Mod16.
     * To enable checksum calculation set value EnableChecksum.Yes to property EnableChecksum.
     * See {@code ChecksumMode}({@link #getChecksumMode}/{@link #setChecksumMode}).
     * </p>
     * @return the checksum algorithm for Codabar barcodes.
     */
    public function getChecksumMode(): int
    {
        return $this->getCodabarParametersDto()->checksumMode;
    }

    /**
     * <p>
     * Set the checksum algorithm for Codabar barcodes.
     * Default value: CodabarChecksumMode.Mod16.
     * To enable checksum calculation set value EnableChecksum.Yes to property EnableChecksum.
     * See {@code ChecksumMode}({@link #getChecksumMode}/{@link #setChecksumMode}).
     * </p>
     * @param value the checksum algorithm for Codabar barcodes.
     */
    public function setChecksumMode(int $value) : void
    {
        $this->getCodabarParametersDto()->checksumMode = $value;
    }

    /**
     * Get the checksum algorithm for Codabar barcodes.
     * Default value: CodabarChecksumMode::MOD_16.
     * To enable checksum calculation set value EnableChecksum::YES to property EnableChecksum.
     * @see CodabarChecksumMode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getChecksumMode().
     */
    public function getCodabarChecksumMode(): int
    {
        try
        {
            return $this->getCodabarParametersDto()->checksumMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Set the checksum algorithm for Codabar barcodes.
     * Default value: CodabarChecksumMode::MOD_16.
     * To enable checksum calculation set value EnableChecksum::YES to property EnableChecksum.
     * @see CodabarChecksumMode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setChecksumMode().
     */
    public function setCodabarChecksumMode(int $value): void
    {
        try
        {
            $this->getCodabarParametersDto()->checksumMode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
    /**
     * <p>
     * Start symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function getStartSymbol(): int
    {
        return $this->getCodabarParametersDto()->startSymbol;
    }

    /**
     * <p>
     * Start symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function setStartSymbol(int $value) : void
    {
        $this->getCodabarParametersDto()->startSymbol = $value;
    }

    /**
     * Start symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStartSymbol().
     */
    public function getCodabarStartSymbol(): int
    {
        try
        {
            return $this->getCodabarParametersDto()->startSymbol;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Start symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setStartSymbol().
     */
    public function setCodabarStartSymbol(int $value): void
    {
        try
        {
            $this->getCodabarParametersDto()->codabarStartSymbol = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
    /**
     * <p>
     * Stop symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function getStopSymbol(): int
    {
        return $this->getCodabarParametersDto()->stopSymbol;
    }

    /**
     * <p>
     * Stop symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function setStopSymbol(int $value): void
    {
        $this->getCodabarParametersDto()->stopSymbol = $value;
    }

    /**
     * Stop symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStopSymbol().
     */
    public function getCodabarStopSymbol(): int
    {
        try
        {
            return $this->getCodabarParametersDto()->stopSymbol;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Stop symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setStopSymbol().
     */
    public function setCodabarStopSymbol(int $value): void
    {
        try
        {
            $this->getCodabarParametersDto()->stopSymbol = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this CodabarParameters.
     *
     * @return string that represents this CodabarParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->CodabarParameters_toString($this->getCodabarParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}