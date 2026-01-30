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
     * Gets a Codabar start symbol.
     * Default value: CodabarSymbol.A
     * </p>
     * @return a Codabar start symbol.
     */
    public function getStartSymbol() : int
    {
        return $this->getCodabarExtendedParametersDTO()->startSymbol;
    }

    /**
     * <p>
     * Sets a Codabar start symbol.
     * Default value: CodabarSymbol.A
     * </p>
     * @param value a Codabar start symbol.
     */
    public function setStartSymbol(int $value): void
    {
        $this->getCodabarExtendedParametersDTO()->startSymbol = $value;
    }

    /**
     * <p>
     * Gets or sets a Codabar start symbol.
     * Default value: CodabarSymbol.A
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStartSymbol().
     */
    public function getCodabarStartSymbol(): int
    {
        return $this->getCodabarExtendedParametersDTO()->startSymbol;
    }

    /**
     * <p>
     * Gets or sets a Codabar start symbol.
     * Default value: CodabarSymbol.A
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setStartSymbol().
     */
    public function setCodabarStartSymbol(int $value): void
    {
        $this->getCodabarExtendedParametersDTO()->startSymbol = $value;
    }

    /**
     * <p>
     * Gets a Codabar stop symbol.
     * Default value: CodabarSymbol.A
     * </p>
     * @return a Codabar stop symbol.
     */
    public function getStopSymbol(): int
    {
        return $this->getCodabarExtendedParametersDTO()->stopSymbol;
    }

    /**
     * <p>
     * Sets a Codabar stop symbol.
     * Default value: CodabarSymbol.A
     * </p>
     * @param value a Codabar stop symbol.
     */
    public function setStopSymbol(int $value): void
    {
        $this->getCodabarExtendedParametersDTO()->stopSymbol = $value;
    }

    /**
     * <p>
     * Gets or sets a Codabar stop symbol.
     * Default value: CodabarSymbol.A
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStopSymbol().
     */
    public function getCodabarStopSymbol(): int
    {
        return $this->getCodabarExtendedParametersDTO()->stopSymbol;
    }

    /**
     * <p>
     * Gets or sets a Codabar stop symbol.
     * Default value: CodabarSymbol.A
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setStopSymbol().
     */
    public function setCodabarStopSymbol(int $value): void
    {
        $this->getCodabarExtendedParametersDTO()->stopSymbol = $value;
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