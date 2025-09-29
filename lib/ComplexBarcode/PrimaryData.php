<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * <p>
 * Class for storing HIBC LIC primary data.
 * </p>
 */
class PrimaryData implements Communicator
{
    private $primaryDataDto;

    /**
     * @return mixed
     */
    public function getPrimaryDataDto()
    {
        return $this->primaryDataDto;
    }

    /**
     * @param mixed $PrimaryDataDto
     */
    public function setPrimaryDataDto($primaryDataDto): void
    {
        $this->primaryDataDto = $primaryDataDto;
    }

    function __construct()
    {
        $this->primaryDataDto = $this->obtainDto();
        $this->initFieldsFromDto();
    }

    static function construct($java_class): PrimaryData
    {
        $obj = new PrimaryData();
        $obj->setPrimaryDataDto($java_class);
        $obj->initFieldsFromDto();
        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->PrimaryData_ctor();
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * <p>
     * Identifies date of labeler identification code.
     * Labeler identification code must be 4 symbols alphanumeric string, with first character always being alphabetic.
     * </p>
     */
    public function getLabelerIdentificationCode(): string
    {
        return $this->getPrimaryDataDto()->labelerIdentificationCode;
    }

    /**
     * <p>
     * Identifies date of labeler identification code.
     * Labeler identification code must be 4 symbols alphanumeric string, with first character always being alphabetic.
     * </p>
     */
    public function setLabelerIdentificationCode(string $value): void
    {
        $this->getPrimaryDataDto()->labelerIdentificationCode = $value;
    }

    /**
     * <p>
     * Identifies product or catalog number. Product or catalog number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function getProductOrCatalogNumber(): string
    {
        return $this->getPrimaryDataDto()->productOrCatalogNumber;
    }

    /**
     * <p>
     * Identifies product or catalog number. Product or catalog number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function setProductOrCatalogNumber(string $value): void
    {
        $this->getPrimaryDataDto()->productOrCatalogNumber = $value;
    }

    /**
     * <p>
     * Identifies unit of measure ID. Unit of measure ID must be integer value from 0 to 9.
     * </p>
     */
    public function getUnitOfMeasureID(): int
    {
        return $this->getPrimaryDataDto()->unitOfMeasureID;
    }

    /**
     * <p>
     * Identifies unit of measure ID. Unit of measure ID must be integer value from 0 to 9.
     * </p>
     */
    public function setUnitOfMeasureID(int $value): void
    {
        $this->getPrimaryDataDto()->unitOfMeasureID = $value;
    }

    /**
     * <p>
     * Converts data to string format according HIBC LIC specification.
     * </p>
     *
     * @return string Formatted string.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->PrimaryData_toString($this->getPrimaryDataDto());
        $thriftConnection->closeConnection();

        return $str;
    }

    /**
     * <p>
     * Instantiates primary data from string format according HIBC LIC specification.
     * </p>
     *
     * @param primaryDataCodetext Formatted string.
     */
    public function parseFromString(string $primaryDataCodetext): void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $this->setPrimaryDataDto($client->PrimaryData_parseFromString($this->getPrimaryDataDto(), $primaryDataCodetext));
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();

    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code PrimaryData} value.
     * </p>
     *
     * @param obj An {@code PrimaryData} value to compare to this instance.
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     */
    public function equals(PrimaryData $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->PrimaryData_equals($this->getPrimaryDataDto(), $obj->getPrimaryDataDto());
        $thriftConnection->closeConnection();

        return $isEqual;
    }
}