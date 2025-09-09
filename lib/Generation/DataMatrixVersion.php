<?php

namespace Aspose\Barcode\Generation;

/**
 * <p>
 * Specify the type of the ECC to encode.
 * </p>
 */
class DataMatrixVersion
{
    /**
     * <p>
     * Specifies to automatically pick up the smallest size for DataMatrix.
     * This is default value.
     * </p>
     */
    const AUTO = 0;
    /**
     * <p>
     * Instructs to get symbol sizes from Rows And Columns parameters. Note that DataMatrix does not support
     * custom rows and columns numbers. This option is not recommended to use.
     * </p>
     */
    const ROWS_COLUMNS = 1;
    /**
     * <p>
     * Specifies size of 9 x 9 modules for ECC000 type.
     * </p>
     */
    const ECC000_9x9 = 2;
    /**
     * <p>
     * Specifies size of 11 x 11 modules for ECC000-ECC050 types.
     * </p>
     */
    const ECC000_050_11x11 = 3;
    /**
     * <p>
     * Specifies size of 13 x 13 modules for ECC000-ECC100 types.
     * </p>
     */
    const ECC000_100_13x13 = 4;
    /**
     * <p>
     * Specifies size of 15 x 15 modules for ECC000-ECC100 types.
     * </p>
     */
    const ECC000_100_15x15 = 5;
    /**
     * <p>
     * Specifies size of 17 x 17 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_17x17 = 6;
    /**
     * <p>
     * Specifies size of 19 x 19 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_19x19 = 7;
    /**
     * <p>
     * Specifies size of 21 x 21 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_21x21 = 8;
    /**
     * <p>
     * Specifies size of 23 x 23 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_23x23 = 9;
    /**
     * <p>
     * Specifies size of 25 x 25 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_25x25 = 10;
    /**
     * <p>
     * Specifies size of 27 x 27 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_27x27 = 11;
    /**
     * <p>
     * Specifies size of 29 x 29 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_29x29 = 12;
    /**
     * <p>
     * Specifies size of 31 x 31 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_31x31 = 13;
    /**
     * <p>
     * Specifies size of 33 x 33 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_33x33 = 14;
    /**
     * <p>
     * Specifies size of 35 x 35 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_35x35 = 15;
    /**
     * <p>
     * Specifies size of 37 x 37 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_37x37 = 16;
    /**
     * <p>
     * Specifies size of 39 x 39 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_39x39 = 17;
    /**
     * <p>
     * Specifies size of 41 x 41 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_41x41 = 18;
    /**
     * <p>
     * Specifies size of 43 x 43 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_43x43 = 19;
    /**
     * <p>
     * Specifies size of 45 x 45 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_45x45 = 20;
    /**
     * <p>
     * Specifies size of 47 x 47 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_47x47 = 21;
    /**
     * <p>
     * Specifies size of 49 x 49 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_49x49 = 22;
    /**
     * <p>
     * Specifies size of 10 x 10 modules for ECC200 type.
     * </p>
     */
    const ECC200_10x10 = 23;
    /**
     * <p>
     * Specifies size of 12 x 12 modules for ECC200 type.
     * </p>
     */
    const ECC200_12x12 = 24;
    /**
     * <p>
     * Specifies size of 14 x 14 modules for ECC200 type.
     * </p>
     */
    const ECC200_14x14 = 25;
    /**
     * <p>
     * Specifies size of 16 x 16 modules for ECC200 type.
     * </p>
     */
    const ECC200_16x16 = 26;
    /**
     * <p>
     * Specifies size of 18 x 18 modules for ECC200 type.
     * </p>
     */
    const ECC200_18x18 = 27;
    /**
     * <p>
     * Specifies size of 20 x 20 modules for ECC200 type.
     * </p>
     */
    const ECC200_20x20 = 28;
    /**
     * <p>
     * Specifies size of 22 x 22 modules for ECC200 type.
     * </p>
     */
    const ECC200_22x22 = 29;
    /**
     * <p>
     * Specifies size of 24 x 24 modules for ECC200 type.
     * </p>
     */
    const ECC200_24x24 = 30;
    /**
     * <p>
     * Specifies size of 26 x 26 modules for ECC200 type.
     * </p>
     */
    const ECC200_26x26 = 31;
    /**
     * <p>
     * Specifies size of 32 x 32 modules for ECC200 type.
     * </p>
     */
    const ECC200_32x32 = 32;
    /**
     * <p>
     * Specifies size of 36 x 36 modules for ECC200 type.
     * </p>
     */
    const ECC200_36x36 = 33;
    /**
     * <p>
     * Specifies size of 40 x 40 modules for ECC200 type.
     * </p>
     */
    const ECC200_40x40 = 34;
    /**
     * <p>
     * Specifies size of 44 x 44 modules for ECC200 type.
     * </p>
     */
    const ECC200_44x44 = 35;
    /**
     * <p>
     * Specifies size of 48 x 48 modules for ECC200 type.
     * </p>
     */
    const ECC200_48x48 = 36;
    /**
     * <p>
     * Specifies size of 52 x 52 modules for ECC200 type.
     * </p>
     */
    const ECC200_52x52 = 37;
    /**
     * <p>
     * Specifies size of 64 x 64 modules for ECC200 type.
     * </p>
     */
    const ECC200_64x64 = 38;
    /**
     * <p>
     * Specifies size of 72 x 72 modules for ECC200 type.
     * </p>
     */
    const ECC200_72x72 = 39;
    /**
     * <p>
     * Specifies size of 80 x 80 modules for ECC200 type.
     * </p>
     */
    const ECC200_80x80 = 40;
    /**
     * <p>
     * Specifies size of 88 x 88 modules for ECC200 type.
     * </p>
     */
    const ECC200_88x88 = 41;
    /**
     * <p>
     * Specifies size of 96 x 96 modules for ECC200 type.
     * </p>
     */
    const ECC200_96x96 = 42;
    /**
     * <p>
     * Specifies size of 104 x 104 modules for ECC200 type.
     * </p>
     */
    const ECC200_104x104 = 43;
    /**
     * <p>
     * Specifies size of 120 x 120 modules for ECC200 type.
     * </p>
     */
    const ECC200_120x120 = 44;
    /**
     * <p>
     * Specifies size of 132 x 132 modules for ECC200 type.
     * </p>
     */
    const ECC200_132x132 = 45;
    /**
     * <p>
     * Specifies size of 144 x 144 modules for ECC200 type.
     * </p>
     */
    const ECC200_144x144 = 46;
    /**
     * <p>
     * Specifies size of 8 x 18 modules for ECC200 type.
     * </p>
     */
    const ECC200_8x18 = 47;
    /**
     * <p>
     * Specifies size of 8 x 32 modules for ECC200 type.
     * </p>
     */
    const ECC200_8x32 = 48;
    /**
     * <p>
     * Specifies size of 12 x 26 modules for ECC200 type.
     * </p>
     */
    const ECC200_12x26 = 49;
    /**
     * <p>
     * Specifies size of 12 x 36 modules for ECC200 type.
     * </p>
     */
    const ECC200_12x36 = 50;
    /**
     * <p>
     * Specifies size of 16 x 36 modules for ECC200 type.
     * </p>
     */
    const ECC200_16x36 = 51;
    /**
     * <p>
     * Specifies size of 16 x 48 modules for ECC200 type.
     * </p>
     */
    const ECC200_16x48 = 52;
    /**
     * <p>
     * Specifies size of 8 x 48 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x48 = 53;
    /**
     * <p>
     * Specifies size of 8 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x64 = 54;
    /**
     * <p>
     * Specifies size of 8 x 80 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x80 = 55;
    /**
     * <p>
     * Specifies size of 8 x 96 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x96 = 56;
    /**
     * <p>
     * Specifies size of 8 x 120 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x120 = 57;
    /**
     * <p>
     * Specifies size of 8 x 144 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x144 = 58;
    /**
     * <p>
     * Specifies size of 12 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_12x64 = 59;
    /**
     * <p>
     * Specifies size of 12 x 88 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_12x88 = 60;
    /**
     * <p>
     * Specifies size of 16 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_16x64 = 61;
    /**
     * <p>
     * Specifies size of 20 x 36 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_20x36 = 62;
    /**
     * <p>
     * Specifies size of 20 x 44 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_20x44 = 63;
    /**
     * <p>
     * Specifies size of 20 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_20x64 = 64;
    /**
     * <p>
     * Specifies size of 22 x 48 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_22x48 = 65;
    /**
     * <p>
     * Specifies size of 24 x 48 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_24x48 = 66;
    /**
     * <p>
     * Specifies size of 24 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_24x64 = 67;
    /**
     * <p>
     * Specifies size of 26 x 40 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_26x40 = 68;
    /**
     * <p>
     * Specifies size of 26 x 48 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_26x48 = 69;
    /**
     * <p>
     * Specifies size of 26 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_26x64 = 70;
}