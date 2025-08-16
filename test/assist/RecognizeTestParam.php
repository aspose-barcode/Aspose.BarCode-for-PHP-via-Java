<?php

namespace assist;

class RecognizeTestParam extends TestParams
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

        parent::checkResult($bitmap);
    }
}