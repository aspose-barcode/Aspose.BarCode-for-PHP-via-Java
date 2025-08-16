<?php

namespace assist;

class BarcodeSizeValidator extends IValidator
{
    private $generator;
    private $width;
    private $height;
    private $delta = 0;

    function __construct($generator, $width, $height)
    {

        $this->generator = $generator;
        $this->width = $width;
        $this->height = $height;
    }

    static function construct($generator, $width, $height, $delta)
    {
        $barcodeSizeValidator = new BarcodeSizeValidator($generator, $width, $height);
        $barcodeSizeValidator->delta = $delta;
        return $barcodeSizeValidator;
    }

    function validate()
    {
        Assert::assertTrue(abs($this->width - $this->generator->getParameters()->getImageWidth()->getPixels()) <= $this->delta, "Width of detected barcode isn't correct.");
        Assert::assertTrue(abs($this->height - $this->generator->getParameters()->getBarcode()->getBarHeight()->getPixels()) <= $this->delta, "Height of detected barcode isn't correct.");
        return true;
    }
}