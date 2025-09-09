<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\ImageParametersDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Generation\PdfParameters;
use Aspose\Barcode\Generation\SvgParameters;

/**
 * Image parameters.
 */
class ImageParameters implements Communicator
{
    private $imageParametersDto;

    private function getImageParametersDto(): ImageParametersDTO
    {
        return $this->imageParametersDto;
    }

    private function setImageParametersDto(ImageParametersDTO $imageParametersDto): void
    {
        $this->imageParametersDto = $imageParametersDto;
    }

    private $svg;
    private $pdf;

    function __construct(ImageParametersDTO $imageParametersDto)
    {
        $this->imageParametersDto = $imageParametersDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
        $this->svg = new SvgParameters($this->getImageParametersDto()->svg);
        $this->pdf = new PdfParameters($this->getImageParametersDto()->pdf);
    }

    /**
     * SVG parameters
     */
    function getSvg(): SvgParameters
    {
        return $this->svg;
    }

    /**
     * SVG parameters
     */
    function setSvg(SvgParameters $svg): void
    {
        $this->svg = $svg;
        $this->getImageParametersDto()->svg = $svg->getSvgParametersDto();
    }

    /**
     * <p>
     * PDF parameters
     * </p>
     */
    function getPdf()
    {
        return $this->pdf;
    }

    /**
     * <p>
     * PDF parameters
     * </p>
     */
    function setPdf(PdfParameters $value)
    {
        $this->pdf = $value;
        $this->getImageParametersDto()->pdf = $value->getPdfParametersDto();
    }
}