<?php

namespace assist;

class Pdf417ErrorLevelTestParam extends RecognizeTestParam
{
    private $pdf417ErrorLevel;

    function getPdf417ErrorLevel()
    {
        return $this->pdf417ErrorLevel;
    }

    function setPdf417ErrorLevel($pdf417ErrorLevel)
    {
        $this->pdf417ErrorLevel = $pdf417ErrorLevel;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $pdf417ErrorLevel)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->setPdf417ErrorLevel($pdf417ErrorLevel);
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getPdf417()->setPdf417ErrorLevel($this->pdf417ErrorLevel);
    }
}