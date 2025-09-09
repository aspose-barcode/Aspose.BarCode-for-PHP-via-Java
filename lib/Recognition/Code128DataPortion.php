<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\Code128DataPortionDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Contains the data of subtype for Code128 type barcode
 */
class Code128DataPortion implements Communicator
{
    private Code128DataPortionDTO $code128DataPortionDTO;

    /**
     * @return Code128DataPortionDTO instance
     */
    private function getCode128DataPortionDTO(): Code128DataPortionDTO
    {
        return $this->code128DataPortionDTO;
    }

    /**
     * @param $code128DataPortionDTO
     */
    private function setCode128DataPortionDTO($code128DataPortionDTO): void
    {
        $this->code128DataPortionDTO = $code128DataPortionDTO;
    }

    function __construct(Code128DataPortionDTO $code128DataPortionDTO)
    {
        $this->code128DataPortionDTO = $code128DataPortionDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the part of code text related to subtype.
     *
     * @return string The part of code text related to subtype
     */
    public final function getData(): string
    {
        try
        {
            return $this->getCode128DataPortionDTO()->data;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the type of Code128 subset
     *
     * @return int The type of Code128 subset
     */
    public final function getCode128SubType(): int
    {
        try
        {
            return $this->getCode128DataPortionDTO()->code128SubType;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this {Code128DataPortion}.
     * @return string A string that represents this {Code128DataPortion}.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->Code128DataPortion_toString($this->getCode128DataPortionDTO());
        $thriftConnection->closeConnection();

        return $str;
    }
}