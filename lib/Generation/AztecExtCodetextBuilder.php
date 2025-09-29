<?php

namespace Aspose\Barcode\Generation;

use Exception;
use Aspose\Barcode\Internal\BarcodeException;

/**
 * <p>
 * <p>Extended codetext generator for Aztec barcodes for ExtendedCodetext Mode of AztecEncodeMode</p>
 * <p>Use TwoDDisplayText property of BarcodeGenerator to set visible text to removing managing characters.</p>
 * </p><p><hr><blockquote><pre>
 * This sample shows how to use AztecExtCodetextBuilder in Extended Mode.
 * <pre>
 * @code
 * //create codetext
 * $textBuilder = new AztecExtCodetextBuilder();
 * $textBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $textBuilder->addECICodetext(ECIEncodings::UTF8, "犬Right狗");
 * $textBuilder->addECICodetext(ECIEncodings::UTF16BE, "犬Power狗");
 * $textBuilder->addPlainCodetext("Plain text");
 * //generate codetext
 * $codetext = $textBuilder->getExtendedCodetext();
 * //generate
 * $generator = new BarcodeGenerator(EncodeTypes::AZTEC, $codetext);
 * $generator->getParameters()->getBarcode()->getCodeTextParameters()->setwoDDisplayText("My Text");
 * $generator->save("test.bmp", BarcodeImageFormat::BMP);
 */
class AztecExtCodetextBuilder extends ExtCodetextBuilder
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

    public function init(): void
    {
    }

    protected function getExtCodetextBuilderType(): int
    {
        return ExtCodetextBuilderType::AZTEC_EXT_CODETEXT_BUILDER;
    }
}