<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Class for encoding and decoding the text embedded in the MaxiCode code for modes 3.
 * This sample shows how to encode and decode MaxiCode codetext for mode 3.
 * @code
 *  //Mode 3 with standart second message
 *  $maxiCodeCodetext = new MaxiCodeCodetextMode3();
 *  $maxiCodeCodetext->setPostalCode("B1050");
 *  $maxiCodeCodetext->setCountryCode(056);
 *  $maxiCodeCodetext->setServiceCategory(999);
 *  MaxiCodeStandardSecondMessage maxiCodeStandardSecondMessage = new MaxiCodeStandardSecondMessage();
 *  maxiCodeStandardSecondMessage->setMessage("Test message");
 *  $maxiCodeCodetext->setSecondMessage(maxiCodeStandardSecondMessage);
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
 *          if ($maxiCodeStructuredCodetext->getSecondMessage() instanceOf MaxiCodeStandardSecondMessage)
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
 * @endcode
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

    public function initFieldsFromDto(): void
    {
        parent::initFieldsFromDto();
    }

    /**
     * Gets MaxiCode mode.
     * @return int MaxiCode mode
     */
    public function getMode(): int
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

    public function initFromString(string $constructedCodetext): void
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