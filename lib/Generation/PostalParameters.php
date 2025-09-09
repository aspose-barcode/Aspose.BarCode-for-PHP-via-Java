<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\PostalParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;
use Aspose\Barcode\Generation\Unit;

/**
 *
 * Postal parameters. Used for Postnet, Planet.
 */
class PostalParameters implements Communicator
{
    private $postalParametersDto;

    private function getPostalParametersDto(): PostalParametersDTO
    {
        return $this->postalParametersDto;
    }

    private function setPostalParametersDto(PostalParametersDTO $postalParametersDto): void
    {
        $this->postalParametersDto = $postalParametersDto;
    }

    private $postalShortBarHeight;

    function __construct(PostalParametersDTO $postalParametersDto)
    {
        $this->postalParametersDto = $postalParametersDto;
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
            $this->postalShortBarHeight = new Unit($this->getPostalParametersDto()->postalShortBarHeight);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Short bar's height of Postal barcodes.
     */
    public function getPostalShortBarHeight(): Unit
    {
        try
        {
            return $this->postalShortBarHeight;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Short bar's height of Postal barcodes.
     */
    public function setPostalShortBarHeight(Unit $value): void
    {
        try
        {
            $this->getPostalParametersDto()->postalShortBarHeight = $value->getUnitDto();
            $this->postalShortBarHeight = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this PostalParameters.
     *
     * @return string A string that represents this PostalParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->PostalParameters_toString($this->getPostalParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}