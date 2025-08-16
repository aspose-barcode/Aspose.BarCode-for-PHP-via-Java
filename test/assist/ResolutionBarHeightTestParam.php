<?php

namespace assist;

class ResolutionBarHeightTestParam extends BarHeightTestParam
{
    private $_dpi;

    function __construct($expectedWidth, $expectedHeight, $value, $graphicsUnit, $dpi)
    {
        parent::__construct($expectedWidth, $expectedHeight, $value, $graphicsUnit);
        $this->_dpi = $dpi;
    }

    function apply($generator)
    {
        $generator->getParameters()->setResolution($this->_dpi);

        parent::apply($generator);
    }
}