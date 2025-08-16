<?php

namespace assist;

class MicroQRErrorLevelTestParam extends RecognizeTestParam
{
    function getqRErrorLevel()
    {
        return $this->qRErrorLevel;
    }

    function setqRErrorLevel($qRErrorLevel)
    {
        $this->qRErrorLevel = $qRErrorLevel;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $qrErrorLevel)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->qRErrorLevel = $qrErrorLevel;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getQR()->setQrErrorLevel($this->qRErrorLevel);
    }

    public function __toString()
    {
        return sprintf(
            "MicroQRErrorLevelTestParam{width=%s, height=%s, codeText=%s, qrErrorLevel=%s}",
            $this->getExpectedWidth(),
            $this->getExpectedHeight(),
            $this->getExpectedCodeText(),
            $this->qRErrorLevel
        );
    }
}