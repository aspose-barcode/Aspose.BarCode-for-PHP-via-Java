<?php

namespace Aspose\Barcode\Generation;

/**
 * <p>
 * Encoding mode for Code128 barcodes.
 * {@code Code 128} specification.
 * </p><p><hr><blockquote><pre>
 * Thos code demonstrates how to generate code 128 with different encodings
 * <pre>
 *
 * //Generate code 128 with ISO 15417 encoding
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "ABCD1234567890");
 * $generator->Parameters->Barcode->Code128->setCode128EncodeMode(Code128EncodeMode::AUTO);
 * $generator->Save("d:/code128Auto.png", BarCodeImageFormat::Png);
 * //Generate code 128 only with Codeset A encoding
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "ABCD1234567890");
 * $generator->Parameters->Barcode->Code128->setCode128EncodeMode(Code128EncodeMode::CODE_A);
 * $generator->Save("d:/code128CodeA.png", BarCodeImageFormat::Png);
 * </pre>
 * </pre></blockquote></hr></p>
 */
class Code128EncodeMode
{
    /**
     * <p>
     * Encode codetext in classic ISO 15417 mode. The mode should be used in all ordinary cases.
     * </p>
     */
    const AUTO = 0;

    /**
     * <p>
     * Encode codetext only in 128A codeset.
     * </p>
     */
    const CODE_A = 1;

    /**
     * <p>
     * Encode codetext only in 128B codeset.
     * </p>
     */
    const CODE_B = 2;

    /**
     * <p>
     * Encode codetext only in 128C codeset.
     * </p>
     */
    const CODE_C = 4;

    /**
     * <p>
     * Encode codetext only in 128A and 128B codesets.
     * </p>
     */
    const CODE_AB = 3;

    /**
     * <p>
     * Encode codetext only in 128A and 128C codesets.
     * </p>
     */
    const CODE_AC = 5;

    /**
     * <p>
     * Encode codetext only in 128B and 128C codesets.
     * </p>
     */
    const CODE_BC = 6;
}