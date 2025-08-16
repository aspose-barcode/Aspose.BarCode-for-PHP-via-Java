<?php

namespace assist;

class RectMicroQRVersionTestParam extends RecognizeTestParam
{

    function getqRVersion()
    {
        return $this->qRVersion;
    }

    function setqRVersion($qRVersion)
    {
        $this->qRVersion = $qRVersion;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $qrVersion)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->qRVersion = $qrVersion;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getQR()->setRectMicroQrVersion($this->qRVersion);
    }
}