<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Generation\AustralianPostParameters;
use Aspose\Barcode\Generation\AztecParameters;
use Aspose\Barcode\Bridge\BarcodeParametersDTO;
use Aspose\Barcode\Generation\CodabarParameters;
use Aspose\Barcode\Generation\CodablockParameters;
use Aspose\Barcode\Generation\Code128Parameters;
use Aspose\Barcode\Generation\Code16KParameters;
use Aspose\Barcode\Generation\CodetextParameters;
use Aspose\Barcode\Generation\CouponParameters;
use Aspose\Barcode\Generation\DataBarParameters;
use Aspose\Barcode\Generation\DataMatrixParameters;
use Aspose\Barcode\Generation\DotCodeParameters;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Generation\GS1CompositeBarParameters;
use Aspose\Barcode\Generation\HanXinParameters;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Generation\ITFParameters;
use Aspose\Barcode\Generation\MaxiCodeParameters;
use Aspose\Barcode\Generation\Padding;
use Aspose\Barcode\Generation\PatchCodeParameters;
use Aspose\Barcode\Generation\Pdf417Parameters;
use Aspose\Barcode\Generation\PostalParameters;
use Aspose\Barcode\Generation\QrParameters;
use Aspose\Barcode\Generation\SupplementParameters;
use Aspose\Barcode\Generation\Unit;

/**
 * Barcode generation parameters.
 */
class BarcodeParameters implements Communicator
{
    private $barcodeParametersDto;

    function getBarcodeParametersDto(): BarcodeParametersDTO
    {
        return $this->barcodeParametersDto;
    }

    private function setBarcodeParametersDto(BarcodeParametersDTO $barcodeParametersDto): void
    {
        $this->barcodeParametersDto = $barcodeParametersDto;
    }

    private $xDimension;
    private $barHeight;
    private $codeTextParameters;
    private $postal;
    private $australianPost;
    private $codablock;
    private $dataBar;
    private $gs1CompositeBar;
    private $dataMatrix;
    private $code16K;
    private $itf;
    private $qr;
    private $pdf417;
    private $maxiCode;
    private $aztec;
    private $code128;
    private $codabar;
    private $coupon;
    private $hanXin;
    private $supplement;
    private $dotCode;
    private $padding;
    private $patchCode;
    private $barWidthReduction;

