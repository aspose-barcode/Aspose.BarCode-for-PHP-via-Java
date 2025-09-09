<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Generation\BaseGenerationParameters;
use Aspose\Barcode\ComplexBarcode\IComplexCodetext;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\License;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 *  ComplexBarcodeGenerator for backend complex barcode (e.g. SwissQR) images generation.
 *
 *  This sample shows how to create and save a SwissQR image.
 * @code
 *    $swissQRCodetext = new SwissQRCodetext(null);
 *    $swissQRCodetext->getBill()->setAccount("Account");
 *    $swissQRCodetext->getBill()->setBillInformation("BillInformation");
 *    $cg = new ComplexBarcodeGenerator($swissQRCodetext);
 *    $res = $cg->generateBarCodeImage(BarcodeImageFormat::PNG);
 * @endcode
 */
final class ComplexBarcodeGenerator implements Communicator
{
    private $complexBarcodeGeneratorDto;

    /**
     * @return mixed
     */
    public function getComplexBarcodeGeneratorDto(): \Aspose\Barcode\Bridge\ComplexBarcodeGeneratorDTO
    {
        return $this->complexBarcodeGeneratorDto;
    }

    /**
     * @param mixed $complexBarcodeGeneratorDto
     */
    public function setComplexBarcodeGeneratorDto(\Aspose\Barcode\Bridge\ComplexBarcodeGeneratorDTO $complexBarcodeGeneratorDto): void
    {
        $this->complexBarcodeGeneratorDto = $complexBarcodeGeneratorDto;
    }

    private $parameters;
//    private $complexCodeText;


    /**
     * Creates an instance of ComplexBarcodeGenerator.
     *
     * @param IComplexCodetext $complexCodetext complexCodetext Complex codetext
     */
    public function __construct(IComplexCodetext $complexCodetext)
    {
        $this->setComplexBarcodeGeneratorDto($this->obtainDto($complexCodetext->getIComplexCodetextDTO()));
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args): \Aspose\Barcode\Bridge\ComplexBarcodeGeneratorDTO
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->ComplexBarcodeGenerator_ctor($args[0]);
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    public function initFieldsFromDto()
    {
        try
        {
//            $this->complexCodeText = $this->getComplexBarcodeGeneratorDto()->complexCodetextDTO;
            $this->parameters = new BaseGenerationParameters($this->getComplexBarcodeGeneratorDto()->parameters);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Generation parameters.
     */
    public function getParameters(): BaseGenerationParameters
    {
        return $this->parameters;
    }

    /**
     * Generates complex barcode image under current settings.
     * @param int format value of BarCodeImageFormat (PNG, BMP, JPEG, GIF)
     * @code
     *    $swissQRCodetext = new SwissQRCodetext(null);
     *    $swissQRCodetext->getBill()->setAccount("Account");
     *    $swissQRCodetext->getBill()->setBillInformation("BillInformation");
     *    $cg = new ComplexBarcodeGenerator($swissQRCodetext);
     *    $res = $cg->generateBarCodeImage(BarcodeImageFormat::PNG);
     * @endcode
     * @return string base64 representation of image.
     */
    public function generateBarcodeImage(int $format, bool $passLicense = false): string
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();

            // Deciding if the license should be used
            $licenseContent = $passLicense ? License::getLicenseContent() : null;
            // Passing the license or null
            $base64Image = $client->ComplexBarcodeGenerator_generateBarcodeImage($this->getComplexBarcodeGeneratorDto(), $format, $licenseContent);
            $thriftConnection->closeConnection();
            return $base64Image;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Save barcode image to specific file in specific format.
     * @param $filePath string Path to save to.
     * @param int format  value of BarCodeImageFormat (PNG, BMP, JPEG, GIF)
     * @code:
     *    $swissQRCodetext = new SwissQRCodetext(null);
     *    $swissQRCodetext->getBill()->setAccount("Account");
     *    $swissQRCodetext->getBill()->setBillInformation("BillInformation");
     *    $cg = new ComplexBarcodeGenerator($swissQRCodetext);
     *    $res = $cg->save("filePath.png", BarcodeImageFormat::PNG);
     * @endcode
     */
    public function save(string $filePath, int $format): void
    {
        try
        {
            $image = $this->generateBarcodeImage($format);
            file_put_contents($filePath, base64_decode($image));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}