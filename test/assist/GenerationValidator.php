<?php

namespace assist;

class GenerationValidator extends IValidator
{
    private $bitmap;
    private $validators = [];

    function __construct($bitmap)
    {

        $this->bitmap = $bitmap;
    }

    function addValidator($validator)
    {
        array_push($this->validators, $validator);
    }

    function validate()
    {
        $result = true;
        foreach ($this->validators as $validator) {
            if (!$validator->validate()) {
                return false;
            }
        }

        return $result;
    }
}