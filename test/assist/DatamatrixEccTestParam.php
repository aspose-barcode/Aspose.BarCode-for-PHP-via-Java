<?php

namespace assist;

class DatamatrixEccTestParam extends RecognizeTestParam
{
    private $DatamatrixEcc;

    function getDatamatrixEcc()
    {
        return $this->DatamatrixEcc;
    }

    function setDatamatrixEcc($datamatrixEcc)
    {
        $this->DatamatrixEcc = $datamatrixEcc;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $datamatrixEcc)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->DatamatrixEcc = $datamatrixEcc;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getDataMatrix()->setDataMatrixEcc($this->DatamatrixEcc);
    }
}