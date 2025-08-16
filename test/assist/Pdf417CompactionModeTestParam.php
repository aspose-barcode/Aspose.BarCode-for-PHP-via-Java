<?php

namespace assist;

class Pdf417CompactionModeTestParam extends RecognizeTestParam
{
    private $compactionMode;

    function getCompactionMode()
    {
        return $this->compactionMode;
    }

    function setCompactionMode($compactionMode)
    {
        $this->compactionMode = $compactionMode;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $compactionMode)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->compactionMode = $compactionMode;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getPdf417()->setPdf417CompactionMode($this->compactionMode);
    }
}