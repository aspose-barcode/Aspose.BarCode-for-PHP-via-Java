<?php

namespace Aspose\Barcode\Recognition;

/**
 * <p>
 *  <p>
 *  Mode which enables or disables additional recognition of color barcodes on color images.
 *  </p>
 *  </p><p><hr><blockquote><pre>
 *  This sample shows how to use ComplexBackground mode
 *  <pre>
 * @code
 *  $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
 *  $reader->getQualitySettings()->setComplexBackground(ComplexBackgroundMode::ENABLED);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *     print("BarCode CodeText: " . $result->getCodeText());
 *  }
 * @endcode
 *    </pre>
 *  </pre></blockquote></hr></p>
 */
class ComplexBackgroundMode
{
    /**
     * <p>At this time the same as Disabled. Disables additional recognition of color barcodes on color images.</p>
     */
    const AUTO = 0;
    /**
     * <p>Disables additional recognition of color barcodes on color images.</p>
     */
    const DISABLED = 1;
    /**
     * <p>Enables additional recognition of color barcodes on color images.</p>
     */
    const ENABLED = 2;

}