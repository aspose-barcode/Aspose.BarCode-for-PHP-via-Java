<?php

namespace assist;

class DataMatrixEncodeModeTestParam extends RecognizeTestParam
{
    private $DataMatrixEncodeMode;

    function getDataMatrixEncodeMode()
    {
        return $this->DataMatrixEncodeMode;
    }

    function setDataMatrixEncodeMode($dataMatrixEncodeMode)
    {
        $this->DataMatrixEncodeMode = $dataMatrixEncodeMode;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $dataMatrixEncodeMode)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->DataMatrixEncodeMode = $dataMatrixEncodeMode;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getDataMatrix()->setDataMatrixEncodeMode($this->DataMatrixEncodeMode);
    }
}