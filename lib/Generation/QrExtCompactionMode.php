<?php

namespace Aspose\Barcode\Generation;


/**
* Specifies QR compaction mode for codetext added by QrExtCodetextBuilder.
*/
class QrExtCompactionMode
{

    /**
    * The encoder selects the most efficient QR compaction mode automatically.
    */
    const AUTO = 0;
    
    /**
    * Encodes codetext in QR Numeric mode. Only digits 0-9 are allowed.
    */
    const NUMERIC = 1;
    
    /**
    * Encodes codetext in QR Alphanumeric mode.
    */
    const ALPHA_NUMERIC = 2;
    
    /**
    * Encodes codetext in QR Byte mode.
    */
    const BYTES = 3;
    
    /**
    * Encodes codetext in QR Kanji mode.
    */
    const KANJI = 4;
}
