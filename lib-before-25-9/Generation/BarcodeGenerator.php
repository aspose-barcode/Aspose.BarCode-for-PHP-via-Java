<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Generation\BarCodeImageFormat;
use Aspose\Barcode\Recognition\BarCodeReader;
use Aspose\Barcode\Generation\Base64CodeTextType;
use Aspose\Barcode\Generation\BaseGenerationParameters;
use Aspose\Barcode\Bridge\BarcodeExceptionDTO;
use Aspose\Barcode\Bridge\BarcodeGeneratorDTO;
use Aspose\Barcode\codeText;
use Aspose\Barcode\encoding;
use Aspose\Barcode\insertBOM;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\CommonUtility;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\License;
use Aspose\Barcode\Internal\ThriftConnection;
use Exception;

/**
 *  BarcodeGenerator for backend barcode images generation.
 *
 *  supported symbologies:
 *  1D:
 *  Codabar, Code11, Code128, Code39Standard, Code39Extended
 *  Code93Standard, Code93Extended, EAN13, EAN8, Interleaved2of5,
 *  MSI, Standard2of5, UPCA, UPCE, ISBN, GS1Code128, Postnet, Planet
 *  EAN14, SCC14, SSCC18, ITF14, SingaporePost ...
 *  2D:
 *  Aztec, DataMatrix, PDf417, QR code ...
 *
 *  This sample shows how to create and save a barcode image.
 * @code
 *          $encode_type = EncodeTypes::CODE_128;
 *          $generator = new BarcodeGenerator($encode_type);
 *          $generator->setCodeText("123ABC");
 * @endcode
 */
class BarcodeGenerator implements Communicator
{
    private $barcodeGeneratorDto;

    private function getBarcodeGeneratorDto(): BarcodeGeneratorDTO
    {
        return $this->barcodeGeneratorDto;
    }

    private function setBarcodeGeneratorDto(BarcodeGeneratorDTO $barcodeGeneratorDto): void
    {
        $this->barcodeGeneratorDto = $barcodeGeneratorDto;
    }

    private $parameters;

