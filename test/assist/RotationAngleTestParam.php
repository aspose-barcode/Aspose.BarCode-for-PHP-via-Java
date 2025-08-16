<?php

namespace assist;

use Aspose\Barcode\BarCodeReader;

class RotationAngleTestParam extends TestParams
{
    private $_value;

    private $_expectedValue;

    static function construct($expectedWidth, $expectedHeight, $value)
    {
        return new RotationAngleTestParam($expectedWidth, $expectedHeight, $value, $value);
    }

    function __construct($expectedWidth, $expectedHeight, $value, $expectedValue)
    {
        parent::__construct($expectedWidth, $expectedHeight);
        $this->_value = $value;
        $this->_expectedValue = $expectedValue;
    }

    function apply($generator)
    {
        $generator->getParameters()->setRotationAngle($this->_value);
    }

    function checkResult($bitmap)
    {
        parent::checkResult($bitmap);

        $reader = new BarCodeReader($bitmap, null, null);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertTrue(abs($this->_expectedValue - $reader->getFoundBarCodes()[0]->getRegion()->getAngle()) <= 1);
    }
}