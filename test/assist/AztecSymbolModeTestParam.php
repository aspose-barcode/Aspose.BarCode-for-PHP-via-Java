<?php

namespace assist;

class AztecSymbolModeTestParam extends RecognizeWithReaderTestParam
{
    private $aztecSymbolMode;

    public function getAztecSymbolMode()
    {
        return $this->aztecSymbolMode;
    }

    private $layersCount;

    public function getLayersCount()
    {
        return $this->layersCount;
    }

    public function setLayersCount($layersCount)
    {
        $this->layersCount = $layersCount;
    }

    public function setAztecSymbolMode($aztecSymbolMode)
    {
        $this->aztecSymbolMode = $aztecSymbolMode;
    }

    public function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $aztecSymbolMode, $layersCount)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->aztecSymbolMode = $aztecSymbolMode;
        $this->layersCount = $layersCount;
    }

    public function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getAztec()->setAztecSymbolMode($this->aztecSymbolMode);
        $generator->getParameters()->getBarcode()->getAztec()->setLayersCount($this->layersCount);
    }

    public function checkResultReader($reader)
    {
    }
}