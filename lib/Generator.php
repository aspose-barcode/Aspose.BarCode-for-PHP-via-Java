<?php
require_once('assist.php');

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
class BarcodeGenerator extends BaseJavaClass
{
    private $parameters;

    private const JAVA_CLASS_NAME = "com.aspose.mw.barcode.generation.MwBarcodeGenerator";

    /**
     * BarcodeGenerator constructor.
     * @param args can take following combinations of arguments:
     *    1) Barcode symbology type. Use EncodeTypes class to setup a symbology
     *    2) type EncodeTypes, Text to be encoded.
     * @code
     *   $barcodeGenerator = new BarcodeGenerator(EncodeTypes::EAN_14, "332211");
     * @endcode
     * @throws BarcodeException
     */
    public function __construct($encodeType, $codeText)
    {
        try
        {
            $java_class = new java(self::JAVA_CLASS_NAME, $encodeType, $codeText);
            parent::__construct($java_class);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    protected function init(): void
    {
        try
        {
            $this->parameters = new BaseGenerationParameters($this->getJavaClass()->getParameters());
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Generation parameters.
     * @return BaseGenerationParameters
     */
    public function getParameters(): BaseGenerationParameters
    {
        try
        {
            return $this->parameters;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }


    /**
     * Barcode symbology type.
     */
    public function getBarcodeType() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getBarcodeType(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Barcode symbology type.
     */
    public function setBarcodeType($value): void
    {
        try
        {
            $this->getJavaClass()->setBarcodeType($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Generate the barcode image under current settings.
     * This sample shows how to create and save a barcode image.
     * @param $format_name image format name("PNG", "BMP", "JPEG", "GIF", "TIFF")
     *
     * $generator = new BarCodeGenerator(EncodeTypes::CODE_128);
     * $image = $generator->generateBarCodeImage(null);// if value = null, default image format PNG
     * @return base64 representaton of image.
     */
    public function generateBarcodeImage($format_name) : string
    {
        try
        {
            $base64Image = java_cast($this->getJavaClass()->generateBarcodeImage($format_name), "string");
            return ($base64Image);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Save barcode image to specific file in specific format.
     * @param $filePath Path to save to.
     * @param $format_name image format name("PNG", "BMP", "JPEG", "GIF", "TIFF")
     *
     * $generator = new BarCodeGenerator(EncodeTypes::CODE_128);
     * $generator->save("file path", null);// if value = null, default image format PNG
     */
    public function save($filePath, $format_name): void  //TODO BARCODEPHP-87
    {
        try
        {
            $image = $this->generateBarcodeImage($format_name); //TODO BARCODEPHP-87
            file_put_contents($filePath, base64_decode($image));
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Text to be encoded.
     */
    public function getCodeText(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeText(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }

    }

    /**
     * Text to be encoded.
     */
    public function setCodeText($value): void
    {
        $this->getJavaClass()->setCodeText($value);
    }
}

/**
 * Barcode generation parameters.
 */
class BarcodeParameters extends BaseJavaClass
{
    private $xDimension;
    private $barHeight;
    private $barCodeWidth;
    private $barCodeHeight;
    private $codeTextParameters;
    private $postal;
    private $australianPost;
    private $codablock;
    private $dataBar;
    private $dataMatrix;
    private $code16K;
    private $itf;
    private $qr;
    private $pdf417;
    private $maxiCode;
    private $aztec;
    private $codabar;
    private $coupon;
    private $supplement;
    private $dotCode;
    private $padding;
    private $patchCode;
    private $barWidthReduction;

    protected function init(): void
    {
        $this->xDimension = new Unit($this->getJavaClass()->getXDimension());
        $this->barHeight = new Unit($this->getJavaClass()->getBarHeight());
        $this->barCodeWidth = new Unit($this->getJavaClass()->getBarCodeWidth());
        $this->barCodeHeight = new Unit($this->getJavaClass()->getBarCodeHeight());
        $this->codeTextParameters = new CodetextParameters($this->getJavaClass()->getCodeTextParameters());
        $this->postal = new PostalParameters($this->getJavaClass()->getPostal());
        $this->australianPost = new AustralianPostParameters($this->getJavaClass()->getAustralianPost());
        $this->codablock = new CodablockParameters($this->getJavaClass()->getCodablock());
        $this->dataBar = new DataBarParameters($this->getJavaClass()->getDataBar());
        $this->dataMatrix = new DataMatrixParameters($this->getJavaClass()->getDataMatrix());
        $this->code16K = new Code16KParameters($this->getJavaClass()->getCode16K());
        $this->itf = new ITFParameters($this->getJavaClass()->getITF());
        $this->qr = new QrParameters($this->getJavaClass()->getQR());
        $this->pdf417 = new Pdf417Parameters($this->getJavaClass()->getPdf417());
        $this->maxiCode = new MaxiCodeParameters($this->getJavaClass()->getMaxiCode());
        $this->aztec = new AztecParameters($this->getJavaClass()->getAztec());
        $this->codabar = new CodabarParameters($this->getJavaClass()->getCodabar());
        $this->coupon = new CouponParameters($this->getJavaClass()->getCoupon());
        $this->supplement = new SupplementParameters($this->getJavaClass()->getSupplement());
        $this->dotCode = new DotCodeParameters($this->getJavaClass()->getDotCode());
        $this->padding = new Padding($this->getJavaClass()->getPadding());
        $this->patchCode = new PatchCodeParameters($this->getJavaClass()->getPatchCode());
        $this->barWidthReduction = new Unit($this->getJavaClass()->getBarWidthReduction());

    }

    /**
     * PatchCode parameters.
     */
    public function getPatchCode() : PatchCodeParameters
    {
        return $this->patchCode;
    }

    /**
     * PatchCode parameters.
     */
    private function setPatchCode(PatchCodeParameters $value)
    {
        $this->patchCode = $value;
        $this->getJavaClass()->setPatchCode($value->getJavaClass());
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $this->getJavaClass()->setXDimension($value->getJavaClass());
            $this->xDimension = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets bars reduction value that is used to compensate ink spread while printing.
     */
    public function setBarWidthReduction(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setBarWidthReduction($value->getJavaClass());
            $this->barWidthReduction = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height of 1D barcodes' bars in Unit value.
     * Ignored if AutoSizeMode property is set to AutoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     *
     * @throws BarcodeException
     */
    public function getBarHeight(): Unit
    {
        try
        {
            return $this->barHeight;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
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
            $this->getJavaClass()->setBarHeight($value->getJavaClass());
            $this->barHeight = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specifies the different types of automatic sizing modes.
     * Default value: AutoSizeMode::NONE.
     * @deprecated "This method is obsolete. Call BaseGenerationParameters->getAutoSizeMode() instead."
     *
     * @throws BarcodeException
     */
    public function getAutoSizeMode() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAutoSizeMode(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specifies the different types of automatic sizing modes.
     * Default value: AutoSizeMode::NONE.
     * @deprecated "This method is obsolete. Call BaseGenerationParameters->setAutoSizeMode() instead."
     *
     * @throws BarcodeException
     */
    public function setAutoSizeMode($value): void
    {
        try
        {
            $this->getJavaClass()->setAutoSizeMode($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * BarCode image height when AutoSizeMode property is set to AutoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     *
     * @deprecated "This method is obsolete. Call BaseGenerationParameters->getImageHeight() instead."
     */
    public function getBarCodeHeight(): Unit
    {
        try
        {
            return $this->barCodeHeight;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * BarCode image height when AutoSizeMode property is set to AutoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     * @deprecated "This method is obsolete. Call BaseGenerationParameters->setImageHeight() instead."
     */
    public function setBarCodeHeight(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setBarCodeHeight($value->getJavaClass());
            $this->barCodeHeight = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * BarCode image width when AutoSizeMode property is set to AutoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     * @deprecated "This method is obsolete. Call BaseGenerationParameters->getImageWidth() instead."
     */
    public function getBarCodeWidth(): Unit
    {
        try
        {
            return $this->barCodeWidth;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * BarCode image width when AutoSizeMode property is set to AutoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     * @deprecated "This method is obsolete. Call BaseGenerationParameters->setImageWidth() instead."
     */
    public function setBarCodeWidth(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setBarCodeWidth($value->getJavaClass());
            $this->barCodeWidth = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Bars color.
     * Default value: #000000.
     * @deprecated "This method is obsolete. Call BarcodeParameters->getBarColor() instead."
     */
    public function getForeColor() : string
    { return $this->getBarColor(); }

    /**
     * Bars color.
     * Default value Black.
     * @deprecated "This method is obsolete. Call BarcodeParameters->setBarColor() instead."
     */
    public function setForeColor($value) : void
    { $this->setBarColor($value); }

    /**
     * Bars color.
     * Default value: #000000
     */
    public function getBarColor() : string
    {
        return java_cast($this->getJavaClass()->getBarColor(), "string");
    }

    /**
     * Bars color.
     * Default value: #000000.
     */
    public function setBarColor($value) : void
    {
        $this->getJavaClass()->setBarColor($value);
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $this->getJavaClass()->setPadding($value->getJavaClass());
            $this->padding = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     *  Always display checksum digit in the human readable text for Code128 and GS1Code128 barcodes.
     */
    public function getChecksumAlwaysShow() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getChecksumAlwaysShow(), "boolean");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     *  Always display checksum digit in the human readable text for Code128 and GS1Code128 barcodes.
     */
    public function setChecksumAlwaysShow($value): void
    {
        try
        {
            $this->getJavaClass()->setChecksumAlwaysShow($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Enable checksum during generation 1D barcodes.
     * Default is treated as Yes for symbology which must contain checksum, as No where checksum only possible.
     * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN, Codabar
     * Checksum always used: Rest symbology
     */

    public function isChecksumEnabled() : bool
    {
        try
        {
            return java_cast($this->getJavaClass()->isChecksumEnabled(), "boolean");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Enable checksum during generation 1D barcodes.
     * Default is treated as Yes for symbology which must contain checksum, as No where checksum only possible.
     * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN, Codabar
     * Checksum always used: Rest symbology
     */
    public function setChecksumEnabled($value): void
    {
        try
        {
            $this->getJavaClass()->setChecksumEnabled($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Indicates whether explains the character "\" as an escape character in CodeText property. Used for Pdf417, DataMatrix, Code128 only
     * If the EnableEscape is true, "\" will be explained as a special escape character. Otherwise, "\" acts as normal characters.
     *Aspose.BarCode supports inputing decimal ascii code and mnemonic for ASCII control-code characters. For example, \013 and \\CR stands for CR.
     */
    public function getEnableEscape() : bool
    {
        try
        {
            return java_cast($this->getJavaClass()->getEnableEscape(), "boolean");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Indicates whether explains the character "\" as an escape character in CodeText property. Used for Pdf417, DataMatrix, Code128 only
     * If the EnableEscape is true, "\" will be explained as a special escape character. Otherwise, "\" acts as normal characters.
     *<hr>Aspose.BarCode supports inputing decimal ascii code and mnemonic for ASCII control-code characters. For example, \013 and \\CR stands for CR.</hr>
     */
    public function setEnableEscape($value): void
    {
        try
        {
            $this->getJavaClass()->setEnableEscape($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
    public function getWideNarrowRatio() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getWideNarrowRatio(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
    public function setWideNarrowRatio($value): void
    {
        try
        {
            $this->getJavaClass()->setWideNarrowRatio($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets a value indicating whether bars filled.
     * Only for 1D barcodes.
     * Default value: true.
     */
    public function getFilledBars() : bool
    {
        try
        {
            return java_cast($this->getJavaClass()->getFilledBars(), "boolean");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets a value indicating whether bars filled.
     * Only for 1D barcodes.
     * Default value: true.
     */
    public function setFilledBars($value): void
    {
        try
        {
            $this->getJavaClass()->setFilledBars($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 * Barcode image generation parameters.
 */
class BaseGenerationParameters extends BaseJavaClass
{
    private $captionAbove;
    private $captionBelow;
    private $barcodeParameters;
    private $borderParameters;


    protected function init(): void
    {
        $this->captionAbove = new CaptionParameters($this->getJavaClass()->getCaptionAbove());
        $this->captionBelow = new CaptionParameters($this->getJavaClass()->getCaptionBelow());
        $this->barcodeParameters = new BarcodeParameters($this->getJavaClass()->getBarcode());
        $this->borderParameters = new BorderParameters($this->getJavaClass()->getBorder());
    }

    /**
     * Background color of the barcode image.
     * Default value: #FFFFFF
     * See Color.
     */
    public function getBackColor(): string
    {
        $back_color = null;
        try
        {
            $java_object = $this->getJavaClass()->getBackColor();
            $back_color = java_cast($java_object, "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
        return $back_color;
    }

    /**
     * Background color of the barcode image.
     * Default value: #FFFFFF
     * See Color.
     */
    public function setBackColor($hexValue): void
    {
        try
        {
            $this->getJavaClass()->setBackColor($hexValue);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets the resolution of the BarCode image.
     * One value for both dimensions.
     * Default value: 96 dpi.
     *
     * @exception IllegalArgumentException
     * The Resolution parameter value is less than or equal to 0.
     */
    public function getResolution() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getResolution(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets the resolution of the BarCode image.
     * One value for both dimensions.
     * Default value: 96 dpi.
     *
     * @exception IllegalArgumentException
     * The Resolution parameter value is less than or equal to 0.
     */
    public function setResolution($value): void
    {
        try
        {
            $this->getJavaClass()->setResolution($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     *  BarCode image rotation angle, measured in degree, e.g. RotationAngle = 0 or RotationAngle = 360 means no rotation.
     *  If RotationAngle NOT equal to 90, 180, 270 or 0, it may increase the difficulty for the scanner to read the image.
     *  Default value: 0.
     * <hr><blockquote><pre>
     *  This sample shows how to create and save a BarCode image.
     *  <pre>
     *     $generator = new BarcodeGenerator( EncodeTypes::DATA_MATRIX);
     *     $generator->getParameters()->setRotationAngle(7);
     *     $generator->save("test.png");
     *    </pre>
     *  </pre></blockquote></hr>
     */
    public function getRotationAngle() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getRotationAngle(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     *  BarCode image rotation angle, measured in degree, e.g. RotationAngle = 0 or RotationAngle = 360 means no rotation.
     *  If RotationAngle NOT equal to 90, 180, 270 or 0, it may increase the difficulty for the scanner to read the image.
     *  Default value: 0.
     * <hr><blockquote><pre>
     *  This sample shows how to create and save a BarCode image.
     *  <pre>
     *     $generator = new BarcodeGenerator( EncodeTypes::DATA_MATRIX);
     *     $generator->getParameters()->setRotationAngle(7);
     *     $generator->save("test.png");
     *    </pre>
     *  </pre></blockquote></hr>
     */
    public function setRotationAngle($value): void
    {
        try
        {
            $this->getJavaClass()->setRotationAngle($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption Above the BarCode image. See CaptionParameters.
     */
    public function getCaptionAbove(): CaptionParameters
    {
        try
        {
            return $this->captionAbove;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption Above the BarCode image. See CaptionParameters.
     */
    public function setCaptionAbove(CaptionParameters $value): void
    {
        try
        {
            $this->getJavaClass()->setCaptionAbove($value->getJavaClass());
            $this->captionAbove->updateCaption($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption Below the BarCode image. See CaptionParameters.
     */
    public function getCaptionBelow(): CaptionParameters
    {
        try
        {
            return $this->captionBelow;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption Below the BarCode image. See CaptionParameters.
     */
    function setCaptionBelow(CaptionParameters $value): void
    {
        try
        {
            $this->getJavaClass()->setCaptionBelow($value->getJavaClass());
            $this->captionBelow->updateCaption($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specifies the different types of automatic sizing modes.
     * Default value: AutoSizeMode::NONE.
     */
    public function getAutoSizeMode() : int
    {
        return java_cast($this->getJavaClass()->getAutoSizeMode(), "integer");
    }
    /**
     * Specifies the different types of automatic sizing modes.
     * Default value: AutoSizeMode::NONE.
     */
    public function setAutoSizeMode($value)
    {
        $this->getJavaClass()->setAutoSizeMode($value);
    }


    /**
     * BarCode image height when AutoSizeMode property is set to AutoSizeMode::NEAREST or AutoSizeMode::INTERPOLATION.
     */
    public function getImageHeight() :Unit
    {
        return $this->getBarcode()->getBarCodeHeight();
    }
    /**
     * BarCode image height when AutoSizeMode property is set to AutoSizeMode.NEAREST or AutoSizeMode::INTERPOLATION.
     */
    public function setImageHeight(Unit $value) : void { $this->getBarcode()->setBarCodeHeight($value); }


    /**
     * BarCode image width when AutoSizeMode property is set to AutoSizeMode.NEAREST or AutoSizeMode::INTERPOLATION.
     */
    public function getImageWidth() : Unit
    {
        return $this->getBarcode()->getBarCodeWidth();
    }
    /**
     * BarCode image width when AutoSizeMode property is set to AutoSizeMode.NEAREST or AutoSizeMode::INTERPOLATION.
     */
    public function setImageWidth(Unit $value)
    {
        $this->getBarcode()->setBarCodeWidth($value);
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets the BarcodeParameters that contains all barcode properties.
     */
    function setBarcode(BarcodeParameters $value): void
    {
        try
        {
            $this->getJavaClass()->setBarcode($value->getJavaClass());
            $this->barcodeParameters = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}


/**
 *
 * Barcode image border parameters
     */
class BorderParameters extends BaseJavaClass
{
    private $width;

    protected function init(): void
    {
        try
        {
            $this->width = new Unit($this->getJavaClass()->getWidth());
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Border visibility. If false than parameter Width is always ignored (0).
     * Default value: false.
     */
    public function getVisible() : bool
    {
        try
        {
            return java_cast($this->getJavaClass()->getVisible(), "boolean");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Border visibility. If false than parameter Width is always ignored (0).
     * Default value: false.
     */
    public function setVisible($value): void
    {
        try
        {
            $this->getJavaClass()->setVisible($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Border width.
     * Default value: 0.
     * Ignored if Visible is set to false.
     */
    public function getWidth(): Unit
    {
        try
        {
            return $this->width;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Border width.
     * Default value: 0.
     * Ignored if Visible is set to false.
     *public
     */
    public function setWidth(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setWidth($value->getJavaClass());
            $this->width = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this BorderParameters.
     *
     * @return A string that represents this BorderParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Border dash style.
     * Default value: BorderDashStyle::SOLID.
     */
    public function getDashStyle() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getDashStyle(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Border dash style.
     * Default value: BorderDashStyle::SOLID.
     */
    public function setDashStyle($value): void
    {
        try
        {
            $this->getJavaClass()->setDashStyle($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Border color.
     * Default value: #000000
     */
    public function getColor() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->getColor(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Border color.
     * Default value: #000000
     */
    public function setColor($hexValue): void
    {
        try
        {
            $this->getJavaClass()->setColor($hexValue);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 * Enable checksum validation during recognition for 1D barcodes.
 * Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible.
 * Checksum never used: Codabar
 * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN
 * Checksum always used: Rest symbologies
 * This sample shows influence of ChecksumValidation on recognition quality and results
 * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "1234567890128");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::EAN_13);
 * //checksum disabled
 * $reader.setChecksumValidation(ChecksumValidation::OFF);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
 *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
 * }
 * $reader = new BarCodeReader("test.png", DecodeType::EAN_13);
 * //checksum enabled
 * $reader->setChecksumValidation(ChecksumValidation::ON);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
 *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
 * }
 */
class  ChecksumValidation
{
    /**
     *    If checksum is required by the specification - it will be validated.
     */
    const default = 0;

    /**
     *    Always validate checksum if possible.
     */
    const ON = 1;

    /**
     *    Do not validate checksum.
     */
    const OFF = 2;
}

/**
 *
 * Caption parameters.
     */
class CaptionParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.CaptionParameters";

    private $font;
    private $padding;

    protected function init(): void
    {
        try
        {
            $this->padding = new Padding($this->getJavaClass()->getPadding());
            $this->font = new FontUnit($this->getJavaClass()->getFont());
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption text.
     * Default value: empty string.
     */
    public function getText() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->getText(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption text.
     * Default value: empty string.
     */
    public function setText($value): void
    {
        try
        {
            $this->getJavaClass()->setText($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption font.
     * Default value: Arial 8pt regular.
     */
    public function getFont() : FontUnit
    {
        try
        {
            return $this->font;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption text visibility.
     * Default value: false.
     */
    public function getVisible() : bool
    {
        try
        {
            return java_cast($this->getJavaClass()->getVisible(), "boolean");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption text visibility.
     * Default value: false.
     */
    public function setVisible($value): void
    {
        try
        {
            $this->getJavaClass()->setVisible($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption text color.
     * Default value BLACK.
     */
    public function getTextColor() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->getTextColor(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption text color.
     * Default value BLACK.
     */
    public function setTextColor($rgbValue): void
    {
        try
        {
            $this->getJavaClass()->setTextColor($rgbValue);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Captions paddings.
     * Default value for CaptionAbove: 5pt 5pt 0 5pt.
     * Default value for CaptionBelow: 0 5pt 5pt 5pt.
     */
    public function getPadding() : Padding
    {
        try
        {
            return $this->padding;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Captions paddings.
     * Default value for CaptionAbove: 5pt 5pt 0 5pt.
     * Default value for CaptionBelow: 0 5pt 5pt 5pt.
     */
    public function setPadding(Padding $value): void
    {
        try
        {
            $this->getJavaClass()->setPadding($value->getJavaClass());
            $this->padding = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption test horizontal alignment.
     * Default value: StringAlignment.Center.
     */
    public function getAlignment() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAlignment(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Caption test horizontal alignment.
     * Default value: StringAlignment.Center.
     */
    public function setAlignment($value): void
    {
        try
        {
            $this->getJavaClass()->setAlignment($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
    /*
     * Specify word wraps (line breaks) within text.
     * @return bool
     */
    public function getNoWrap() : bool
    {
        return java_cast($this->getJavaClass()->getNoWrap(), "boolean");
    }

    /*
     * Specify word wraps (line breaks) within text.
     */
    public function setNoWrap($value) : void
    {
        $this->getJavaClass()->setNoWrap($value);
    }
}

/**
 *  Specifies the size value in different units (Pixel, Inches, etc.).
 *  This sample shows how to create and save a BarCode image.
 *    $generator = new BarcodeGenerator(EncodeTypes::CODE_128);
 *    $generator->getParameters()->getBarcode()->getBarHeight()->setMillimeters(10);
 *    $generator->save("test.png");
 */
class Unit extends BaseJavaClass
{
    public function __construct($source)
    {
        parent::__construct(self::initUnit($source));
    }

    private static function initUnit($source)
    {
        if($source instanceof Unit)
            return $source->getJavaClass();
        return $source;
    }

    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets size value in pixels.
     */
    public function getPixels() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getPixels(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets size value in pixels.
     */
    public function setPixels($value): void
    {
        try
        {
            $this->getJavaClass()->setPixels($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets size value in inches.
     */
    public function getInches() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getInches(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets size value in inches.
     */
    public function setInches($value): void
    {
        try
        {
            $this->getJavaClass()->setInches($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets size value in millimeters.
     */
    public function getMillimeters() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getMillimeters(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets size value in millimeters.
     */
    public function setMillimeters($value): void
    {
        try
        {
            $this->getJavaClass()->setMillimeters($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets size value in point.
     */
    public function getPoint() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getPoint(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets size value in point.
     */
    public function setPoint($value): void
    {
        try
        {
            $this->getJavaClass()->setPoint($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets size value in document units.
     */
    public function getDocument() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getDocument(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets size value in document units.
     */
    public function setDocument($value): void
    {
        try
        {
            $this->getJavaClass()->setDocument($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this Unit.
     *
     * @return A string that represents this Unit.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Determines whether this instance and a specified object,
     * which must also be a Unit object, have the same value.
     *
     * @param obj The Unit to compare to this instance.
     * @return true if obj is a Unit and its value is the same as this instance;
     * otherwise, false. If obj is null, the method returns false.
     */
    public function equals($obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj), "boolean");
    }
}

/**
 *
 * Paddings parameters.
     */
class Padding extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.Padding";

    private $top;
    private $bottom;
    private $right;
    private $left;

    protected function init(): void
    {
        $this->top = new Unit($this->getJavaClass()->getTop());
        $this->bottom = new Unit($this->getJavaClass()->getBottom());
        $this->right = new Unit($this->getJavaClass()->getRight());
        $this->left = new Unit($this->getJavaClass()->getLeft());
    }

    /**
     * Top padding.
     */
    public function getTop() : Unit
    {
        try
        {
            return $this->top;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Top padding.
     */
    public function setTop(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setTop($value->getJavaClass());
            $this->top = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Bottom padding.
     */
    public function getBottom() : Unit
    {
        try
        {
            return $this->bottom;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Bottom padding.
     */
    public function setBottom(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setBottom($value->getJavaClass());
            $this->bottom = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Right padding.
     */
    public function getRight() : Unit
    {
        try
        {
            return $this->right;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Right padding.
     */
    public function setRight(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setRight($value->getJavaClass());
            $this->right = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Left padding.
     */
    public function getLeft() : Unit
    {
        try
        {
            return $this->left;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Left padding.
     */
    public function setLeft(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setLeft($value->getJavaClass());
            $this->left = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this Padding.
     *
     * @return A string that represents this Padding.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * Codetext parameters.
     */
class CodetextParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.CodetextParameters";

    private $font;
    private $space;

    protected function init(): void
    {
        try
        {
            $this->font = new FontUnit($this->getJavaClass()->getFont());
            $this->space = new Unit($this->getJavaClass()->getSpace());
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Text that will be displayed instead of codetext in 2D barcodes.
     * Used for: Aztec, Pdf417, DataMatrix, QR, MaxiCode, DotCode
     */
    public function getTwoDDisplayText() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->getTwoDDisplayText(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Text that will be displayed instead of codetext in 2D barcodes.
     * Used for: Aztec, Pdf417, DataMatrix, QR, MaxiCode, DotCode
     */
    public function setTwoDDisplayText($value): void
    {
        try
        {
            $this->getJavaClass()->setTwoDDisplayText($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specify FontMode. If FontMode is set to Auto, font size will be calculated automatically based on xDimension value.
     * It is recommended to use FontMode::AUTO especially in AutoSizeMode.NEAREST or AutoSizeMode::INTERPOLATION.
     * Default value: FontMode::AUTO.
     */
    public function getFontMode() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getFontMode(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specify FontMode. If FontMode is set to Auto, font size will be calculated automatically based on xDimension value.
     * It is recommended to use FontMode::AUTO especially in AutoSizeMode.NEAREST or AutoSizeMode::INTERPOLATION.
     * Default value: FontMode::AUTO.
     */
    public function setFontMode($value): void
    {
        try
        {
            $this->getJavaClass()->setFontMode($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specify the displaying CodeText's font.
     * Default value: Arial 5pt regular.
     * Ignored if FontMode is set to FontMode::AUTO.
     */
    public function getFont() : FontUnit
    {
        try
        {
            return $this->font;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specify the displaying CodeText's font.
     * Default value: Arial 5pt regular.
     * Ignored if FontMode is set to FontMode::AUTO.
     */
    public function setFont(FontUnit $value): void
    {
        try
        {
            $this->getJavaClass()->setFont($value->getJavaClass());
            $this->font = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Space between the CodeText and the BarCode in Unit value.
     * Default value: 2pt.
     * Ignored for EAN8, EAN13, UPCE, UPCA, ISBN, ISMN, ISSN, UpcaGs1DatabarCoupon.
     */
    public function getSpace() : Unit
    {
        try
        {
            return $this->space;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Space between the CodeText and the BarCode in Unit value.
     * Default value: 2pt.
     * Ignored for EAN8, EAN13, UPCE, UPCA, ISBN, ISMN, ISSN, UpcaGs1DatabarCoupon.
     */
    public function setSpace(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setSpace($value->getJavaClass());
            $this->space = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets or sets the alignment of the code text.
     * Default value: TextAlignment::CENTER.
     */
    public function getAlignment() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAlignment(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets or sets the alignment of the code text.
     * Default value: TextAlignment::CENTER.
     */
    public function setAlignment($value): void
    {
        try
        {
            $this->getJavaClass()->setAlignment($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specify the displaying CodeText's Color.
     * Default value BLACK.
     */
    public function getColor() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->getColor(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specify the displaying CodeText's Color.
     * Default value BLACK.
     */
    public function setColor($value): void
    {
        try
        {
            $this->getJavaClass()->setColor($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specify the displaying CodeText Location, set to CodeLocation::NONE to hide CodeText.
     * Default value:  CodeLocation::BELOW.
     */
    public function getLocation() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getLocation(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specify the displaying CodeText Location, set to  CodeLocation::NONE to hide CodeText.
     * Default value:  CodeLocation::BELOW.
     */
    public function setLocation($value): void
    {
        try
        {
            $this->getJavaClass()->setLocation($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Specify word wraps (line breaks) within text.
     * @return bool
     */
    public function getNoWrap() : bool
    {
        return java_cast($this->getJavaClass()->getNoWrap(), "boolean");
    }

    /**
     * Specify word wraps (line breaks) within text.
     */
    public function setNoWrap($value) : void
    {
        $this->getJavaClass()->setNoWrap($value);
    }

    /**
     * Returns a human-readable string representation of this CodetextParameters.
     *
     * @return A string that represents this CodetextParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * Postal parameters. Used for Postnet, Planet.
     */
class PostalParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.PostalParameters";

    private $postalShortBarHeight;

    protected function init(): void
    {
        try
        {
            $this->postalShortBarHeight = new Unit($this->getJavaClass()->getPostalShortBarHeight());
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Short bar's height of Postal barcodes.
     */
    public function getPostalShortBarHeight() : Unit
    {
        try
        {
            return $this->postalShortBarHeight;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Short bar's height of Postal barcodes.
     */
    public function setPostalShortBarHeight(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setPostalShortBarHeight($value->getJavaClass());
            $this->postalShortBarHeight = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this PostalParameters.
     *
     * @return A string that represents this PostalParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * AustralianPost barcode parameters.
     */
class AustralianPostParameters extends BaseJavaClass
{
    private $australianPostShortBarHeight;

    protected function init(): void
    {
        try
        {
            $this->australianPostShortBarHeight = new Unit($this->getJavaClass()->getAustralianPostShortBarHeight());
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Short bar's height of AustralianPost barcode.
     */
    public function getAustralianPostShortBarHeight() : Unit
    {
        try
        {
            return $this->australianPostShortBarHeight;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Short bar's height of AustralianPost barcode.
     */
    public function setAustralianPostShortBarHeight(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setAustralianPostShortBarHeight($value->getJavaClass());
            $this->australianPostShortBarHeight = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Interpreting type for the Customer Information of AustralianPost, default to CustomerInformationInterpretingType.Other"
     */
    public function getAustralianPostEncodingTable() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAustralianPostEncodingTable(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Interpreting type for the Customer Information of AustralianPost, default to CustomerInformationInterpretingType.Other"
     */
    public function setAustralianPostEncodingTable($value): void
    {
        try
        {
            $this->getJavaClass()->setAustralianPostEncodingTable($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this AustralianPostParameters.
     *
     * @return A string that represents this AustralianPostParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * Codablock parameters.
     */
class CodablockParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.CodablockParameters";

    protected function init(): void
    {
    }

    /**
     * Columns count.
     */
    public function getColumns() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getColumns(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Columns count.
     */
    public function setColumns($value): void
    {
        try
        {
            $this->getJavaClass()->setColumns($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Rows count.
     */
    public function getRows() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getRows(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Rows count.
     */
    public function setRows($value): void
    {
        try
        {
            $this->getJavaClass()->setRows($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio($value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this CodablockParameters.
     *
     * @return A string that represents this CodablockParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 * Databar parameters.
 */
class DataBarParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.DataBarParameters";

    protected function init(): void
    {
    }

    /**
     * Enables flag of 2D composite component with DataBar barcode
     */
    public function is2DCompositeComponent() : bool
    {
        return java_cast($this->getJavaClass()->is2DCompositeComponent(), "boolean");
    }

   /**
    * Enables flag of 2D composite component with DataBar barcode
    */
    public function set2DCompositeComponent($value) : void
    {
        $this->getJavaClass()->set2DCompositeComponent($value);
    }

    /**
     * If this flag is set, it allows only GS1 encoding standard for Databar barcode types
     */
    public function isAllowOnlyGS1Encoding() : bool
    {
        return java_cast($this->getJavaClass()->isAllowOnlyGS1Encoding(), "boolean");
    }

    /**
     * If this flag is set, it allows only GS1 encoding standard for Databar barcode types
     */
    public function setAllowOnlyGS1Encoding($value) : void
    {
        $this->getJavaClass()->setAllowOnlyGS1Encoding($value);
    }

    /**
     * Columns count.
     */
    public function getColumns() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getColumns(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Columns count.
     */
    public function setColumns($value): void
    {
        try
        {
            $this->getJavaClass()->setColumns($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Rows count.
     */
    public function getRows() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getRows(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Rows count.
     */
    public function setRows($value): void
    {
        try
        {
            $this->getJavaClass()->setRows($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     * Used for DataBar stacked.
     */
    public function getAspectRatio() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     * Used for DataBar stacked.
     */
    public function setAspectRatio($value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this DataBarParameters.
     *
     * @return A string that represents this DataBarParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * DataMatrix parameters.
     */
class DataMatrixParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.DataMatrixParameters";

    protected function init(): void
    {
    }

    /**
     * Gets a Datamatrix ECC type.
     * Default value: DataMatrixEccType::ECC_200.
     */
    public function getDataMatrixEcc() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getDataMatrixEcc(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets a Datamatrix ECC type.
     * Default value: DataMatrixEccType::ECC_200.
     */
    public function setDataMatrixEcc($value): void
    {
        try
        {
            $this->getJavaClass()->setDataMatrixEcc($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode::AUTO.
     */
    public function getDataMatrixEncodeMode() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getDataMatrixEncodeMode(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode::AUTO.
     */
    public function setDataMatrixEncodeMode($value): void
    {
        try
        {
            $this->getJavaClass()->setDataMatrixEncodeMode($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * ISO/IEC 16022
     * 5.2.4.7 Macro characters
     * 11.3 Protocol for Macro characters in the first position (ECC 200 only)
     * Macro Characters 05 and 06 values are used to obtain more compact encoding in special modes.
     * Can be used only with DataMatrixEccType.Ecc200 or DataMatrixEccType.EccAuto.
     * Cannot be used with EncodeTypes.GS_1_DATA_MATRIX
     * Default value: MacroCharacter.NONE.
     */
    public function getMacroCharacters() : int
    {
        return java_cast($this->getJavaClass()->getMacroCharacters(), "integer");
    }

    /**
     * ISO/IEC 16022
     * 5.2.4.7 Macro characters
     * 11.3 Protocol for Macro characters in the first position (ECC 200 only)
     * Macro Characters 05 and 06 values are used to obtain more compact encoding in special modes.
     * Can be used only with DataMatrixEccType.Ecc200 or DataMatrixEccType.EccAuto.
     * Cannot be used with EncodeTypes.GS_1_DATA_MATRIX
     * Default value: MacroCharacter.NONE.
     */
    public function setMacroCharacters($value) : void
    {
        $this->getJavaClass()->setMacroCharacters($value);
    }


    /**
     * Columns count.
     */
    public function getColumns() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getColumns(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Columns count.
     */
    public function setColumns($value): void
    {
        try
        {
            $this->getJavaClass()->setColumns($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Rows count.
     */
    public function getRows() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getRows(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Rows count.
     */
    public function setRows($value): void
    {
        try
        {
            $this->getJavaClass()->setRows($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio($value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets the encoding of codetext.
     */
    public function getCodeTextEncoding()
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeTextEncoding()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets the encoding of codetext.
     */
    public function setCodeTextEncoding($value)
    {
        try
        {
            return $this->getJavaClass()->setCodeTextEncoding($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this DataMatrixParameters.
     *
     * @return presentation of this DataMatrixParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }


}


/**
 *
 * Code16K parameters.
     */
class Code16KParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.Code16KParameters";

    protected function init(): void
    {
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio($value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Size of the left quiet zone in xDimension.
     * Default value: 10, meaning if xDimension = 2px than left quiet zone will be 20px.
     */
    public function getQuietZoneLeftCoef() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQuietZoneLeftCoef(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Size of the left quiet zone in xDimension.
     * Default value: 10, meaning if xDimension = 2px than left quiet zone will be 20px.
     */
    public function setQuietZoneLeftCoef($value): void
    {
        try
        {
            $this->getJavaClass()->setQuietZoneLeftCoef($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Size of the right quiet zone in xDimension.
     * Default value: 1, meaning if xDimension = 2px than right quiet zone will be 2px.
     */
    public function getQuietZoneRightCoef() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQuietZoneRightCoef(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Size of the right quiet zone in xDimension.
     * Default value: 1, meaning if xDimension = 2px than right quiet zone will be 2px.
     */
    public function setQuietZoneRightCoef($value): void
    {
        try
        {
            $this->getJavaClass()->setQuietZoneRightCoef($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this Code16KParameters.
     *
     * @return A string that represents this Code16KParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * DotCode parameters.
     */
class DotCodeParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.";

    protected function init(): void
    {
    }

    /**
     * Mask of Dotcode barcode.
     * Default value: -1.
     */
    public function getDotCodeMask() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getDotCodeMask(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Mask of Dotcode barcode.
     * Default value: -1.
     */
    public function setDotCodeMask($value): void
    {
        try
        {
            $this->getJavaClass()->setDotCodeMask($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio($value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this DotCodeParameters.
     *
     * @return A string that represents this DotCodeParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * ITF parameters.
     */
class ITFParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.ITFParameters";

    private $itfBorderThickness;

    protected function init(): void
    {
        $this->itfBorderThickness = new Unit($this->getJavaClass()->getItfBorderThickness());
    }

    /**
     * Gets or sets an ITF border (bearer bar) thickness in Unit value.
     * Default value: 12pt.
     */
    public function getItfBorderThickness(): Unit
    {
        try
        {
            return $this->itfBorderThickness;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets or sets an ITF border (bearer bar) thickness in Unit value.
     * Default value: 12pt.
     */
    public function setItfBorderThickness(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setItfBorderThickness($value->getJavaClass());
            $this->itfBorderThickness = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Border type of ITF barcode.
     * Default value: ITF14BorderType::BAR.
     */
    public function getItfBorderType() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getItfBorderType(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Border type of ITF barcode.
     * Default value: ITF14BorderType::BAR.
     */
    public function setItfBorderType($value): void
    {
        try
        {
            $this->getJavaClass()->setItfBorderType($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Size of the quiet zones in xDimension.
     * Default value: 10, meaning if xDimension = 2px than quiet zones will be 20px.
     *
     * @exception IllegalArgumentException
     * The QuietZoneCoef parameter value is less than 10.
     */
    public function getQuietZoneCoef() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQuietZoneCoef(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Size of the quiet zones in xDimension.
     * Default value: 10, meaning if xDimension = 2px than quiet zones will be 20px.
     *
     * @exception IllegalArgumentException
     * The QuietZoneCoef parameter value is less than 10.
     */
    public function setQuietZoneCoef($value): void
    {
        try
        {
            $this->getJavaClass()->setQuietZoneCoef($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this ITFParameters.
     *
     * @return A string that represents this ITFParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * QR parameters.
     */
class QrParameters extends BaseJavaClass
{
    private $structuredAppend;
    // protected $javaClassName = "com.aspose.barcode.generation.QrParameters";

    protected function init(): void
    {
        $this->structuredAppend = new QrStructuredAppendParameters($this->getJavaClass()->getStructuredAppend());
    }

    /**
     * QR structured append parameters.
     */
    public function getStructuredAppend() : QrStructuredAppendParameters
    {
        return $this->structuredAppend;
    }

    /**
     * QR structured append parameters.
     */
    public function setStructuredAppend(QrStructuredAppendParameters $value)
    {
        $this->structuredAppend = $value;
        $this->getJavaClass()->setStructuredAppend($value->getJavaClass());
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     */
    public function getQrECIEncoding() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQrECIEncoding(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     */
    public function setQrECIEncoding($value): void
    {
        try
        {
            $this->getJavaClass()->setQrECIEncoding($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * QR symbology type of BarCode's encoding mode.
     * Default value: QREncodeMode::AUTO.
     */
    public function getQrEncodeMode() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQrEncodeMode(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * QR symbology type of BarCode's encoding mode.
     * Default value: QREncodeMode::AUTO.
     */
    public function setQrEncodeMode($value): void
    {
        try
        {
            $this->getJavaClass()->setQrEncodeMode($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * QR / MicroQR selector mode. Select ForceQR for standard QR symbols, Auto for MicroQR.
     */
    public function getQrEncodeType() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQrEncodeType(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * QR / MicroQR selector mode. Select ForceQR for standard QR symbols, Auto for MicroQR.
     */
    public function setQrEncodeType($value): void
    {
        try
        {
            $this->getJavaClass()->setQrEncodeType($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     *  Level of Reed-Solomon error correction for QR barcode.
     *  From low to high: LEVEL_L, LEVEL_M, LEVEL_Q, LEVEL_H. see QRErrorLevel.
     */
    public function getQrErrorLevel() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->qrErrorLevel, "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     *  Level of Reed-Solomon error correction for QR barcode.
     *  From low to high: LEVEL_L, LEVEL_M, LEVEL_Q, LEVEL_H. see QRErrorLevel.
     */
    public function setQrErrorLevel($value): void
    {
        try
        {
            $this->getJavaClass()->setQrErrorLevel($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Version of QR Code.
     * From Version1 to Version40 for QR code and from M1 to M4 for MicroQr.
     * Default value is QRVersion::AUTO.
     */
    public function getQrVersion() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQrVersion(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Version of QR Code.
     * From Version1 to Version40 for QR code and from M1 to M4 for MicroQr.
     * Default value is QRVersion::AUTO.
     */
    public function setQrVersion($value): void
    {
        try
        {
            $this->getJavaClass()->setQrVersion($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio($value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets the encoding of codetext.
     */
    public function getCodeTextEncoding() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeTextEncoding(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets the encoding of codetext.
     */
    public function setCodeTextEncoding($value) : void
    {
        try
        {
            $this->getJavaClass()->setCodeTextEncoding($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this QrParameters.
     *
     * @return A string that represents this QrParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * PDF417 parameters.
     */
class Pdf417Parameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.Pdf417Parameters";

    protected function init(): void
    {
    }

    /**
     * Pdf417 symbology type of BarCode's compaction mode.
     * Default value: Pdf417CompactionMode::AUTO.
     */
    public function getPdf417CompactionMode() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417CompactionMode(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Pdf417 symbology type of BarCode's compaction mode.
     * Default value: Pdf417CompactionMode::AUTO.
     */
    public function setPdf417CompactionMode($value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417CompactionMode($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets or sets Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     */
    public function getPdf417ErrorLevel() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417ErrorLevel(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets or sets Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     */
    public function setPdf417ErrorLevel($value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417ErrorLevel($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Whether Pdf417 symbology type of BarCode is truncated (to reduce space).
     */
    public function getPdf417Truncate() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417Truncate(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Whether Pdf417 symbology type of BarCode is truncated (to reduce space).
     */
    public function setPdf417Truncate($value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417Truncate($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Columns count.
     */
    public function getColumns() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getColumns(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Columns count.
     */
    public function setColumns($value): void
    {
        try
        {
            $this->getJavaClass()->setColumns($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Rows count.
     */
    public function getRows() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getRows(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Rows count.
     */
    public function setRows($value): void
    {
        try
        {
            $this->getJavaClass()->setRows($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio($value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Getsmacro Pdf417 barcode's file ID.
     * Used for MacroPdf417.
     */
    public function getPdf417MacroFileID() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroFileID(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets macro Pdf417 barcode's file ID.
     * Used for MacroPdf417.
     */
    public function setPdf417MacroFileID($value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroFileID($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets macro Pdf417 barcode's segment ID, which starts from 0, to MacroSegmentsCount - 1.
     */
    public function getPdf417MacroSegmentID() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroSegmentID(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets macro Pdf417 barcode's segment ID, which starts from 0, to MacroSegmentsCount - 1.
     */
    public function setPdf417MacroSegmentID($value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroSegmentID($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets macro Pdf417 barcode segments count.
     */
    public function getPdf417MacroSegmentsCount() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroSegmentsCount(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets macro Pdf417 barcode segments count.
     */
    public function setPdf417MacroSegmentsCount($value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroSegmentsCount($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets the encoding of codetext.
     */
    public function getCodeTextEncoding()
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeTextEncoding(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets the encoding of codetext.
     */
    public function setCodeTextEncoding($value) : void
    {
        try
        {
            $this->getJavaClass()->setCodeTextEncoding($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     */
    public function getPdf417ECIEncoding() : int
    {
        return java_cast($this->getJavaClass()->getPdf417ECIEncoding(), "integer");
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     */
    public function setPdf417ECIEncoding($value) : void
    {
        $this->getJavaClass()->setPdf417ECIEncoding($value);
    }


    /**
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization
     * @return
     */
    public function isReaderInitialization() : bool
    {
        return java_cast($this->getJavaClass()->isReaderInitialization(), "boolean");
    }

    /**
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization
     * @param value
     */
    public function setReaderInitialization($value) : void
    {
        $this->getJavaClass()->setReaderInitialization($value);
    }

    /**
     * Returns a human-readable string representation of this Pdf417Parameters.
     *
     * @return A string that represents this Pdf417Parameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * Supplement parameters. Used for Interleaved2of5, Standard2of5, EAN13, EAN8, UPCA, UPCE, ISBN, ISSN, ISMN.
     */
class SupplementParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.SupplementParameters";

    private $_space;

    protected function init(): void
    {
        try
        {
            $this->_space = new Unit($this->getJavaClass()->getSupplementSpace());
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Supplement data following BarCode.
     */
    public function getSupplementData() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->getSupplementData(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Supplement data following BarCode.
     */
    public function setSupplementData($value): void
    {
        try
        {
            $this->getJavaClass()->setSupplementData($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Space between main the BarCode and supplement BarCode in Unit value.
     *
     * @exception IllegalArgumentException
     * The Space parameter value is less than 0.
     */
    public function getSupplementSpace() : Unit
    {
        try
        {
            return $this->_space;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this SupplementParameters.
     *
     * @return A string that represents this SupplementParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * MaxiCode parameters.
     */
class MaxiCodeParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.MaxiCodeParameters";

    protected function init(): void
    {
    }

    /**
     * Gets a MaxiCode encode mode.
     */
    public function getMaxiCodeEncodeMode() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getMaxiCodeEncodeMode(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets a MaxiCode encode mode.
     */
    public function setMaxiCodeEncodeMode($value): void
    {
        try
        {
            $this->getJavaClass()->setMaxiCodeEncodeMode($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio() : float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio($value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this MaxiCodeParameters.
     *
     * @return A string that represents this MaxiCodeParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * Aztec parameters.
     */
class AztecParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.AztecParameters";

    protected function init(): void
    {
    }

    /**
     * Level of error correction of Aztec types of barcode.
     * Value should between 10 to 95.
     */
    public function getAztecErrorLevel() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAztecErrorLevel(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Level of error correction of Aztec types of barcode.
     * Value should between 10 to 95.
     */
    public function setAztecErrorLevel($value): void
    {
        try
        {
            $this->getJavaClass()->setAztecErrorLevel($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets or sets a Aztec Symbol mode.
     * Default value: AztecSymbolMode::AUTO.
     */
    public function getAztecSymbolMode() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAztecSymbolMode(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets or sets a Aztec Symbol mode.
     * Default value: AztecSymbolMode::AUTO.
     */
    public function setAztecSymbolMode($value): void
    {
        try
        {
            $this->getJavaClass()->setAztecSymbolMode($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio($value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets the encoding of codetext.
     */
    public function getCodeTextEncoding() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeTextEncoding(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets the encoding of codetext.
     */
    public function setCodeTextEncoding($value) : void
    {
        try
        {
            $this->getJavaClass()->setCodeTextEncoding($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this AztecParameters.
     *
     * @return string that represents this  AztecParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * Codabar parameters.
     */
class CodabarParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.CodabarParameters";

    protected function init(): void
    {
    }

    /**
     * Get the checksum algorithm for Codabar barcodes.
     * Default value: CodabarChecksumMode::MOD_16.
     * To enable checksum calculation set value EnableChecksum::YES to property EnableChecksum.
     * See CodabarChecksumMode.
     */
    public function getCodabarChecksumMode() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodabarChecksumMode(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Set the checksum algorithm for Codabar barcodes.
     * Default value: CodabarChecksumMode::MOD_16.
     * To enable checksum calculation set value EnableChecksum::YES to property EnableChecksum.
     * See CodabarChecksumMode.
     */
    public function setCodabarChecksumMode($value): void
    {
        try
        {
            $this->getJavaClass()->setCodabarChecksumMode($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Start symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function getCodabarStartSymbol() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodabarStartSymbol(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Start symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function setCodabarStartSymbol($value): void
    {
        try
        {
            $this->getJavaClass()->setCodabarStartSymbol($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Stop symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function getCodabarStopSymbol() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodabarStopSymbol(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Stop symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function setCodabarStopSymbol($value): void
    {
        try
        {
            $this->getJavaClass()->setCodabarStopSymbol($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this CodabarParameters.
     *
     * @return A string that represents this CodabarParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * Coupon parameters. Used for UpcaGs1DatabarCoupon, UpcaGs1Code128Coupon.
     */
class CouponParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.CouponParameters";

    private $_space;

    protected function init(): void
    {
        try
        {
            $this->_space = new Unit($this->getJavaClass()->getSupplementSpace());
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }


    /**
     * Space between main the BarCode and supplement BarCode in Unit value.
     *
     * @exception IllegalArgumentException
     * The Space parameter value is less than 0.
     */
    public function getSupplementSpace() : Unit
    {
        try
        {
            return $this->_space;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Space between main the BarCode and supplement BarCode in Unit value.
     *
     * @exception IllegalArgumentException
     * The Space parameter value is less than 0.
     */
    public function setSupplementSpace(Unit $value): void
    {
        try
        {
            $this->getJavaClass()->setSupplementSpace($value->getJavaClass());
            $this->_space = $value;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Returns a human-readable string representation of this CouponParameters.
     *
     * @return A string that represents this CouponParameters.
     */
    public function toString() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 *  Defines a particular format for text, including font face, size, and style attributes
 *  where size in Unit value property.
 * <hr><blockquote><pre>
 *  This sample shows how to create and save a BarCode image.
 *  <pre>
 *   $generator = new BarcodeGenerator(EncodeTypes::CODE_128);
 *   $generator->getParameters()->getCaptionAbove()->setText("CAPTION ABOOVE");
 *   $generator->getParameters()->getCaptionAbove()->setVisible(true);
 *   $generator->getParameters()->getCaptionAbove()->getFont()->setStyle(FontStyle::ITALIC);
 *   $generator->getParameters()->getCaptionAbove()->getFont()->getSize()->setPoint(25);
 *    </pre>
 *  </pre></blockquote></hr>
 */
final class FontUnit extends BaseJavaClass
{
    private $_size;

    public function __construct($source)
    {
        parent::__construct(self::initFontUnit($source));
    }

    private static function initFontUnit($source)
    {
        if($source instanceof FontUnit)
            return $source->getJavaClass();
        return $source;
    }

    protected function init(): void
    {
        try
        {
            $this->_size = new Unit($this->getJavaClass()->getSize());
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets the face name of this Font.
     */
    public function getFamilyName() : string
    {
        try
        {
            return java_cast($this->getJavaClass()->getFamilyName(), "string");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets the face name of this Font.
     */
    public function setFamilyName($value): void
    {
        try
        {
            $this->getJavaClass()->setFamilyName($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets style information for this FontUnit.
     */
    public function getStyle() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getStyle(), "integer");
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets style information for this FontUnit.
     */
    public function setStyle($value): void
    {
        try
        {
            $this->getJavaClass()->setStyle($value);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets size of this FontUnit in Unit value.
     *
     * @exception IllegalArgumentException
     * The Size parameter value is less than or equal to 0.
     */
    public function getSize() : Unit
    {
        try
        {
            return $this->_size;
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }
}

/**
 *
 * Helper class for automatic codetext generation of the Extended Codetext Mode
 * 
 */
class ExtCodetextBuilder extends BaseJavaClass
{
    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    function init(): void {
    }
    /**
     * Checks necessity to shield previous item by "\000000"
     * 
     *
     * @param Index Index in m_List
     * @return Necessity to shield
     */
    public function isNeedToShieldItemFromPrevECI($Index) : bool
    {
        return java_cast($this->getJavaClass()->isNeedToShieldItemFromPrevECI($Index), "boolean");
    }

    /**
     * Clears extended codetext items
     * 
     */
    public function clear()  : void
    {
        $this->getJavaClass()->clear();
    }

    /**
     * 
     * Adds plain codetext to the extended codetext items
     * 
     *
     * @param codetext Codetext in unicode to add as extended codetext item
     */
    public function addPlainCodetext($codetext) : void
    {
        $this->getJavaClass()->addPlainCodetext($codetext);
    }

    /**
     * 
     * Adds codetext with Extended Channel Identifier
     * 
     *
     * @param ECIEncoding Extended Channel Identifier
     * @param codetext    Codetext in unicode to add as extended codetext item with Extended Channel Identifier
     */
    public function addECICodetext($ECIEncoding, $codetext) : void
    {
        $this->getJavaClass()->addECICodetext($ECIEncoding, $codetext);
    }

    /**
     * Generate extended codetext from generation items list
     * 
     *
     * @return Return string of extended codetext
     */
    public function getExtendedCodetext() : string
    {
        return java_cast($this->getJavaClass()->getExtendedCodetext(), "string");
    }

}

/**
 * Extended codetext generator for 2D QR barcodes for ExtendedCodetext Mode of QREncodeMode
 * Use Display2DText property of BarCodeBuilder to set visible text to removing managing characters.
 * <hr><blockquote><pre>
 *  Example how to generate FNC1 first position for Extended Mode
 *  <pre>
 *  //create codetext
 *  $lTextBuilder = new QrExtCodetextBuilder();
 *  $lTextBuilder->addFNC1FirstPosition();
 *  $lTextBuilder->addPlainCodetext("000%89%%0");
 *  $lTextBuilder->addFNC1GroupSeparator();
 *  $lTextBuilder->addPlainCodetext("12345&lt;FNC1&gt;");
 *  //generate codetext
 *  $lCodetext = lTextBuilder->getExtendedCodetext();
 *  </pre>
 *  Example how to generate FNC1 second position for Extended Mode
 *  <pre>
 *  //create codetext
 *  $lTextBuilder = new QrExtCodetextBuilder();
 *  $lTextBuilder->addFNC1SecondPosition("12");
 *  $lTextBuilder->addPlainCodetext("TRUE3456");
 *  //generate codetext
 *  $lCodetext = lTextBuilder->getExtendedCodetext();
 *  </pre>
 * Example how to generate multi ECI mode for Extended Mode
 *  <pre>
 *  //create codetext
 * $lTextBuilder = new QrExtCodetextBuilder();
 * $lTextBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $lTextBuilder->addECICodetext(ECIEncodings::UTF8, "Right");
 * $lTextBuilder->addECICodetext(ECIEncodings::UTF16BE, "Power");
 * $lTextBuilder->addPlainCodetext("t\\e\\\\st");
 *  //generate codetext
 * $lCodetext = lTextBuilder->getExtendedCodetext();
 *  </pre>
 *  </pre></blockquote></hr>
 */
class QrExtCodetextBuilder extends ExtCodetextBuilder
{
    private const JAVA_CLASS_NAME = "com.aspose.mw.barcode.MwQrExtCodetextBuilder";

    function __construct()
    {
        $java_class = new java(self::JAVA_CLASS_NAME);
        parent::__construct($java_class);
    }

    function init():void {
    }

    /**
     * 
     * Adds FNC1 in first position to the extended codetext items
     * 
     */
    function addFNC1FirstPosition() : void
    {
        $this->getJavaClass()->addFNC1FirstPosition();
    }

    /**
     * 
     * Adds FNC1 in second position to the extended codetext items
     * 
     *
     * @param codetext Value of the FNC1 in the second position
     */
    function addFNC1SecondPosition($codetext)  : void
    {
        $this->getJavaClass()->addFNC1SecondPosition($codetext);
    }

    /**
     * 
     * Adds Group Separator (GS - '\\u001D') to the extended codetext items
     * 
     */
    function addFNC1GroupSeparator()  : void {
        $this->getJavaClass()->addFNC1GroupSeparator();
    }

    /**
     * 
     * Generates Extended codetext from the extended codetext list.
     * 
     *
     * @return Extended codetext as string
     */
    function getExtendedCodetext() : string
    {
        return java_cast($this->getJavaClass()->getExtendedCodetext(), "string");
    }

}

/**
 * PatchCode parameters.
 */
class PatchCodeParameters extends BaseJavaClass
{
    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    private $extraBarcodeText;

    /**
     * Specifies codetext for an extra QR barcode, when PatchCode is generated in page mode.
     */
    public function getExtraBarcodeText() : string
    {
        return java_cast($this->getJavaClass()->getExtraBarcodeText(), "string");
    }

    /**
     * Specifies codetext for an extra QR barcode, when PatchCode is generated in page mode.
     */
    public function setExtraBarcodeText($value) : void
    {
        $this->getJavaClass()->setExtraBarcodeText($value);
    }

    /**
     * PatchCode format. Choose PatchOnly to generate single PatchCode. Use page format to generate Patch page with PatchCodes as borders.
     * Default value: PatchFormat::PATCH_ONLY
     *
     * @return
     */
    public function getPatchFormat() : int
    {
        return java_cast($this->getJavaClass()->getPatchFormat(), "integer");
    }

    /**
     * PatchCode format. Choose PatchOnly to generate single PatchCode. Use page format to generate Patch page with PatchCodes as borders.
     * Default value: PatchFormat::PATCH_ONLY
     */
    public function setPatchFormat($value) : void
    {
        $this->getJavaClass()->setPatchFormat($value);
    }

    /**
     * Returns a human-readable string representation of this <see cref="PatchCodeParameters"/>.
     * @return A string that represents this <see cref="PatchCodeParameters"/>.
     */
    public function toString() : string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }
}

/**
 * QR structured append parameters.
 */
class QrStructuredAppendParameters extends BaseJavaClass
{
    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    /**
     *  Gets the QR structured append mode parity data.
     */
    public function getParityByte()
    {
        return java_cast($this->getJavaClass()->getParityByte(), "byte");
    }

    /**
     *  Sets the QR structured append mode parity data.
     */
    public function setParityByte($value)
    {
        $this->getJavaClass()->setParityByte($value);
    }

    /**
     * Gets the index of the QR structured append mode barcode. Index starts from 0.
     */
    public function getSequenceIndicator() : int
    {
        return java_cast($this->getJavaClass()->getSequenceIndicator(), "integer");
    }

    /**
     * Sets the index of the QR structured append mode barcode. Index starts from 0.
     */
    public function setSequenceIndicator(int $value)
    {
        $this->getJavaClass()->setSequenceIndicator($value);
    }

    /**
     * Gets the QR structured append mode barcodes quantity. Max value is 16.
     */
    public function getTotalCount() : int
    {
        return java_cast($this->getJavaClass()->getTotalCount(), "integer");
    }

    /**
     * Sets the QR structured append mode barcodes quantity. Max value is 16.
     */
    public function setTotalCount(int $value)
    {
        $this->getJavaClass()->setSequenceIndicator($value);
    }

    function getStateHash() : int
    {
        return java_cast($this->getJavaClass()->getStateHash(), "integer");
    }
}


/**
 * Class BarcodeClassifications EncodeTypes classification
 */
final class BarcodeClassifications
{
    /**
     * Unspecified classification
     */
    const NONE = 0;

    /**
     * Specifies 1D-barcode
     */
    const TYPE_1D = 1;

    /**
     * Specifies 2D-barcode
     */
    const TYPE_2D = 2;

    /**
     * Specifies POSTAL-barcode
     */
    const POSTAL = 3;

    /**
     * Specifies DataBar-barcode
     */
    const DATABAR = 4;

    /**
     * Specifies COUPON-barcode
     */
    const COUPON = 5;
}

final class MacroCharacter
{
    /**
     * None of Macro Characters are added to barcode data
     */
    const NONE = 0;

    /**
     * 05 Macro craracter is added to barcode data in first position.
     * GS1 Data Identifier ISO 15434
     * Character is translated to "[)>\u001E05\u001D" as decoded data header and "\u001E\u0004" as decoded data trailer.
     *
     * //to generate autoidentified GS1 message like this "(10)123ABC(10)123ABC" in ISO 15434 format you need:
     * $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, "10123ABC\u001D10123ABC");
     * $generator->getParameters()->getBarcode()->getDataMatrix()->setMacroCharacters(MacroCharacter::MACRO_05);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(), DecodeType::GS_1_DATA_MATRIX);
     * foreach($reader->readBarCodes() as $result)
     *     print("BarCode CodeText: ".$result->getCodeText());
     */
    const MACRO_05 = 5;

    /**
     * 06 Macro craracter is added to barcode data in first position.
     * ASC MH10 Data Identifier ISO 15434
     * Character is translated to "[)>\u001E06\u001D" as decoded data header and "\u001E\u0004" as decoded data trailer.
     */
    const MACRO_06 = 6;
}


/**
 * PatchCode format. Choose PatchOnly to generate single PatchCode. Use page format to generate Patch page with PatchCodes as borders
 */
final class PatchFormat
{
    /**
     * Generates PatchCode only
     */
    const PATCH_ONLY = 0;

    /**
     * Generates A4 format page with PatchCodes as borders and optional QR in the center
     */
    const A4 = 1;

    /**
     * Generates A4 landscape format page with PatchCodes as borders and optional QR in the center
     */
    const A4_LANDSCAPE = 2;

    /**
     * Generates US letter format page with PatchCodes as borders and optional QR in the center
     */
    const US_LETTER = 3;

    /**
     * Generates US letter landscape format page with PatchCodes as borders and optional QR in the center
     */
    const US_LETTER_LANDSCAPE = 4;
}

/**
 * Specifies style information applied to text.
 */
final class FontStyle
{
    /**
     * Normal text
     */
    const REGULAR = 0;
    /**
     * Bold text
     */
    const BOLD = 1;
    /**
     * Italic text
     */
    const ITALIC = 2;
    /**
     * Underlined text
     */
    const UNDERLINE = 4;
    /**
     * Text with a line through the middle
     */
    const STRIKEOUT = 8;
}

/**
 *
 * Specifies the start or stop symbol of the Codabar barcode specification.
     */
final class CodabarSymbol
{
    private function __construct()
    {
    }

    /**
     * Specifies character A as the start or stop symbol of the Codabar barcode specification.
     */
    const A = 65;
    /**
     * Specifies character B as the start or stop symbol of the Codabar barcode specification.
     */
    const B = 66;
    /**
     * Specifies character C as the start or stop symbol of the Codabar barcode specification.
     */
    const C = 67;
    /**
     * Specifies character D as the start or stop symbol of the Codabar barcode specification.
     */
    const D = 68;
}

/**
 *
 * DataMatrix encoder's encoding mode, default to AUTO
     */
class  DataMatrixEncodeMode
{

    /**
     * Automatically pick up the best encode mode for datamatrix encoding
     */
    const AUTO = "0";
    /**
     * Encodes one alphanumeric or two numeric characters per byte
     */
    const ASCII = "1";
    /**
     * Encode 8 bit values
     */
    const FULL = "6";
    /**
     * Encode with the encoding specified in BarCodeBuilder.CodeTextEncoding
     */
    const CUSTOM = "7";


    /**
     * Uses C40 encoding. Encodes Upper-case alphanumeric, Lower case and special characters
     */
    const C40 = "8";

    /**
     * Uses TEXT encoding. Encodes Lower-case alphanumeric, Upper case and special characters
     */
    const TEXT = "9";

    /**
     * Uses EDIFACT encoding. Uses six bits per character, encodes digits, upper-case letters, and many punctuation marks, but has no support for lower-case letters.
     */
    const EDIFACT = 10;

    /**
     * Uses ANSI X12 encoding.
     */
    const ANSIX12 = 11;

    /**
     * ExtendedCodetext mode allows to manually switch encodation schemes in codetext.
     * Allowed encodation schemes are: EDIFACT, ANSIX12, ASCII, C40, Text, Auto.
     * Extended codetext example: @"\ansix12:ANSIX12TEXT\ascii:backslash must be \\ doubled\edifact:EdifactEncodedText"
     * All backslashes (\) must be doubled in text.
     * 
     * This sample shows how to do codetext in Extended Mode.
     * 
     * $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX);
     * $generator->setCodeText("\\ansix12:ANSIX12TEXT\\ascii:backslash must be \\\\ doubled\\edifact:EdifactEncodedText");
     * $generator->getParameters()->getBarcode()->getDataMatrix().setDataMatrixEncodeMode(DataMatrixEncodeMode.EXTENDED_CODETEXT);
     * $generator->getParameters()->getBarcode()->getCodeTextParameters().setTwoDDisplayText("My Text");
     * $generator->save("test.png");
     */
    const EXTENDED_CODETEXT = 12;
}

/**
 *
 * Specifies the style of dashed border lines.
     */
class BorderDashStyle
{
    /**
     * Specifies a solid line.
     */
    const  SOLID = "0"; //DashStyle.Solid
    /**
     * Specifies a line consisting of dashes.
     */
    const   DASH = "1"; // DashStyle.Dash
    /**
     * Specifies a line consisting of dots.
     */
    const  DOT = "2"; //(DashStyle.Dot

    /**
     * Specifies a line consisting of a repeating pattern of dash-dot.
     */
    const  DASH_DOT = "3"; //DashStyle.DashDot
    /**
     * Specifies a line consisting of a repeating pattern of dash-dot-dot.
     */
    const  DASH_DOT_DOT = "4"; //DashStyle.DashDotDot
}

/**
 *
 * ITF14 barcode's border type
     */
class ITF14BorderType
{
    /**
     * NO border enclosing the barcode
     */
    const NONE = "0";
    /**
     * FRAME enclosing the barcode
     */
    const FRAME = "1";
    /**
     * Tow horizontal bars enclosing the barcode
     */
    const BAR = "2";
    /**
     * FRAME enclosing the barcode
     */
    const FRAME_OUT = "3";
    /**
     * Tow horizontal bars enclosing the barcode
     */
    const BAR_OUT = "4";
}

/**
 *
 * Encoding mode for QR barcodes. It is recomended to Use AUTO with CodeTextEncoding = Encoding.UTF8 for latin symbols or digits and UTF_8_BOM for unicode symbols.
     */
class QREncodeMode
{
    /**
     * Encode codetext as is non-unicode charset. If there is any unicode character, the codetext will be encoded with value which is set in CodeTextEncoding.
     */
    const AUTO = 0;
    /**
     * Encode codetext as plain bytes. If it detects any unicode character, the character will be encoded as two bytes, lower byte first.
     */
    const BYTES = 1;
    //https://en.wikipedia.org/wiki/Byte_order_mark
    /**
     * Encode codetext with UTF8 encoding with first ByteOfMark character.
     */
    const UTF_8_BOM = 2;
    /**
     * Encode codetext with UTF8 encoding with first ByteOfMark character. It can be problems with some barcode scaners.
     */
    const UTF_16_BEBOM = 3;
    /**
     * Encode codetext with value set in the ECI_ENCODING property. It can be problems with some old (pre 2006) barcode scaners.
     * Example how to use ECI encoding
     *
     *     $generator = new BarcodeGenerator(EncodeTypes::QR);
     *     $generator->setCodeText("12345TEXT");
     *     $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::ECI_ENCODING);
     *     $generator->getParameters()->getBarcode()->getQR()->setQrEncodeType(QREncodeType::FORCE_QR);
     *     $generator->getParameters()->getBarcode()->getQR()->setQrECIEncoding(ECIEncodings::UTF8);
     *     $generator->save("test.png", "PNG");
     */
    const ECI_ENCODING = 4;
    /**
     * Extended Channel mode which supports FNC1 first position, FNC1 second position and multi ECI modes.
     * It is better to use QrExtCodetextBuilder for extended codetext generation.
     * Use Display2DText property to set visible text to removing managing characters.
     * Encoding Principles:
     * All symbols "\" must be doubled "\\" in the codetext.
     * FNC1 in first position is set in codetext as as "&lt;FNC1&gt;"
     * FNC1 in second position is set in codetext as as "&lt;FNC1(value)&gt;". The value must be single symbols (a-z, A-Z) or digits from 0 to 99.
     * Group Separator for FNC1 modes is set as 0x1D character '\\u001D'
     *  If you need to insert "&lt;FNC1&gt;" string into barcode write it as "&lt;\FNC1&gt;"
     * ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier
     * TO disable current ECI mode and convert to default JIS8 mode zero mode ECI indetifier is set. "\000000"
     * All unicode characters after ECI identifier are automatically encoded into correct character codeset.
     *  Example how to use FNC1 first position in Extended Mode
     *
     *      $textBuilder = new QrExtCodetextBuilder();
     *      $textBuilder->addPlainCodetext("000%89%%0");
     *      $textBuilder->addFNC1GroupSeparator();
     *      $textBuilder->addPlainCodetext("12345&lt;FNC1&gt;");
     *      //generate barcode
     *      $generator = new BarcodeGenerator(EncodeTypes::QR);
     *      $generator->setCodeText($textBuilder->getExtendedCodetext());
     *      $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::EXTENDED_CODETEXT);
     *      $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
     *      $generator->save("d:/test.png", "PNG");
     *
     *
     * This sample shows how to use FNC1 second position in Extended Mode.
     *
     *    //create codetext
     *    $textBuilder = new QrExtCodetextBuilder();
     *    $textBuilder->addFNC1SecondPosition("12");
     *    $textBuilder->addPlainCodetext("TRUE3456");
     *    //generate barcode
     *    $generator = new BarcodeGenerator(EncodeTypes::QR);
     *    $generator->setCodeText($textBuilder->getExtendedCodetext());
     *    $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
     *    $generator->save("d:/test.png", "PNG");
     *
     *    This sample shows how to use multi ECI mode in Extended Mode.
     *
     *   //create codetext
     *   $textBuilder = new QrExtCodetextBuilder();
     *   $textBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
     *   $textBuilder->addECICodetext(ECIEncodings::UTF8, "Right");
     *   $textBuilder->addECICodetext(ECIEncodings::UTF16BE, "Power");
     *   $textBuilder->addPlainCodetext("t\e\\st");
     *   //generate barcode
     *   $generator = new BarcodeGenerator(EncodeTypes::QR);
     *   $generator->setCodeText($textBuilder->getExtendedCodetext());
     *   $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::EXTENDED_CODETEXT);
     *   $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
     *   $generator->save("d:/test.png", "PNG");
     */
    const EXTENDED_CODETEXT = 5;

}


/**
 *
 * Specify the type of the ECC to encode.
     */
class  DataMatrixEccType
{
    /**
     * Specifies that encoded Ecc type is defined by default Reed-Solomon error correction or ECC 200.
     */
    const ECC_AUTO = "0";
    /**
     * Specifies that encoded Ecc type is defined ECC 000.
     */
    const ECC_000 = "1";
    /**
     * Specifies that encoded Ecc type is defined ECC 050.
     */
    const ECC_050 = "2";
    /**
     * Specifies that encoded Ecc type is defined ECC 080.
     */
    const ECC_080 = "3";
    /**
     * Specifies that encoded Ecc type is defined ECC 100.
     */
    const ECC_100 = "4";
    /**
     * Specifies that encoded Ecc type is defined ECC 140.
     */
    const ECC_140 = "5";
    /**
     * Specifies that encoded Ecc type is defined ECC 200. Recommended to use.
     */
    const ECC_200 = "6";
}

/**
 *
 * Version of QR Code.
 * From Version1 to Version40 for QR code and from M1 to M4 for MicroQr.
     */
class QRVersion
{
    /**
     * Specifies to automatically pick up the best version for QR.
     * This is default value.
     */
    const AUTO = "0";

    /**
     * Specifies version 1 with 21 x 21 modules.
     */
    const VERSION_01 = "1";

    /**
     * Specifies version 2 with 25 x 25 modules.
     */
    const VERSION_02 = "2";

    /**
     * Specifies version 3 with 29 x 29 modules.
     */
    const VERSION_03 = "3";

    /**
     * Specifies version 4 with 33 x 33 modules.
     */
    const VERSION_04 = "4";

    /**
     * Specifies version 5 with 37 x 37 modules.
     */
    const VERSION_05 = "5";

    /**
     * Specifies version 6 with 41 x 41 modules.
     */
    const VERSION_06 = "6";

    /**
     * Specifies version 7 with 45 x 45 modules.
     */
    const VERSION_07 = "7";

    /**
     * Specifies version 8 with 49 x 49 modules.
     */
    const VERSION_08 = "8";

    /**
     * Specifies version 9 with 53 x 53 modules.
     */
    const VERSION_09 = "9";


    /**
     * Specifies version 10 with 57 x 57 modules.
     */
    const VERSION_10 = "10";

    /**
     * Specifies version 11 with 61 x 61 modules.
     */
    const VERSION_11 = "11";

    /**
     * Specifies version 12 with 65 x 65 modules.
     */
    const VERSION_12 = "12";

    /**
     * Specifies version 13 with 69 x 69 modules.
     */
    const VERSION_13 = "13";

    /**
     * Specifies version 14 with 73 x 73 modules.
     */
    const VERSION_14 = "14";

    /**
     * Specifies version 15 with 77 x 77 modules.
     */
    const VERSION_15 = "15";

    /**
     * Specifies version 16 with 81 x 81 modules.
     */
    const VERSION_16 = "16";

    /**
     * Specifies version 17 with 85 x 85 modules.
     */
    const VERSION_17 = "17";

    /**
     * Specifies version 18 with 89 x 89 modules.
     */
    const VERSION_18 = "18";

    /**
     * Specifies version 19 with 93 x 93 modules.
     */
    const VERSION_19 = "19";

    /**
     * Specifies version 20 with 97 x 97 modules.
     */
    const VERSION_20 = "20";

    /**
     * Specifies version 21 with 101 x 101 modules.
     */
    const VERSION_21 = "21";

    /**
     * Specifies version 22 with 105 x 105 modules.
     */
    const VERSION_22 = "22";

    /**
     * Specifies version 23 with 109 x 109 modules.
     */
    const VERSION_23 = "23";

    /**
     * Specifies version 24 with 113 x 113 modules.
     */
    const VERSION_24 = "24";

    /**
     * Specifies version 25 with 117 x 117 modules.
     */
    const VERSION_25 = "25";


    /**
     * Specifies version 26 with 121 x 121 modules.
     */
    const VERSION_26 = "26";

    /**
     * Specifies version 27 with 125 x 125 modules.
     */
    const VERSION_27 = "27";

    /**
     * Specifies version 28 with 129 x 129 modules.
     */
    const VERSION_28 = "28";

    /**
     * Specifies version 29 with 133 x 133 modules.
     */
    const VERSION_29 = "29";

    /**
     * Specifies version 30 with 137 x 137 modules.
     */
    const VERSION_30 = "30";

    /**
     * Specifies version 31 with 141 x 141 modules.
     */
    const VERSION_31 = "31";

    /**
     * Specifies version 32 with 145 x 145 modules.
     */
    const VERSION_32 = "32";

    /**
     * Specifies version 33 with 149 x 149 modules.
     */
    const VERSION_33 = "33";

    /**
     * Specifies version 34 with 153 x 153 modules.
     */
    const VERSION_34 = "34";

    /**
     * Specifies version 35 with 157 x 157 modules.
     */
    const VERSION_35 = "35";

    /**
     * Specifies version 36 with 161 x 161 modules.
     */
    const VERSION_36 = "36";

    /**
     * Specifies version 37 with 165 x 165 modules.
     */
    const VERSION_37 = "37";

    /**
     * Specifies version 38 with 169 x 169 modules.
     */
    const VERSION_38 = "38";

    /**
     * Specifies version 39 with 173 x 173 modules.
     */
    const VERSION_39 = "39";

    /**
     * Specifies version 40 with 177 x 177 modules.
     */
    const VERSION_40 = "40";

    /**
     * Specifies version M1 for Micro QR with 11 x 11 modules.
     */
    const VERSION_M1 = "101";

    /**
     * Specifies version M2 for Micro QR with 13 x 13 modules.
     */
    const VERSION_M2 = "102";

    /**
     * Specifies version M3 for Micro QR with 15 x 15 modules.
     */
    const VERSION_M3 = "103";

    /**
     * Specifies version M4 for Micro QR with 17 x 17 modules.
     */
    const VERSION_M4 = "104";
}

/**
 *
 * Specifies the Aztec symbol mode.
 *
 *      $generator = new BarcodeGenerator(EncodeTypes::AZTEC);
 *      $generator->setCodeText("125");
 *  $generator->getParameters()->getBarcode()->getAztec()->setAztecSymbolMode(AztecSymbolMode::RUNE);
 *      $generator->save("test.png", "PNG");
 */
class  AztecSymbolMode
{
    /**
     * Specifies to automatically pick up the best symbol (COMPACT or FULL-range) for Aztec.
     * This is default value.
     */
    const AUTO = "0";
    /**
     * Specifies the COMPACT symbol for Aztec.
     * Aztec COMPACT symbol permits only 1, 2, 3 or 4 layers.
     */
    const COMPACT = "1";
    /**
     * Specifies the FULL-range symbol for Aztec.
     * Aztec FULL-range symbol permits from 1 to 32 layers.
     */
    const FULL_RANGE = "2";
    /**
     * Specifies the RUNE symbol for Aztec.
     * Aztec Runes are a series of small but distinct machine-readable marks. It permits only number value from 0 to 255.
     */
    const RUNE = "3";
}

/**
 *
 * pdf417 barcode's error correction level, from level 0 to level 9, level 0 means no error correction, level 9 means best error correction
     */
class Pdf417ErrorLevel
{

    /**
     * level = 0.
     */
    const LEVEL_0 = "0";
    /**
     * level = 1.
     */
    const LEVEL_1 = "1";
    /**
     * level = 2.
     */
    const LEVEL_2 = "2";
    /**
     * level = 3.
     */
    const LEVEL_3 = "3";
    /**
     * level = 4.
     */
    const LEVEL_4 = "4";
    /**
     * level = 5.
     */
    const LEVEL_5 = "5";
    /**
     * level = 6.
     */
    const LEVEL_6 = "6";
    /**
     * level = 7.
     */
    const LEVEL_7 = "7";
    /**
     * level = 8.
     */
    const LEVEL_8 = "8";
}


/**
 *
 * Pdf417 barcode's compation mode
     */
class  Pdf417CompactionMode
{
    /**
     * auto detect compation mode
     */
    const AUTO = "0";
    /**
     * text compaction
     */
    const TEXT = "1";
    /**
     * numeric compaction mode
     */
    const NUMERIC = "2";
    /**
     * binary compaction mode
     */
    const BINARY = "3";
}

/**
 *
 * Level of Reed-Solomon error correction. From low to high: LEVEL_L, LEVEL_M, LEVEL_Q, LEVEL_H.
     */
class QRErrorLevel
{
    /**
     * Allows recovery of 7% of the code text
     */
    const LEVEL_L = "0";
    /**
     * Allows recovery of 15% of the code text
     */
    const LEVEL_M = "1";
    /**
     * Allows recovery of 25% of the code text
     */
    const LEVEL_Q = "2";
    /**
     * Allows recovery of 30% of the code text
     */
    const LEVEL_H = "3";
}


/**
 *
 * QR / MicroQR selector mode. Select FORCE_QR for standard QR symbols, AUTO for MicroQR.
 * FORCE_MICRO_QR is used for strongly MicroQR symbol generation if it is possible.
     */
class  QREncodeType
{
    /**
     * Mode starts barcode version negotiation from MicroQR V1
     */
    const AUTO = "0";
    /**
     * Mode starts barcode version negotiation from QR V1
     */
    const FORCE_QR = "1";
    /**
     * Mode starts barcode version negotiation from from MicroQR V1 to V4. If data cannot be encoded into MicroQR, exception is thrown.
     */
    const FORCE_MICRO_QR = "2";
}

/**
 *
 * Specifies the checksum algorithm for Codabar
     */
class CodabarChecksumMode
{

    /**
     * Specifies Mod 10 algorithm for Codabar.
     */
    const MOD_10 = "0";

    /**
     * Specifies Mod 16 algorithm for Codabar (recomended AIIM).
     */
    const MOD_16 = "1";
}

/**
 *
 * Codetext location
     */
class  CodeLocation
{
    /**
     * Codetext below barcode.
     */
    const BELOW = "0";

    /**
     * Codetext above barcode.
     */
    const ABOVE = "1";

    /**
     * Hide codetext.
     */
    const NONE = "2";
}


/**
 *
 * Font size mode.
     */
class  FontMode
{
    /**
     * Automatically calculate Font size based on barcode size.
     */
    const AUTO = "0";

    /**
     * Use Font sized defined by user.
     */
    const MANUAL = "1";
}

/**
 *
 * Text alignment.
     */
class  TextAlignment
{
    /**
     * Left position.
     */
    const LEFT = "0";

    /**
     * Center position.
     */
    const CENTER = "1";

    /**
     * Right position.
     */
    const RIGHT = "2";
}

/**
 * Specifies the different types of automatic sizing modes.
 * Default value is AutoSizeMode::NONE.
 * <hr><blockquote><pre>
 *  This sample shows how to create and save a BarCode image.
 *  <pre>
 *  $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX);
 *  $generator->setAutoSizeMode(AutoSizeMode.NEAREST);
 *  $generator->getBarCodeWidth().setMillimeters(50);
 *  $generator->getBarCodeHeight().setInches(1.3f);
 *  $generator->save("test.png");
 *  </blockquote></hr>
 */
class  AutoSizeMode
{
    /**
     * Automatic resizing is disabled. Default value.
     */
    const NONE = '0';  //or CUSTOM, or DEFAULT

    /**
     * Barcode resizes to nearest lowest possible size
     * which are specified by BarCodeWidth and BarCodeHeight properties.
     */
    const NEAREST = '1';

    /**
     *  Resizes barcode to specified size with little scaling
     *  but it can be little damaged in some cases
     *  because using interpolation for scaling.
     *  Size can be specified by BarcodeGenerator.BarCodeWidth
     *  and BarcodeGenerator.BarCodeHeight properties.
     * <hr><blockquote><pre>
     *  This sample shows how to create and save a BarCode image in Scale mode.
     *  <pre>
     *      $generator = new BarcodeGenerator( EncodeTypes::DATA_MATRIX);
     *      $generator->getParameters()->getBarcode()->setAutoSizeMode(AutoSizeMode::INTERPOLATION);
     *      $generator->getParameters()->getBarcode()->getBarCodeWidth()->setMillimeters(50);
     *      $generator->getParameters()->getBarcode()->getBarCodeHeight()->setInches(1.3);
     *      $generator->save("test.png", "PNG);
     *    </pre>
     *  </pre></blockquote></hr>
     */
    const INTERPOLATION = '2';
}

/**
 * Specifies the unit of measure for the given data.
 */
class GraphicsUnit
{
    /**
     * Specifies the world coordinate system unit as the unit of measure.
     */
    const WORLD = 0;

    /**
     * Specifies the unit of measure of the display device. Typically pixels for video displays, and 1/100 inch for printers.
     */
    const DISPLAY = 1;

    /**
     * 	Specifies a device pixel as the unit of measure.
     */
    const PIXEL = 2;

    /**
     * Specifies a printer's point  = 1/72 inch) as the unit of measure.
     */
    const POINT = 3;

    /**
     * 	Specifies the inch as the unit of measure.
     */
    const INCH = 4;

    /**
     * Specifies the document unit  = 1/300 inch) as the unit of measure.
     */
    const DOCUMENT = 5;

    /**
     * Specifies the millimeter as the unit of measure.
     */
    const MILLIMETER = 6;
}

/**
 * Specifies the type of barcode to encode.
 */
class EncodeTypes
{

    /**
     * Unspecified encode type.
     */
    const  NONE = "-1";

    /**
     * Specifies that the data should be encoded with CODABAR barcode specification
     */
    const  CODABAR = "0";

    /**
     * Specifies that the data should be encoded with CODE 11 barcode specification
     */
    const  CODE_11 = "1";

    /**
     * Specifies that the data should be encoded with Standard CODE 39 barcode specification
     */
    const  CODE_39_STANDARD = "2";

    /**
     * Specifies that the data should be encoded with Extended CODE 39 barcode specification
     */
    const  CODE_39_EXTENDED = "3";

    /**
     * Specifies that the data should be encoded with Standard CODE 93 barcode specification
     */
    const  CODE_93_STANDARD = "4";

    /**
     * Specifies that the data should be encoded with Extended CODE 93 barcode specification
     */
    const  CODE_93_EXTENDED = "5";

    /**
     * Specifies that the data should be encoded with CODE 128 barcode specification
     */
    const  CODE_128 = "6";

    /**
     * Specifies that the data should be encoded with GS1 Code 128 barcode specification. The codetext must contains parentheses for AI.
     */
    const  GS_1_CODE_128 = "7";

    /**
     * Specifies that the data should be encoded with EAN-8 barcode specification
     */
    const  EAN_8 = "8";

    /**
     * Specifies that the data should be encoded with EAN-13 barcode specification
     */
    const  EAN_13 = "9";

    /**
     * Specifies that the data should be encoded with EAN14 barcode specification
     */
    const  EAN_14 = "10";

    /**
     * Specifies that the data should be encoded with SCC14 barcode specification
     */
    const  SCC_14 = "11";

    /**
     * Specifies that the data should be encoded with SSCC18 barcode specification
     */
    const  SSCC_18 = "12";

    /**
     * Specifies that the data should be encoded with UPC-A barcode specification
     */
    const  UPCA = "13";

    /**
     * Specifies that the data should be encoded with UPC-E barcode specification
     */
    const  UPCE = "14";

    /**
     * Specifies that the data should be encoded with isBN barcode specification
     */
    const  ISBN = "15";

    /**
     * Specifies that the data should be encoded with ISSN barcode specification
     */
    const  ISSN = "16";

    /**
     * Specifies that the data should be encoded with ISMN barcode specification
     */
    const  ISMN = "17";

    /**
     * Specifies that the data should be encoded with Standard 2 of 5 barcode specification
     */
    const  STANDARD_2_OF_5 = "18";

    /**
     * Specifies that the data should be encoded with INTERLEAVED 2 of 5 barcode specification
     */
    const  INTERLEAVED_2_OF_5 = "19";

    /**
     * Represents Matrix 2 of 5 BarCode
     */
    const  MATRIX_2_OF_5 = "20";

    /**
     * Represents Italian Post 25 barcode.
     */
    const  ITALIAN_POST_25 = "21";

    /**
     * Represents IATA 2 of 5 barcode.IATA (International Air Transport Assosiation) uses this barcode for the management of air cargo.
     */
    const  IATA_2_OF_5 = "22";

    /**
     * Specifies that the data should be encoded with ITF14 barcode specification
     */
    const  ITF_14 = "23";

    /**
     * Represents ITF-6  Barcode.
     */
    const  ITF_6 = "24";

    /**
     * Specifies that the data should be encoded with MSI Plessey barcode specification
     */
    const  MSI = "25";

    /**
     * Represents VIN (Vehicle Identification Number) Barcode.
     */
    const  VIN = "26";

    /**
     * Represents Deutsch Post barcode, This EncodeType is also known as Identcode,CodeIdentcode,German Postal 2 of 5 Identcode,
     * Deutsch Post AG Identcode, Deutsch Frachtpost Identcode,  Deutsch Post AG (DHL)
     */
    const  DEUTSCHE_POST_IDENTCODE = "27";

    /**
     * Represents Deutsch Post Leitcode Barcode,also known as German Postal 2 of 5 Leitcode, CodeLeitcode, Leitcode, Deutsch Post AG (DHL).
     */
    const  DEUTSCHE_POST_LEITCODE = "28";

    /**
     * Represents OPC(Optical Product Code) Barcode,also known as , VCA Barcode VCA OPC, Vision Council of America OPC Barcode.
     */
    const  OPC = "29";

    /**
     * Represents PZN barcode.This EncodeType is also known as Pharmacy central number, Pharmazentralnummer
     */
    const  PZN = "30";

    /**
     * Represents Code 16K barcode.
     */
    const  CODE_16_K = "31";

    /**
     * Represents Pharmacode barcode.
     */
    const  PHARMACODE = "32";

    /**
     * 2D barcode symbology DataMatrix
     */
    const  DATA_MATRIX = "33";

    /**
     * Specifies that the data should be encoded with QR Code barcode specification
     */
    const  QR = "34";

    /**
     * Specifies that the data should be encoded with Aztec barcode specification
     */
    const  AZTEC = "35";

    /**
     * Specifies that the data should be encoded with Pdf417 barcode specification
     */
    const  PDF_417 = "36";

    /**
     * Specifies that the data should be encoded with MacroPdf417 barcode specification
     */
    const  MACRO_PDF_417 = "37";

    /**
     * 2D barcode symbology DataMatrix with GS1 string format
     */
    const  GS_1_DATA_MATRIX = "48";

    /**
     * Specifies that the data should be encoded with MicroPdf417 barcode specification
     */
    const  MICRO_PDF_417 = "55";

    /**
     * 2D barcode symbology QR with GS1 string format
     */
    const  GS_1_QR = "56";

    /**
     * Specifies that the data should be encoded with MaxiCode barcode specification
     */
    const  MAXI_CODE = "57";

    /**
     * Specifies that the data should be encoded with DotCode barcode specification
     */
    const  DOT_CODE = "60";

    /**
     * Represents Australia Post Customer BarCode
     */
    const  AUSTRALIA_POST = "38";

    /**
     * Specifies that the data should be encoded with Postnet barcode specification
     */
    const  POSTNET = "39";

    /**
     * Specifies that the data should be encoded with Planet barcode specification
     */
    const  PLANET = "40";

    /**
     * Specifies that the data should be encoded with USPS OneCode barcode specification
     */
    const  ONE_CODE = "41";

    /**
     * Represents RM4SCC barcode. RM4SCC (Royal Mail 4-state Customer Code) is used for automated mail sort process in UK.
     */
    const  RM_4_SCC = "42";

    /**
     * Specifies that the data should be encoded with GS1 Databar omni-directional barcode specification.
     */
    const  DATABAR_OMNI_DIRECTIONAL = "43";

    /**
     * Specifies that the data should be encoded with GS1 Databar truncated barcode specification.
     */
    const  DATABAR_TRUNCATED = "44";

    /**
     * Represents GS1 DATABAR limited barcode.
     */
    const  DATABAR_LIMITED = "45";

    /**
     * Represents GS1 Databar expanded barcode.
     */
    const  DATABAR_EXPANDED = "46";

    /**
     * Represents GS1 Databar expanded stacked barcode.
     */
    const  DATABAR_EXPANDED_STACKED = "52";

    /**
     * Represents GS1 Databar stacked barcode.
     */
    const  DATABAR_STACKED = "53";

    /**
     * Represents GS1 Databar stacked omni-directional barcode.
     */
    const  DATABAR_STACKED_OMNI_DIRECTIONAL = "54";

    /**
     * Specifies that the data should be encoded with Singapore Post Barcode barcode specification
     */
    const  SINGAPORE_POST = "47";

    /**
     * Specifies that the data should be encoded with Australian Post Domestic eParcel Barcode barcode specification
     */
    const  AUSTRALIAN_POSTE_PARCEL = "49";

    /**
     * Specifies that the data should be encoded with Swiss Post Parcel Barcode barcode specification. Supported types: Domestic Mail, International Mail, Additional Services (new)
     */
    const  SWISS_POST_PARCEL = "50";

    /**
     * Represents Patch code barcode
     */
    const  PATCH_CODE = "51";

    /**
     * Specifies that the data should be encoded with Code32 barcode specification
     */
    const  CODE_32 = "58";

    /**
     * Specifies that the data should be encoded with DataLogic 2 of 5 barcode specification
     */
    const  DATA_LOGIC_2_OF_5 = "59";

    /**
     * Specifies that the data should be encoded with Dutch KIX barcode specification
     */
    const  DUTCH_KIX = "61";

    /**
     * Specifies that the data should be encoded with UPC coupon with GS1-128 Extended Code barcode specification.
     * An example of the input string:
     * BarCodeBuilder->setCodetext("514141100906(8102)03"),
     * where UPCA part is "514141100906", GS1Code128 part is (8102)03.
     */
    const  UPCA_GS_1_CODE_128_COUPON = "62";

    /**
     * Specifies that the data should be encoded with UPC coupon with GS1 DataBar addition barcode specification.
     * An example of the input string:
     * BarCodeBuilder->setCodetext("514141100906(8110)106141416543213500110000310123196000"),
     * where UPCA part is "514141100906", DATABAR part is "(8110)106141416543213500110000310123196000".
     * To change the caption, use barCodeBuilder->getCaptionAbove()->setText("company prefix + offer code");
     */
    const  UPCA_GS_1_DATABAR_COUPON = "63";

    /**
     * Specifies that the data should be encoded with Codablock-F barcode specification.
     */
    const  CODABLOCK_F = "64";

    /**
     * Specifies that the data should be encoded with GS1 Codablock-F barcode specification. The codetext must contains parentheses for AI.
     */
    const  GS_1_CODABLOCK_F = "65";
}

/**
 * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
 * about the used references for encoding the data in the symbol.
 * Current implementation consists all well known charset encodings.
 * Currently, it is used only for QR 2D barcode.
 *
 * Example how to use ECI encoding
 *
 *     $generator = new BarcodeGenerator(EncodeTypes::QR);
 *     generator->setCodeText("12345TEXT");
 *     generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::ECI_ENCODING);
 *     generator->getParameters()->getBarcode()->getQR()->setQrEncodeType(QREncodeType::FORCE_QR);
 *     generator->getParameters()->getBarcode()->getQR()->setQrECIEncoding(ECIEncodings::UTF_8);
 *     generator->save("test.png", "PNG");
     */
class ECIEncodings
{

    /**
     * ISO/IEC 8859-1 Latin alphabet No. 1 encoding. ECI Id:"\000003"
     */
    const ISO_8859_1 = 3;
    /**
     * ISO/IEC 8859-2 Latin alphabet No. 2 encoding. ECI Id:"\000004"
     */
    const ISO_8859_2 = 4;
    /**
     * ISO/IEC 8859-3 Latin alphabet No. 3 encoding. ECI Id:"\000005"
     */
    const ISO_8859_3 = 5;
    /**
     * ISO/IEC 8859-4 Latin alphabet No. 4 encoding. ECI Id:"\000006"
     */
    const ISO_8859_4 = 6;
    /**
     * ISO/IEC 8859-5 Latin/Cyrillic alphabet encoding. ECI Id:"\000007"
     */
    const ISO_8859_5 = 7;
    /**
     * ISO/IEC 8859-6 Latin/Arabic alphabet encoding. ECI Id:"\000008"
     */
    const ISO_8859_6 = 8;
    /**
     * ISO/IEC 8859-7 Latin/Greek alphabet encoding. ECI Id:"\000009"
     */
    const ISO_8859_7 = 9;
    /**
     * ISO/IEC 8859-8 Latin/Hebrew alphabet encoding. ECI Id:"\000010"
     */
    const ISO_8859_8 = 10;
    /**
     * ISO/IEC 8859-9 Latin alphabet No. 5 encoding. ECI Id:"\000011"
     */
    const ISO_8859_9 = 11;
    /**
     * ISO/IEC 8859-10 Latin alphabet No. 6 encoding. ECI Id:"\000012"
     */
    const ISO_8859_10 = 12;
    /**
     * ISO/IEC 8859-11 Latin/Thai alphabet encoding. ECI Id:"\000013"
     */
    const ISO_8859_11 = 13;
    //14 is reserved
    /**
     * ISO/IEC 8859-13 Latin alphabet No. 7 (Baltic Rim) encoding. ECI Id:"\000015"
     */
    const ISO_8859_13 = 15;
    /**
     * ISO/IEC 8859-14 Latin alphabet No. 8 (Celtic) encoding. ECI Id:"\000016"
     */
    const ISO_8859_14 = 16;
    /**
     * ISO/IEC 8859-15 Latin alphabet No. 9 encoding. ECI Id:"\000017"
     */
    const ISO_8859_15 = 17;
    /**
     * ISO/IEC 8859-16 Latin alphabet No. 10 encoding. ECI Id:"\000018"
     */
    const ISO_8859_16 = 18;
    //19 is reserved
    /**
     * Shift JIS (JIS X 0208 Annex 1 + JIS X 0201) encoding. ECI Id:"\000020"
     */
    const Shift_JIS = 20;
    //
    /**
     * Windows 1250 Latin 2 (Central Europe) encoding. ECI Id:"\000021"
     */
    const Win1250 = 21;
    /**
     * Windows 1251 Cyrillic encoding. ECI Id:"\000022"
     */
    const Win1251 = 22;
    /**
     * Windows 1252 Latin 1 encoding. ECI Id:"\000023"
     */
    const Win1252 = 23;
    /**
     * Windows 1256 Arabic encoding. ECI Id:"\000024"
     */
    const Win1256 = 24;
    //
    /**
     * ISO/IEC 10646 UCS-2 (High order byte first) encoding. ECI Id:"\000025"
     */
    const UTF16BE = 25;
    /**
     * ISO/IEC 10646 UTF-8 encoding. ECI Id:"\000026"
     */
    const UTF8 = 26;
    //
    /**
     * ISO/IEC 646:1991 International Reference Version of ISO 7-bit coded character set encoding. ECI Id:"\000027"
     */
    const US_ASCII = 27;
    /**
     * Big 5 (Taiwan) Chinese Character Set encoding. ECI Id:"\000028"
     */
    const Big5 = 28;
    /**
     * GB (PRC) Chinese Character Set encoding. ECI Id:"\000029"
     */
    const GB18030 = 29;
    /**
     * Korean Character Set encoding. ECI Id:"\000030"
     */
    const EUC_KR = 30;

    /**
     * No Extended Channel Interpretation/p>
     */
    const NONE = 0;
}

/**
 * Enable checksum during generation for 1D barcodes.
 * Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible.
 * Checksum never used: Codabar
 * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN
 * Checksum always used: Rest symbologies
 */
class EnableChecksum
{
    /**
     * If checksum is required by the specification - it will be attached.
     */
    const DEFAULT = 0;

    /**
     * Always use checksum if possible.
     */
    const YES = 1;

    /**
     * Do not use checksum.
     */
     const NO = 2;
}

/**
 * <p>
 * Specifies the file format of the image.
 * </p>
 */
class BarCodeImageFormat
{
    /**
     * <p>
     * Specifies the W3C Portable Network Graphics (PNG) image format.
     * </p>
     */
    const PNG = "PNG";

    /**
     * <p>
     * Specifies the Joint Photographic Experts Group (JPEG) image format.
     * </p>
     */
    const JPEG = "JPEG";

    /**
     * <p>
     * Specifies the bitmap (BMP) image format.
     * </p>
     */
    const BMP = "BMP";

    /**
     * <p>
     * Specifies the Graphics Interchange Format (GIF) image format.
     * </p>
     */
    const GIF = "GIF";
}
?>