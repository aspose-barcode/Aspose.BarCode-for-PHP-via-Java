<?php

namespace Aspose\Barcode\Generation;

/**
 * Specify the type of the ECC to encode.
 */
class DataMatrixEccType
{
    /**
     * Specifies that encoded Ecc type is defined by default Reed-Solomon error correction or ECC 200.
     */
    const ECC_AUTO = "0";
    /**
     * Specifies that encoded Ecc type is defined ECC 000.
     */
    const ECC_000 = "1";
    /**
     * Specifies that encoded Ecc type is defined ECC 050.
     */
    const ECC_050 = "2";
    /**
     * Specifies that encoded Ecc type is defined ECC 080.
     */
    const ECC_080 = "3";
    /**
     * Specifies that encoded Ecc type is defined ECC 100.
     */
    const ECC_100 = "4";
    /**
     * Specifies that encoded Ecc type is defined ECC 140.
     */
    const ECC_140 = "5";
    /**
     * Specifies that encoded Ecc type is defined ECC 200. Recommended to use.
     */
    const ECC_200 = "6";
}