<?php

namespace assist;

class AspectRatioTestParam extends RecognizeTestParam
{
    private $aspectRatio;

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $aspectRatio)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->aspectRatio = $aspectRatio;
    }

    function apply($generator)
    {
        $barcodeType = $generator->getBarcodeType();
        if ($barcodeType == EncodeTypes::AZTEC) {
            $generator->getParameters()->getBarcode()->getAztec()->setAspectRatio($this->aspectRatio);
        }
        if ($barcodeType == EncodeTypes::MAXI_CODE) {
            $generator->getParameters()->getBarcode()->getMaxiCode()->setAspectRatio($this->aspectRatio);
        }
        if ($barcodeType == EncodeTypes::QR || $barcodeType == EncodeTypes::GS_1_QR) {
            $generator->getParameters()->getBarcode()->getQR()->setAspectRatio($this->aspectRatio);
        }
        if ($barcodeType == EncodeTypes::PDF_417 ||
            $barcodeType == EncodeTypes::MICRO_PDF_417 ||
            $barcodeType == EncodeTypes::MACRO_PDF_417) {
            $generator->getParameters()->getBarcode()->getPdf417()->setAspectRatio($this->aspectRatio);
        }
        if ($barcodeType == EncodeTypes::DOT_CODE) {
            $generator->getParameters()->getBarcode()->getDotCode()->setAspectRatio($this->aspectRatio);
        }
        if ($barcodeType == EncodeTypes::CODE_16_K) {
            $generator->getParameters()->getBarcode()->getCode16K()->setAspectRatio($this->aspectRatio);
        }
        if ($barcodeType == EncodeTypes::DATA_MATRIX || $barcodeType == EncodeTypes::GS_1_DATA_MATRIX) {
            $generator->getParameters()->getBarcode()->getDataMatrix()->setAspectRatio($this->aspectRatio);
        }
        if ($barcodeType == EncodeTypes::CODABLOCK_F || $barcodeType == EncodeTypes::GS_1_CODABLOCK_F) {
            $generator->getParameters()->getBarcode()->getCodablock()->setAspectRatio($this->aspectRatio);
        }
        if ($barcodeType == EncodeTypes::DATABAR_EXPANDED ||
            $barcodeType == EncodeTypes::DATABAR_EXPANDED_STACKED ||
            $barcodeType == EncodeTypes::DATABAR_LIMITED ||
            $barcodeType == EncodeTypes::DATABAR_OMNI_DIRECTIONAL ||
            $barcodeType == EncodeTypes::DATABAR_STACKED ||
            $barcodeType == EncodeTypes::DATABAR_STACKED_OMNI_DIRECTIONAL ||
            $barcodeType == EncodeTypes::DATABAR_TRUNCATED ||
            $barcodeType == EncodeTypes::UPCA_GS_1_DATABAR_COUPON) {
            $generator->getParameters()->getBarcode()->getDataBar()->setAspectRatio($this->aspectRatio);
        }
    }
}