<?php

namespace Aspose\Barcode\Generation;

use Exception;
use Aspose\Barcode\Internal\BarcodeException;

/**
 * Extended codetext generator for 2D QR barcodes for ExtendedCodetext Mode of QREncodeMode
 * Use Display2DText property of BarCodeBuilder to set visible text to removing managing characters.
 *
 *  Example how to generate FNC1 first position for Extended Mode
 * @code
 *  //create codetext
 *  $lTextBuilder = new QrExtCodetextBuilder();
 *  $lTextBuilder->addFNC1FirstPosition();
 *  $lTextBuilder->addPlainCodetext("000%89%%0");
 *  $lTextBuilder->addFNC1GroupSeparator();
 *  $lTextBuilder->addPlainCodetext("12345&lt;FNC1&gt;");
 *  //generate codetext
 *  $lCodetext = lTextBuilder->getExtendedCodetext();
 * @endcode
 *
 * Example how to generate FNC1 second position for Extended Mode
 * @code
 *  //create codetext
 *  $lTextBuilder = new QrExtCodetextBuilder();
 *  $lTextBuilder->addFNC1SecondPosition("12");
 *  $lTextBuilder->addPlainCodetext("TRUE3456");
 *  //generate codetext
 *  $lCodetext = lTextBuilder->getExtendedCodetext();
 * @endcode
 *
 * Example how to generate multi ECI mode for Extended Mode
 * @code
 *  //create codetext
 * $lTextBuilder = new QrExtCodetextBuilder();
 * $lTextBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $lTextBuilder->addECICodetext(ECIEncodings::UTF8, "Right");
 * $lTextBuilder->addECICodetext(ECIEncodings::UTF16BE, "Power");
 * $lTextBuilder->addPlainCodetext("t\\e\\\\st");
 *  //generate codetext
 * $lCodetext = $lTextBuilder->getExtendedCodetext();
 * @endcode
 */
class QrExtCodetextBuilder extends ExtCodetextBuilder
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
     * Adds FNC1 in first position to the extended codetext items
     */
    function addFNC1FirstPosition(): void
    {
        try
        {
            $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
            $extCodeItemDTO->extCodeItemType = ExtCodeItemType::FNC_1_FIRST_POSITION;
            $extCodeItemDTO->arguments = array();
            array_push($this->_list, $extCodeItemDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Adds FNC1 in second position to the extended codetext items
     *
     * @param string $codetext Value of the FNC1 in the second position
     */
    function addFNC1SecondPosition(string $codetext): void
    {
        try
        {
            $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
            $extCodeItemDTO->extCodeItemType = ExtCodeItemType::FNC_1_SECOND_POSITION;
            $extCodeItemDTO->arguments = array($codetext);
            array_push($this->_list, $extCodeItemDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Adds Group Separator (GS - '\\u001D') to the extended codetext items
     */
    function addFNC1GroupSeparator(): void
    {
        try
        {
            $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
            $extCodeItemDTO->extCodeItemType = ExtCodeItemType::FNC_1_GROUP_SEPARATOR;
            $extCodeItemDTO->arguments = array();
            array_push($this->_list, $extCodeItemDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Adds codetext with the specified QR compaction mode to the extended codetext items.
     *
     * @param int $mode QR compaction mode for the codetext.
     * @param string $codetext Codetext in Unicode to add as an extended codetext item.
     * @throws BarcodeException
     */
    function addCodetextWithCompactionMode(int $mode, string $codetext): void
    {
        try
        {
            if ($codetext === "")
                return;

            $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
            $extCodeItemDTO->extCodeItemType = ExtCodeItemType::CODETEXT_WITH_COMPACTION_MODE;
            $extCodeItemDTO->arguments = array($mode, $codetext);

            array_push($this->_list, $extCodeItemDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Clears extended codetext items
     * </p>
     */
    public function clear(): void
    {
        parent::clear();
    }

    protected function getExtCodetextBuilderType(): int
    {
        return ExtCodetextBuilderType::QR_EXT_CODETEXT_BUILDER;
    }
}