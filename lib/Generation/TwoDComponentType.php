<?php

namespace Aspose\Barcode\Generation;

/**
 * Type of 2D component
 * This sample shows how to create and save a GS1 Composite Bar image.
 * Note that 1D codetext and 2D codetext are separated by symbol '/'
 * @code
 * $codetext = "(01)03212345678906/(21)A1B2C3D4E5F6G7H8";
 * $generator = new BarcodeGenerator(EncodeTypes::GS1_COMPOSITE_BAR, $codetext))
 *
 *     $generator->getParameters()->getBarcode()->getGS1CompositeBar()->setLinearComponentType(EncodeTypes::GS1_CODE_128);
 *     $generator->getParameters()->getBarcode()->getGS1CompositeBar()->setTwoDComponentType(TwoDComponentType::CC_A);
 *
 *     // Aspect ratio of 2D component
 *     $generator->getParameters()->getBarcode()->getPdf417()->setAspectRatio(3);
 *     ///
 *     // X-Dimension of 1D and 2D components
 *     $generator->getParameters()->getBarcode()->getXDimension()->setPixels(3);
 *     ///
 *     // Height of 1D component
 *     $generator->getParameters()->getBarcode()->getBarHeight()->setPixels(100);
 *     ///
 *     $generator->save("test.png", BarcodeImageFormat::PNG);
 * @endcode
 */
class TwoDComponentType
{
    /**
     * Auto select type of 2D component
     */
    const AUTO = 0;

    /**
     * CC-A type of 2D component. It is a structural variant of MicroPDF417
     */
    const CC_A = 1;

    /**
     * CC-B type of 2D component. It is a MicroPDF417 symbol.
     */
    const CC_B = 2;

    /**
     * CC-C type of 2D component. It is a PDF417 symbol.
     */
    const CC_C = 3;
}