    /**
     * BarcodeGenerator constructor.
     * @param int|null $encodeType Barcode symbology type. Use EncodeTypes class to setup a symbology
     * @param string|null $codeText Text to be encoded. Should be encoded in UTF-8 encoding
     * @code
     *      $barcodeGenerator = new BarcodeGenerator(EncodeTypes::EAN_14, "332211");
     * @endcode
     * @throws BarcodeException
     */
    public function __construct(?int $encodeType, ?string $codeText = null)
    {
        try
        {
            $this->barcodeGeneratorDto = $this->obtainDto($encodeType);
            $this->getBarcodeGeneratorDto()->barcodeType = $encodeType;
            $this->getBarcodeGeneratorDto()->base64CodeText = $codeText;
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function obtainDto(...$args): BarcodeGeneratorDTO
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->BarcodeGenerator_ctor($args[0]);
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    public function initFieldsFromDto(): void
    {
        $this->parameters = new BaseGenerationParameters($this->getBarcodeGeneratorDto()->parameters);
    }

    /**
     * Generation parameters.
     * @return BaseGenerationParameters
     */
    public function getParameters(): BaseGenerationParameters
    {
        return $this->parameters;
    }

    /**
     * Barcode symbology type.
     */
    public function getBarcodeType(): int
    {
        try
        {
            return $this->getBarcodeGeneratorDto()->barcodeType;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Barcode symbology type.
     */
    public function setBarcodeType(int $value): void
    {
        try
        {
            $this->getBarcodeGeneratorDto()->barcodeType = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Generate the barcode image under current settings.
     * This sample shows how to create and save a barcode image.
     *
     * @return resource|false GD image resource or false on failure.
     *
     * @code
     *  $generator = new BarCodeGenerator(EncodeTypes::CODE_128);
     *  $image = $generator->generateBarCodeGDImage();
     * @endcode
     *
     * @throws BarcodeException
     */
    public function generateBarCodeGDImage()
    {
        try
        {
            if (!extension_loaded('gd'))
                throw new BarcodeException("GD extension is not available!", __FILE__, __LINE__);
            $base64Image = $this->generateBarCodeImage(BarCodeImageFormat::PNG);
            return imagecreatefromstring(base64_decode($base64Image));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Generate the barcode image under current settings.
     * This sample shows how to create and save a barcode image.
     *
     * @param int $format value of BarCodeImageFormat (PNG, BMP, JPEG, GIF, EMF)
     * @return string base64 representation of image.
     *
     * @code
     *  $generator = new BarCodeGenerator(EncodeTypes::CODE_128);
     *  $image = $generator->generateBarCodeImage(BarCodeImageFormat::PNG);
     * @endcode
     *
     * @throws BarcodeException
     */
    public function generateBarCodeImage(int $format, bool $passLicense = false): string
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            // Deciding if the license should be used
            $licenseContent = $passLicense ? License::getLicenseContent() : null;
            // Passing the license or null
            $base64Image = $client->BarcodeGenerator_generateBarCodeImage($this->getBarcodeGeneratorDto(), $format, $licenseContent);
            $thriftConnection->closeConnection();
            return $base64Image;
        }
        catch (BarcodeExceptionDTO $be)
        {
            $msg = $be->message ?? '(no message)';
            $pos = $be->position ?? '';
            $kind = $be->kind ?? '';
            // pass a clear message up so it gets into your report
            throw new \Exception("Java error" .
                ($kind !== null ? " [$kind]" : "") .
                ": $msg\n$pos");
        }
        catch (Exception $exc)
        {
            throw new BarcodeException($exc->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Save barcode image to specific file in specific format.
     * @param string $filePath Path to save to.
     * @param int $format value of BarCodeImageFormat (PNG, BMP, JPEG, GIF, EMF)
     *
     * @code
     *  $generator = new BarCodeGenerator(EncodeTypes::CODE_128);
     *  $generator->save(file_path, BarCodeImageFormat::PNG);
     * @endcode
     * @throws BarcodeException
     */
    public function save(string $filePath, int $format): void
    {
        try
        {
            $image = $this->generateBarCodeImage($format);
            file_put_contents($filePath, base64_decode($image));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Text to be encoded.
     */
    public function getCodeText(): string
    {
        try
        {
            return $this->getBarcodeGeneratorDto()->base64CodeText;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     *  <p>
     *  Encodes the Unicode {@code <b>codeText</b>} into a byte sequence using the specified {@code <b>encoding</b>}.
     *  UTF-8 is the most commonly used encoding.
     *  If the encoding supports it and {@code <b>insertBOM</b>} is set to {@code true}, the function includes a
     *  {@code <a href="https://en.wikipedia.org/wiki/Byte_order_mark#Byte-order_marks_by_encoding">byte order mark (BOM)</a>}.
     *  </p>
     *  <p>
     *  This function is intended for use with 2D barcodes only (e.g., Aztec, QR, DataMatrix, PDF417, MaxiCode, DotCode, HanXin, RectMicroQR, etc.).
     *  It enables manual encoding of Unicode text using national or special encodings; however, this method is considered obsolete in modern applications.
     *  For modern use cases, {@code <a href="https://en.wikipedia.org/wiki/Extended_Channel_Interpretation">ECI</a>} encoding is recommended for Unicode data.
     *  </p>
     *  <p>
     *  Using this function with 1D barcodes, GS1-compliant barcodes (including 2D), or HIBC barcodes (including 2D) is not supported by the corresponding barcode standards and may lead to unpredictable results.
     *  </p>
     *  </p><p><hr><blockquote><pre>
     *  <p>This example shows how to use {@code SetCodeText} with or without a BOM for 2D barcodes.</p>
     *  <pre>
     *    //Encode codetext using UTF-8 with BOM
     *    $gen = new BarcodeGenerator(EncodeTypes::QR, null);
     *  $gen->setCodeText("車種名", "UTF-8", true);
     *    $gen->save("barcode.png", BarCodeImageFormat::PNG);
     *
     *    $reader = new BarCodeReader("barcode.png", null, DecodeType::QR);
     *    $results = $reader->readBarCodes();
     *    for($i = 0; $i < sizeof($results); $i++)
     *    {
     *        $result = $results[$i];
     *        echo ("BarCode CodeText: " . $result->getCodeText());
     *  }
     *    //Encode codetext using UTF-8 without BOM
     *    $gen = new BarcodeGenerator(EncodeTypes::QR, null);
     *  $gen->setCodeText("車種名", "UTF-8", false);
     *    $gen->save("barcode.png", BarCodeImageFormat::PNG);
     *    $reader = new BarCodeReader("barcode.png", null, DecodeType.QR);
     *  $results = $reader->readBarCodes();
     *  for($i = 0; $i < sizeof($results); $i++)
     *  {
     *      $result = $results[$i];
     *      echo ("BarCode CodeText: " . $result->getCodeText());
     *  }
     *    </pre>
     *  </pre></blockquote></hr></p>
     * @param codeText CodeText string
     * @param encoding Applied encoding
     * @param insertBOM
     *  Indicates whether to insert a byte order mark (BOM) when the specified encoding supports it (e.g., UTF-8, UTF-16, UTF-32).
     *  If set to {@code true}, the BOM is added; if {@code false}, the BOM is omitted even if the encoding normally uses one.
     *
     */
    public function setCodeText($codeText, ?string $encoding = null, ?bool $insertBOM = false): void
    {
        try
        {
            if (is_array($codeText))
            {
                $this->getBarcodeGeneratorDto()->base64CodeText = (base64_encode(pack("C*", ...$codeText)));
                $this->getBarcodeGeneratorDto()->codeTextType = Base64CodeTextType::BYTE;
            } else
            {
                $this->getBarcodeGeneratorDto()->base64CodeText = $codeText;
                $this->getBarcodeGeneratorDto()->codeTextType = Base64CodeTextType::STRING;
                if (!is_null($encoding) && strlen($encoding) > 0)
                    $this->getBarcodeGeneratorDto()->encoding = $encoding;
                $this->getBarcodeGeneratorDto()->insertBOM = $insertBOM;
            }
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Exports BarCode properties to the xml-file specified
     * @param string $xmlFile The path to xml file
     * @return bool Whether or not export completed successfully.
     * Returns True in case of success; False Otherwise
     */
    public function exportToXml(string $xmlFile): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            //TODO BARCODEPHP-677 Implement the passing of license file content from PHP to Java
            $xmlData = $client->BarcodeGenerator_exportToXml($this->barcodeGeneratorDto);
            $thriftConnection->closeConnection();
            $isContentExported = $xmlData != null;
            if ($isContentExported)
            {
                file_put_contents($xmlFile, $xmlData);
            }
            return $isContentExported;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Import BarCode properties from xml file
     * @param string $resource The name of the xml file or path to http resource
     * @return \Aspose\Barcode\Recognition\BarCodeReader
     * @throws BarcodeException
     */
    public static function importFromXml($resource): BarcodeGenerator
    {
        try
        {
            if (CommonUtility::isPath($resource))
            {
                $resource = fopen($resource, "r");
            }
            $xmlData = (stream_get_contents($resource));
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();

            $barCodeGeneratorDto = $client->BarcodeGenerator_importFromXml($xmlData);
            $thriftConnection->closeConnection();

            return BarcodeGenerator::construct($barCodeGeneratorDto);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function construct(BarcodeGeneratorDTO $barCodeGeneratorDto): BarcodeGenerator
    {
        $barCodeGenerator = new BarcodeGenerator(0, null);
        $barCodeGenerator->setBarcodeGeneratorDto($barCodeGeneratorDto);
        $barCodeGenerator->initFieldsFromDto();
        return $barCodeGenerator;
    }
}