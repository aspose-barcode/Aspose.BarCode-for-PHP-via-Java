<?php

namespace assist;

class BorderValidator extends IValidator
{
    private $width;
    private $specifiedColor = false;
    private $color;
    private $specifiedDashStyle = false;
    private $borderDashStyle;
    private $generator;

    function __construct($generator, $width)
    {

        $this->generator = $generator;
        $this->width = $width;
    }

    static function construct3($generator, $width, $color)
    {
        $borderValidator = new BorderValidator($generator, $width);
        $borderValidator->color = $color;
        $borderValidator->specifiedColor = true;
        return $borderValidator;
    }

    static function construct4($generator, $width, $color, $dashStyle)
    {
        $borderValidator = BorderValidator . construct3($generator, $width, $color);

        $borderValidator->borderDashStyle = $dashStyle;
        $borderValidator->specifiedDashStyle = true;

        return $borderValidator;
    }

    function validate()
    {
        Assert::assertEqualsDelta($this->width, $this->generator->getParameters()->getBorder()->getWidth()->getPixels(), 0.4);
        if ($this->specifiedColor)
            $this->assertColor($this->color, $this->generator->getParameters()->getBorder()->getColor(), "Border color isn't correct.");
        if ($this->specifiedDashStyle)
            Assert::assertEquals($this->borderDashStyle, $this->generator->getParameters()->getBorder()->getDashStyle(), "Border dash style isn't correct.");

        return true;
    }

    function assertColor($expected, $actual, $message)
    {
        Assert::assertEquals($expected, $actual);
    }
}