<?php
namespace Aspose\Barcode;

use Aspose\Barcode\Bridge\HIBCPASRecordDTO;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\License;
use Aspose\Barcode\Internal\ThriftConnection;
use Aspose\Barcode\Bridge\IComplexCodetextDTO;
use DateTime;
use Exception;

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
    public function getAddressDto() : \Aspose\Barcode\Bridge\AddressDTO
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
     * @param string $value  The name.
     */
    public function setName(?string $value): void
    {
        try
        {
            $this->getAddressDto()->name  = $value;
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
            $this->getAddressDto()->addressLine1  = $value;
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
            $this->getAddressDto()->addressLine2  = $value;
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
            $this->getAddressDto()->street  = $value;
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
            $this->getAddressDto()->houseNo  = $value;
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
            $this->getAddressDto()->postalCode  = $value;
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
            $this->getAddressDto()->town  = $value;
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
            $this->getAddressDto()->countryCode  = $value;
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

/**
 * Alternative payment scheme instructions
 */
final class AlternativeScheme implements Communicator
{
    private $alternativeSchemeDto;

    /**
     * @return mixed
     */
    public function getAlternativeSchemeDto() : \Aspose\Barcode\Bridge\AlternativeSchemeDTO
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
            $this->getAlternativeSchemeDto()->instruction  = $value;
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

/**
 * ComplexCodetextReader decodes codetext to specified complex barcode type.
 *
 * This sample shows how to recognize and decode SwissQR image.
 * @code
 *  $cr = new BarCodeReader("SwissQRCodetext.png", DecodeType::QR);
 *  $cr->read();
 *  $result = ComplexCodetextReader::tryDecodeSwissQR($cr->getCodeText(false));
 * @endcode
 */
final class ComplexCodetextReader
{
    /**
     * Decodes SwissQR codetext.
     *
     * @param string encodedCodetext encoded codetext
     * @return SwissQRCodetext decoded SwissQRCodetext or null.
     */
    public static function tryDecodeSwissQR(string $encodedCodetext): SwissQRCodetext
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $swissQRCodetextDTO = $client->ComplexCodetextReader_tryDecodeSwissQR($encodedCodetext);
            $thriftConnection->closeConnection();
            return SwissQRCodetext::construct($swissQRCodetextDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Decodes Royal Mail Mailmark 2D codetext.
     * @param string $encodedCodetext encoded codetext
     * @return Mailmark2DCodetext decoded Royal Mail Mailmark 2D or null.
     */
    public static function tryDecodeMailmark2D(string $encodedCodetext): Mailmark2DCodetext
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $mailmark2DCodetextDTO = $client->ComplexCodetextReader_tryDecodeMailmark2D($encodedCodetext);
            $thriftConnection->closeConnection();
            $mailmark2DCodetext = Mailmark2DCodetext::construct($mailmark2DCodetextDTO);
            return $mailmark2DCodetext;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Decodes Mailmark Barcode C and L codetext.
     * @param string $encodedCodetext encoded codetext
     * @return MailmarkCodetext|null Mailmark Barcode C and L or null.
     */
    public static function tryDecodeMailmark(string $encodedCodetext) :?MailmarkCodetext
    {
        $res = new MailmarkCodetext();
        try
        {
            $res->initFromString($encodedCodetext);
        }
        catch (Exception $e)
        {
            return null;
        }
        return $res;
    }

    /**
     * Decodes MaxiCode codetext.
     * @param int maxiCodeMode MaxiCode mode
     * @param string encodedCodetext encoded codetext
     * @return MaxiCodeCodetext Decoded MaxiCode codetext.
     */
    public static function tryDecodeMaxiCode(int $maxiCodeMode, string $encodedCodetext) : MaxiCodeCodetext
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $maxiCodeCodetextDTO = $client->ComplexCodetextReader_tryDecodeMaxiCode($maxiCodeMode, $encodedCodetext);
        $thriftConnection->closeConnection();

        if($maxiCodeCodetextDTO->complexCodetextType == ComplexCodetextType::MaxiCodeCodetextMode2)
        {
            return MaxiCodeCodetextMode2::construct($maxiCodeCodetextDTO);
        }
        elseif($maxiCodeCodetextDTO->complexCodetextType == ComplexCodetextType::MaxiCodeCodetextMode3)
        {
            return MaxiCodeCodetextMode3::construct($maxiCodeCodetextDTO);
        }
        else
        {
            return MaxiCodeStandardCodetext::construct($maxiCodeCodetextDTO);
        }
    }

    /**
     * <p>
     * Decodes HIBC LIC codetext.
     * </p>
     * @param string|null $encodedCodetext Encoded codetext
     * @return HIBCLICComplexCodetext|null Decoded HIBC LIC Complex Codetext or null
     */
    public static function tryDecodeHIBCLIC(?string $encodedCodetext) : ?HIBCLICComplexCodetext
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();

        $hibclicComplexCodetext = null;
        try
        {
            $hibclicComplexCodetext = $client->ComplexCodetextReader_tryDecodeHIBCLIC($encodedCodetext);
        }
        catch (\Aspose\Barcode\Bridge\NullValueException $e)
        {
            return null;
        }

        $thriftConnection->closeConnection();
        if($hibclicComplexCodetext->complexCodetextType == ComplexCodetextType::HIBCLICSecondaryAndAdditionalDataCodetext)
        {
            return HIBCLICSecondaryAndAdditionalDataCodetext::construct($hibclicComplexCodetext);
        }
        else if($hibclicComplexCodetext->complexCodetextType == ComplexCodetextType::HIBCLICPrimaryDataCodetext)
        {
            return HIBCLICPrimaryDataCodetext::construct($hibclicComplexCodetext);
        }
        else if($hibclicComplexCodetext->complexCodetextType == ComplexCodetextType::HIBCLICCombinedCodetext)
        {
            return HIBCLICCombinedCodetext::construct($hibclicComplexCodetext);
        }
        return null;
    }

    /**
     * <p>
     * Decodes HIBC PAS codetext.
     * </p>
     * @param string encodedCodetext encoded codetext
     * @return ?HIBCPASCodetext decoded HIBC PAS Complex Codetext or null.
 */
    public static function tryDecodeHIBCPAS(string $encodedCodetext) : ?HIBCPASCodetext
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $hibclicComplexCodetextDTO = $client->ComplexCodetextReader_tryDecodeHIBCPAS($encodedCodetext);
        $thriftConnection->closeConnection();
        if($hibclicComplexCodetextDTO->isNull)
            return null;
        return HIBCPASCodetext::construct($hibclicComplexCodetextDTO);
    }
}

/**
 * SwissQR bill data
 */
final class SwissQRBill implements Communicator
{
    private $swissQRBillDto;

    /**
     * @return mixed
     */
    public function getSwissQRBillDto() : \Aspose\Barcode\Bridge\SwissQRBillDTO
    {
        return $this->swissQRBillDto;
    }

    /**
     * @param mixed $swissQRBillDto
     */
    public function setSwissQRBillDto(\Aspose\Barcode\Bridge\SwissQRBillDTO $swissQRBillDto): void
    {
        $this->swissQRBillDto = $swissQRBillDto;
    }


    private $creditor;
    private $debtor;


    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto()
    {
        try
        {
            $this->creditor = Address::construct($this->getSwissQRBillDto()->creditor);
            $this->debtor = Address::construct($this->getSwissQRBillDto()->debtor);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function __construct(\Aspose\Barcode\Bridge\SwissQRBillDTO $swissQRBillDto)
    {
        try
        {
            $this->swissQRBillDto = $swissQRBillDto;
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function convertAlternativeSchemes($javaAlternativeSchemes)
    {
        try
        {
            $alternativeSchemes = array();
            for ($i = 0; $i < $javaAlternativeSchemes->size(); $i++)
            {
                $alternativeSchemes[$i] = AlternativeScheme::construct($javaAlternativeSchemes->get($i));
            }
            return $alternativeSchemes;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the version of the SwissQR bill standard.
     * Value: The SwissQR bill standard version.
     */
    public function getVersion(): int
    {
        try
        {
            return $this->getSwissQRBillDto()->version;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the version of the SwissQR bill standard.
     * Value: The SwissQR bill standard version.
     */
    public function setVersion(int $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->version  = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the payment amount.
     *
     * Valid values are between 0.01 and 999,999,999.99.
     *
     * Value: The payment amount.
     */
    public function getAmount(): float
    {
        try
        {
            return $this->getSwissQRBillDto()->amount;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the payment amount.
     *
     * Valid values are between 0.01 and 999,999,999.99.
     *
     * Value: The payment amount.
     */
    public function setAmount(float $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->amount  = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the payment currency.
     *
     * Valid values are "CHF" and "EUR".
     *
     * Value: The payment currency.
     */
    public function getCurrency(): string
    {
        try
        {
            return $this->getSwissQRBillDto()->currency;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the payment currency.
     *
     * Valid values are "CHF" and "EUR".
     *
     * Value: The payment currency.
     */
    public function setCurrency(string $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->currency  = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the creditor's account number.
     *
     * Account numbers must be valid IBANs of a bank of Switzerland or
     * Liechtenstein. Spaces are allowed in the account number.
     *
     * Value: The creditor account number.
     */
    public function getAccount(): ?string
    {
        try
        {
            return $this->getSwissQRBillDto()->account;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the creditor's account number.
     *
     * Account numbers must be valid IBANs of a bank of Switzerland or
     * Liechtenstein. Spaces are allowed in the account number.
     * @param string $value Value: The creditor account number.
     * @throws BarcodeException
     */
    public function setAccount(string $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->account  = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the creditor address.
     * @return Address The creditor address.
     */
    public function getCreditor(): Address
    {
        return $this->creditor;
    }

    /**
     * Sets the creditor address.
     * @param Address $value The creditor address.
     * @throws BarcodeException
     */
    public function setCreditor(Address $value): void
    {
        try
        {
            $this->creditor = $value;
            $this->getSwissQRBillDto()->creditor = $value->getAddressDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the creditor payment reference.
     *
     * The reference is mandatory for SwissQR IBANs, i.e.IBANs in the range
     * CHxx30000xxxxxx through CHxx31999xxxxx.
     *
     * If specified, the reference must be either a valid SwissQR reference
     * (corresponding to ISR reference form) or a valid creditor reference
     * according to ISO 11649 ("RFxxxx"). Both may contain spaces for formatting.
     *
     * @return string The creditor payment reference.
     */
    public function getReference(): string
    {
        try
        {
            return $this->getSwissQRBillDto()->reference;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the creditor payment reference.
     *
     * The reference is mandatory for SwissQR IBANs, i.e.IBANs in the range
     * CHxx30000xxxxxx through CHxx31999xxxxx.
     *
     * If specified, the reference must be either a valid SwissQR reference
     * (corresponding to ISR reference form) or a valid creditor reference
     * according to ISO 11649 ("RFxxxx"). Both may contain spaces for formatting.
     *
     * @param string $value The creditor payment reference.
     */
    public function setReference(string $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->reference  = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Creates and sets a ISO11649 creditor reference from a raw string by prefixing
     * the String with "RF" and the modulo 97 checksum.
     *
     * Whitespace is removed from the reference
     *
     * @exception ArgumentException rawReference contains invalid characters.
     * @param string $rawReference The raw reference.
     */
    public function createAndSetCreditorReference(string $rawReference): void
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $this->setSwissQRBillDto($client->SwissQRBill_createAndSetCreditorReference($this->getSwissQRBillDto(), $rawReference));
            $thriftConnection->closeConnection();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the debtor address.
     *
     * The debtor is optional. If it is omitted, both setting this field to
     * null or setting an address with all null or empty values is ok.
     *
     * return Address The debtor address.
     */
    public function getDebtor(): Address
    {
        return $this->debtor;
    }

    /**
     * Sets the debtor address.
     *
     * The debtor is optional. If it is omitted, both setting this field to
     * null or setting an address with all null or empty values is ok.
     *
     * @param Address The debtor address.
     */
    public function setDebtor(Address $value): void
    {
        try
        {
            $this->debtor = $value;
            $this->getSwissQRBillDto()->debtor = $value->getAddressDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the additional unstructured message.
     * @return string The unstructured message.
     */
    public function getUnstructuredMessage(): string
    {
        try
        {
            return $this->getSwissQRBillDto()->UnstructuredMessage;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the additional unstructured message.
     * @param string $value The unstructured message.
     */
    public function setUnstructuredMessage(string $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->UnstructuredMessage  = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the additional structured bill information.
     * @return string The structured bill information.
     */
    public function getBillInformation(): string
    {
        try
        {
            return $this->getSwissQRBillDto()->billInformation;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the additional structured bill information.
     * @param string The structured bill information.
     */
    public function setBillInformation(string $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->billInformation  = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets ors sets the alternative payment schemes.
     *
     * A maximum of two schemes with parameters are allowed.
     *
     * @return array The alternative payment schemes.
     */
    public function getAlternativeSchemes(): array
    {
        try
        {
            return self::convertAlternativeSchemes($this->getSwissQRBillDto()->alternativeSchemes);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets ors sets the alternative payment schemes.
     *
     * A maximum of two schemes with parameters are allowed.
     *
     * @param AlternativeScheme[] $alternativeSchemes
     */
    public function setAlternativeSchemes(array $alternativeSchemes): void
    {
        try
        {
            $dto = $this->getSwissQRBillDto();

            if (!is_array($dto->alternativeSchemes)) {
                $dto->alternativeSchemes = [];
            }

            foreach ($alternativeSchemes as $value) {
                $dto->alternativeSchemes[] = $value->getAlternativeSchemeDto();
            }
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }


    /**
     * Determines whether the specified object is equal to the current object.
     * @param SwissQRBill $obj The object to compare with the current object.
     * @return bool true if the specified object is equal to the current object; otherwise, false.
     */
    public function equals(SwissQRBill $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->SwissQRBill_equals($this->getSwissQRBillDto(), $obj->getSwissQRBillDto());
        $thriftConnection->closeConnection();

        return $isEquals;
    }
}

/**
 * <p>
 * Interface for complex codetext used with ComplexBarcodeGenerator.
 * </p>
 */
abstract class IComplexCodetext implements Communicator
{
    private $complexCodetext;

    /**
     * @return mixed
     */
    public function getIComplexCodetextDTO() : IComplexCodetextDTO
    {
        return $this->complexCodetext;
    }

    /**
     * @param mixed $HIBCLICCombinedCodetextDto
     */
    public function setIComplexCodetextDTO(IComplexCodetextDTO $complexCodetext): void
    {
        $this->complexCodetext = $complexCodetext;
    }
    /**
     * Construct codetext for complex barcode
     * @return string Constructed codetext
     */
    abstract function getConstructedCodetext(): string;

    /**
     * Initializes instance with constructed codetext.
     * @param string $constructedCodetext Constructed codetext.
     */
    public abstract function initFromString(string $constructedCodetext): void;

    /**
     * Gets barcode type.
     * @return int Barcode type.
     */
    abstract function getBarcodeType():int;
}

/**
 *  ComplexBarcodeGenerator for backend complex barcode (e.g. SwissQR) images generation.
 *
 *  This sample shows how to create and save a SwissQR image.
 * @code
 *    $swissQRCodetext = new SwissQRCodetext(null);
 *    $swissQRCodetext->getBill()->setAccount("Account");
 *    $swissQRCodetext->getBill()->setBillInformation("BillInformation");
 *    $cg = new ComplexBarcodeGenerator($swissQRCodetext);
 *    $res = $cg->generateBarCodeImage(BarcodeImageFormat::PNG);
 * @endcode
 */
final class ComplexBarcodeGenerator implements Communicator
{
    private $complexBarcodeGeneratorDto;

    /**
     * @return mixed
     */
    public function getComplexBarcodeGeneratorDto() : \Aspose\Barcode\Bridge\ComplexBarcodeGeneratorDTO
    {
        return $this->complexBarcodeGeneratorDto;
    }

    /**
     * @param mixed $complexBarcodeGeneratorDto
     */
    public function setComplexBarcodeGeneratorDto(\Aspose\Barcode\Bridge\ComplexBarcodeGeneratorDTO $complexBarcodeGeneratorDto): void
    {
        $this->complexBarcodeGeneratorDto = $complexBarcodeGeneratorDto;
    }

    private $parameters;
//    private $complexCodeText;


    /**
     * Creates an instance of ComplexBarcodeGenerator.
     *
     * @param IComplexCodetext $complexCodetext complexCodetext Complex codetext
     */
    public function __construct(IComplexCodetext $complexCodetext)
    {
        $this->setComplexBarcodeGeneratorDto($this->obtainDto($complexCodetext->getIComplexCodetextDTO()));
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args) : \Aspose\Barcode\Bridge\ComplexBarcodeGeneratorDTO
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->ComplexBarcodeGenerator_ctor($args[0]);
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    public function initFieldsFromDto()
    {
        try
        {
//            $this->complexCodeText = $this->getComplexBarcodeGeneratorDto()->complexCodetextDTO;
            $this->parameters = new BaseGenerationParameters($this->getComplexBarcodeGeneratorDto()->parameters);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Generation parameters.
     */
    public function getParameters(): BaseGenerationParameters
    {
        return $this->parameters;
    }

    /**
     * Generates complex barcode image under current settings.
     * @param int format value of BarCodeImageFormat (PNG, BMP, JPEG, GIF)
     * @code
     *    $swissQRCodetext = new SwissQRCodetext(null);
     *    $swissQRCodetext->getBill()->setAccount("Account");
     *    $swissQRCodetext->getBill()->setBillInformation("BillInformation");
     *    $cg = new ComplexBarcodeGenerator($swissQRCodetext);
     *    $res = $cg->generateBarCodeImage(BarcodeImageFormat::PNG);
     * @endcode
     * @return string base64 representation of image.
     */
    public function generateBarcodeImage(int $format, bool $passLicense = false): string
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();

            // Deciding if the license should be used
            $licenseContent = $passLicense ? License::getLicenseContent() : null;
            // Passing the license or null
            $base64Image = $client->ComplexBarcodeGenerator_generateBarcodeImage($this->getComplexBarcodeGeneratorDto(), $format, $licenseContent);
            $thriftConnection->closeConnection();
            return $base64Image;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Save barcode image to specific file in specific format.
     * @param $filePath string Path to save to.
     * @param int format  value of BarCodeImageFormat (PNG, BMP, JPEG, GIF)
     * @code:
     *    $swissQRCodetext = new SwissQRCodetext(null);
     *    $swissQRCodetext->getBill()->setAccount("Account");
     *    $swissQRCodetext->getBill()->setBillInformation("BillInformation");
     *    $cg = new ComplexBarcodeGenerator($swissQRCodetext);
     *    $res = $cg->save("filePath.png", BarcodeImageFormat::PNG);
     * @endcode
     */
    public function save(string $filePath, int $format): void
    {
        try
        {
            $image = $this->generateBarcodeImage($format);
            file_put_contents($filePath, base64_decode($image));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

class ComplexCodetextType
{
    const HIBCLICCombinedCodetext = 0;
    const HIBCLICPrimaryDataCodetext = 1;
    const HIBCLICSecondaryAndAdditionalDataCodetext = 2;
    const HIBCPASCodetext = 3;
    const Mailmark2DCodetext = 4;
    const MailmarkCodetext = 5;
    const MaxiCodeStandardCodetext = 6;
    const MaxiCodeCodetextMode2 = 7;
    const MaxiCodeCodetextMode3 = 8;
    const SwissQRCodetext = 9;
}


/**
 * Class for encoding and decoding the text embedded in the 4-state Royal Mailmark code.
 */
final class MailmarkCodetext extends IComplexCodetext
{
    /**
     * Initializes a new instance of the {@code MailmarkCodetext} class.
     */
    public function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::MailmarkCodetext;
        $this->initFieldsFromDto();
    }

    public function initFieldsFromDto()
    {
    }

    public function obtainDto(...$args) : IComplexCodetextDTO
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->MailmarkCodetext_ctor();
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    /**
     * "0" – Null or Test
     * "1" – Letter
     * "2" – Large Letter
     */
    public function getFormat():int { return $this->getIComplexCodetextDTO()->format; }
    /**
     * "0" – Null or Test
     * "1" – LetterN
     * "2" – Large Letter
     */
    public function setFormat(int $value){ $this->getIComplexCodetextDTO()->format = $value; }

    /**
     * Currently 1 – For Mailmark barcode (0 and 2 to 9 and A to Z spare for future use)
     */
    public function getVersionID():int
    {
        return $this->getIComplexCodetextDTO()->versionID;
    }

    /**
     * Currently 1 – For Mailmark barcode (0 and 2 to 9 and A to Z spare for future use)
     */
    public function setVersionID(int $value)
    {
        $this->getIComplexCodetextDTO()->versionID = $value;
    }

    /**
     * "0" - Null or Test
     * "1" - 1C (Retail)
     * "2" - 2C (Retail)
     * "3" - 3C (Retail)
     * "4" - Premium (RetailPublishing Mail) (for potential future use)
     * "5" - Deferred (Retail)
     * "6" - Air (Retail) (for potential future use)
     * "7" - Surface (Retail) (for potential future use)
     * "8" - Premium (Network Access)
     * "9" - Standard (Network Access)
     */
    public function  getClass_():string
    {
        return $this->getIComplexCodetextDTO()->class_;
    }

    /**
     * "0" - Null or Test
     * "1" - 1C (Retail)
     * "2" - 2C (Retail)
     * "3" - 3C (Retail)
     * "4" - Premium (RetailPublishing Mail) (for potential future use)
     * "5" - Deferred (Retail)
     * "6" - Air (Retail) (for potential future use)
     * "7" - Surface (Retail) (for potential future use)
     * "8" - Premium (Network Access)
     * "9" - Standard (Network Access)
     */
    public function setClass_(string $value){ $this->getIComplexCodetextDTO()->class_ = $value; }

    /**
     * Maximum values are 99 for Barcode C and 999999 for Barcode L.
     */
    public function getSupplyChainID():int
    {
        return $this->getIComplexCodetextDTO()->supplyChainID;
    }
    /**
     * Maximum values are 99 for Barcode C and 999999 for Barcode L.
     */
    public function setSupplyChainID(int $value)
    {
        $this->getIComplexCodetextDTO()->supplyChainID = $value;
    }

    /**
     * Maximum value is 99999999.
     */
    public function getItemID():int{ return $this->getIComplexCodetextDTO()->itemID; }
    /**
     * Maximum value is 99999999.
     */
    public function setItemID(int $value){ $this->getIComplexCodetextDTO()->itemID = $value; }

    /**
     * The PC and DP must comply with a PAF format.
     * Nine character string denoting international "XY11     " (note the 5 trailing spaces) or a pattern
     * of characters denoting a domestic sorting code.
     * A domestic sorting code consists of an outward postcode, an inward postcode, and a Delivery Point Suffix.
     */
    public function getDestinationPostCodePlusDPS():string
    { return $this->getIComplexCodetextDTO()->destinationPostCodePlusDPS; }

    /**
     * The PC and DP must comply with a PAF format.
     * Nine character string denoting international "XY11     " (note the 5 trailing spaces) or a pattern
     * of characters denoting a domestic sorting code.
     * A domestic sorting code consists of an outward postcode, an inward postcode, and a Delivery Point Suffix.
     */
    public function setDestinationPostCodePlusDPS(string $value)
    { $this->getIComplexCodetextDTO()->destinationPostCodePlusDPS = $value; }

    /**
     * Construct codetext from Mailmark data.
     *
     * @return string Constructed codetext
     */
    public function getConstructedCodetext():string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $constructedCodetext = $client->MailmarkCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    /**
     * Initializes Mailmark data from constructed codetext.
     *
     * @param string $constructedCodetext Constructed codetext.
     */
    public function initFromString($constructedCodetext):void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $this->setIComplexCodetextDTO($client->MailmarkCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext));
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
     * Gets barcode type.
     *
     * @return int Barcode type.
     */
    public function getBarcodeType():int
    {
        $barcode_type = $this->getIComplexCodetextDTO()->barcodeType;
        return $barcode_type;
    }
}

/**
 * Class for encoding and decoding the text embedded in the Royal Mail 2D Mailmark code.
 */
final class Mailmark2DCodetext extends IComplexCodetext
{
    /**
     * Create default instance of Mailmark2DCodetext class.
     */
    public function __construct()
    {
        try
        {
            $this->setIComplexCodetextDTO($this->obtainDto());
            $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::Mailmark2DCodetext;
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($complexCodetextDTO)
    {
        try
        {
            $class = new Mailmark2DCodetext();
            $class->setIComplexCodetextDTO($complexCodetextDTO);
            $class->initFieldsFromDto();
            return $class;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->Mailmark2DCodetext_ctor();
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * Identifies the UPU Country ID.Max length: 4 characters.
     * @return string Country ID
     */
    public function getUPUCountryID(): string
    {
        return $this->getIComplexCodetextDTO()->UPUCountryID;
    }

    /**
     * Identifies the UPU Country ID.Max length: 4 characters.
     * @param string $value Country ID
     */
    public function setUPUCountryID(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->UPUCountryID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the Royal Mail Mailmark barcode payload for each product type.
     * Valid Values:
     *
     * "0" - Domestic Sorted &amp; Unsorted
     * "A" - Online Postage
     * "B" - Franking
     * "C" - Consolidation
     *
     * @return string Information type ID
     */
    public function getInformationTypeID(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->informationTypeID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the Royal Mail Mailmark barcode payload for each product type.
     * Valid Values:
     *
     * "0" - Domestic Sorted &amp; Unsorted
     * "A" - Online Postage
     * "B" - Franking
     * "C" - Consolidation
     *
     * @param string $value Information type ID
     */
    public function setInformationTypeID(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->informationTypeID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the  barcode version as relevant to each Information Type ID.
     * Valid Values:
     *
     * Currently "1".
     * "0" &amp; "2" to "9" and "A" to "Z" spare reserved for potential future use.
     *
     * @return string Version ID
     */
    public function getVersionID(): string
    {
        return (string) $this->getIComplexCodetextDTO()->versionID;
    }

    /**
     * Identifies the  barcode version as relevant to each Information Type ID.
     * Valid Values:
     *
     * Currently "1".
     * "0" &amp; "2" to "9" and "A" to "Z" spare reserved for potential future use.
     *
     * @param string $value Version ID
     */
    public function setVersionID(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->versionID = (int) $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the class of the item.
     *
     * Valid Values:
     * "1" - 1C (Retail)
     * "2" - 2C (Retail)
     * "3" - Economy (Retail)
     * "5" - Deffered (Retail)
     * "8" - Premium (Network Access)
     * "9" - Standard (Network Access)
     *
     * @return string class of the item
     */
    public function getClass_(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->class_;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the class of the item.
     *
     * Valid Values:
     * "1" - 1C (Retail)
     * "2" - 2C (Retail)
     * "3" - Economy (Retail)
     * "5" - Deffered (Retail)
     * "8" - Premium (Network Access)
     * "9" - Standard (Network Access)
     *
     * @param string $value class of the item
     */
    public function setClass_(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->class_ = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the unique group of customers involved in the mailing.
     * Max value: 9999999.
     *
     * @return int Supply chain ID
     */
    public function getSupplyChainID(): int
    {
        try
        {
            return $this->getIComplexCodetextDTO()->supplyChainID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the unique group of customers involved in the mailing.
     * Max value: 9999999.
     *
     * @param int $value Supply chain ID
     */
    public function setSupplyChainID(int $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->supplyChainID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the unique item within the Supply Chain ID.
     * Every Mailmark barcode is required to carry an ID
     * so it can be uniquely identified for at least 90 days.
     * Max value: 99999999.
     *
     * @return int item within the Supply Chain ID
     */
    public function getItemID(): int
    {
        try
        {
            return $this->getIComplexCodetextDTO()->itemID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the unique item within the Supply Chain ID.
     * Every Mailmark barcode is required to carry an ID
     * so it can be uniquely identified for at least 90 days.
     * Max value: 99999999.
     *
     * @param int $value item within the Supply Chain ID
     */
    public function setItemID(int $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->itemID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Contains the Postcode of the Delivery Address with DPS
     * If inland the Postcode/DP contains the following number of characters.
     * Area (1 or 2 characters) District(1 or 2 characters)
     * Sector(1 character) Unit(2 characters) DPS (2 characters).
     * The Postcode and DPS must comply with a valid PAF® format.
     *
     * @return string the Postcode of the Delivery Address with DPS
     */
    public function getDestinationPostCodeAndDPS(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->destinationPostCodeAndDPS;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Contains the Postcode of the Delivery Address with DPS
     * If inland the Postcode/DP contains the following number of characters.
     * Area (1 or 2 characters) District(1 or 2 characters)
     * Sector(1 character) Unit(2 characters) DPS (2 characters).
     * The Postcode and DPS must comply with a valid PAF® format.
     *
     * @param string $value the Postcode of the Delivery Address with DPS
     */
    public function setDestinationPostCodeAndDPS(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->destinationPostCodeAndDPS = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Flag which indicates what level of Return to Sender service is being requested.
     *
     * @return string RTS Flag
     */
    public function getRTSFlag(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->RTSFlag;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Flag which indicates what level of Return to Sender service is being requested.
     *
     * @param string $value RTS Flag
     */
    public function setRTSFlag(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->RTSFlag = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Contains the Return to Sender Post Code but no DPS.
     * The PC(without DPS) must comply with a PAF® format.
     *
     * @return string Return to Sender Post Code but no DPS
     */
    public function getReturnToSenderPostCode(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->returnToSenderPostCode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Contains the Return to Sender Post Code but no DPS.
     * The PC(without DPS) must comply with a PAF® format.
     *
     * @param string $value Return to Sender Post Code but no DPS
     */
    public function setReturnToSenderPostCode(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->returnToSenderPostCode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Optional space for use by customer.
     *
     * Max length by Type:
     * Type 7: 6 characters
     * Type 9: 45 characters
     * Type 29: 25 characters
     *
     * @return string Customer content
     */
    public function getCustomerContent(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->customerContent;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Optional space for use by customer.
     *
     * Max length by Type:
     * Type 7: 6 characters
     * Type 9: 45 characters
     * Type 29: 25 characters
     *
     * @param string $value Customer content
     */
    public function setCustomerContent(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->customerContent = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode.C40.
     *
     * @return int Encode mode of Datamatrix barcode.
     */
    public function getCustomerContentEncodeMode(): int
    {
        try
        {
            return $this->getIComplexCodetextDTO()->customerContentEncodeMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode.C40.
     *
     * @param int $value Encode mode of Datamatrix barcode.
     */
    public function setCustomerContentEncodeMode(int $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->customerContentEncodeMode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * 2D Mailmark Type defines size of Data Matrix barcode.
     *
     * @return int Size of Data Matrix barcode
     */
    public function getDataMatrixType(): int
    {
        try
        {
            return $this->getIComplexCodetextDTO()->dataMatrixType;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * 2D Mailmark Type defines size of Data Matrix barcode.
     *
     * @param int $value Size of Data Matrix barcode
     */
    public function setDataMatrixType(int $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->dataMatrixType = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Construct codetext from Mailmark data.
     * @return string Constructed codetext
     */
    public function getConstructedCodetext(): string
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $constructedCodetext = $client->Mailmark2DCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
            $thriftConnection->closeConnection();
            return $constructedCodetext;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Initializes Mailmark data from constructed codetext.
     * @param string $constructedCodetext Constructed codetext.
     */
    public function initFromString($constructedCodetext): void
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $this->setIComplexCodetextDTO($client->Mailmark2DCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext));
            $thriftConnection->closeConnection();
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets barcode type.
     * @return int Barcode type.
     */
    public function getBarcodeType(): int
    {
        $barcode_type = $this->getIComplexCodetextDTO()->barcodeType;
        return $barcode_type;
    }
}

/**
 * Class for encoding and decoding the text embedded in the SwissQR code.
 */
final class SwissQRCodetext extends IComplexCodetext
{
    private $bill;

    /**
     * Creates an instance of SwissQRCodetext.
     *
     * @param SwissQRBill $bill SwissQR bill data
     * @throws BarcodeException
     */
    public function __construct(?SwissQRBill $bill)
    {
        try
        {
            $this->setIComplexCodetextDTO($this->obtainDto($bill));
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($dtoRef)
    {
        try
        {
            $class = new SwissQRCodetext(null);
            $class->setIComplexCodetextDTO($dtoRef);
            $class->initFieldsFromDto();
            return $class;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = null;
        if (is_null($args[0]))
            $dtoRef = $client->SwissQRCodetext_ctor();
        else
            $dtoRef = $client->SwissQRCodetext_ctorSwissQRBill($args[0]->getSwissQRBillDto());
        $dtoRef->complexCodetextType = ComplexCodetextType::SwissQRCodetext;
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    public function initFieldsFromDto()
    {
        try
        {
            $this->bill = new SwissQRBill($this->getIComplexCodetextDTO()->bill);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * SwissQR bill data
     */
    public function getBill(): SwissQRBill
    {
        return $this->bill;
    }

    /**
     * Construct codetext from SwissQR bill data
     *
     * @return string Constructed codetext
     */
    public function getConstructedCodetext(): string
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $constructedCodetext =$client->SwissQRCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
            $thriftConnection->closeConnection();
            return $constructedCodetext;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Initializes Bill with constructed codetext.
     *
     * @param string $constructedCodetext Constructed codetext.
     */
    public function initFromString($constructedCodetext): void
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $this->setIComplexCodetextDTO($client->SwissQRCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext));
            $this->initFieldsFromDto();
            $thriftConnection->closeConnection();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets barcode type.
     *
     * @return int Barcode type.
     */
    public function getBarcodeType(): int
    {
        try
        {
            return $this->getIComplexCodetextDTO()->barcodeType;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Base class for encoding and decoding the text embedded in the MaxiCode code.
 *
 * This sample shows how to decode raw MaxiCode codetext to MaxiCodeCodetext instance.
 *
 * @code
 * $reader = new BarCodeReader("c:\\test.png", DecodeType::MAXI_CODE);
 * foreach($reader->readBarCodes() as $result)
 * {
 *      $resultMaxiCodeCodetext = ComplexCodetextReader::tryDecodeMaxiCode($result->getExtended()->getMaxiCode()->getMaxiCodeMode(), $result->getCodeText());
 *      print("BarCode Type: ".$resultMaxiCodeCodetext->getBarcodeType());
 *      print("MaxiCode mode: ".$resultMaxiCodeCodetext->getMode());
 *      print("BarCode CodeText: ".$resultMaxiCodeCodetext->getConstructedCodetext());
 * }
 * @endcode
 */
abstract class MaxiCodeCodetext extends IComplexCodetext
{
    /**
     * Gets a MaxiCode encode mode.
     */
    public function getMaxiCodeEncodeMode() : int
    {
        return $this->getIComplexCodetextDTO()->maxiCodeEncodeMode;
    }

    /**
     * Sets a MaxiCode encode mode.
     */
    public function setMaxiCodeEncodeMode(int $value) : void
    {
        $this->getIComplexCodetextDTO()->maxiCodeEncodeMode = $value;
    }

    /**
     * Gets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     */
    public function getECIEncoding() : int
    {
        return $this->getIComplexCodetextDTO()->ECIEncoding;
    }

    /**
     * Sets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     */
    public function setECIEncoding(int $value) : void
    {
        $this->getIComplexCodetextDTO()->ECIEncoding = $value;
    }

    /**
     * Gets barcode type.
     * @return int Barcode type
     */
    public function getBarcodeType() : int
    {
        return $this->getIComplexCodetextDTO()->barcodeType;
    }
}

class MaxiCodeSecondMessageType
{
    const MAXI_CODE_STANDART_SECOND_MESSAGE = 0;
    const MAXI_CODE_STRUCTURED_SECOND_MESSAGE = 1;
}
/**
 * Base class for encoding and decoding the text embedded in the MaxiCode code for modes 2 and 3.
 *
 *  This sample shows how to decode raw MaxiCode codetext to MaxiCodeStructuredCodetext instance.
 *  @code
 *  $reader = new BarCodeReader("c:\\test.png", DecodeType::MAXI_CODE);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *      $resultMaxiCodeCodetext = ComplexCodetextReader::tryDecodeMaxiCode($result->getExtended()->getMaxiCode()->getMaxiCodeMode(), $result->getCodeText());
 *      if ($resultMaxiCodeCodetext instanceof MaxiCodeStructuredCodetext)
 *      {
 *          $maxiCodeStructuredCodetext = $resultMaxiCodeCodetext;
 *          print("BarCode Type: ".$maxiCodeStructuredCodetext->getPostalCode());
 *          print("MaxiCode mode: ".$maxiCodeStructuredCodetext->getCountryCode());
 *          print("BarCode CodeText: ".$maxiCodeStructuredCodetext->getServiceCategory());
 *      }
 *  }
 *  @endcode
 */
abstract class MaxiCodeStructuredCodetext extends MaxiCodeCodetext
{
    private $secondMessage;

    public function initFieldsFromDto() : void
    {
        $maxiCodeSecondMessageDTO = $this->getIComplexCodetextDTO()->secondMessage;
        if(!is_null($maxiCodeSecondMessageDTO))
        {
            switch ($maxiCodeSecondMessageDTO->maxiCodeSecondMessageType)
            {
                case MaxiCodeSecondMessageType::MAXI_CODE_STANDART_SECOND_MESSAGE:
                    $this->secondMessage = MaxiCodeStandartSecondMessage::_construct($maxiCodeSecondMessageDTO);
                    break;
                case MaxiCodeSecondMessageType::MAXI_CODE_STRUCTURED_SECOND_MESSAGE:
                    $this->secondMessage = MaxiCodeStructuredSecondMessage::_construct($maxiCodeSecondMessageDTO);
                    break;
                default:
                    throw new Exception();
            }
        }
        else
        {
            $this->secondMessage = null;
        }
    }

    /**
     * Identifies the postal code. Must be 9 digits in mode 2 or
     * 6 alphanumeric symbols in mode 3.
     */
    public function getPostalCode() : string
    {
        return $this->getIComplexCodetextDTO()->postalCode;
    }

    /**
     * Identifies the postal code. Must be 9 digits in mode 2 or
     * 6 alphanumeric symbols in mode 3.
     */
    public function setPostalCode(string $value) : void
    {
        $this->getIComplexCodetextDTO()->postalCode = $value;
    }

    /**
     * Identifies 3 digit country code.
     */
    public function getCountryCode() : int
    {
        return $this->getIComplexCodetextDTO()->countryCode;
    }

    /**
     * Identifies 3 digit country code.
     */
    public function setCountryCode(int $value) : void
    {
        $this->getIComplexCodetextDTO()->countryCode = $value;
    }

    /**
     * Identifies 3 digit service category.
     */
    public function getServiceCategory() : int
    {
        return $this->getIComplexCodetextDTO()->serviceCategory;
    }

    /**
     * Identifies 3 digit service category.
     */
    public function setServiceCategory(int $value) : void
    {
        $this->getIComplexCodetextDTO()->serviceCategory = $value;
    }

    /**
     * Identifies second message of the barcode.
     */
    public function getSecondMessage() : MaxiCodeSecondMessage
    {
        return $this->secondMessage;
    }

    /**
     * Identifies second message of the barcode.
     */
    public function setSecondMessage(MaxiCodeSecondMessage $value)
    {
        $this->secondMessage = $value;
        $this->getIComplexCodetextDTO()->secondMessage = ($value->getMaxiCodeSecondMessageDto());
    }

    /**
     * Constructs codetext
     * @return string Constructed codetext
     */
    public abstract function getConstructedCodetext() : string;

    /**
     * Initializes instance from constructed codetext.
     * @param string $constructedCodetext Constructed codetext.
     */
    public abstract function initFromString(string $constructedCodetext) : void;

    /**
     * Returns a value indicating whether this instance is equal to a specified <see cref="MaxiCodeStructuredCodetext"/> value.
     * @param object $obj An <see cref="MaxiCodeStructuredCodetext"/> value to compare to this instance.
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public abstract function equals($obj) : bool;
}

/**
 * Class for encoding and decoding the text embedded in the MaxiCode code for modes 2.
 *
 *  <example>
 *  This sample shows how to encode and decode MaxiCode codetext for mode 2.
 *  @code
 *  //Mode 2 with standart second message
 *  $maxiCodeCodetext = new MaxiCodeCodetextMode2();
 *  $maxiCodeCodetext->setPostalCode("524032140");
 *  $maxiCodeCodetext->setCountryCode(056);
 *  $maxiCodeCodetext->setServiceCategory(999);
 *  $maxiCodeStandartSecondMessage = new MaxiCodeStandartSecondMessage();
 *  $maxiCodeStandartSecondMessage->setMessage("Test message");
 *  $maxiCodeCodetext->setSecondMessage($maxiCodeStandartSecondMessage);
 *  $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext);
 *  $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 *  //Mode 2 with structured second message
 *  $maxiCodeCodetext = new MaxiCodeCodetextMode2();
 *  $maxiCodeCodetext->setPostalCode("524032140");
 *  $maxiCodeCodetext->setCountryCode(056);
 *  $maxiCodeCodetext->setServiceCategory(999);
 *  $maxiCodeStructuredSecondMessage = new MaxiCodeStructuredSecondMessage();
 *  $maxiCodeStructuredSecondMessage->add("634 ALPHA DRIVE");
 *  $maxiCodeStructuredSecondMessage->add("PITTSBURGH");
 *  $maxiCodeStructuredSecondMessage->add("PA");
 *  $maxiCodeStructuredSecondMessage->setYear(99);
 *  $maxiCodeCodetext->setSecondMessage(maxiCodeStructuredSecondMessage);
 *  $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext);
 *  $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 *  //Decoding raw codetext with standart second message
 *  $reader = new BarCodeReader("c:\\test.png", DecodeType::MAXI_CODE);
 *  {
 *       foreach($reader->readBarCodes() as $result)
 *      {
 *          $resultMaxiCodeCodetext = ComplexCodetextReader::tryDecodeMaxiCode($result->getExtended()->getMaxiCode()->getMaxiCodeMode(), $result->getCodeText());
 *          if ($resultMaxiCodeCodetext instanceof MaxiCodeCodetextMode2)
 *          {
 *              $maxiCodeStructuredCodetext = $resultMaxiCodeCodetext;
 *              print("BarCode Type: ".$maxiCodeStructuredCodetext->getPostalCode());
 *              print("MaxiCode mode: ".$maxiCodeStructuredCodetext->getCountryCode());
 *              print("BarCode CodeText: ".$maxiCodeStructuredCodetext->getServiceCategory());
 *              if ($maxiCodeStructuredCodetext->getSecondMessage() instanceof MaxiCodeStandartSecondMessage){
 *                  $secondMessage = $maxiCodeStructuredCodetext->getSecondMessage();
 *                  print("Message: ".$secondMessage->getMessage());
 *              }
 *          }
 *      }
 *  }
 *  //Decoding raw codetext with structured second message
 *  $reader = new BarCodeReader("c:\\test.png", DecodeType::MAXI_CODE);
 *  {
 *       foreach($reader->readBarCodes() as $result)
 *      {
 *          $resultMaxiCodeCodetext = ComplexCodetextReader::tryDecodeMaxiCode($result->getExtended()->getMaxiCode()->getMaxiCodeMode(), $result->getCodeText());
 *          if ($resultMaxiCodeCodetext instanceof MaxiCodeCodetextMode2){
 *              $maxiCodeStructuredCodetext = $resultMaxiCodeCodetext;
 *              print("BarCode Type: ".$maxiCodeStructuredCodetext->getPostalCode());
 *              print("MaxiCode mode: ".$maxiCodeStructuredCodetext->getCountryCode());
 *              print("BarCode CodeText: ".$maxiCodeStructuredCodetext->getServiceCategory());
 *              if ($maxiCodeStructuredCodetext->getSecondMessage() instanceof MaxiCodeStructuredSecondMessage)
 *              {
 *                  $secondMessage = $maxiCodeStructuredCodetext->getSecondMessage();
 *                  print("Message:");
 *                  for ($secondMessage->getIdentifiers() as $identifier){
 *                      print($identifier);
 *                  }
 *              }
 *          }
 *      }
 *  }
 *  @endcode
 *  </example>
 */
class MaxiCodeCodetextMode2 extends MaxiCodeStructuredCodetext
{

    public function __construct()
    {
        try
        {
            $this->setIComplexCodetextDTO($this->obtainDto());
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($maxiCodeCodetextMode2Dto)
    {
        $class_ = new MaxiCodeCodetextMode2();
        $class_->setIComplexCodetextDTO($maxiCodeCodetextMode2Dto);
        $class_->initFieldsFromDto();
        return $class_;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoObj = $client->MaxiCodeCodetextMode2_ctor();
        $thriftConnection->closeConnection();
        return $dtoObj;
    }

    public function initFieldsFromDto() : void
    {
        parent::initFieldsFromDto();
    }

    /**
     * Gets MaxiCode mode.
     * @return int MaxiCode mode
     */
    public function getMode() : int
    {
        return $this->getIComplexCodetextDTO()->mode;
    }

    public function initFromString(string $constructedCodetext) : void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $this->setIComplexCodetextDTO($client->MaxiCodeCodetextMode2_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext));
        $thriftConnection->closeConnection();
    }

    public function getConstructedCodetext(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $constructedCodetext = $client->MaxiCodeCodetextMode2_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    public function equals($obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->MaxiCodeCodetextMode2_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}

/**
 * Class for encoding and decoding the text embedded in the MaxiCode code for modes 3.
 * This sample shows how to encode and decode MaxiCode codetext for mode 3.
 * @code
 *  //Mode 3 with standart second message
 *  $maxiCodeCodetext = new MaxiCodeCodetextMode3();
 *  $maxiCodeCodetext->setPostalCode("B1050");
 *  $maxiCodeCodetext->setCountryCode(056);
 *  $maxiCodeCodetext->setServiceCategory(999);
 *  MaxiCodeStandartSecondMessage maxiCodeStandartSecondMessage = new MaxiCodeStandartSecondMessage();
 *  maxiCodeStandartSecondMessage->setMessage("Test message");
 *  $maxiCodeCodetext->setSecondMessage(maxiCodeStandartSecondMessage);
 *  ComplexBarcodeGenerator complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext);
 *  complexGenerator.generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 *  //Mode 3 with structured second message
 *  MaxiCodeCodetextMode3 $maxiCodeCodetext = new MaxiCodeCodetextMode3();
 *  $maxiCodeCodetext->setPostalCode("B1050");
 *  $maxiCodeCodetext->setCountryCode(056);
 *  $maxiCodeCodetext->setServiceCategory(999);
 *  $maxiCodeStructuredSecondMessage = new MaxiCodeStructuredSecondMessage();
 *  $maxiCodeStructuredSecondMessage->add("634 ALPHA DRIVE");
 *  $maxiCodeStructuredSecondMessage->add("PITTSBURGH");
 *  $maxiCodeStructuredSecondMessage->add("PA");
 *  $maxiCodeStructuredSecondMessage->setYear(99);
 *  $maxiCodeCodetext->setSecondMessage($maxiCodeStructuredSecondMessage);
 *  $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext);
 *  $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 *  //Decoding raw codetext with standart second message
 *  $reader = new BarCodeReader("c:\\test.png", DecodeType::MAXI_CODE);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *      $resultMaxiCodeCodetext = ComplexCodetextReader::tryDecodeMaxiCode($result->getExtended()->getMaxiCode()->getMaxiCodeMode(), $result->getCodeText());
 *      if ($resultMaxiCodeCodetext instanceOf MaxiCodeCodetextMode3)
 *      {
 *          MaxiCodeCodetextMode3 maxiCodeStructuredCodetext = (MaxiCodeCodetextMode3)$resultMaxiCodeCodetext;
 *          print("BarCode Type: ".$maxiCodeStructuredCodetext->getPostalCode());
 *          print("MaxiCode mode: ".$maxiCodeStructuredCodetext->getCountryCode());
 *          print("BarCode CodeText: ".$maxiCodeStructuredCodetext->getServiceCategory());
 *          if ($maxiCodeStructuredCodetext->getSecondMessage() instanceOf MaxiCodeStandartSecondMessage)
 *          {
 *              $secondMessage = maxiCodeStructuredCodetext->getSecondMessage();
 *              print("Message: ".$secondMessage->getMessage());
 *          }
 *      }
 *  }
 *  //Decoding raw codetext with structured second message
 *  $reader = new BarCodeReader("c:\\test.png", DecodeType::MAXI_CODE);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *      $resultMaxiCodeCodetext = ComplexCodetextReader::tryDecodeMaxiCode($result->getExtended()->getMaxiCode()->getMaxiCodeMode(), $result->getCodeText());
 *      if ($resultMaxiCodeCodetext instanceOf MaxiCodeCodetextMode3)
 *      {
 *          maxiCodeStructuredCodetext = $resultMaxiCodeCodetext;
 *          print("BarCode Type: ".$maxiCodeStructuredCodetext->getPostalCode());
 *          print("MaxiCode mode: ".$maxiCodeStructuredCodetext->getCountryCode());
 *          print("BarCode CodeText: ".$maxiCodeStructuredCodetext->getServiceCategory());
 *          if (maxiCodeStructuredCodetext->getSecondMessage() instanceOf MaxiCodeStructuredSecondMessage)
 *          {
 *              $secondMessage = $maxiCodeStructuredCodetext->getSecondMessage();
 *              print("Message:");
 *              foreach($secondMessage->getIdentifiers() as $identifier)
 *              {
 *                  print($identifier);
 *              }
 *          }
 *      }
 *  }
 *  @endcode
 */
class MaxiCodeCodetextMode3 extends MaxiCodeStructuredCodetext
{
    public function __construct()
    {
        try
        {
            $this->setIComplexCodetextDTO($this->obtainDto());
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($maxiCodeCodetextMode2Dto)
    {
        $class_ = new MaxiCodeCodetextMode3();
        $class_->setIComplexCodetextDTO($maxiCodeCodetextMode2Dto);
        $class_->initFieldsFromDto();
        return $class_;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoObj = $client->MaxiCodeCodetextMode3_ctor();
        $thriftConnection->closeConnection();
        return $dtoObj;
    }

    public function initFieldsFromDto() : void
    {
        parent::initFieldsFromDto();
    }

    /**
     * Gets MaxiCode mode.
     * @return int MaxiCode mode
     */
    public function getMode() : int
    {
        return $this->getIComplexCodetextDTO()->mode;
    }

    public function getConstructedCodetext(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $constructedCodetext = $client->MaxiCodeCodetextMode3_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    public function initFromString(string $constructedCodetext) : void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $this->setIComplexCodetextDTO($client->MaxiCodeCodetextMode3_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext));
        $thriftConnection->closeConnection();
    }

    public function equals($obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->MaxiCodeCodetextMode3_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}

/**
 * Base class for encoding and decoding second message for MaxiCode barcode.
 */
abstract class MaxiCodeSecondMessage implements Communicator
{
    protected $maxiCodeSecondMessageDto;

    /**
     * @return mixed
     */
    public function getMaxiCodeSecondMessageDto() : \Aspose\Barcode\Bridge\MaxiCodeSecondMessageDTO
    {
        return $this->maxiCodeSecondMessageDto;
    }

    /**
     * @param mixed $maxiCodeSecondMessageDto
     */
    public function setMaxiCodeSecondMessageDto(\Aspose\Barcode\Bridge\MaxiCodeSecondMessageDTO $maxiCodeSecondMessageDto): void
    {
        $this->maxiCodeSecondMessageDto = $maxiCodeSecondMessageDto;
    }


    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * Gets constructed second message
     * @return string Constructed second message
     */
    public abstract function getMessage() : string;
}

/**
 * Class for encoding and decoding MaxiCode codetext for modes 4, 5 and 6.
 * @code
 * //Mode 4
 * $maxiCodeCodetext = new MaxiCodeStandardCodetext();
 * $maxiCodeCodetext->setMode(MaxiCodeMode.MODE_4);
 * $maxiCodeCodetext->setMessage("Test message");
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext());
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 5
 * $maxiCodeCodetext = new MaxiCodeStandardCodetext();
 * $maxiCodeCodetext->setMode(MaxiCodeMode.MODE_5);
 * $maxiCodeCodetext->setMessage("Test message");
 * ComplexBarcodeGenerator complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext());
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 6
 * $maxiCodeCodetext = new MaxiCodeStandardCodetext();
 * $maxiCodeCodetext->setMode(MaxiCodeMode.MODE_6);
 * $maxiCodeCodetext->setMessage("Test message");
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext());
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 * @endcode
 */
class MaxiCodeStandardCodetext extends MaxiCodeCodetext
{

    function __construct()
    {
        try
        {
            $this->setIComplexCodetextDTO($this->obtainDto());
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($maxiCodeStandardCodetextDto)
    {
        $class_ = new MaxiCodeStandardCodetext();
        $class_->setIComplexCodetextDTO($maxiCodeStandardCodetextDto);
        $class_->initFieldsFromDto();

        return $class_;
    }

    public function obtainDto(...$args) : IComplexCodetextDTO
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $maxiCodeStandardCodetextDTO = $client->MaxiCodeStandardCodetext_ctor();
        $thriftConnection->closeConnection();
        return $maxiCodeStandardCodetextDTO;
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * Gets message.
     */
    public function getMessage() : ?string
    {
        return $this->getIComplexCodetextDTO()->message;
    }

    /**
     * Sets message.
     */
    public function setMessage(string $value) : void
    {
        $this->getIComplexCodetextDTO()->message = $value;
    }

    /**
     * Sets MaxiCode mode. Standart codetext can be used only with modes 4, 5 and 6.
     */
    public function setMode(int $mode) : void
    {
        $this->getIComplexCodetextDTO()->mode = $mode;
    }

    /**
     * Gets MaxiCode mode.
     * @return int MaxiCode mode
     */
    public function getMode() : int
    {
        return $this->getIComplexCodetextDTO()->mode;
    }

    /**
     * Constructs codetext
     * @return string Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        return $this->getMessage();
    }

    /**
     * Initializes instance from constructed codetext.
     * @param string constructedCodetext Constructed codetext.
     */
    public function initFromString(string $constructedCodetext) : void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $this->setIComplexCodetextDTO($client->MaxiCodeStandardCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext));
        $thriftConnection->closeConnection();
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified MaxiCodeStandardCodetext value.
     * @param object obj An MaxiCodeStandardCodetext value to compare to this instance.
     * @return bool if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals($obj) : bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->MaxiCodeStandardCodetext_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}

/**
 * Class for encoding and decoding standart second message for MaxiCode barcode.
 */
class MaxiCodeStandartSecondMessage extends MaxiCodeSecondMessage
{
    function __construct()
    {
        try
        {
            $this->setMaxiCodeSecondMessageDto($this->obtainDto());
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function _construct($dtoObj)
    {
        try
        {
            $obj = new MaxiCodeStandartSecondMessage();
            $obj->setMaxiCodeSecondMessageDto($dtoObj);
            $obj->initFieldsFromDto();
            return $obj;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $maxiCodeStandartSecondMessageDTO = $client->MaxiCodeStandartSecondMessage_ctor();
        $thriftConnection->closeConnection();
        return $maxiCodeStandartSecondMessageDTO;
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * Sets second message
     */
    public function setMessage(string $value)
    {
        $this->getMaxiCodeSecondMessageDto()->message = $value;
    }

    /**
     * Gets constructed second message
     * @return string Constructed second message
     */
    public function getMessage() : string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $message = $client->MaxiCodeStandartSecondMessage_getMessage($this->getMaxiCodeSecondMessageDto());
        $thriftConnection->closeConnection();
        return $message;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified MaxiCodeStandartSecondMessage value.
     * @param object obj An MaxiCodeStandartSecondMessage value to compare to this instance
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals($obj) : bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->MaxiCodeStandardCodetext_equals($this->getMaxiCodeSecondMessageDto(), $obj->getMaxiCodeSecondMessageDto());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}

/**
 * Class for encoding and decoding structured second message for MaxiCode barcode.
 */
class MaxiCodeStructuredSecondMessage extends MaxiCodeSecondMessage
{
    function __construct()
    {
        try
        {
            $this->setMaxiCodeSecondMessageDto($this->obtainDto());
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $maxiCodeStructuredSecondMessage = $client->MaxiCodeStructuredSecondMessage_ctor();
        $thriftConnection->closeConnection();
        return $maxiCodeStructuredSecondMessage;
    }

    public function initFieldsFromDto()
    {
    }

    static function _construct($dtoObj)
    {
        try
        {
            $obj = new MaxiCodeStructuredSecondMessage();
            $obj->setMaxiCodeSecondMessageDto($dtoObj);
            $obj->initFieldsFromDto();
            return $obj;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Gets year. Year must be 2 digit integer value.
     */
    public function getYear() : int
    {
        return $this->getMaxiCodeSecondMessageDto()->year;
    }

    /**
     *  Sets year. Year must be 2 digit integer value.
     */
    public function setYear(int $value) : void
    {
        $this->getMaxiCodeSecondMessageDto()->year = $value;
    }

    /**
     * Gets identifiers list
     * @return array List of identifiers
     */
    public function getIdentifiers() : array
    {
        return $this->getMaxiCodeSecondMessageDto()->identifiers;
    }

    /**
     * Adds new identifier
     * @param string $identifier Identifier to be added
     */
    public function add(string $identifier) : void
    {
        array_push($this->getMaxiCodeSecondMessageDto()->identifiers, $identifier);
    }

    /**
     * Clear identifiers list
     */
    public function clear() : void
    {
        $this->getMaxiCodeSecondMessageDto()->identifiers = array();
    }

    /**
     * Gets constructed second message
     * @return string Constructed second message
     */
    public function getMessage() : string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $message = $client->MaxiCodeStructuredSecondMessage_getMessage($this->getMaxiCodeSecondMessageDto());
        $thriftConnection->closeConnection();
        return $message;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified <see cref="MaxiCodeStructuredSecondMessage"/> value.
     * @param object $obj An <see cref="MaxiCodeStructuredSecondMessage"/> value to compare to this instance.
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals($obj) : bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $message = $client->MaxiCodeStructuredSecondMessage_equals($this->getMaxiCodeSecondMessageDto(), $obj->getMaxiCodeSecondMessageDto());
        $thriftConnection->closeConnection();
        return $message;
    }
}

/**
 * <p>
 * Base class for encoding and decoding the text embedded in the HIBC LIC code.
 * </p><p><hr><blockquote><pre>
 * This sample shows how to decode raw HIBC LIC codetext to HIBCLICComplexCodetext instance.
 * <pre>
 * $reader = new BarCodeReader("c:\\test.png", null, DecodeType::HIBC_AZTEC_LIC);
 * {
 *     foreach($reader->readBarCodes() as $result)
 *     {
 *         $resultHIBCLICComplexCodetext = ComplexCodetextReader::tryDecodeHIBCLIC($result->getCodeText());
 *         print("BarCode Type: " . $resultMaxiCodeCodetext->getBarcodeType());
 *         print("BarCode CodeText: " . $resultMaxiCodeCodetext->getConstructedCodetext());
 *     }
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
abstract class HIBCLICComplexCodetext extends IComplexCodetext
{

    function __construct($HIBCLICComplexCodetextDto)
    {
        $this->setIComplexCodetextDTO($HIBCLICComplexCodetextDto);
        $this->initFieldsFromDto();
    }
    /**
     * <p>
     * Constructs codetext
     * </p>
     * @return string Constructed codetext
     */
    public abstract function getConstructedCodetext() : string;

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     * @param string constructedCodetext Constructed codetext.
     */
    public abstract function initFromString(string $constructedCodetext) : void;

    /**
     * <p>
     * Gets or sets barcode type. HIBC LIC codetext can be encoded using HIBCCode39LIC, HIBCCode128LIC, HIBCAztecLIC, HIBCDataMatrixLIC and HIBCQRLIC encode types.
     * Default value: HIBCCode39LIC.
     * </p>
     * @return int Barcode type.
     */
    public function getBarcodeType() : int
    {
        return $this->getIComplexCodetextDTO()->barcodeType;
    }
    /**
     * <p>
     * Gets or sets barcode type. HIBC LIC codetext can be encoded using HIBCCode39LIC, HIBCCode128LIC, HIBCAztecLIC, HIBCDataMatrixLIC and HIBCQRLIC encode types.
     * Default value: HIBCCode39LIC.
     * </p>
     * @return int Barcode type.
     */
    public function setBarcodeType(int $value) : void
    {
        $this->getIComplexCodetextDTO()->barcodeType = $value;
    }
}


/**
 * <p>
 * Class for encoding and decoding the text embedded in the HIBC LIC code which stores primary and secodary data.
 * </p><p><hr><blockquote><pre>
 * This sample shows how to encode and decode HIBC LIC using HIBCLICCombinedCodetext.
 * <pre>
 *
 * $combinedCodetext = new HIBCLICCombinedCodetext();
 * $combinedCodetext->setBarcodeType(EncodeTypes::HIBCQRLIC);
 * $combinedCodetext->setPrimaryData(new PrimaryData());
 * $combinedCodetext->getPrimaryData()->setProductOrCatalogNumber("12345");
 * $combinedCodetext->getPrimaryData()->setLabelerIdentificationCode("A999");
 * $combinedCodetext->getPrimaryData()->setUnitOfMeasureID(1);
 * $combinedCodetext->setSecondaryAndAdditionalData(new SecondaryAndAdditionalData());
 * $combinedCodetext->getSecondaryAndAdditionalData()->setExpiryDate(new Date());
 * $combinedCodetext->getSecondaryAndAdditionalData()->setExpiryDateFormat(HIBCLICDateFormat.MMDDYY);
 * $combinedCodetext->getSecondaryAndAdditionalData()->setQuantity(30);
 * $combinedCodetext->getSecondaryAndAdditionalData()->setLotNumber("LOT123");
 * $combinedCodetext->getSecondaryAndAdditionalData()->setSerialNumber("SERIAL123");
 * $combinedCodetext->getSecondaryAndAdditionalData()->setDateOfManufacture(new Date());
 * ComplexBarcodeGenerator generator = new ComplexBarcodeGenerator(combinedCodetext);
 * {
 *     $image = $generator->generateBarCodeImage(BarCodeImageFormat::PNG);
 *     $reader = new BarCodeReader($image, null, DecodeType::HIBCQRLIC);
 *     {
 *         $reader->readBarCodes();
 *         $codetext = $reader->getFoundBarCodes()[0]->getCodeText();
 *         $result = ComplexCodetextReader::tryDecodeHIBCLIC($codetext) ;
 *         print("Product or catalog number: " . $result->getPrimaryData()->getProductOrCatalogNumber());
 *         print("Labeler identification code: " . $result->getPrimaryData()->getLabelerIdentificationCode());
 *         print("Unit of measure ID: " . $result->getPrimaryData()->getUnitOfMeasureID());
 *         print("Expiry date: " . $result->getSecondaryAndAdditionalData()->getExpiryDate());
 *         print("Quantity: " . $result->getSecondaryAndAdditionalData()->getQuantity());
 *         print("Lot number: " . $result->getSecondaryAndAdditionalData()->getLotNumber());
 *         print("Serial number: " . $result->getSecondaryAndAdditionalData()->getSerialNumber());
 *         print("Date of manufacture: " . $result->getSecondaryAndAdditionalData()->getDateOfManufacture());
 *     }
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class HIBCLICCombinedCodetext extends HIBCLICComplexCodetext
{
    function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::HIBCLICCombinedCodetext;
        $this->initFieldsFromDto();
    }

    static function construct($javaClass) : HIBCLICCombinedCodetext
    {
        $obj = new HIBCLICCombinedCodetext();
        $obj->setIComplexCodetextDTO($javaClass);
        $obj->initFieldsFromDto();
        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $complexCodetextDTO = $client->HIBCLICCombinedCodetext_ctor();
        $thriftConnection->closeConnection();
        return $complexCodetextDTO;
    }

    public function initFieldsFromDto()
    {
        $this->auto_PrimaryData = PrimaryData::construct($this->getIComplexCodetextDTO()->primaryData);
        $this->auto_SecondaryAndAdditionalData = SecondaryAndAdditionalData::construct($this->getIComplexCodetextDTO()->secondaryAndAdditionalData);
    }

    /**
     * <p>
     * Identifies primary data.
     * </p>
     */
    public function getPrimaryData() : PrimaryData
    {
        return $this->auto_PrimaryData;
    }

    /**
     * <p>
     * Identifies primary data.
     * </p>
     */
    public function setPrimaryData(PrimaryData $value) : void
    {
        $this->getIComplexCodetextDTO()->primaryData = ($value->getPrimaryDataDto());
        $this->auto_PrimaryData = $value;
    }

    private $auto_PrimaryData;

    /**
     * <p>
     * Identifies secondary and additional supplemental data.
     * </p>
     */
    public function getSecondaryAndAdditionalData() : SecondaryAndAdditionalData
    {
        return $this->auto_SecondaryAndAdditionalData;
    }

    /**
     * <p>
     * Identifies secondary and additional supplemental data.
     * </p>
     */
    public function setSecondaryAndAdditionalData(SecondaryAndAdditionalData $value) : void
    {
        $this->getIComplexCodetextDTO()->secondaryAndAdditionalData = ($value->getSecondaryAndAdditionalDataDto());
        $this->auto_SecondaryAndAdditionalData = $value;
    }

    private $auto_SecondaryAndAdditionalData;

    /**
     * <p>
     * Constructs codetext
     * </p>
     *
     * @return string Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $constructedCodetext = $client->HIBCLICCombinedCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     *
     * @param string constructedCodetext Constructed codetext.
     * @return void
     */
    public function initFromString(string $constructedCodetext) : void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $HIBCLICCombinedCodetextDTO = $client->HIBCLICCombinedCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext);
        $this->setIComplexCodetextDTO($HIBCLICCombinedCodetextDTO);
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCLICCombinedCodetext} value.
     * </p>
     *
     * @param obj An {@code HIBCLICCombinedCodetext} value to compare to this instance.
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     */
    public function  equals(HIBCLICCombinedCodetext $obj) : bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->HIBCLICCombinedCodetext_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}


/**
 * <p>
 * Class for encoding and decoding the text embedded in the HIBC LIC code which stores primary data.
 * </p><p><hr><blockquote><pre>
 * This sample shows how to encode and decode HIBC LIC using HIBCLICPrimaryCodetext.
 * <pre>
 * $complexCodetext  = new HIBCLICPrimaryCodetext();
 * $complexCodetext->setBarcodeType(EncodeTypes::HIBCQRLIC);
 * $complexCodetext->setData(new PrimaryData());
 * $complexCodetext->getData()->setProductOrCatalogNumber("12345");
 * $complexCodetext->getData()->setLabelerIdentificationCode("A999");
 * $complexCodetext->getData()->setUnitOfMeasureID(1);
 * $generator = new ComplexBarcodeGenerator($complexCodetext);
 * {
 *     $image = $generator->generateBarCodeImage(BarCodeImageFormat::PNG);
 *     $reader = new BarCodeReader($image, null, DecodeType::HIBCQRLIC);
 *     {
 *         $reader->readBarCodes();
 *         $codetext = $reader->getFoundBarCodes()[0]->getCodeText();
 *         $result = ComplexCodetextReader::tryDecodeHIBCLIC($codetext) ;
 *         print("Product or catalog number: " . $result->getData()->getProductOrCatalogNumber());
 *         print("Labeler identification code: " . $result->getData()->getLabelerIdentificationCode());
 *         print("Unit of measure ID: " . $result->getData()->getUnitOfMeasureID());
 *     }
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class HIBCLICPrimaryDataCodetext extends HIBCLICComplexCodetext
{

    function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::HIBCLICPrimaryDataCodetext;
        $this->initFieldsFromDto();
    }

    static function construct($HIBCLICPrimaryDataCodetextDto) : HIBCLICPrimaryDataCodetext
    {
        $obj = new HIBCLICPrimaryDataCodetext();
        $obj->setIComplexCodetextDTO($HIBCLICPrimaryDataCodetextDto);
        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $complexCodetextDTO = $client->HIBCLICPrimaryDataCodetext_ctor();
        $thriftConnection->closeConnection();
        return $complexCodetextDTO;
    }

    public function initFieldsFromDto()
    {
        $this->primaryData = PrimaryData::construct($this->getIComplexCodetextDTO()->primaryData);
    }

    private $primaryData;

    /**
     * <p>
     * Identifies primary data.
     * </p>
     */
    public function getData() : PrimaryData
    {
        return $this->primaryData;
    }

    /**
     * <p>
     * Identifies primary data.
     * </p>
     */
    public function setData(PrimaryData $value) : void
    {
        $this->getIComplexCodetextDTO()->primaryData = $value->getPrimaryDataDto();
        $this->primaryData = $value;
    }

    /**
     * <p>
     * Constructs codetext
     * </p>
     *
     * @return string Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $constructedCodetext = $client->HIBCLICPrimaryDataCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     *
     * @param string constructedCodetext Constructed codetext.
     */
    public function initFromString(string $constructedCodetext) : void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $HIBCLICPrimaryDataCodetextDTO = $client->HIBCLICPrimaryDataCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext);
        $this->setIComplexCodetextDTO($HIBCLICPrimaryDataCodetextDTO);
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCLICPrimaryDataCodetext} value.
     * </p>
     *
     * @param bool obj An {@code HIBCLICPrimaryDataCodetext} value to compare to this instance.
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     */
    function equals(HIBCLICPrimaryDataCodetext $obj) : bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->HIBCLICPrimaryDataCodetext_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}

/**
 * Class for encoding and decoding the text embedded in the HIBC LIC code which stores seconday data.
 * @example
 * This sample shows how to encode and decode HIBC LIC using HIBCLICSecondaryAndAdditionalDataCodetext.
 *
 * @code
 * $complexCodetext = new HIBCLICSecondaryAndAdditionalDataCodetext();
 * $complexCodetext->setBarcodeType(EncodeTypes::HIBCQRLIC);
 * $complexCodetext->setLinkCharacter('L');
 * $complexCodetext->setData(new SecondaryAndAdditionalData());
 * $complexCodetext->getData()->setExpiryDate(new Date());
 * $complexCodetext->getData()->setExpiryDateFormat(HIBCLICDateFormat.MMDDYY);
 * $complexCodetext->getData()->setQuantity(30);
 * $complexCodetext->getData()->setLotNumber("LOT123");
 * $complexCodetext->getData()->setSerialNumber("SERIAL123");
 * $complexCodetext->getData()->setDateOfManufacture(new Date());
 * $generator = new ComplexBarcodeGenerator($complexCodetext);
 * $image = $generator->generateBarCodeImage(BarcodeImageFormat::PNG);
 * $reader = new BarCodeReader($image, null, DecodeType::HIBCQRLIC);
 * $reader->readBarCodes();
 * $codetext = $reader->getFoundBarCodes()[0]->getCodeText();
 * $result = ComplexCodetextReader::tryDecodeHIBCLIC($codetext);
 * print("Expiry date: " . $result->getData()->getExpiryDate());
 * print("Quantity: " . $result->getData()->getQuantity());
 * print("Lot number: " . $result->getData()->getLotNumber());
 * print("Serial number: " . $result->getData()->getSerialNumber());
 * print("Date of manufacture: " . $result->getData()->getDateOfManufacture());
 * </code>
 * </example>
 */
class HIBCLICSecondaryAndAdditionalDataCodetext extends HIBCLICComplexCodetext
{
    private $data;

    function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::HIBCLICSecondaryAndAdditionalDataCodetext;
        $this->initFieldsFromDto();
    }

    static function construct($java_class) : HIBCLICSecondaryAndAdditionalDataCodetext
    {
        $obj = new HIBCLICSecondaryAndAdditionalDataCodetext();
        $obj->setIComplexCodetextDTO($java_class);
        $obj->initFieldsFromDto();
        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $HIBCLICSecondaryAndAdditionalDataCodetextDTO = $client->HIBCLICSecondaryAndAdditionalDataCodetext_ctor();
        $thriftConnection->closeConnection();
        return $HIBCLICSecondaryAndAdditionalDataCodetextDTO;
    }

    public function initFieldsFromDto()
    {
        $this->data = SecondaryAndAdditionalData::construct($this->getIComplexCodetextDTO()->secondaryAndAdditionalData);
    }

    /**
     * <p>
     * Identifies secodary and additional supplemental data.
     * </p>
     */
    public function getData() : SecondaryAndAdditionalData
    {
        return $this->data;
    }

    /**
     * <p>
     * Identifies secodary and additional supplemental data.
     * </p>
     */
    public function setData(SecondaryAndAdditionalData $value) : void
    {
        $this->getIComplexCodetextDTO()->secondaryAndAdditionalData = ($value->getSecondaryAndAdditionalDataDto());
        $this->data = $value;
    }

    /**
     * <p>
     * Identifies link character.
     * </p>
     */
    public function getLinkCharacter() : string
    {
        return $this->getIComplexCodetextDTO()->linkCharacter;
    }

    /**
     * <p>
     * Identifies link character.
     * </p>
     */
    public function setLinkCharacter(string $value) : void
    {
        $this->getIComplexCodetextDTO()->linkCharacter = $value;
    }

    /**
     * <p>
     * Constructs codetext
     * </p>
     *
     * @return string Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $constructedCodetext = $client->HIBCLICSecondaryAndAdditionalDataCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     *
     * @param string constructedCodetext Constructed codetext.
     */
    function initFromString(string $constructedCodetext) : void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $HIBCLICSecondaryAndAdditionalDataCodetext = $client->HIBCLICSecondaryAndAdditionalDataCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext);
        $this->setIComplexCodetextDTO($HIBCLICSecondaryAndAdditionalDataCodetext);
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCLICSecondaryAndAdditionalDataCodetext} value.
     * </p>
     *
     * @param obj An {@code HIBCLICSecondaryAndAdditionalDataCodetext} value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false
     */
    public function equals(HIBCLICSecondaryAndAdditionalDataCodetext $obj) : bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->HIBCLICSecondaryAndAdditionalDataCodetext_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}

/**
 * <p>
 *  Class for encoding and decoding the text embedded in the HIBC PAS code.
 *  </p><p><hr><blockquote><pre>
 *  This sample shows how to encode and decode HIBC PAS using HIBCPASCodetext.
 *  <pre>
 *
 *  $complexCodetext = new HIBCPASComplexCodetext();
 *  $complexCodetext->setDataLocation(HIBCPASDataLocation::PATIENT);
 *  $complexCodetext->addRecord(HIBCPASDataType::LABELER_IDENTIFICATION_CODE, "A123");
 *  $complexCodetext->addRecord(HIBCPASDataType::MANUFACTURER_SERIAL_NUMBER, "SERIAL123");
 *  $complexCodetext->setBarcodeType(EncodeTypes::HIBC_DATA_MATRIX_PAS);
 *  $generator = new ComplexBarcodeGenerator($complexCodetext);
 *  {
 *      BarCodeReader reader = new BarCodeReader($generator->generateBarCodeImage(BarCodeImageFormat::PNG), null, DecodeType::HIBC_DATA_MATRIX_PAS);
 *      {
 *          $reader->readBarCodes();
 *          $codetext = $reader->getFoundBarCodes()[0]->getCodeText();
 * 			$readCodetext = ComplexCodetextReader::tryDecodeHIBCPAS($codetext);
 *  		print("Data location: " . $readCodetext->getDataLocation());
 *          print("Data type: " . $readCodetext->getRecords()[0]->getDataType());
 *          print("Data: " . $readCodetext->getRecords()[0]->getData());
 *          print("Data type: " . $readCodetext->getRecords()[1]->getDataType());
 *          print("Data: " . $readCodetext->getRecords()[1]->getData());
 *      }
 *  }
 *  </pre>
 *  </pre></blockquote></hr></p>
 */
class HIBCPASCodetext extends IComplexCodetext
{
    private $_recordsList;
    function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * HIBCPASRecord constructor
     * </p>
     */
    static function construct($HIBCPASCodetextDto) : HIBCPASCodetext
    {
        $obj = new HIBCPASCodetext();
        $obj->setIComplexCodetextDTO($HIBCPASCodetextDto);
        $obj->initFieldsFromDto();
        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->HIBCPASCodetext_ctor();
        $thriftConnection->closeConnection();
        return $dtoRef;
    }

    public function initFieldsFromDto()
    {
        $this->_recordsList = array();
        foreach($this->getIComplexCodetextDTO()->records as $recordDTO)
            array_push($this->_recordsList, HIBCPASRecord::construct($recordDTO));
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::HIBCPASCodetext;
    }

    /**
     * <p>
     * Gets or sets barcode type. HIBC PAS codetext can be encoded using HIBCCode39PAS, HIBCCode128PAS, HIBCAztec:PAS, HIBCDataMatrixPAS and HIBCQRPAS encode types.
     * Default value: HIBCCode39PAS.
     * </p>
     * @param int $value Barcode type.
     * @return void
     */
    public function setBarcodeType(int $value) : void
    {
        $this->getIComplexCodetextDTO()->barcodeType = $value;
    }

    /**
     * <p>
     * Identifies data location.
     * </p>
     */
    public function getDataLocation() : int
    {
        return $this->getIComplexCodetextDTO()->dataLocation;
    }
    /**
     * <p>
     * Identifies data location.
     * </p>
     */
    public function setDataLocation(int $value) : void
    {
        $this->getIComplexCodetextDTO()->dataLocation = $value;
    }

    /**
     * <p>
     * Gets records list
     * </p>
     * @return List of records
     */
    function getRecords() : array
    {
        return $this->_recordsList;
    }

    /**
     * <p>
     * Adds new record
     * </p>
     * @param int dataType Type of data
     * @param string data Data string
     */
    public function addRecord(int $dataType, string $data) : void
    {
        $hibcPASRecord = new HIBCPASRecord($dataType, $data);

        array_push($this->_recordsList, $hibcPASRecord);
        array_push($this->getIComplexCodetextDTO()->records, $hibcPASRecord->getHIBCPASRecordDto());
    }

    /**
     * <p>
     * Adds new record
     * </p>
     * @param HIBCPASRecord record Record to be added
     * @return void
     */
    public function addHIBCPASRecord(HIBCPASRecord $record) : void
    {
        array_push($this->_recordsList, $record);
        array_push($this->getIComplexCodetextDTO()->records, $record->getHIBCPASRecordDto());
    }

    /**
     * <p>
     * Clears records list
     * </p>
     */
    public function clear() : void
    {
        $this->_recordsList = array();
    }

    /**
     * <p>
     * Gets barcode type.
     * </p>
     * @return int Barcode type.
     */
    public function getBarcodeType() : int
    {
        return $this->getIComplexCodetextDTO()->barcodeType;
    }

    /**
     * <p>
     * Constructs codetext
     * </p>
     * @return string Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $constructedCodetext = $client->HIBCPASCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     * @param string constructedCodetext Constructed codetext.
     * @return void
     */
    public function initFromString(string $constructedCodetext) : void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $hibcPASCodetextDTO = $client->HIBCPASCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext);
        $this->setIComplexCodetextDTO($hibcPASCodetextDTO);
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCPASCodetext} value.
     * </p>
     * @return bool true if obj has the same value as this instance; otherwise, false.
     * @param HIBCPASCodetext obj An {@code HIBCPASCodetext} value to compare to this instance.
     */
    public function equals(HIBCPASCodetext $obj) : bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->HIBCPASCodetext_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }
}

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
    static function construct($javaClass) : HIBCPASRecord
    {
        $obj = new HIBCPASRecord(0,"");
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
    public function getDataType() : int
    {
        return $this->getHIBCPASRecordDto()->dataType;
    }

    /**
     * <p>
     * Identifies data type.
     * </p>
     */
    public function setDataType(int $value) : void
    {
        $this->getHIBCPASRecordDto()->setDataType = $value;
    }

    /**
     * <p>
     * Identifies data.
     * </p>
     */
    public function getData() : string
    {
        return $this->getHIBCPASRecordDto()->data;
    }

    /**
     * <p>
     * Identifies data.
     * </p>
     */
    public function setData(string $value) : void
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
    public function equals(HIBCPASRecord $obj) : bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->HIBCPASRecord_equals($this->getHIBCPASRecordDto(), $obj->getHIBCPASRecordDto());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}


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

    static function construct($java_class) : PrimaryData
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
    public function getLabelerIdentificationCode() : string
    {
        return $this->getPrimaryDataDto()->labelerIdentificationCode;
    }

    /**
     * <p>
     * Identifies date of labeler identification code.
     * Labeler identification code must be 4 symbols alphanumeric string, with first character always being alphabetic.
     * </p>
     */
    public function setLabelerIdentificationCode(string $value) : void
    {
        $this->getPrimaryDataDto()->labelerIdentificationCode = $value;
    }

    /**
     * <p>
     * Identifies product or catalog number. Product or catalog number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function getProductOrCatalogNumber() : string
    {
        return $this->getPrimaryDataDto()->productOrCatalogNumber;
    }

    /**
     * <p>
     * Identifies product or catalog number. Product or catalog number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function setProductOrCatalogNumber(string $value) : void
    {
        $this->getPrimaryDataDto()->productOrCatalogNumber = $value;
    }

    /**
     * <p>
     * Identifies unit of measure ID. Unit of measure ID must be integer value from 0 to 9.
     * </p>
     */
    public function getUnitOfMeasureID() : int
    {
        return $this->getPrimaryDataDto()->unitOfMeasureID;
    }

    /**
     * <p>
     * Identifies unit of measure ID. Unit of measure ID must be integer value from 0 to 9.
     * </p>
     */
    public function setUnitOfMeasureID(int $value) : void
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
    public function toString() : string
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
    public function parseFromString(string $primaryDataCodetext) : void
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
    public function equals(PrimaryData $obj) : bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->PrimaryData_equals($this->getPrimaryDataDto(), $obj->getPrimaryDataDto());
        $thriftConnection->closeConnection();

        return $isEqual;
    }
}

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

    static function construct($java_class) : SecondaryAndAdditionalData
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
    public function getExpiryDateFormat() : int
    {
        return $this->getSecondaryAndAdditionalDataDto()->expiryDateFormat;
    }

    /**
     * <p>
     * Identifies expiry date format.
     * </p>
     */
    public function setExpiryDateFormat(int $value) : void
    {
        $this->getSecondaryAndAdditionalDataDto()->expiryDateFormat = $value;
    }

    /**
     * <p>
     * Identifies expiry date. Will be used if ExpiryDateFormat is not set to None.
     * </p>
     */
    public function getExpiryDate() : DateTime
    {
        return new DateTime('@' . $this->getSecondaryAndAdditionalDataDto()->expiryDate);
    }

    /**
     * <p>
     * Identifies expiry date. Will be used if ExpiryDateFormat is not set to None.
     * </p>
     */
    public function setExpiryDate(DateTime $value) : void
    {
        $this->getSecondaryAndAdditionalDataDto()->expiryDate = $value->getTimestamp() . "";
    }

    /**
     * <p>
     * Identifies lot or batch number. Lot/batch number must be alphanumeric string with up to 18 sybmols length. .
     * </p>
     */
    public function getLotNumber() : string
    {
        return $this->getSecondaryAndAdditionalDataDto()->lotNumber;
    }

    /**
     * <p>
     * Identifies lot or batch number. Lot/batch number must be alphanumeric string with up to 18 sybmols length. .
     * </p>
     */
    public function setLotNumber(?string $value) : void
    {
        if($value == null)
            $value = "null";
        $this->getSecondaryAndAdditionalDataDto()->lotNumber = $value;
    }

    /**
     * <p>
     * Identifies serial number. Serial number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function getSerialNumber() : string
    {
        return $this->getSecondaryAndAdditionalDataDto()->serialNumber;
    }

    /**
     * <p>
     * Identifies serial number. Serial number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function setSerialNumber(?string $value) : void
    {
        if($value == null)
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
    public function getDateOfManufacture() : DateTime
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
    public function setDateOfManufacture(DateTime $value) : void
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
    public function getQuantity() : int
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
    public function setQuantity(int $value) : void
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
    public function toString() : string
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
    public function parseFromString(string $secondaryDataCodetext) : void
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
    public function equals(SecondaryAndAdditionalData $obj) : bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->SecondaryAndAdditionalData_equals($this->getSecondaryAndAdditionalDataDto(), $obj->getSecondaryAndAdditionalDataDto());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}

/**
 * 2D Mailmark Type defines size of Data Matrix barcode
 */
class Mailmark2DType
{
    /**
     * Auto determine
     */
    const AUTO = 0;

    /**
     * 24 x 24 modules
     */
    const TYPE_7 = 1;

    /**
     * 32 x 32 modules
     */
    const TYPE_9 = 2;

    /**
     * 16 x 48 modules
     */
    const TYPE_29 = 3;
}

/**
 * <p>
 * Specifies the different types of date formats for HIBC LIC.
 * </p>
 */
class HIBCLICDateFormat
{
    /**
     * <p>
     * YYYYMMDD format. Will be encoded in additional supplemental data.
     * </p>
     */
    const YYYYMMDD = 0;
    /**
     * <p>
     * MMYY format.
     * </p>
     */
    const MMYY = 1;
    /**
     * <p>
     * MMDDYY format.
     * </p>
     */
    const MMDDYY = 2;
    /**
     * <p>
     * YYMMDD format.
     * </p>
     */
    const YYMMDD = 3;
    /**
     * <p>
     * YYMMDDHH format.
     * </p>
     */
    const YYMMDDHH = 4;
    /**
     * <p>
     * Julian date format.
     * </p>
     */
    const YYJJJ = 5;
    /**
     * <p>
     * Julian date format with hours.
     * </p>
     */
    const YYJJJHH = 6;
    /**
     * <p>
     * Do not encode expiry date.
     * </p>
     */
    const NONE =7;
}

/**
 * <p>
 * HIBC PAS data location types.
 * </p>
 */
class HIBCPASDataLocation
{
    /**
     * <p>
     * A - Patient
     * </p>
     */
    const PATIENT = 0;
    /**
     * <p>
     * B - Patient Care Record
     * </p>
     */
    const PATIENT_CARE_RECORD = 1;
    /**
     * <p>
     * C - Specimen Container
     * </p>
     */
    const SPECIMEN_CONTAINER = 2;
    /**
     * <p>
     * D - Direct Patient Image Item
     * </p>
     */
    const DIRECT_PATIENT_IMAGE_ITEM = 3;
    /**
     * <p>
     * E - Business Record
     * </p>
     */
    const BUSINESS_RECORD = 4;
    /**
     * <p>
     * F - Medical Administration Record
     * </p>
     */
    const MEDICAL_ADMINISTRATION_RECORD = 5;
    /**
     * <p>
     * G - Library Reference Material
     * </p>
     */
    const LIBRARY_REFERENCE_MATERIAL = 6;
    /**
     * <p>
     * H - Devices and Materials
     * </p>
     */
    const DEVICES_AND_MATERIALS = 7;
    /**
     * <p>
     * I - Identification Card
     * </p>
     */
    const IDENTIFICATION_CARD = 8;
    /**
     * <p>
     * J - Product Container
     * </p>
     */
    const PRODUCT_CONTAINER = 9;
    /**
     * <p>
     * K - Asset data type
     * </p>
     */
    const ASSET = 10;
    /**
     * <p>
     * L - Surgical Instrument
     * </p>
     */
    const SURGICAL_INSTRUMENT = 11;
    /**
     * <p>
     * Z - User Defined
     * </p>
     */
    const USER_DEFINED = 25;
}

/**
 * <p>
 * HIBC PAS record's data types.
 * </p>
 */
class HIBCPASDataType
{
    /**
     * <p>
     * A - Labeler Identification Code
     * </p>
     */
    const LABELER_IDENTIFICATION_CODE = 0;
    /**
     * <p>
     * B - Service Identification
     * </p>
     */
    const SERVICE_IDENTIFICATION = 1;
    /**
     * <p>
     * C - Patient Identification
     * </p>
     */
    const PATIENT_IDENTIFICATION = 2;
    /**
     * <p>
     * D - Specimen Identification
     * </p>
     */
    const SPECIMEN_IDENTIFICATION = 3;
    /**
     * <p>
     * E - Personnel Identification
     * </p>
     */
    const PERSONNEL_IDENTIFICATION = 4;
    /**
     * <p>
     * F - Administrable Product Identification
     * </p>
     */
    const ADMINISTRABLE_PRODUCT_IDENTIFICATION = 5;
    /**
     * <p>
     * G - Implantable Product Information
     * </p>
     */
    const IMPLANTABLE_PRODUCT_INFORMATION = 6;
    /**
     * <p>
     * H - Hospital Item Identification
     * </p>
     */
    const HOSPITAL_ITEM_IDENTIFICATION = 7;
    /**
     * <p>
     * I - Medical Procedure Identification
     * </p>
     */
    const MEDICAL_PROCEDURE_IDENTIFICATION = 8;
    /**
     * <p>
     * J - Reimbursement Category
     * </p>
     */
    const REIMBURSEMENT_CATEGORY = 9;
    /**
     * <p>
     * K - Blood Product Identification
     * </p>
     */
    const BLOOD_PRODUCT_IDENTIFICATION = 10;
    /**
     * <p>
     * L - Demographic Data
     * </p>
     */
    const DEMOGRAPHIC_DATA = 11;
    /**
     * <p>
     * M - DateTime in YYYDDDHHMMG format
     * </p>
     */
    const DATE_TIME = 12;
    /**
     * <p>
     * N - Asset Identification
     * </p>
     */
    const ASSET_IDENTIFICATION = 13;
    /**
     * <p>
     * O - Purchase Order Number
     * </p>
     */
    const PURCHASE_ORDER_NUMBER = 14;
    /**
     * <p>
     * P - Dietary Item Identification
     * </p>
     */
    const DIETARY_ITEM_IDENTIFICATION = 15;
    /**
     * <p>
     * Q - Manufacturer Serial Number
     * </p>
     */
    const MANUFACTURER_SERIAL_NUMBER = 16;
    /**
     * <p>
     * R - Library Materials Identification
     * </p>
     */
    const LIBRARY_MATERIALS_IDENTIFICATION = 17;
    /**
     * <p>
     * S - Business Control Number
     * </p>
     */
    const BUSINESS_CONTROL_NUMBER = 18;
    /**
     * <p>
     * T - Episode of Care Identification
     * </p>
     */
    const EPISODE_OF_CARE_IDENTIFICATION = 19;
    /**
     * <p>
     * U - Health Industry Number
     * </p>
     */
    const HEALTH_INDUSTRY_NUMBER = 20;
    /**
     * <p>
     * V - Patient Visit ID
     * </p>
     */
    const PATIENT_VISIT_ID = 21;
    /**
     * <p>
     * X - XML Document
     * </p>
     */
    const XML_DOCUMENT = 22;
    /**
     * <p>
     * Z - User Defined
     * </p>
     */
    const USER_DEFINED = 25;
}

/**
 * Address type
 */
class  AddressType
{

    /**
     * Undetermined
     */
    const UNDETERMINED = 0;

    /**
     * Structured address
     */
    const STRUCTURED = 1;

    /**
     * Combined address elements
     */
    const COMBINED_ELEMENTS = 2;

    /**
     * Conflicting
     */
    const CONFLICTING = 3;
}

/**
 * SwissQR bill standard version
 */
class QrBillStandardVersion
{
    /**
     * Version 2.0
     */
    const V2_0 = 0;
}

?>