<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\MaxiCodeExtendedParametersDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Stores a MaxiCode additional information of recognized barcode
 */
class MaxiCodeExtendedParameters implements Communicator
{
    private MaxiCodeExtendedParametersDTO $maxiCodeExtendedParametersDTO;

    /**
     * @return MaxiCodeExtendedParametersDTO instance
     */
    private function getMaxiCodeExtendedParametersDTO(): MaxiCodeExtendedParametersDTO
    {
        return $this->maxiCodeExtendedParametersDTO;
    }

    /**
     * @param $maxiCodeExtendedParametersDTO
     */
    private function setMaxiCodeExtendedParametersDTO($maxiCodeExtendedParametersDTO): void
    {
        $this->maxiCodeExtendedParametersDTO = $maxiCodeExtendedParametersDTO;
    }

    function __construct(MaxiCodeExtendedParametersDTO $maxiCodeExtendedParametersDTO)
    {
        $this->maxiCodeExtendedParametersDTO = $maxiCodeExtendedParametersDTO;
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
     * Gets a MaxiCode encode mode.
     * Default value: Mode4
     * </p>
     * @return a MaxiCode encode mode.
     */
    public function getMode(): int
    {
        return $this->getMaxiCodeExtendedParametersDTO()->mode;
    }

    /**
     * <p>
     * Gets a MaxiCode barcode id in structured append mode.
     * Default value: 0
     * </p>
     * @return a MaxiCode barcode id in structured append mode.
     */
    public function getStructuredAppendModeBarcodeId(): int
    {
        return $this->getMaxiCodeExtendedParametersDTO()->structuredAppendModeBarcodeId;
    }

    /**
     * <p>
     * Gets a MaxiCode barcodes count in structured append mode.
     * Default value: -1
     * </p>
     * @return a MaxiCode barcodes count in structured append mode.
     */
    public function getStructuredAppendModeBarcodesCount(): int
    {
        return $this->getMaxiCodeExtendedParametersDTO()->structuredAppendModeBarcodesCount;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified MaxiCodeExtendedParameters value.
     * @param MaxiCodeExtendedParameters $obj An System.Object value to compare to this instance.
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals(MaxiCodeExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->MaxiCodeExtendedParameters_equals($this->getMaxiCodeExtendedParametersDTO(), $obj->getMaxiCodeExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this MaxiCodeExtendedParameters.
     * @return string A string that represents this MaxiCodeExtendedParameters.
     */
    public function toString(): string
    {
        return $this->getMaxiCodeExtendedParametersDTO()->toString;
    }
}