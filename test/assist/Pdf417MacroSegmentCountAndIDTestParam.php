<?php

namespace assist;

class Pdf417MacroSegmentCountAndIDTestParam extends RecognizeWithReaderTestParam
{
    private $macroSegmentID;
    private $macroSegmentsCount;

    function getMacroSegmentID()
    {
        return $this->macroSegmentID;
    }

    function setMacroSegmentID($macroSegmentID)
    {
        $this->macroSegmentID = $macroSegmentID;
    }

    function getMacroSegmentsCount()
    {
        return $this->macroSegmentsCount;
    }

    function setMacroSegmentsCount($macroSegmentsCount)
    {
        $this->macroSegmentsCount = $macroSegmentsCount;
    }

    function __construct($expectedWidth, $expectedHeight, $expectedCodeText, $macroSegmentID, $macroSegmentsCount)
    {
        parent::__construct($expectedWidth, $expectedHeight, $expectedCodeText);
        $this->macroSegmentID = $macroSegmentID;
        $this->macroSegmentsCount = $macroSegmentsCount;
        $this->setExpectedCodeText($expectedCodeText);
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentID($this->macroSegmentID);
        $generator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentsCount($this->macroSegmentsCount);
        $generator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroFileID(1);
    }

    function checkResultReader($reader)
    {
        Assert::assertEquals($this->getExpectedCodeText(), $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        Assert::assertEquals($this->getMacroSegmentID(), $reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->getMacroPdf417SegmentID());
        Assert::assertEquals($this->getMacroSegmentsCount(), $reader->getFoundBarCodes()[0]->getExtended()->getPdf417()->getMacroPdf417SegmentsCount());
    }
}