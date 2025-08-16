<?php

namespace assist;

use Aspose\Barcode\BarcodeGenerator;

class DatamatrixReaderProgrammingTestParam extends RecognizeWithReaderTestParam
{
    public bool $IsReaderProgramming;

    public function __construct(int $expectedWidth, int $expectedHeight, string $expectedCodeText, bool $isReaderProgramming)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->IsReaderProgramming = $isReaderProgramming;
    }

    public function apply(BarcodeGenerator $generator)
    {
        $generator->getParameters()->getBarcode()->getDataMatrix()->setReaderProgramming($this->IsReaderProgramming);
    }

    public function checkResultReader($reader)
    {
        Assert::assertEquals($this->IsReaderProgramming, $reader->getFoundBarCodes()[0]->getExtended()->getDataMatrix()->isReaderProgramming());
    }
}