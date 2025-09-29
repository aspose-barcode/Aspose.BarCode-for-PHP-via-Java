<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\SupplementParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Supplement parameters. Used for Interleaved2of5, Standard2of5, EAN13, EAN8, UPCA, UPCE, ISBN, ISSN, ISMN.
 */
class SupplementParameters implements Communicator
{
    private $supplementParametersDto;

    private function getSupplementParametersDto(): SupplementParametersDTO
    {
        return $this->supplementParametersDto;
    }

    private function setSupplementParametersDto(SupplementParametersDTO $supplementParametersDto): void
    {
        $this->supplementParametersDto = $supplementParametersDto;
    }

    private $_space;

    function __construct(SupplementParametersDTO $supplementParametersDto)
    {
        $this->supplementParametersDto = $supplementParametersDto;
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
            $this->_space = new Unit($this->getSupplementParametersDto()->supplementSpace);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Supplement data following BarCode.
     */
    public function getSupplementData(): ?string
    {
        try
        {
            $SupplementData = $this->getSupplementParametersDto()->supplementData;
            if ($SupplementData == "null")
            {
                return null;
            }
            return $SupplementData;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Supplement data following BarCode.
     */
    public function setSupplementData(string $value): void
    {
        try
        {
            $this->getSupplementParametersDto()->supplementData = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Space between main the BarCode and supplement BarCode in Unit value.
     *
     * @exception IllegalArgumentException
     * The Space parameter value is less than 0.
     */
    public function getSupplementSpace(): Unit
    {
        return $this->_space;
    }

    /**
     * Returns a human-readable string representation of this SupplementParameters.
     *
     * @return string that represents this SupplementParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->SupplementParameters_toString($this->getSupplementParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}