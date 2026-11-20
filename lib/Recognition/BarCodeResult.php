<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\BarCodeResultDTO;

use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;
use Exception;

/**
 * Stores recognized barcode data like barcode type, code text,
 * BarCodeRegionParameters region and other parameters
 *
 * This sample shows how to obtain BarCodeResult.
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::CODE_128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * foreach($reader->readBarCodes() as $result)
 * {
 *     print("BarCode Type: ".$result->getCodeTypeName());
 *     print("BarCode CodeText: ".$result->getCodeText());
 *     print("BarCode Confidence: ".$result->getConfidence());
 *     print("BarCode ReadingQuality: ".$result->getReadingQuality());
 *     print("BarCode Angle: ".$result->getRegion()->getAngle());
 * }
 * @endcode
 */
class BarCodeResult implements Communicator
{
    private BarCodeRegionParameters $region;
    private BarCodeExtendedParameters $extended;
    private ?IsoSymbolQuality $isoSymbolQuality;
    private BarCodeResultDTO $barCodeResultDTO;

    /**
     * @return BarCodeResultDTO instance
     */
    private function getBarCodeResultDTO(): BarCodeResultDTO
    {
        return $this->barCodeResultDTO;
    }

    /**
     * @param $barCodeResultDTO
     */
    private function setBarCodeResultDTO($barCodeResultDTO): void
    {
        $this->barCodeResultDTO = $barCodeResultDTO;
    }

    function __construct(BarCodeResultDTO $barCodeResultDTO)
    {
        $this->barCodeResultDTO = $barCodeResultDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        $this->region = new BarCodeRegionParameters($this->getBarCodeResultDTO()->region);
        $this->extended = new BarCodeExtendedParameters($this->getBarCodeResultDTO()->extended);
        if($this->getBarCodeResultDTO()->isoSymbolQuality !== null)
            $this->isoSymbolQuality = new IsoSymbolQuality($this->getBarCodeResultDTO()->isoSymbolQuality);
    }

    /**
     * Gets the reading quality. Works for 1D and postal barcodes.
     * Value: The reading quality percent
     *
     * @return float The reading quality percent
     * @throws BarcodeException
     */
    public function getReadingQuality(): float
    {
        try
        {
            return $this->getBarCodeResultDTO()->readingQuality;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Gets the code text with encoding.
     * </p><p><hr><blockquote><pre>
     * <p>This example shows how to use {@code getCodeText}:</p>
     * <pre>
     * $gen = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, null);
     * $gen->setCodeText("車種名", "932");
     * $gen->save("barcode.png", BarCodeImageFormat::PNG);
     *
     * $reader = new BarCodeReader("barcode.png", null, DecodeType::DATA_MATRIX);
     * $results = $reader->readBarCodes();
     * for($i = 0; i < sizeof($results); $i++)
     * {
     *     $result = $results[$i];
     *     echo("BarCode CodeText: " . $result->getCodeText("932"));
     * }
     * </pre>
     * </pre></blockquote></hr></p>
     * @param string $encoding The encoding for codetext.
     * @return string A string containing recognized code text.
     */
    function getCodeText(?string $encoding = null): string
    {
        if ($encoding == null || $encoding == "") {
            return $this->getBarCodeResultDTO()->codeText;
        }

        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $codeText = $client->BarcodeResult_getCodeTextWithEncoding($this->getBarCodeResultDTO()->codeBytes, $encoding);
            $thriftConnection->closeConnection();
            return $codeText;
        }
        catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the barcode type.
     * Value: The type information of the recognized barcode
     *
     * @return int The barcode type
     */
    function getCodeType()
    {
        return $this->getBarCodeResultDTO()->codeType;
    }

    /**
     * Gets the encoded code bytes.
     * Value: The code bytes of the barcode
     *
     * @return array The encoded code bytes
     */
    function getCodeBytes()
    {
        return explode(",", $this->getBarCodeResultDTO()->codeBytes);
    }

    /**
     * Gets the name of the barcode type.
     * Value: The type name of the recognized barcode
     *
     * @return string The barcode type name
     */
    function getCodeTypeName()
    {
        return $this->getBarCodeResultDTO()->codeTypeName;
    }

    /**
     * Gets recognition confidence level of the recognized barcode.
     * BarCodeConfidence::STRONG does not have fakes or misrecognitions,
     * BarCodeConfidence::MODERATE could sometimes have fakes or incorrect codetext
     * because this confidence level is used for barcodes with weak checksum or even without it,
     * BarCodeConfidence::NONE always has incorrect codetext and could be fake recognitions
     *
     * @return int The recognition confidence level
     */
    function getConfidence()
    {
        return $this->getBarCodeResultDTO()->confidence;
    }

    /**
     * Gets extended parameters of recognized barcode.
     * Value: The extended parameters of recognized barcode
     *
     * @return BarCodeExtendedParameters The extended parameters of recognized barcode
     */
    function getExtended(): BarCodeExtendedParameters
    {
        return $this->extended;
    }

    /**
     * Gets the barcode region.
     * Value: The region of the recognized barcode
     *
     * @return BarCodeRegionParameters The region of the recognized barcode
     */
    function getRegion(): BarCodeRegionParameters
    {
        return $this->region;
    }

    /**
     * Gets the ISO/IEC symbol quality evaluation results for the recognized barcode.
     *
     * @return IsoSymbolQuality The symbol quality evaluation results
     */
    function getIsoSymbolQuality(): ?IsoSymbolQuality
    {
        return $this->isoSymbolQuality;
    }
}