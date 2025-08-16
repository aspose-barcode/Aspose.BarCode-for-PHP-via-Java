<?php

namespace assist;

class ITF14Validator extends IValidator
{
    private $_borderThickness;

    private $borderTypesSpecified;
    private $borderType;

    private $_delta = 1;
    private $generator;

    static function construct1($generator, $borderThickness)
    {
        return new ITF14Validator($generator, $borderThickness, 1);
    }

    function __construct($generator, $borderThickness, $delta)
    {

        $this->generator = $generator;
        $this->_borderThickness = $borderThickness;
        $this->_delta = $delta;
    }

    static function construct2($generator, $borderThickness, $borderType)
    {
        $validator = new ITF14Validator($generator, $borderThickness, 1);
        $validator->borderType = $borderType;
        return $validator;
    }

    static function construct3($generator, $borderThickness, $borderType, $delta)
    {
        $itf14Validator = new ITF14Validator($borderThickness, $delta);

        $itf14Validator->borderType = $borderType;
        $itf14Validator->borderTypesSpecified = true;
        return $itf14Validator;
    }

    function validate()
    {
        Assert::assertTrue(abs($this->_borderThickness - $this->generator->getParameters()->getBarcode()->getITF()->getItfBorderThickness()->getPixels()) <= $this->_delta);

        if ($this->borderTypesSpecified) {
            if ($this->borderType == ITF14BorderType::BAR || $this->borderType == ITF14BorderType::BAR_OUT) {
                if ($this->generator->getParameters()->getBarcode()->getITF()->getItfBorderType() != ITF14BorderType::BAR && $this->generator->getParameters()->getBarcode()->getITF()->getItfBorderType() != ITF14BorderType::BAR_OUT)
                    Assert::assertEquals($this->borderType, $this->generator->getParameters()->getITF()->getItfBorderType());
            } else if ($this->borderType == ITF14BorderType::FRAME || borderType == ITF14BorderType::FRAME_OUT) {
                if ($this->generator->getParameters()->getBarcode()->getITF()->getItfBorderType() != ITF14BorderType::FRAME && $this->generator->getParameters()->getBarcode()->getITF()->getItfBorderType() != ITF14BorderType::FRAME_OUT)
                    Assert::assertEquals($this->borderType, $this->generator->getParameters()->getBarcode()->getITF()->getItfBorderType());
            } else {
                Assert::assertEquals($this->borderType, $this->generator->getParameters()->getBarcode()->getITF()->getItfBorderType());
            }
        }

        return true;
    }
}