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