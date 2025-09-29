<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\A;
use Aspose\Barcode\Recognition\BarCodeExtendedParameters;
use Aspose\Barcode\Recognition\BarCodeRegionParameters;
use Aspose\Barcode\Bridge\BarCodeResultDTO;
use Aspose\Barcode\encoding;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Stores recognized barcode data like SingleDecodeType type, {string} codetext,
 * BarCodeRegionParameters region and other parameters
 *
 * This sample shows how to obtain BarCodeResult.
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39, DecodeType::CODE_128);
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
    }

    /**
     * @return float Gets the reading quality. Works for 1D and postal barcodes. Value: The reading quality percent
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
     *  Gets the code text with encoding.
     *  </p><p><hr><blockquote><pre>
     *  <p>This example shows how to use {@code GetCodeText}:</p>
     *  <pre>
     *  $gen = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, null);
     *    $gen->setCodeText("車種名", "932");
     *    $gen->save("barcode.png", BarCodeImageFormat::PNG);
     *
     *    $reader = new BarCodeReader("barcode.png", null, DecodeType::DATA_MATRIX);
     *  $results = $reader->readBarCodes();
     *  for($i = 0; i < sizeof($results); $i++)
     *  {
     *      $result = $results[$i];
     *      echo("BarCode CodeText: " . $result->getCodeText("932"));
     *  }
     *    </pre>
     *  </pre></blockquote></hr></p>
     * @param encoding The encoding for codetext.
     * @return A string containing recognized code text.
     */
    function getCodeText(?string $encoding): string
    {
        if ($encoding == null || $encoding == "")
        {
            return $this->getBarCodeResultDTO()->codeText;
        } else
        {
            try
            {
                $thriftConnection = new ThriftConnection();
                $client = $thriftConnection->openConnection();
                $codeText = $client->BarcodeResult_getCodeTextWithEncoding($this->getBarCodeResultDTO()->codeBytes, $encoding);
                $thriftConnection->closeConnection();
                return $codeText;
            }
            catch (Exception $ex)
            {
                throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
            }
        }
    }

    function getCodeType()
    {
        return $this->getBarCodeResultDTO()->codeType;
    }

    function getCodeBytes()
    {
        return explode(",", $this->getBarCodeResultDTO()->codeBytes);
    }

    function getCodeTypeName()
    {
        return $this->getBarCodeResultDTO()->codeTypeName;
    }

    function getConfidence()
    {
        return $this->getBarCodeResultDTO()->confidence;
    }

    function getExtended(): BarCodeExtendedParameters
    {
        return $this->extended;
    }

    function getRegion(): BarCodeRegionParameters
    {
        return $this->region;
    }
}