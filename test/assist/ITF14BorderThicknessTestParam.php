<?php

namespace assist;

class ITF14BorderThicknessTestParam extends UnitTestParam
{
    private $generator;
    private $_value;
    private $_graphicsUnit;

    private $_expectedBarcodeWidth;
    private $_expectedBarcodeHeight;

    private $_expectedBorderThickness;

    private $_expectedBorderType;

    static function construct(
        $expectedWidth, $expectedHeight,
        $value, $graphicsUnit,
        $expectedBarcodeWidth, $expectedBarcodeHeight,
        $expectedBorderThickness)
    {
        $itf14BorderThicknessTestParam = new ITF14BorderThicknessTestParam(
            $expectedWidth, $expectedHeight,
            $value, $graphicsUnit,
            $expectedBarcodeWidth, $expectedBarcodeHeight,
            $expectedBorderThickness, ITF14BorderType::BAR);
        return $itf14BorderThicknessTestParam;
    }

    function __construct(
        $expectedWidth, $expectedHeight,
        $value, $graphicsUnit,
        $expectedBarcodeWidth, $expectedBarcodeHeight,
        $expectedBorderThickness,
        $expectedBorderType)
    {
        parent::__construct($expectedWidth, $expectedHeight);

        $this->_value = $value;
        $this->_graphicsUnit = $graphicsUnit;

        $this->_expectedBarcodeWidth = $expectedBarcodeWidth;
        $this->_expectedBarcodeHeight = $expectedBarcodeHeight;

        $this->_expectedBorderThickness = $expectedBorderThickness;

        $this->_expectedBorderType = $expectedBorderType;
    }

    function checkResult($bitmap)
    {
        $validator = new GenerationValidator($bitmap);
        $validator->addValidator(BarcodeSizeValidator::construct($this->generator, $this->_expectedBarcodeWidth, $this->_expectedBarcodeHeight, 1));
        $validator->addValidator(ITF14Validator::construct2($this->generator, $this->_expectedBorderThickness, $this->_expectedBorderType));
        Assert::assertTrue($validator->validate());

        parent::checkResult($bitmap);
    }

    function apply($generator)
    {
        $this->generator = $generator;
        $this->UpdateUnit($generator->getParameters()->getBarcode()->getITF()->getItfBorderThickness(), $this->_value, $this->_graphicsUnit);
        $generator->getParameters()->getBarcode()->getITF()->setItfBorderType($this->_expectedBorderType);
    }
}