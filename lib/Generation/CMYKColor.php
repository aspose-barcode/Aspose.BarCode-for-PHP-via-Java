<?php

namespace Aspose\Barcode\Generation;

use InvalidArgumentException;

/**
 * Class for CMYK color. A null instance means CMYK is not used,
 * and default RGB color is in use.
 */
class CMYKColor
{
    /** @var float Cyan component (0.0–1.0) */
    public float $C;

    /** @var float Magenta component (0.0–1.0) */
    public float $M;

    /** @var float Yellow component (0.0–1.0) */
    public float $Y;

    /** @var float Black component (0.0–1.0) */
    public float $K;

    /**
     * Initializes a new instance of the CMYKColor class from CMYK values.
     * CMYK values are expected in the range 0–100.
     *
     * @param int $c Cyan value [0, 100]
     * @param int $m Magenta value [0, 100]
     * @param int $y Yellow value [0, 100]
     * @param int $k Black value [0, 100]
     */
    public function __construct(int $c, int $m, int $y, int $k)
    {
        // Clamp to [0, 100] and store as fractions [0.0, 1.0]
        $this->C = min(100, max(0, $c)) / 100.0;
        $this->M = min(100, max(0, $m)) / 100.0;
        $this->Y = min(100, max(0, $y)) / 100.0;
        $this->K = min(100, max(0, $k)) / 100.0;
    }

    /**
     * Parse a CMYK string of the form "C_M_Y_K" into a CMYKColor instance.
     *
     * @param string $str a string like "30_100_0_30"
     * @return CMYKColor
     * @throws InvalidArgumentException if the format is invalid or values are not numeric
     */
    public static function parseCMYK(string $str): CMYKColor
    {
        $parts = explode('_', $str);
        if (count($parts) !== 4)
        {
            throw new InvalidArgumentException("Invalid CMYK string: expected 4 parts but got " . count($parts));
        }

        $nums = [];
        foreach ($parts as $i => $s)
        {
            if (!is_numeric($s))
            {
                throw new InvalidArgumentException("Invalid number in CMYK string at index $i: \"$s\"");
            }
            // PHP does not auto-convert to float in this context
            $nums[] = floatval($s);
        }

        return new CMYKColor($nums[0], $nums[1], $nums[2], $nums[3]);
    }

    /**
     * Format this CMYKColor into a string "C_M_Y_K",
     * multiplying each internal component (0–1) by 100 and rounding.
     *
     * @return string e.g. "30_100_0_30"
     */
    public function formatCMYK(): string
    {
        $c = round($this->C * 100);
        $m = round($this->M * 100);
        $y = round($this->Y * 100);
        $k = round($this->K * 100);
        return "{$c}_{$m}_{$y}_{$k}";
    }

    /**
     * Optional: a human-readable representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        $c = round($this->C * 100);
        $m = round($this->M * 100);
        $y = round($this->Y * 100);
        $k = round($this->K * 100);
        return "CMYKColor(C={$c}%, M={$m}%, Y={$y}%, K={$k}%)";
    }
}