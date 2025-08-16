<?php

namespace assist;

class CodabarStartStopSymbolsTestParam extends RecognizeTestParam
{
    private $startSymbol;
    private $stopSymbol;

    function getStartSymbol()
    {
        return $this->startSymbol;
    }

    function setStartSymbol($startSymbol)
    {
        $this->startSymbol = $startSymbol;
    }

    function getStopSymbol()
    {
        return $this->stopSymbol;
    }

    function setStopSymbol($stopSymbol)
    {
        $this->stopSymbol = $stopSymbol;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $startSymbol, $stopSymbol)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->startSymbol = $startSymbol;
        $this->stopSymbol = $stopSymbol;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getCodabar()->setCodabarStartSymbol($this->getStartSymbol());
        $generator->getParameters()->getBarcode()->getCodabar()->setCodabarStopSymbol($this->getStopSymbol());
    }
}