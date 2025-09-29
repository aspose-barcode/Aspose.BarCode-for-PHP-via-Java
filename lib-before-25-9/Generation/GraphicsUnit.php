<?php

namespace Aspose\Barcode\Generation;

/**
 * Specifies the unit of measure for the given data.
 */
class GraphicsUnit
{
    /**
     * Specifies the world coordinate system unit as the unit of measure.
     */
    const WORLD = 0;

    /**
     * Specifies the unit of measure of the display device. Typically pixels for video displays, and 1/100 inch for printers.
     */
    const DISPLAY = 1;

    /**
     *    Specifies a device pixel as the unit of measure.
     */
    const PIXEL = 2;

    /**
     * Specifies a printer's point  = 1/72 inch) as the unit of measure.
     */
    const POINT = 3;

    /**
     *    Specifies the inch as the unit of measure.
     */
    const INCH = 4;

    /**
     * Specifies the document unit  = 1/300 inch) as the unit of measure.
     */
    const DOCUMENT = 5;

    /**
     * Specifies the millimeter as the unit of measure.
     */
    const MILLIMETER = 6;
}