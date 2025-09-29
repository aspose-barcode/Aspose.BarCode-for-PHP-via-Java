<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Class for encoding and decoding the text embedded in the SwissQR code.
 */
final class SwissQRCodetext extends IComplexCodetext
{
    private $bill;

    /**
     * Creates an instance of SwissQRCodetext.
     *
     * @param SwissQRBill $bill SwissQR bill data
     * @throws BarcodeException
     */
    public function __construct(?SwissQRBill $bill)
    {
        try
        {
            $this->setIComplexCodetextDTO($this->obtainDto($bill));
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($dtoRef)
    {
        try
        {
            $class = new SwissQRCodetext(null);
            $class->setIComplexCodetextDTO($dtoRef);
            $class->initFieldsFromDto();
            return $class;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = null;
        if (is_null($args[0]))
            $dtoRef = $client->SwissQRCodetext_ctor();
        else
            $dtoRef = $client->SwissQRCodetext_ctorSwissQRBill($args[0]->getSwissQRBillDto());
        $dtoRef->complexCodetextType = ComplexCodetextType::SwissQRCodetext;
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    public function initFieldsFromDto()
    {
        try
        {
            $this->bill = new SwissQRBill($this->getIComplexCodetextDTO()->bill);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * SwissQR bill data
     */
    public function getBill(): SwissQRBill
    {
        return $this->bill;
    }

    /**
     * Construct codetext from SwissQR bill data
     *
     * @return string Constructed codetext
     */
    public function getConstructedCodetext(): string
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $constructedCodetext = $client->SwissQRCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
            $thriftConnection->closeConnection();
            return $constructedCodetext;
        }
        catch (\Throwable $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Initializes Bill with constructed codetext.
     *
     * @param string $constructedCodetext Constructed codetext.
     */
    public function initFromString($constructedCodetext): void
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $this->setIComplexCodetextDTO($client->SwissQRCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext));
            $this->initFieldsFromDto();
            $thriftConnection->closeConnection();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets barcode type.
     *
     * @return int Barcode type.
     */
    public function getBarcodeType(): int
    {
        try
        {
            return $this->getIComplexCodetextDTO()->barcodeType;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}