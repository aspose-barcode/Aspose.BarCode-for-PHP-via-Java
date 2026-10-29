<?php
namespace Aspose\Barcode\Generation;

/**
 * Specifies the level of GS1 data validation.
 * Higher validation levels include all checks from lower levels.
 */
final class GS1ValidationLevel
{
    /**
     * Validates GS1 syntax, including application identifiers,
     * field lengths and required separators.
     */
    public const SYNTAX = 0;
    /**
     * Validates GS1 syntax and the content of application identifier values,
     * including character sets, checksums and value-specific rules.
     */
    public const CONTENT = 1;
}
