<?php

namespace assist;

class UpdateFloatTestParam extends TestParams
{
    private $value;

    private $expectedException;

    static function construct1($value)
    {
        return new UpdateFloatTestParam($value, false, 0, 0);
    }

    static function construct2($value, $expectedException)
    {
        return new UpdateFloatTestParam($value, $expectedException, 0, 0);
    }

    function __construct($value, $expectedException, $expectedWidth, $expectedHeight)
    {
        parent::__construct($expectedWidth, $expectedHeight);

        $this->value = $value;
        $this->expectedException = $expectedException;
    }

    function apply($generator)
    {
        throw new NullPointerException();
    }
}