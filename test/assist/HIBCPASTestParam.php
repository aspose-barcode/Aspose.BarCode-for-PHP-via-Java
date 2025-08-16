<?php

namespace assist;

use Aspose\Barcode\BarcodeGenerator;
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\ComplexCodetextReader;
use Aspose\Barcode\DecodeType;

class HIBCPASTestParam extends RecognizeTestParam
{
    public HIBCPASCodetext $expectedComplexCodetext;
    private string $encodeTypeName;

    public function __construct(int    $expectedWidth,
                                int    $expectedHeight,
                                string $encodeTypeName,
                                int    $dataLocation,
                                array  $recordsList)
    {
        parent::__construct($expectedWidth, $expectedHeight, "");
        $complexCodetext = new HIBCPASCodetext();
        $complexCodetext->setDataLocation($dataLocation);
        for ($i = 0; $i < sizeof($recordsList); $i++) {
            $complexCodetext->addHIBCPASRecord($recordsList[$i]);
        }
        $encodeType = EncodeTypes::parse($encodeTypeName);
        if ($encodeType == -1) {
            throw new Exception("Unsupported decode type");
        }
        $complexCodetext->setBarcodeType($encodeType);


        $this->expectedComplexCodetext = $complexCodetext;
        $this->encodeTypeName = $encodeTypeName;
        $this->setExpectedCodeText($this->expectedComplexCodetext->getConstructedCodetext());
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
            $complexCodetext = ComplexCodetextReader::tryDecodeHIBCPAS($codetext);
            Assert::assertTrue($this->expectedComplexCodetext->equals($complexCodetext));
        }
    }
}