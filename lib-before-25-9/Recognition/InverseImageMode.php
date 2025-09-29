<?php

namespace Aspose\Barcode\Recognition;

/**
 * <p>
 * <p>
 * Mode which enables or disables additional recognition of barcodes on images with inverted colors (luminance).
 * </p>
 * </p><p><hr><blockquote><pre>
 *  This sample shows how to use InverseImage mode
 *  <pre>
 *
 * @code
 *  $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
 *  $reader->getQualitySettings()->setInverseImage(InverseImageMode::ENABLED);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *     print("BarCode CodeText: " . $result->getCodeText());
 *  }
 * @endcode
 *    </pre>
 *  </pre></blockquote></hr></p>
 */
class InverseImageMode
{
    /**
     * <p>At this time the same as Disabled. Disables additional recognition of barcodes on inverse images.</p>
     */
    const AUTO = 0;
    /**
     * <p>Disables additional recognition of barcodes on inverse images.</p>
     */
    const DISABLED = 1;
    /**
     * <p>Enables additional recognition of barcodes on inverse images</p>
     */
    const ENABLED = 2;
}