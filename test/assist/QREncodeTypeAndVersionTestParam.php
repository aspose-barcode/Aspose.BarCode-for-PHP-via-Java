<?php

namespace assist;

class QREncodeTypeAndVersionTestParam extends RecognizeTestParam
{
    function getqRVersion()
    {
        return $this->qRVersion;
    }

    function setqRVersion($qRVersion)
    {
        $this->qRVersion = $qRVersion;
    }

    function getqREncodeType()
    {
        return $this->qREncodeType;
    }

    function setqREncodeType($qREncodeType)
    {
        $this->qREncodeType = $qREncodeType;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $qrEncodeType, $qrVersion)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->qREncodeType = $qrEncodeType;
        $this->qRVersion = $qrVersion;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getQR()->setQrEncodeType($this->qREncodeType);
        $generator->getParameters()->getBarcode()->getQR()->setQrVersion($this->qRVersion);
    }
}