<?php

namespace assist;

class DatamatrixVersionTestParam extends RecognizeTestParam
{
    public $DatamatrixEcc;
    public $DataMatrixVersion;

    public function __construct(int $expectedWidth, int $expectedHeight, string $expectedCodeText, $datamatrixEcc, $dataMatrixVersion)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->DatamatrixEcc = $datamatrixEcc;
        $this->DataMatrixVersion = $dataMatrixVersion;
    }

    public function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getDataMatrix()->setDataMatrixEcc($this->DatamatrixEcc);
        $generator->getParameters()->getBarcode()->getDataMatrix()->setDataMatrixVersion($this->DataMatrixVersion);
    }
}