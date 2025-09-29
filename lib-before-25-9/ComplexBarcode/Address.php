<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Address of creditor or debtor.
 *
 * You can either set street, house number, postal code and town (type structured address)
 * or address line 1 and 2 (type combined address elements). The type is automatically set
 * once any of these fields is set. Before setting the fields, the address type is undetermined.
 * If fields of both types are set, the address type becomes conflicting.
 * Name and country code must always be set unless all fields are empty.
 */
final class Address implements Communicator
{
    private $addressDto;

    /**
     * @return mixed
     */
    public function getAddressDto(): \Aspose\Barcode\Bridge\AddressDTO
    {
        return $this->addressDto;
    }

    /**
     * @param mixed $addressDto
     */
    public function setAddressDto(\Aspose\Barcode\Bridge\AddressDTO $addressDto): void
    {
        $this->addressDto = $addressDto;
    }

    public function __construct()
    {
        $this->addressDto = new \Aspose\Barcode\Bridge\AddressDTO();
        $this->initFieldsFromDto();
    }

    /**
     * Constructs an Address object from AddressDTO.
     *
     * @param \Aspose\Barcode\Bridge\AddressDTO $addressDto
     * @return Address
     * @throws BarcodeException
     */
    static function construct(\Aspose\Barcode\Bridge\AddressDTO $addressDto)
    {
        try
        {
            $address = new Address();
            $address->setAddressDto($addressDto);
            return $address;
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
     * Gets the address type.
     *
     * The address type is automatically set by either setting street / house number
     * or address line 1 and 2. Before setting the fields, the address type is Undetermined.
     * If fields of both types are set, the address type becomes Conflicting.
     *
     * @return int The address type.
     */
    public function getType(): int
    {
        return $this->getAddressDto()->type;
    }

    /**
     * Gets the name, either the first and last name of a natural person or the
     * company name of a legal person.
     * @return string The name.
     */
    public function getName(): ?string
    {
        try
        {
            return $this->getAddressDto()->name;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the name, either the first and last name of a natural person or the
     * company name of a legal person.
     * @param string $value The name.
     */
    public function setName(?string $value): void
    {
        try
        {
            $this->getAddressDto()->name = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the address line 1.
     *
     * Address line 1 contains street name, house number or P.O. box.
     *
     *
     * Setting this field sets the address type to AddressType.CombinedElements unless it's already
     * AddressType.Structured, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for combined elements addresses and is optional.
     *
     * @return string The address line 1.
     */
    public function getAddressLine1(): ?string
    {
        try
        {
            return $this->getAddressDto()->addressLine1;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the address line 1.
     *
     * Address line 1 contains street name, house number or P.O. box.
     *
     * Setting this field sets the address type to AddressType.CombinedElements unless it's already
     * AddressType.Structured, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for combined elements addresses and is optional.
     *
     * @param string $value The address line 1.
     */
    public function setAddressLine1(?string $value): void
    {
        try
        {
            $this->getAddressDto()->addressLine1 = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the address line 2.
     * Address line 2 contains postal code and town.
     * Setting this field sets the address type to AddressType.CombinedElements unless it's already
     * AddressType.Structured, in which case it becomes AddressType.Conflicting.
     * This field is only used for combined elements addresses. For this type, it's mandatory.
     * @return string The address line 2.
     */
    public function getAddressLine2(): ?string
    {
        try
        {
            return $this->getAddressDto()->addressLine2;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the address line 2.
     * Address line 2 contains postal code and town.
     * Setting this field sets the address type to AddressType.CombinedElements unless it's already
     * AddressType.Structured, in which case it becomes AddressType.Conflicting.
     * This field is only used for combined elements addresses. For this type, it's mandatory.
     * @param string $value The address line 2.
     */
    public function setAddressLine2(?string $value): void
    {
        try
        {
            $this->getAddressDto()->addressLine2 = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the street.
     * The street must be speicfied without house number.
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     * This field is only used for structured addresses and is optional.
     * @return string The street.
     */
    public function getStreet(): ?string
    {
        return $this->getAddressDto()->street;
    }

    /**
     * Sets the street.
     *
     * The street must be speicfied without house number.
     *
     *
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses and is optional.
     *
     * @param string $value The street.
     */
    public function setStreet(?string $value): void
    {
        try
        {
            $this->getAddressDto()->street = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the house number.
     *
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses and is optional.
     *
     * @return string The house number.
     */
    public function getHouseNo(): ?string
    {
        return $this->getAddressDto()->houseNo;
    }

    /**
     * Sets the house number.
     *
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses and is optional.
     *
     * @param string $value The house number.
     */
    public function setHouseNo(?string $value): void
    {
        try
        {
            $this->getAddressDto()->houseNo = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the postal code.
     *
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses. For this type, it's mandatory.
     *
     * @param string The postal code.
     */
    public function getPostalCode(): ?string
    {
        try
        {
            return $this->getAddressDto()->postalCode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the postal code.
     *
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses. For this type, it's mandatory.
     *
     * @param string $value The postal code.
     */
    public function setPostalCode(?string $value): void
    {
        try
        {
            $this->getAddressDto()->postalCode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the town or city.
     *
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses. For this type, it's mandatory.
     *
     * @return string The town or city.
     */
    public function getTown(): ?string
    {
        try
        {
            return $this->getAddressDto()->town;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the town or city.
     *
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses. For this type, it's mandatory.
     *
     * @param string $value The town or city.
     */
    public function setTown(?string $value): void
    {
        try
        {
            $this->getAddressDto()->town = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the two-letter ISO country code.
     *
     * The country code is mandatory unless the entire address contains null or emtpy values.
     *
     * @return  string The ISO country code.
     */
    public function getCountryCode(): ?string
    {
        try
        {
            return $this->getAddressDto()->countryCode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the two-letter ISO country code.
     *
     * The country code is mandatory unless the entire address contains null or emtpy values.
     *
     * @param string $value The ISO country code.
     */
    public function setCountryCode(?string $value): void
    {
        try
        {
            $this->getAddressDto()->countryCode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Clears all fields and sets the type to AddressType.Undetermined.
     */
    public function clear(): void
    {
        try
        {
            $this->setName(null);
            $this->setAddressLine1(null);
            $this->setAddressLine2(null);
            $this->setStreet(null);
            $this->setHouseNo(null);
            $this->setPostalCode(null);
            $this->setTown(null);
            $this->setCountryCode(null);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines whether the specified object is equal to the current object.
     * @param Address $obj The object to compare with the current object.
     * @return bool true if the specified object is equal to the current object; otherwise, false.
     */
    public function equals(Address $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->Address_equals($this->getAddressDto(), $obj->getAddressDto());
        $thriftConnection->closeConnection();
        return $isEquals;
    }
}