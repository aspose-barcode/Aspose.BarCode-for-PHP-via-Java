<?php

namespace assist;

class ResolutionBarCodeWidthAndHeightTestParam extends BarCodeWidthAndHeightTestParam
{
    private $_dpi;

    function __construct($expectedWidth, $expectedHeight, $encodeType,
                         $widthValue, $widthGraphicsUnit,
                         $heightValue, $heightGraphicsUnit,
                         $dpi)
    {
        parent::__construct($expectedWidth, $expectedHeight, $encodeType);
        $this->_widthValue = $widthValue;
        $this->_widthGraphicsUnit = $widthGraphicsUnit;
        $this->_heightValue = $heightValue;
        $this->_heightGraphicsUnit = $heightGraphicsUnit;
        $this->_dpi = $dpi;
    }

    function apply($generator)
    {
        $generator->getParameters()->setResolution($this->_dpi);

        parent::apply($generator);
    }
}