<?php

namespace Aspose\Barcode\Recognition;

/**
 * <p>
 *  <p>
 *  Deconvolution (image restorations) mode which defines level of image degradation. Originally deconvolution is a function which can restore image degraded
 *  (convoluted) by any natural function like blur, during obtaining image by camera. Because we cannot detect image function which corrupt the image,
 *  we have to check most well know functions like sharp or mathematical morphology.
 *  </p>
 *  </p><p><hr><blockquote><pre>
 *  This sample shows how to use Deconvolution mode
 *  <pre>
 * @code
 *  $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
 *  $reader->getQualitySettings()->setDeconvolution(DeconvolutionMode::SLOW);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *     print("BarCode CodeText: " . $result->getCodeText());
 *  }
 * @endcode
 *    </pre>
 *  </pre></blockquote></hr></p>
 */
class DeconvolutionMode
{
    /**
     * <p>Enables fast deconvolution methods for high quality images.</p>
     */
    const FAST = 0;
    /**
     * <p>Enables normal deconvolution methods for common images.</p>
     */
    const NORMAL = 1;
    /**
     * <p>Enables slow deconvolution methods for low quality images.</p>
     */
    const SLOW = 2;
}