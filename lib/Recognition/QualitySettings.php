<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\QualitySettingsDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * QualitySettings allows to configure recognition quality and speed manually.
 * You can quickly set up QualitySettings by embedded presets: HighPerformance, NormalQuality,
 * HighQuality, MaxBarCodes or you can manually configure separate options.
 * Default value of QualitySettings is NormalQuality.
 *
 * This sample shows how to use QualitySettings with BarCodeReader
 * @code
 * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //set high performance mode
 * $reader->setQualitySettings(QualitySettings::getHighPerformance());
 * foreach($reader->readBarCodes() as $result)
 *    print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png",  null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //normal quality mode is set by default
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png",  null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //set high quality mode with low speed recognition
 * $reader->setQualitySettings(QualitySettings::getHighQuality());
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png",  null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //set max barcodes mode, which tries to find all possible barcodes, even incorrect. The slowest recognition mode
 * $reader->setQualitySettings(QualitySettings::getMaxBarCodes());
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png",  null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //set high performance mode
 * $reader->setQualitySettings(QualitySettings::getHighPerformance());
 * //set separate options
 * foreach($reader->readBarCodes() as $result)
 *       print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png",  null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //default mode is NormalQuality
 * //set separate options
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * @endcode
 */
final class QualitySettings implements Communicator
{
    private QualitySettingsDTO $qualitySettingsDTO;

    /**
     * @return QualitySettingsDTO instance
     */
    function getQualitySettingsDTO(): QualitySettingsDTO
    {
        return $this->qualitySettingsDTO;
    }

    /**
     * @param $qualitySettingsDTO QualitySettingsDTO instance
     */
    private function setQualitySettingsDTO(QualitySettingsDTO $qualitySettingsDTO): void
    {
        $this->qualitySettingsDTO = $qualitySettingsDTO;
        $this->initFieldsFromDto();
    }

