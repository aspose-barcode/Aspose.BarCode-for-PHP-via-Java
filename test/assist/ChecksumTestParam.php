<?php

namespace assist;

class ChecksumTestParam extends TestParams
{
    private $EncodeType;

    private $_specifiedAlwaysShow;
    private $_alwaysShow;
    private $_expectedTextBounds;

    private $_specifiedEnableChecksum;
    private $_enableChecksum;

    function __construct($expectedWidth, $expectedHeight)
    {
        parent::__construct($expectedWidth, $expectedHeight);
    }

    static function construct5($encodeType, $expectedWidth, $expectedHeight, $alwaysShowChecksum, $expectedTextBounds)
    {
        $checksumTestParam = new ChecksumTestParam($expectedWidth, $expectedHeight);
        $checksumTestParam->EncodeType = $encodeType;

        $checksumTestParam->_specifiedAlwaysShow = true;
        $checksumTestParam->_alwaysShow = $alwaysShowChecksum;
        $checksumTestParam->_expectedTextBounds = $expectedTextBounds;
        return $checksumTestParam;
    }

    static function construct4($encodeType, $expectedWidth, $expectedHeight, $enableChecksum)
    {
        $checksumTestParam = new ChecksumTestParam($expectedWidth, $expectedHeight);
        $checksumTestParam->EncodeType = $encodeType;

        $checksumTestParam->_specifiedEnableChecksum = true;
        $checksumTestParam->_enableChecksum = $enableChecksum;
        return $checksumTestParam;
    }

    function apply($generator)
    {
        if ($this->_specifiedAlwaysShow)
            $generator->getParameters()->getBarcode()->setChecksumAlwaysShow($this->_alwaysShow);

        if ($this->_specifiedEnableChecksum)
            $generator->getParameters()->getBarcode()->setChecksumEnabled($this->_enableChecksum);
    }

    function checkResult($bitmap)
    {
        parent::checkResult($bitmap);

        if ($this->_specifiedAlwaysShow) {
            $validator = new GenerationValidator($bitmap);
            $validator->addValidator(new TextZoneValidator($this->_expectedTextBounds, 3, 1));
            Assert::assertTrue($validator->validate());
        }
    }
}