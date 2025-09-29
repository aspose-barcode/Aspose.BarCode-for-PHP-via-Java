<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\ITFParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * ITF parameters.
 */
class ITFParameters implements Communicator
{
    private $itfParametersDto;

    private function getITFParametersDto(): ITFParametersDTO
    {
        return $this->itfParametersDto;
    }

    private function setITFParametersDto(ITFParametersDTO $itfParametersDto): void
    {
        $this->itfParametersDto = $itfParametersDto;
    }

    private $itfBorderThickness;

    function __construct(ITFParametersDTO $itfParametersDto)
    {
        $this->itfParametersDto = $itfParametersDto;
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
            $this->itfBorderThickness = new Unit($this->getITFParametersDto()->itfBorderThickness);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets an ITF border (bearer bar) thickness in Unit value.
     * Default value: 12pt.
     */
    public function getItfBorderThickness(): Unit
    {
        return $this->itfBorderThickness;
    }

    /**
     * Sets an ITF border (bearer bar) thickness in Unit value.
     * Default value: 12pt.
     */
    public function setItfBorderThickness(Unit $value): void
    {
        try
        {
            $this->getITFParametersDto()->itfBorderThickness = $value->getUnitDto();
            $this->itfBorderThickness = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border type of ITF barcode.
     * Default value: ITF14BorderType::BAR.
     */
    public function getItfBorderType(): int
    {
        try
        {
            return $this->getITFParametersDto()->itfBorderType;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border type of ITF barcode.
     * Default value: ITF14BorderType::BAR.
     */
    public function setItfBorderType(int $value): void
    {
        try
        {
            $this->getITFParametersDto()->itfBorderType = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the quiet zones in xDimension.
     * Default value: 10, meaning if xDimension = 2px than quiet zones will be 20px.
     *
     * @exception IllegalArgumentException
     * @return int The QuietZoneCoef parameter value is less than 10.
     */
    public function getQuietZoneCoef(): int
    {
        try
        {
            return $this->getITFParametersDto()->quietZoneCoef;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the quiet zones in xDimension.
     * Default value: 10, meaning if xDimension = 2px than quiet zones will be 20px.
     *
     * @exception IllegalArgumentException
     * @param int The QuietZoneCoef parameter value is less than 10.
     */
    public function setQuietZoneCoef(int $value): void
    {
        try
        {
            $this->getITFParametersDto()->quietZoneCoef = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this ITFParameters.
     *
     * @return string that represents this ITFParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->ITFParameters_toString($this->getITFParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}