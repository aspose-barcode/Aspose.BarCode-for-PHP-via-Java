<?php

namespace assist;

class RectMicroQREncodeModeTestParam extends RecognizeTestParam
{
    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $qrEncodeMode)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->qREncodeMode = $qrEncodeMode;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode($this->qREncodeMode);
    }
}