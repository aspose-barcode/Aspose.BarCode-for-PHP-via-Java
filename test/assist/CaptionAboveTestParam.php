<?php

namespace assist;

class CaptionAboveTestParam extends UnitTestParam
{
    private $_usedDefaultValue = false;
    private $_value;

    private $_graphicsUnit;

    static function construct($expectedWidth, $expectedHeight, $value, $graphicsUnit)
    {
        $captionAboveTestParam = new CaptionAboveTestParam($expectedWidth, $expectedHeight);

        $captionAboveTestParam->_value = $value;
        $captionAboveTestParam->_graphicsUnit = $graphicsUnit;
        return $captionAboveTestParam;
    }

    function __construct($expectedWidth, $expectedHeight)
    {
        parent::__construct($expectedWidth, $expectedHeight);

        $this->_usedDefaultValue = true;
    }

    function apply($generator)
    {
        $generator->getParameters()->getCaptionAbove()->setVisible(true);
        if (!_usedDefaultValue)
            UpdateUnit($generator->getParameters()->getCaptionAbove()->getPadding()->getBottom(), _value, _graphicsUnit);
    }
}