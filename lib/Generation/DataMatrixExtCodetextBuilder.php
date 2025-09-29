<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Internal\BarcodeException;
use Exception;

/**
 * <p>
 * <p>Extended codetext generator for 2D DataMatrix barcodes for ExtendedCodetext Mode of DataMatrixEncodeMode</p>
 * </p><p><hr><blockquote><pre>
 * <pre>
 * //Extended codetext mode
 * //create codetext
 * $textBuilder = new DataMatrixExtCodetextBuilder();
 * $codetextBuilder->addECICodetextWithEncodeMode(ECIEncodings::Win1251, DataMatrixEncodeMode::BYTES, "World");
 * $codetextBuilder->addPlainCodetext("Will");
 * $codetextBuilder->addECICodetext(ECIEncodings::UTF_8, "犬Right狗");
 * $codetextBuilder->addCodetextWithEncodeMode(DataMatrixEncodeMode::C_40, "ABCDE");
 * //generate codetext
 * $codetext = $textBuilder->getExtendedCodetext();
 * //generate
 * $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, null, $codetext);
 * $generator->getParameters()->getBarcode()->getDataMatrix()->setDataMatrixEncodeMode(DataMatrixEncodeMode::EXTENDED_CODETEXT);
 * $generator->save("test.bmp", BarcodeImageFormat::BMP);
 * </pre>
 * </pre></blockquote></hr></p>
 */
class DataMatrixExtCodetextBuilder extends ExtCodetextBuilder
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

    /**
     * <p>
     * Adds codetext with Extended Channel Identifier with defined encode mode
     * </p>
     * @param ECIEncoding Extended Channel Identifier
     * @param encodeMode Encode mode value
     * @param codetext Codetext in unicode to add as extended codetext item with Extended Channel Identifier with defined encode mode
     */
    public function addECICodetextWithEncodeMode(int $ECIEncoding, int $encodeMode, string $codetext): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = ExtCodeItemType::ECI_CODETEXT_WITH_ENCODE_MODE;
        $extCodeItemDTO->arguments = array($ECIEncoding, $encodeMode, $codetext);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext with defined encode mode to the extended codetext items
     * </p>
     * @param encodeMode Encode mode value
     * @param codetext Codetext in unicode to add as extended codetext item
     */
    public function addCodetextWithEncodeMode(int $encodeMode, string $codetext): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = ExtCodeItemType::CODETEXT_WITH_ENCODE_MODE;
        $extCodeItemDTO->arguments = array($encodeMode, $codetext);
        array_push($this->_list, $extCodeItemDTO);
    }

    protected function getExtCodetextBuilderType(): int
    {
        return ExtCodetextBuilderType::DATA_MATRIX_EXT_CODETEXT_BUILDER;
    }
}