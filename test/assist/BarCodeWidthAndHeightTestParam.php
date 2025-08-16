<?php

namespace assist;

class BarCodeWidthAndHeightTestParam extends UnitTestParam
{
    public $EncodeType;

    public $_widthValue;
    public $_widthGraphicsUnit;
    public $_heightValue;
    public $_heightGraphicsUnit;

    function __construct($expectedWidth, $expectedHeight, $encodeType)
    {
        parent::__construct($expectedWidth, $expectedHeight);
        $this->EncodeType = $encodeType;
    }

    static function construct($expectedWidth, $expectedHeight, $encodeType,
                              $widthValue, $widthGraphicsUnit,
                              $heightValue, $heightGraphicsUnit)
    {
        $barCodeWidthAndHeightTestParam = new BarCodeWidthAndHeightTestParam($expectedWidth, $expectedHeight, $encodeType);
        $barCodeWidthAndHeightTestParam->_widthValue = $widthValue;
        $barCodeWidthAndHeightTestParam->_widthGraphicsUnit = $widthGraphicsUnit;
        $barCodeWidthAndHeightTestParam->_heightValue = $heightValue;
        $barCodeWidthAndHeightTestParam->_heightGraphicsUnit = $heightGraphicsUnit;
        return $barCodeWidthAndHeightTestParam;
    }

    function apply($generator)
    {
        $generator->getParameters()->setAutoSizeMode(AutoSizeMode::NEAREST);
        $this->UpdateUnit($generator->getParameters()->getImageWidth(), $this->_widthValue, $this->_widthGraphicsUnit);
        $this->UpdateUnit($generator->getParameters()->getImageHeight(), $this->_heightValue, $this->_heightGraphicsUnit);
    }
}