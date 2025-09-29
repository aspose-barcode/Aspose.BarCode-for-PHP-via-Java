<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Bridge\HIBCPASRecordDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * <p>
 * Class for storing HIBC PAS record.
 * </p>
 */
class HIBCPASRecord implements Communicator
{
    private $HIBCPASRecordDto;

    /**
     * @return mixed
     */
    public function getHIBCPASRecordDto()
    {
        return $this->HIBCPASRecordDto;
    }

    /**
     * @param mixed $HIBCPASRecordDto
     */
    public function setHIBCPASRecordDto($HIBCPASRecordDto): void
    {
        $this->HIBCPASRecordDto = $HIBCPASRecordDto;
    }

    /**
     * <p>
     * HIBCPASRecord constructor
     * </p>
     *
     * @param int dataType Type of data.
     * @param string data
     */
    function __construct(int $dataType, string $data)
    {
        $this->HIBCPASRecordDto = new HIBCPASRecordDTO();
        $this->HIBCPASRecordDto->dataType = $dataType;
        $this->HIBCPASRecordDto->data = $data;
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * HIBCPASRecord constructor
     * </p>
     */
    static function construct($javaClass): HIBCPASRecord
    {
        $obj = new HIBCPASRecord(0, "");
        $obj->setHIBCPASRecordDto($javaClass);
        return $obj;
    }

    public function obtainDto(...$args)
    {

    }

    public function initFieldsFromDto()
    {
    }

    /**
     * <p>
     * Identifies data type.
     * </p>
     */
    public function getDataType(): int
    {
        return $this->getHIBCPASRecordDto()->dataType;
    }

    /**
     * <p>
     * Identifies data type.
     * </p>
     */
    public function setDataType(int $value): void
    {
        $this->getHIBCPASRecordDto()->setDataType = $value;
    }

    /**
     * <p>
     * Identifies data.
     * </p>
     */
    public function getData(): string
    {
        return $this->getHIBCPASRecordDto()->data;
    }

    /**
     * <p>
     * Identifies data.
     * </p>
     */
    public function setData(string $value): void
    {
        $this->getHIBCPASRecordDto()->setData = $value;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCPASDataType} value.
     * </p>
     *
     * @param HIBCPASRecord obj An {@code HIBCPASDataType} value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(HIBCPASRecord $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->HIBCPASRecord_equals($this->getHIBCPASRecordDto(), $obj->getHIBCPASRecordDto());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}