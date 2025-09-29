<?php

namespace Aspose\Barcode\ComplexBarcode;

use DateTime;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * <p>
 * Class for storing HIBC LIC secondary and additional data.
 * </p>
 */
class SecondaryAndAdditionalData implements Communicator
{
    private $secondaryAndAdditionalDataDto;

    /**
     * @return mixed
     */
    public function getSecondaryAndAdditionalDataDto()
    {
        return $this->secondaryAndAdditionalDataDto;
    }

    /**
     * @param mixed $secondaryAndAdditionalDataDto
     */
    public function setSecondaryAndAdditionalDataDto($secondaryAndAdditionalDataDto): void
    {
        $this->secondaryAndAdditionalDataDto = $secondaryAndAdditionalDataDto;
    }

    function __construct()
    {
        $this->secondaryAndAdditionalDataDto = $this->obtainDto();
        $this->initFieldsFromDto();
    }

    static function construct($java_class): SecondaryAndAdditionalData
    {
        $obj = new SecondaryAndAdditionalData();
        $obj->setSecondaryAndAdditionalDataDto($java_class);
        $obj->initFieldsFromDto();
        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->SecondaryAndAdditionalData_ctor();
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * <p>
     * Identifies expiry date format.
     * </p>
     */
    public function getExpiryDateFormat(): int
    {
        return $this->getSecondaryAndAdditionalDataDto()->expiryDateFormat;
    }

    /**
     * <p>
     * Identifies expiry date format.
     * </p>
     */
    public function setExpiryDateFormat(int $value): void
    {
        $this->getSecondaryAndAdditionalDataDto()->expiryDateFormat = $value;
    }

    /**
     * <p>
     * Identifies expiry date. Will be used if ExpiryDateFormat is not set to None.
     * </p>
     */
    public function getExpiryDate(): DateTime
    {
        return new DateTime('@' . $this->getSecondaryAndAdditionalDataDto()->expiryDate);
    }

    /**
     * <p>
     * Identifies expiry date. Will be used if ExpiryDateFormat is not set to None.
     * </p>
     */
    public function setExpiryDate(DateTime $value): void
    {
        $this->getSecondaryAndAdditionalDataDto()->expiryDate = $value->getTimestamp() . "";
    }

    /**
     * <p>
     * Identifies lot or batch number. Lot/batch number must be alphanumeric string with up to 18 sybmols length. .
     * </p>
     */
    public function getLotNumber(): string
    {
        return $this->getSecondaryAndAdditionalDataDto()->lotNumber;
    }

    /**
     * <p>
     * Identifies lot or batch number. Lot/batch number must be alphanumeric string with up to 18 sybmols length. .
     * </p>
     */
    public function setLotNumber(?string $value): void
    {
        if ($value == null)
            $value = "null";
        $this->getSecondaryAndAdditionalDataDto()->lotNumber = $value;
    }

    /**
     * <p>
     * Identifies serial number. Serial number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function getSerialNumber(): string
    {
        return $this->getSecondaryAndAdditionalDataDto()->serialNumber;
    }

    /**
     * <p>
     * Identifies serial number. Serial number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function setSerialNumber(?string $value): void
    {
        if ($value == null)
            $value = "null";
        $this->getSecondaryAndAdditionalDataDto()->serialNumber = $value;
    }

    /**
     * <p>
     * Identifies date of manufacture.
     * Date of manufacture can be set to DateTime.MinValue in order not to use this field.
     * Default value: DateTime.MinValue
     * </p>
     */
    public function getDateOfManufacture(): DateTime
    {
        return new DateTime('@' . $this->getSecondaryAndAdditionalDataDto()->dateOfManufacture);
    }

    /**
     * <p>
     * Identifies date of manufacture.
     * Date of manufacture can be set to DateTime.MinValue in order not to use this field.
     * Default value: DateTime.MinValue
     * </p>
     */
    public function setDateOfManufacture(DateTime $value): void
    {
        $this->getSecondaryAndAdditionalDataDto()->dateOfManufacture = ($value->getTimestamp() . "");
    }

    /**
     * <p>
     * Identifies quantity, must be integer value from 0 to 500.
     * Quantity can be set to -1 in order not to use this field.
     * Default value: -1
     * </p>
     */
    public function getQuantity(): int
    {
        return $this->getSecondaryAndAdditionalDataDto()->quantity;
    }

    /**
     * <p>
     * Identifies quantity, must be integer value from 0 to 500.
     * Quantity can be set to -1 in order not to use this field.
     * Default value: -1
     * </p>
     */
    public function setQuantity(int $value): void
    {
        $this->getSecondaryAndAdditionalDataDto()->quantity = $value;
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
        $str = $client->SecondaryAndAdditionalData_toString($this->getSecondaryAndAdditionalDataDto());
        $thriftConnection->closeConnection();
        return $str;
    }

    /**
     * <p>
     * Instantiates secondary and additional supplemental data from string format according HIBC LIC specification.
     * </p>
     *
     * @param string secondaryDataCodetext Formatted string.
     */
    public function parseFromString(string $secondaryDataCodetext): void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $secondaryAndAdditionalDataDTO = $client->SecondaryAndAdditionalData_parseFromString($this->getSecondaryAndAdditionalDataDto(), $secondaryDataCodetext);
        $thriftConnection->closeConnection();
        $this->setSecondaryAndAdditionalDataDto($secondaryAndAdditionalDataDTO);
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code SecondaryAndAdditionalData} value.
     * </p>
     *
     * @param SecondaryAndAdditionalData obj An {@code SecondaryAndAdditionalData} value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(SecondaryAndAdditionalData $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->SecondaryAndAdditionalData_equals($this->getSecondaryAndAdditionalDataDto(), $obj->getSecondaryAndAdditionalDataDto());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}