<?php

namespace assist;

class BorderTestParam extends UnitTestParam
{
    private $_value;
    private $_graphicsUnit;
    private $_expectedBroderWidth;

    private $_dashStyle;

    private $_color;
    private $generator;

    function __construct($expectedWidth, $expectedHeight, $value, $graphicsUnit, $expectedBroderWidth, $dashStyle, $color)
    {
        parent::__construct($expectedWidth, $expectedHeight);
        $this->_value = $value;
        $this->_graphicsUnit = $graphicsUnit;
        $this->_expectedBroderWidth = $expectedBroderWidth;
        $this->_dashStyle = $dashStyle;
        $this->_color = $color;
    }

    function apply($generator)
    {
        $this->generator = $generator;
        $generator->getParameters()->getBorder()->setVisible(true);
        $this->UpdateUnit($generator->getParameters()->getBorder()->getWidth(), $this->_value, $this->_graphicsUnit);
        $generator->getParameters()->getBorder()->setDashStyle($this->_dashStyle);
        $generator->getParameters()->getBorder()->setColor($this->_color);
    }

    function checkResult($bitmap)
    {
        parent::checkResult($bitmap);

        $validator = new GenerationValidator($bitmap);
        $validator->addValidator(BorderValidator::construct4($this->generator, $this->_expectedBroderWidth, $this->_color, $this->_dashStyle));
        Assert::assertTrue($validator->validate());
    }
}