    function __construct(BarcodeParametersDTO $barcodeParametersDto)
    {
        $this->barcodeParametersDto = $barcodeParametersDto;
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
            $this->xDimension = new Unit($this->getBarcodeParametersDto()->xDimension);
            $this->barHeight = new Unit($this->getBarcodeParametersDto()->barHeight);
            $this->codeTextParameters = new CodetextParameters($this->getBarcodeParametersDto()->codeTextParameters);
            $this->postal = new PostalParameters($this->getBarcodeParametersDto()->postal);
            $this->australianPost = new AustralianPostParameters($this->getBarcodeParametersDto()->australianPost);
            $this->codablock = new CodablockParameters($this->getBarcodeParametersDto()->codablock);
            $this->dataBar = new DataBarParameters($this->getBarcodeParametersDto()->dataBar);
            $this->gs1CompositeBar = new GS1CompositeBarParameters($this->getBarcodeParametersDto()->gs1CompositeBar);
            $this->dataMatrix = new DataMatrixParameters($this->getBarcodeParametersDto()->dataMatrix);
            $this->code16K = new Code16KParameters($this->getBarcodeParametersDto()->code16K);
            $this->itf = new ITFParameters($this->getBarcodeParametersDto()->itf);
            $this->qr = new QrParameters($this->getBarcodeParametersDto()->qr);
            $this->pdf417 = new Pdf417Parameters($this->getBarcodeParametersDto()->pdf417);
            $this->maxiCode = new MaxiCodeParameters($this->getBarcodeParametersDto()->maxiCode);
            $this->aztec = new AztecParameters($this->getBarcodeParametersDto()->aztec);
            $this->code128 = new Code128Parameters($this->getBarcodeParametersDto()->code128);
            $this->codabar = new CodabarParameters($this->getBarcodeParametersDto()->codabar);
            $this->coupon = new CouponParameters($this->getBarcodeParametersDto()->coupon);
            $this->hanXin = new HanXinParameters($this->getBarcodeParametersDto()->hanXin);
            $this->supplement = new SupplementParameters($this->getBarcodeParametersDto()->supplement);
            $this->dotCode = new DotCodeParameters($this->getBarcodeParametersDto()->dotCode);
            $this->padding = new Padding($this->getBarcodeParametersDto()->padding);
            $this->patchCode = new PatchCodeParameters($this->getBarcodeParametersDto()->patchCode);
            $this->barWidthReduction = new Unit($this->getBarcodeParametersDto()->barWidthReduction);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * PatchCode parameters.
     */
    public function getPatchCode(): PatchCodeParameters
    {
        return $this->patchCode;
    }

    /**
     * PatchCode parameters.
     */
    private function setPatchCode(PatchCodeParameters $value)
    {
        try
        {
            $this->patchCode = $value;
            $this->getBarcodeParametersDto()->patchCode = $value->getPatchCodeParametersDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * x-dimension is the smallest width of the unit of BarCode bars or spaces.
     * Increase this will increase the whole barcode image width.
     * Ignored if AutoSizeMode property is set to AutoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     */
    public function getXDimension(): Unit
    {
        try
        {
            return $this->xDimension;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * x-dimension is the smallest width of the unit of BarCode bars or spaces.
     * Increase this will increase the whole barcode image width.
     * Ignored if AutoSizeMode property is set to AutoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     *
     * @throws BarcodeException
     */
    public function setXDimension(Unit $value): void
    {
        try
        {
            $this->getBarcodeParametersDto()->xDimension = $value->getUnitDto();
            $this->xDimension = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Get bars reduction value that is used to compensate ink spread while printing.
     * @return Unit value of BarWidthReduction
     */
    public function getBarWidthReduction(): Unit
    {
        try
        {
            return $this->barWidthReduction;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets bars reduction value that is used to compensate ink spread while printing.
     */
    public function setBarWidthReduction(Unit $value): void
    {
        try
        {
            $this->getBarcodeParametersDto()->barWidthReduction = $value->getUnitDto();
            $this->barWidthReduction = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height of 1D barcodes' bars in Unit value.
     * Ignored if AutoSizeMode property is set to AutoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     */
    public function getBarHeight(): Unit
    {
        return $this->barHeight;
    }

    /**
     * Height of 1D barcodes' bars in Unit value.
     * Ignored if AutoSizeMode property is set to utoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     *
     * @throws BarcodeException
     */
    public function setBarHeight(Unit $value): void
    {
        try
        {
            $this->getBarcodeParametersDto()->barHeight = $value->getUnitDto();
            $this->barHeight = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Bars color.
     * Default value: #000000
     */
    public function getBarColor(): string
    {
        try
        {
            $hexColor = strtoupper(dechex($this->getBarcodeParametersDto()->barColor));
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
     * Bars color.
     * Default value: #000000.
     */
    public function setBarColor(string $value): void
    {
        try
        {
            if (substr($value, 0, 1) == '#')
                $value = substr($value, 1, strlen($value) - 1);
            $this->getBarcodeParametersDto()->barColor = (hexdec($value));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Barcode paddings.
     * Default value: 5pt 5pt 5pt 5pt.
     */
    public function getPadding(): Padding
    {
        try
        {
            return $this->padding;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Barcode paddings.
     * Default value: 5pt 5pt 5pt 5pt.
     */
    function setPadding(Padding $value): void
    {
        try
        {
            $this->getBarcodeParametersDto()->padding = $value->getPaddingDto();
            $this->padding = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Always display checksum digit in the human readable text for Code128 and GS1Code128 barcodes.
     */
    public function getChecksumAlwaysShow(): bool
    {
        try
        {
            return $this->getBarcodeParametersDto()->checksumAlwaysShow;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Always display checksum digit in the human readable text for Code128 and GS1Code128 barcodes.
     */
    public function setChecksumAlwaysShow(bool $checksumAlwaysShow): void
    {
        try
        {
            $this->getBarcodeParametersDto()->checksumAlwaysShow = $checksumAlwaysShow;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Enable checksum during generation 1D barcodes.
     * Default is treated as Yes for symbology which must contain checksum, as No where checksum only possible.
     * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN, Codabar
     * Checksum always used: Rest symbology
     */

    public function isChecksumEnabled(): int
    {
        try
        {
            return $this->getBarcodeParametersDto()->isChecksumEnabled;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Enable checksum during generation 1D barcodes.
     * Default is treated as Yes for symbology which must contain checksum, as No where checksum only possible.
     * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN, Codabar
     * Checksum always used: Rest symbology
     */
    public function setChecksumEnabled(int $value): void
    {
        try
        {
            $this->getBarcodeParametersDto()->isChecksumEnabled = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Indicates whether explains the character "\" as an escape character in CodeText property. Used for Pdf417, DataMatrix, Code128 only
     * If the EnableEscape is true, "\" will be explained as a special escape character. Otherwise, "\" acts as normal characters.
     * Aspose.BarCode supports inputing decimal ascii code and mnemonic for ASCII control-code characters. For example, \013 and \\CR stands for CR.
     */
    public function getEnableEscape(): bool
    {
        try
        {
            return $this->getBarcodeParametersDto()->enableEscape;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Indicates whether explains the character "\" as an escape character in CodeText property. Used for Pdf417, DataMatrix, Code128 only
     * If the EnableEscape is true, "\" will be explained as a special escape character. Otherwise, "\" acts as normal characters.
     *<hr>Aspose.BarCode supports inputing decimal ascii code and mnemonic for ASCII control-code characters. For example, \013 and \\CR stands for CR.</hr>
     */
    public function setEnableEscape(bool $value): void
    {
        try
        {
            $this->getBarcodeParametersDto()->enableEscape = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Wide bars to Narrow bars ratio.
     * Default value: 3, that is, wide bars are 3 times as wide as narrow bars.
     * Used for ITF, PZN, PharmaCode, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, IATA2of5, VIN, DeutschePost, OPC, Code32, DataLogic2of5, PatchCode, Code39Extended, Code39Standard
     *
     * @exception IllegalArgumentException
     * The WideNarrowRatio parameter value is less than or equal to 0.
     */
    public function getWideNarrowRatio(): float
    {
        try
        {
            return $this->getBarcodeParametersDto()->wideNarrowRatio;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Wide bars to Narrow bars ratio.
     * Default value: 3, that is, wide bars are 3 times as wide as narrow bars.
     * Used for ITF, PZN, PharmaCode, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, IATA2of5, VIN, DeutschePost, OPC, Code32, DataLogic2of5, PatchCode, Code39Extended, Code39Standard
     *
     * @exception IllegalArgumentException
     * @param float $value The WideNarrowRatio parameter value is less than or equal to 0.
     */
    public function setWideNarrowRatio(float $value): void
    {
        try
        {
            $this->getBarcodeParametersDto()->wideNarrowRatio = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Codetext parameters.
     */
    public function getCodeTextParameters(): CodetextParameters
    {
        try
        {
            return $this->codeTextParameters;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *
     * Only for 1D barcodes.
     * @return bool Gets a value indicating whether bars filled.
     * @throws BarcodeException
     */
    public function getFilledBars(): bool
    {
        try
        {
            return $this->getBarcodeParametersDto()->filledBars;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets a value indicating whether bars filled.
     * Only for 1D barcodes.
     * @param bool $value Sets a value indicating whether bars filled.
     * @throws BarcodeException
     */
    public function setFilledBars(bool $value): void
    {
        try
        {
            $this->getBarcodeParametersDto()->filledBars = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Postal parameters. Used for Postnet, Planet.
     */
    public function getPostal(): PostalParameters
    {
        try
        {
            return $this->postal;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * AustralianPost barcode parameters.
     */
    public function getAustralianPost(): AustralianPostParameters
    {
        try
        {
            return $this->australianPost;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Databar parameters.
     */
    public function getDataBar(): DataBarParameters
    {
        try
        {
            return $this->dataBar;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * GS1 Composite Bar parameters.
     *
     * This sample shows how to create and save a GS1 Composite Bar image.
     * Note that 1D codetext and 2D codetext are separated by symbol '/'
     *
     * $codetext = "(01)03212345678906/(21)A1B2C3D4E5F6G7H8";
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_COMPOSITE_BAR, $codetext);
     *
     * $generator->getParameters()->getBarcode()->getGS1CompositeBar()->setLinearComponentType(EncodeTypes::GS_1_CODE_128);
     * $generator->getParameters()->getBarcode()->getGS1CompositeBar()->setTwoDComponentType(TwoDComponentType::CC_A);
     *
     * // Aspect ratio of 2D component
     * $generator->getParameters()->getBarcode()->getPdf417()->setAspectRatio(3);
     *
     * // X-Dimension of 1D and 2D components
     * $generator->getParameters()->getBarcode()->getXDimension()->setPixels(3);
     * ///
     * // Height of 1D component
     * $generator->getParameters()->getBarcode()->getBarHeight()->setPixels(100);
     * ///
     * $generator->save("test.png", BarcodeImageFormat::PNG);
     *
     * @return GS1CompositeBarParameters GS1 Composite Bar parameters.
     */
    public function getGS1CompositeBar(): GS1CompositeBarParameters
    {
        return $this->gs1CompositeBar;
    }

    /**
     * GS1 Composite Bar parameters.
     *
     * This sample shows how to create and save a GS1 Composite Bar image.
     * Note that 1D codetext and 2D codetext are separated by symbol '/'
     *
     * $codetext = "(01)03212345678906/(21)A1B2C3D4E5F6G7H8";
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_COMPOSITE_BAR, $codetext);
     *
     * $generator->getParameters()->getBarcode()->getGS1CompositeBar()->setLinearComponentType(EncodeTypes::GS_1_CODE_128);
     * $generator->getParameters()->getBarcode()->getGS1CompositeBar()->setTwoDComponentType(TwoDComponentType::CC_A);
     *
     * // Aspect ratio of 2D component
     * $generator->getParameters()->getBarcode()->getPdf417()->setAspectRatio(3);
     *
     * // X-Dimension of 1D and 2D components
     * $generator->getParameters()->getBarcode()->getXDimension()->setPixels(3);
     * ///
     * // Height of 1D component
     * $generator->getParameters()->getBarcode()->getBarHeight()->setPixels(100);
     * ///
     * $generator->save("test.png", BarcodeImageFormat::PNG);
     */
    public function setGS1CompositeBar(GS1CompositeBarParameters $value): void
    {
        $this->gs1CompositeBar = $value;
        $this->getBarcodeParametersDto()->gs1CompositeBar = $value->getGS1CompositeBarParametersDto();
    }

    /**
     * Codablock parameters.
     */
    public function getCodablock(): CodablockParameters
    {
        try
        {
            return $this->codablock;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * DataMatrix parameters.
     */
    public function getDataMatrix(): DataMatrixParameters
    {
        try
        {
            return $this->dataMatrix;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Code16K parameters.
     */
    public function getCode16K(): Code16KParameters
    {
        try
        {
            return $this->code16K;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * DotCode parameters.
     */
    public function getDotCode(): DotCodeParameters
    {
        try
        {
            return $this->dotCode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * ITF parameters.
     */
    public function getITF(): ITFParameters
    {
        try
        {
            return $this->itf;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * PDF417 parameters.
     */
    public function getPdf417(): Pdf417Parameters
    {
        try
        {
            return $this->pdf417;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR parameters.
     */
    public function getQR(): QrParameters
    {
        try
        {
            return $this->qr;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Supplement parameters. Used for Interleaved2of5, Standard2of5, EAN13, EAN8, UPCA, UPCE, ISBN, ISSN, ISMN.
     */
    public function getSupplement(): SupplementParameters
    {
        try
        {
            return $this->supplement;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * MaxiCode parameters.
     */
    public function getMaxiCode(): MaxiCodeParameters
    {
        try
        {
            return $this->maxiCode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Aztec parameters.
     */
    public function getAztec(): AztecParameters
    {
        try
        {
            return $this->aztec;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Code128 parameters.
     * </p>
     */
    public function getCode128(): Code128Parameters
    {
        return $this->code128;
    }

    /**
     * Codabar parameters.
     */
    public function getCodabar(): CodabarParameters
    {
        try
        {
            return $this->codabar;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Coupon parameters. Used for UpcaGs1DatabarCoupon, UpcaGs1Code128Coupon.
     */
    public function getCoupon(): CouponParameters
    {
        try
        {
            return $this->coupon;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * HanXin parameters.
     */
    public function getHanXin(): HanXinParameters
    {
        return $this->hanXin;
    }
}