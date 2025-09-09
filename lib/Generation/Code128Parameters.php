<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\Code128ParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Code128 parameters.
 */
class Code128Parameters implements Communicator
{
    private $code128ParametersDto;

    private function getCode128ParametersDto(): Code128ParametersDTO
    {
        return $this->code128ParametersDto;
    }

    private function setCode128ParametersDto(Code128ParametersDTO $code128ParametersDto): void
    {
        $this->code128ParametersDto = $code128ParametersDto;
    }

    function __construct(Code128ParametersDTO $code128ParametersDto)
    {
        $this->code128ParametersDto = $code128ParametersDto;
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
     * <p>
     * Gets a Code128 encode mode.
     * Default value: Code128EncodeMode.Auto
     * </p>
     */
    public function getCode128EncodeMode(): int
    {
        try
        {
            return $this->getCode128ParametersDto()->code128EncodeMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Sets a Code128 encode mode.
     * Default value: Code128EncodeMode.Auto
     * </p>
     */
    public function setCode128EncodeMode(int $value)
    {
        try
        {
            $this->getCode128ParametersDto()->code128EncodeMode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this PatchCodeParameters.
     * @return string A string that represents this PatchCodeParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->Code128Parameters_toString($this->getCode128ParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}