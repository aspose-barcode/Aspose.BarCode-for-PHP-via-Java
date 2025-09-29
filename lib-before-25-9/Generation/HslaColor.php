<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Alpha;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Hue;
use Aspose\Barcode\Lightness;
use Aspose\Barcode\Saturation;

/**
 * <p>
 * Class for representing HSLA color (Hue, Saturation, Lightness, Alpha)
 * </p>
 */
class HslaColor
{
    /**
     * <p>
     * Hue [0, 360]
     * </p>
     */
    public $H;

    /**
     * <p>
     * Saturation [0, 100]
     * </p>
     */
    public $S;

    /**
     * <p>
     * Lightness [0, 100]
     * </p>
     */
    public $L;

    /**
     * <p>
     * Alpha (opacity) [0.0f, 1.0f]
     * </p>
     */
    public $A = 0.0;


    /**
     * <p>
     * Constructor for HslaColor
     * </p>
     *
     * @param $h Hue [0, 360]
     * @param $s Saturation [0, 100]
     * @param $l Lightness [0, 100]
     * @param $a Alpha (opacity) [0.0f, 1.0f]
     */
    public function __construct(int $h, int $s, int $l, float $a)
    {
//        $this->checkHue($h);
        self::checkHue($h);
        self::checkSatLight($s);
        self::checkSatLight($l);
        self::checkAlpha($a);

        $this->H = $h;
        $this->S = $s;
        $this->L = $l;
        $this->A = $a;
    }

    private static function checkHue(int $value)
    {
        if ($value < 0 || $value > 360)
        {
            throw new Exception("Wrong color value");
        }
    }

    private static function checkSatLight(int $value)
    {
        if ($value < 0 || $value > 100)
        {
            throw new Exception("Wrong color value");
        }
    }

    private static function checkAlpha(float $value)
    {
        if ($value < 0.0 || $value > 1.0)
        {
            throw new Exception("Wrong color value");
        }
    }

    /**
     * <p>
     * Uses https://en.wikipedia.org/wiki/HSL_and_HSV#HSL_to_RGB
     * </p>
     *
     * @param hslaColor HSLA color to convert
     * @return string with RGBA values
     */
    public static function convertHslaToRgba(HslaColor $hslaColor): string
    {
        $r = 0;
        $g = 0;
        $b = 0;

        $hueF = $hslaColor->H / 360.0;
        $satF = $hslaColor->S / 100.0;
        $lightF = $hslaColor->L / 100.0;

        if ($satF == 0)
        {
            $r = $g = $b = $lightF;
        } else
        {
            $q = $lightF < 0.5 ? $lightF * (1 + $satF) : $lightF + $satF - $lightF * $satF;
            $p = 2 * $lightF - $q;

            $r = HslaColor::hueToRgb($p, $q, $hueF + 1.0 / 3.0);
            $g = HslaColor::hueToRgb($p, $q, $hueF);
            $b = HslaColor::hueToRgb($p, $q, $hueF - 1.0 / 3.0);
        }

        $rI = intval($r * 255 + 0.5);
        $gI = intval($g * 255 + 0.5);
        $bI = intval($b * 255 + 0.5);
        $aI = intval($hslaColor->A * 255 + 0.5);

        return sprintf("#%02X%02X%02X%02X", $rI, $gI, $bI, $aI);
    }

    private static function hueToRgb(float $p, float $q, float $t): float
    {
        if ($t < 0.0) $t += 1.0;
        if ($t > 1.0) $t -= 1.0;
        if ($t < 1.0 / 6.0) return $p + ($q - $p) * 6.0 * $t;
        if ($t < 1.0 / 2.0) return $q;
        if ($t < 2.0 / 3.0) return $p + ($q - $p) * (2.0 / 3.0 - $t) * 6.0;
        return $p;
    }
}