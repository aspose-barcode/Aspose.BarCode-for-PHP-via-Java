<?php

namespace assist;

class QREncodeTypeTestParam extends RecognizeTestParam
{
    private $QREncodeType;

    function getQREncodeType()
    {
        return $this->QREncodeType;
    }

    function setQREncodeType($QREncodeType)
    {
        $this->QREncodeType = QREncodeType;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $qrEncodeType)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->QREncodeType = $qrEncodeType;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getQR()->setQrEncodeType($this->QREncodeType);
    }
}