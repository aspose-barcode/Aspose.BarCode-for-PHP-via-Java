<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Generation\BarcodeParameters;
use Aspose\Barcode\Generation\BorderParameters;
use Aspose\Barcode\Bridge\BaseGenerationParametersDTO;
use Aspose\Barcode\Generation\CaptionParameters;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Generation\ImageParameters;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;
use Aspose\Barcode\Generation\Unit;

/**
 * Barcode image generation parameters.
 */
class BaseGenerationParameters implements Communicator
{
    private $baseGenerationParametersDto;

    private function getBaseGenerationParametersDto(): BaseGenerationParametersDTO
    {
        return $this->baseGenerationParametersDto;
    }

    private function setBaseGenerationParametersDto(BaseGenerationParametersDTO $baseGenerationParametersDto): void
    {
        $this->baseGenerationParametersDto = $baseGenerationParametersDto;
    }

    private $captionAbove;
    private $captionBelow;
    private $barcodeParameters;
    private $borderParameters;
    private $image;

    private $imageWidth;
    private $imageHeight;

    function __construct(BaseGenerationParametersDTO $baseGenerationParametersDto)
    {
        $this->baseGenerationParametersDto = $baseGenerationParametersDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
        try
        {
            $this->captionAbove = new CaptionParameters($this->getBaseGenerationParametersDto()->captionAbove);
            $this->captionBelow = new CaptionParameters($this->getBaseGenerationParametersDto()->captionBelow);
            $this->barcodeParameters = new BarcodeParameters($this->getBaseGenerationParametersDto()->barcode);
            $this->borderParameters = new BorderParameters($this->getBaseGenerationParametersDto()->border);
            $this->imageWidth = new Unit($this->getBaseGenerationParametersDto()->imageWidth);
            $this->imageHeight = new Unit($this->getBaseGenerationParametersDto()->imageHeight);
            $this->image = new ImageParameters($this->getBaseGenerationParametersDto()->image);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Gets a value indicating whether is used anti-aliasing mode to render image
     * </p>
     */
    public function getUseAntiAlias(): bool
    {
        return $this->getBaseGenerationParametersDto()->useAntiAlias;
    }

    /**
     * <p>
     * Sets a value indicating whether is used anti-aliasing mode to render image
     * </p>
     */
    public function setUseAntiAlias(bool $value): void
    {
        $this->getBaseGenerationParametersDto()->useAntiAlias = $value;
    }

    /**
     * Background color of the barcode image.
     * Default value: #FFFFFF
     * @return string value of background color.
     */
    public function getBackColor(): string
    {
        try
        {
            $hexColor = strtoupper(dechex($this->getBaseGenerationParametersDto()->backColor));
            while (strlen($hexColor) < 6)
            {
                $hexColor = "0" . $hexColor;
            }
            $hexColor = "#" . $hexColor;
            return $hexColor;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Background color of the barcode image.
     * Default value: #FFFFFF
     * @param string $hexValue value of background color.
     * @throws BarcodeException
     */
    public function setBackColor(string $hexValue): void
    {
        try
        {
            if ($hexValue[0] == '#')
                $hexValue = substr($hexValue, 1, strlen($hexValue) - 1);
            $this->getBaseGenerationParametersDto()->backColor = hexdec($hexValue);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the resolution of the BarCode image.
     * One value for both dimensions.
     * Default value: 96 dpi.
     * @return float The Resolution parameter value is less than or equal to 0.
     * @throws BarcodeException
     */
    public function getResolution(): float
    {
        try
        {
            return $this->getBaseGenerationParametersDto()->resolution;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the resolution of the BarCode image.
     * One value for both dimensions.
     * Default value: 96 dpi.
     * @param float $value The Resolution parameter value is less than or equal to 0.
     * @throws BarcodeException
     */
    public function setResolution(float $value): void
    {
        try
        {
            $this->updateResolution($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private function updateResolution(float $newResolution)
    {
        $this->getBaseGenerationParametersDto()->resolution = $newResolution;

        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $resolutionUpdatedParametersDto = $client->BaseGenerationParameters_updateResolution($this->getBaseGenerationParametersDto(), $newResolution);
        $thriftConnection->closeConnection();


        $this->getBaseGenerationParametersDto()->captionAbove = $resolutionUpdatedParametersDto->captionAbove;
        $this->getBaseGenerationParametersDto()->captionBelow = $resolutionUpdatedParametersDto->captionBelow;
        $this->getBaseGenerationParametersDto()->barcode = $resolutionUpdatedParametersDto->barcode;
        $this->getBaseGenerationParametersDto()->border = $resolutionUpdatedParametersDto->border;
        $this->getBaseGenerationParametersDto()->imageWidth = $resolutionUpdatedParametersDto->imageWidth;
        $this->getBaseGenerationParametersDto()->imageHeight = $resolutionUpdatedParametersDto->imageHeight;
        $this->getBaseGenerationParametersDto()->image = $resolutionUpdatedParametersDto->image;

        $this->initFieldsFromDto();
    }

    /**
     * Image parameters. See <see cref="ImageParameters"/>.
     * @return
     */
    public function getImage(): ImageParameters
    {
        return $this->image;
    }

    /**
     *  BarCode image rotation angle, measured in degree, e.g. RotationAngle = 0 or RotationAngle = 360 means no rotation.
     *  If RotationAngle NOT equal to 90, 180, 270 or 0, it may increase the difficulty for the scanner to read the image.
     *  Default value: 0.
     *
     *  This sample shows how to create and save a BarCode image.
     * @code
     *     $generator = new BarcodeGenerator( EncodeTypes::DATA_MATRIX);
     *     $generator->getParameters()->setRotationAngle(7);
     *     $generator->save("test.png", BarcodeImageFormat::PNG);
     * @endcode
     */
    public function getRotationAngle(): float
    {
        try
        {
            return $this->getBaseGenerationParametersDto()->rotationAngle;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  BarCode image rotation angle, measured in degree, e.g. RotationAngle = 0 or RotationAngle = 360 means no rotation.
     *  If RotationAngle NOT equal to 90, 180, 270 or 0, it may increase the difficulty for the scanner to read the image.
     *  Default value: 0.
     *
     *  This sample shows how to create and save a BarCode image.
     * @code
     *     $generator = new BarcodeGenerator( EncodeTypes::DATA_MATRIX);
     *     $generator->getParameters()->setRotationAngle(7);
     *     $generator->save("test.png", BarcodeImageFormat::PNG);
     * @endcode
     */
    public function setRotationAngle(float $value): void
    {
        try
        {
            $this->getBaseGenerationParametersDto()->rotationAngle = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption Above the BarCode image.
     * @see CaptionParameters.
     */
    public function getCaptionAbove(): CaptionParameters
    {
        try
        {
            return $this->captionAbove;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption Above the BarCode image.
     * @see CaptionParameters.
     */
    public function setCaptionAbove(CaptionParameters $value): void
    {
        try
        {
            $this->getBaseGenerationParametersDto()->captionAbove = $value->getCaptionParametersDto();
            $this->captionAbove->updateCaption($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption Below the BarCode image.
     * @see CaptionParameters.
     */
    public function getCaptionBelow(): CaptionParameters
    {
        try
        {
            return $this->captionBelow;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption Below the BarCode image.
     * @see CaptionParameters.
     */
    function setCaptionBelow(CaptionParameters $value): void
    {
        try
        {
            $this->getBaseGenerationParametersDto()->captionBelow = $value->getCaptionParametersDto();
            $this->captionBelow->updateCaption($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specifies the different types of automatic sizing modes.
     * Default value: AutoSizeMode::NONE.
     */
    public function getAutoSizeMode(): int
    {
        try
        {
            return $this->getBaseGenerationParametersDto()->autoSizeMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specifies the different types of automatic sizing modes.
     * Default value: AutoSizeMode::NONE.
     */
    public function setAutoSizeMode(int $value)
    {
        try
        {
            $this->getBaseGenerationParametersDto()->autoSizeMode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * BarCode image height when AutoSizeMode property is set to AutoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     */
    public function getImageHeight(): Unit
    {
        return $this->imageHeight;
    }

    /**
     * BarCode image height when AutoSizeMode property is set to AutoSizeMode.NEAREST or AutoSizeMode::INTERPOLATION.
     */
    public function setImageHeight(Unit $value): void
    {
        try
        {
            $this->getBaseGenerationParametersDto()->imageHeight = $value->getUnitDto();
            $this->imageHeight = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * BarCode image width when AutoSizeMode property is set to AutoSizeMode.NEAREST or AutoSizeMode::INTERPOLATION.
     */
    public function getImageWidth(): Unit
    {
        return $this->imageWidth;
    }

    /**
     * BarCode image width when AutoSizeMode property is set to AutoSizeMode.NEAREST or AutoSizeMode::INTERPOLATION.
     */
    public function setImageWidth(Unit $value)
    {
        $this->getBaseGenerationParametersDto()->imageWidth = $value->getUnitDto();
        $this->imageWidth = $value;
    }

    /**
     * Gets the BarcodeParameters that contains all barcode properties.
     */
    public function getBarcode(): BarcodeParameters
    {
        try
        {
            return $this->barcodeParameters;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the BarcodeParameters that contains all barcode properties.
     */
    function setBarcode(BarcodeParameters $value): void
    {
        try
        {
            $this->getBaseGenerationParametersDto()->barcode = $value->getBarcodeParametersDto();
            $this->barcodeParameters = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the BorderParameters that contains all configuration properties for barcode border.
     */
    public function getBorder(): BorderParameters
    {
        try
        {
            return $this->borderParameters;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}