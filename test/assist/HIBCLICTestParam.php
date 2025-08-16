<?php

namespace assist;

use Aspose\Barcode\BarcodeGenerator;
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\ComplexCodetextReader;
use Aspose\Barcode\DecodeType;
use Aspose\Barcode\HIBCLICCombinedCodetext;
use Aspose\Barcode\HIBCLICPrimaryDataCodetext;
use Aspose\Barcode\HIBCLICSecondaryAndAdditionalDataCodetext;
use Aspose\Barcode\PrimaryData;
use Aspose\Barcode\SecondaryAndAdditionalData;

class HIBCLICTestParam extends RecognizeTestParam
{
    public $expectedComplexCodetext;

    public function __construct($expectedWidth,
                                $expectedHeight,
                                $encodeType,
                                $codetextType,
                                $labelerIdentificationCode,
                                $productOrCatalogNumber,
                                $unitOfMeasureID,
                                $expiryDateFormat,
                                $expiryDate,
                                $LotNumber,
                                $SerialNumber,
                                $dateOfManufacture,
                                $quantity,
                                $linkChar)
    {


        \RecognizeTestParam::__construct($expectedWidth, $expectedHeight, "");
        switch ($codetextType) {
            case \CodetextType::Combined:
                $combinedCodetext = new HIBCLICCombinedCodetext();
                $combinedCodetext->setPrimaryData($this->GetPrimaryData($labelerIdentificationCode, $productOrCatalogNumber, $unitOfMeasureID));
                $combinedCodetext->setSecondaryAndAdditionalData($this->GetSecondaryAndAdditionalData($expiryDateFormat, $expiryDate, $LotNumber, $SerialNumber, $dateOfManufacture, $quantity));
                $this->expectedComplexCodetext = $combinedCodetext;

                break;
            case \CodetextType::Primary:
                $primaryDataCodetext = new HIBCLICPrimaryDataCodetext();
                $primaryDataCodetext->setData($this->GetPrimaryData($labelerIdentificationCode, $productOrCatalogNumber, $unitOfMeasureID));
                $this->expectedComplexCodetext = $primaryDataCodetext;
                break;
            case \CodetextType::Secondary:
                $secondaryDataCodetext = new HIBCLICSecondaryAndAdditionalDataCodetext();
                $secondaryDataCodetext->setData($this->GetSecondaryAndAdditionalData($expiryDateFormat, $expiryDate, $LotNumber, $SerialNumber, $dateOfManufacture, $quantity));
                $secondaryDataCodetext->setLinkCharacter($linkChar);
                $this->expectedComplexCodetext = $secondaryDataCodetext;
                break;
            default:
                throw new RuntimeException("Unknown codetext type");
        }
        $this->expectedComplexCodetext->setBarcodeType($encodeType);
        $this->setExpectedCodeText($this->expectedComplexCodetext->getConstructedCodetext());
    }

    private function GetPrimaryData($labelerIdentificationCode, $productOrCatalogNumber, $unitOfMeasureID): PrimaryData
    {
        $result = new PrimaryData(null);
        $result->setProductOrCatalogNumber($productOrCatalogNumber);
        $result->setLabelerIdentificationCode($labelerIdentificationCode);
        $result->setUnitOfMeasureID($unitOfMeasureID);
        return $result;
    }

    private function GetSecondaryAndAdditionalData($expiryDateFormat,
                                                   $expiryDate,
                                                   $LotNumber,
                                                   $SerialNumber,
                                                   $dateOfManufacture,
                                                   $quantity): SecondaryAndAdditionalData
    {
        $result = new SecondaryAndAdditionalData();
        $result->setExpiryDate($expiryDate);
        $result->setExpiryDateFormat($expiryDateFormat);
        $result->setQuantity($quantity);
        $result->setLotNumber($LotNumber);
        $result->setSerialNumber($SerialNumber);
        $result->setDateOfManufacture($dateOfManufacture);
        return $result;
    }

    public function apply(BarcodeGenerator $generator): void
    {
    }

    public function checkResult($bitmap): void
    {
        $binary = base64_decode($bitmap);
        $dimensions = getimagesizefromstring($binary);
        Assert::assertEquals($this->getExpectedWidth(), $dimensions[0]);
        Assert::assertEquals($this->getExpectedHeight(), $dimensions[1]);
        $decodeType = DecodeType::ALL_SUPPORTED_TYPES;
//        if (!DecodeType::parse($this->encodeTypeName, $decodeType)) {
//            throw new RuntimeException("Unsupported decode type");
//        }
        $reader = new BarCodeReader($bitmap, null, $decodeType);
        {

            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            $codetext = $reader->getFoundBarCodes()[0]->getCodeText("UTF-8");
            $complexCodetext = ComplexCodetextReader::tryDecodeHIBCLIC($codetext);
            Assert::assertTrue($this->expectedComplexCodetext->equals($complexCodetext));
        }
    }
}