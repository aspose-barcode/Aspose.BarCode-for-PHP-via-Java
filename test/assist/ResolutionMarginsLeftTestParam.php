<?php

namespace assist;

class ResolutionMarginsLeftTestParam extends MarginsLeftTestParam
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