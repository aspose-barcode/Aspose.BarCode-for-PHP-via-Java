<?php

namespace assist;

class Pdf417MacroFileIDTestParam extends RecognizeWithReaderTestParam
{
    private $macroFileID;

    function getMacroFileID()
    {
        return $this->macroFileID;
    }

    function setMacroFileID($macroFileID)
    {
        $this->macroFileID = $macroFileID;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $macroFileID)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->macroFileID = $macroFileID;
        $this->setExpectedCodeText($expectedCodeText);
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroFileID($this->macroFileID);
    }

    function checkResultReader($reader)
    {
        if ($this->getMacroFileID() == -1)
            Assert::assertTrue(empty($reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->getMacroPdf417FileID()));
        else
            Assert::assertEquals($this->getMacroFileID(), intval($reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->getMacroPdf417FileID(), 10));
    }
}