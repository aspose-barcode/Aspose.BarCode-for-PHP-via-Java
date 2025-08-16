<?php

namespace assist;

include_once('../assist/Assert.php');
include_once('../assist/TestsLauncher.php');
include_once('../assist/TestsAssist.php');


class MultiplyRecognitionValidator extends IValidator
{
    private $decodeType;

    private $expectedTexts;
    private $expectedTypes;

    static function construct($expectedTexts, $expectedTypes, $decodeType)
    {
        $multiplyRecognitionValidator = new MultiplyRecognitionValidator($expectedTexts, $expectedTypes);

        $multiplyRecognitionValidator->decodeType = $decodeType;

        return $multiplyRecognitionValidator;
    }

    function __construct($expectedTexts, $expectedTypes)
    {

        $this->expectedTexts = $expectedTexts;
        $this->expectedTypes = $expectedTypes;
    }

    function validate()
    {
        $expandedImage = RecognitionValidator::expandImage();

        $readTexts = [];
        $readTypes = [];

        $reader = new BarCodeReader($expandedImage);
        if ($this->decodeType != null) {
            $reader->setBarCodeReadType($this->decodeType);
        }
        $results = $reader->readBarCodes();
        for ($i = 0; $i < $results->length; $i++) {
            $result = $results[$i];
            $readTexts->push($result->getCodeText("UTF-8"));
            $readTypes->push($result->getCodeType());
        }

        Assert::assertEquals($this->expectedTexts->length, $readTexts->length, "Wrong number of recognized barcodes.");

        for ($i = 0; $i < $readTexts->length; $i++) {
            $found = false;
            for ($j = 0; $j < $this->expectedTexts->length; $j++) {
                if ($this->expectedTexts[$j] == ($readTexts[$i])) {
                    if ($this->expectedTypes == null || $this->expectedTypes != null && $this->expectedTypes[$j] == $readTypes[$i]) {
                        $found = true;
                        $this->expectedTexts[$i] = "";
                        break;
                    }
                }
            }
            Assert::assertTrue($found);
        }

        for ($i = 0; i < $this->expectedTexts->length; $i++) {
            if ("" != ($this->expectedTexts[$i])) {
                Assert::fail(String . format("Doesn't recognize barcode with '%s' codetext.", expectedTexts[i]));
                return false;
            }
        }

        return true;
    }
}