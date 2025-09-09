<?php

namespace Aspose\Barcode\Recognition;

/**
 * <p>
 *  <p>
 *  Mode which enables methods to recognize barcode elements with the selected quality. Barcode element with lower quality requires more hard methods which slows the recognition.
 *  </p>
 *  </p><p><hr><blockquote><pre>
 *  This sample shows how to use BarcodeQuality mode
 *  <pre>
 * @code
 *  $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
 *  $reader->getQualitySettings()->setBarcodeQuality(BarcodeQualityMode::LOW);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *     print("BarCode CodeText: " . $result->getCodeText());
 *  }
 * @endcode
 *    </pre>
 *  </pre></blockquote></hr></p>
 */
class BarcodeQualityMode
{
    /**
     * <p>Enables recognition methods for High quality barcodes.</p>
     */
    const HIGH = 0;
    /**
     * <p>Enables recognition methods for Common(Normal) quality barcodes.</p>
     */
    const NORMAL = 1;
    /**
     * <p>Enables recognition methods for Low quality barcodes.</p>
     */
    const LOW = 2;
}