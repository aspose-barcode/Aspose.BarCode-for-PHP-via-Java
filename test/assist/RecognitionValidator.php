<?php

namespace assist;

use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;

class RecognitionValidator extends IValidator
{
    private $bitmap;
    private $expectedText;
    private $decodeType;

    function __construct($bitmap, $expectedText, ?int $decodeType)
    {

        $this->bitmap = $bitmap;
        $this->expectedText = $expectedText;
        $this->decodeType = $decodeType == null ? DecodeType::ALL_SUPPORTED_TYPES : $decodeType;
    }

    function validate()
    {
        $reader = new BarCodeReader($this->bitmap, null, $this->decodeType);
        $results = $reader->readBarCodes();
        $expectedText = $this->expectedText;
        foreach ($results as $result) {
            if ($result->getCodeText("UTF-8") == $expectedText) {
                return true;
            }
        }

        return false;
    }
}