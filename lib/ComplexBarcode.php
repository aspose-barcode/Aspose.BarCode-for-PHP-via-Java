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

    /**
     * Decodes MaxiCode codetext.
     * @param int maxiCodeMode MaxiCode mode
     * @param string encodedCodetext encoded codetext
     * @return MaxiCodeCodetext Decoded MaxiCode codetext.
     */
    public static function tryDecodeMaxiCode(int $maxiCodeMode, string $encodedCodetext) : MaxiCodeCodetext
    {
        $javaComplexCodetextReaderClass = java(self::$javaClassName);
        $javaMaxiCodeCodetextMode2Class = java(MaxiCodeCodetextMode2::JAVA_CLASS_NAME);
        $javaMaxiCodeCodetextMode3Class = java(MaxiCodeCodetextMode3::JAVA_CLASS_NAME);
        $javaMaxiCodeCodetext =  $javaComplexCodetextReaderClass->tryDecodeMaxiCode($maxiCodeMode, $encodedCodetext);

        if(java_instanceof($javaMaxiCodeCodetext, $javaMaxiCodeCodetextMode2Class))
        {
            return MaxiCodeCodetextMode2::construct($javaMaxiCodeCodetext);
        }
        elseif(java_instanceof($javaMaxiCodeCodetext, $javaMaxiCodeCodetextMode3Class))
        {
            return MaxiCodeCodetextMode3::construct($javaMaxiCodeCodetext);
        }
        else
        {
            return MaxiCodeStandardCodetext::construct($javaMaxiCodeCodetext);
        }
    }

    /**
     * <p>
     * Decodes HIBC LIC codetext.
     * </p>
     * @return decoded HIBC LIC Complex Codetext or null.
     * @param encodedCodetext encoded codetext
     */
    public static function tryDecodeHIBCLIC(string $encodedCodetext) : ?HIBCLICComplexCodetext
    {
        $javaHIBCLICSecondaryAndAdditionalDataCodetextClass = java(HIBCLICSecondaryAndAdditionalDataCodetext::JAVA_CLASS_NAME);
        $javaHIBCLICPrimaryDataCodetextClass = java(HIBCLICPrimaryDataCodetext::JAVA_CLASS_NAME);
        $javaHIBCLICCombinedCodetextClass = java(HIBCLICCombinedCodetext::JAVA_CLASS_NAME);
        $javaPhpComplexCodetextReaderJavaClass = java(self::$javaClassName);
        $hibclicComplexCodetext = $javaPhpComplexCodetextReaderJavaClass->tryDecodeHIBCLIC($encodedCodetext);
        if(java_instanceof($hibclicComplexCodetext, $javaHIBCLICSecondaryAndAdditionalDataCodetextClass))
        {
            return HIBCLICSecondaryAndAdditionalDataCodetext::construct($hibclicComplexCodetext);
        }
        else if(java_instanceof($hibclicComplexCodetext, $javaHIBCLICPrimaryDataCodetextClass))
        {
            return HIBCLICPrimaryDataCodetext::construct($hibclicComplexCodetext);
        }
        else if(java_instanceof($hibclicComplexCodetext, $javaHIBCLICCombinedCodetextClass))
        {
            return HIBCLICCombinedCodetext::construct($hibclicComplexCodetext);
        }
        return null;
    }

    /**
     * <p>
     * Decodes HIBC PAS codetext.
     * </p>
     * @return decoded HIBC PAS Complex Codetext or null.
     * @param encodedCodetext encoded codetext
     */
    public static function tryDecodeHIBCPAS(string $encodedCodetext) : ?HIBCPASCodetext
    {
        $javaPhpComplexCodetextReader = java(ComplexCodetextReader::$javaClassName);
        $javaHIBCPAS = $javaPhpComplexCodetextReader->tryDecodeHIBCPAS($encodedCodetext);
        if(java_is_null($javaHIBCPAS))
            return null;
        return HIBCPASCodetext::construct($javaHIBCPAS);
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
        return java_cast($this->getJavaClass()->getConstructedCodetext(), "string");
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
     * Gets MaxiCode mode.
     * @return MaxiCode mode
     */
    public abstract function getMode() : int;

    /**
     * Gets a MaxiCode encode mode.
     */
    public function getMaxiCodeEncodeMode() : int
    {
        return java_cast($this->getJavaClass()->getMaxiCodeEncodeMode(), "integer");
    }

    /**
     * Sets a MaxiCode encode mode.
     */
    public function setMaxiCodeEncodeMode(int $value) : void
    {
        $this->getJavaClass()->setMaxiCodeEncodeMode($value);
    }



    /**
     * Gets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     */
    public function getECIEncoding() : int
    {
        return java_cast($this->getJavaClass()->getECIEncoding(), "integer");
    }

    /**
     * Sets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     */
    public function setECIEncoding(int $value) : void
    {
        $this->getJavaClass()->setECIEncoding($value);
    }

    /**
     * Gets barcode type.
     * @return Barcode type
     */
    public function getBarcodeType() : int
    {
        return java_cast($this->getJavaClass()->getBarcodeType(), "integer");
    }
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
    const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwMaxiCodeCodetextMode2";

    function __construct()
    {
        try
        {
            $java_class = new java(self::JAVA_CLASS_NAME);
            parent::__construct($java_class);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($javaClass)
    {
        $_class = new MaxiCodeCodetextMode2();
        $_class->setJavaClass($javaClass);

        return $_class;
    }

    /**
     * Gets MaxiCode mode.
     * @return int MaxiCode mode
     */
    public function getMode() : int
    {
        return java_cast($this->getJavaClass()->getMode(), "integer");
    }

    protected function init() : void
    {
        parent::init();
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
    const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwMaxiCodeCodetextMode3";

    function __construct()
    {
        try
        {
            $java_class = new java(self::JAVA_CLASS_NAME);
            parent::__construct($java_class);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($javaClass)
    {
        $_class = new MaxiCodeCodetextMode3();
        $_class->setJavaClass($javaClass);

        return $_class;
    }

    /**
     * Gets MaxiCode mode.
     * @return int MaxiCode mode
     */
    public function getMode() : int
    {
        return java_cast($this->getJavaClass()->getMode(), "integer");
    }

    protected function init() : void
    {
        parent::init();
    }
}

/**
 * Base class for encoding and decoding second message for MaxiCode barcode.
 */
abstract class MaxiCodeSecondMessage extends BaseJavaClass
{
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
    const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwMaxiCodeStandardCodetext";

    function __construct()
    {
        try
        {
            $java_class = new java(self::JAVA_CLASS_NAME);
            parent::__construct($java_class);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($javaClass)
    {
        $_class = new MaxiCodeStandardCodetext();
        $_class->setJavaClass($javaClass);

        return $_class;
    }

    /**
     * Gets message.
     */
    public function getMessage() : string
    {
        return java_cast($this->getJavaClass()->getMessage(), "string");
    }

    /**
     * Sets message.
     */
    public function setMessage(string $value) : void
    {
        $this->getJavaClass()->setMessage($value);
    }

    /**
     * Sets MaxiCode mode. Standart codetext can be used only with modes 4, 5 and 6.
     */
    public function setMode(int $mode) : void
    {
        $this->getJavaClass()->setMode($mode);
    }

    /**
     * Gets MaxiCode mode.
     * @return int MaxiCode mode
     */
    public function getMode() : int
    {
        return java_cast($this->getJavaClass()->getMode(),"integer");
    }

    /**
     * Constructs codetext
     * @return string Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        return java_cast($this->getJavaClass()->getConstructedCodetext(),"string");
    }

    /**
     * Initializes instance from constructed codetext.
     * @param string constructedCodetext Constructed codetext.
     */
    public function initFromString(string $constructedCodetext) : void
    {
        $this->getJavaClass()->initFromString($constructedCodetext);
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified <see cref="MaxiCodeStandardCodetext"/> value.
     * @param object obj An <see cref="MaxiCodeStandardCodetext"/> value to compare to this instance.
     * @return bool if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals($obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     * @return int A 32-bit signed integer hash code
     */
    public function getHashCode() : int
    {
        return java_cast($this->getJavaClass()->getHashCode(), "integer");
    }

    protected function init() : void
    {

    }
}

/**
 * Class for encoding and decoding standart second message for MaxiCode barcode.
 */
class MaxiCodeStandartSecondMessage extends MaxiCodeSecondMessage
{
    private const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwMaxiCodeStandartSecondMessage";

    function __construct()
    {
        try
        {
            $java_class = new java(self::JAVA_CLASS_NAME);
            parent::__construct($java_class);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets second message
     */
    public function setMessage(string $value)
    {
        $this->getJavaClass()->setMessage($value);
    }

    /**
     * Gets constructed second message
     * @return string Constructed second message
     */
    public function getMessage() : string
    {
        return java_cast($this->getJavaClass()->getMessage(), "string");
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified <see cref="MaxiCodeStandartSecondMessage"/> value.
     * @param object obj An <see cref="MaxiCodeStandartSecondMessage"/> value to compare to this instance
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals($obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     * @return int A 32-bit signed integer hash code.
     */
    public function getHashCode() : int
    {
        return java_cast($this->getJavaClass()->getHashCode(), "function");
    }

    protected function init() : void
    {
    }
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
    private const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwMaxiCodeStructuredCodetext";

    private $maxiCodeSecondMessage;

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

    protected function init() : void
    {
        $javaMaxiCodeSecondMessage = $this->getJavaClass()->getSecondMessage();
        $javaMaxiCodeStandartSecondMessage=new java_class("com.aspose.mw.barcode.complexbarcode.MwMaxiCodeStandartSecondMessage");
        $javaMaxiCodeStructuredSecondMessage=new java_class("com.aspose.mw.barcode.complexbarcode.MwMaxiCodeStructuredSecondMessage");

        if(java_instanceof($javaMaxiCodeSecondMessage, $javaMaxiCodeStandartSecondMessage))
        {
            $this->maxiCodeSecondMessage = new MaxiCodeStandartSecondMessage($this->getJavaClass()->getSecondMessage());
        }
        else if(java_instanceof($javaMaxiCodeSecondMessage, $javaMaxiCodeStructuredSecondMessage))
        {
            $this->maxiCodeSecondMessage = new MaxiCodeStructuredSecondMessage($this->getJavaClass()->getSecondMessage());
        }
    }

    /**
     * Identifies the postal code. Must be 9 digits in mode 2 or
     * 6 alphanumeric symbols in mode 3.
     */
    public function getPostalCode() : string
    {
        return java_cast($this->getJavaClass()->getPostalCode(), "string");
    }

    /**
     * Identifies 3 digit country code.
     */
    public function getCountryCode() : int
    {
        return java_cast($this->getJavaClass()->getCountryCode(), "integer");
    }

    /**
     * Identifies 3 digit country code.
     */
    public function setCountryCode(int $value) : void
    {
        $this->getJavaClass()->setCountryCode($value);
    }

    /**
     * Identifies 3 digit service category.
     */
    public function getServiceCategory() : int
    {
        return java_cast($this->getJavaClass()->getServiceCategory(), "integer");
    }

    /**
     * Identifies 3 digit service category.
     */
    public function setServiceCategory(int $value) : void
    {
        $this->getJavaClass()->setServiceCategory($value);
    }

    /**
     * Identifies second message of the barcode.
     */
    public function getSecondMessage() : MaxiCodeSecondMessage
    {
        return $this->maxiCodeSecondMessage;
    }

    /**
     * Identifies second message of the barcode.
     */
    public function setSecondMessage(MaxiCodeSecondMessage $value)
    {
        $this->maxiCodeSecondMessage = $value;
        $this->getJavaClass()->setSecondMessage($value->getJavaClass());
    }

    /**
     * Constructs codetext
     * @return string Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        return java_cast($this->getJavaClass()->getConstructedCodetext(), "string");
    }

    /**
     * Initializes instance from constructed codetext.
     * @param string $constructedCodetext Constructed codetext.
     */
    public function initFromString(string $constructedCodetext) : void
    {
        $this->getJavaClass()->initFromString($constructedCodetext);
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified <see cref="MaxiCodeStructuredCodetext"/> value.
     * @param object $obj An <see cref="MaxiCodeStructuredCodetext"/> value to compare to this instance.
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals($obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     * @return int A 32-bit signed integer hash code.
     */
    public function getHashCode() : int
    {
        return $this->getJavaClass()->getHashCode();
    }
}

/**
 * Class for encoding and decoding structured second message for MaxiCode barcode.
 */
class MaxiCodeStructuredSecondMessage extends MaxiCodeSecondMessage
{
    private const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwMaxiCodeStructuredSecondMessage";

    function __construct()
    {
        try
        {
            $java_class = new java(self::JAVA_CLASS_NAME);
            parent::__construct($java_class);
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
        return java_cast($this->getJavaClass()->getYear(), "integer");
    }

    /**
     *  Sets year. Year must be 2 digit integer value.
     */
    public function setYear(int $value) : void
    {
        $this->getJavaClass()->setYear($value);
    }

    /**
     * Gets identifiers list
     * @return array List of identifiers
     */
    public function getIdentifiers() : array
    {
        $identifiers_string = java_cast($this->getJavaClass()->getIdentifiers(), "string");
        $delimeter = "\\/\\";
        $identifiers = explode($delimeter, $identifiers_string);

        return $identifiers;
    }

    /**
     * Adds new identifier
     * @param string $identifier Identifier to be added
     */
    public function add(string $identifier) : void
    {
        $this->getJavaClass()->add($identifier);
    }

    /**
     * Clear identifiers list
     */
    public function clear() : void
    {
        $this->getJavaClass()->clear();
    }

    /**
     * Gets constructed second message
     * @return string Constructed second message
     */
    public function getMessage() : string
    {
        return java_cast($this->getJavaClass()->getMessage(), "string");
    }
    
    /**
     * Returns a value indicating whether this instance is equal to a specified <see cref="MaxiCodeStructuredSecondMessage"/> value.
     * @param object $obj An <see cref="MaxiCodeStructuredSecondMessage"/> value to compare to this instance.
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals($obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     * @return int A 32-bit signed integer hash code.
     */
    public function getHashCode() : int
    {
        return java_cast($this->getJavaClass()->getHashCode(), "integer");
    }

    protected function init() : void
    {

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
    public const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwHIBCLICCombinedCodetext";

    function __construct()
    {
        $javaClass = new java(self::JAVA_CLASS_NAME);
        parent::__construct($javaClass);
    }

    static function construct($javaClass) : HIBCLICCombinedCodetext
    {
        $obj = new HIBCLICCombinedCodetext();
        $obj->setJavaClass($javaClass);
        return $obj;
    }

    protected function init() : void
    {
        $this->auto_PrimaryData = PrimaryData::construct($this->getJavaClass()->getPrimaryData());
        $this->auto_SecondaryAndAdditionalData = SecondaryAndAdditionalData::construct($this->getJavaClass()->getSecondaryAndAdditionalData());
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
        $this->getJavaClass()->setPrimaryData($value->getJavaClass());
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
        $this->getJavaClass()->setSecondaryAndAdditionalData($value->getJavaClass());
        $this->auto_SecondaryAndAdditionalData = $value;
    }

    private $auto_SecondaryAndAdditionalData;

    /**
     * <p>
     * Constructs codetext
     * </p>
     *
     * @return Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        return java_cast($this->getJavaClass()->getConstructedCodetext(), "string");
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     *
     * @param constructedCodetext Constructed codetext.
     */
    public function initFromString(string $constructedCodetext) : void
    {
        $this->getJavaClass()->initFromString($constructedCodetext);
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
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     *
     * @return A 32-bit signed integer hash code.
     */
    public  function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
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
    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }
    /**
     * <p>
     * Constructs codetext
     * </p>
     * @return Constructed codetext
     */
    public abstract function getConstructedCodetext() : string;

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     * @param constructedCodetext Constructed codetext.
     */
    public abstract function initFromString(string $constructedCodetext) : void;

    /**
     * <p>
     * Gets or sets barcode type. HIBC LIC codetext can be encoded using HIBCCode39LIC, HIBCCode128LIC, HIBCAztecLIC, HIBCDataMatrixLIC and HIBCQRLIC encode types.
     * Default value: HIBCCode39LIC.
     * </p>
     * @return Barcode type.
     */
    public function getBarcodeType() : int
    {
        return java_cast($this->getJavaClass()->getBarcodeType(), "integer");
    }
    /**
     * <p>
     * Gets or sets barcode type. HIBC LIC codetext can be encoded using HIBCCode39LIC, HIBCCode128LIC, HIBCAztecLIC, HIBCDataMatrixLIC and HIBCQRLIC encode types.
     * Default value: HIBCCode39LIC.
     * </p>
     * @return Barcode type.
     */
    public function setBarcodeType(int $value) : void
    {
        $this->getJavaClass()->setBarcodeType($value);
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
    const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwHIBCLICPrimaryDataCodetext";

    function __construct()
    {
        parent::__construct(new java(HIBCLICPrimaryDataCodetext::JAVA_CLASS_NAME));
    }

    static function construct($java_class) : HIBCLICPrimaryDataCodetext
    {
        $obj = new HIBCLICPrimaryDataCodetext();
        $obj->setJavaClass($java_class);
        return $obj;
    }

    protected function init() : void
    {
        $this->data = PrimaryData::construct($this->getJavaClass()->getData());
    }

    private $data;

    /**
     * <p>
     * Identifies primary data.
     * </p>
     */
    public function getData() : PrimaryData
    {
        return $this->data;
    }

    /**
     * <p>
     * Identifies primary data.
     * </p>
     */
    public function setData(PrimaryData $value) : void
    {
        $this->getJavaClass()->setData($value->getJavaClass());
        $this->data = $value;
    }

    /**
     * <p>
     * Constructs codetext
     * </p>
     *
     * @return Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        return $this->getJavaClass()->getConstructedCodetext();
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     *
     * @param constructedCodetext Constructed codetext.
     */
    public function initFromString(string $constructedCodetext) : void
    {
        $this->getJavaClass()->initFromString($constructedCodetext);
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCLICPrimaryDataCodetext} value.
     * </p>
     *
     * @param obj An {@code HIBCLICPrimaryDataCodetext} value to compare to this instance.
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     */
    function equals(HIBCLICPrimaryDataCodetext $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode() : int
    {
        return $this->getJavaClass()->hashCode();
    }
}


/**
 * <p>
 * Class for encoding and decoding the text embedded in the HIBC LIC code which stores seconday data.
 * </p>
 */
class HIBCLICSecondaryAndAdditionalDataCodetext extends HIBCLICComplexCodetext
{
    const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwHIBCLICSecondaryAndAdditionalDataCodetext";
    private $data;

    function __construct()
    {
        parent::__construct(new java(HIBCLICSecondaryAndAdditionalDataCodetext::JAVA_CLASS_NAME));
    }

    static function construct($java_class) : HIBCLICSecondaryAndAdditionalDataCodetext
    {
        $obj = new HIBCLICSecondaryAndAdditionalDataCodetext();
        $obj->setJavaClass($java_class);
        return $obj;
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
        $this->getJavaClass()->setData($value->getJavaClass());
        $this->data = $value;
    }

    /**
     * <p>
     * Identifies link character.
     * </p>
     */
    public function getLinkCharacter() : string
    {
        return java_cast($this->getJavaClass()->getLinkCharacter(), "string");
    }

    /**
     * <p>
     * Identifies link character.
     * </p>
     */
    public function setLinkCharacter(string $value) : void
    {
        $this->getJavaClass()->setLinkCharacter($value);
    }

    /**
     * <p>
     * Constructs codetext
     * </p>
     *
     * @return Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        return $this->getJavaClass()->getConstructedCodetext();
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     *
     * @param constructedCodetext Constructed codetext.
     */
    function initFromString(string $constructedCodetext) : void
    {
        $this->getJavaClass()->initFromString($constructedCodetext);
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCLICSecondaryAndAdditionalDataCodetext} value.
     * </p>
     *
     * @param obj An {@code HIBCLICSecondaryAndAdditionalDataCodetext} value to compare to this instance.
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     */
    public function equals(HIBCLICSecondaryAndAdditionalDataCodetext $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    protected function init() : void
    {
        $this->data = SecondaryAndAdditionalData::construct($this->getJavaClass()->getData());
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
    const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwHIBCPASCodetext";

    function __construct()
    {
        parent::__construct(new java(self::JAVA_CLASS_NAME));
    }

    /**
     * <p>
     * HIBCPASRecord constructor
     * </p>
     */
    static function construct($javaClass) : HIBCPASCodetext
    {
        $obj = new HIBCPASCodetext();
        $obj->setJavaClass($javaClass);
        return $obj;
    }

    protected function init() : void
    {

    }

    /**
     * <p>
     * Gets or sets barcode type. HIBC PAS codetext can be encoded using HIBCCode39PAS, HIBCCode128PAS, HIBCAztec:PAS, HIBCDataMatrixPAS and HIBCQRPAS encode types.
     * Default value: HIBCCode39PAS.
     * </p>
     * @return Barcode type.
     */
    public function setBarcodeType(int $value) : void
    {
        $this->getJavaClass()->setBarcodeType($value);
    }

    /**
     * <p>
     * Identifies data location.
     * </p>
     */
    public function getDataLocation() : int
    {
        return java_cast($this->getJavaClass()->getDataLocation(), "integer");
    }
    /**
     * <p>
     * Identifies data location.
     * </p>
     */
    public function setDataLocation(int $value) : void
    {
        $this->getJavaClass()->setDataLocation($value);
    }

    /**
     * <p>
     * Gets records list
     * </p>
     * @return List of records
     */
    function getRecords() : array
    {
        $_array = array();
        $mwRecordsList = $this->getJavaClass()->getRecords();
        $listSize = java_cast($mwRecordsList->size(), "integer");
        for ($i = 0; $i < $listSize; $i++)
        {
            $mwhibcpasRecord = $mwRecordsList->get($i);
            array_push($_array, HIBCPASRecord::construct($mwhibcpasRecord));
        }
        return $_array;
    }

    /**
     * <p>
     * Adds new record
     * </p>
     * @param dataType Type of data
     * @param data Data string
     */
    public function addRecord(int $dataType, string $data) : void
    {
        $this->getJavaClass()->addRecord($dataType, $data);
    }

    /**
     * <p>
     * Adds new record
     * </p>
     * @param record Record to be added
     */
    public function addHIBCPASRecord(HIBCPASRecord $record) : void
    {
        $this->getJavaClass()->addRecord($record->getJavaClass());
    }

    /**
     * <p>
     * Clears records list
     * </p>
     */
    public function clear() : void
    {
        $this->getJavaClass()->clear();
    }

    /**
     * <p>
     * Gets barcode type.
     * </p>
     * @return Barcode type.
     */
    public function getBarcodeType() : int
    {
        return java_cast($this->getJavaClass()->getBarcodeType(), "integer");
    }

    /**
     * <p>
     * Constructs codetext
     * </p>
     * @return Constructed codetext
     */
    public function getConstructedCodetext() : string
    {
        return java_cast($this->getJavaClass()->getConstructedCodetext(), "string");
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     * @param constructedCodetext Constructed codetext.
     */
    public function initFromString(string $constructedCodetext) : void
    {
        $this->getJavaClass()->initFromString($constructedCodetext);
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCPASCodetext} value.
     * </p>
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     * @param obj An {@code HIBCPASCodetext} value to compare to this instance.
     */
    public function equals(HIBCPASCodetext $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }
}

/**
 * <p>
 * Class for storing HIBC PAS record.
 * </p>
 */
class HIBCPASRecord extends BaseJavaClass
{
    const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwHIBCPASRecord";

    /**
     * <p>
     * HIBCPASRecord constructor
     * </p>
     *
     * @param dataType Type of data.
     * @param data     Data string.
     */
    function __construct(int $dataType, string $data)
    {
        parent::__construct(new java(self::JAVA_CLASS_NAME, $dataType, $data));
    }

    /**
     * <p>
     * HIBCPASRecord constructor
     * </p>
     */
    static function construct($javaClass) : HIBCPASRecord
    {
        $obj = new HIBCPASRecord(0,0);
        $obj->setJavaClass($javaClass);
        return $obj;
    }

    protected function init() : void
    {}

    /**
     * <p>
     * Identifies data type.
     * </p>
     */
    public function getDataType() : int
    {
        return java_cast($this->getJavaClass()->getDataType(), "integer");
    }

    /**
     * <p>
     * Identifies data type.
     * </p>
     */
    public function setDataType(int $value) : void
    {
        $this->getJavaClass()->setDataType($value);
    }

    /**
     * <p>
     * Identifies data.
     * </p>
     */
    public function getData() : string
    {
        return java_cast($this->getJavaClass()->getData(), "string");
    }

    /**
     * <p>
     * Identifies data.
     * </p>
     */
    public function setData(string $value) : void
    {
        $this->getJavaClass()->setData($value);
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCPASDataType} value.
     * </p>
     *
     * @param obj An {@code HIBCPASDataType} value to compare to this instance.
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     */
    public function equals(HIBCPASRecord $obj) : bool
    {
        return $this->getJavaClass()->equals($obj->getJavaClass());
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }
}


/**
 * <p>
 * Class for storing HIBC LIC primary data.
 * </p>
 */
class PrimaryData extends BaseJavaClass
{
    const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwPrimaryData";

    function __construct()
    {
        $java_class = new java(self::JAVA_CLASS_NAME);
        parent::__construct($java_class);
    }

    static function construct($java_class) : PrimaryData
    {
        $obj = new PrimaryData();
        $obj->setJavaClass($java_class);
        return $obj;
    }

    /**
     * <p>
     * Identifies date of labeler identification code.
     * Labeler identification code must be 4 symbols alphanumeric string, with first character always being alphabetic.
     * </p>
     */
    public function getLabelerIdentificationCode() : string
    {
        return java_cast($this->getJavaClass()->getLabelerIdentificationCode(), "string");
    }

    /**
     * <p>
     * Identifies date of labeler identification code.
     * Labeler identification code must be 4 symbols alphanumeric string, with first character always being alphabetic.
     * </p>
     */
    public function setLabelerIdentificationCode(string $value) : void
    {
        $this->getJavaClass()->setLabelerIdentificationCode($value);
    }

    /**
     * <p>
     * Identifies product or catalog number. Product or catalog number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function getProductOrCatalogNumber() : string
    {
        return java_cast($this->getJavaClass()->getProductOrCatalogNumber(), "string");
    }

    /**
     * <p>
     * Identifies product or catalog number. Product or catalog number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function setProductOrCatalogNumber(string $value) : void
    {
        $this->getJavaClass()->setProductOrCatalogNumber($value);
    }

    /**
     * <p>
     * Identifies unit of measure ID. Unit of measure ID must be integer value from 0 to 9.
     * </p>
     */
    public function getUnitOfMeasureID() : int
    {
        return java_cast($this->getJavaClass()->getUnitOfMeasureID(), "integer");
    }

    /**
     * <p>
     * Identifies unit of measure ID. Unit of measure ID must be integer value from 0 to 9.
     * </p>
     */
    public function setUnitOfMeasureID(int $value) : void
    {
        $this->getJavaClass()->setUnitOfMeasureID($value);
    }

    /**
     * <p>
     * Converts data to string format according HIBC LIC specification.
     * </p>
     *
     * @return Formatted string.
     */
    public function toString() : string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
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
        $this->getJavaClass()->parseFromString($primaryDataCodetext);
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
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    protected function init() : void
    {}
}

/**
 * <p>
 * Class for storing HIBC LIC secondary and additional data.
 * </p>
 */
class SecondaryAndAdditionalData extends BaseJavaClass
{
    const JAVA_CLASS_NAME = "com.aspose.mw.barcode.complexbarcode.MwSecondaryAndAdditionalData";

    function __construct()
    {
        $java_class = new java(self::JAVA_CLASS_NAME);
        parent::__construct($java_class);
    }

    static function construct($java_class) : SecondaryAndAdditionalData
    {
        $obj = new SecondaryAndAdditionalData(null);
        $obj->setJavaClass($java_class);
        return $obj;
    }

    /**
     * <p>
     * Identifies expiry date format.
     * </p>
     */
    public function getExpiryDateFormat() : int
    {
        return java_cast($this->getJavaClass()->getExpiryDateFormat(), "integer");
    }

    /**
     * <p>
     * Identifies expiry date format.
     * </p>
     */
    public function setExpiryDateFormat(int $value) : void
    {
        $this->getJavaClass()->setExpiryDateFormat($value);
    }

    /**
     * <p>
     * Identifies expiry date. Will be used if ExpiryDateFormat is not set to None.
     * </p>
     */
    public function getExpiryDate() : DateTime
    {
        return new DateTime('@' . java_cast($this->getJavaClass()->getExpiryDate(), "string"));
    }

    /**
     * <p>
     * Identifies expiry date. Will be used if ExpiryDateFormat is not set to None.
     * </p>
     */
    public function setExpiryDate(DateTime $value) : void
    {
        $this->getJavaClass()->setExpiryDate($value->getTimestamp() . "");
    }

    /**
     * <p>
     * Identifies lot or batch number. Lot/batch number must be alphanumeric string with up to 18 sybmols length. .
     * </p>
     */
    public function getLotNumber() : string
    {
        return java_cast($this->getJavaClass()->getLotNumber(), "string");
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
        $this->getJavaClass()->setLotNumber($value);
    }

    /**
     * <p>
     * Identifies serial number. Serial number must be alphanumeric string up to 18 sybmols length.
     * </p>
     */
    public function getSerialNumber() : string
    {
        return java_cast($this->getJavaClass()->getSerialNumber(), "string");
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
        $this->getJavaClass()->setSerialNumber($value);
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
        return new DateTime('@' . java_cast($this->getJavaClass()->getDateOfManufacture(), "string"));
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
        $this->getJavaClass()->setDateOfManufacture($value->getTimestamp() . "");
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
        return java_cast($this->getJavaClass()->getQuantity(), "integer");
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
        $this->getJavaClass()->setQuantity($value);
    }

    /**
     * <p>
     * Converts data to string format according HIBC LIC specification.
     * </p>
     *
     * @return Formatted string.
     */
    public function toString() : string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }

    /**
     * <p>
     * Instantiates secondary and additional supplemental data from string format according HIBC LIC specification.
     * </p>
     *
     * @param secondaryDataCodetext Formatted string.
     */
    public function parseFromString(string $secondaryDataCodetext) : void
    {
        $this->getJavaClass()->parseFromString($secondaryDataCodetext);
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code SecondaryAndAdditionalData} value.
     * </p>
     *
     * @param obj An {@code SecondaryAndAdditionalData} value to compare to this instance.
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     */
    public function equals(SecondaryAndAdditionalData $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    protected function init() : void
    {}
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

?>