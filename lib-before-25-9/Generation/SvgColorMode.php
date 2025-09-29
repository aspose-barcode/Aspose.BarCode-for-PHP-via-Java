<?php

namespace Aspose\Barcode\Generation;

/**
 * <p>
 * Possible modes for filling color in svg file, RGB is default and supported by SVG 1.1.
 * RGBA, HSL, HSLA is allowed in SVG 2.0 standard.
 * Even in RGB opacity will be set through "fill-opacity" parameter
 * </p>
 */
class SvgColorMode
{
    /**
     * <p>
     * RGB mode, example: fill="#ff5511" fill-opacity="0.73". Default mode.
     * </p>
     */
    const RGB = 0;
    /**
     * <p>
     * RGBA mode, example: fill="rgba(255, 85, 17, 0.73)"
     * </p>
     */
    const RGBA = 1;
    /**
     * <p>
     * HSL mode, example: fill="hsl(17, 100%, 53%)" fill-opacity="0.73"
     * </p>
     */
    const HSL = 2;
    /**
     * <p>
     * HSLA mode, example: fill="hsla(30, 50%, 70%, 0.8)"
     * </p>
     */
    const HSLA = 3;
}