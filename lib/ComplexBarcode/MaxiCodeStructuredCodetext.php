<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Exception;

/**
 * Base class for encoding and decoding the text embedded in the MaxiCode code for modes 2 and 3.
 *
 *  This sample shows how to decode raw MaxiCode codetext to MaxiCodeStructuredCodetext instance.
 * @code
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
 * @endcode
 */
abstract class MaxiCodeStructuredCodetext extends MaxiCodeCodetext
{
    private $secondMessage;

    public function initFieldsFromDto(): void
    {
        $maxiCodeSecondMessageDTO = $this->getIComplexCodetextDTO()->secondMessage;
        if (!is_null($maxiCodeSecondMessageDTO))
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
        } else
        {
            $this->secondMessage = null;
        }
    }

    /**
     * Identifies the postal code. Must be 9 digits in mode 2 or
     * 6 alphanumeric symbols in mode 3.
     */
    public function getPostalCode(): string
    {
        return $this->getIComplexCodetextDTO()->postalCode;
    }

    /**
     * Identifies the postal code. Must be 9 digits in mode 2 or
     * 6 alphanumeric symbols in mode 3.
     */
    public function setPostalCode(string $value): void
    {
        $this->getIComplexCodetextDTO()->postalCode = $value;
    }

    /**
     * Identifies 3 digit country code.
     */
    public function getCountryCode(): int
    {
        return $this->getIComplexCodetextDTO()->countryCode;
    }

    /**
     * Identifies 3 digit country code.
     */
    public function setCountryCode(int $value): void
    {
        $this->getIComplexCodetextDTO()->countryCode = $value;
    }

    /**
     * Identifies 3 digit service category.
     */
    public function getServiceCategory(): int
    {
        return $this->getIComplexCodetextDTO()->serviceCategory;
    }

    /**
     * Identifies 3 digit service category.
     */
    public function setServiceCategory(int $value): void
    {
        $this->getIComplexCodetextDTO()->serviceCategory = $value;
    }

    /**
     * Identifies second message of the barcode.
     */
    public function getSecondMessage(): MaxiCodeSecondMessage
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
    public abstract function getConstructedCodetext(): string;

    /**
     * Initializes instance from constructed codetext.
     * @param string $constructedCodetext Constructed codetext.
     */
    public abstract function initFromString(string $constructedCodetext): void;

    /**
     * Returns a value indicating whether this instance is equal to a specified <see cref="MaxiCodeStructuredCodetext"/> value.
     * @param object $obj An <see cref="MaxiCodeStructuredCodetext"/> value to compare to this instance.
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public abstract function equals($obj): bool;
}