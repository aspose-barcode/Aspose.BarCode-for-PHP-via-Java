<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Generation\ExtCodetextBuilderType;
use Aspose\Barcode\Generation\ExtCodetextBuilder;
use Aspose\Barcode\Internal\BarcodeException;

/**
 * Extended codetext generator for MaxiCode barcodes for ExtendedCodetext Mode of MaxiCodeEncodeMode
 * Use TwoDDisplayText property of BarcodeGenerator to set visible text to removing managing characters.
 *
 * This sample shows how to use MaxiCodeExtCodetextBuilder in Extended Mode.
 *
 * @code
 * //create codetext
 * $textBuilder = new MaxiCodeExtCodetextBuilder();
 * $textBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $textBuilder->addECICodetext(ECIEncodings::UTF8, "犬Right狗");
 * $textBuilder->addECICodetext(ECIEncodings::UTF16BE, "犬Power狗");
 * $textBuilder->addPlainCodetext("Plain text");
 *
 * //generate codetext
 * $codetext = $textBuilder->getExtendedCodetext();
 *
 * //generate
 * $generator = new BarcodeGenerator(EncodeTypes::MAXI_CODE, $codetext);
 * $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
 * $generator->save("test.bmp", BarcodeImageFormat.BMP);
 * @endcode
 */
class MaxiCodeExtCodetextBuilder extends ExtCodetextBuilder
{
    function __construct()
    {
        try
        {
            parent::__construct();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    function init(): void
    {
    }

    protected function getExtCodetextBuilderType(): int
    {
        return ExtCodetextBuilderType::MAXICODE_EXT_CODETEXT_BUILDER;
    }
}