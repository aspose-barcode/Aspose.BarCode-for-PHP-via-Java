<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\AustralianPostParametersDTO;
use Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * AustralianPost barcode parameters.
 */
class AustralianPostParameters implements Communicator
{
    private $australianPostParametersDto;

    private function getAustralianPostParametersDto(): AustralianPostParametersDTO
    {
        return $this->australianPostParametersDto;
    }

    private function setAustralianPostParametersDto(AustralianPostParametersDTO $australianPostParametersDto): void
    {
        $this->australianPostParametersDto = $australianPostParametersDto;
    }

    function __construct(AustralianPostParametersDTO $australianPostParametersDto)
    {
        $this->australianPostParametersDto = $australianPostParametersDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
        try
        {
            $this->shortBarHeight = new Unit($this->getAustralianPostParametersDto()->shortBarHeight);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
    /**
     * <p>
     * Short bar's height of AustralianPost barcode.
     * </p>
     */
    public function getShortBarHeight(): Unit
    {
        return $this->shortBarHeight;
    }

    /**
     * <p>
     * Short bar's height of AustralianPost barcode.
     * </p>
     */
    public function setShortBarHeight(Unit $value): void
    {
        $this->shortBarHeight = $value;
        $this->getAustralianPostParametersDto()->shortBarHeight = $value->getUnitDto();
    }

    /**
     * <p>
     * Interpreting type for the Customer Information of AustralianPost, default to CustomerInformationInterpretingType.Other"
     * </p>
     */
    public function getEncodingTable(): int
    {
        return $this->getAustralianPostParametersDto()->encodingTable;
    }

    /**
     * <p>
     * Interpreting type for the Customer Information of AustralianPost, default to CustomerInformationInterpretingType.Other"
     * </p>
     */
    public function setEncodingTable(int $value): void
    {
        $this->getAustralianPostParametersDto()->encodingTable = $value;
    }

    /**
     * Returns a human-readable string representation of this AustralianPostParameters.
     *
     * @return string A string that represents this AustralianPostParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->AustralianPostParameters_toString($this->getAustralianPostParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}