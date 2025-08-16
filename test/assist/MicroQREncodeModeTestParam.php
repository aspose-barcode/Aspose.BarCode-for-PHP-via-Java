<?php

namespace assist;

class MicroQREncodeModeTestParam extends RecognizeTestParam
{
    private $qREncodeMode;

    function getqREncodeMode()
    {
        return $this->qREncodeMode;
    }

    function setqREncodeMode($qREncodeMode)
    {
        $this->qREncodeMode = $qREncodeMode;
    }

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