<?php

namespace assist;

use Aspose\Barcode\BarcodeGenerator;

class DatamatrixStrucuturedAppendTestParam extends RecognizeWithReaderTestParam
{
    public int $BarcodeId;
    public int $BarcodesCount;
    public int $FileId;

    public function __construct(int $expectedWidth, int $expectedHeight, string $expectedCodeText, int $barcodeId, int $barcodesCount, int $fileId)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->BarcodeId = $barcodeId;
        $this->BarcodesCount = $barcodesCount;
        $this->FileId = $fileId;
    }

    public function apply(BarcodeGenerator $generator)
    {
        $generator->getParameters()->getBarcode()->getDataMatrix()->setStructuredAppendBarcodeId($this->BarcodeId);
        $generator->getParameters()->getBarcode()->getDataMatrix()->setStructuredAppendBarcodesCount($this->BarcodesCount);
        $generator->getParameters()->getBarcode()->getDataMatrix()->setStructuredAppendFileId($this->FileId);
    }

    public function checkResultReader($reader)
    {
        Assert::assertEquals($this->BarcodeId, $reader->getFoundBarCodes()[0]->getExtended()->getDataMatrix()->getStructuredAppendBarcodeId());
        Assert::assertEquals($this->BarcodesCount, $reader->getFoundBarCodes()[0]->getExtended()->getDataMatrix()->getStructuredAppendBarcodesCount());
        Assert::assertEquals($this->FileId, $reader->getFoundBarCodes()[0]->getExtended()->getDataMatrix()->getStructuredAppendFileId());
    }
}