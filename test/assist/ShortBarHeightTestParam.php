<?php

namespace assist;

class ShortBarHeightTestParam extends UnitTestParam
{
    private $_value;
    private $_graphicsUnit;

    private $_expectedShortHeight;
    private $_expectedBarHeight;
    private $generator;

    function __construct($expectedWidth, $expectedHeight, $expectedBarHeight, $expectedShortHeight, $value, $graphicsUnit)
    {
        parent::__construct($expectedWidth, $expectedHeight);

        $this->_value = $value;
        $this->_graphicsUnit = $graphicsUnit;

        $this->_expectedShortHeight = $expectedShortHeight;
        $this->_expectedBarHeight = $expectedBarHeight;
    }

    function apply($generator)
    {
        $this->generator = $generator;
        $this->UpdateUnit($generator->getParameters()->getBarcode()->getPostal()->getPostalShortBarHeight(), $this->_value, $this->_graphicsUnit);
        $this->UpdateUnit($generator->getParameters()->getBarcode()->getAustralianPost()->getAustralianPostShortBarHeight(), $this->_value, $this->_graphicsUnit);
    }

    function checkResult($bitmap)
    {
        parent::checkResult($bitmap);

        $validator = new GenerationValidator($bitmap);
        $validator->addValidator(new PostalValidator($this->generator, $this->_expectedShortHeight, $this->_expectedBarHeight));
        Assert::assertTrue($validator->validate());
    }
}