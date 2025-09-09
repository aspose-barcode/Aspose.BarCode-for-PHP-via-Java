<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\SvgParametersDTO;
use Aspose\Barcode\Internal\Communicator;

/**
 * SVG parameters.
 */
class SvgParameters implements Communicator
{
    private $svgParametersDto;

    function getSvgParametersDto(): SvgParametersDTO
    {
        return $this->svgParametersDto;
    }

    private function setSvgParametersDto(SvgParametersDTO $svgParametersDto): void
    {
        $this->svgParametersDto = $svgParametersDto;
    }

    function __construct(SvgParametersDTO $svgParametersDto)
    {
        $this->svgParametersDto = $svgParametersDto;
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
     * Does SVG image contain explicit size in pixels (recommended)
     * Default value: true.
     */
    function isExplicitSizeInPixels(): bool
    {
        return $this->getSvgParametersDto()->isExplicitSizeInPixels;
    }

    /**
     * Does SVG image contain explicit size in pixels (recommended)
     * Default value: true.
     */
    function setExplicitSizeInPixels(bool $explicitSizeInPixels): void
    {
        $this->getSvgParametersDto()->isExplicitSizeInPixels = $explicitSizeInPixels;
    }

    /**
     * Does SVG image contain text as text element rather than paths (recommended)
     * Default value: true.
     */
    function isTextDrawnInTextElement(): bool
    {
        return $this->getSvgParametersDto()->isTextDrawnInTextElement;
    }

    /**
     * Does SVG image contain text as text element rather than paths (recommended)
     * Default value: true.
     */
    function setTextDrawnInTextElement(bool $isTextDrawnInTextElement): void
    {
        $this->getSvgParametersDto()->isTextDrawnInTextElement = $isTextDrawnInTextElement;
    }


    /**
     * <p>
     * Possible modes for filling color in svg file, RGB is default and supported by SVG 1.1.
     * RGBA, HSL, HSLA is allowed in SVG 2.0 standard.
     * Even in RGB opacity will be set through "fill-opacity" parameter
     * </p>
     */
    function setSvgColorMode(int $svgColorMode): void
    {
        $this->getSvgParametersDto()->svgColorMode = $svgColorMode;
    }


    /**
     * Possible modes for filling color in svg file, RGB is default and supported by SVG 1.1.
     * RGBA, HSL, HSLA is allowed in SVG 2.0 standard.
     * Even in RGB opacity will be set through "fill-opacity" parameter
     */
    function getSvgColorMode(): int
    {
        return $this->getSvgParametersDto()->svgColorMode;
    }
}