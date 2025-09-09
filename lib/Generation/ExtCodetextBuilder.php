<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Generation\ExtCodeItemType;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Helper class for automatic codetext generation of the Extended Codetext Mode
 */
abstract class ExtCodetextBuilder
{
    protected $_list;

    function __construct()
    {
        $this->_list = array();
    }

    function init(): void
    {
    }

    /**
     * Clears extended codetext items
     */
    public function clear(): void
    {
        try
        {
            array_splice($this->_list, 0);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Adds plain codetext to the extended codetext items
     *
     * @param string $codetext Codetext in unicode to add as extended codetext item
     */
    public function addPlainCodetext(string $codetext): void
    {
        try
        {
            $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
            $extCodeItemDTO->extCodeItemType = ExtCodeItemType::PLAIN_CODETEXT;
            $extCodeItemDTO->arguments = array($codetext);
            array_push($this->_list, $extCodeItemDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Adds codetext with Extended Channel Identifier
     *
     * @param int ECIEncoding Extended Channel Identifier
     * @param string codetext    Codetext in unicode to add as extended codetext item with Extended Channel Identifier
     */
    public function addECICodetext(int $ECIEncoding, string $codetext): void
    {
        try
        {
            $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
            $extCodeItemDTO->extCodeItemType = ExtCodeItemType::ECI_CODETEXT;
            $extCodeItemDTO->arguments = array($ECIEncoding, $codetext);
            array_push($this->_list, $extCodeItemDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Generate extended codetext from generation items list
     *
     * @return string Return string of extended codetext
     */
    public final function getExtendedCodetext(): string
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $extendedCodetext = $client->ExtCodetextBuilder_getExtendedCodetext($this->getExtCodetextBuilderType(), $this->_list);
            $thriftConnection->closeConnection();
            return $extendedCodetext;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    protected abstract function getExtCodetextBuilderType(): int;
}