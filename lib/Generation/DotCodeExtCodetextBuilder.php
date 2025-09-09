<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Generation\ExtCodeItemType;
use Aspose\Barcode\Generation\ExtCodetextBuilderType;
use Aspose\Barcode\Generation\ExtCodetextBuilder;
use Aspose\Barcode\Internal\BarcodeException;

/**
 * <p>
 * <p>Extended codetext generator for 2D DotCode barcodes for ExtendedCodetext Mode of DotCodeEncodeMode</p>
 * </p><p><hr><blockquote><pre>
 * <pre>
 *
 * //Extended codetext mode
 * //create codetext
 * $textBuilder = new DotCodeExtCodetextBuilder();
 * $textBuilder->addFNC1FormatIdentifier();
 * $textBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $textBuilder->addFNC1FormatIdentifier();
 * $textBuilder->addECICodetext(ECIEncodings::UTF8, "犬Right狗");
 * $textBuilder->addFNC1FormatIdentifier();
 * $textBuilder->addECICodetext(ECIEncodings::UTF16BE, "犬Power狗");
 * $textBuilder->addPlainCodetext("Plain text");
 * $textBuilder->addFNC3SymbolSeparator();
 * $textBuilder->addFNC3ReaderInitialization();
 * $textBuilder->addPlainCodetext("Reader initialization info");
 * //generate codetext
 * $codetext = $textBuilder->getExtendedCodetext();
 * //generate
 * $generator = new BarcodeGenerator(EncodeTypes::DOT_CODE, $codetext);
 * {
 *     $generator->getParameters()->getBarcode()->getDotCode()->setDotCodeEncodeMode(DotCodeEncodeMode::EXTENDED_CODETEXT);
 *       $generator->save("test.bmp", BarCodeImageFormat::BMP);
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class DotCodeExtCodetextBuilder extends ExtCodetextBuilder
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

    /**
     * <p>
     * Adds FNC1 format identifier to the extended codetext items
     * </p>
     */
    public function addFNC1FormatIdentifier(): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = ExtCodeItemType::FNC_1_FORMAT_IDENTIFIER;
        $extCodeItemDTO->arguments = array();
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds FNC3 symbol separator to the extended codetext items
     * </p>
     */
    public function addFNC3SymbolSeparator(): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = ExtCodeItemType::FNC_3_SYMBOL_SEPARATOR;
        $extCodeItemDTO->arguments = array();
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds FNC3 reader initialization to the extended codetext items
     * </p>
     */
    public function addFNC3ReaderInitialization(): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = ExtCodeItemType::FNC_3_RRADER_INITILIZATION;
        $extCodeItemDTO->arguments = array();
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds structured append mode to the extended codetext items
     * </p>
     * @param int barcodeId ID of barcode
     * @param int barcodesCount Barcodes count
     */
    public function addStructuredAppendMode(int $barcodeId, int $barcodesCount): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = ExtCodeItemType::STRUCTURE_APPEND_MODE;
        $extCodeItemDTO->arguments = array($barcodeId, $barcodesCount);
        array_push($this->_list, $extCodeItemDTO);
    }

    protected function getExtCodetextBuilderType(): int
    {
        return ExtCodetextBuilderType::DOT_CODE_EXT_CODETEXT_BUILDER;
    }

    public function init(): void
    {
    }
}