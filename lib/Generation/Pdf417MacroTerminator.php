<?php

namespace Aspose\Barcode\Generation;

/**
 *  Used to tell the encoder whether to add Macro PDF417 Terminator (codeword 922) to the segment.
 *  Applied only for Macro PDF417.
 */
class Pdf417MacroTerminator
{
    /**
     * The terminator will be added automatically if the number of segments is provided
     * and the current segment is the last one. In other cases, the terminator will not be added.
     */
    const AUTO = 0;

    /**
     * The terminator will not be added.
     */
    const NONE = 1;

    /**
     * The terminator will be added.
     */
    const SET = 2;
}