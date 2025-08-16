<?php

namespace assist;

class AztectErrorLevelTestParam extends RecognizeWithReaderTestParam
{
    private $AztecErrorLevel;

    function getAztecErrorLevel()
    {
        return $this->AztecErrorLevel;
    }

    function setAztecErrorLevel($aztecErrorLevel)
    {
        $this->AztecErrorLevel = $aztecErrorLevel;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $aztectErrorLevel)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->AztecErrorLevel = $aztectErrorLevel;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getAztec()->setAztecErrorLevel($this->AztecErrorLevel);
    }
}