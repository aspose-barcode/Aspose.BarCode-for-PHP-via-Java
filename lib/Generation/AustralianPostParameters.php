<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\AustralianPostParametersDTO;
use Aspose\Barcode\Exception;
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

    private $australianPostShortBarHeight;

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
            $this->australianPostShortBarHeight = new Unit($this->getAustralianPostParametersDto()->australianPostShortBarHeight);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Short bar's height of AustralianPost barcode.
     */
    public function getAustralianPostShortBarHeight(): Unit
    {
        try
        {
            return $this->australianPostShortBarHeight;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Short bar's height of AustralianPost barcode.
     */
    public function setAustralianPostShortBarHeight(Unit $value): void
    {
        try
        {
            $this->getAustralianPostParametersDto()->australianPostShortBarHeight = $value->getUnitDto();
            $this->australianPostShortBarHeight = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Interpreting type for the Customer Information of AustralianPost, default to CustomerInformationInterpretingType.Other"
     */
    public function getAustralianPostEncodingTable(): int
    {
        try
        {
            return $this->getAustralianPostParametersDto()->australianPostEncodingTable;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Interpreting type for the Customer Information of AustralianPost, default to CustomerInformationInterpretingType.Other"
     */
    public function setAustralianPostEncodingTable(int $value): void
    {
        try
        {
            $this->getAustralianPostParametersDto()->australianPostEncodingTable = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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