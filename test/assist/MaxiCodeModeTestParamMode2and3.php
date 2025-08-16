<?php

namespace assist;

use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\ComplexCodetextReader;
use Aspose\Barcode\DecodeType;

class MaxiCodeModeTestParamMode2and3 extends RecognizeTestParam
{
    public $maxiCodeCodetext;
    public $maxiCodeStructuredAppendModeBarcodeId;
    public $maxiCodeStructuredAppendModeBarcodesCount;

    public function __construct(int    $expectedWidth,
                                int    $expectedHeight,
                                string $postalCode,
                                int    $countryCode,
                                int    $serviceCategory,
                                string $standartSecondMessage,
                                int    $maxiCodeMode,
                                int    $maxiCodeStructuredAppendModeBarcodeId,
                                int    $maxiCodeStructuredAppendModeBarcodesCount)
    {
        parent::__construct($expectedWidth,
            $expectedHeight,
            "");
        $this->maxiCodeStructuredAppendModeBarcodeId = $maxiCodeStructuredAppendModeBarcodeId;
        $this->maxiCodeStructuredAppendModeBarcodesCount = $maxiCodeStructuredAppendModeBarcodesCount;

        switch ($maxiCodeMode) {
            case MaxiCodeMode::MODE_2:
                $this->maxiCodeCodetext = new MaxiCodeCodetextMode2();
                break;
            case MaxiCodeMode::MODE_3:
                $this->maxiCodeCodetext = new MaxiCodeCodetextMode3();
                break;
        }
//        $maxiCodeCodetext->setPostalCode($postalCode);
        $this->maxiCodeCodetext->setCountryCode($countryCode);
        $this->maxiCodeCodetext->setServiceCategory($serviceCategory);

        $maxiCodeStandartSecondMessage = new MaxiCodeStandartSecondMessage();
        $maxiCodeStandartSecondMessage->setMessage($standartSecondMessage);
        $this->maxiCodeCodetext->setSecondMessage($maxiCodeStandartSecondMessage);

        $this->setExpectedCodeText($this->maxiCodeCodetext->getConstructedCodetext());
    }

    static function construct(int    $expectedWidth,
                              int    $expectedHeight,
                              string $postalCode,
                              int    $countryCode,
                              int    $serviceCategory,
                              int    $year,
                              array  $structuredSecondMessage,
                              int    $maxiCodeMode,
                              int    $maxiCodeStructuredAppendModeBarcodeId,
                              int    $maxiCodeStructuredAppendModeBarcodesCount)
    {
        $_this = new MaxiCodeModeTestParamMode2and3($expectedWidth, $expectedHeight, $postalCode, $countryCode,
            $serviceCategory, "", $maxiCodeMode, $maxiCodeStructuredAppendModeBarcodeId,
            $maxiCodeStructuredAppendModeBarcodesCount);
        $_this->maxiCodeStructuredAppendModeBarcodeId = $maxiCodeStructuredAppendModeBarcodeId;
        $_this->maxiCodeStructuredAppendModeBarcodesCount = $maxiCodeStructuredAppendModeBarcodesCount;

        switch ($maxiCodeMode) {
            case MaxiCodeMode::MODE_2:
                $_this->maxiCodeCodetext = new MaxiCodeCodetextMode2();
                break;
            case MaxiCodeMode::MODE_3:
                $_this->maxiCodeCodetext = new MaxiCodeCodetextMode3();
                break;
        }
//        $maxiCodeCodetext->setPostalCode($postalCode);
        $_this->maxiCodeCodetext->setCountryCode($countryCode);
        $_this->maxiCodeCodetext->setServiceCategory($serviceCategory);

        $maxiCodeStructuredSecondMessage = new MaxiCodeStructuredSecondMessage();
        for ($i = 0; $i < sizeof($structuredSecondMessage); $i++) {
            $maxiCodeStructuredSecondMessage->add($structuredSecondMessage[$i]);
        }
        $maxiCodeStructuredSecondMessage->setYear($year);
        $_this->maxiCodeCodetext->setSecondMessage($maxiCodeStructuredSecondMessage);

        $_this->setExpectedCodeText($_this->maxiCodeCodetext->getConstructedCodetext());

        return $_this;
    }

    public function apply($generator)
    {
    }

    public function checkResult($bitmap)
    {
        $binary = base64_decode($bitmap);
        $dimensions = getimagesizefromstring($binary);
        Assert::assertEquals($this->getExpectedWidth(), $dimensions[0]);
        Assert::assertEquals($this->getExpectedHeight(), $dimensions[1]);

        $reader = new BarCodeReader($bitmap, null, DecodeType::MAXI_CODE);
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getMaxiCode()->getMaxiCodeStructuredAppendModeBarcodeId(), $this->maxiCodeStructuredAppendModeBarcodeId);
            Assert::assertEquals($reader->getFoundBarCodes()[0]->getExtended()->getMaxiCode()->getMaxiCodeStructuredAppendModeBarcodesCount(), $this->maxiCodeStructuredAppendModeBarcodesCount);
            $resultMaxiCodeCodetext = ComplexCodetextReader::tryDecodeMaxiCode($reader->getFoundBarCodes()[0]->getExtended()->getMaxiCode()->getMaxiCodeMode(), $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertNotNull($resultMaxiCodeCodetext);
            Assert::assertEquals($resultMaxiCodeCodetext, $this->maxiCodeCodetext);
        }
    }
}