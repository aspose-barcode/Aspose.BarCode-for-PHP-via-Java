<?php

namespace assist;

class Pdf417TruncateTestParam extends RecognizeTestParam
{
    private $pdf417Truncate;

    function isPdf417Truncate()
    {
        return $this->pdf417Truncate;
    }

    function setPdf417Truncate($pdf417Truncate)
    {
        $this->pdf417Truncate = $pdf417Truncate;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $pdf417Truncate)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->pdf417Truncate = $pdf417Truncate;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getPdf417()->setPdf417Truncate($this->pdf417Truncate);
    }
}