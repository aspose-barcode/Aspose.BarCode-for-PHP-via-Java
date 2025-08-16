<?php

namespace assist;

class WideNarrowRatioTestParam extends TestParams
{
    private $_value;

    function __construct($expectedWidth, $expectedHeight, $value)
    {
        parent::__construct($expectedWidth, $expectedHeight);
        $this->_value = $value;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->setWideNarrowRatio($this->_value);
    }
}