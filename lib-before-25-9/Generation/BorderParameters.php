<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\BorderParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Generation\Unit;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Barcode image border parameters
 */
class BorderParameters implements Communicator
{
    private $borderParametersDto;

    private function getBorderParametersDto(): BorderParametersDTO
    {
        return $this->borderParametersDto;
    }

    private function setBorderParametersDto(BorderParametersDTO $borderParametersDto): void
    {
        $this->borderParametersDto = $borderParametersDto;
    }

    private $width;

    function __construct(BorderParametersDTO $borderParametersDto)
    {
        $this->borderParametersDto = $borderParametersDto;
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
            $this->width = new Unit($this->getBorderParametersDto()->width);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border visibility. If false than parameter Width is always ignored (0).
     * Default value: false.
     */
    public function getVisible(): bool
    {
        try
        {
            return $this->getBorderParametersDto()->visible;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border visibility. If false than parameter Width is always ignored (0).
     * Default value: false.
     */
    public function setVisible(bool $value): void
    {
        try
        {
            $this->getBorderParametersDto()->visible = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border width.
     * Default value: 0.
     * Ignored if Visible is set to false.
     */
    public function getWidth(): Unit
    {
        return $this->width;
    }

    /**
     * Border width.
     * Default value: 0.
     * Ignored if Visible is set to false.
     *public
     */
    public function setWidth(Unit $value): void
    {
        try
        {
            $this->getBorderParametersDto()->width = $value->getUnitDto();
            $this->width = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this BorderParameters.
     *
     * @return string A string that represents this BorderParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->BorderParameters_toString($this->getBorderParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }

    /**
     * Border dash style.
     * Default value: BorderDashStyle::SOLID.
     */
    public function getDashStyle(): int
    {
        try
        {
            return $this->getBorderParametersDto()->dashStyle;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border dash style.
     * Default value: BorderDashStyle::SOLID.
     */
    public function setDashStyle(int $value): void
    {
        try
        {
            $this->getBorderParametersDto()->dashStyle = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border color.
     * Default value: #000000
     */
    public function getColor(): string
    {
        try
        {
            $hexColor = strtoupper(dechex($this->getBorderParametersDto()->color));
            while (strlen($hexColor) < 6)
            {
                $hexColor = "0" . $hexColor;
            }
            $hexColor = "#" . $hexColor;
            return $hexColor;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border color.
     * Default value: #000000
     */
    public function setColor(string $hexValue): void
    {
        try
        {
            if (substr($hexValue, 0, 1) == '#')
                $hexValue = substr($hexValue, 1, strlen($hexValue) - 1);
            $this->getBorderParametersDto()->color = hexdec($hexValue);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}