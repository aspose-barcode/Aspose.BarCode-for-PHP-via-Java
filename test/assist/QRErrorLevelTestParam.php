<?php

namespace assist;

class QRErrorLevelTestParam extends RecognizeTestParam
{
    private $QRErrorLevel;

    function getQRErrorLevel()
    {
        return $this->QRErrorLevel;
    }

    function setQRErrorLevel($QRErrorLevel)
    {
        $this->QRErrorLevel = $QRErrorLevel;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $qrErrorLevel)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->QRErrorLevel = $qrErrorLevel;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getQR()->setQrErrorLevel($this->QRErrorLevel);
    }
}