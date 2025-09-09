<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Alternative payment scheme instructions
 */
final class AlternativeScheme implements Communicator
{
    private $alternativeSchemeDto;

    /**
     * @return mixed
     */
    public function getAlternativeSchemeDto(): \Aspose\Barcode\Bridge\AlternativeSchemeDTO
    {
        return $this->alternativeSchemeDto;
    }

    /**
     * @param mixed $alternativeSchemeDto
     */
    public function setAlternativeSchemeDto(\Aspose\Barcode\Bridge\AlternativeSchemeDTO $alternativeSchemeDto): void
    {
        $this->alternativeSchemeDto = $alternativeSchemeDto;
    }

    public function __construct($instruction)
    {
        try
        {
            $this->alternativeSchemeDto = new \Aspose\Barcode\Bridge\AlternativeSchemeDTO();
            $this->alternativeSchemeDto->instruction = $instruction;
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($javaClass)
    {
        try
        {
            $phpClass = new AlternativeScheme("");
            $phpClass->setAlternativeSchemeDto($javaClass);
            return $phpClass;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function obtainDto(...$args)
    {

    }

    public function initFieldsFromDto()
    {
    }

    /**
     * Gets the payment instruction for a given bill.
     *
     * The instruction consists of a two letter abbreviation for the scheme, a separator characters
     * and a sequence of parameters(separated by the character at index 2).
     *
     * Value: The payment instruction.
     */
    public function getInstruction(): string
    {
        try
        {
            return $this->getAlternativeSchemeDto()->instruction;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the payment instruction for a given bill.
     * The instruction consists of a two letter abbreviation for the scheme, a separator characters
     * and a sequence of parameters(separated by the character at index 2).
     * Value: The payment instruction.
     */
    public function setInstruction(string $value): void
    {
        try
        {
            $this->getAlternativeSchemeDto()->instruction = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines whether the specified object is equal to the current object.
     * @param AlternativeScheme $obj The object to compare with the current object.
     * @return bool true if the specified object is equal to the current object; otherwise, false.
     */
    public function equals(AlternativeScheme $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->AlternativeScheme_equals($this->getAlternativeSchemeDto(), $obj->getAlternativeSchemeDto());
        $thriftConnection->closeConnection();
        return $isEquals;
    }
}