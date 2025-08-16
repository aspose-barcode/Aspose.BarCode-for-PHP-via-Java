<?php

namespace assist;

class EnableEscapeTestParam extends RecognizeTestParam
{
    public $codeText;

    function getCodeText()
    {
        return $this->codeText;
    }

    function setCodeText($codeText)
    {
        $this->codeText = $codeText;
    }

    private $_enableEscape;

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $codeText, $enableEscape)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->setCodeText($codeText);
        $this->_enableEscape = $enableEscape;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->setEnableEscape($this->_enableEscape);
    }
}