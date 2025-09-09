<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\CodetextParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Generation\FontUnit;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;
use Aspose\Barcode\Generation\Unit;

/**
 * Codetext parameters.
 */
class CodetextParameters implements Communicator
{
    private $codetextParametersDto;

    private function getCodetextParametersDto(): CodetextParametersDTO
    {
        return $this->codetextParametersDto;
    }

    private function setCodetextParametersDto(CodetextParametersDTO $codetextParametersDto): void
    {
        $this->codetextParametersDto = $codetextParametersDto;
    }

    private $font;
    private $space;

    function __construct(CodetextParametersDTO $codetextParametersDto)
    {
        $this->codetextParametersDto = $codetextParametersDto;
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
            $this->font = new FontUnit($this->getCodetextParametersDto()->font);
            $this->space = new Unit($this->getCodetextParametersDto()->space);
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
            return $this->getCodetextParametersDto()->twoDDisplayText;
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
            $this->getCodetextParametersDto()->twoDDisplayText = $value;
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
            return $this->getCodetextParametersDto()->fontMode;
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
            $this->getCodetextParametersDto()->fontMode = $value;
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
            $this->getCodetextParametersDto()->font = $value->getFontUnitDto();
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
            $this->getCodetextParametersDto()->space = $value->getUnitDto();
            $this->space = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the alignment of the code text.
     * Default value: TextAlignment::CENTER.
     */
    public function getAlignment(): int
    {
        try
        {
            return $this->getCodetextParametersDto()->alignment;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the alignment of the code text.
     * Default value: TextAlignment::CENTER.
     */
    public function setAlignment(int $value): void
    {
        try
        {
            $this->getCodetextParametersDto()->alignment = $value;
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
            $hexColor = strtoupper(dechex($this->getCodetextParametersDto()->color));
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
            if (substr($value, 0, 1) == '#')
                $value = substr($value, 1, strlen($value) - 1);
            $this->getCodetextParametersDto()->color = hexdec($value);
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
            return $this->getCodetextParametersDto()->location;
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
            $this->getCodetextParametersDto()->location = $value;
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
            return $this->getCodetextParametersDto()->noWrap;
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
            $this->getCodetextParametersDto()->noWrap = $value;
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
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->CodetextParameters_toString($this->getCodetextParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}