<?php
namespace Aspose\Barcode\Generation;

/**
 * <p>
 * Level of Reed-Solomon error correction. From low to high: L1, L2, L3, L4.
 * </p>
 */
class HanXinErrorLevel
{
    /**
     * <p>
     * Allows recovery of 8% of the code text
     * </p>
     */
    const L1 = 0;
    /**
     * <p>
     * Allows recovery of 15% of the code text
     * </p>
     */
    const L2 = 1;
    /**
     * <p>
     * Allows recovery of 23% of the code text
     * </p>
     */
    const L3 = 2;
    /**
     * <p>
     * Allows recovery of 30% of the code text
     * </p>
     */
    const L4 = 3;
}
