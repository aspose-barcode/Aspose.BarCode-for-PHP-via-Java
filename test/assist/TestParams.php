<?php
namespace assist;

class TestParams
{
    private $expectedWidth;

    private $expectedHeight;

    function getExpectedWidth()
    {
        return $this->expectedWidth;
    }

    function setExpectedWidth($expectedWidth)
    {
        $this->expectedWidth = $expectedWidth;
    }

    function getExpectedHeight()
    {
        return $this->expectedHeight;
    }

    function setExpectedHeight($expectedHeight)
    {
        $this->expectedHeight = $expectedHeight;
    }

    function __construct($expectedWidth, $expectedHeight)
    {
        $this->setExpectedWidth($expectedWidth);
        $this->setExpectedHeight($expectedHeight);
    }

    function checkResult(string $bitmap)
    {
        $validator = new GenerationValidator($bitmap);
        $validator->addValidator(new ImageSizeValidator($bitmap, $this->getExpectedWidth(), $this->getExpectedHeight(), 1));
        Assert::assertTrue($validator->validate());
    }
}
