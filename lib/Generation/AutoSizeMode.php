<?php

namespace Aspose\Barcode\Generation;

/**
 * Specifies the different types of automatic sizing modes.
 * Default value is AutoSizeMode::NONE.
 *
 *  This sample shows how to create and save a BarCode image.
 * @code
 *  $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX);
 *  $generator->setAutoSizeMode(AutoSizeMode.NEAREST);
 *  $generator->getBarCodeWidth()->setMillimeters(50);
 *  $generator->getBarCodeHeight()->setInches(1.3f);
 *  $generator->save("test.png");
 * @endcode
 */
class AutoSizeMode
{
    /**
     * Automatic resizing is disabled. Default value.
     */
    const NONE = '0';  //or CUSTOM, or DEFAULT

    /**
     * Barcode resizes to nearest lowest possible size
     * which are specified by BarCodeWidth and BarCodeHeight properties.
     */
    const NEAREST = '1';

    /**
     *  Resizes barcode to specified size with little scaling
     *  but it can be little damaged in some cases
     *  because using interpolation for scaling.
     *  Size can be specified by BarcodeGenerator.BarCodeWidth
     *  and BarcodeGenerator.BarCodeHeight properties.
     *
     *  This sample shows how to create and save a BarCode image in Scale mode.
     * @code
     *      $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, "");
     *      $generator->getParameters()->getBarcode()->setAutoSizeMode(AutoSizeMode::INTERPOLATION);
     *      $generator->getParameters()->getBarcode()->getBarCodeWidth()->setMillimeters(50);
     *      $generator->getParameters()->getBarcode()->getBarCodeHeight()->setInches(1.3);
     *      $generator->save("test.png", "PNG);
     * @endcode
     */
    const INTERPOLATION = '2';
}