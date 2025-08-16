<?php

namespace assist;

class ResolutionTestParam extends TestParams
{
    private $_dpi;

    function __construct($expectedWidth, $expectedHeight, $dpi)
    {
        parent::__construct($expectedWidth, $expectedHeight);

        $this->_dpi = $dpi;
    }

    function apply($generator)
    {
        $generator->getParameters()->setResolution($this->_dpi);
    }
}