<?php

namespace assist;

class CodabarChecksumModeTestParam extends RecognizeTestParam
{
    private $checksumMode;

    function getChecksumMode()
    {
        return $this->checksumMode;
    }

    function setChecksumMode($checksumMode)
    {
        $this->checksumMode = $checksumMode;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $checksumMode)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->checksumMode = $checksumMode;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getCodabar()->setCodabarChecksumMode($this->getChecksumMode());
    }
}