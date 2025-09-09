<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\ComplexBarcode\IComplexCodetext;

/**
 * <p>
 * Base class for encoding and decoding the text embedded in the HIBC LIC code.
 * </p><p><hr><blockquote><pre>
 * This sample shows how to decode raw HIBC LIC codetext to HIBCLICComplexCodetext instance.
 * <pre>
 * $reader = new BarCodeReader("c:\\test.png", null, DecodeType::HIBC_AZTEC_LIC);
 * {
 *     foreach($reader->readBarCodes() as $result)
 *     {
 *         $resultHIBCLICComplexCodetext = ComplexCodetextReader::tryDecodeHIBCLIC($result->getCodeText());
 *         print("BarCode Type: " . $resultMaxiCodeCodetext->getBarcodeType());
 *         print("BarCode CodeText: " . $resultMaxiCodeCodetext->getConstructedCodetext());
 *     }
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
abstract class HIBCLICComplexCodetext extends IComplexCodetext
{

    function __construct($HIBCLICComplexCodetextDto)
    {
        $this->setIComplexCodetextDTO($HIBCLICComplexCodetextDto);
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * Constructs codetext
     * </p>
     * @return string Constructed codetext
     */
    public abstract function getConstructedCodetext(): string;

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     * @param string constructedCodetext Constructed codetext.
     */
    public abstract function initFromString(string $constructedCodetext): void;

    /**
     * <p>
     * Gets or sets barcode type. HIBC LIC codetext can be encoded using HIBCCode39LIC, HIBCCode128LIC, HIBCAztecLIC, HIBCDataMatrixLIC and HIBCQRLIC encode types.
     * Default value: HIBCCode39LIC.
     * </p>
     * @return int Barcode type.
     */
    public function getBarcodeType(): int
    {
        return $this->getIComplexCodetextDTO()->barcodeType;
    }

    /**
     * <p>
     * Gets or sets barcode type. HIBC LIC codetext can be encoded using HIBCCode39LIC, HIBCCode128LIC, HIBCAztecLIC, HIBCDataMatrixLIC and HIBCQRLIC encode types.
     * Default value: HIBCCode39LIC.
     * </p>
     * @return int Barcode type.
     */
    public function setBarcodeType(int $value): void
    {
        $this->getIComplexCodetextDTO()->barcodeType = $value;
    }
}