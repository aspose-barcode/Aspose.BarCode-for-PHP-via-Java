<?php

namespace assist;

class QRVersionTestParam extends RecognizeTestParam
{
    private $QRVersion;


    function getQRVersion()
    {
        return $this->QRVersion;
    }

    function setQRVersion($QRVersion)
    {
        $this->QRVersion = $QRVersion;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $qrVersion)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->QRVersion = $qrVersion;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getQR()->setQrVersion($this->QRVersion);
    }
}