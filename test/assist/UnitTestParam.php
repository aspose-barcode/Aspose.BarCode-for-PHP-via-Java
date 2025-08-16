<?php

namespace assist;

class UnitTestParam extends TestParams
{
    function __construct($expectedWidth, $expectedHeight)
    {
        parent::__construct($expectedWidth, $expectedHeight);
    }

    function UpdateUnit($unit, $value, $graphicsUnit)
    {
        switch ($graphicsUnit) {
            case GraphicsUnit::PIXEL:
                $unit->setPixels($value);
                break;
            case GraphicsUnit::POINT:
                $unit->setPoint($value);
                break;
            case GraphicsUnit::INCH:
                $unit->setInches($value);
                break;
            case GraphicsUnit::DOCUMENT:
                $unit->setDocument($value);
                break;
            case GraphicsUnit::MILLIMETER:
                $unit->setMillimeters($value);
                break;
            default:
                break;
        }
    }
}