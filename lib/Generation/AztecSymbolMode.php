<?php

namespace Aspose\Barcode\Generation;

/**
 *
 * Specifies the Aztec symbol mode.
 *
 * @code
 *  $generator = new BarcodeGenerator(EncodeTypes::AZTEC);
 *  $generator->setCodeText("125");
 *  $generator->getParameters()->getBarcode()->getAztec()->setAztecSymbolMode(AztecSymbolMode::RUNE);
 *  $generator->save("test.png", "PNG");
 * @endcode
 */
class AztecSymbolMode
{
    /**
     * Specifies to automatically pick up the best symbol (COMPACT or FULL-range) for Aztec.
     * This is default value.
     */
    const AUTO = "0";
    /**
     * Specifies the COMPACT symbol for Aztec.
     * Aztec COMPACT symbol permits only 1, 2, 3 or 4 layers.
     */
    const COMPACT = "1";
    /**
     * Specifies the FULL-range symbol for Aztec.
     * Aztec FULL-range symbol permits from 1 to 32 layers.
     */
    const FULL_RANGE = "2";
    /**
     * Specifies the RUNE symbol for Aztec.
     * Aztec Runes are a series of small but distinct machine-readable marks. It permits only number value from 0 to 255.
     */
    const RUNE = "3";
}