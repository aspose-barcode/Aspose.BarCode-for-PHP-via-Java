<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\ComplexBarcode\IComplexCodetext;

/**
 * Base class for encoding and decoding the text embedded in the MaxiCode code.
 *
 * This sample shows how to decode raw MaxiCode codetext to MaxiCodeCodetext instance.
 *
 * @code
 * $reader = new BarCodeReader("c:\\test.png", DecodeType::MAXI_CODE);
 * foreach($reader->readBarCodes() as $result)
 * {
 *      $resultMaxiCodeCodetext = ComplexCodetextReader::tryDecodeMaxiCode($result->getExtended()->getMaxiCode()->getMaxiCodeMode(), $result->getCodeText());
 *      print("BarCode Type: ".$resultMaxiCodeCodetext->getBarcodeType());
 *      print("MaxiCode mode: ".$resultMaxiCodeCodetext->getMode());
 *      print("BarCode CodeText: ".$resultMaxiCodeCodetext->getConstructedCodetext());
 * }
 * @endcode
 */
abstract class MaxiCodeCodetext extends IComplexCodetext
{
    /**
     * Gets a MaxiCode encode mode.
     */
    public function getMaxiCodeEncodeMode(): int
    {
        return $this->getIComplexCodetextDTO()->maxiCodeEncodeMode;
    }

    /**
     * Sets a MaxiCode encode mode.
     */
    public function setMaxiCodeEncodeMode(int $value): void
    {
        $this->getIComplexCodetextDTO()->maxiCodeEncodeMode = $value;
    }

    /**
     * Gets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     */
    public function getECIEncoding(): int
    {
        return $this->getIComplexCodetextDTO()->ECIEncoding;
    }

    /**
     * Sets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     */
    public function setECIEncoding(int $value): void
    {
        $this->getIComplexCodetextDTO()->ECIEncoding = $value;
    }

    /**
     * Gets barcode type.
     * @return int Barcode type
     */
    public function getBarcodeType(): int
    {
        return $this->getIComplexCodetextDTO()->barcodeType;
    }
}