<?php

namespace assist;

class SupplementSpaceTestParam extends UnitTestParam
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
        $this->UpdateUnit($generator->getParameters()->getBarcode()->getSupplement()->getSupplementSpace(), $this->_value, $this->_graphicsUnit);
    }
}