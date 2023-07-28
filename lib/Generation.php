<?php
require_once('Joint.php');

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
     * @param int|null $encodeType Barcode symbology type. Use EncodeTypes class to setup a symbology
     * @param string|null $codeText Text to be encoded. Should be encoded in UTF-8 encoding
     * @code
     *      $barcodeGenerator = new BarcodeGenerator(EncodeTypes::EAN_14, "332211");
     * @endcode
     * @throws BarcodeException
     */
    public function __construct(?int $encodeType, ?string $codeText)
    {
        try
        {
            $java_class = new java(self::JAVA_CLASS_NAME, $encodeType, $codeText);
            parent::__construct($java_class);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($javaClass): BarcodeGenerator
    {
        $barcodeGenerator = new BarcodeGenerator( null, null);
        $barcodeGenerator->setJavaClass($javaClass);
        return $barcodeGenerator;
    }

    protected function init(): void
    {
        try
        {
            $this->parameters = new BaseGenerationParameters($this->getJavaClass()->getParameters());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Barcode symbology type.
     */
    public function getBarcodeType(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getBarcodeType(), "integer");
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
            $this->getJavaClass()->setBarcodeType($value);
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
    public function generateBarCodeImage(int $format): string
    {
        try
        {
            $base64Image = java_cast($this->getJavaClass()->generateBarCodeImage($format), "string");
            return ($base64Image);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
    public function save(string $filePath, int $format): void  //TODO BARCODEPHP-87
    {
        try
        {
            $image = $this->generateBarCodeImage($format); //TODO BARCODEPHP-87
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
            return java_cast($this->getJavaClass()->getCodeText(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Text to be encoded.
     */
    public function setCodeText(string $value): void
    {
        try
        {
            $this->getJavaClass()->setCodeText($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Exports BarCode properties to the xml-stream specified
     * @param $filePath path to xml file
     * @return bool Whether or not export completed successfully. Returns <b>True</b> in case of success; <b>False</b> Otherwise </para>
     */
    public function exportToXml($filePath): bool
    {
        try
        {
            $xmlData = java_cast($this->getJavaClass()->exportToXml(), "string");
            $isSaved = $xmlData != null;
            if ($isSaved)
            {
                file_put_contents($filePath, $xmlData);
            }
            return $isSaved;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Imports BarCode properties from the xml-file specified and creates BarcodeGenerator instance.
     * </p>
     * @param $resource path to xml file or http resource
     * @return BarcodeGenerator instance
     */
    public static function importFromXml($resource):BarcodeGenerator
    {
        try
        {
            if(isPath($resource))
                $resource = fopen($resource, "r");
            $xmlData = (stream_get_contents($resource));
            $offset = 6;
            $xmlData = substr($xmlData, $offset, strlen($xmlData) - $offset);
            return self::construct(java(self::JAVA_CLASS_NAME)->importFromXml($xmlData));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Barcode generation parameters.
 */
class BarcodeParameters extends BaseJavaClass
{
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

    protected function init(): void
    {
        try
        {
            $this->xDimension = new Unit($this->getJavaClass()->getXDimension());
            $this->barHeight = new Unit($this->getJavaClass()->getBarHeight());
            $this->codeTextParameters = new CodetextParameters($this->getJavaClass()->getCodeTextParameters());
            $this->postal = new PostalParameters($this->getJavaClass()->getPostal());
            $this->australianPost = new AustralianPostParameters($this->getJavaClass()->getAustralianPost());
            $this->codablock = new CodablockParameters($this->getJavaClass()->getCodablock());
            $this->dataBar = new DataBarParameters($this->getJavaClass()->getDataBar());
            $this->gs1CompositeBar = new GS1CompositeBarParameters($this->getJavaClass()->getGS1CompositeBar());
            $this->dataMatrix = new DataMatrixParameters($this->getJavaClass()->getDataMatrix());
            $this->code16K = new Code16KParameters($this->getJavaClass()->getCode16K());
            $this->itf = new ITFParameters($this->getJavaClass()->getITF());
            $this->qr = new QrParameters($this->getJavaClass()->getQR());
            $this->pdf417 = new Pdf417Parameters($this->getJavaClass()->getPdf417());
            $this->maxiCode = new MaxiCodeParameters($this->getJavaClass()->getMaxiCode());
            $this->aztec = new AztecParameters($this->getJavaClass()->getAztec());
            $this->code128 = new Code128Parameters($this->getJavaClass()->getCode128());
            $this->codabar = new CodabarParameters($this->getJavaClass()->getCodabar());
            $this->coupon = new CouponParameters($this->getJavaClass()->getCoupon());
            $this->hanXin = new HanXinParameters($this->getJavaClass()->getHanXin());
            $this->supplement = new SupplementParameters($this->getJavaClass()->getSupplement());
            $this->dotCode = new DotCodeParameters($this->getJavaClass()->getDotCode());
            $this->padding = new Padding($this->getJavaClass()->getPadding());
            $this->patchCode = new PatchCodeParameters($this->getJavaClass()->getPatchCode());
            $this->barWidthReduction = new Unit($this->getJavaClass()->getBarWidthReduction());
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
            $this->getJavaClass()->setPatchCode($value->getJavaClass());
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
            $this->getJavaClass()->setXDimension($value->getJavaClass());
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
            $this->getJavaClass()->setBarWidthReduction($value->getJavaClass());
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            $hexColor = strtoupper(dechex(java_cast($this->getJavaClass()->getBarColor(), "integer")));
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
            $this->getJavaClass()->setBarColor(hexdec($value));
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
            $this->getJavaClass()->setPadding($value->getJavaClass());
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
    public function getChecksumAlwaysShow(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getChecksumAlwaysShow(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Always display checksum digit in the human readable text for Code128 and GS1Code128 barcodes.
     */
    public function setChecksumAlwaysShow(int $value): void
    {
        try
        {
            $this->getJavaClass()->setChecksumAlwaysShow($value);
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
            return java_cast($this->getJavaClass()->isChecksumEnabled(), "integer");
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
            $this->getJavaClass()->setChecksumEnabled($value);
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
            return java_cast($this->getJavaClass()->getEnableEscape(), "boolean");
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
            $this->getJavaClass()->setEnableEscape($value);
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
            return java_cast($this->getJavaClass()->getWideNarrowRatio(), "float");
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
            $this->getJavaClass()->setWideNarrowRatio($value);
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
            return java_cast($this->getJavaClass()->getFilledBars(), "boolean");
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
            $this->getJavaClass()->setFilledBars($value);
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
    public function getGS1CompositeBar() : GS1CompositeBarParameters
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
    public function setGS1CompositeBar(GS1CompositeBarParameters $value) : void
    {
        $this->gs1CompositeBar = $value;
        $this->getJavaClass()->setGS1CompositeBar($value->getJavaClass());
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
    public function getCode128() : Code128Parameters
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
    public function getHanXin() : HanXinParameters
    {
        return $this->hanXin;
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

    private $imageWidth;
    private $imageHeight;

    protected function init(): void
    {
        try
        {
            $this->captionAbove = new CaptionParameters($this->getJavaClass()->getCaptionAbove());
            $this->captionBelow = new CaptionParameters($this->getJavaClass()->getCaptionBelow());
            $this->barcodeParameters = new BarcodeParameters($this->getJavaClass()->getBarcode());
            $this->borderParameters = new BorderParameters($this->getJavaClass()->getBorder());
            $this->imageWidth = new Unit($this->getJavaClass()->getImageWidth());
            $this->imageHeight = new Unit($this->getJavaClass()->getImageHeight());
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
    public function getUseAntiAlias() : bool
    {
        return java_cast($this->getJavaClass()->getUseAntiAlias(), "boolean");
    }

    /**
     * <p>
     * Sets a value indicating whether is used anti-aliasing mode to render image
     * </p>
     */
    public function setUseAntiAlias(bool $value) : void
    {
        $this->getJavaClass()->setUseAntiAlias($value);
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
            $hexColor = strtoupper(dechex(java_cast($this->getJavaClass()->getBackColor(), "integer")));
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
     * @param string $hexValue  value of background color.
     * @throws BarcodeException
     */
    public function setBackColor(string $hexValue): void
    {
        try
        {
            $this->getJavaClass()->setBackColor(hexdec($hexValue));
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
            return java_cast($this->getJavaClass()->getResolution(), "float");
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
            $this->getJavaClass()->setResolution($value);
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
    public function getRotationAngle(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getRotationAngle(), "float");
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
            $this->getJavaClass()->setRotationAngle($value);
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
            $this->getJavaClass()->setCaptionAbove($value->getJavaClass());
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
            $this->getJavaClass()->setCaptionBelow($value->getJavaClass());
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
            return java_cast($this->getJavaClass()->getAutoSizeMode(), "integer");
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
            $this->getJavaClass()->setAutoSizeMode($value);
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
            $this->getJavaClass()->setImageHeight($value->getJavaClass());
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
        $this->getJavaClass()->setImageWidth($value->getJavaClass());
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
            $this->getJavaClass()->setBarcode($value->getJavaClass());
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

/**
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border visibility. If false than parameter Width is always ignored (0).
     * Default value: false.
     */
    public function getVisible(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->getVisible(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border visibility. If false than parameter Width is always ignored (0).
     * Default value: false.
     */
    public function setVisible(bool $value): void
    {
        try
        {
            $this->getJavaClass()->setVisible($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this BorderParameters.
     *
     * @return string A string that represents this BorderParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border dash style.
     * Default value: BorderDashStyle::SOLID.
     */
    public function getDashStyle(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getDashStyle(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border dash style.
     * Default value: BorderDashStyle::SOLID.
     */
    public function setDashStyle(int $value): void
    {
        try
        {
            $this->getJavaClass()->setDashStyle($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border color.
     * Default value: #000000
     */
    public function getColor(): string
    {
        try
        {
            $hexColor = strtoupper(dechex(java_cast($this->getJavaClass()->getColor(), "integer")));
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
     * Border color.
     * Default value: #000000
     */
    public function setColor(string $hexValue): void
    {
        try
        {
            $this->getJavaClass()->setColor(hexdec($hexValue));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Enable checksum validation during recognition for 1D barcodes.
 * Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible.
 * Checksum never used: Codabar
 * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN
 * Checksum always used: Rest symbologies
 *
 * This sample shows influence of ChecksumValidation on recognition quality and results
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "1234567890128");
 * $generator->save("test.png", BarcodeImageFormat::PNG);
 * $reader = new BarCodeReader("test.png", null, DecodeType::EAN_13);
 * //checksum disabled
 * $reader->setChecksumValidation(ChecksumValidation::OFF);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
 *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
 * }
 * $reader = new BarCodeReader("test.png", null, DecodeType::EAN_13);
 * //checksum enabled
 * $reader->setChecksumValidation(ChecksumValidation::ON);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
 *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
 * }
 * @endcode
 */
class  ChecksumValidation
{
    /**
     *    If checksum is required by the specification - it will be validated.
     */
    const DEFAULT = 0;

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
 * Caption parameters.
 */
class CaptionParameters extends BaseJavaClass
{
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption text.
     * Default value: empty string.
     */
    public function getText(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getText(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption text.
     * Default value: empty string.
     */
    public function setText(string $value): void
    {
        try
        {
            $this->getJavaClass()->setText($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption font.
     * Default value: Arial 8pt regular.
     */
    public function getFont(): FontUnit
    {
        try
        {
            return $this->font;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption text visibility.
     * Default value: false.
     */
    public function getVisible(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->getVisible(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption text visibility.
     * Default value: false.
     */
    public function setVisible(bool $value): void
    {
        try
        {
            $this->getJavaClass()->setVisible($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption text color.
     * Default value BLACK.
     */
    public function getTextColor(): string
    {
        try
        {
            $hexColor = strtoupper(dechex(java_cast($this->getJavaClass()->getTextColor(), "integer")));
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
     * Caption text color.
     * Default value BLACK.
     */
    public function setTextColor(string $rgbValue): void
    {
        try
        {
            $this->getJavaClass()->setTextColor(hexdec($rgbValue));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Captions paddings.
     * Default value for CaptionAbove: 5pt 5pt 0 5pt.
     * Default value for CaptionBelow: 0 5pt 5pt 5pt.
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption test horizontal alignment.
     * Default value: StringAlignment.Center.
     */
    public function getAlignment(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAlignment(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Caption test horizontal alignment.
     * Default value: StringAlignment.CENTER.
     */
    public function setAlignment(int $value): void
    {
        try
        {
            $this->getJavaClass()->setAlignment($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /*
     * Specify word wraps (line breaks) within text.
     * @return bool
     */
    public function getNoWrap(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->getNoWrap(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /*
     * Specify word wraps (line breaks) within text.
     */
    public function setNoWrap(bool $value): void
    {
        try
        {
            $this->getJavaClass()->setNoWrap($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 *  Specifies the size value in different units (Pixel, Inches, etc.).
 *
 * This sample shows how to create and save a BarCode image.
 * @code
 *   $generator = new BarcodeGenerator(EncodeTypes::CODE_128);
 *    $generator->getParameters()->getBarcode()->getBarHeight()->setMillimeters(10);
 *    $generator->save("test.png", BarcodeImageFormat::PNG);
 * @endcode
 */
class Unit extends BaseJavaClass
{
    public function __construct($source)
    {
        try
        {
            parent::__construct(self::initUnit($source));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function initUnit($source)
    {
        if ($source instanceof Unit)
        {
            return $source->getJavaClass();
        }
        return $source;
    }

    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets size value in pixels.
     */
    public function getPixels(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getPixels(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets size value in pixels.
     */
    public function setPixels(float $value): void
    {
        try
        {
            $this->getJavaClass()->setPixels($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets size value in inches.
     */
    public function getInches(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getInches(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets size value in inches.
     */
    public function setInches(float $value): void
    {
        try
        {
            $this->getJavaClass()->setInches($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets size value in millimeters.
     */
    public function getMillimeters(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getMillimeters(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets size value in millimeters.
     */
    public function setMillimeters(float $value): void
    {
        try
        {
            $this->getJavaClass()->setMillimeters($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets size value in point.
     */
    public function getPoint(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getPoint(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets size value in point.
     */
    public function setPoint(float $value): void
    {
        try
        {
            $this->getJavaClass()->setPoint($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets size value in document units.
     */
    public function getDocument(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getDocument(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets size value in document units.
     */
    public function setDocument(float $value): void
    {
        try
        {
            $this->getJavaClass()->setDocument($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this Unit.
     *
     * @return string that represents this Unit.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines whether this instance and a specified object,
     * which must also be a Unit object, have the same value.
     *
     * @param Unit $obj The Unit to compare to this instance.
     * @return true if obj is a Unit and its value is the same as this instance;
     * otherwise, false. If obj is null, the method returns false.
     */
    public function equals(Unit $obj): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Paddings parameters.
 */
class Padding extends BaseJavaClass
{

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
    public function getTop(): Unit
    {
        try
        {
            return $this->top;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Bottom padding.
     */
    public function getBottom(): Unit
    {
        try
        {
            return $this->bottom;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Right padding.
     */
    public function getRight(): Unit
    {
        try
        {
            return $this->right;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Left padding.
     */
    public function getLeft(): Unit
    {
        try
        {
            return $this->left;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this Padding.
     *
     * @return string A string that represents this Padding.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Codetext parameters.
 */
class CodetextParameters extends BaseJavaClass
{

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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Text that will be displayed instead of codetext in 2D barcodes.
     * Used for: Aztec, Pdf417, DataMatrix, QR, MaxiCode, DotCode
     */
    public function getTwoDDisplayText(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getTwoDDisplayText(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Text that will be displayed instead of codetext in 2D barcodes.
     * Used for: Aztec, Pdf417, DataMatrix, QR, MaxiCode, DotCode
     */
    public function setTwoDDisplayText(string $value): void
    {
        try
        {
            $this->getJavaClass()->setTwoDDisplayText($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specify FontMode. If FontMode is set to Auto, font size will be calculated automatically based on xDimension value.
     * It is recommended to use FontMode::AUTO especially in AutoSizeMode.NEAREST or AutoSizeMode::INTERPOLATION.
     * Default value: FontMode::AUTO.
     */
    public function getFontMode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getFontMode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specify FontMode. If FontMode is set to Auto, font size will be calculated automatically based on xDimension value.
     * It is recommended to use FontMode::AUTO especially in AutoSizeMode.NEAREST or AutoSizeMode::INTERPOLATION.
     * Default value: FontMode::AUTO.
     */
    public function setFontMode(int $value): void
    {
        try
        {
            $this->getJavaClass()->setFontMode($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specify the displaying CodeText's font.
     * Default value: Arial 5pt regular.
     * Ignored if FontMode is set to FontMode::AUTO.
     */
    public function getFont(): FontUnit
    {
        return $this->font;
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Space between the CodeText and the BarCode in Unit value.
     * Default value: 2pt.
     * Ignored for EAN8, EAN13, UPCE, UPCA, ISBN, ISMN, ISSN, UpcaGs1DatabarCoupon.
     */
    public function getSpace(): Unit
    {
        try
        {
            return $this->space;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets or sets the alignment of the code text.
     * Default value: TextAlignment::CENTER.
     */
    public function getAlignment(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAlignment(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets or sets the alignment of the code text.
     * Default value: TextAlignment::CENTER.
     */
    public function setAlignment(int $value): void
    {
        try
        {
            $this->getJavaClass()->setAlignment($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specify the displaying CodeText's Color.
     * Default value BLACK.
     */
    public function getColor(): string
    {
        try
        {
            $hexColor = strtoupper(dechex(java_cast($this->getJavaClass()->getColor(), "integer")));
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
     * Specify the displaying CodeText's Color.
     * Default value BLACK.
     */
    public function setColor(string $value): void
    {
        try
        {
            $this->getJavaClass()->setColor(hexdec($value));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specify the displaying CodeText Location, set to CodeLocation::NONE to hide CodeText.
     * Default value:  CodeLocation::BELOW.
     */
    public function getLocation(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getLocation(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specify the displaying CodeText Location, set to  CodeLocation::NONE to hide CodeText.
     * Default value:  CodeLocation::BELOW.
     */
    public function setLocation(int $value): void
    {
        try
        {
            $this->getJavaClass()->setLocation($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specify word wraps (line breaks) within text.
     * @return bool
     */
    public function getNoWrap(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->getNoWrap(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specify word wraps (line breaks) within text.
     */
    public function setNoWrap(bool $value): void
    {
        try
        {
            $this->getJavaClass()->setNoWrap($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this CodetextParameters.
     *
     * @return string A string that represents this CodetextParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 *
 * Postal parameters. Used for Postnet, Planet.
 */
class PostalParameters extends BaseJavaClass
{

    private $postalShortBarHeight;

    protected function init(): void
    {
        try
        {
            $this->postalShortBarHeight = new Unit($this->getJavaClass()->getPostalShortBarHeight());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Short bar's height of Postal barcodes.
     */
    public function getPostalShortBarHeight(): Unit
    {
        try
        {
            return $this->postalShortBarHeight;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this PostalParameters.
     *
     * @return string A string that represents this PostalParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Short bar's height of AustralianPost barcode.
     */
    public function getAustralianPostShortBarHeight(): Unit
    {
        try
        {
            return $this->australianPostShortBarHeight;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Interpreting type for the Customer Information of AustralianPost, default to CustomerInformationInterpretingType.Other"
     */
    public function getAustralianPostEncodingTable(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAustralianPostEncodingTable(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Interpreting type for the Customer Information of AustralianPost, default to CustomerInformationInterpretingType.Other"
     */
    public function setAustralianPostEncodingTable(int $value): void
    {
        try
        {
            $this->getJavaClass()->setAustralianPostEncodingTable($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this AustralianPostParameters.
     *
     * @return string A string that represents this AustralianPostParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Codablock parameters.
 */
class CodablockParameters extends BaseJavaClass
{

    protected function init(): void
    {
    }

    /**
     * Columns count.
     */
    public function getColumns(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getColumns(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function setColumns(int $value): void
    {
        try
        {
            $this->getJavaClass()->setColumns($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function getRows(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getRows(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function setRows(int $value): void
    {
        try
        {
            $this->getJavaClass()->setRows($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this CodablockParameters.
     *
     * @return string that represents this CodablockParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Databar parameters.
 */
class DataBarParameters extends BaseJavaClass
{

    protected function init(): void
    {
    }

    /**
     * Enables flag of 2D composite component with DataBar barcode
     */
    public function is2DCompositeComponent(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->is2DCompositeComponent(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Enables flag of 2D composite component with DataBar barcode
     */
    public function set2DCompositeComponent(bool $value): void
    {
        try
        {
            $this->getJavaClass()->set2DCompositeComponent($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * If this flag is set, it allows only GS1 encoding standard for Databar barcode types
     */
    public function isAllowOnlyGS1Encoding(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->isAllowOnlyGS1Encoding(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * If this flag is set, it allows only GS1 encoding standard for Databar barcode types
     */
    public function setAllowOnlyGS1Encoding(bool $value): void
    {
        try
        {
            $this->getJavaClass()->setAllowOnlyGS1Encoding($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function getColumns(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getColumns(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function setColumns(int $value): void
    {
        try
        {
            $this->getJavaClass()->setColumns($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function getRows(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getRows(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function setRows(int $value): void
    {
        try
        {
            $this->getJavaClass()->setRows($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     * Used for DataBar stacked.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     * Used for DataBar stacked.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this DataBarParameters.
     *
     * @return string that represents this DataBarParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * DataMatrix parameters.
 */
class DataMatrixParameters extends BaseJavaClass
{
    protected function init(): void
    {
    }

    /**
     * <p>
     * Gets or sets a Datamatrix symbol size.
     * Default value: DataMatrixVersion.Auto.
     * </p>
     */
    public function getDataMatrixVersion() : int
    {
        return java_cast($this->getJavaClass()->getDataMatrixVersion(), "integer");
    }

    /**
     * <p>
     * Gets or sets a Datamatrix symbol size.
     * Default value: DataMatrixVersion.Auto.
     * </p>
     */
    public function setDataMatrixVersion(int $value)
    {
        $this->getJavaClass()->setDataMatrixVersion($value);
    }

    /**
     * Gets a Datamatrix ECC type.
     * Default value: DataMatrixEccType::ECC_200.
     */
    public function getDataMatrixEcc(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getDataMatrixEcc(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets a Datamatrix ECC type.
     * Default value: DataMatrixEccType::ECC_200.
     */
    public function setDataMatrixEcc(int $value): void
    {
        try
        {
            $this->getJavaClass()->setDataMatrixEcc($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode::AUTO.
     */
    public function getDataMatrixEncodeMode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getDataMatrixEncodeMode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode::AUTO.
     */
    public function setDataMatrixEncodeMode(int $value): void
    {
        try
        {
            $this->getJavaClass()->setDataMatrixEncodeMode($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Barcode ID for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function getStructuredAppendBarcodeId() : int
    {
        return java_cast($this->getJavaClass()->getStructuredAppendBarcodeId(), "integer");
    }
    /**
     * <p>
     * Barcode ID for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function setStructuredAppendBarcodeId(int $value) : void
    {
        $this->getJavaClass()->setStructuredAppendBarcodeId($value);
    }

    /**
     * <p>
     * Barcodes count for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function getStructuredAppendBarcodesCount() : int
    {
        return java_cast($this->getJavaClass()->getStructuredAppendBarcodesCount(), "integer");
    }
    /**
     * <p>
     * Barcodes count for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function setStructuredAppendBarcodesCount(int $value) : void
    {
        $this->getJavaClass()->setStructuredAppendBarcodesCount($value);
    }

    /**
     * <p>
     * File ID for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function getStructuredAppendFileId() : int
    {
        return java_cast($this->getJavaClass()->getStructuredAppendFileId(), "integer");
    }
    /**
     * <p>
     * File ID for Structured Append mode of Datamatrix barcode.
     * Default value: 0
     * </p>
     */
    public function setStructuredAppendFileId(int $value) : void
    {
        $this->getJavaClass()->setStructuredAppendFileId($value);
    }

    /**
     * <p>
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization.
     * Default value: false
     * </p>
     */
    public function isReaderProgramming() : bool
    {
        return java_cast($this->getJavaClass()->isReaderProgramming(), "boolean");
    }
    /**
     * <p>
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization.
     * Default value: false
     * </p>
     */
    public function setReaderProgramming(bool $value) : void
    {
        $this->getJavaClass()->setReaderProgramming($value);
    }

    /**
     * ISO/IEC 16022
     * 5.2.4.7 Macro characters
     * 11.3 Protocol for Macro characters in the first position (ECC 200 only)
     * Macro Characters 05 and 06 values are used to obtain more compact encoding in special modes.
     * Can be used only with DataMatrixEccType.Ecc200 or DataMatrixEccType.EccAuto.
     * Cannot be used with EncodeTypes::GS_1_DATA_MATRIX
     * Default value: MacroCharacter.NONE.
     */
    public function getMacroCharacters(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getMacroCharacters(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * ISO/IEC 16022
     * 5.2.4.7 Macro characters
     * 11.3 Protocol for Macro characters in the first position (ECC 200 only)
     * Macro Characters 05 and 06 values are used to obtain more compact encoding in special modes.
     * Can be used only with DataMatrixEccType.Ecc200 or DataMatrixEccType.EccAuto.
     * Cannot be used with EncodeTypes::GS_1_DATA_MATRIX
     * Default value: MacroCharacter.NONE.
     */
    public function setMacroCharacters(int $value): void
    {
        try
        {
            $this->getJavaClass()->setMacroCharacters($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function getColumns(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getColumns(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function setColumns(int $value): void
    {
        try
        {
            $this->getJavaClass()->setColumns($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function getRows(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getRows(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function setRows(int $value): void
    {
        try
        {
            $this->getJavaClass()->setRows($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the encoding of codetext.
     */
    public function getCodeTextEncoding(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeTextEncoding(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the encoding of codetext.
     */
    public function setCodeTextEncoding(string $value)
    {
        try
        {
            $this->getJavaClass()->setCodeTextEncoding($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Gets or sets ECI encoding. Used when DataMatrixEncodeMode is Auto.
     * Default value: ISO-8859-1
     * </p>
     */
    public /*ECIEncodings*/function getECIEncoding() : int
    {
        return java_cast($this->getJavaClass()->getECIEncoding(), "integer");
    }
    /**
     * <p>
     * Gets or sets ECI encoding. Used when DataMatrixEncodeMode is Auto.
     * Default value: ISO-8859-1
     * </p>
     */
    public function setECIEncoding(int $value) : void
    {
        $this->getJavaClass()->setECIEncoding($value);
    }

    /**
     * Returns a human-readable string representation of this DataMatrixParameters.
     *
     * @return string presentation of this DataMatrixParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

}

/**
 * Code16K parameters.
 */
class Code16KParameters extends BaseJavaClass
{

    protected function init(): void
    {
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the left quiet zone in xDimension.
     * Default value: 10, meaning if xDimension = 2px than left quiet zone will be 20px.
     */
    public function getQuietZoneLeftCoef(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQuietZoneLeftCoef(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the left quiet zone in xDimension.
     * Default value: 10, meaning if xDimension = 2px than left quiet zone will be 20px.
     */
    public function setQuietZoneLeftCoef(int $value): void
    {
        try
        {
            $this->getJavaClass()->setQuietZoneLeftCoef($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the right quiet zone in xDimension.
     * Default value: 1, meaning if xDimension = 2px than right quiet zone will be 2px.
     */
    public function getQuietZoneRightCoef(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQuietZoneRightCoef(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the right quiet zone in xDimension.
     * Default value: 1, meaning if xDimension = 2px than right quiet zone will be 2px.
     */
    public function setQuietZoneRightCoef(int $value): void
    {
        try
        {
            $this->getJavaClass()->setQuietZoneRightCoef($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this Code16KParameters.
     *
     * @return string A string that represents this Code16KParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * DotCode parameters.
 */
class DotCodeParameters extends BaseJavaClass
{
    // protected $javaClassName = "com.aspose.barcode.generation.";

    protected function init(): void
    {
    }

    /**
     * <p>
     * Identifies DotCode encode mode.
     * Default value: Auto.
     * </p>
     */
    public function getDotCodeEncodeMode() : int
    {
        return java_cast($this->getJavaClass()->getDotCodeEncodeMode(), "integer");
    }
    /**
     * <p>
     * Identifies DotCode encode mode.
     * Default value: Auto.
     * </p>
     */
    public function setDotCodeEncodeMode(int $value) : void
    {
        $this->getJavaClass()->setDotCodeEncodeMode($value);
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function isReaderInitialization() : bool
    { return java_cast($this->getJavaClass()->isReaderInitialization(), "boolean"); }
    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function setReaderInitialization(bool $value) : void
    { $this->getJavaClass()->setReaderInitialization($value); }

    /**
     * <p>
     * Identifies the ID of the DotCode structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.
     * </p>
     */
    public function getDotCodeStructuredAppendModeBarcodeId() : int
    { return java_cast($this->getJavaClass()->getDotCodeStructuredAppendModeBarcodeId(), "integer"); }
    /**
     * <p>
     * Identifies the ID of the DotCode structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.
     * </p>
     */
    public function setDotCodeStructuredAppendModeBarcodeId(int $value)
    { $this->getJavaClass()->setDotCodeStructuredAppendModeBarcodeId($value); }

    /**
     * <p>
     * Identifies DotCode structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.
     * </p>
     */
    public function getDotCodeStructuredAppendModeBarcodesCount() : int
    { return java_cast($this->getJavaClass()->getDotCodeStructuredAppendModeBarcodesCount(), "integer"); }
    /**
     * <p>
     * Identifies DotCode structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.
     * </p>
     */
    public function setDotCodeStructuredAppendModeBarcodesCount(int $value) : void
    { $this->getJavaClass()->setDotCodeStructuredAppendModeBarcodesCount($value); }

    /**
     * <p>
     * Identifies ECI encoding. Used when DotCodeEncodeMode is Auto.
     * Default value: ISO-8859-1
     * </p>
     */
    public function getECIEncoding() : int
    { return java_cast($this->getJavaClass()->getECIEncoding(), "integer"); }
    /**
     * <p>
     * Identifies ECI encoding. Used when DotCodeEncodeMode is Auto.
     * Default value: ISO-8859-1
     * </p>
     */
    public function setECIEncoding(int $value) : void
    { $this->getJavaClass()->setECIEncoding($value); }

    /**
     * <p>
     * Identifies rows count. Sum of the number of rows plus the number of columns of a DotCode symbol must be odd. Number of rows must be at least 5.
     * Default value: -1
     * </p>
     */
    public function getRows() : int
    { return java_cast($this->getJavaClass()->getRows(), "integer"); }
    /**
     * <p>
     * Identifies rows count. Sum of the number of rows plus the number of columns of a DotCode symbol must be odd. Number of rows must be at least 5.
     * Default value: -1
     * </p>
     */
    public function setRows(int $value) : void
    {
        $this->getJavaClass()->setRows($value);
    }

    /**
     * <p>
     * Identifies columns count. Sum of the number of rows plus the number of columns of a DotCode symbol must be odd. Number of columns must be at least 5.
     * Default value: -1
     * </p>
     */
    public function getColumns() : int
    { return java_cast($this->getJavaClass()->getColumns(), "integer"); }
    /**
     * <p>
     * Identifies columns count. Sum of the number of rows plus the number of columns of a DotCode symbol must be odd. Number of columns must be at least 5.
     * Default value: -1
     * </p>
     */
    public function setColumns(int $value) : void
    {
        $this->getJavaClass()->setColumns($value);
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this DotCodeParameters.
     *
     * @return string that represents this DotCodeParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

class GS1CompositeBarParameters extends BaseJavaClass
{
    protected function init(): void
    {
    }

    /**
     * Linear component type
     */
    public function getLinearComponentType():int
    {
        return java_cast($this->getJavaClass()->getLinearComponentType(), "integer");
    }

    /**
     * Linear component type
     */
    public function setLinearComponentType(int $value): void
    {
        $this->getJavaClass()->setLinearComponentType($value);
    }

    /**
     * 2D component type
     */
    public function getTwoDComponentType(): int
    {
        return java_cast($this->getJavaClass()->getTwoDComponentType(), "integer");
    }

    /**
     * 2D component type
     */
    public function setTwoDComponentType(int $value) : void
    {
        $this->getJavaClass()->setTwoDComponentType($value);
    }

    /**
     * Returns a human-readable string representation of this <see cref="DataBarParameters"/>.
     * @return A string that represents this <see cref="DataBarParameters"/>
     */
    public function toString() : string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }
}

/**
 * ITF parameters.
 */
class ITFParameters extends BaseJavaClass
{

    private $itfBorderThickness;

    protected function init(): void
    {
        try
        {
            $this->itfBorderThickness = new Unit($this->getJavaClass()->getItfBorderThickness());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border type of ITF barcode.
     * Default value: ITF14BorderType::BAR.
     */
    public function getItfBorderType(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getItfBorderType(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Border type of ITF barcode.
     * Default value: ITF14BorderType::BAR.
     */
    public function setItfBorderType(int $value): void
    {
        try
        {
            $this->getJavaClass()->setItfBorderType($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the quiet zones in xDimension.
     * Default value: 10, meaning if xDimension = 2px than quiet zones will be 20px.
     *
     * @exception IllegalArgumentException
     * @return int The QuietZoneCoef parameter value is less than 10.
     */
    public function getQuietZoneCoef(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQuietZoneCoef(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Size of the quiet zones in xDimension.
     * Default value: 10, meaning if xDimension = 2px than quiet zones will be 20px.
     *
     * @exception IllegalArgumentException
     * @param int The QuietZoneCoef parameter value is less than 10.
     */
    public function setQuietZoneCoef(int $value): void
    {
        try
        {
            $this->getJavaClass()->setQuietZoneCoef($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this ITFParameters.
     *
     * @return string that represents this ITFParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * QR parameters.
 */
class QrParameters extends BaseJavaClass
{
    private $structuredAppend;

    protected function init(): void
    {
        try
        {
            $this->structuredAppend = new QrStructuredAppendParameters($this->getJavaClass()->getStructuredAppend());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR structured append parameters.
     */
    public function getStructuredAppend(): QrStructuredAppendParameters
    {
        return $this->structuredAppend;
    }

    /**
     * QR structured append parameters.
     */
    public function setStructuredAppend(QrStructuredAppendParameters $value)
    {
        try
        {
            $this->structuredAppend = $value;
            $this->getJavaClass()->setStructuredAppend($value->getJavaClass());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     */
    public function getQrECIEncoding(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQrECIEncoding(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     */
    public function setQrECIEncoding(int $value): void
    {
        try
        {
            $this->getJavaClass()->setQrECIEncoding($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR symbology type of BarCode's encoding mode.
     * Default value: QREncodeMode::AUTO.
     */
    public function getQrEncodeMode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQrEncodeMode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR symbology type of BarCode's encoding mode.
     * Default value: QREncodeMode::AUTO.
     */
    public function setQrEncodeMode(int $value): void
    {
        try
        {
            $this->getJavaClass()->setQrEncodeMode($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR / MicroQR selector mode. Select ForceQR for standard QR symbols, Auto for MicroQR.
     */
    public function getQrEncodeType(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQrEncodeType(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR / MicroQR selector mode. Select ForceQR for standard QR symbols, Auto for MicroQR.
     */
    public function setQrEncodeType(int $value): void
    {
        try
        {
            $this->getJavaClass()->setQrEncodeType($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Level of Reed-Solomon error correction for QR barcode.
     *  From low to high: LEVEL_L, LEVEL_M, LEVEL_Q, LEVEL_H.
     * @see QRErrorLevel.
     */
    public function getQrErrorLevel(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->qrErrorLevel, "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Level of Reed-Solomon error correction for QR barcode.
     *  From low to high: LEVEL_L, LEVEL_M, LEVEL_Q, LEVEL_H.
     * @see QRErrorLevel.
     */
    public function setQrErrorLevel(int $value): void
    {
        try
        {
            $this->getJavaClass()->setQrErrorLevel($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Version of QR Code.
     * From Version1 to Version40 for QR code and from M1 to M4 for MicroQr.
     * Default value is QRVersion::AUTO.
     */
    public function getQrVersion(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQrVersion(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Version of QR Code.
     * From Version1 to Version40 for QR code and from M1 to M4 for MicroQr.
     * Default value is QRVersion::AUTO.
     */
    public function setQrVersion(int $value): void
    {
        try
        {
            $this->getJavaClass()->setQrVersion($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the encoding of codetext.
     */
    public function getCodeTextEncoding(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeTextEncoding(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the encoding of codetext.
     */
    public function setCodeTextEncoding(string $value): void
    {
        try
        {
            $this->getJavaClass()->setCodeTextEncoding($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this QrParameters.
     *
     * @return string that represents this QrParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * PDF417 parameters.
 */
class Pdf417Parameters extends BaseJavaClass
{
    protected function init(): void
    {
    }

    /**
     * Pdf417 symbology type of BarCode's compaction mode.
     * Default value: Pdf417CompactionMode::AUTO.
     */
    public function getPdf417CompactionMode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417CompactionMode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Pdf417 symbology type of BarCode's compaction mode.
     * Default value: Pdf417CompactionMode::AUTO.
     */
    public function setPdf417CompactionMode(int $value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417CompactionMode($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets or sets Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     */
    public function getPdf417ErrorLevel(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417ErrorLevel(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets or sets Pdf417 symbology type of BarCode's error correction level
     * ranging from level0 to level8, level0 means no error correction info,
     * level8 means best error correction which means a larger picture.
     */
    public function setPdf417ErrorLevel(int $value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417ErrorLevel($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Whether Pdf417 symbology type of BarCode is truncated (to reduce space).
     */
    public function getPdf417Truncate(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417Truncate(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Whether Pdf417 symbology type of BarCode is truncated (to reduce space).
     */
    public function setPdf417Truncate(bool $value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417Truncate($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function getColumns(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getColumns(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Columns count.
     */
    public function setColumns(int $value): void
    {
        try
        {
            $this->getJavaClass()->setColumns($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function getRows(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getRows(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Rows count.
     */
    public function setRows(int $value): void
    {
        try
        {
            $this->getJavaClass()->setRows($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Getsmacro Pdf417 barcode's file ID.
     * Used for MacroPdf417.
     */
    public function getPdf417MacroFileID(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroFileID(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode's file ID.
     * Used for MacroPdf417.
     */
    public function setPdf417MacroFileID(int $value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroFileID($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode's segment ID, which starts from 0, to MacroSegmentsCount - 1.
     */
    public function getPdf417MacroSegmentID(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroSegmentID(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode's segment ID, which starts from 0, to MacroSegmentsCount - 1.
     */
    public function setPdf417MacroSegmentID(int $value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroSegmentID($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode segments count.
     */
    public function getPdf417MacroSegmentsCount(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroSegmentsCount(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode segments count.
     */
    public function setPdf417MacroSegmentsCount(int $value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroSegmentsCount($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode file name.
     * @return
     */
    public function getPdf417MacroFileName(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroFileName(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode file name.
     * @param string $value
     */
    public function setPdf417MacroFileName(string $value)
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroFileName($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode time stamp.
     */
    public function getPdf417MacroTimeStamp(): DateTime
    {
        try
        {
            return new DateTime('@' . java_cast($this->getJavaClass()->getPdf417MacroTimeStamp(), "string"));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode time stamp.
     */
    public function setPdf417MacroTimeStamp(DateTime $value)
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroTimeStamp($value->getTimestamp() . "");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode sender name.
     */
    public function getPdf417MacroSender(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroSender(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode sender name.
     */
    public function setPdf417MacroSender(string $value)
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroSender($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro Pdf417 barcode addressee name.
     */
    public function getPdf417MacroAddressee(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroAddressee(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets macro Pdf417 barcode addressee name.
     */
    public function setPdf417MacroAddressee(string $value)
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroAddressee($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets or sets macro Pdf417 file size.
     * @return int file size field contains the size in bytes of the entire source file.
     */
    public function getPdf417MacroFileSize(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroFileSize(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets or sets macro Pdf417 file size.
     * @param int $value The file size field contains the size in bytes of the entire source file.
     */
    public function setPdf417MacroFileSize(int $value)
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroFileSize($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Gets macro Pdf417 barcode checksum.
     * @return int checksum field contains the value of the 16-bit (2 bytes) CRC checksum using the CCITT-16 polynomial.
     */
    public function getPdf417MacroChecksum(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroChecksum(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Sets macro Pdf417 barcode checksum.
     * @param int $value The checksum field contains the value of the 16-bit (2 bytes) CRC checksum using the CCITT-16 polynomial.
     */
    public function setPdf417MacroChecksum(int $value)
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroChecksum($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the encoding of codetext.
     */
    public function getCodeTextEncoding(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeTextEncoding(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the encoding of codetext.
     */
    public function setCodeTextEncoding(string $value): void
    {
        try
        {
            $this->getJavaClass()->setCodeTextEncoding($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol. Not applied for Macro PDF417 text fields.
     * Current implementation consists all well known charset encodings.
     */
    public function getPdf417ECIEncoding(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417ECIEncoding(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol. Not applied for Macro PDF417 text fields.
     * Current implementation consists all well known charset encodings.
     */
    public function setPdf417ECIEncoding(int $value): void
    {
        try
        {
            $this->getJavaClass()->setPdf417ECIEncoding($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. Applies for Macro PDF417 text fields.
     */
    public function getPdf417MacroECIEncoding(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroECIEncoding(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. Applies for Macro PDF417 text fields.
     */
    public function setPdf417MacroECIEncoding(int $value)
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroECIEncoding($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Used to tell the encoder whether to add Macro PDF417 Terminator (codeword 922) to the segment.
     * Applied only for Macro PDF417.
     */
    public function getPdf417MacroTerminator(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPdf417MacroTerminator(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Used to tell the encoder whether to add Macro PDF417 Terminator (codeword 922) to the segment.
     * Applied only for Macro PDF417.
     */
    public function setPdf417MacroTerminator(int $value)
    {
        try
        {
            $this->getJavaClass()->setPdf417MacroTerminator($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization
     * @return
     */
    public function isReaderInitialization(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->isReaderInitialization(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization
     * @param bool $value
     */
    public function setReaderInitialization(bool $value): void
    {
        try
        {
            $this->getJavaClass()->setReaderInitialization($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Function codeword for Code 128 emulation. Applied for MicroPDF417 only.  Ignored for PDF417 and MacroPDF417 barcodes.
     */
    public function getCode128Emulation(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getCode128Emulation(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Function codeword for Code 128 emulation. Applied for MicroPDF417 only.  Ignored for PDF417 and MacroPDF417 barcodes.
     */
    public function setCode128Emulation(int $value): void
    {
        try
        {
            $this->getJavaClass()->setCode128Emulation($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable String representation of this Pdf417Parameters.
     *
     * @return string that represents this Pdf417Parameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Supplement parameters. Used for Interleaved2of5, Standard2of5, EAN13, EAN8, UPCA, UPCE, ISBN, ISSN, ISMN.
 */
class SupplementParameters extends BaseJavaClass
{
    private $_space;

    protected function init(): void
    {
        try
        {
            $this->_space = new Unit($this->getJavaClass()->getSupplementSpace());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Supplement data following BarCode.
     */
    public function getSupplementData(): ?string
    {
        try
        {
            $SupplementData = java_cast($this->getJavaClass()->getSupplementData(), "string");
            if ($SupplementData == "null")
            {
                return null;
            }
            return $SupplementData;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Supplement data following BarCode.
     */
    public function setSupplementData(string $value): void
    {
        try
        {
            $this->getJavaClass()->setSupplementData($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Space between main the BarCode and supplement BarCode in Unit value.
     *
     * @exception IllegalArgumentException
     * The Space parameter value is less than 0.
     */
    public function getSupplementSpace(): Unit
    {
        try
        {
            return $this->_space;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this SupplementParameters.
     *
     * @return string that represents this SupplementParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * MaxiCode parameters.
 */
class MaxiCodeParameters extends BaseJavaClass
{
    protected function init(): void
    {
    }

    /**
     * Gets a MaxiCode encode mode.
     */
    public function getMaxiCodeMode() : int
    {
        return java_cast($this->getJavaClass()->getMaxiCodeMode(), "integer");
    }

    /**
     * Sets a MaxiCode encode mode.
     */
    public function setMaxiCodeMode(int $maxiCodeMode) : void
    {
        $this->getJavaClass()->setMaxiCodeMode($maxiCodeMode);
    }

    /**
     * Gets a MaxiCode encode mode.
     */
    public function getMaxiCodeEncodeMode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getMaxiCodeEncodeMode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets a MaxiCode encode mode.
     */
    public function setMaxiCodeEncodeMode(int $value): void
    {
        try
        {
            $this->getJavaClass()->setMaxiCodeEncodeMode($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     * Default value: ISO-8859-1
     */
    public function getECIEncoding() : int
    {
        return java_cast($this->getJavaClass()->getECIEncoding(), "integer");
    }

    /**
     * Sets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     * Default value: ISO-8859-1
     */
    public function setECIEncoding(int $ECIEncoding) : void
    {
        $this->getJavaClass()->setECIEncoding($ECIEncoding);
    }

    /**
     * Gets a MaxiCode barcode id in structured append mode.
     * ID must be a value between 1 and 8.
     * Default value: 0
     */
    public function getMaxiCodeStructuredAppendModeBarcodeId() : int
    {
        return java_cast($this->getJavaClass()->getMaxiCodeStructuredAppendModeBarcodeId(), "integer");
    }

    /**
     * Sets a MaxiCode barcode id in structured append mode.
     * ID must be a value between 1 and 8.
     * Default value: 0
     */
    public function setMaxiCodeStructuredAppendModeBarcodeId(int $maxiCodeStructuredAppendModeBarcodeId) : void
    {
        $this->getJavaClass()->setMaxiCodeStructuredAppendModeBarcodeId($maxiCodeStructuredAppendModeBarcodeId);
    }

    /**
     * Gets a MaxiCode barcodes count in structured append mode.
     * Count number must be a value between 2 and 8 (maximum barcodes count).
     * Default value: -1
     */
    public function getMaxiCodeStructuredAppendModeBarcodesCount() : int
    {
        return java_cast($this->getJavaClass()->getMaxiCodeStructuredAppendModeBarcodesCount(), "integer");
    }

    /**
     * Sets a MaxiCode barcodes count in structured append mode.
     * Count number must be a value between 2 and 8 (maximum barcodes count).
     * Default value: -1
     */
    public function setMaxiCodeStructuredAppendModeBarcodesCount(int $maxiCodeStructuredAppendModeBarcodesCount) : void
    {
        $this->getJavaClass()->setMaxiCodeStructuredAppendModeBarcodesCount($maxiCodeStructuredAppendModeBarcodesCount);
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "float");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this MaxiCodeParameters.
     *
     * @return string that represents this MaxiCodeParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Aztec parameters.
 */
class AztecParameters extends BaseJavaClass
{

    protected function init(): void
    {
    }

    /**
     * Level of error correction of Aztec types of barcode.
     * Value should between 10 to 95.
     */
    public function getAztecErrorLevel(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAztecErrorLevel(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Level of error correction of Aztec types of barcode.
     * Value should between 10 to 95.
     */
    public function setAztecErrorLevel(int $value): void
    {
        try
        {
            $this->getJavaClass()->setAztecErrorLevel($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets or sets a Aztec Symbol mode.
     * Default value: AztecSymbolMode::AUTO.
     */
    public function getAztecSymbolMode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAztecSymbolMode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets or sets a Aztec Symbol mode.
     * Default value: AztecSymbolMode::AUTO.
     */
    public function setAztecSymbolMode(int $value): void
    {
        try
        {
            $this->getJavaClass()->setAztecSymbolMode($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getAspectRatio(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(int $value): void
    {
        try
        {
            $this->getJavaClass()->setAspectRatio($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the encoding of codetext.
     */
    public function getCodeTextEncoding(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeTextEncoding(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the encoding of codetext.
     */
    public function setCodeTextEncoding(string $value): void
    {
        try
        {
            $this->getJavaClass()->setCodeTextEncoding($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this AztecParameters.
     *
     * @return string that represents this  AztecParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Codabar parameters.
 */
class CodabarParameters extends BaseJavaClass
{

    protected function init(): void
    {
    }

    /**
     * Get the checksum algorithm for Codabar barcodes.
     * Default value: CodabarChecksumMode::MOD_16.
     * To enable checksum calculation set value EnableChecksum::YES to property EnableChecksum.
     * @see CodabarChecksumMode.
     */
    public function getCodabarChecksumMode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodabarChecksumMode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Set the checksum algorithm for Codabar barcodes.
     * Default value: CodabarChecksumMode::MOD_16.
     * To enable checksum calculation set value EnableChecksum::YES to property EnableChecksum.
     * @see CodabarChecksumMode.
     */
    public function setCodabarChecksumMode(int $value): void
    {
        try
        {
            $this->getJavaClass()->setCodabarChecksumMode($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Start symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function getCodabarStartSymbol(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodabarStartSymbol(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Start symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function setCodabarStartSymbol(int $value): void
    {
        try
        {
            $this->getJavaClass()->setCodabarStartSymbol($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Stop symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function getCodabarStopSymbol(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodabarStopSymbol(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Stop symbol (character) of Codabar symbology.
     * Default value: CodabarSymbol::A
     */
    public function setCodabarStopSymbol(int $value): void
    {
        try
        {
            $this->getJavaClass()->setCodabarStopSymbol($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this CodabarParameters.
     *
     * @return string that represents this CodabarParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Coupon parameters. Used for UpcaGs1DatabarCoupon, UpcaGs1Code128Coupon.
 */
class CouponParameters extends BaseJavaClass
{
    private $_space;

    protected function init(): void
    {
        try
        {
            $this->_space = new Unit($this->getJavaClass()->getSupplementSpace());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Space between main the BarCode and supplement BarCode in Unit value.
     *
     * @exception IllegalArgumentException
     * The Space parameter value is less than 0.
     */
    public function getSupplementSpace(): Unit
    {
        try
        {
            return $this->_space;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this CouponParameters.
     *
     * @return string that represents this CouponParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 *
 *  Defines a particular format for text, including font face, size, and style attributes
 *  where size in Unit value property.
 *
 *  This sample shows how to create and save a BarCode image.
 * @code
 *   $generator = new BarcodeGenerator(EncodeTypes::CODE_128);
 *   $generator->getParameters()->getCaptionAbove()->setText("CAPTION ABOOVE");
 *   $generator->getParameters()->getCaptionAbove()->setVisible(true);
 *   $generator->getParameters()->getCaptionAbove()->getFont()->setStyle(FontStyle::ITALIC);
 *   $generator->getParameters()->getCaptionAbove()->getFont()->getSize()->setPoint(25);
 * @endcode
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
        if ($source instanceof FontUnit)
        {
            return $source->getJavaClass();
        }
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
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the face name of this Font.
     */
    public function getFamilyName(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getFamilyName(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the face name of this Font.
     */
    public function setFamilyName(string $value): void
    {
        try
        {
            $this->getJavaClass()->setFamilyName($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets style information for this FontUnit.
     */
    public function getStyle(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getStyle(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets style information for this FontUnit.
     */
    public function setStyle(int $value): void
    {
        try
        {
            $this->getJavaClass()->setStyle($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets size of this FontUnit in Unit value.
     *
     * @exception IllegalArgumentException
     * The Size parameter value is less than or equal to 0.
     */
    public function getSize(): Unit
    {
        try
        {
            return $this->_size;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Helper class for automatic codetext generation of the Extended Codetext Mode
 */
class ExtCodetextBuilder extends BaseJavaClass
{
    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    function init(): void
    {
    }

    /**
     * Clears extended codetext items
     */
    public function clear(): void
    {
        try
        {
            $this->getJavaClass()->clear();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Adds plain codetext to the extended codetext items
     *
     * @param string $codetext Codetext in unicode to add as extended codetext item
     */
    public function addPlainCodetext(string $codetext): void
    {
        try
        {
            $this->getJavaClass()->addPlainCodetext($codetext);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Adds codetext with Extended Channel Identifier
     *
     * @param int ECIEncoding Extended Channel Identifier
     * @param string codetext    Codetext in unicode to add as extended codetext item with Extended Channel Identifier
     */
    public function addECICodetext(int $ECIEncoding, string $codetext): void
    {
        try
        {
            $this->getJavaClass()->addECICodetext($ECIEncoding, $codetext);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Generate extended codetext from generation items list
     *
     * @return string Return string of extended codetext
     */
    public function getExtendedCodetext(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getExtendedCodetext(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

}

/**
 * Extended codetext generator for 2D QR barcodes for ExtendedCodetext Mode of QREncodeMode
 * Use Display2DText property of BarCodeBuilder to set visible text to removing managing characters.
 *
 *  Example how to generate FNC1 first position for Extended Mode
 * @code
 *  //create codetext
 *  $lTextBuilder = new QrExtCodetextBuilder();
 *  $lTextBuilder->addFNC1FirstPosition();
 *  $lTextBuilder->addPlainCodetext("000%89%%0");
 *  $lTextBuilder->addFNC1GroupSeparator();
 *  $lTextBuilder->addPlainCodetext("12345&lt;FNC1&gt;");
 *  //generate codetext
 *  $lCodetext = lTextBuilder->getExtendedCodetext();
 * @endcode
 *
 * Example how to generate FNC1 second position for Extended Mode
 * @code
 *  //create codetext
 *  $lTextBuilder = new QrExtCodetextBuilder();
 *  $lTextBuilder->addFNC1SecondPosition("12");
 *  $lTextBuilder->addPlainCodetext("TRUE3456");
 *  //generate codetext
 *  $lCodetext = lTextBuilder->getExtendedCodetext();
 * @endcode
 *
 * Example how to generate multi ECI mode for Extended Mode
 * @code
 *  //create codetext
 * $lTextBuilder = new QrExtCodetextBuilder();
 * $lTextBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $lTextBuilder->addECICodetext(ECIEncodings::UTF8, "Right");
 * $lTextBuilder->addECICodetext(ECIEncodings::UTF16BE, "Power");
 * $lTextBuilder->addPlainCodetext("t\\e\\\\st");
 *  //generate codetext
 * $lCodetext = $lTextBuilder->getExtendedCodetext();
 * @endcode
 */
class QrExtCodetextBuilder extends ExtCodetextBuilder
{
    private const JAVA_CLASS_NAME = "com.aspose.mw.barcode.MwQrExtCodetextBuilder";

    function __construct()
    {
        try
        {
            $java_class = new java(self::JAVA_CLASS_NAME);
            parent::__construct($java_class);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    function init(): void
    {
    }

    /**
     * Adds FNC1 in first position to the extended codetext items
     */
    function addFNC1FirstPosition(): void
    {
        try
        {
            $this->getJavaClass()->addFNC1FirstPosition();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Adds FNC1 in second position to the extended codetext items
     *
     * @param string $codetext Value of the FNC1 in the second position
     */
    function addFNC1SecondPosition(string $codetext): void
    {
        try
        {
            $this->getJavaClass()->addFNC1SecondPosition($codetext);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Adds Group Separator (GS - '\\u001D') to the extended codetext items
     */
    function addFNC1GroupSeparator(): void
    {
        try
        {
            $this->getJavaClass()->addFNC1GroupSeparator();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Generates Extended codetext from the extended codetext list.
     *
     * @return string Extended codetext as string
     */
    function getExtendedCodetext(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getExtendedCodetext(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

}

/**
 * PatchCode parameters.
 */
class PatchCodeParameters extends BaseJavaClass
{
    protected function init(): void
    {
    }

    /**
     * Specifies codetext for an extra QR barcode, when PatchCode is generated in page mode.
     */
    public function getExtraBarcodeText(): ?string
    {
        try
        {
            $ExtraBarcodeText = java_cast($this->getJavaClass()->getExtraBarcodeText(), "string");
            if ($ExtraBarcodeText == "null")
            {
                return null;
            }
            return $ExtraBarcodeText;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specifies codetext for an extra QR barcode, when PatchCode is generated in page mode.
     */
    public function setExtraBarcodeText(string $value): void
    {
        try
        {
            $this->getJavaClass()->setExtraBarcodeText($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * PatchCode format. Choose PatchOnly to generate single PatchCode. Use page format to generate Patch page with PatchCodes as borders.
     * Default value: PatchFormat::PATCH_ONLY
     *
     * @return
     */
    public function getPatchFormat(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getPatchFormat(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * PatchCode format. Choose PatchOnly to generate single PatchCode. Use page format to generate Patch page with PatchCodes as borders.
     * Default value: PatchFormat::PATCH_ONLY
     */
    public function setPatchFormat(int $value): void
    {
        try
        {
            $this->getJavaClass()->setPatchFormat($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this PatchCodeParameters.
     * @return string A string that represents this PatchCodeParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * QR structured append parameters.
 */
class QrStructuredAppendParameters extends BaseJavaClass
{
    protected function init(): void
    {
    }

    function __construct($javaClass)
    {
        try
        {
            parent::__construct($javaClass);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Gets the QR structured append mode parity data.
     */
    public function getParityByte(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getParityByte(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Sets the QR structured append mode parity data.
     */
    public function setParityByte(int $value)
    {
        try
        {
            $this->getJavaClass()->setParityByte($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the index of the QR structured append mode barcode. Index starts from 0.
     */
    public function getSequenceIndicator(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getSequenceIndicator(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the index of the QR structured append mode barcode. Index starts from 0.
     */
    public function setSequenceIndicator(int $value)
    {
        try
        {
            $this->getJavaClass()->setSequenceIndicator($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the QR structured append mode barcodes quantity. Max value is 16.
     */
    public function getTotalCount(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getTotalCount(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the QR structured append mode barcodes quantity. Max value is 16.
     */
    public function setTotalCount(int $value)
    {
        try
        {
            $this->getJavaClass()->setTotalCount($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * Extended codetext generator for MaxiCode barcodes for ExtendedCodetext Mode of MaxiCodeEncodeMode
 * Use TwoDDisplayText property of BarcodeGenerator to set visible text to removing managing characters.
 *
 * This sample shows how to use MaxiCodeExtCodetextBuilder in Extended Mode.
 *
 * @code
 * //create codetext
 * $textBuilder = new MaxiCodeExtCodetextBuilder();
 * $textBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $textBuilder->addECICodetext(ECIEncodings::UTF8, "犬Right狗");
 * $textBuilder->addECICodetext(ECIEncodings::UTF16BE, "犬Power狗");
 * $textBuilder->addPlainCodetext("Plain text");
 *
 * //generate codetext
 * $codetext = $textBuilder->getExtendedCodetext();
 *
 * //generate
 * $generator = new BarcodeGenerator(EncodeTypes::MAXI_CODE, $codetext);
 * $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
 * $generator->save("test.bmp", BarcodeImageFormat.BMP);
 * @endcode
 */
class MaxiCodeExtCodetextBuilder extends ExtCodetextBuilder
{
    private const JAVA_CLASS_NAME = "com.aspose.mw.barcode.generation.MwMaxiCodeExtCodetextBuilder";

    function __construct()
    {
        try
        {
            $java_class = new java(self::JAVA_CLASS_NAME);
            parent::__construct($java_class);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    function init(): void
    {
    }

    /**
     * Generates Extended codetext from the extended codetext list.
     * @return string Extended codetext as string
     */
    public function getExtendedCodetext() : string
    {
        return java_cast($this->getJavaClass()->getExtendedCodetext(), "string");
    }
}

/**
 * <p>
 * <p>Extended codetext generator for 2D DotCode barcodes for ExtendedCodetext Mode of DotCodeEncodeMode</p>
 * </p><p><hr><blockquote><pre>
 * <pre>
 *
 * //Extended codetext mode
 * //create codetext
 * $textBuilder = new DotCodeExtCodetextBuilder();
 * $textBuilder->addFNC1FormatIdentifier();
 * $textBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $textBuilder->addFNC1FormatIdentifier();
 * $textBuilder->addECICodetext(ECIEncodings::UTF8, "犬Right狗");
 * $textBuilder->addFNC1FormatIdentifier();
 * $textBuilder->addECICodetext(ECIEncodings::UTF16BE, "犬Power狗");
 * $textBuilder->addPlainCodetext("Plain text");
 * $textBuilder->addFNC3SymbolSeparator();
 * $textBuilder->addFNC3ReaderInitialization();
 * $textBuilder->addPlainCodetext("Reader initialization info");
 * //generate codetext
 * $codetext = $textBuilder->getExtendedCodetext();
 * //generate
 * $generator = new BarcodeGenerator(EncodeTypes::DOT_CODE, $codetext);
 * {
 *     $generator->getParameters()->getBarcode()->getDotCode()->setDotCodeEncodeMode(DotCodeEncodeMode::EXTENDED_CODETEXT);
 * 	   $generator->save("test.bmp", BarCodeImageFormat::BMP);
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class DotCodeExtCodetextBuilder extends ExtCodetextBuilder
{
    const JAVA_CLASS_NAME = "com.aspose.mw.barcode.generation.MwDotCodeExtCodetextBuilder";
    public function __construct()
    {
        $javaClass = new java(DotCodeExtCodetextBuilder::JAVA_CLASS_NAME);
        parent::__construct($javaClass);
    }

    static function construct($javaClass) : DotCodeExtCodetextBuilder
    {
        $obj = new DotCodeExtCodetextBuilder();
        $obj->setJavaClass($javaClass);
        return $obj;
    }

    /**
     * <p>
     * Adds FNC1 format identifier to the extended codetext items
     * </p>
     */
    public function addFNC1FormatIdentifier() : void
    {
        $this->getJavaClass()->addFNC1FormatIdentifier();
    }

    /**
     * <p>
     * Adds FNC3 symbol separator to the extended codetext items
     * </p>
     */
    public function addFNC3SymbolSeparator() : void
    {
        $this->getJavaClass()->addFNC3SymbolSeparator();
    }

    /**
     * <p>
     * Adds FNC3 reader initialization to the extended codetext items
     * </p>
     */
    public function addFNC3ReaderInitialization() : void
    {
        $this->getJavaClass()->addFNC3ReaderInitialization();
    }

    /**
     * <p>
     * Adds structured append mode to the extended codetext items
     * </p>
     * @param barcodeId ID of barcode
     * @param barcodesCount Barcodes count
     */
    public function addStructuredAppendMode(int $barcodeId, int $barcodesCount) : void
    {
        $this->getJavaClass()->addStructuredAppendMode($barcodeId, $barcodesCount);
    }

    /**
     * <p>
     * Generates Extended codetext from the extended codetext list.
     * </p>
     * @return Extended codetext as string
     */
    public function getExtendedCodetext() : string
    {
        return java_cast($this->getJavaClass()->getExtendedCodetext(), "string");
    }

    public function init() : void {}
}

/**
 * Code128 parameters.
 */
class Code128Parameters extends BaseJavaClass
{
    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    function init(): void
    {
    }

    /**
     * <p>
     * Gets or sets a Code128 encode mode.
     * Default value: Code128EncodeMode.Auto
     * </p>
     */
    public function getCode128EncodeMode() : int
    {
        try
        {
            return java_cast($this->getJavaClass()->getCode128EncodeMode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
    /**
     * <p>
     * Gets or sets a Code128 encode mode.
     * Default value: Code128EncodeMode.Auto
     * </p>
     */
    public function setCode128EncodeMode(int $value)
    {
        try
        {
            $this->getJavaClass()->setCode128EncodeMode($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this PatchCodeParameters.
     * @return string A string that represents this PatchCodeParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * <p>
 * Han Xin parameters.
 * </p>
 */
class HanXinParameters extends BaseJavaClass
{
    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    function init(): void
    {
    }

    /**
     * <p>
     * Version of HanXin Code.
     * From Version01 to Version84 for Han Xin code.
     * Default value is HanXinVersion.Auto.
     * </p>
     */
    public function getHanXinVersion() : int
    {
        return java_cast($this->getJavaClass()->getHanXinVersion(), "integer");
    }
    /**
     * <p>
     * Version of HanXin Code.
     * From Version01 to Version84 for Han Xin code.
     * Default value is HanXinVersion.Auto.
     * </p>
     */
    public function setHanXinVersion(int $value) : void
    {
        $this->getJavaClass()->setHanXinVersion($value);
    }

    /**
     * <p>
     *  Level of Reed-Solomon error correction for Han Xin barcode.
     *  From low to high: L1, L2, L3, L4. see HanXinErrorLevel.
     * </p>
     */
    public function getHanXinErrorLevel() : int
    {
        return java_cast($this->getJavaClass()->getHanXinErrorLevel(), "integer");
    }
    /**
     * <p>
     *  Level of Reed-Solomon error correction for Han Xin barcode.
     *  From low to high: L1, L2, L3, L4. see HanXinErrorLevel.
     * </p>
     */
    public function setHanXinErrorLevel(int $value) :void
    {
        $this->getJavaClass()->setHanXinErrorLevel($value);
    }

    /**
     * <p>
     * HanXin encoding mode.
     * Default value: HanXinEncodeMode::Mixed.
     * </p>
     */
    public function getHanXinEncodeMode() : int
    {
        return java_cast($this->getJavaClass()->getHanXinEncodeMode(), "integer");
    }
    /**
     * <p>
     * HanXin encoding mode.
     * Default value: HanXinEncodeMode::Mixed.
     * </p>
     */
    public function setHanXinEncodeMode(int $value) :void
    {
        $this->getJavaClass()->setHanXinEncodeMode($value);
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     * </p>
     */
    public function getHanXinECIEncoding() :int
{
        return java_cast($this->getJavaClass()->getHanXinECIEncoding(), "integer");
    }
    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     * </p>
     */
    public function setHanXinECIEncoding(int $value) :void
    {
        $this->getJavaClass()->setHanXinECIEncoding($value);
    }


    /**
     * <p>
     * Returns a human-readable string representation of this {@code HanXinParameters}.
     * </p>
     * @return A string that represents this {@code HanXinParameters}.
     */
    public function toString() :string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }
}


/**
 * <p>
 * <p>Extended codetext generator for 2D DataMatrix barcodes for ExtendedCodetext Mode of DataMatrixEncodeMode</p>
 * </p><p><hr><blockquote><pre>
 * <pre>
 * //Extended codetext mode
 * //create codetext
 * $textBuilder = new DataMatrixExtCodetextBuilder();
 * $codetextBuilder->addECICodetextWithEncodeMode(ECIEncodings::Win1251, DataMatrixEncodeMode::BYTES, "World");
 * $codetextBuilder->addPlainCodetext("Will");
 * $codetextBuilder->addECICodetext(ECIEncodings::UTF_8, "犬Right狗");
 * $codetextBuilder->addCodetextWithEncodeMode(DataMatrixEncodeMode::C_40, "ABCDE");
 * //generate codetext
 * $codetext = $textBuilder->getExtendedCodetext();
 * //generate
 * $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, null, $codetext);
 * $generator->getParameters()->getBarcode()->getDataMatrix()->setDataMatrixEncodeMode(DataMatrixEncodeMode::EXTENDED_CODETEXT);
 * $generator->save("test.bmp", BarcodeImageFormat::BMP);
 * </pre>
 * </pre></blockquote></hr></p>
 */
class DataMatrixExtCodetextBuilder extends ExtCodetextBuilder
{
    private const JAVA_CLASS_NAME = "com.aspose.mw.barcode.generation.MwDataMatrixExtCodetextBuilder";

    function __construct()
    {
        try
        {
            $java_class = new java(self::JAVA_CLASS_NAME);
            parent::__construct($java_class);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($javaClass)
    {
        $obj = new DataMatrixExtCodetextBuilder();
        $obj->setJavaClass($javaClass);
        return $obj;
    }

    function init(): void
    {
    }
    /**
     * <p>
     * Adds codetext with Extended Channel Identifier with defined encode mode
     * </p>
     * @param ECIEncoding Extended Channel Identifier
     * @param encodeMode Encode mode value
     * @param codetext Codetext in unicode to add as extended codetext item with Extended Channel Identifier with defined encode mode
     */
    public function addECICodetextWithEncodeMode(int $ECIEncoding, int $encodeMode, string $codetext) : void
    {
        $this->getJavaClass()->addECICodetextWithEncodeMode($ECIEncoding, $encodeMode, $codetext);
    }

    /**
     * <p>
     * Adds codetext with defined encode mode to the extended codetext items
     * </p>
     * @param encodeMode Encode mode value
     * @param codetext Codetext in unicode to add as extended codetext item
     */
    public function addCodetextWithEncodeMode(int $encodeMode, string $codetext) : void
    {
        $this->getJavaClass()->addCodetextWithEncodeMode($encodeMode, $codetext);
    }

    /**
     * <p>
     * Generates Extended codetext from the extended codetext list.
     * </p>
     * @return Extended codetext as string
     */
    public /*override*/ function getExtendedCodetext() : string
    {
        return java_cast($this->getJavaClass()->getExtendedCodetext(), "String");
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
     * @code
     * //to generate autoidentified GS1 message like this "(10)123ABC(10)123ABC" in ISO 15434 format you need:
     * $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, "10123ABC\u001D10123ABC");
     * $generator->getParameters()->getBarcode()->getDataMatrix()->setMacroCharacters(MacroCharacter::MACRO_05);
     * $reader = new BarCodeReader($generator->generateBarCodeImage(BarcodeImageFormat::PNG), null, DecodeType::GS_1_DATA_MATRIX);
     * foreach($reader->readBarCodes() as $result)
     *     print("BarCode CodeText: ".$result->getCodeText());
     * @endcode
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
class DataMatrixEncodeMode
{

    /**
     * Automatically pick up the best encode mode for datamatrix encoding
     */
    const AUTO = 0;
    /**
     * Encodes one alphanumeric or two numeric characters per byte
     */
    const ASCII = 1;
    /**
     * Encode 8 bit values
     */
    const BYTES = 6;
    /**
     * Uses C40 encoding. Encodes Upper-case alphanumeric, Lower case and special characters
     */
    const C40 = 8;

    /**
     * Uses TEXT encoding. Encodes Lower-case alphanumeric, Upper case and special characters
     */
    const TEXT = 9;

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
     * @code
     * $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX);
     * $generator->setCodeText("\\ansix12:ANSIX12TEXT\\ascii:backslash must be \\\\ doubled\\edifact:EdifactEncodedText");
     * $generator->getParameters()->getBarcode()->getDataMatrix()->setDataMatrixEncodeMode(DataMatrixEncodeMode.EXTENDED_CODETEXT);
     * $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
     * $generator->save("test.png", BarcodeImageFormat::PNG);
     * @endcode
     */
    const EXTENDED_CODETEXT = 12;
}

/**
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
     *
     * Example how to use ECI encoding
     * @code
     *     $generator = new BarcodeGenerator(EncodeTypes::QR);
     *     $generator->setCodeText("12345TEXT");
     *     $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::ECI_ENCODING);
     *     $generator->getParameters()->getBarcode()->getQR()->setQrEncodeType(QREncodeType::FORCE_QR);
     *     $generator->getParameters()->getBarcode()->getQR()->setQrECIEncoding(ECIEncodings::UTF8);
     *     $generator->save("test.png", BarcodeImageFormat::PNG);
     * @endcode
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
     *
     * Example how to use FNC1 first position in Extended Mode
     * @code
     *      $textBuilder = new QrExtCodetextBuilder();
     *      $textBuilder->addPlainCodetext("000%89%%0");
     *      $textBuilder->addFNC1GroupSeparator();
     *      $textBuilder->addPlainCodetext("12345&lt;FNC1&gt;");
     *      //generate barcode
     *      $generator = new BarcodeGenerator(EncodeTypes::QR);
     *      $generator->setCodeText($textBuilder->getExtendedCodetext());
     *      $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::EXTENDED_CODETEXT);
     *      $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
     *      $generator->save("d:/test.png", BarcodeImageFormat::PNG);
     * @endcode
     *
     * This sample shows how to use FNC1 second position in Extended Mode.
     * @code
     *    //create codetext
     *    $textBuilder = new QrExtCodetextBuilder();
     *    $textBuilder->addFNC1SecondPosition("12");
     *    $textBuilder->addPlainCodetext("TRUE3456");
     *    //generate barcode
     *    $generator = new BarcodeGenerator(EncodeTypes::QR);
     *    $generator->setCodeText($textBuilder->getExtendedCodetext());
     *    $generator->getParameters()->getBarcode()->getCodeTextParameters()->setTwoDDisplayText("My Text");
     *    $generator->save("d:/test.png", BarcodeImageFormat::PNG);
     * @endcode
     *
     *    This sample shows how to use multi ECI mode in Extended Mode.
     * @code
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
     *   $generator->save("d:/test.png", BarcodeImageFormat::PNG);
     * @endcode
     */
    const EXTENDED_CODETEXT = 5;

}

/**
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
 * @code
 *  $generator = new BarcodeGenerator(EncodeTypes::AZTEC);
 *  $generator->setCodeText("125");
 *  $generator->getParameters()->getBarcode()->getAztec()->setAztecSymbolMode(AztecSymbolMode::RUNE);
 *  $generator->save("test.png", "PNG");
 * @endcode
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
 *
 *  This sample shows how to create and save a BarCode image.
 * @code
 *  $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX);
 *  $generator->setAutoSizeMode(AutoSizeMode.NEAREST);
 *  $generator->getBarCodeWidth()->setMillimeters(50);
 *  $generator->getBarCodeHeight()->setInches(1.3f);
 *  $generator->save("test.png");
 * @endcode
 */
class AutoSizeMode
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
     *
     *  This sample shows how to create and save a BarCode image in Scale mode.
     * @code
     *      $generator = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, "");
     *      $generator->getParameters()->getBarcode()->setAutoSizeMode(AutoSizeMode::INTERPOLATION);
     *      $generator->getParameters()->getBarcode()->getBarCodeWidth()->setMillimeters(50);
     *      $generator->getParameters()->getBarcode()->getBarCodeHeight()->setInches(1.3);
     *      $generator->save("test.png", "PNG);
     * @endcode
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
     *    Specifies a device pixel as the unit of measure.
     */
    const PIXEL = 2;

    /**
     * Specifies a printer's point  = 1/72 inch) as the unit of measure.
     */
    const POINT = 3;

    /**
     *    Specifies the inch as the unit of measure.
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
    const  NONE = -1;

    /**
     * Specifies that the data should be encoded with CODABAR barcode specification
     */
    const  CODABAR = 0;

    /**
     * Specifies that the data should be encoded with CODE 11 barcode specification
     */
    const  CODE_11 = 1;

    /**
     * Specifies that the data should be encoded with Standard CODE 39 barcode specification
     */
    const  CODE_39_STANDARD = 2;

    /**
     * Specifies that the data should be encoded with Extended CODE 39 barcode specification
     */
    const  CODE_39_EXTENDED = 3;

    /**
     * Specifies that the data should be encoded with Standard CODE 93 barcode specification
     */
    const  CODE_93_STANDARD = 4;

    /**
     * Specifies that the data should be encoded with Extended CODE 93 barcode specification
     */
    const  CODE_93_EXTENDED = 5;

    /**
     * Specifies that the data should be encoded with CODE 128 barcode specification
     */
    const  CODE_128 = 6;

    /**
     * Specifies that the data should be encoded with GS1 Code 128 barcode specification. The codetext must contains parentheses for AI.
     */
    const  GS_1_CODE_128 = 7;

    /**
     * Specifies that the data should be encoded with EAN-8 barcode specification
     */
    const  EAN_8 = 8;

    /**
     * Specifies that the data should be encoded with EAN-13 barcode specification
     */
    const  EAN_13 = 9;

    /**
     * Specifies that the data should be encoded with EAN14 barcode specification
     */
    const  EAN_14 = 10;

    /**
     * Specifies that the data should be encoded with SCC14 barcode specification
     */
    const  SCC_14 = 11;

    /**
     * Specifies that the data should be encoded with SSCC18 barcode specification
     */
    const  SSCC_18 = 12;

    /**
     * Specifies that the data should be encoded with UPC-A barcode specification
     */
    const  UPCA = 13;

    /**
     * Specifies that the data should be encoded with UPC-E barcode specification
     */
    const  UPCE = 14;

    /**
     * Specifies that the data should be encoded with isBN barcode specification
     */
    const  ISBN = 15;

    /**
     * Specifies that the data should be encoded with ISSN barcode specification
     */
    const  ISSN = 16;

    /**
     * Specifies that the data should be encoded with ISMN barcode specification
     */
    const  ISMN = 17;

    /**
     * Specifies that the data should be encoded with Standard 2 of 5 barcode specification
     */
    const  STANDARD_2_OF_5 = 18;

    /**
     * Specifies that the data should be encoded with INTERLEAVED 2 of 5 barcode specification
     */
    const  INTERLEAVED_2_OF_5 = 19;

    /**
     * Represents Matrix 2 of 5 BarCode
     */
    const  MATRIX_2_OF_5 = 20;

    /**
     * Represents Italian Post 25 barcode.
     */
    const  ITALIAN_POST_25 = 21;

    /**
     * Represents IATA 2 of 5 barcode.IATA (International Air Transport Assosiation) uses this barcode for the management of air cargo.
     */
    const  IATA_2_OF_5 = 22;

    /**
     * Specifies that the data should be encoded with ITF14 barcode specification
     */
    const  ITF_14 = 23;

    /**
     * Represents ITF-6  Barcode.
     */
    const  ITF_6 = 24;

    /**
     * Specifies that the data should be encoded with MSI Plessey barcode specification
     */
    const  MSI = 25;

    /**
     * Represents VIN (Vehicle Identification Number) Barcode.
     */
    const  VIN = 26;

    /**
     * Represents Deutsch Post barcode, This EncodeType is also known as Identcode,CodeIdentcode,German Postal 2 of 5 Identcode,
     * Deutsch Post AG Identcode, Deutsch Frachtpost Identcode,  Deutsch Post AG (DHL)
     */
    const  DEUTSCHE_POST_IDENTCODE = 27;

    /**
     * Represents Deutsch Post Leitcode Barcode,also known as German Postal 2 of 5 Leitcode, CodeLeitcode, Leitcode, Deutsch Post AG (DHL).
     */
    const  DEUTSCHE_POST_LEITCODE = 28;

    /**
     * Represents OPC(Optical Product Code) Barcode,also known as , VCA Barcode VCA OPC, Vision Council of America OPC Barcode.
     */
    const  OPC = 29;

    /**
     * Represents PZN barcode.This EncodeType is also known as Pharmacy central number, Pharmazentralnummer
     */
    const  PZN = 30;

    /**
     * Represents Code 16K barcode.
     */
    const  CODE_16_K = 31;

    /**
     * Represents Pharmacode barcode.
     */
    const  PHARMACODE = 32;

    /**
     * 2D barcode symbology DataMatrix
     */
    const  DATA_MATRIX = 33;

    /**
     * Specifies that the data should be encoded with QR Code barcode specification
     */
    const  QR = 34;

    /**
     * Specifies that the data should be encoded with Aztec barcode specification
     */
    const  AZTEC = 35;

    /**
     * Specifies that the data should be encoded with Pdf417 barcode specification
     */
    const  PDF_417 = 36;

    /**
     * Specifies that the data should be encoded with MacroPdf417 barcode specification
     */
    const  MACRO_PDF_417 = 37;

    /**
     * 2D barcode symbology DataMatrix with GS1 string format
     */
    const  GS_1_DATA_MATRIX = 48;

    /**
     * Specifies that the data should be encoded with MicroPdf417 barcode specification
     */
    const  MICRO_PDF_417 = 55;

    /**
     * 2D barcode symbology QR with GS1 string format
     */
    const  GS_1_QR = 56;

    /**
     * Specifies that the data should be encoded with MaxiCode barcode specification
     */
    const  MAXI_CODE = 57;

    /**
     * Specifies that the data should be encoded with DotCode barcode specification
     */
    const  DOT_CODE = 60;

    /**
     * Represents Australia Post Customer BarCode
     */
    const  AUSTRALIA_POST = 38;

    /**
     * Specifies that the data should be encoded with Postnet barcode specification
     */
    const  POSTNET = 39;

    /**
     * Specifies that the data should be encoded with Planet barcode specification
     */
    const  PLANET = 40;

    /**
     * Specifies that the data should be encoded with USPS OneCode barcode specification
     */
    const  ONE_CODE = 41;

    /**
     * Represents RM4SCC barcode. RM4SCC (Royal Mail 4-state Customer Code) is used for automated mail sort process in UK.
     */
    const  RM_4_SCC = 42;

    /**
     * Represents Royal Mail Mailmark barcode.
     */
    const MAILMARK = 66;

    /**
     * Specifies that the data should be encoded with GS1 Databar omni-directional barcode specification.
     */
    const  DATABAR_OMNI_DIRECTIONAL = 43;

    /**
     * Specifies that the data should be encoded with GS1 Databar truncated barcode specification.
     */
    const  DATABAR_TRUNCATED = 44;

    /**
     * Represents GS1 DATABAR limited barcode.
     */
    const  DATABAR_LIMITED = 45;

    /**
     * Represents GS1 Databar expanded barcode.
     */
    const  DATABAR_EXPANDED = 46;

    /**
     * Represents GS1 Databar expanded stacked barcode.
     */
    const  DATABAR_EXPANDED_STACKED = 52;

    /**
     * Represents GS1 Databar stacked barcode.
     */
    const  DATABAR_STACKED = 53;

    /**
     * Represents GS1 Databar stacked omni-directional barcode.
     */
    const  DATABAR_STACKED_OMNI_DIRECTIONAL = 54;

    /**
     * Specifies that the data should be encoded with Singapore Post Barcode barcode specification
     */
    const  SINGAPORE_POST = 47;

    /**
     * Specifies that the data should be encoded with Australian Post Domestic eParcel Barcode barcode specification
     */
    const  AUSTRALIAN_POSTE_PARCEL = 49;

    /**
     * Specifies that the data should be encoded with Swiss Post Parcel Barcode barcode specification. Supported types: Domestic Mail, International Mail, Additional Services (new)
     */
    const  SWISS_POST_PARCEL = 50;

    /**
     * Represents Patch code barcode
     */
    const  PATCH_CODE = 51;

    /**
     * Specifies that the data should be encoded with Code32 barcode specification
     */
    const  CODE_32 = 58;

    /**
     * Specifies that the data should be encoded with DataLogic 2 of 5 barcode specification
     */
    const  DATA_LOGIC_2_OF_5 = 59;

    /**
     * Specifies that the data should be encoded with Dutch KIX barcode specification
     */
    const  DUTCH_KIX = 61;

    /**
     * Specifies that the data should be encoded with UPC coupon with GS1-128 Extended Code barcode specification.
     * An example of the input string:
     * BarCodeBuilder->setCodetext("514141100906(8102)03"),
     * where UPCA part is "514141100906", GS1Code128 part is (8102)03.
     */
    const  UPCA_GS_1_CODE_128_COUPON = 62;

    /**
     * Specifies that the data should be encoded with UPC coupon with GS1 DataBar addition barcode specification.
     *
     * An example of the input string:
     * @code
     * BarcodeGenerator->setCodetext("514141100906(8110)106141416543213500110000310123196000"),
     * @endcode
     * where UPCA part is "514141100906", DATABAR part is "(8110)106141416543213500110000310123196000".
     * To change the caption, use barCodeBuilder->getCaptionAbove()->setText("company prefix + offer code");
     */
    const  UPCA_GS_1_DATABAR_COUPON = 63;

    /**
     * Specifies that the data should be encoded with Codablock-F barcode specification.
     */
    const  CODABLOCK_F = 64;

    /**
     * Specifies that the data should be encoded with GS1 Codablock-F barcode specification. The codetext must contains parentheses for AI.
     */
    const  GS_1_CODABLOCK_F = 65;

    /**
     * Specifies that the data should be encoded with <b>GS1 Composite Bar</b> barcode specification. The codetext must contains parentheses for AI. 1D codetext and 2D codetext must be separated with symbol '/'
     */
    const GS_1_COMPOSITE_BAR = 67;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC LIC Code39Standart</b>} barcode specification.
     * </p>
     */
    const HIBC_CODE_39_LIC = 68;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC LIC Code128</b>} barcode specification.
     * </p>
     */
    const HIBC_CODE_128_LIC = 69;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC LIC Aztec</b>} barcode specification.
     * </p>
     */
    const HIBC_AZTEC_LIC = 70;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC LIC DataMatrix</b>} barcode specification.
     * </p>
     */
    const HIBC_DATA_MATRIX_LIC = 71;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC LIC QR</b>} barcode specification.
     * </p>
     */
    const HIBCQRLIC = 72;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC PAS Code39Standart</b>} barcode specification.
     * </p>
     */
    const HIBC_CODE_39_PAS = 73;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC PAS Code128</b>} barcode specification.
     * </p>
     */
    const HIBC_CODE_128_PAS = 74;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC PAS Aztec</b>} barcode specification.
     * </p>
     */
    const HIBC_AZTEC_PAS = 75;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC PAS DataMatrix</b>} barcode specification.
     * </p>
     */
    const HIBC_DATA_MATRIX_PAS = 76;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>HIBC PAS QR</b>} barcode specification.
     * </p>
     */
    const HIBCQRPAS = 77;

    /**
     * <p>
     * Specifies that the data should be encoded with {@code <b>GS1 DotCode</b>} barcode specification. The codetext must contains parentheses for AI.
     * </p>
     */
    const GS_1_DOT_CODE = 78;

    /**
     * Specifies that the data should be encoded with <b>Han Xin</b> barcode specification
     */
    const HAN_XIN = 79;

    /**
     * 2D barcode symbology QR with GS1 string format
     */
    const GS_1_HAN_XIN = 80;

    public static function parse(string $encodeTypeName) : int
    {
        if($encodeTypeName == "CODABAR") return 0;

        else if($encodeTypeName == "CODE_11") return 1;

        else if($encodeTypeName == "CODE_39_STANDARD") return 2;

        else if($encodeTypeName == "CODE_39_EXTENDED") return 3;

        else if($encodeTypeName == "CODE_93_STANDARD") return 4;

        else if($encodeTypeName == "CODE_93_EXTENDED") return 5;

        else if($encodeTypeName == "CODE_128") return 6;

        else if($encodeTypeName == "GS_1_CODE_128") return 7;

        else if($encodeTypeName == "EAN_8") return 8;

        else if($encodeTypeName == "EAN_13") return 9;

        else if($encodeTypeName == "EAN_14") return 10;

        else if($encodeTypeName == "SCC_14") return 11;

        else if($encodeTypeName == "SSCC_18") return 12;

        else if($encodeTypeName == "UPCA") return 13;

        else if($encodeTypeName == "UPCE") return 14;

        else if($encodeTypeName == "ISBN") return 15;

        else if($encodeTypeName == "ISSN") return 16;

        else if($encodeTypeName == "ISMN") return 17;

        else if($encodeTypeName == "STANDARD_2_OF_5") return 18;

        else if($encodeTypeName == "INTERLEAVED_2_OF_5") return 19;

        else if($encodeTypeName == "MATRIX_2_OF_5") return 20;

        else if($encodeTypeName == "ITALIAN_POST_25") return 21;

        else if($encodeTypeName == "IATA_2_OF_5") return 22;

        else if($encodeTypeName == "ITF_14") return 23;

        else if($encodeTypeName == "ITF_6") return 24;

        else if($encodeTypeName == "MSI") return 25;

        else if($encodeTypeName == "VIN") return 26;

        else if($encodeTypeName == "DEUTSCHE_POST_IDENTCODE") return 27;

        else if($encodeTypeName == "DEUTSCHE_POST_LEITCODE") return 28;

        else if($encodeTypeName == "OPC") return 29;

        else if($encodeTypeName == "PZN") return 30;

        else if($encodeTypeName == "CODE_16_K") return 31;

        else if($encodeTypeName == "PHARMACODE") return 32;

        else if($encodeTypeName == "DATA_MATRIX") return 33;

        else if($encodeTypeName == "QR") return 34;

        else if($encodeTypeName == "AZTEC") return 35;

        else if($encodeTypeName == "PDF_417") return 36;

        else if($encodeTypeName == "MACRO_PDF_417") return 37;

        else if($encodeTypeName == "GS_1_DATA_MATRIX") return 48;

        else if($encodeTypeName == "MICRO_PDF_417") return 55;

        else if($encodeTypeName == "GS_1_QR") return 56;

        else if($encodeTypeName == "MAXI_CODE") return 57;

        else if($encodeTypeName == "DOT_CODE") return 60;

        else if($encodeTypeName == "AUSTRALIA_POST") return 38;

        else if($encodeTypeName == "POSTNET") return 39;

        else if($encodeTypeName == "PLANET") return 40;

        else if($encodeTypeName == "ONE_CODE") return 41;

        else if($encodeTypeName == "RM_4_SCC") return 42;

        else if($encodeTypeName == "MAILMARK") return 66;

        else if($encodeTypeName == "DATABAR_OMNI_DIRECTIONAL") return 43;

        else if($encodeTypeName == "DATABAR_TRUNCATED") return 44;

        else if($encodeTypeName == "DATABAR_LIMITED") return 45;

        else if($encodeTypeName == "DATABAR_EXPANDED") return 46;

        else if($encodeTypeName == "DATABAR_EXPANDED_STACKED") return 52;

        else if($encodeTypeName == "DATABAR_STACKED") return 53;

        else if($encodeTypeName == "DATABAR_STACKED_OMNI_DIRECTIONAL") return 54;

        else if($encodeTypeName == "SINGAPORE_POST") return 47;

        else if($encodeTypeName == "AUSTRALIAN_POSTE_PARCEL") return 49;

        else if($encodeTypeName == "SWISS_POST_PARCEL") return 50;

        else if($encodeTypeName == "PATCH_CODE") return 51;

        else if($encodeTypeName == "CODE_32") return 58;

        else if($encodeTypeName == "DATA_LOGIC_2_OF_5") return 59;

        else if($encodeTypeName == "DUTCH_KIX") return 61;

        else if($encodeTypeName == "UPCA_GS_1_CODE_128_COUPON") return 62;

        else if($encodeTypeName == "UPCA_GS_1_DATABAR_COUPON") return 63;

        else if($encodeTypeName == "CODABLOCK_F") return 64;

        else if($encodeTypeName == "GS_1_CODABLOCK_F") return 65;

        else if($encodeTypeName == "GS_1_COMPOSITE_BAR") return 67;

        else if($encodeTypeName == "HIBC_CODE_39_LIC") return 68;

        else if($encodeTypeName == "HIBC_CODE_128_LIC") return 69;

        else if($encodeTypeName == "HIBC_AZTEC_LIC") return 70;

        else if($encodeTypeName == "HIBC_DATA_MATRIX_LIC") return 71;

        else if($encodeTypeName == "HIBCQRLIC") return 72;

        else if($encodeTypeName == "HIBC_CODE_39_PAS") return 73;

        else if($encodeTypeName == "HIBC_CODE_128_PAS") return 74;

        else if($encodeTypeName == "HIBC_AZTEC_PAS") return 75;

        else if($encodeTypeName == "HIBC_DATA_MATRIX_PAS") return 76;

        else if($encodeTypeName == "HIBCQRPAS") return 77;

        else if($encodeTypeName == "GS_1_DOT_CODE") return 78;

        else if($encodeTypeName == "HAN_XIN") return 79;

        else if($encodeTypeName == "GS_1_HAN_XIN") return 80;

        else return -1;
    }
}

/**
 * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
 * about the used references for encoding the data in the symbol.
 * Current implementation consists all well known charset encodings.
 * Currently, it is used only for QR 2D barcode.
 *
 * Example how to use ECI encoding
 * @code
 *     $generator = new BarcodeGenerator(EncodeTypes::QR);
 *     $generator->setCodeText("12345TEXT");
 *     $generator->getParameters()->getBarcode()->getQR()->setQrEncodeMode(QREncodeMode::ECI_ENCODING);
 *     $generator->getParameters()->getBarcode()->getQR()->setQrEncodeType(QREncodeType::FORCE_QR);
 *     $generator->getParameters()->getBarcode()->getQR()->setQrECIEncoding(ECIEncodings::UTF_8);
 *     $generator->save("test.png", "PNG");
 * @endcode
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
 * Function codewords for Code 128 emulation. Applied for MicroPDF417 only. Ignored for PDF417 and MacroPDF417 barcodes.
 */
class Code128Emulation
{
    /**
     * No Code 128 emulation
     */
    const NONE = 0;

    /**
     * UCC/EAN-128 emulation. Text compactionmode implied.
     */
    const CODE_903 = 903;

    /**
     * UCC/EAN-128 emulation. Numeric compactionmode implied.
     */
    const CODE_904 = 904;

    /**
     * UCC/EAN-128 emulation. Implied '01' AI and 14-digit codetext.
     */
    const CODE_905 = 905;
}

/**
 * Specifies the file format of the image.
 */
class BarCodeImageFormat
{
    /**
     * Specifies the bitmap (BMP) image format.
     */
    const BMP = 0;

    /**
     * Specifies the Graphics Interchange Format (GIF) image format.
     */
    const GIF = 1;

    /**
     * Specifies the Joint Photographic Experts Group (JPEG) image format.
     */
    const JPEG = 2;

    /**
     * Specifies the W3C Portable Network Graphics (PNG) image format.
     */
    const PNG = 3;

    /**
     * Specifies the Tagged Image File Format (TIFF) image format.
     */
     const TIFF = 4;


    /**
     * Specifies the Tagged Image File Format (TIFF) image format in CMYK color model.
     */
     const TIFF_IN_CMYK = 5;

    /**
     * Specifies the Enhanced Metafile (EMF) image format.
     */
     const EMF = 6;

    /**
     * Specifies the Scalable Vector Graphics (SVG) image format.
     */
     const SVG = 7;
}


/**
 * Type of 2D component
 * This sample shows how to create and save a GS1 Composite Bar image.
 * Note that 1D codetext and 2D codetext are separated by symbol '/'
 * <code>
 * $codetext = "(01)03212345678906/(21)A1B2C3D4E5F6G7H8";
 * $generator = new BarcodeGenerator(EncodeTypes::GS1_COMPOSITE_BAR, $codetext))
 *
 *     $generator->getParameters()->getBarcode()->getGS1CompositeBar()->setLinearComponentType(EncodeTypes::GS1_CODE_128);
 *     $generator->getParameters()->getBarcode()->getGS1CompositeBar()->setTwoDComponentType(TwoDComponentType::CC_A);
 *
 *     // Aspect ratio of 2D component
 *     $generator->getParameters()->getBarcode()->getPdf417()->setAspectRatio(3);
 *     ///
 *     // X-Dimension of 1D and 2D components
 *     $generator->getParameters()->getBarcode()->getXDimension()->setPixels(3);
 *     ///
 *     // Height of 1D component
 *     $generator->getParameters()->getBarcode()->getBarHeight()->setPixels(100);
 *     ///
 *     $generator->save("test.png", BarcodeImageFormat::PNG);
 *
 */
class TwoDComponentType
{
    /**
     * Auto select type of 2D component
     */
    const AUTO = 0;

    /**
     * CC-A type of 2D component. It is a structural variant of MicroPDF417
     */
    const CC_A = 1;

    /**
     * CC-B type of 2D component. It is a MicroPDF417 symbol.
     */
    const CC_B = 2;

    /**
     * CC-C type of 2D component. It is a PDF417 symbol.
     */
    const CC_C = 3;
}

/**
 *  Used to tell the encoder whether to add Macro PDF417 Terminator (codeword 922) to the segment.
 *  Applied only for Macro PDF417.
 */
class Pdf417MacroTerminator
{
    /**
     * The terminator will be added automatically if the number of segments is provided
     * and the current segment is the last one. In other cases, the terminator will not be added.
     */
    const AUTO = 0;

    /**
     * The terminator will not be added.
     */
    const NONE = 1;

    /**
     * The terminator will be added.
     */
    const SET = 2;
}

/**
 * Encoding mode for MaxiCode barcodes.
 *
 * @code
 * //Auto mode
 * $codetext = "犬Right狗";
 * $generator = new BarcodeGenerator(EncodeTypes::MAXI_CODE, $codetext))
 * $generator->getParameters()->getBarcode()->getMaxiCode()->setECIEncoding(ECIEncodings::UTF8);
 * $generator->save("test.bmp");
 *
 * //Bytes mode
 * $encodedArr = array( 0xFF, 0xFE, 0xFD, 0xFC, 0xFB, 0xFA, 0xF9 );
 *
 * //encode array to string
 * $strBld = "";
 * foreach($encodedArr as $bval)
 *     strBld.= bval;
 * $codetext = $strBld;
 *
 * $generator1 = new BarcodeGenerator(EncodeTypes::MAXI_CODE, $codetext))
 * $generator->getParameters()->getBarcode()->getMaxiCode()->setMaxiCodeEncodeMode(MaxiCodeEncodeMode.BYTES);
 * $generator->save("test.bmp");
 *
 * //Extended codetext mode
 * //create codetext
 * $textBuilder = new MaxiCodeExtCodetextBuilder();
 * $textBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $textBuilder->addECICodetext(ECIEncodings::UTF8, "犬Right狗");
 * $textBuilder->addECICodetext(ECIEncodings::UTF16BE, "犬Power狗");
 * $textBuilder->addPlainCodetext("Plain text");
 *
 * // generate codetext
 * $codetext = $textBuilder->getExtendedCodetext();
 *
 * //generate
 * $generator = new BarcodeGenerator(EncodeTypes::MaxiCode, $codetext);
 * $generator->getParameters()->getBarcode()->getMaxiCode()->setMaxiCodeEncodeMode(MaxiCodeEncodeMode::EXTENDED_CODETEXT);
 * $generator->getParameters()->getBarcode()->getMaxiCode()->setTwoDDisplayText("My Text");
 * $generator->save("test.bmp");
 * @endcode
 */
class MaxiCodeEncodeMode
{
    
    /**
     * Encode codetext with value set in the ECIEncoding property.
     */
    const AUTO = 0;
    
    /**
     * Encode codetext as plain bytes. If it detects any Unicode character, the character will be encoded as two bytes, lower byte first.
     */
    const BYTES = 1;
    
    /**
     * Extended mode which supports multi ECI modes.
     * It is better to use MaxiCodeExtCodetextBuilder for extended codetext generation.
     * Use Display2DText property to set visible text to removing managing characters.
     * ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier
     * All unicode characters after ECI identifier are automatically encoded into correct character codeset.
     */
    const EXTENDED_CODETEXT = 2;
}

/**
 * Encoding mode for MaxiCode barcodes.
 *
 * This sample shows how to genereate MaxiCode barcodes using ComplexBarcodeGenerator
 * @code
 * //Mode 2 with standart second message
 * $maxiCodeCodetext = new MaxiCodeCodetextMode2();
 * $maxiCodeCodetext->setPostalCode("524032140");
 * $maxiCodeCodetext->setCountryCode(056);
 * $maxiCodeCodetext->setServiceCategory(999);
 * maxiCodeStandartSecondMessage = new MaxiCodeStandartSecondMessage();
 * $maxiCodeStandartSecondMessage->setMessage("Test message");
 * $maxiCodeCodetext->setSecondMessage($maxiCodeStandartSecondMessage);
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext);
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 2 with structured second message
 * $maxiCodeCodetext = new MaxiCodeCodetextMode2();
 * $maxiCodeCodetext->setPostalCode("524032140");
 * $maxiCodeCodetext->setCountryCode(056);
 * $maxiCodeCodetext->setServiceCategory(999);
 * maxiCodeStructuredSecondMessage = new MaxiCodeStructuredSecondMessage();
 * $maxiCodeStructuredSecondMessage->add("634 ALPHA DRIVE");
 * $maxiCodeStructuredSecondMessage->add("PITTSBURGH");
 * $maxiCodeStructuredSecondMessage->add("PA");
 * $maxiCodeStructuredSecondMessage->setYear(99);
 * $maxiCodeCodetext->setSecondMessage($maxiCodeStructuredSecondMessage);
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext);
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 3 with standart second message
 * $maxiCodeCodetext = new MaxiCodeCodetextMode3();
 * $maxiCodeCodetext->setPostalCode("B1050");
 * $maxiCodeCodetext->setCountryCode(056);
 * $maxiCodeCodetext->setServiceCategory(999);
 * $maxiCodeStandartSecondMessage = new MaxiCodeStandartSecondMessage();
 * $maxiCodeStandartSecondMessage->setMessage("Test message");
 * $maxiCodeCodetext->setSecondMessage($maxiCodeStandartSecondMessage);
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext);
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 3 with structured second message
 * $maxiCodeCodetext = new MaxiCodeCodetextMode3();
 * $maxiCodeCodetext->setPostalCode("B1050");
 * $maxiCodeCodetext->setCountryCode(056);
 * $maxiCodeCodetext->setServiceCategory(999);
 * $maxiCodeStructuredSecondMessage = new MaxiCodeStructuredSecondMessage();
 * $maxiCodeStructuredSecondMessage->add("634 ALPHA DRIVE");
 * $maxiCodeStructuredSecondMessage->add("PITTSBURGH");
 * $maxiCodeStructuredSecondMessage->add("PA");
 * $maxiCodeStructuredSecondMessage->setYear(99);
 * $maxiCodeCodetext->setSecondMessage($maxiCodeStructuredSecondMessage);
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext();
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 4
 * $maxiCodeCodetext = new MaxiCodeStandardCodetext();
 * $maxiCodeCodetext->setMode(MaxiCodeMode::MODE_4);
 * $maxiCodeCodetext->setMessage("Test message");
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext();
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 5
 * $maxiCodeCodetext = new MaxiCodeStandardCodetext();
 * $maxiCodeCodetext->setMode(MaxiCodeMode::MODE_5);
 * $maxiCodeCodetext->setMessage("Test message");
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext())
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 *
 * //Mode 6
 * $maxiCodeCodetext = new MaxiCodeStandardCodetext();
 * $maxiCodeCodetext->setMode(MaxiCodeMode::MODE_6);
 * $maxiCodeCodetext->setMessage("Test message");
 * $complexGenerator = new ComplexBarcodeGenerator($maxiCodeCodetext->getConstructedCodetext();
 * $complexGenerator->generateBarCodeImage(BarcodeImageFormat::PNG);
 * @endcode
 */
class MaxiCodeMode
{
    /**
     * Mode 2 encodes postal information in first message and data in second message.
     * Has 9 digits postal code (used only in USA).
     */
    const MODE_2 = 2;
    
    /**
     * Mode 3 encodes postal information in first message and data in second message.
     * Has 6 alphanumeric postal code, used in the world.
     */
    const MODE_3 = 3;
    
    /**
     *  Mode 4 encodes data in first and second message, with short ECC correction.
     */
    const MODE_4 = 4;

    /**
     * Mode 5 encodes data in first and second message, with long ECC correction.
     */
    const MODE_5 = 5;

    /**
     * Mode 6 encodes data in first and second message, with short ECC correction.
     * Used to encode device.
     */
    const MODE_6 = 6;
}

/**
 * <p>
 * Encoding mode for DotCode barcodes.
 * </p><p><hr><blockquote><pre>
 * <pre>
 * //Auto mode with macros
 * $codetext = ""[)>\u001E05\u001DCodetextWithMacros05\u001E\u0004"";
 * $generator = new BarcodeGenerator(EncodeTypes::DOT_CODE, $codetext);
 * {
 *     $generator->save("test.bmp", BarCodeImageFormat::BMP);
 * }
 *
 * //Auto mode
 * $codetext = "犬Right狗";
 * $generator = new BarcodeGenerator(EncodeTypes::DOT_CODE, $codetext);
 * {
 *     $generator->getParameters()->getBarcode()->getDotCode()->setECIEncoding(ECIEncodings::UTF8);
 *     $generator->save("test.bmp", BarCodeImageFormat::BMP);
 * }
 *
 * //Bytes mode
 * $encodedArr = array( 0xFF, 0xFE, 0xFD, 0xFC, 0xFB, 0xFA, 0xF9 );
 * //encode array to string
 * $codetext = "";
 * foreach (encodedArr as $bval)
 *     $codetext .= bval;
 * $generator = new BarcodeGenerator(EncodeTypes::DOT_CODE, $codetext);
 * {
 *     $generator->getParameters()->getBarcode()->getDotCode()->setDotCodeEncodeMode(DotCodeEncodeMode::BYTES);
 *     $generator->save("test.bmp", BarCodeImageFormat::BMP);
 * }
 * //Extended codetext mode
 * //create codetext
 * $textBuilder = new DotCodeExtCodetextBuilder();
 * $textBuilder->addFNC1FormatIdentifier();
 * $textBuilder->addECICodetext(ECIEncodings::Win1251, "Will");
 * $textBuilder->addFNC1FormatIdentifier();
 * $textBuilder->addECICodetext(ECIEncodings::UTF8, "犬Right狗");
 * $textBuilder->addFNC3SymbolSeparator();
 * $textBuilder->addFNC1FormatIdentifier();
 * $textBuilder->addECICodetext(ECIEncodings::UTF16BE, "犬Power狗");
 * $textBuilder->addPlainCodetext("Plain text");
 * //generate codetext
 * $codetext = $textBuilder->getExtendedCodetext();
 * //generate
 * $generator = new BarcodeGenerator(EncodeTypes::DOT_CODE, $codetext);
 * {
 *     $generator->getParameters()->getBarcode()->getDotCode()->setDotCodeEncodeMode(DotCodeEncodeMode::EXTENDED_CODETEXT);
 * 	   $generator->save("test.bmp", BarCodeImageFormat::BMP);
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class DotCodeEncodeMode
{
    /**
     * <p>
     * Encode codetext with value set in the ECIEncoding property.
     * </p>
     */
    const AUTO = 0;

    /**
     * <p>
     * Encode codetext as plain bytes. If it detects any Unicode character, the character will be encoded as two bytes, lower byte first.
     * </p>
     */
     const BYTES = 1;

    /**
     * <p>
     * <p>Extended mode which supports multi ECI modes.</p>
     * <p>It is better to use DotCodeExtCodetextBuilder for extended codetext generation.</p>
     * <p>Use Display2DText property to set visible text to removing managing characters.</p>
     * <p>ECI identifiers are set as single slash and six digits identifier "\000026" - UTF8 ECI identifier</p>
     * <p>All unicode characters after ECI identifier are automatically encoded into correct character codeset.</p>
     * </p>
     */
     const EXTENDED_CODETEXT = 2;
}

/**
 * <p>
 * Encoding mode for Code128 barcodes.
 * {@code Code 128} specification.
 * </p><p><hr><blockquote><pre>
 * Thos code demonstrates how to generate code 128 with different encodings
 * <pre>
 *
 * //Generate code 128 with ISO 15417 encoding
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "ABCD1234567890");
 * $generator->Parameters->Barcode->Code128->setCode128EncodeMode(Code128EncodeMode::AUTO);
 * $generator->Save("d:\\code128Auto.png", BarCodeImageFormat::Png);
 * //Generate code 128 only with Codeset A encoding
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "ABCD1234567890");
 * $generator->Parameters->Barcode->Code128->setCode128EncodeMode(Code128EncodeMode::CODE_A);
 * $generator->Save("d:\\code128CodeA.png", BarCodeImageFormat::Png);
 * </pre>
 * </pre></blockquote></hr></p>
 */
class Code128EncodeMode
{
    /**
     * <p>
     * Encode codetext in classic ISO 15417 mode. The mode should be used in all ordinary cases.
     * </p>
     */
    const AUTO = 0;

    /**
     * <p>
     * Encode codetext only in 128A codeset.
     * </p>
     */
    const CODE_A = 1;

    /**
     * <p>
     * Encode codetext only in 128B codeset.
     * </p>
     */
    const CODE_B = 2;

    /**
     * <p>
     * Encode codetext only in 128C codeset.
     * </p>
     */
    const CODE_C = 4;

    /**
     * <p>
     * Encode codetext only in 128A and 128B codesets.
     * </p>
     */
    const CODE_AB = 3;

    /**
     * <p>
     * Encode codetext only in 128A and 128C codesets.
     * </p>
     */
    const CODE_AC = 5;

    /**
     * <p>
     * Encode codetext only in 128B and 128C codesets.
     * </p>
     */
    const CODE_BC = 6;
}


/**
 * <p>
 * Version of Han Xin Code.
 * From Version01 - 23 x 23 modules to Version84 - 189 x 189 modules, increasing in steps of 2 modules per side.
 * </p>
 */
class HanXinVersion
{
    /**
     * <p>
     * Specifies to automatically pick up the best version.
     * This is default value.
     * </p>
     */
    const AUTO = 0;
    /**
     * <p>
     * Specifies version 1 with 23 x 23 modules.
     * </p>
     */
    const VERSION_01 = 1;
    /**
     * <p>
     * Specifies version 2 with 25 x 25 modules.
     * </p>
     */
    const VERSION_02 = 2;
    /**
     * <p>
     * Specifies version 3 with 27 x 27 modules.
     * </p>
     */
    const VERSION_03 = 3;
    /**
     * <p>
     * Specifies version 4 with 29 x 29 modules.
     * </p>
     */
    const VERSION_04 = 4;
    /**
     * <p>
     * Specifies version 5 with 31 x 31 modules.
     * </p>
     */
    const VERSION_05 = 5;
    /**
     * <p>
     * Specifies version 6 with 33 x 33 modules.
     * </p>
     */
    const VERSION_06 = 6;
    /**
     * <p>
     * Specifies version 7 with 35 x 35 modules.
     * </p>
     */
    const VERSION_07 = 7;
    /**
     * <p>
     * Specifies version 8 with 37 x 37 modules.
     * </p>
     */
    const VERSION_08 = 8;
    /**
     * <p>
     * Specifies version 9 with 39 x 39 modules.
     * </p>
     */
    const VERSION_09 = 9;
    /**
     * <p>
     * Specifies version 10 with 41 x 41 modules.
     * </p>
     */
    const VERSION_10 = 10;
    /**
     * <p>
     * Specifies version 11 with 43 x 43 modules.
     * </p>
     */
    const VERSION_11 = 11;
    /**
     * <p>
     * Specifies version 12 with 45 x 45 modules.
     * </p>
     */
    const VERSION_12 = 12;
    /**
     * <p>
     * Specifies version 13 with 47 x 47 modules.
     * </p>
     */
    const VERSION_13 = 13;
    /**
     * <p>
     * Specifies version 14 with 49 x 49 modules.
     * </p>
     */
    const VERSION_14 = 14;
    /**
     * <p>
     * Specifies version 15 with 51 x 51 modules.
     * </p>
     */
    const VERSION_15 = 15;
    /**
     * <p>
     * Specifies version 16 with 53 x 53 modules.
     * </p>
     */
    const VERSION_16 = 16;
    /**
     * <p>
     * Specifies version 17 with 55 x 55 modules.
     * </p>
     */
    const VERSION_17 = 17;
    /**
     * <p>
     * Specifies version 18 with 57 x 57 modules.
     * </p>
     */
    const VERSION_18 = 18;
    /**
     * <p>
     * Specifies version 19 with 59 x 59 modules.
     * </p>
     */
    const VERSION_19 = 19;
    /**
     * <p>
     * Specifies version 20 with 61 x 61 modules.
     * </p>
     */
    const VERSION_20 = 20;
    /**
     * <p>
     * Specifies version 21 with 63 x 63 modules.
     * </p>
     */
    const VERSION_21 = 21;
    /**
     * <p>
     * Specifies version 22 with 65 x 65 modules.
     * </p>
     */
    const VERSION_22 = 22;
    /**
     * <p>
     * Specifies version 23 with 67 x 67 modules.
     * </p>
     */
    const VERSION_23 = 23;
    /**
     * <p>
     * Specifies version 24 with 69 x 69 modules.
     * </p>
     */
    const VERSION_24 = 24;
    /**
     * <p>
     * Specifies version 25 with 71 x 71 modules.
     * </p>
     */
    const VERSION_25 = 25;
    /**
     * <p>
     * Specifies version 26 with 73 x 73 modules.
     * </p>
     */
    const VERSION_26 = 26;
    /**
     * <p>
     * Specifies version 27 with 75 x 75 modules.
     * </p>
     */
    const VERSION_27 = 27;
    /**
     * <p>
     * Specifies version 28 with 77 x 77 modules.
     * </p>
     */
    const VERSION_28 = 28;
    /**
     * <p>
     * Specifies version 29 with 79 x 79 modules.
     * </p>
     */
    const VERSION_29 = 29;
    /**
     * <p>
     * Specifies version 30 with 81 x 81 modules.
     * </p>
     */
    const VERSION_30 = 30;
    /**
     * <p>
     * Specifies version 31 with 83 x 83 modules.
     * </p>
     */
    const VERSION_31 = 31;
    /**
     * <p>
     * Specifies version 32 with 85 x 85 modules.
     * </p>
     */
    const VERSION_32 = 32;
    /**
     * <p>
     * Specifies version 33 with 87 x 87 modules.
     * </p>
     */
    const VERSION_33 = 33;
    /**
     * <p>
     * Specifies version 34 with 89 x 89 modules.
     * </p>
     */
    const VERSION_34 = 34;
    /**
     * <p>
     * Specifies version 35 with 91 x 91 modules.
     * </p>
     */
    const VERSION_35 = 35;
    /**
     * <p>
     * Specifies version 36 with 93 x 93 modules.
     * </p>
     */
    const VERSION_36 = 36;
    /**
     * <p>
     * Specifies version 37 with 95 x 95 modules.
     * </p>
     */
    const VERSION_37 = 37;
    /**
     * <p>
     * Specifies version 38 with 97 x 97 modules.
     * </p>
     */
    const VERSION_38 = 38;
    /**
     * <p>
     * Specifies version 39 with 99 x 99 modules.
     * </p>
     */
    const VERSION_39 = 39;
    /**
     * <p>
     * Specifies version 40 with 101 x 101 modules.
     * </p>
     */
    const VERSION_40 = 40;
    /**
     * <p>
     * Specifies version 41 with 103 x 103 modules.
     * </p>
     */
    const VERSION_41 = 41;
    /**
     * <p>
     * Specifies version 42 with 105 x 105 modules.
     * </p>
     */
    const VERSION_42 = 42;
    /**
     * <p>
     * Specifies version 43 with 107 x 107 modules.
     * </p>
     */
    const VERSION_43 = 43;
    /**
     * <p>
     * Specifies version 44 with 109 x 109 modules.
     * </p>
     */
    const VERSION_44 = 44;
    /**
     * <p>
     * Specifies version 45 with 111 x 111 modules.
     * </p>
     */
    const VERSION_45 = 45;
    /**
     * <p>
     * Specifies version 46 with 113 x 113 modules.
     * </p>
     */
    const VERSION_46 = 46;
    /**
     * <p>
     * Specifies version 47 with 115 x 115 modules.
     * </p>
     */
    const VERSION_47 = 47;
    /**
     * <p>
     * Specifies version 48 with 117 x 117 modules.
     * </p>
     */
    const VERSION_48 = 48;
    /**
     * <p>
     * Specifies version 49 with 119 x 119 modules.
     * </p>
     */
    const VERSION_49 = 49;
    /**
     * <p>
     * Specifies version 50 with 121 x 121 modules.
     * </p>
     */
    const VERSION_50 = 50;
    /**
     * <p>
     * Specifies version 51 with 123 x 123 modules.
     * </p>
     */
    const VERSION_51 = 51;
    /**
     * <p>
     * Specifies version 52 with 125 x 125 modules.
     * </p>
     */
    const VERSION_52 = 52;
    /**
     * <p>
     * Specifies version 53 with 127 x 127 modules.
     * </p>
     */
    const VERSION_53 = 53;
    /**
     * <p>
     * Specifies version 54 with 129 x 129 modules.
     * </p>
     */
    const VERSION_54 = 54;
    /**
     * <p>
     * Specifies version 55 with 131 x 131 modules.
     * </p>
     */
    const VERSION_55 = 55;
    /**
     * <p>
     * Specifies version 56 with 133 x 133 modules.
     * </p>
     */
    const VERSION_56 = 56;
    /**
     * <p>
     * Specifies version 57 with 135 x 135 modules.
     * </p>
     */
    const VERSION_57 = 57;
    /**
     * <p>
     * Specifies version 58 with 137 x 137 modules.
     * </p>
     */
    const VERSION_58 = 58;
    /**
     * <p>
     * Specifies version 59 with 139 x 139 modules.
     * </p>
     */
    const VERSION_59 = 59;
    /**
     * <p>
     * Specifies version 60 with 141 x 141 modules.
     * </p>
     */
    const VERSION_60 = 60;
    /**
     * <p>
     * Specifies version 61 with 143 x 143 modules.
     * </p>
     */
    const VERSION_61 = 61;
    /**
     * <p>
     * Specifies version 62 with 145 x 145 modules.
     * </p>
     */
    const VERSION_62 = 62;
    /**
     * <p>
     * Specifies version 63 with 147 x 147 modules.
     * </p>
     */
    const VERSION_63 = 63;
    /**
     * <p>
     * Specifies version 64 with 149 x 149 modules.
     * </p>
     */
    const VERSION_64 = 64;
    /**
     * <p>
     * Specifies version 65 with 151 x 151 modules.
     * </p>
     */
    const VERSION_65 = 65;
    /**
     * <p>
     * Specifies version 66 with 153 x 153 modules.
     * </p>
     */
    const VERSION_66 = 66;
    /**
     * <p>
     * Specifies version 67 with 155 x 155 modules.
     * </p>
     */
    const VERSION_67 = 67;
    /**
     * <p>
     * Specifies version 68 with 157 x 157 modules.
     * </p>
     */
    const VERSION_68 = 68;
    /**
     * <p>
     * Specifies version 69 with 159 x 159 modules.
     * </p>
     */
    const VERSION_69 = 69;
    /**
     * <p>
     * Specifies version 70 with 161 x 161 modules.
     * </p>
     */
    const VERSION_70 = 70;
    /**
     * <p>
     * Specifies version 71 with 163 x 163 modules.
     * </p>
     */
    const VERSION_71 = 71;
    /**
     * <p>
     * Specifies version 72 with 165 x 165 modules.
     * </p>
     */
    const VERSION_72 = 72;
    /**
     * <p>
     * Specifies version 73 with 167 x 167 modules.
     * </p>
     */
    const VERSION_73 = 73;
    /**
     * <p>
     * Specifies version 74 with 169 x 169 modules.
     * </p>
     */
    const VERSION_74 = 74;
    /**
     * <p>
     * Specifies version 75 with 171 x 171 modules.
     * </p>
     */
    const VERSION_75 = 75;
    /**
     * <p>
     * Specifies version 76 with 173 x 173 modules.
     * </p>
     */
    const VERSION_76 = 76;
    /**
     * <p>
     * Specifies version 77 with 175 x 175 modules.
     * </p>
     */
    const VERSION_77 = 77;
    /**
     * <p>
     * Specifies version 78 with 177 x 177 modules.
     * </p>
     */
    const VERSION_78 = 78;
    /**
     * <p>
     * Specifies version 79 with 179 x 179 modules.
     * </p>
     */
    const VERSION_79 = 79;
    /**
     * <p>
     * Specifies version 80 with 181 x 181 modules.
     * </p>
     */
    const VERSION_80 = 80;
    /**
     * <p>
     * Specifies version 81 with 183 x 183 modules.
     * </p>
     */
    const VERSION_81 = 81;
    /**
     * <p>
     * Specifies version 82 with 185 x 185 modules.
     * </p>
     */
    const VERSION_82 = 82;
    /**
     * <p>
     * Specifies version 83 with 187 x 187 modules.
     * </p>
     */
    const VERSION_83 = 83;
    /**
     * <p>
     * Specifies version 84 with 189 x 189 modules.
     * </p>
     */
    const VERSION_84 = 84;
}

/**
 * <p>
 * Level of Reed-Solomon error correction. From low to high: L1, L2, L3, L4.
 * </p>
 */
class HanXinErrorLevel
{
    /**
     * <p>
     * Allows recovery of 8% of the code text
     * </p>
     */
    const L1 = 0;
    /**
     * <p>
     * Allows recovery of 15% of the code text
     * </p>
     */
    const L2 = 1;
    /**
     * <p>
     * Allows recovery of 23% of the code text
     * </p>
     */
    const L3 = 2;
    /**
     * <p>
     * Allows recovery of 30% of the code text
     * </p>
     */
    const L4 = 3;
}

/**
 * <p>
 * Han Xin Code encoding mode. It is recommended to use Auto with ASCII / Chinese characters or Unicode for Unicode characters.
 * </p><p><hr><blockquote><pre>
 *  <pre>
 *  // Auto mode
 *  $codetext = "1234567890ABCDEFGabcdefg,Han Xin Code";
 *  $generator = new BarcodeGenerator(EncodeTypes.HAN_XIN, codetext);
 *  generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 *  // Bytes mode
 *  $encodedArr = array(0xFF, 0xFE, 0xFD, 0xFC, 0xFB, 0xFA, 0xF9);
 *
 *  //encode array to string
 *  StringBuilder strBld = new StringBuilder();
 *  for (byte bval : encodedArr)
 *      strBld.append((char) bval);
 *  $codetext = strBld.toString();
 *
 *  $generator = new BarcodeGenerator(EncodeTypes.HAN_XIN, codetext);
 *  $generator->getParameters()->getBarcode()->getHanXin()->setHanXinEncodeMode(HanXinEncodeMode::BYTES);
 *  generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 *  // ECI mode
 *  $codetext = "ΑΒΓΔΕ";
 *  $generator = new BarcodeGenerator(EncodeTypes.HAN_XIN, codetext);
 *  $generator->getParameters()->getBarcode()->getHanXin()->setHanXinEncodeMode(HanXinEncodeMode::ECI);
 *  $generator->getParameters()->getBarcode()->getHanXin()->setHanXinECIEncoding(ECIEncodings.ISO_8859_7);
 *  generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 *  // URI mode
 *  $codetext = "https://www.test.com/%BC%DE%%%ab/search=test";
 *  $generator = new BarcodeGenerator(EncodeTypes.HAN_XIN, codetext);
 *  $generator->getParameters()->getBarcode()->getHanXin()->setHanXinEncodeMode(HanXinEncodeMode::URI);
 *  generator->save("test.bmp", BarcodeImageFormat::BMP);
 *
 *  // Extended mode - TBD
 *  </pre>
 *  </pre></blockquote></hr></p>
 */
class HanXinEncodeMode
{
    /**
     * <p>
     * Sequence of Numeric, Text, ECI, Binary Bytes and 4 GB18030 modes changing automatically.
     * </p>
     */
    const AUTO = 0;
    /**
     * <p>
     * Binary byte mode encodes binary data in any form and encodes them in their binary byte. Every byte in
     * Binary Byte mode is represented by 8 bits.
     * </p>
     */
    const BINARY = 1;
    /**
     * <p>
     * Extended Channel Interpretation (ECI) mode
     * </p>
     */
    const ECI = 2;
    /**
     * <p>
     * Unicode mode designs a way to represent any text data reference to UTF8 encoding/charset in Han Xin Code.
     * </p>
     */
    const UNICODE = 3;
    /**
     * <p>
     * URI mode indicates the data represented in Han Xin Code is Uniform Resource Identifier (URI)
     * reference to RFC 3986.
     * </p>
     */
    const URI = 4;
    /**
     * <p>
     * Extended mode  will allow more flexible combinations of other modes, this mode is currently not implemented.
     * </p>
     */
    const EXTENDED = 5;
}

/**
 * <p>
 * Specify the type of the ECC to encode.
 * </p>
 */
class DataMatrixVersion
{
    /**
     * <p>
     * Specifies to automatically pick up the smallest size for DataMatrix.
     * This is default value.
     * </p>
     */
    const AUTO = 0;
    /**
     * <p>
     * Instructs to get symbol sizes from Rows And Columns parameters. Note that DataMatrix does not support
     * custom rows and columns numbers. This option is not recommended to use.
     * </p>
     */
    const ROWS_COLUMNS = 1;
    /**
     * <p>
     * Specifies size of 9 x 9 modules for ECC000 type.
     * </p>
     */
    const ECC000_9x9 = 2;
    /**
     * <p>
     * Specifies size of 11 x 11 modules for ECC000-ECC050 types.
     * </p>
     */
    const ECC000_050_11x11 = 3;
    /**
     * <p>
     * Specifies size of 13 x 13 modules for ECC000-ECC100 types.
     * </p>
     */
    const ECC000_100_13x13 = 4;
    /**
     * <p>
     * Specifies size of 15 x 15 modules for ECC000-ECC100 types.
     * </p>
     */
    const ECC000_100_15x15 = 5;
    /**
     * <p>
     * Specifies size of 17 x 17 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_17x17 = 6;
    /**
     * <p>
     * Specifies size of 19 x 19 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_19x19 = 7;
    /**
     * <p>
     * Specifies size of 21 x 21 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_21x21 = 8;
    /**
     * <p>
     * Specifies size of 23 x 23 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_23x23 = 9;
    /**
     * <p>
     * Specifies size of 25 x 25 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_25x25 = 10;
    /**
     * <p>
     * Specifies size of 27 x 27 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_27x27 = 11;
    /**
     * <p>
     * Specifies size of 29 x 29 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_29x29 = 12;
    /**
     * <p>
     * Specifies size of 31 x 31 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_31x31 = 13;
    /**
     * <p>
     * Specifies size of 33 x 33 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_33x33 = 14;
    /**
     * <p>
     * Specifies size of 35 x 35 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_35x35 = 15;
    /**
     * <p>
     * Specifies size of 37 x 37 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_37x37 = 16;
    /**
     * <p>
     * Specifies size of 39 x 39 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_39x39 = 17;
    /**
     * <p>
     * Specifies size of 41 x 41 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_41x41 = 18;
    /**
     * <p>
     * Specifies size of 43 x 43 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_43x43 = 19;
    /**
     * <p>
     * Specifies size of 45 x 45 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_45x45 = 20;
    /**
     * <p>
     * Specifies size of 47 x 47 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_47x47 = 21;
    /**
     * <p>
     * Specifies size of 49 x 49 modules for ECC000-ECC140 types.
     * </p>
     */
    const ECC000_140_49x49 = 22;
    /**
     * <p>
     * Specifies size of 10 x 10 modules for ECC200 type.
     * </p>
     */
    const ECC200_10x10 = 23;
    /**
     * <p>
     * Specifies size of 12 x 12 modules for ECC200 type.
     * </p>
     */
    const ECC200_12x12 = 24;
    /**
     * <p>
     * Specifies size of 14 x 14 modules for ECC200 type.
     * </p>
     */
    const ECC200_14x14 = 25;
    /**
     * <p>
     * Specifies size of 16 x 16 modules for ECC200 type.
     * </p>
     */
    const ECC200_16x16 = 26;
    /**
     * <p>
     * Specifies size of 18 x 18 modules for ECC200 type.
     * </p>
     */
    const ECC200_18x18 = 27;
    /**
     * <p>
     * Specifies size of 20 x 20 modules for ECC200 type.
     * </p>
     */
    const ECC200_20x20 = 28;
    /**
     * <p>
     * Specifies size of 22 x 22 modules for ECC200 type.
     * </p>
     */
    const ECC200_22x22 = 29;
    /**
     * <p>
     * Specifies size of 24 x 24 modules for ECC200 type.
     * </p>
     */
    const ECC200_24x24 = 30;
    /**
     * <p>
     * Specifies size of 26 x 26 modules for ECC200 type.
     * </p>
     */
    const ECC200_26x26 = 31;
    /**
     * <p>
     * Specifies size of 32 x 32 modules for ECC200 type.
     * </p>
     */
    const ECC200_32x32 = 32;
    /**
     * <p>
     * Specifies size of 36 x 36 modules for ECC200 type.
     * </p>
     */
    const ECC200_36x36 = 33;
    /**
     * <p>
     * Specifies size of 40 x 40 modules for ECC200 type.
     * </p>
     */
    const ECC200_40x40 = 34;
    /**
     * <p>
     * Specifies size of 44 x 44 modules for ECC200 type.
     * </p>
     */
    const ECC200_44x44 = 35;
    /**
     * <p>
     * Specifies size of 48 x 48 modules for ECC200 type.
     * </p>
     */
    const ECC200_48x48 = 36;
    /**
     * <p>
     * Specifies size of 52 x 52 modules for ECC200 type.
     * </p>
     */
    const ECC200_52x52 = 37;
    /**
     * <p>
     * Specifies size of 64 x 64 modules for ECC200 type.
     * </p>
     */
    const ECC200_64x64 = 38;
    /**
     * <p>
     * Specifies size of 72 x 72 modules for ECC200 type.
     * </p>
     */
    const ECC200_72x72 = 39;
    /**
     * <p>
     * Specifies size of 80 x 80 modules for ECC200 type.
     * </p>
     */
    const ECC200_80x80 = 40;
    /**
     * <p>
     * Specifies size of 88 x 88 modules for ECC200 type.
     * </p>
     */
    const ECC200_88x88 = 41;
    /**
     * <p>
     * Specifies size of 96 x 96 modules for ECC200 type.
     * </p>
     */
    const ECC200_96x96 = 42;
    /**
     * <p>
     * Specifies size of 104 x 104 modules for ECC200 type.
     * </p>
     */
    const ECC200_104x104 = 43;
    /**
     * <p>
     * Specifies size of 120 x 120 modules for ECC200 type.
     * </p>
     */
    const ECC200_120x120 = 44;
    /**
     * <p>
     * Specifies size of 132 x 132 modules for ECC200 type.
     * </p>
     */
    const ECC200_132x132 = 45;
    /**
     * <p>
     * Specifies size of 144 x 144 modules for ECC200 type.
     * </p>
     */
    const ECC200_144x144 = 46;
    /**
     * <p>
     * Specifies size of 8 x 18 modules for ECC200 type.
     * </p>
     */
    const ECC200_8x18 = 47;
    /**
     * <p>
     * Specifies size of 8 x 32 modules for ECC200 type.
     * </p>
     */
    const ECC200_8x32 = 48;
    /**
     * <p>
     * Specifies size of 12 x 26 modules for ECC200 type.
     * </p>
     */
    const ECC200_12x26 = 49;
    /**
     * <p>
     * Specifies size of 12 x 36 modules for ECC200 type.
     * </p>
     */
    const ECC200_12x36 = 50;
    /**
     * <p>
     * Specifies size of 16 x 36 modules for ECC200 type.
     * </p>
     */
    const ECC200_16x36 = 51;
    /**
     * <p>
     * Specifies size of 16 x 48 modules for ECC200 type.
     * </p>
     */
    const ECC200_16x48 = 52;
    /**
     * <p>
     * Specifies size of 8 x 48 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x48 = 53;
    /**
     * <p>
     * Specifies size of 8 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x64 = 54;
    /**
     * <p>
     * Specifies size of 8 x 80 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x80 = 55;
    /**
     * <p>
     * Specifies size of 8 x 96 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x96 = 56;
    /**
     * <p>
     * Specifies size of 8 x 120 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x120 = 57;
    /**
     * <p>
     * Specifies size of 8 x 144 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_8x144 = 58;
    /**
     * <p>
     * Specifies size of 12 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_12x64 = 59;
    /**
     * <p>
     * Specifies size of 12 x 88 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_12x88 = 60;
    /**
     * <p>
     * Specifies size of 16 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_16x64 = 61;
    /**
     * <p>
     * Specifies size of 20 x 36 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_20x36 = 62;
    /**
     * <p>
     * Specifies size of 20 x 44 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_20x44 = 63;
    /**
     * <p>
     * Specifies size of 20 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_20x64 = 64;
    /**
     * <p>
     * Specifies size of 22 x 48 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_22x48 = 65;
    /**
     * <p>
     * Specifies size of 24 x 48 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_24x48 = 66;
    /**
     * <p>
     * Specifies size of 24 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_24x64 = 67;
    /**
     * <p>
     * Specifies size of 26 x 40 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_26x40 = 68;
    /**
     * <p>
     * Specifies size of 26 x 48 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_26x48 = 69;
    /**
     * <p>
     * Specifies size of 26 x 64 modules for DMRE barcodes.
     * </p>
     */
    const DMRE_26x64 = 70;
}
?>