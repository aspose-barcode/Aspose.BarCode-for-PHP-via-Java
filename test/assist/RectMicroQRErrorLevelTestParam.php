<?php

namespace assist;

class RectMicroQRErrorLevelTestParam extends RecognizeTestParam
{

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $qrErrorLevel)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->qRErrorLevel = $qrErrorLevel;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getQR()->setQrErrorLevel($this->qRErrorLevel);
    }
}