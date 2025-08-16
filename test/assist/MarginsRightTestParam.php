<?php

namespace assist;

class MarginsRightTestParam extends UnitTestParam
{
    private $_value;
    private $_graphicsUnit;

    function __construct($expectedWidth, $expectedHeight, $value, $graphicsUnit)
    {
        parent::__construct($expectedWidth, $expectedHeight);
        $this->_value = $value;
        $this->_graphicsUnit = $graphicsUnit;
    }

    function apply($generator)
    {
        UpdateUnit($generator->getParameters()->getBarcode()->getPadding()->getRight(), _value, _graphicsUnit);
    }
}