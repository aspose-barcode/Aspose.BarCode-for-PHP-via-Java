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
     * Gets a MaxiCode encode mode.
     *  Default value: Mode4
     */
    public function getMaxiCodeMode(): int
    {
        return $this->getMaxiCodeExtendedParametersDTO()->maxiCodeMode;
    }

    /**
     * Sets a MaxiCode encode mode.
     *  Default value: Mode4
     */
    public function setMaxiCodeMode(int $maxiCodeMode): void
    {
        $this->getMaxiCodeExtendedParametersDTO()->maxiCodeMode = $maxiCodeMode;
    }

    /**
     * Gets a MaxiCode barcode id in structured append mode.
     * Default value: 0
     */
    public function getMaxiCodeStructuredAppendModeBarcodeId(): int
    {
        return $this->getMaxiCodeExtendedParametersDTO()->maxiCodeStructuredAppendModeBarcodeId;
    }

    /**
     * Sets a MaxiCode barcode id in structured append mode.
     * Default value: 0
     */
    public function setMaxiCodeStructuredAppendModeBarcodeId(int $value): void
    {
        $this->getMaxiCodeExtendedParametersDTO()->maxiCodeStructuredAppendModeBarcodeId = $value;
    }

    /**
     * Gets a MaxiCode barcodes count in structured append mode.
     * Default value: -1
     */
    public function getMaxiCodeStructuredAppendModeBarcodesCount(): int
    {
        return $this->getMaxiCodeExtendedParametersDTO()->maxiCodeStructuredAppendModeBarcodesCount;
    }

    /**
     * Sets a MaxiCode barcodes count in structured append mode.
     * Default value: -1
     */
    public function setMaxiCodeStructuredAppendModeBarcodesCount(int $value): void
    {
        $this->getMaxiCodeExtendedParametersDTO()->maxiCodeStructuredAppendModeBarcodesCount = $value;
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