<?php

namespace Aspose\Barcode\Internal;

interface Communicator
{
    public function obtainDto(...$args);

    public function initFieldsFromDto();
}