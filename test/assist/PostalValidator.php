<?php

namespace assist;

class PostalValidator extends \IValidator
{
    private $descenderBarHeight;
    private $fullBarHeight;

    private $needValidateTrackerAndAscender = false;
    private $trackerBarHeight = -1;
    private $ascenderBarHeight = -1;
    private $generator;

    function __construct($generator, $descenderBarHeight, $fullBarHeight)
    {

        $this->generator = $generator;
        $this->descenderBarHeight = $descenderBarHeight;
        $this->fullBarHeight = $fullBarHeight;
    }

    static function construct($generator, $descenderBarHeight, $fullBarHeight, $trackerBarHeight, $ascenderBarHeight)
    {
        $postalValidator = new PostalValidator($generator, $descenderBarHeight, $fullBarHeight);

        $postalValidator->needValidateTrackerAndAscender = true;
        $postalValidator->trackerBarHeight = $trackerBarHeight;
        $postalValidator->ascenderBarHeight = $ascenderBarHeight;

        return $postalValidator;
    }

    function validate()
    {
        Assert::assertTrue(abs($this->descenderBarHeight - $this->generator->getParameters()->getBarcode()->getPostal()->getPostalShortBarHeight()->getPixels()) <= 1);
        Assert::assertTrue(abs($this->fullBarHeight - $this->generator->getParameters()->getBarcode()->getBarHeight()->getPixels()) <= 1);
        if ($this->needValidateTrackerAndAscender) {
            $parser = 0;
            Assert::assertEquals($this->trackerBarHeight, $parser->getTrackerBarHeight(), "Height of tracker bar in detected barcode isn't correct.");
            Assert::assertEquals($this->ascenderBarHeight, $parser->getAscenderBarHeight(), "Height of ascender bar in detected barcode isn't correct.");
        }
        return true;
    }
}