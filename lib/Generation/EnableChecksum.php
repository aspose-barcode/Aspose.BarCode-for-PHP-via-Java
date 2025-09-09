<?php

namespace Aspose\Barcode\Generation;

/**
 * Enable checksum during generation for 1D barcodes.
 * Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible.
 * Checksum never used: Codabar
 * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN
 * Checksum always used: Rest symbologies
 */
class EnableChecksum
{
    /**
     * If checksum is required by the specification - it will be attached.
     */
    const DEFAULT = 0;

    /**
     * Always use checksum if possible.
     */
    const YES = 1;

    /**
     * Do not use checksum.
     */
    const NO = 2;
}