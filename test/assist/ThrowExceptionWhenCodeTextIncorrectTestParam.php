<?php

namespace assist;

class ThrowExceptionWhenCodeTextIncorrectTestParam
{
    private $encodeType;
    public $codeText;

    private $_throwExceptionWhenCodeTextIncorrect;

    private $_expectedException;

    function getEncodeType()
    {
        return $this->encodeType;
    }

    function setEncodeType($encodeType)
    {
        $this->encodeType = $encodeType;
    }

    function getCodeText()
    {
        return $this->codeText;
    }

    function setCodeText($codeText)
    {
        $this->codeText = $codeText;
    }

    function is_throwExceptionWhenCodeTextIncorrect()
    {
        return $this->_throwExceptionWhenCodeTextIncorrect;
    }

    function set_throwExceptionWhenCodeTextIncorrect($_throwExceptionWhenCodeTextIncorrect)
    {
        $this->_throwExceptionWhenCodeTextIncorrect = $_throwExceptionWhenCodeTextIncorrect;
    }

    function is_expectedException()
    {
        return $this->_expectedException;
    }

    function set_expectedException($_expectedException)
    {
        $this->_expectedException = $_expectedException;
    }

    function __construct($encodeType, $codeText, $throwExceptionWhenCodeTextIncorrect, $expectedException)
    {
        $this->setEncodeType($encodeType);
        $this->setCodeText($codeText);

        $this->_throwExceptionWhenCodeTextIncorrect = $throwExceptionWhenCodeTextIncorrect;
        $this->_expectedException = $expectedException;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->setThrowExceptionWhenCodeTextIncorrect($this->_throwExceptionWhenCodeTextIncorrect);
    }

    function checkResult($generator)
    {
        if ($this->_expectedException) {
            $bitmap = TestHelper::generateBarCodeImage(generator);
            Assert::fail("Must be expcetion, because codetext isn't correct.");
        } else {
            $bitmap = TestHelper . generateBarCodeImage(generator);
        }
    }
}