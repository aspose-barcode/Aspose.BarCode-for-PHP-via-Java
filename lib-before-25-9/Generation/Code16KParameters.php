<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\Code16KParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Code16K parameters.
 */
class Code16KParameters implements Communicator
{
    private $code16KParametersDto;

    private function getCode16KParametersDto(): Code16KParametersDTO
    {
        return $this->code16KParametersDto;
    }

    private function setCode16KParametersDto(Code16KParametersDTO $code16KParametersDto): void
    {
        $this->code16KParametersDto = $code16KParametersDto;
    }

    function __construct(Code16KParametersDTO $code16KParametersDto)
    {
        $this->code16KParametersDto = $code16KParametersDto;
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
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return $this->getCode16KParametersDto()->aspectRatio;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio($value): void
    {
        try
        {
            $this->getCode16KParametersDto()->aspectRatio = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the left quiet zone in xDimension.
     * Default value: 10, meaning if xDimension = 2px than left quiet zone will be 20px.
     */
    public function getQuietZoneLeftCoef(): int
    {
        try
        {
            return $this->getCode16KParametersDto()->quietZoneLeftCoef;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the left quiet zone in xDimension.
     * Default value: 10, meaning if xDimension = 2px than left quiet zone will be 20px.
     */
    public function setQuietZoneLeftCoef(int $value): void
    {
        try
        {
            $this->getCode16KParametersDto()->quietZoneLeftCoef = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the right quiet zone in xDimension.
     * Default value: 1, meaning if xDimension = 2px than right quiet zone will be 2px.
     */
    public function getQuietZoneRightCoef(): int
    {
        try
        {
            return $this->getCode16KParametersDto()->quietZoneRightCoef;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the right quiet zone in xDimension.
     * Default value: 1, meaning if xDimension = 2px than right quiet zone will be 2px.
     */
    public function setQuietZoneRightCoef(int $value): void
    {
        try
        {
            $this->getCode16KParametersDto()->quietZoneRightCoef = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this Code16KParameters.
     *
     * @return string A string that represents this Code16KParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->Code16KParameters_toString($this->getCode16KParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}