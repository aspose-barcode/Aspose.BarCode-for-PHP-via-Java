<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Internal\Communicator;

/**
 * Base class for encoding and decoding second message for MaxiCode barcode.
 */
abstract class MaxiCodeSecondMessage implements Communicator
{
    protected $maxiCodeSecondMessageDto;

    /**
     * @return mixed
     */
    public function getMaxiCodeSecondMessageDto(): \Aspose\Barcode\Bridge\MaxiCodeSecondMessageDTO
    {
        return $this->maxiCodeSecondMessageDto;
    }

    /**
     * @param mixed $maxiCodeSecondMessageDto
     */
    public function setMaxiCodeSecondMessageDto(\Aspose\Barcode\Bridge\MaxiCodeSecondMessageDTO $maxiCodeSecondMessageDto): void
    {
        $this->maxiCodeSecondMessageDto = $maxiCodeSecondMessageDto;
    }


    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * Gets constructed second message
     * @return string Constructed second message
     */
    public abstract function getMessage(): string;
}