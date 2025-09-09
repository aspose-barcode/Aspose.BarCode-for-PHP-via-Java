<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\CodablockParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Codablock parameters.
 */
class CodablockParameters implements Communicator
{
    private $codablockParametersDto;

    private function getCodablockParametersDto(): CodablockParametersDTO
    {
        return $this->codablockParametersDto;
    }

    private function setCodablockParametersDto(CodablockParametersDTO $codablockParametersDto): void
    {
        $this->codablockParametersDto = $codablockParametersDto;
    }

    function __construct(CodablockParametersDTO $codablockParametersDto)
    {
        $this->codablockParametersDto = $codablockParametersDto;
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
     * Columns count.
     */
    public function getColumns(): int
    {
        try
        {
            return $this->getCodablockParametersDto()->columns;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function setColumns(int $value): void
    {
        try
        {
            $this->getCodablockParametersDto()->columns = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function getRows(): int
    {
        try
        {
            return $this->getCodablockParametersDto()->rows;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function setRows(int $value): void
    {
        try
        {
            $this->getCodablockParametersDto()->rows = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return $this->getCodablockParametersDto()->aspectRatio;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getCodablockParametersDto()->aspectRatio = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this CodablockParameters.
     *
     * @return string that represents this CodablockParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->CodablockParameters_toString($this->getCodablockParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}