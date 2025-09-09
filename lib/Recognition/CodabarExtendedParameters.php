<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\CodabarExtendedParametersDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * <p>
 * Stores a Codabar additional information of recognized barcode
 * </p>
 */
class CodabarExtendedParameters implements Communicator
{
    private CodabarExtendedParametersDTO $codabarExtendedParametersDTO;

    /**
     * @return CodabarExtendedParametersDTO instance
     */
    private function getCodabarExtendedParametersDTO(): CodabarExtendedParametersDTO
    {
        return $this->codabarExtendedParametersDTO;
    }

    /**
     * @param $codabarExtendedParametersDTO
     */
    private function setCodabarExtendedParametersDTO($codabarExtendedParametersDTO): void
    {
        $this->codabarExtendedParametersDTO = $codabarExtendedParametersDTO;
    }

    function __construct(CodabarExtendedParametersDTO $codabarExtendedParametersDTO)
    {
        $this->codabarExtendedParametersDTO = $codabarExtendedParametersDTO;
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
     * <p>
     * Gets or sets a Codabar start symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function getCodabarStartSymbol(): int
    {
        return $this->getCodabarExtendedParametersDTO()->codabarStartSymbol;
    }

    /**
     * <p>
     * Gets or sets a Codabar start symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function setCodabarStartSymbol(int $value): void
    {
        $this->getCodabarExtendedParametersDTO()->codabarStartSymbol = $value;
    }

    /**
     * <p>
     * Gets or sets a Codabar stop symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function getCodabarStopSymbol(): int
    {
        return $this->getCodabarExtendedParametersDTO()->codabarStopSymbol;
    }

    /**
     * <p>
     * Gets or sets a Codabar stop symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function setCodabarStopSymbol(int $value): void
    {
        $this->getCodabarExtendedParametersDTO()->codabarStopSymbol = $value;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code AztecExtendedParameters} value.
     * </p>
     * @param CodabarExtendedParameters $obj
     * @return bool ```php
     */
    public function equals(CodabarExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->CodabarExtendedParameters_equals($this->getCodabarExtendedParametersDTO(), $obj->getCodabarExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code AztecExtendedParameters}.
     * </p>
     * @return string that represents this {@code AztecExtendedParameters}.
     */
    public function toString(): string
    {
        return $this->getCodabarExtendedParametersDTO()->toString;
    }
}