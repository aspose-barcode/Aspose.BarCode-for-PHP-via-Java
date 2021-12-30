<?php
require_once('Joint.php');

/**
 * Address of creditor or debtor.
 *
 * You can either set street, house number, postal code and town (type structured address)
 * or address line 1 and 2 (type combined address elements). The type is automatically set
 * once any of these fields is set. Before setting the fields, the address type is undetermined.
 * If fields of both types are set, the address type becomes conflicting.
 * Name and country code must always be set unless all fields are empty.
 */
final class Address extends BaseJavaClass
{
    private static $javaClassName = "com.aspose.mw.barcode.complexbarcode.MwAddress";

    public function __construct($arg)
    {
        parent::__construct(self::initAddress($arg));
    }

    private static function initAddress($arg)
    {
        try
        {
            if (is_null($arg))
            {
                return new java(self::$javaClassName);
            }
            return $arg;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
        return java_cast($this->getJavaClass()->getType(), "integer");
    }

    /**
     * Gets the name, either the first and last name of a natural person or the
     * company name of a legal person.
     * @return string The name.
     */
    public function getName(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getName(), "string");
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
    public function setName(string $value): void
    {
        try
        {
            $this->getJavaClass()->setName($value);
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
    public function getAddressLine1(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getAddressLine1(), "string");
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
    public function setAddressLine1(string $value): void
    {
        try
        {
            $this->getJavaClass()->setAddressLine1($value);
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
    public function getAddressLine2(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getAddressLine2(), "string");
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
    public function setAddressLine2(string $value): void
    {
        try
        {
            $this->getJavaClass()->setAddressLine2($value);
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
    public function getStreet(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getStreet(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
    public function setStreet(string $value): void
    {
        try
        {
            $this->getJavaClass()->setStreet($value);
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
    public function getHouseNo(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getHouseNo(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
    public function setHouseNo(string $value): void
    {
        try
        {
            $this->getJavaClass()->setHouseNo($value);
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
    public function getPostalCode(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getPostalCode(), "string");
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
    public function setPostalCode(string $value): void
    {
        try
        {
            $this->getJavaClass()->setPostalCode($value);
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
    public function getTown(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getTown(), "string");
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
    public function setTown(string $value): void
    {
        try
        {
            $this->getJavaClass()->setTown($value);
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
    public function getCountryCode(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCountryCode(), "string");
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
    public function setCountryCode(string $value): void
    {
        try
        {
            $this->getJavaClass()->setCountryCode($value);
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
            $this->setaddressLine2(null);
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
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the hash code for this instance.
     * @return int A hash code for the current object.
     */
    public function hashCode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->hashCode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    protected function init(): void
    {
        // TODO: Implement init() method.
    }
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
 * Alternative payment scheme instructions
 */
final class AlternativeScheme extends BaseJavaClass
{
    private static $javaClassName = "com.aspose.mw.barcode.complexbarcode.MwAlternativeScheme";

    public function __construct($instruction)
    {
        try
        {
            parent::__construct(new java(self::$javaClassName, $instruction));
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
            $phpClass->setJavaClass($javaClass);
            return $phpClass;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
            return java_cast($this->getJavaClass()->getInstruction(), "string");
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
            $this->getJavaClass()->setInstruction($value);
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
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the hash code for this instance.
     * @return int hash code for the current object.
     */
    public function hashCode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->hashCode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    protected function init(): void
    {
        // TODO: Implement init() method.
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
    private static $javaClassName = "com.aspose.mw.barcode.complexbarcode.MwComplexCodetextReader";

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
            $javaPhpComplexCodetextReader = java(self::$javaClassName);
            return SwissQRCodetext::construct($javaPhpComplexCodetextReader->tryDecodeSwissQR($encodedCodetext));
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
            $javaPhpComplexCodetextReader = java(self::$javaClassName);
            return Mailmark2DCodetext::construct($javaPhpComplexCodetextReader->tryDecodeMailmark2D($encodedCodetext));
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
        $res = new MailmarkCodetext(null);
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

/**
 * SwissQR bill data
 */
final class SwissQRBill extends BaseJavaClass
{
    private $creditor;
    private $debtor;

    protected function init(): void
    {
        try
        {
            $this->creditor = new Address($this->getJavaClass()->getCreditor());
            $this->debtor = new Address($this->getJavaClass()->getDebtor());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function __construct($javaClass)
    {
        try
        {
            parent::__construct($javaClass);
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
            for ($i = 0; $i < java_cast($javaAlternativeSchemes->size(), "integer"); $i++)
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
            return java_cast($this->getJavaClass()->getVersion(), "integer");
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
            $this->getJavaClass()->setVersion($value);
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
            return java_cast($this->getJavaClass()->getAmount(), "double");
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
            $this->getJavaClass()->setAmount($value);
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
            return java_cast($this->getJavaClass()->getCurrency(), "string");
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
            $this->getJavaClass()->setCurrency($value);
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
    public function getAccount(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getAccount(), "string");
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
            $this->getJavaClass()->setAccount($value);
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
            $this->getJavaClass()->setCreditor($value->getJavaClass());
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
            return java_cast($this->getJavaClass()->getReference(), "string");
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
            $this->getJavaClass()->setReference($value);
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
            $this->getJavaClass()->createAndSetCreditorReference($rawReference);
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
            $this->getJavaClass()->setDebtor($value->getJavaClass());
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
            return java_cast($this->getJavaClass()->getUnstructuredMessage(), "string");
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
            $this->getJavaClass()->setUnstructuredMessage($value);
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
            return java_cast($this->getJavaClass()->getBillInformation(), "string");
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
            $this->getJavaClass()->setBillInformation($value);
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
            return self::convertAlternativeSchemes($this->getJavaClass()->getAlternativeSchemes());
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
     * @param array $value The alternative payment schemes.
     */
    public function setAlternativeSchemes(array $value): void
    {
        try
        {
            $javaArray = array();
            for ($i = 0; $i < sizeof($value); $i++)
            {
                array_push($javaArray, $value[$i]->getJavaClass());
            }
            $this->getJavaClass()->setAlternativeSchemes($javaArray);
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
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the hash code for this instance.
     * @return int A hash code for the current object.
     */
    public function hashCode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->hashCode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Class for encoding and decoding the text embedded in the SwissQR code.
 */
final class SwissQRCodetext extends IComplexCodetext
{
    private static $javaClassName = "com.aspose.mw.barcode.complexbarcode.MwSwissQRCodetext";
    private $bill;

    protected function init(): void
    {
        try
        {
            $this->bill = new SwissQRBill($this->getJavaClass()->getBill());
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
     * Creates an instance of SwissQRCodetext.
     *
     * @param SwissQRBill $bill SwissQR bill data
     * @throws BarcodeException
     */
    public function __construct(?SwissQRBill $bill)
    {
        try
        {
            $javaBill = null;
            if (is_null($bill))
            {
                $javaBill = new java(self::$javaClassName);
            }
            else
            {
                $javaBill = new java(self::$javaClassName, $bill->getJavaClass());
            }
            parent::__construct($javaBill);
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
            $phpClass = new SwissQRCodetext(null);
            $phpClass->setJavaClass($javaClass);
            return $phpClass;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
            return java_cast($this->getJavaClass()->getConstructedCodetext(), "string");
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
            $this->getJavaClass()->initFromString($constructedCodetext);
            $this->init();
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
            return java_cast($this->getJavaClass()->getBarcodeType(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
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
final class ComplexBarcodeGenerator extends BaseJavaClass
{
    private static $javaClassName = "com.aspose.mw.barcode.complexbarcode.MwComplexBarcodeGenerator";
    private $parameters;

    protected function init(): void
    {
        try
        {
            $this->parameters = new BaseGenerationParameters($this->getJavaClass()->getParameters());
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
     * Creates an instance of ComplexBarcodeGenerator.
     *
     * @param IComplexCodetext $complexCodetext complexCodetext Complex codetext
     */
    public function __construct(IComplexCodetext $complexCodetext)
    {
        try
        {
            parent::__construct(new java(self::$javaClassName, $complexCodetext->getJavaClass()));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
    public function generateBarcodeImage(int $format): string
    {
        try
        {
            $base64Image = java_cast($this->getJavaClass()->generateBarcodeImage($format), "string");
            return ($base64Image);
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


/**
 * Class for encoding and decoding the text embedded in the 4-state Royal Mailmark code.
 */
final class MailmarkCodetext extends IComplexCodetext
{
    private static $javaClassName = "com.aspose.mw.barcode.complexbarcode.MwMailmarkCodetext";
    /**
     * "0" – Null or Test
     * "1" – Letter
     * "2" – Large Letter
     */
    public function getFormat():int { return java_cast($this->getJavaClass()->getFormat(), "int"); }
    /**
     * "0" – Null or Test
     * "1" – LetterN
     * "2" – Large Letter
     */
    public function setFormat(int $value){ $this->getJavaClass()->setFormat($value); }

    /**
     * Currently "1" – For Mailmark barcode (0 and 2 to 9 and A to Z spare for future use)
     */
    public function getVersionID():int{ return java_cast($this->getJavaClass()->getVersionID(), "int"); }

    /**
     * Currently "1" – For Mailmark barcode (0 and 2 to 9 and A to Z spare for future use)
     */
    public function setVersionID(int $value){ $this->getJavaClass()->setVersionID($value); }

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
    public function  getClass_():string{ return java_cast($this->getJavaClass()->getClass_(), "string"); }

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
    public function setClass(string $value){ $this->getJavaClass()->setClass($value); }

    /**
     * Maximum values are 99 for Barcode C and 999999 for Barcode L.
     */
    public function getSupplychainID():int{ return java_cast($this->getJavaClass()->getSupplychainID(), "int"); }
    /**
     * Maximum values are 99 for Barcode C and 999999 for Barcode L.
     */
    public function setSupplychainID(int $value){ $this->getJavaClass()->setSupplychainID($value); }

    /**
     * Maximum value is 99999999.
     */
    public function getItemID():int{ return java_cast($this->getJavaClass()->getItemID(), "int"); }
    /**
     * Maximum value is 99999999.
     */
    public function setItemID(int $value){ $this->getJavaClass()->setItemID($value); }

    /**
     * The PC and DP must comply with a PAF format.
     * Nine character string denoting international "XY11     " (note the 5 trailing spaces) or a pattern
     * of characters denoting a domestic sorting code.
     * A domestic sorting code consists of an outward postcode, an inward postcode, and a Delivery Point Suffix.
     */
    public function getDestinationPostCodePlusDPS():string{ return java_cast($this->getJavaClass()->getDestinationPostCodePlusDPS(), "string"); }

    /**
     * The PC and DP must comply with a PAF format.
     * Nine character string denoting international "XY11     " (note the 5 trailing spaces) or a pattern
     * of characters denoting a domestic sorting code.
     * A domestic sorting code consists of an outward postcode, an inward postcode, and a Delivery Point Suffix.
     */
    public function setDestinationPostCodePlusDPS(string $value){ $this->getJavaClass()->setDestinationPostCodePlusDPS($value); }

    /**
     * Initializes a new instance of the {@code MailmarkCodetext} class.
     */
    public function __construct(?MailmarkCodetext $mailmarkCodetext)
    {
        $javaClass = null;
        if (is_null($mailmarkCodetext))
        {
            $javaClass = new java(self::$javaClassName);
        }
        else
        {
            $javaClass = new java(self::$javaClassName, $mailmarkCodetext->getJavaClass());
        }
        parent::__construct($javaClass);
    }

    protected function init():void {}

    /**
     * Construct codetext from Mailmark data.
     *
     * @return string Constructed codetext
     */
    public function getConstructedCodetext():string
    {
        return $this->getJavaClass()->getConstructedCodetext();
    }

    /**
     * Initializes Mailmark data from constructed codetext.
     *
     * @param string $constructedCodetext Constructed codetext.
     */
    public function initFromString($constructedCodetext):void
    {
        $this->getJavaClass()->initFromString($constructedCodetext);
    }

    /**
     * Gets barcode type.
     *
     * @return int Barcode type.
     */
    public function getBarcodeType():int
    {
        $barcode_type = java_cast($this->getJavaClass()->getBarcodeType(), "integer");
        return $barcode_type;
    }
}

/**
 * Class for encoding and decoding the text embedded in the Royal Mail 2D Mailmark code.
 */
final class Mailmark2DCodetext extends IComplexCodetext
{

    private static $javaClassName = "com.aspose.mw.barcode.complexbarcode.MwMailmark2DCodetext";

    static function construct($javaClass)
    {
        try
        {
            $phpClass = new Mailmark2DCodetext();
            $phpClass->setJavaClass($javaClass);
            return $phpClass;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the UPU Country ID.Max length: 4 characters.
     * @return string Country ID
     */
    public function getUPUCountryID(): string
    {
        return java_cast($this->getJavaClass()->getUPUCountryID(), "string");
    }

    /**
     * Identifies the UPU Country ID.Max length: 4 characters.
     * @param string $value Country ID
     */
    public function setUPUCountryID(string $value): void
    {
        try
        {
            $this->getJavaClass()->setUPUCountryID($value);
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
     * “0” - Domestic Sorted &amp; Unsorted
     * “A” - Online Postage
     * “B” - Franking
     * “C” - Consolidation
     *
     * @return string Information type ID
     */
    public function getInformationTypeID(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getInformationTypeID(), "string");
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
     * “0” - Domestic Sorted &amp; Unsorted
     * “A” - Online Postage
     * “B” - Franking
     * “C” - Consolidation
     *
     * @param string $value Information type ID
     */
    public function setInformationTypeID(string $value): void
    {
        try
        {
            $this->getJavaClass()->setInformationTypeID($value);
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
     * Currently “1”.
     * “0” &amp; “2” to “9” and “A” to “Z” spare reserved for potential future use.
     *
     * @return string Version ID
     */
    public function getVersionID(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getVersionID(), "string");
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
     * Currently “1”.
     * “0” &amp; “2” to “9” and “A” to “Z” spare reserved for potential future use.
     *
     * @param string $value Version ID
     */
    public function setVersionID(string $value): void
    {
        try
        {
            $this->getJavaClass()->setVersionID($value);
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
     * “1” - 1C (Retail)
     * “2” - 2C (Retail)
     * “3” - Economy (Retail)
     * “5” - Deffered (Retail)
     * “8” - Premium (Network Access)
     * “9” - Standard (Network Access)
     *
     * @return string class of the item
     */
    public function getclass(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getclass(), "string");
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
     * “1” - 1C (Retail)
     * “2” - 2C (Retail)
     * “3” - Economy (Retail)
     * “5” - Deffered (Retail)
     * “8” - Premium (Network Access)
     * “9” - Standard (Network Access)
     *
     * @param string $value class of the item
     */
    public function setclass(string $value): void
    {
        try
        {
            $this->getJavaClass()->setclass($value);
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
            return java_cast($this->getJavaClass()->getSupplyChainID(), "integer");
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
            $this->getJavaClass()->setSupplyChainID($value);
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
            return java_cast($this->getJavaClass()->getItemID(), "integer");
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
            $this->getJavaClass()->setItemID($value);
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
            return java_cast($this->getJavaClass()->getDestinationPostCodeAndDPS(), "string");
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
            $this->getJavaClass()->setDestinationPostCodeAndDPS($value);
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
            return java_cast($this->getJavaClass()->getRTSFlag(), "string");
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
            $this->getJavaClass()->setRTSFlag($value);
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
            return java_cast($this->getJavaClass()->getReturnToSenderPostCode(), "string");
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
            $this->getJavaClass()->setReturnToSenderPostCode($value);
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
            return java_cast($this->getJavaClass()->getCustomerContent(), "string");
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
            $this->getJavaClass()->setCustomerContent($value);
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
            return java_cast($this->getJavaClass()->getCustomerContentEncodeMode(), "integer");
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
            $this->getJavaClass()->setCustomerContentEncodeMode($value);
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
            return java_cast($this->getJavaClass()->getDataMatrixType(), "integer");
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
            $this->getJavaClass()->setDataMatrixType($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Create default instance of Mailmark2DCodetext class.
     */
    public function __construct()
    {
        try
        {
            parent::__construct(new java(self::$javaClassName));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function init(): void
    {
    }

    /**
     * Construct codetext from Mailmark data.
     * @return string Constructed codetext
     */
    public function getConstructedCodetext(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getConstructedCodetext(), "string");
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
            $this->getJavaClass()->initFromString($constructedCodetext);
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
        $barcode_type = java_cast($this->getJavaClass()->getBarcodeType(), "integer");
        return $barcode_type;
    }
}

/**
 * <p>
 * Interface for complex codetext used with ComplexBarcodeGenerator.
 * </p>
 */
abstract class IComplexCodetext extends BaseJavaClass
{
    function __construct($javaClass)
    {
        try
        {
            parent::__construct($javaClass);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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

?>