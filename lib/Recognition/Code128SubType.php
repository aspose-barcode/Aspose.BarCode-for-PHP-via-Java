<?php

namespace Aspose\Barcode\Recognition;

/**
 * Contains types of Code128 subset
 */
class Code128SubType
{
    /**
     * ASCII characters 00 to 95 (0–9, A–Z and control codes), special characters, and FNC 1–4 ///
     */
    const CODE_SET_A = 1;

    /**
     * ASCII characters 32 to 127 (0–9, A–Z, a–z), special characters, and FNC 1–4 ///
     */
    const CODE_SET_B = 2;

    /**
     * 00–99 (encodes two digits with a single code point) and FNC1 ///
     */
    const CODE_SET_C = 3;
}