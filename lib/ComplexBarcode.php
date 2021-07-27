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
 *  ComplexCodetextReader decodes codetext to specified complex barcode type.
 *
 *  This sample shows how to recognize and decode SwissQR image.
 *  <pre>
 *  $cr = new BarCodeReader("SwissQRCodetext.png", DecodeType::QR);
 *  $cr->read();
 *  $result = ComplexCodetextReader::tryDecodeSwissQR($cr->getCodeText(false));
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
final class SwissQRCodetext extends BaseJavaClass
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
 *  <hr><blockquote><pre>
 *  This sample shows how to create and save a SwissQR image.
 *  Example:
 *    $swissQRCodetext = new SwissQRCodetext(null);
 *    $swissQRCodetext->getBill()->setAccount("Account");
 *    $swissQRCodetext->getBill()->setBillInformation("BillInformation");
 *    $cg = new ComplexBarcodeGenerator($swissQRCodetext);
 *    $res = $cg->generateBarCodeImage(BarcodeImageFormat::PNG);
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
    public function getParameters() : BaseGenerationParameters { return $this->parameters; }

    /**
     * Creates an instance of ComplexBarcodeGenerator.
     *
     * @param SwissQRCodetext complexCodetext Complex codetext
     */
    public function __construct(SwissQRCodetext $swissQRCodetext)
    {
        parent::__construct(new java(self::$javaClassName, $swissQRCodetext->getJavaClass()));
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
    public function generateBarcodeImage(int $format) : string
    {
        try
        {
            $base64Image = java_cast($this->getJavaClass()->generateBarcodeImage($format), "string");
            return ($base64Image);
        }
        catch (Exception $ex)
        {
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
        try
        {
            $image = $this->generateBarcodeImage($format);
            file_put_contents($filePath, base64_decode($image));
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}
?>