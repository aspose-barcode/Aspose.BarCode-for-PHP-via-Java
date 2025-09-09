<?php

namespace Aspose\Barcode\Recognition;

/**
 * <p>
 *  <p>
 *  Recognition mode which sets size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
 *  </p>
 *  </p><p><hr><blockquote><pre>
 *  This sample shows how to use XDimension mode
 *  <pre>
 * @code
 *  $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
 *  $reader->getQualitySettings()->setXDimension(XDimensionMode::SMALL);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *     print("BarCode CodeText: " . $result->getCodeText());
 *  }
 * @endcode
 *    </pre>
 *  </pre></blockquote></hr></p>
 */
class XDimensionMode
{
    /**
     * <p>Value of XDimension is detected by AI (SVM). At this time the same as Normal</p>
     */
    const AUTO = 0;
    /**
     * <p>Detects barcodes with small XDimension in 1 pixel or more with quality from BarcodeQuality</p>
     */
    const SMALL = 1;
    /**
     * <p>Detects barcodes with classic XDimension in 2 pixels or more with quality from BarcodeQuality or high quality barcodes.</p>
     */
    const NORMAL = 2;
    /**
     * <p>Detects barcodes with large XDimension with quality from BarcodeQuality captured with high-resolution cameras.</p>
     */
    const LARGE = 3;
    /**
     * <p>Detects barcodes from size set in MinimalXDimension with quality from BarcodeQuality</p>
     */
    const USE_MINIMAL_X_DIMENSION = 4;
}