<?php

namespace assist;

use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;

class DotCodeTestParam extends RecognizeTestParam
{
    private $_rows;
    private $_columns;

    function __construct($expectedWidth, $expectedHeight, $codetext, $rows, $columns)
    {
        parent::__construct($expectedWidth, $expectedHeight, $codetext);
        $this->_rows = $rows;
        $this->_columns = $columns;
    }

    function apply($generator)
    {
        $generator->getParameters()->getBarcode()->getDotCode()->setRows($this->_rows);
        $generator->getParameters()->getBarcode()->getDotCode()->setColumns($this->_columns);
    }

    function checkResult($bitmap)
    {
        $binary = base64_decode($bitmap);
        $dimensions = getimagesizefromstring($binary);
        Assert::assertEquals($this->getExpectedWidth(), $dimensions[0]);
        Assert::assertEquals($this->getExpectedHeight(), $dimensions[1]);

        $reader = new BarCodeReader($bitmap, null, DecodeType::DOT_CODE);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals($this->getExpectedCodeText(), $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }
}