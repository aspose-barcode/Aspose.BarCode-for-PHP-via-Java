<?php

namespace assist;

class BarCodeWidthTestParam extends BarCodeHeightTestParam
{
    function __construct(
        $value, $graphicsUnit,
        $expectedBarcodeWidth, $expectedBarcodeHeight)
    {
        parent::__construct($value, $graphicsUnit, $expectedBarcodeWidth, $expectedBarcodeHeight);
    }

    function apply($generator)
    {
        UpdateUnit($generator->getParameters()->getImageWidth(), value, $this->graphicsUnit);
    }
}