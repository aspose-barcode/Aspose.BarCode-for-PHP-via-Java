<?php

namespace assist;

use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\ComplexCodetextReader;
use Aspose\Barcode\DecodeType;

class MaxiCodeModeTestParam extends RecognizeTestParam
{
    public $maxiCodeCodetext;
    public $maxiCodeStructuredAppendModeBarcodeId;
    public $maxiCodeStructuredAppendModeBarcodesCount;

    public function __construct(int $expectedWidth, int $expectedHeight, string $codetext, int $maxiCodeMode, int $maxiCodeStructuredAppendModeBarcodeId, int $maxiCodeStructuredAppendModeBarcodesCount)
    {
        parent::__construct($expectedWidth, $expectedHeight, $codetext);
        $maxiCodeStandartCodetext = new MaxiCodeStandardCodetext();
        $maxiCodeStandartCodetext->setMode($maxiCodeMode);
        $maxiCodeStandartCodetext->setMessage($codetext);
        $this->maxiCodeCodetext = $maxiCodeStandartCodetext;
        $this->maxiCodeStructuredAppendModeBarcodeId = $maxiCodeStructuredAppendModeBarcodeId;
        $this->maxiCodeStructuredAppendModeBarcodesCount = $maxiCodeStructuredAppendModeBarcodesCount;
    }

    function apply($generator)
    {
    }

    function checkResult($bitmap)
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
            Assert::assertTrue($resultMaxiCodeCodetext->equals($this->maxiCodeCodetext));
        }
    }
}