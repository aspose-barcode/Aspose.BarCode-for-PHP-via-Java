<?php

namespace assist;

class ColumnsTestParam extends RecognizeTestParam
{
    private $Columns;

    function getColumns()
    {
        return $this->Columns;
    }

    function setColumns($columns)
    {
        $this->Columns = $columns;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $columns)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->Columns = $columns;
    }

    function apply($generator)
    {
        $barcodeType = $generator->getBarcodeType();
        if ($barcodeType == EncodeTypes::PDF_417 ||
            $barcodeType == EncodeTypes::MICRO_PDF_417 ||
            $barcodeType == EncodeTypes::MACRO_PDF_417) {
            $generator->getParameters()->getBarcode()->getPdf417()->setColumns($this->Columns);
        }
        if ($barcodeType == EncodeTypes::DATA_MATRIX || $barcodeType == EncodeTypes::GS_1_DATA_MATRIX) {
            $generator->getParameters()->getBarcode()->getDataMatrix()->setColumns($this->Columns);
        }
        if ($barcodeType == EncodeTypes::CODABLOCK_F || $barcodeType == EncodeTypes::GS_1_CODABLOCK_F) {
            $generator->getParameters()->getBarcode()->getCodablock()->setColumns($this->Columns);
        }
        if ($barcodeType == EncodeTypes::DATABAR_EXPANDED ||
            $barcodeType == EncodeTypes::DATABAR_EXPANDED_STACKED ||
            $barcodeType == EncodeTypes::DATABAR_LIMITED ||
            $barcodeType == EncodeTypes::DATABAR_OMNI_DIRECTIONAL ||
            $barcodeType == EncodeTypes::DATABAR_STACKED ||
            $barcodeType == EncodeTypes::DATABAR_STACKED_OMNI_DIRECTIONAL ||
            $barcodeType == EncodeTypes::DATABAR_TRUNCATED ||
            $barcodeType == EncodeTypes::UPCA_GS_1_DATABAR_COUPON) {
            $generator->getParameters()->getBarcode()->getDataBar()->setColumns($this->Columns);
        }
    }
}