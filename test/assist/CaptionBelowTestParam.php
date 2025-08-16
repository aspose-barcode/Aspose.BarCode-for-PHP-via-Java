<?php

namespace assist;

class CaptionBelowTestParam extends UnitTestParam
{
    private $_usedDefaultValue = false;
    private $_value;

    private $_graphicsUnit;

    static function construct($expectedWidth, $expectedHeight, $value, $graphicsUnit)
    {
        $captionBelowTestParam = new CaptionBelowTestParam($expectedWidth, $expectedHeight);

        $captionBelowTestParam->_value = $value;
        $captionBelowTestParam->_graphicsUnit = $graphicsUnit;
        return $captionBelowTestParam;
    }

    function __construct($expectedWidth, $expectedHeight)
    {
        parent::__construct($expectedWidth, $expectedHeight);

        $this->_usedDefaultValue = true;
    }

    function apply($generator)
    {
        $generator->getParameters()->getCaptionBelow()->setVisible(true);
        $generator->getParameters()->getCaptionBelow()->setText("CaptionBelow");
        if (!_usedDefaultValue)
            UpdateUnit($generator->getParameters()->getCaptionBelow()->getPadding()->getTop(), _value, _graphicsUnit);
    }
}