<?php

namespace assist;

class ImageSizeValidator extends IValidator
{
    private $expectedWidth;
    private $expectedHeight;
    private $bitmap;
    private $delta;

    function __construct($bitmap, $expectedWidth, $expectedHeight, $delta)
    {

        $this->bitmap = $bitmap;
        $this->expectedWidth = $expectedWidth;
        $this->expectedHeight = $expectedHeight;
        $this->delta = $delta;
    }

    function validate()
    {
        $binary = base64_decode($this->bitmap);
        $dimensions = getimagesizefromstring($binary);
        return abs($dimensions[0] - $this->expectedWidth) <= $this->delta &&
            abs($dimensions[1] - $this->expectedHeight) <= $this->delta;
    }
}