<?php

namespace assist;

class BarCodeHeightTestParam extends UnitTestParam
{
    private $value;
    private $GraphicsUnit;

    private $_expectedBarcodeWidth;
    private $_expectedBarcodeHeight;

    private $_expectedShortBarHeight;

    function __construct(
        $value, $graphicsUnit,
        $expectedBarcodeWidth, $expectedBarcodeHeight)
    {
        parent::__construct(0, 0);
        $this->Value = $value;
        $this->GraphicsUnit = $graphicsUnit;

        $this->_expectedBarcodeHeight = $expectedBarcodeHeight;
        $this->_expectedBarcodeWidth = $expectedBarcodeWidth;
    }

    static function construct(
        $value, $graphicsUnit,
        $expectedBarcodeWidth, $expectedBarcodeHeight,
        $expectedShortBarHeight)
    {

        $barCodeHeightTestParam = new BarCodeHeightTestParam($value, $graphicsUnit, $expectedBarcodeWidth, $expectedBarcodeHeight);
        $barCodeHeightTestParam->_expectedShortBarHeight = $expectedShortBarHeight;

        return $barCodeHeightTestParam;
    }

    function apply($generator)
    {
        UpdateUnit($generator->getParameters()->getImageHeight(), $this->value, $this->graphicsUnit);
    }

    function checkResult($bitmap)
    {
        $selector = new BarcodePictureSelectorWithoutText($bitmap, true);
        $parser = new BarcodePictureParserSimple($selector);
        $validator = new GenerationValidator($parser);
        $validator->addValidator(new BarcodeSizeValidator($this->_expectedBarcodeWidth, $this->_expectedBarcodeHeight, 1));
        Assert::assertTrue($validator->validate());

        if ($this->_expectedShortBarHeight > 0) {
            $selector = new BarcodePictureSelectorWithoutText($bitmap, true);
            $parser = new BarcodePictureParserForPostals($selector);
            $validator = new GenerationValidator($parser);
            $validator->addValidator(new PostalValidator($this->_expectedShortBarHeight, $this->_expectedBarcodeHeight));
            Assert::assertTrue($validator->validate());
        }
    }
}