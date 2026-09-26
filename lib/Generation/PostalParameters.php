<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\PostalParametersDTO;
use Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

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

    private $shortBarHeight;

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
            $this->shortBarHeight = new Unit($this->getPostalParametersDto()->shortBarHeight);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Short bar's height of Postal barcodes.
     * </p>
     */
    public function getShortBarHeight() : Unit
    {
        return $this->shortBarHeight;
    }

    /**
     * <p>
     * Short bar's height of Postal barcodes.
     * </p>
     */
    public function setShortBarHeight( Unit $value) : void
    {
        $this->shortBarHeight = $value;
        $this->getPostalParametersDto()->shortBarHeight = $value->getUnitDto();
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