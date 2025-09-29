<?php

namespace Aspose\Barcode\Generation;

/**
 * Level of Reed-Solomon error correction. From low to high: LEVEL_L, LEVEL_M, LEVEL_Q, LEVEL_H.
 */
class QRErrorLevel
{
    /**
     * Allows recovery of 7% of the code text
     */
    const LEVEL_L = "0";
    /**
     * Allows recovery of 15% of the code text
     */
    const LEVEL_M = "1";
    /**
     * Allows recovery of 25% of the code text
     */
    const LEVEL_Q = "2";
    /**
     * Allows recovery of 30% of the code text
     */
    const LEVEL_H = "3";
}