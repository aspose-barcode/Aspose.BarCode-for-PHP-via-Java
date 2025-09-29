<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\CaptionParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;

/**
 * Caption parameters.
 */
class CaptionParameters implements Communicator
{
    private $captionParametersDto;

    function getCaptionParametersDto(): CaptionParametersDTO
    {
        return $this->captionParametersDto;
    }

    private function setCaptionParametersDto(CaptionParametersDTO $captionParametersDto): void
    {
        $this->captionParametersDto = $captionParametersDto;
    }

    private $font;
    private $padding;

    function __construct(CaptionParametersDTO $captionParametersDto)
    {
        $this->captionParametersDto = $captionParametersDto;
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
            $this->padding = new Padding($this->getCaptionParametersDto()->padding);
            $this->font = new FontUnit($this->getCaptionParametersDto()->font);
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
            return $this->getCaptionParametersDto()->text;
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
            $this->getCaptionParametersDto()->text = $value;
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
            return $this->getCaptionParametersDto()->visible;
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
            $this->getCaptionParametersDto()->visible = $value;
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
            $hexColor = strtoupper(dechex($this->getCaptionParametersDto()->textColor));
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
    public function setTextColor(string $value): void
    {
        try
        {
            if (substr($value, 0, 1) == '#')
                $value = substr($value, 1, strlen($value) - 1);
            $this->getCaptionParametersDto()->textColor = hexdec($value);
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
        return $this->padding;
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
            $this->getCaptionParametersDto()->padding = $value->getPaddingDto();
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
            return $this->getCaptionParametersDto()->alignment;
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
            $this->getCaptionParametersDto()->alignment = $value;
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
            return $this->getCaptionParametersDto()->noWrap;
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
            $this->getCaptionParametersDto()->noWrap = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}