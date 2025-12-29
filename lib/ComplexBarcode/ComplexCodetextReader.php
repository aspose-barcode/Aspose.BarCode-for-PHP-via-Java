<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * ComplexCodetextReader decodes codetext to specified complex barcode type.
 *
 * This sample shows how to recognize and decode SwissQR image.
 * @code
 *  $cr = new BarCodeReader("SwissQRCodetext.png", DecodeType::QR);
 *  $cr->read();
 *  $result = ComplexCodetextReader::tryDecodeSwissQR($cr->getCodeText(false));
 * @endcode
 */
final class ComplexCodetextReader
{
    /**
     * Decodes SwissQR codetext.
     *
     * @param string encodedCodetext encoded codetext
     * @return SwissQRCodetext decoded SwissQRCodetext or null.
     */
    public static function tryDecodeSwissQR(string $encodedCodetext): ?SwissQRCodetext
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $swissQRCodetextDTO = $client->ComplexCodetextReader_tryDecodeSwissQR($encodedCodetext);
            $thriftConnection->closeConnection();
            return SwissQRCodetext::construct($swissQRCodetextDTO);
        }
        catch (\Throwable $ex)
        {
            return null;
        }
    }

    /**
     * Decodes Royal Mail Mailmark 2D codetext.
     * @param string $encodedCodetext encoded codetext
     * @return Mailmark2DCodetext decoded Royal Mail Mailmark 2D or null.
     */
    public static function tryDecodeMailmark2D(string $encodedCodetext): ?Mailmark2DCodetext
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $mailmark2DCodetextDTO = $client->ComplexCodetextReader_tryDecodeMailmark2D($encodedCodetext);
            $thriftConnection->closeConnection();
            $mailmark2DCodetext = Mailmark2DCodetext::construct($mailmark2DCodetextDTO);
            return $mailmark2DCodetext;
        }
        catch (\Throwable $ex)
        {
            return null;
        }
    }

    /**
     * Decodes Mailmark Barcode C and L codetext.
     * @param string $encodedCodetext encoded codetext
     * @return MailmarkCodetext|null Mailmark Barcode C and L or null.
     */
    public static function tryDecodeMailmark(string $encodedCodetext): ?MailmarkCodetext
    {
        $res = new MailmarkCodetext();
        try
        {
            $res->initFromString($encodedCodetext);
        }
        catch (\Throwable $e)
        {
            return null;
        }
        return $res;
    }

    /**
     * Decodes MaxiCode codetext.
     * @param int maxiCodeMode MaxiCode mode
     * @param string encodedCodetext encoded codetext
     * @return MaxiCodeCodetext Decoded MaxiCode codetext.
     */
    public static function tryDecodeMaxiCode(int $maxiCodeMode, string $encodedCodetext): ?MaxiCodeCodetext
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $maxiCodeCodetextDTO = $client->ComplexCodetextReader_tryDecodeMaxiCode($maxiCodeMode, $encodedCodetext);
        $thriftConnection->closeConnection();

        if($maxiCodeCodetextDTO->isNull === true)
            return null;

        if ($maxiCodeCodetextDTO->complexCodetextType == ComplexCodetextType::MaxiCodeCodetextMode2)
        {
            return MaxiCodeCodetextMode2::construct($maxiCodeCodetextDTO);
        } elseif ($maxiCodeCodetextDTO->complexCodetextType == ComplexCodetextType::MaxiCodeCodetextMode3)
        {
            return MaxiCodeCodetextMode3::construct($maxiCodeCodetextDTO);
        } else
        {
            return MaxiCodeStandardCodetext::construct($maxiCodeCodetextDTO);
        }
    }

    /**
     * <p>
     * Decodes HIBC LIC codetext.
     * </p>
     * @param string|null $encodedCodetext Encoded codetext
     * @return HIBCLICComplexCodetext|null Decoded HIBC LIC Complex Codetext or null
     */
    public static function tryDecodeHIBCLIC(?string $encodedCodetext): ?HIBCLICComplexCodetext
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();

        $hibclicComplexCodetext = null;
        try
        {
            $hibclicComplexCodetext = $client->ComplexCodetextReader_tryDecodeHIBCLIC($encodedCodetext);
        }
        catch (\Aspose\Barcode\Bridge\NullValueException $e)
        {
            return null;
        }

        $thriftConnection->closeConnection();
        if ($hibclicComplexCodetext->complexCodetextType == ComplexCodetextType::HIBCLICSecondaryAndAdditionalDataCodetext)
        {
            return HIBCLICSecondaryAndAdditionalDataCodetext::construct($hibclicComplexCodetext);
        } else if ($hibclicComplexCodetext->complexCodetextType == ComplexCodetextType::HIBCLICPrimaryDataCodetext)
        {
            return HIBCLICPrimaryDataCodetext::construct($hibclicComplexCodetext);
        } else if ($hibclicComplexCodetext->complexCodetextType == ComplexCodetextType::HIBCLICCombinedCodetext)
        {
            return HIBCLICCombinedCodetext::construct($hibclicComplexCodetext);
        }
        return null;
    }

    /**
     * <p>
     * Decodes HIBC PAS codetext.
     * </p>
     * @param string encodedCodetext encoded codetext
     * @return ?HIBCPASCodetext decoded HIBC PAS Complex Codetext or null.
     */
    public static function tryDecodeHIBCPAS(string $encodedCodetext): ?HIBCPASCodetext
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $hibclicComplexCodetextDTO = $client->ComplexCodetextReader_tryDecodeHIBCPAS($encodedCodetext);
        $thriftConnection->closeConnection();
        if ($hibclicComplexCodetextDTO->isNull)
            return null;
        return HIBCPASCodetext::construct($hibclicComplexCodetextDTO);
    }


    /**
     * <p>
     * Decodes USADriveId codetext.
     * </p>
     * @return ?USADriveIdCodetext Decoded USADriveId or null.
     * @param string encodedCodetext Encoded codetext
     */
    public static function tryDecodeUSADriveId(string $encodedCodetext) : ?USADriveIdCodetext
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $usaDriveIdCodetextDTO = $client->ComplexCodetextReader_tryDecodeUSADriveId($encodedCodetext);
        $thriftConnection->closeConnection();
        if ($usaDriveIdCodetextDTO->isNull)
            return null;
        return USADriveIdCodetext::_internal_construct($usaDriveIdCodetextDTO);
    }
}