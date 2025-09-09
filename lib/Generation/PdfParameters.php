<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\PdfParametersDTO;
use Aspose\Barcode\Generation\CMYKColor;
use Aspose\Barcode\Internal\Communicator;

/**
 * PDF parameters wrapper.
 * Expects an underlying `javaClass` instance that provides
 * the corresponding getter/setter methods returning/accepting
 * CMYK strings like "30_100_0_30" or `null`.
 */
class PdfParameters implements Communicator
{
    private $pdfParametersDto;

    function getPdfParametersDto(): PdfParametersDTO
    {
        return $this->pdfParametersDto;
    }

    private function setPdfParametersDto(PdfParametersDTO $pdfParametersDto): void
    {
        $this->pdfParametersDto = $pdfParametersDto;
    }

    function __construct(PdfParametersDTO $pdfParametersDto)
    {
        $this->pdfParametersDto = $pdfParametersDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
    }

    /**
     * <p>
     * Nullable. CMYK color value of bar code. Null means CMYK color is not used, instead normal RGB color is used.
     * </p>
     */
    function getCMYKBarColor(): CMYKColor
    {
        return CMYKColor::parseCMYK($this->getPdfParametersDto()->cmykBarColor);
    }

    /**
     * <p>
     * Nullable. CMYK color value of bar code. Null means CMYK color is not used, instead normal RGB color is used.
     * </p>
     */
    function setCMYKBarColor(CMYKColor $value): void
    {
        $this->getPdfParametersDto()->cmykBarColor = $value != null ? $value->formatCMYK() : null;
    }

    /**
     * <p>
     * Nullable. CMYK back color value. Null means CMYK color is not used, instead normal RGB color is used.
     * </p>
     */
    public function getCMYKBackColor(): CMYKColor
    {
        return CMYKColor::parseCMYK($this->getPdfParametersDto()->cmykBackColor);
    }

    /**
     * <p>
     * Nullable. CMYK back color value. Null means CMYK color is not used, instead normal RGB color is used.
     * </p>
     */
    public function setCMYKBackColor(CMYKColor $value): void
    {
        $this->getPdfParametersDto()->cmykBackColor = ($value != null ? $value->formatCMYK() : null);
    }

    /**
     * <p>
     * Nullable. CMYK color value of Codetext. Null means CMYK color is not used, instead normal RGB color is used.
     * </p>
     */
    public function getCMYKCodetextColor(): CMYKColor
    {
        return CMYKColor::parseCMYK($this->getPdfParametersDto()->cmykCodetextColor);
    }

    /**
     * <p>
     * Nullable. CMYK color value of Codetext. Null means CMYK color is not used, instead normal RGB color is used.
     * </p>
     */
    public function setCMYKCodetextColor(CMYKColor $value): void
    {
        $this->getPdfParametersDto()->cmykCodetextColor = $value != null ? $value->formatCMYK() : null;
    }

    /**
     * <p>
     * Nullable. CMYK color value of caption above. Null means CMYK color is not used, instead normal RGB color is used.
     * </p>
     */
    public function getCMYKCaptionAboveColor(): CMYKColor
    {
        return CMYKColor::parseCMYK($this->getPdfParametersDto()->cmykCaptionAboveColor);
    }

    /**
     * <p>
     * Nullable. CMYK color value of caption above. Null means CMYK color is not used, instead normal RGB color is used.
     * </p>
     */
    public function setCMYKCaptionAboveColor(CMYKColor $value): void
    {
        $this->getPdfParametersDto()->cmykCaptionAboveColor = $value != null ? $value->formatCMYK() : null;
    }

    /**
     * <p>
     * Nullable. CMYK color value of caption below. Null means CMYK color is not used, instead normal RGB color is used.
     * </p>
     */
    public function getCMYKCaptionBelowColor(): CMYKColor
    {
        return CMYKColor::parseCMYK($this->getPdfParametersDto()->cmykCaptionBelowColor);
    }

    /**
     * <p>
     * Nullable. CMYK color value of caption below. Null means CMYK color is not used, instead normal RGB color is used.
     * </p>
     */
    public function setCMYKCaptionBelowColor(CMYKColor $value): void
    {
        $this->getPdfParametersDto()->cmykCaptionBelowColor = $value->formatCMYK();
    }

    /**
     * <p>
     * Are paths used instead of text (use if Unicode characters are not displayed)
     * Default value: false.
     * </p>
     */
    public function isTextAsPath(): bool
    {
        return $this->getPdfParametersDto()->textAsPath;
    }

    /**
     * <p>
     * Are paths used instead of text (use if Unicode characters are not displayed)
     * Default value: false.
     * </p>
     */
    public function setTextAsPath(bool $value): void
    {
        $this->getPdfParametersDto()->textAsPath = $value;
    }
}