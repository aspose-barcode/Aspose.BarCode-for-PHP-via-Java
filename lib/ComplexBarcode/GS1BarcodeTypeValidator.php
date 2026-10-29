<?php

namespace Aspose\Barcode\ComplexBarcode;
use Aspose\Barcode\Generation\EncodeTypes;

/** Enforces the Java GS1 barcode-type restrictions without a setter RPC. */
final class GS1BarcodeTypeValidator {
    private const CODETEXT_TYPES = [
        'GS_1_AZTEC', 'GS_1_CODABLOCK_F', 'GS_1_CODE_128',
        'GS_1_DATA_MATRIX', 'GS_1_DOT_CODE', 'GS_1_HAN_XIN',
        'GS_1_MICRO_PDF_417', 'GS_1_QR',
        'DATABAR_EXPANDED', 'DATABAR_EXPANDED_STACKED',
        'DATABAR_LIMITED', 'DATABAR_OMNI_DIRECTIONAL',
        'DATABAR_STACKED', 'DATABAR_STACKED_OMNI_DIRECTIONAL',
        'DATABAR_TRUNCATED'
    ];

    private const DIGITAL_LINK_TYPES = [
        'QR', 'DATA_MATRIX', 'AZTEC', 'PDF_417', 'MICRO_PDF_417',
        'DOT_CODE', 'HAN_XIN', 'CODABLOCK_F', 'CODE_128'
    ];

    public static function forCodetext(int $value): void {
        self::check($value, self::CODETEXT_TYPES, 'GS1Codetext');
    }

    public static function forDigitalLink(int $value): void {
        self::check($value, self::DIGITAL_LINK_TYPES, 'GS1DigitalLink');
    }

    private static function check(int $value, array $names, string $type): void {
        foreach ($names as $name) {
            $constant = EncodeTypes::class . '::' . $name;
            if (defined($constant) && constant($constant) === $value) {
                return;
            }
        }
        throw new \InvalidArgumentException('Unsupported barcode type for ' . $type . ': ' . $value);
    }
}
