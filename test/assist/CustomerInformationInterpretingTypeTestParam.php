<?php

namespace assist;

use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;

class CustomerInformationInterpretingTypeTestParam extends TestParams
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

    private $_australianPostEncodingTable;
    private $_expectedAustralianPostEncodingTable;

    function __construct($expectedWidth,
                         $expectedHeight,
                         $codeText,
                         $australianPostEncodingTable,
                         $expectedAustralianPostEncodingTable)
    {
        parent::__construct($expectedWidth, $expectedHeight);
        $this->_australianPostEncodingTable = $australianPostEncodingTable;
        $this->_expectedAustralianPostEncodingTable = $expectedAustralianPostEncodingTable;
        $this->setCodeText($codeText);
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable($this->_australianPostEncodingTable);
    }

    function checkResult($bitmap)
    {
        parent::checkResult($bitmap);

        $reader = new BarCodeReader($bitmap, null, DecodeType::AUSTRALIA_POST);
        $reader->getBarcodeSettings()->getAustraliaPost()->setCustomerInformationInterpretingType($this->_expectedAustralianPostEncodingTable);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals($this->getCodeText("UTF-8"), $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }
}