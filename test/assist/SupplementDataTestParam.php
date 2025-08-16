<?php

namespace assist;

use Aspose\Barcode\DecodeType;

class SupplementDataTestParam extends TestParams
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

    private $expectedSupplementData;

    private $encodeType;

    function getExpectedSupplementData()
    {
        return $this->expectedSupplementData;
    }

    function setExpectedSupplementData($expectedSupplementData)
    {
        $this->expectedSupplementData = $expectedSupplementData;
    }

    function getEncodeType()
    {
        return $this->encodeType;
    }

    function setEncodeType($encodeType)
    {
        $this->encodeType = $encodeType;
    }

    static function construct($expectedWidth, $expectedHeight, $expectedCodeText, $expectedSupplementData)
    {
        return new SupplementDataTestParam($expectedWidth, $expectedHeight, $expectedCodeText, $expectedSupplementData, EncodeTypes::EAN_13);
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $expectedSupplementData, $encodeType)
    {
        parent::__construct($expectedWidth, $expectedHeight);
        $this->setExpectedCodeText($expectedCodeText);
        $this->setExpectedSupplementData($expectedSupplementData);
        $this->setEncodeType($encodeType);
    }

    function apply($generator)
    {
        $generator->setCodeText($this->getExpectedCodeText(), null);
        $generator->getParameters()->getBarcode()->getSupplement()->setSupplementData($this->getExpectedSupplementData());
    }

    function checkResult($bitmap)
    {
        $mainDecodeType = DecodeType::EAN_13;
        if ($this->getEncodeType() == EncodeTypes::EAN_8)
            $mainDecodeType = DecodeType::EAN_8;
        if ($this->getEncodeType() == EncodeTypes::ISBN)
            $mainDecodeType = DecodeType::ISBN;
        if ($this->getEncodeType() == EncodeTypes::UPCA)
            $mainDecodeType = DecodeType::UPCA;
        if ($this->getEncodeType() == EncodeTypes::UPCE)
            $mainDecodeType = DecodeType::UPCE;
        if ($this->getEncodeType() == EncodeTypes::STANDARD_2_OF_5)
            $mainDecodeType = DecodeType::STANDARD_2_OF_5;
        if ($this->getEncodeType() == EncodeTypes::INTERLEAVED_2_OF_5)
            $mainDecodeType = DecodeType::INTERLEAVED_2_OF_5;

        $validator = new GenerationValidator($bitmap);
        $codeTexts = [$this->getExpectedCodeText(), $this->getExpectedSupplementData()];
        $codeTypes = [$mainDecodeType, DecodeType::SUPPLEMENT];
        Assert::assertTrue($validator->validate());

        parent::checkResult($bitmap);
    }
}