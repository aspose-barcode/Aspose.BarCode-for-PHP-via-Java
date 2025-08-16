<?php

namespace assist;

use Aspose\Barcode\BarCodeReader;

class RecognizeWithReaderTestParam extends TestParams
{
    private $expectedCodeText;

    function getExpectedCodeText()
    {
        return $this->expectedCodeText;
    }

    function setExpectedCodeText($expectedCodeText)
    {
        $this->expectedCodeText = $expectedCodeText;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText)
    {
        parent::__construct($expectedWidth, $expectedHeight);
        $this->setExpectedCodeText($expectedCodeText);
    }

    function checkResult($bitmap)
    {
        $validator = new GenerationValidator($bitmap);
        $validator->addValidator(new RecognitionValidator($bitmap, $this->getExpectedCodeText(), null));
        Assert::assertTrue($validator->validate());

        $reader = new BarCodeReader($bitmap, null, null);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals($this->expectedCodeText, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        $this->checkResultReader($reader);
    }

    function checkResultReader($reader)
    {
    }
}