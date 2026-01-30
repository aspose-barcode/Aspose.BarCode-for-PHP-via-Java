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

    private $borderThickness;

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
            $this->borderThickness = new Unit($this->getITFParametersDto()->borderThickness);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Gets an ITF border (bearer bar) thickness in Unit value.
     * Default value: 12pt.
     * </p>
     * @return an ITF border (bearer bar) thickness in Unit value.
     */
    public function getBorderThickness() : Unit
    {
        return $this->borderThickness;
    }

    /**
     * <p>
     * Sets an ITF border (bearer bar) thickness in Unit value.
     * Default value: 12pt.
     * </p>
     * @param value an ITF border (bearer bar) thickness in Unit value.
     */
    public function setBorderThickness(Unit $value): void
    {
        $this->itfBorderThickness = $value;
        $this->getITFParametersDto()->borderThickness = $value->getUnitDto();
    }

    /**
     * Gets an ITF border (bearer bar) thickness in Unit value.
     * Default value: 12pt.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getBorderThickness().
     */
    public function getItfBorderThickness(): Unit
    {
        return $this->borderThickness;
    }

    /**
     * Sets an ITF border (bearer bar) thickness in Unit value.
     * Default value: 12pt.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setBorderThickness().
     */
    public function setItfBorderThickness(Unit $value): void
    {
        try
        {
            $this->getITFParametersDto()->borderThickness = $value->getUnitDto();
            $this->borderThickness = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Border type of ITF barcode.
     * Default value: ITF14BorderType.Bar.
     * </p>
     */
    public function getBorderType(): int
    {
        return $this->getITFParametersDto()->borderType;
    }

    /**
     * <p>
     * Border type of ITF barcode.
     * Default value: ITF14BorderType.Bar.
     * </p>
     */
    public function setBorderType(int $value): void
    {
        $this->getITFParametersDto()->borderType = $value;
    }

    /**
     * Border type of ITF barcode.
     * Default value: ITF14BorderType::BAR.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getBorderType().
     */
    public function getItfBorderType(): int
    {
        try
        {
            return $this->getITFParametersDto()->borderType;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border type of ITF barcode.
     * Default value: ITF14BorderType::BAR.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setBorderType().
     */
    public function setItfBorderType(int $value): void
    {
        try
        {
            $this->getITFParametersDto()->borderType = $value;
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