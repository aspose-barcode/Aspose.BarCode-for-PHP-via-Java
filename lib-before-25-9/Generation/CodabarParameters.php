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
     * Get the checksum algorithm for Codabar barcodes.
     * Default value: CodabarChecksumMode::MOD_16.
     * To enable checksum calculation set value EnableChecksum::YES to property EnableChecksum.
     * @see CodabarChecksumMode.
     */
    public function getCodabarChecksumMode(): int
    {
        try
        {
            return $this->getCodabarParametersDto()->codabarChecksumMode;
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
     */
    public function setCodabarChecksumMode(int $value): void
    {
        try
        {
            $this->getCodabarParametersDto()->codabarChecksumMode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Start symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function getCodabarStartSymbol(): int
    {
        try
        {
            return $this->getCodabarParametersDto()->codabarStartSymbol;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Start symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
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
     * Stop symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function getCodabarStopSymbol(): int
    {
        try
        {
            return $this->getCodabarParametersDto()->codabarStopSymbol;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Stop symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function setCodabarStopSymbol(int $value): void
    {
        try
        {
            $this->getCodabarParametersDto()->codabarStopSymbol = $value;
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