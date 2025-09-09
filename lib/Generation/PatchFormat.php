<?php

namespace Aspose\Barcode\Generation;

/**
 * PatchCode format. Choose PatchOnly to generate single PatchCode. Use page format to generate Patch page with PatchCodes as borders
 */
final class PatchFormat
{
    /**
     * Generates PatchCode only
     */
    const PATCH_ONLY = 0;

    /**
     * Generates A4 format page with PatchCodes as borders and optional QR in the center
     */
    const A4 = 1;

    /**
     * Generates A4 landscape format page with PatchCodes as borders and optional QR in the center
     */
    const A4_LANDSCAPE = 2;

    /**
     * Generates US letter format page with PatchCodes as borders and optional QR in the center
     */
    const US_LETTER = 3;

    /**
     * Generates US letter landscape format page with PatchCodes as borders and optional QR in the center
     */
    const US_LETTER_LANDSCAPE = 4;
}