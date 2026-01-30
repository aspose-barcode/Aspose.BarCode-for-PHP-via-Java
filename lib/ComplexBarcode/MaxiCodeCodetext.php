<?php

namespace Aspose\Barcode\ComplexBarcode;

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
     * <p>
     * Gets a MaxiCode encode mode.
     * Default value: Auto.
     * </p>
     * @return a MaxiCode encode mode.
     */
    public function getEncodeMode(): int
    {
        return $this->getIComplexCodetextDTO()->encodeMode;
    }

    /**
     * <p>
     * Sets a MaxiCode encode mode.
     * Default value: Auto.
     * </p>
     * @param value a MaxiCode encode mode.
     */
    public function setEncodeMode($value):void
    {
        $this->getIComplexCodetextDTO()->encodeMode = $value;
    }

    /**
     * Gets a MaxiCode encode mode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getEncodeMode().
     */
    public function getMaxiCodeEncodeMode(): int
    {
        return $this->getIComplexCodetextDTO()->encodeMode;
    }

    /**
     * Sets a MaxiCode encode mode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setEncodeMode().
     */
    public function setMaxiCodeEncodeMode(int $value): void
    {
        $this->getIComplexCodetextDTO()->encodeMode = $value;
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