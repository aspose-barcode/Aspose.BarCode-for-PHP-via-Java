<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\DataBarParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Databar parameters.
 */
class DataBarParameters implements Communicator
{
    private $dataBarParametersDto;

    private function getDataBarParametersDto(): DataBarParametersDTO
    {
        return $this->dataBarParametersDto;
    }

    private function setDataBarParametersDto(DataBarParametersDTO $dataBarParametersDto): void
    {
        $this->dataBarParametersDto = $dataBarParametersDto;
    }

    function __construct(DataBarParametersDTO $dataBarParametersDto)
    {
        $this->dataBarParametersDto = $dataBarParametersDto;
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
     * Enables flag of 2D composite component with DataBar barcode
     */
    public function is2DCompositeComponent(): bool
    {
        try
        {
            return $this->getDataBarParametersDto()->is2DCompositeComponent;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Enables flag of 2D composite component with DataBar barcode
     */
    public function set2DCompositeComponent(bool $value): void
    {
        try
        {
            $this->getDataBarParametersDto()->is2DCompositeComponent = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * If this flag is set, it allows only GS1 encoding standard for Databar barcode types
     */
    public function isAllowOnlyGS1Encoding(): bool
    {
        try
        {
            return $this->getDataBarParametersDto()->isAllowOnlyGS1Encoding;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * If this flag is set, it allows only GS1 encoding standard for Databar barcode types
     */
    public function setAllowOnlyGS1Encoding(bool $value): void
    {
        try
        {
            $this->getDataBarParametersDto()->isAllowOnlyGS1Encoding = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function getColumns(): int
    {
        try
        {
            return $this->getDataBarParametersDto()->columns;
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
            $this->getDataBarParametersDto()->columns = $value;
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
            return $this->getDataBarParametersDto()->rows;
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
            $this->getDataBarParametersDto()->rows = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     * Used for DataBar stacked.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return $this->getDataBarParametersDto()->aspectRatio;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     * Used for DataBar stacked.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getDataBarParametersDto()->aspectRatio = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this DataBarParameters.
     *
     * @return string that represents this DataBarParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->DataBarParameters_toString($this->getDataBarParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}