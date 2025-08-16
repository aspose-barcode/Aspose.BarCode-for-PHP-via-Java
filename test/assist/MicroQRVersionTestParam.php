<?php

namespace assist;

class MicroQRVersionTestParam extends RecognizeTestParam
{
    private $microQRVersion;

    function getMicroQRVersion()
    {
        return $this->microQRVersion;
    }

    function setMicroQRVersion($microQRVersion)
    {
        $this->microQRVersion = $microQRVersion;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $qrVersion)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->microQRVersion = $qrVersion;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getQR()->setMicroQRVersion($this->microQRVersion);
    }

    public function __toString()
    {
        return sprintf(
            "MicroQRVersionTestParam{width=%s, height=%s, codeText=%s, microQRVersion=%s}",
            $this->getExpectedWidth(),
            $this->getExpectedHeight(),
            $this->getExpectedCodeText(),
            $this->microQRVersion
        );
    }
}