    function __construct(QualitySettingsDTO $qualitySettingsDTO)
    {
        $this->qualitySettingsDTO = $qualitySettingsDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * HighPerformance recognition quality preset. High quality barcodes are recognized well in this mode.
     *
     * @code
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     * @return QualitySettings HighPerformance recognition quality preset.
     * @endcode
     * @throws BarcodeException
     */
    public static function getHighPerformance(): QualitySettings
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $qualitySettingsDTO = $client->QualitySettings_getHighPerformance();
            $thriftConnection->closeConnection();
            return new QualitySettings($qualitySettingsDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * NormalQuality recognition quality preset. Suitable for the most of barcodes
     *
     * @code
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getNormalQuality());
     * @endcode
     *
     * @return QualitySettings NormalQuality recognition quality preset.
     * @throws BarcodeException
     */
    public static function getNormalQuality(): QualitySettings
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $qualitySettingsDTO = $client->QualitySettings_getNormalQuality();
            $thriftConnection->closeConnection();
            return new QualitySettings($qualitySettingsDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * HighQuality recognition quality preset. This preset is developed for low quality barcodes.
     *
     * @code
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getHighQuality());
     * @endcode
     * @return QualitySettings HighQuality recognition quality preset.
     * @throws BarcodeException
     */
    public static function getHighQuality(): QualitySettings
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $qualitySettingsDTO = $client->QualitySettings_getHighQuality();
            $thriftConnection->closeConnection();
            return new QualitySettings($qualitySettingsDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     *  MaxQuality recognition quality preset. This preset is developed to recognize all possible barcodes, even incorrect barcodes.
     *  </p><p><hr><blockquote><pre>
     *  This sample shows how to use MaxQuality mode
     *  <pre>
     *
     *  $reader = new BarCodeReader("test.png"null, null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
     *  {
     *      $reader->setQualitySettings(QualitySettings::getMaxQuality());
     *      foreach($reader->readBarCodes() as $result)
     *          echo ($result->getCodeText());
     *  }
     *    </pre>
     *  </pre></blockquote></hr></p>Value:
     *  MaxQuality recognition quality preset.
     *
     */
    public static function getMaxQuality(): QualitySettings
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $qualitySettingsDTO = $client->QualitySettings_getMaxQuality();
            $thriftConnection->closeConnection();
            return new QualitySettings($qualitySettingsDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Recognition mode which sets size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     * @return int : size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     */
    public function getXDimension(): int
    {
        return $this->qualitySettingsDTO->xDimension;
    }

    /**
     * Recognition mode which sets size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     * @param int : size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     */
    public function setXDimension(int $value): void
    {
        $this->qualitySettingsDTO->xDimension = $value;
    }

    /**
     * Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     * @return float : Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     */
    public function getMinimalXDimension(): float
    {
        return $this->qualitySettingsDTO->minimalXDimension;
    }

    /**
     * Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     * @param $value : Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     */
    public function setMinimalXDimension(float $value): void
    {
        $this->qualitySettingsDTO->minimalXDimension = $value;
    }

    /**
     * <p>
     * Mode which enables methods to recognize barcode elements with the selected quality. Barcode element with lower quality requires more hard methods which slows the recognition.
     * @return int : Mode which enables methods to recognize barcode elements with the selected quality.
     */
    public function getBarcodeQuality(): int
    {
        return $this->qualitySettingsDTO->barcodeQuality;
    }

    /**
     * Mode which enables methods to recognize barcode elements with the selected quality. Barcode element with lower quality requires more hard methods which slows the recognition.
     * @param $value : Mode which enables methods to recognize barcode elements with the selected quality.
     */
    public function setBarcodeQuality(int $value): void
    {
        $this->qualitySettingsDTO->barcodeQuality = $value;
    }

    /**
     * <p>
     * Deconvolution (image restorations) mode which defines level of image degradation. Originally deconvolution is a function which can restore image degraded
     * (convoluted) by any natural function like blur, during obtaining image by camera. Because we cannot detect image function which corrupt the image,
     * we have to check most well know functions like sharp or mathematical morphology.
     * @return int : Deconvolution mode which defines level of image degradation.
     */
    public function getDeconvolution(): int
    {
        return $this->qualitySettingsDTO->deconvolution;
    }

    /**
     * Deconvolution (image restorations) mode which defines level of image degradation. Originally deconvolution is a function which can restore image degraded
     * (convoluted) by any natural function like blur, during obtaining image by camera. Because we cannot detect image function which corrupt the image,
     * we have to check most well know functions like sharp or mathematical morphology.
     * @param $value : Deconvolution mode which defines level of image degradation.
     */
    public function setDeconvolution(int $value): void
    {
        $this->qualitySettingsDTO->deconvolution = $value;
    }

    /**
     * Mode which enables or disables additional recognition of barcodes on images with inverted colors (luminance).
     * @return int : Additional recognition of barcodes on images with inverse colors
     */
    public function getInverseImage(): int
    {
        return $this->qualitySettingsDTO->inverseImage;
    }

    /**
     * Mode which enables or disables additional recognition of barcodes on images with inverted colors (luminance).
     * @param $value : Additional recognition of barcodes on images with inverse colors
     */
    public function setInverseImage(int $value): void
    {
        $this->qualitySettingsDTO->inverseImage = $value;
    }

    /**
     * <p>
     * Mode which enables or disables additional recognition of color barcodes on color images.
     * @return int : Additional recognition of color barcodes on color images.
     */
    public function getComplexBackground(): int
    {
        return $this->qualitySettingsDTO->complexBackground;
    }

    /**
     * Mode which enables or disables additional recognition of color barcodes on color images.
     * @param $value : Additional recognition of color barcodes on color images.
     */
    public function setComplexBackground(int $value): void
    {
        $this->qualitySettingsDTO->complexBackground = $value;
    }

    /**
     * Allows engine to recognize barcodes which has incorrect checksumm or incorrect values. Mode can be used to recognize damaged barcodes with incorrect text.
     * @return bool : Allows engine to recognize incorrect barcodes.
     */
    public function getAllowIncorrectBarcodes(): bool
    {
        return $this->qualitySettingsDTO->allowIncorrectBarcodes;
    }

    /**
     * Allows engine to recognize barcodes which has incorrect checksumm or incorrect values. Mode can be used to recognize damaged barcodes with incorrect text.
     * @param $value : Allows engine to recognize incorrect barcodes.
     */
    public function setAllowIncorrectBarcodes(bool $value): void
    {
        $this->qualitySettingsDTO->allowIncorrectBarcodes = $value;
    }
}