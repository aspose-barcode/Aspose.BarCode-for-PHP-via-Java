<?php

namespace assist;

class QREncodeModeTestParam extends RecognizeTestParam
{
    private $QREncodeMode;

    function getQREncodeMode()
    {
        return $this->QREncodeMode;
    }

    function setQREncodeMode($QREncodeMode)
    {
        $this->QREncodeMode = $QREncodeMode;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $qrEncodeMode)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->QREncodeMode = $qrEncodeMode;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode($this->QREncodeMode);
    }
}