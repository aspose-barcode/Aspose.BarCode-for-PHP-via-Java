<?php

namespace assist;

class RowsTestParam extends RecognizeTestParam
{
    private $rows;

    function getRows()
    {
        return $this->rows;
    }

    function setRows($rows)
    {
        $this->rows = $rows;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $rows)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->setRows($rows);
    }

    function apply($generator)
    {
        $barcodeType = $generator->getBarcodeType();
        if ($barcodeType == EncodeTypes::PDF_417 ||
            $barcodeType == EncodeTypes::MICRO_PDF_417 ||
            $barcodeType == EncodeTypes::MACRO_PDF_417) {
            $generator->getParameters()->getBarcode()->getPdf417()->setRows($this->getRows());
        }
        if ($barcodeType == EncodeTypes::DATA_MATRIX || $barcodeType == EncodeTypes::GS_1_DATA_MATRIX) {
            $generator->getParameters()->getBarcode()->getDataMatrix()->setRows($this->getRows());
        }
        if ($barcodeType == EncodeTypes::CODABLOCK_F || $barcodeType == EncodeTypes::GS_1_CODABLOCK_F) {
            $generator->getParameters()->getBarcode()->getCodablock()->setRows($this->getRows());
        }
        if ($barcodeType == EncodeTypes::DATABAR_EXPANDED ||
            $barcodeType == EncodeTypes::DATABAR_EXPANDED_STACKED ||
            $barcodeType == EncodeTypes::DATABAR_LIMITED ||
            $barcodeType == EncodeTypes::DATABAR_OMNI_DIRECTIONAL ||
            $barcodeType == EncodeTypes::DATABAR_STACKED ||
            $barcodeType == EncodeTypes::DATABAR_STACKED_OMNI_DIRECTIONAL ||
            $barcodeType == EncodeTypes::DATABAR_TRUNCATED ||
            $barcodeType == EncodeTypes::UPCA_GS_1_DATABAR_COUPON) {
            $generator->getParameters()->getBarcode()->getDataBar()->setRows($this->getRows());
        }
    }
}