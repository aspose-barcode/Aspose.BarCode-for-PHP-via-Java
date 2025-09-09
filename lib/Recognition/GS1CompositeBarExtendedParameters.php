<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\GS1CompositeBarExtendedParametersDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * <p>
 * Stores special data of {@code <b>GS1 Composite Bar</b>} recognized barcode
 * </p>
 */
class GS1CompositeBarExtendedParameters implements Communicator
{
    private GS1CompositeBarExtendedParametersDTO $gs1CompositeBarExtendedParameters;

    /**
     * @return GS1CompositeBarExtendedParametersDTO instance
     */
    private function getGS1CompositeBarExtendedParametersDTO(): GS1CompositeBarExtendedParametersDTO
    {
        return $this->gs1CompositeBarExtendedParameters;
    }

    /**
     * @param $gs1CompositeBarExtendedParameters
     */
    private function setGS1CompositeBarExtendedParametersDTO($gs1CompositeBarExtendedParameters): void
    {
        $this->gs1CompositeBarExtendedParameters = $gs1CompositeBarExtendedParameters;
    }

    function __construct(GS1CompositeBarExtendedParametersDTO $gs1CompositeBarExtendedParameters)
    {
        $this->gs1CompositeBarExtendedParameters = $gs1CompositeBarExtendedParameters;
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
     * <p>Gets the 1D (linear) barcode type of GS1 Composite</p>Value: 2D barcode type
     */
    public function getOneDType(): int
    {
        return $this->getGS1CompositeBarExtendedParametersDTO()->oneDType;
    }

    /**
     * <p>Gets the 1D (linear) barcode value of GS1 Composite</p>Value: 1D barcode value
     */
    public function getOneDCodeText(): string
    {
        return $this->getGS1CompositeBarExtendedParametersDTO()->oneDCodeText;
    }

    /**
     * <p>Gets the 2D barcode type of GS1 Composite</p>Value: 2D barcode type
     */
    public function getTwoDType(): int
    {
        return $this->getGS1CompositeBarExtendedParametersDTO()->twoDType;
    }

    /**
     * <p>Gets the 2D barcode value of GS1 Composite</p>Value: 2D barcode value
     */
    public function getTwoDCodeText(): string
    {
        return $this->getGS1CompositeBarExtendedParametersDTO()->twoDCodeText;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code GS1CompositeBarExtendedParameters} value.
     * </p>
     * @param GS1CompositeBarExtendedParameters $obj
     * @return bool ```php
     */
    public function equals(GS1CompositeBarExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->GS1CompositeBarExtendedParameters_equals($this->getGS1CompositeBarExtendedParametersDTO(), $obj->getGS1CompositeBarExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code GS1CompositeBarExtendedParameters}.
     * </p>
     * @return string that represents this {@code GS1CompositeBarExtendedParameters}.
     */
    public function toString(): string
    {
        return $this->getGS1CompositeBarExtendedParametersDTO()->toString;
    }
}