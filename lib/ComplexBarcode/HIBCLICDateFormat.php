<?php

namespace Aspose\Barcode\ComplexBarcode;

/**
 * <p>
 * Specifies the different types of date formats for HIBC LIC.
 * </p>
 */
class HIBCLICDateFormat
{
    /**
     * <p>
     * YYYYMMDD format. Will be encoded in additional supplemental data.
     * </p>
     */
    const YYYYMMDD = 0;
    /**
     * <p>
     * MMYY format.
     * </p>
     */
    const MMYY = 1;
    /**
     * <p>
     * MMDDYY format.
     * </p>
     */
    const MMDDYY = 2;
    /**
     * <p>
     * YYMMDD format.
     * </p>
     */
    const YYMMDD = 3;
    /**
     * <p>
     * YYMMDDHH format.
     * </p>
     */
    const YYMMDDHH = 4;
    /**
     * <p>
     * Julian date format.
     * </p>
     */
    const YYJJJ = 5;
    /**
     * <p>
     * Julian date format with hours.
     * </p>
     */
    const YYJJJHH = 6;
    /**
     * <p>
     * Do not encode expiry date.
     * </p>
     */
    const NONE = 7;
}