<?php

namespace assist;

class AztecReaderInitializationTestParam extends AztecSymbolModeTestParam
{
    private $_isReaderInitialization;

    public function isReaderInitialization()
    {
        return $this->_isReaderInitialization;
    }

    public function setReaderInitialization($readerInitialization)
    {
        $this->_isReaderInitialization = $readerInitialization;
    }

    public function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $aztecSymbolMode, $layersCount, $isReaderInitialization)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText, $aztecSymbolMode, $layersCount);
        $this->_isReaderInitialization = $isReaderInitialization;
    }

    public function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getAztec()->setAztecSymbolMode($this->getAztecSymbolMode());
        $generator->getParameters()->getBarcode()->getAztec()->setReaderInitialization($this->_isReaderInitialization);
    }

    public function checkResultReader($reader)
    {
        Assert::assertEquals($this->_isReaderInitialization, $reader->getFoundBarCodes()[0]->getExtended()->getAztec()->isReaderInitialization());
    }
}