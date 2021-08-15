<?php
require_once('assist.php');
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
        if(is_null($arg))
        {
            return new java(self::$javaClassName);
        }
        return $arg;
    }

    /**
     * Gets the address type.
     *
     * The address type is automatically set by either setting street / house number
     * or address line 1 and 2. Before setting the fields, the address type is Undetermined.
     * If fields of both types are set, the address type becomes Conflicting.
     * 
     * Value: The address type.
     */
    public function getType() : int{ return java_cast($this->getJavaClass()->getType(), "integer"); }

    /**
     * Gets the name, either the first and last name of a natural person or the
     * company name of a legal person.
     * Value: The name.
     */
    public function getName(): string
    {
        return java_cast($this->getJavaClass()->getName(), "string");
    }

    /**
     * Sets the name, either the first and last name of a natural person or the
     * company name of a legal person.
     * Value: The name.
     */
    public function setName(string $value): void
    {
        $this->getJavaClass()->setName($value);
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
     * Value: The address line 1.
     */
    public function getAddressLine1(): string
    {
        return java_cast($this->getJavaClass()->getAddressLine1(), "string");
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
     * Value: The address line 1.
     */
    public function setAddressLine1(string $value):void
    {
        $this->getJavaClass()->setAddressLine1($value);
    }

    /**
     * Gets the address line 2.
     * Address line 2 contains postal code and town.
     * Setting this field sets the address type to AddressType.CombinedElements unless it's already
     * AddressType.Structured, in which case it becomes AddressType.Conflicting.
     * This field is only used for combined elements addresses. For this type, it's mandatory.
     * Value: The address line 2.
     */
    public function getAddressLine2(): string
    {
        return java_cast($this->getJavaClass()->getAddressLine2(), "string");
    }

    /**
     * Sets the address line 2.
     * Address line 2 contains postal code and town.
     * Setting this field sets the address type to AddressType.CombinedElements unless it's already
     * AddressType.Structured, in which case it becomes AddressType.Conflicting.
     * This field is only used for combined elements addresses. For this type, it's mandatory.
     * Value: The address line 2.
     */
    public function setAddressLine2(string $value):void
    {
        $this->getJavaClass()->setAddressLine2($value);
    }

    /**
     * Gets the street.
     * The street must be speicfied without house number.
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     * This field is only used for structured addresses and is optional.
     * Value: The street.
     */
    public function getStreet() : string { return java_cast($this->getJavaClass()->getStreet(), "string"); }

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
     * Value: The street.
     */
    public function setStreet(string $value):void
    {
        $this->getJavaClass()->setStreet($value);
    }

    /**
     * Gets the house number.
     * 
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses and is optional.
     * 
     * Value: The house number.
     */
    public function getHouseNo(): string { return java_cast($this->getJavaClass()->getHouseNo(), "string"); }

    /**
     * Sets the house number.
     * 
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses and is optional.
     * 
     * Value: The house number.
     */
    public function setHouseNo(string $value):void
    {
        $this->getJavaClass()->setHouseNo($value);
    }

    /**
     * Gets the postal code.
     * 
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses. For this type, it's mandatory.
     * 
     * Value: The postal code.
     */
    public function getPostalCode(): string { return java_cast($this->getJavaClass()->getPostalCode(), "string"); }

    /**
     * Sets the postal code.
     * 
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses. For this type, it's mandatory.
     * 
     * Value: The postal code.
     */
    public function setPostalCode(string $value):void
    {
        $this->getJavaClass()->setPostalCode($value);
    }

    /**
     * Gets the town or city.
     * 
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses. For this type, it's mandatory.
     * 
     * Value: The town or city.
     */
    public function getTown(): string { return java_cast($this->getJavaClass()->getTown(), "string"); }

    /**
     * Sets the town or city.
     * 
     * Setting this field sets the address type to AddressType.Structured unless it's already
     * AddressType.CombinedElements, in which case it becomes AddressType.Conflicting.
     *
     * This field is only used for structured addresses. For this type, it's mandatory.
     * 
     * Value: The town or city.
     */
    public function setTown(string $value):void
    {
        $this->getJavaClass()->setTown($value);
    }

    /**
     * Gets the two-letter ISO country code.
     *  
     * The country code is mandatory unless the entire address contains null or emtpy values.
     * 
     * Value: The ISO country code.
     */
    public function getCountryCode(): string{ return java_cast($this->getJavaClass()->getCountryCode(), "string"); }

    /**
     * Sets the two-letter ISO country code.
     *  
     * The country code is mandatory unless the entire address contains null or emtpy values.
     * 
     * Value: The ISO country code.
     */
    public function setCountryCode(string $value):void{ $this->getJavaClass()->setCountryCode($value); }

    /**
     * Clears all fields and sets the type to AddressType.Undetermined.
     */
    public function clear():void
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

    /**
     * Determines whether the specified object is equal to the current object.
     * @return true if the specified object is equal to the current object; otherwise, false.
     * @param obj The object to compare with the current object.
     */
    public function equals(Address $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * Gets the hash code for this instance.
     * @return A hash code for the current object.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
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
        parent::__construct(new java(self::$javaClassName, $instruction));
    }

    static function construct($javaClass)
    {
        $phpClass = new AlternativeScheme("");
        $phpClass->setJavaClass($javaClass);
        return $phpClass;
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
        return java_cast($this->getJavaClass()->getInstruction(), "string");
    }

    /**
     * Gets the payment instruction for a given bill.
     * The instruction consists of a two letter abbreviation for the scheme, a separator characters
     * and a sequence of parameters(separated by the character at index 2).
     * Value: The payment instruction.
     */
    public function setInstruction(string $value):void
    {
        $this->getJavaClass()->setInstruction($value);
    }

    /**
     * Determines whether the specified object is equal to the current object.
     * @return true if the specified object is equal to the current object; otherwise, false.
     * @param obj The object to compare with the current object.
     */
    public function equals(AlternativeScheme $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * Gets the hash code for this instance.
     * @return  hash code for the current object.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
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
     * @return decoded SwissQRCodetext or null.
     * @param encodedCodetext encoded codetext
     */
    public static function tryDecodeSwissQR(string $encodedCodetext) : SwissQRCodetext
    {
        $javaPhpComplexCodetextReader = java(self::$javaClassName);
        return SwissQRCodetext::construct($javaPhpComplexCodetextReader->tryDecodeSwissQR($encodedCodetext));
    }

    /**
     * Decodes Royal Mail Mailmark 2D codetext.
     * @param $encodedCodetext encoded codetext
     * @return decoded Royal Mail Mailmark 2D or null.
     */
    public static function tryDecodeMailmark2D(string $encodedCodetext): Mailmark2DCodetext
    {
        $javaPhpComplexCodetextReader = java(self::$javaClassName);
        return Mailmark2DCodetext::construct($javaPhpComplexCodetextReader->tryDecodeMailmark2D($encodedCodetext));
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
        $this->creditor = new Address($this->getJavaClass()->getCreditor());
        $this->debtor = new Address($this->getJavaClass()->getDebtor());
    }

    public function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    private static function convertAlternativeSchemes($javaAlternativeSchemes)
    {
        $alternativeSchemes = array();
        for($i = 0; $i < java_cast($javaAlternativeSchemes->size(), "integer"); $i++)
        {
            $alternativeSchemes[$i] = AlternativeScheme::construct($javaAlternativeSchemes->get($i));
        }
        return $alternativeSchemes;
    }

    /**
     * Gets the version of the SwissQR bill standard.
     * Value: The SwissQR bill standard version.
     */
    public function getVersion() : int{ return java_cast($this->getJavaClass()->getVersion(), "integer"); }

    /**
     * Sets the version of the SwissQR bill standard.
     * Value: The SwissQR bill standard version.
     */
    public function setVersion(int $value):void{ $this->getJavaClass()->setVersion($value); }

    /**
     * Gets the payment amount.
     * 
     * Valid values are between 0.01 and 999,999,999.99.
     * 
     * Value: The payment amount.
     */
    public function getAmount() : float
    {
        return java_cast($this->getJavaClass()->getAmount(), "double");
    }

    /**
     * Sets the payment amount.
     * 
     * Valid values are between 0.01 and 999,999,999.99.
     * 
     * Value: The payment amount.
     */
    public function setAmount(float $value):void{ $this->getJavaClass()->setAmount($value); }

    /**
     * Gets the payment currency.
     * 
     * Valid values are "CHF" and "EUR".
     * 
     * Value: The payment currency.
     */
    public function getCurrency(): string{ return java_cast($this->getJavaClass()->getCurrency(), "string"); }

    /**
     * Sets the payment currency.
     * 
     * Valid values are "CHF" and "EUR".
     * 
     * Value: The payment currency.
     */
    public function setCurrency(string $value):void{ $this->getJavaClass()->setCurrency($value); }

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
        return java_cast($this->getJavaClass()->getAccount(), "string");
    }

    /**
     * Sets the creditor's account number.
     * 
     * Account numbers must be valid IBANs of a bank of Switzerland or
     * Liechtenstein. Spaces are allowed in the account number.
     * 
     * Value: The creditor account number.
     */
    public function setAccount(string $value):void{ $this->getJavaClass()->setAccount($value); }

    /**
     * Gets the creditor address.
     * Value: The creditor address.
     */
    public function getCreditor() : Address{ return $this->creditor; }

    /**
     * Sets the creditor address.
     * Value: The creditor address.
     */
    public function setCreditor(Address $value):void
    {
        $this->creditor = $value;
        $this->getJavaClass()->setCreditor($value->getJavaClass());
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
     * Value: The creditor payment reference.
     */
    public function getReference(): string
    {
        return java_cast($this->getJavaClass()->getReference(), "string");
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
     * Value: The creditor payment reference.
     */
    public function setReference(string $value):void{ $this->getJavaClass()->setReference($value); }

    /**
     * Creates and sets a ISO11649 creditor reference from a raw string by prefixing
     * the String with "RF" and the modulo 97 checksum.
     * 
     * Whitespace is removed from the reference
     *
     * @exception ArgumentException rawReference contains invalid characters.
     * @param rawReference The raw reference.
     */
    public function createAndSetCreditorReference(string $rawReference):void
    {
        $this->getJavaClass()->createAndSetCreditorReference($rawReference);
    }

    /**
     * Gets the debtor address.
     * 
     * The debtor is optional. If it is omitted, both setting this field to
     * null or setting an address with all null or empty values is ok.
     * 
     * Value: The debtor address.
     */
    public function getDebtor() : Address
    {
        return $this->debtor;
    }

    /**
     * Sets the debtor address.
     * 
     * The debtor is optional. If it is omitted, both setting this field to
     * null or setting an address with all null or empty values is ok.
     * 
     * Value: The debtor address.
     */
    public function setDebtor(Address $value):void
    {
        $this->debtor = $value;
        $this->getJavaClass()->setDebtor($value->getJavaClass());
    }

    /**
     * Gets the additional unstructured message.
     * Value: The unstructured message.
     */
    public function getUnstructuredMessage(): string{ return java_cast($this->getJavaClass()->getUnstructuredMessage(), "string"); }

    /**
     * Sets the additional unstructured message.
     * Value: The unstructured message.
     */
    public function setUnstructuredMessage(string $value):void{ $this->getJavaClass()-> setUnstructuredMessage($value); }

    /**
     * Gets the additional structured bill information.
     * Value: The structured bill information.
     */
    public function getBillInformation(): string{ return java_cast($this->getJavaClass()->getBillInformation(), "string"); }

    /**
     * Sets the additional structured bill information.
     * Value: The structured bill information.
     */
    public function setBillInformation(string $value):void{ $this->getJavaClass()->setBillInformation($value); }

    /**
     * Gets ors sets the alternative payment schemes.
     * 
     * A maximum of two schemes with parameters are allowed.
     * 
     * Value: The alternative payment schemes.
     */
    public function getAlternativeSchemes() :array
    {
        return self::convertAlternativeSchemes($this->getJavaClass()->getAlternativeSchemes());
    }

    /**
     * Gets ors sets the alternative payment schemes.
     * 
     * A maximum of two schemes with parameters are allowed.
     * 
     * Value: The alternative payment schemes.
     */
    public function setAlternativeSchemes(array $value):void
    {
        $javaArray = array();
        for($i = 0; $i < sizeof($value); $i++)
        {
            array_push($javaArray, $value[$i]->getJavaClass());
        }
        $this->getJavaClass()->setAlternativeSchemes($javaArray);
    }

    /**
     * Determines whether the specified object is equal to the current object.
     * @return true if the specified object is equal to the current object; otherwise, false.
     * @param obj The object to compare with the current object.
     */
    public function equals(SwissQRBill $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * Gets the hash code for this instance.
     * @return A hash code for the current object.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
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
        $this->bill = new SwissQRBill($this->getJavaClass()->getBill());
    }

    /**
     * SwissQR bill data
     */
    public function getBill():SwissQRBill
    { return $this->bill; }

    /**
     * Creates an instance of SwissQRCodetext.
     * 
     * @param bill SwissQR bill data
     * @throws BarcodeException
     */
    public function __construct(?SwissQRBill $bill)
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

    static function construct($javaClass)
    {
        $phpClass = new SwissQRCodetext(null);
        $phpClass->setJavaClass($javaClass);
        return $phpClass;
    }

    /**
     * Construct codetext from SwissQR bill data
     * 
     * @return Constructed codetext
     */
    public function getConstructedCodetext(): string
    {
        return java_cast($this->getJavaClass()->getConstructedCodetext(), "string");
    }

    /**
     * Initializes Bill with constructed codetext.
     * 
     * @param constructedCodetext Constructed codetext.
     */
    public function initFromString(string $constructedCodetext):void
    {
        $this->getJavaClass()->initFromString($constructedCodetext);
        $this->init();
    }

    /**
     * Gets barcode type.
     * 
     * @return Barcode type.
     */
    public function getBarcodeType() : int
    {
        return java_cast($this->getJavaClass()->getBarcodeType(), "integer");
    }
}

/**
 *  ComplexBarcodeGenerator for backend complex barcode (e.g. SwissQR) images generation.
 *
 *  This sample shows how to create and save a SwissQR image.
 *  @code
 *    $swissQRCodetext = new SwissQRCodetext(null);
 *    $swissQRCodetext->getBill()->setAccount("Account");
 *    $swissQRCodetext->getBill()->setBillInformation("BillInformation");
 *    $cg = new ComplexBarcodeGenerator($swissQRCodetext);
 *    $res = $cg->generateBarCodeImage(BarcodeImageFormat::PNG);
 *  @endcode
 */
final class ComplexBarcodeGenerator extends BaseJavaClass
{
    private static $javaClassName = "com.aspose.mw.barcode.complexbarcode.MwComplexBarcodeGenerator";
    private $parameters;

    protected function init(): void
    {
        $this->parameters = new BaseGenerationParameters($this->getJavaClass()->getParameters());
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
        parent::__construct(new java(self::$javaClassName, $complexCodetext->getJavaClass()));
    }

    /**
     * Generates complex barcode image under current settings.
     * @param int format value of BarCodeImageFormat (PNG, BMP, JPEG, GIF)
     * Example:
     *    $swissQRCodetext = new SwissQRCodetext(null);
     *    $swissQRCodetext->getBill()->setAccount("Account");
     *    $swissQRCodetext->getBill()->setBillInformation("BillInformation");
     *    $cg = new ComplexBarcodeGenerator($swissQRCodetext);
     *    $res = $cg->generateBarCodeImage(BarcodeImageFormat::PNG);
     * @return string base64 representation of image.
     */
    public function generateBarcodeImage(int $format): string
    {
        try {
            $base64Image = java_cast($this->getJavaClass()->generateBarcodeImage($format), "string");
            return ($base64Image);
        } catch (Exception $ex) {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Save barcode image to specific file in specific format.
     * @param $filePath string Path to save to.
     * @param int format  value of BarCodeImageFormat (PNG, BMP, JPEG, GIF)
     * Example:
     *    $swissQRCodetext = new SwissQRCodetext(null);
     *    $swissQRCodetext->getBill()->setAccount("Account");
     *    $swissQRCodetext->getBill()->setBillInformation("BillInformation");
     *    $cg = new ComplexBarcodeGenerator($swissQRCodetext);
     *    $res = $cg->save("filePath.png", BarcodeImageFormat::PNG);
     */
    public function save(string $filePath, int $format): void
    {
        try {
            $image = $this->generateBarcodeImage($format);
            file_put_contents($filePath, base64_decode($image));
        } catch (Exception $ex) {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
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
        $phpClass = new Mailmark2DCodetext();
        $phpClass->setJavaClass($javaClass);
        return $phpClass;
    }

    /**
     * Identifies the UPU Country ID.Max length: 4 characters.
     * @return string Country ID
     */
    public function getUPUCountryID() :string
    {
        return java_cast($this->getJavaClass()->getUPUCountryID(), "string");
    }

    /**
     * Identifies the UPU Country ID.Max length: 4 characters.
     * @param string $value Country ID
     */
    public function  setUPUCountryID(string $value) : void {
        $this->getJavaClass()->setUPUCountryID($value);
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
    public function getInformationTypeID():string
    {
        return java_cast($this->getJavaClass()->getInformationTypeID(), "string");
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
    public function  setInformationTypeID(string $value) : void
    {
        $this->getJavaClass()->setInformationTypeID($value);
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
    public function getVersionID():string
    {
        return java_cast($this->getJavaClass()->getVersionID(), "string");
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
    public function  setVersionID(string $value) : void
    {
        $this->getJavaClass()->setVersionID($value);
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
    public function getclass():string
    {
        return java_cast($this->getJavaClass()->getclass(), "string");
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
     * @param string $value  class of the item
     */
    public function  setclass(string $value) : void
    {
        $this->getJavaClass()->setclass($value);
    }

    /**
     * Identifies the unique group of customers involved in the mailing.
     * Max value: 9999999.
     *
     * @return int Supply chain ID
     */
    public function getSupplyChainID():int
    {
        return java_cast($this->getJavaClass()->getSupplyChainID(), "integer");
    }

    /**
     * Identifies the unique group of customers involved in the mailing.
     * Max value: 9999999.
     *
     * @param int $value Supply chain ID
     */
    public function  setSupplyChainID(int $value) : void
    {
        $this->getJavaClass()->setSupplyChainID($value);
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
        return java_cast($this->getJavaClass()->getItemID(), "integer");
    }

    /**
     * Identifies the unique item within the Supply Chain ID.
     * Every Mailmark barcode is required to carry an ID
     * so it can be uniquely identified for at least 90 days.
     * Max value: 99999999.
     *
     * @param int $value item within the Supply Chain ID
     */
    public function  setItemID(int $value) : void
    {
        $this->getJavaClass()->setItemID($value);
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
        return java_cast($this->getJavaClass()->getDestinationPostCodeAndDPS(), "string");
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
    public function  setDestinationPostCodeAndDPS(string $value) : void
    {
        $this->getJavaClass()->setDestinationPostCodeAndDPS($value);
    }

    /**
     * Flag which indicates what level of Return to Sender service is being requested.
     *
     * @return string RTS Flag
     */
    public function getRTSFlag(): string
    {
        return java_cast($this->getJavaClass()->getRTSFlag(), "string");
    }

    /**
     * Flag which indicates what level of Return to Sender service is being requested.
     *
     * @param string $value RTS Flag
     */
    public function setRTSFlag(string $value) : void
    {
        $this->getJavaClass()->setRTSFlag($value);
    }

    /**
     * Contains the Return to Sender Post Code but no DPS.
     * The PC(without DPS) must comply with a PAF® format.
     *
     * @return string Return to Sender Post Code but no DPS
     */
    public function getReturnToSenderPostCode(): string
    {
        return java_cast($this->getJavaClass()->getReturnToSenderPostCode(), "string");
    }

    /**
     * Contains the Return to Sender Post Code but no DPS.
     * The PC(without DPS) must comply with a PAF® format.
     *
     * @param string $value Return to Sender Post Code but no DPS
     */
    public function setReturnToSenderPostCode(string $value) : void
    {
        $this->getJavaClass()->setReturnToSenderPostCode($value);
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
        return java_cast($this->getJavaClass()->getCustomerContent(), "string");
    }

    /**
     * Optional space for use by customer.
     *
     * Max length by Type:
     * Type 7: 6 characters
     * Type 9: 45 characters
     * Type 29: 25 characters
     *
     * @param string $value  Customer content
     */
    public function  setCustomerContent(string $value) : void
    {
        $this->getJavaClass()->setCustomerContent($value);
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode.C40.
     *
     * @return int Encode mode of Datamatrix barcode.
     */
    public function getCustomerContentEncodeMode(): int
    {
        return java_cast($this->getJavaClass()->getCustomerContentEncodeMode(), "integer");
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode.C40.
     *
     * @param int $value Encode mode of Datamatrix barcode.
     */
    public function setCustomerContentEncodeMode(int $value) : void
    {
        $this->getJavaClass()->setCustomerContentEncodeMode($value);
    }

    /**
     * 2D Mailmark Type defines size of Data Matrix barcode.
     *
     * @return int Size of Data Matrix barcode
     */
    public function getDataMatrixType(): int
    {
        return java_cast($this->getJavaClass()->getDataMatrixType(), "integer");
    }

    /**
     * 2D Mailmark Type defines size of Data Matrix barcode.
     *
     * @param int $value  Size of Data Matrix barcode
     */
    public function setDataMatrixType(int $value) : void
    {
        $this->getJavaClass()->setDataMatrixType($value);
    }

    /**
     * Create default instance of Mailmark2DCodetext class.
     */
    public function __construct()
    {
        parent::__construct(new java(self::$javaClassName));
    }

    public function init(): void
    {}

    /**
     * Construct codetext from Mailmark data.
     * @return string Constructed codetext
     */
    public function getConstructedCodetext(): string {

        return java_cast($this->getJavaClass()->getConstructedCodetext(), "string");
    }

    /**
     * Initializes Mailmark data from constructed codetext.
     * @param string $constructedCodetext Constructed codetext.
     */
    public function  initFromString(string $constructedCodetext) : void
    {
        $this->getJavaClass()->initFromString($constructedCodetext);
    }

    /**
     * Gets barcode type.
     * @return int Barcode type.
     */
    public function getBarcodeType() : int {
        return EncodeTypes::DATA_MATRIX;
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
        parent::__construct($javaClass);
    }

    /**
     * Construct codetext for complex barcode
     * @return string Constructed codetext
     */
    abstract function getConstructedCodetext() : string;

    /**
     * Initializes instance with constructed codetext.
     * @param string $constructedCodetext Constructed codetext.
     */
    abstract function initFromString(string $constructedCodetext) : void;

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

    /// <summary>
    ///
    /// </summary>
    /**
     * 16 x 48 modules
     */
    const TYPE_29 = 3;
}
?>