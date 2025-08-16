<?php

namespace assist;

class UnitUpdateTestParam extends UnitTestParam
{
    private $_value;
    private $_graphicsUnit;

    private $expectedException;

    function isExpectedException()
    {
        return $this->expectedException;
    }

    function setExpectedException($expectedException)
    {
        $this->expectedException = $expectedException;
    }

    static function construct2($value, $graphicsUnit)
    {
        return new UnitUpdateTestParam($value, $graphicsUnit, false, 0, 0);
    }

    static function construct3($value, $graphicsUnit, $expectedException)
    {
        return new UnitUpdateTestParam($value, $graphicsUnit, $expectedException, 0, 0);
    }

    function __construct($value, $graphicsUnit, $expectedException, $expectedWidth, $expectedHeight)
    {
        parent::constructor($expectedWidth, $expectedHeight);

        $this->_value = $value;
        $this->_graphicsUnit = $graphicsUnit;
        $this->setExpectedException($expectedException);
    }

    function apply($unit)
    {
        $this->UpdateUnit($unit, $this->_value, $this->_graphicsUnit);
    }
}