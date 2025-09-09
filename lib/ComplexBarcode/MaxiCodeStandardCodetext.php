<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Bridge\IComplexCodetextDTO;
use Aspose\Barcode\ComplexBarcode\MaxiCodeCodetext;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\ThriftConnection;

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

    public function obtainDto(...$args): IComplexCodetextDTO
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
    public function getMessage(): ?string
    {
        return $this->getIComplexCodetextDTO()->message;
    }

    /**
     * Sets message.
     */
    public function setMessage(string $value): void
    {
        $this->getIComplexCodetextDTO()->message = $value;
    }

    /**
     * Sets MaxiCode mode. Standart codetext can be used only with modes 4, 5 and 6.
     */
    public function setMode(int $mode): void
    {
        $this->getIComplexCodetextDTO()->mode = $mode;
    }

    /**
     * Gets MaxiCode mode.
     * @return int MaxiCode mode
     */
    public function getMode(): int
    {
        return $this->getIComplexCodetextDTO()->mode;
    }

    /**
     * Constructs codetext
     * @return string Constructed codetext
     */
    public function getConstructedCodetext(): string
    {
        return $this->getMessage();
    }

    /**
     * Initializes instance from constructed codetext.
     * @param string constructedCodetext Constructed codetext.
     */
    public function initFromString(string $constructedCodetext): void
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
    public function equals($obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->MaxiCodeStandardCodetext_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}