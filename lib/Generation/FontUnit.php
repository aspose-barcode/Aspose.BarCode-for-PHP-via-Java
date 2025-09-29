<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\FontUnitDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use InvalidArgumentException;

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
final class FontUnit implements Communicator
{
    private $fontUnitDto;

    function getFontUnitDto(): FontUnitDTO
    {
        return $this->fontUnitDto;
    }

    private function setFontUnitDto(FontUnitDTO $fontUnitDto): void
    {
        $this->fontUnitDto = $fontUnitDto;
    }

    private $_size;

    public function __construct($source)
    {
        $this->fontUnitDto = self::initFontUnit($source);
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    private static function initFontUnit($source)
    {
        if ($source instanceof FontUnit)
        {
            return $source->getFontUnitDto();
        } elseif ($source instanceof FontUnitDTO)
            return $source;
        throw new InvalidArgumentException();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
        try
        {
            $this->_size = new Unit($this->getFontUnitDto()->size);
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
            return $this->getFontUnitDto()->familyName;
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
            $this->getFontUnitDto()->familyName = $value;
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
            return $this->getFontUnitDto()->style;
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
            $this->getFontUnitDto()->style = $value;
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
        return $this->_size;
    }
}