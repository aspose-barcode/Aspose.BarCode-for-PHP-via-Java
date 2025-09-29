<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\UnitDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;
use InvalidArgumentException;

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
class Unit implements Communicator
{
    private $unitDto;

    function getUnitDto(): UnitDTO
    {
        return $this->unitDto;
    }

    private function setUnitDto(UnitDTO $unitDto): void
    {
        $this->unitDto = $unitDto;
    }

    public function __construct($source)
    {
        try
        {
            $this->unitDto = self::initUnit($source);
            $this->obtainDto();
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function initUnit($source)
    {
        if ($source instanceof Unit)
        {
            return $source->getUnitDto();
        } elseif ($source instanceof UnitDTO)
            return $source;
        throw new InvalidArgumentException();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets size value in pixels.
     */
    public function getPixels(): float
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $pixels = $client->Unit_getPixels($this->getUnitDto());
        $thriftConnection->closeConnection();

        return $pixels;
    }

    /**
     * Sets size value in pixels.
     */
    public function setPixels(float $value): void
    {
        try
        {
            $this->getUnitDto()->units = $value;
            $this->getUnitDto()->graphicsUnit = GraphicsUnit::PIXEL;
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
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $inches = $client->Unit_getInches($this->getUnitDto());
        $thriftConnection->closeConnection();

        return $inches;
    }

    /**
     * Sets size value in inches.
     */
    public function setInches(float $value): void
    {
        try
        {
            $this->getUnitDto()->units = $value;
            $this->getUnitDto()->graphicsUnit = GraphicsUnit::INCH;
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
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $millimeters = $client->Unit_getMillimeters($this->getUnitDto());
        $thriftConnection->closeConnection();

        return $millimeters;
    }

    /**
     * Sets size value in millimeters.
     */
    public function setMillimeters(float $value): void
    {
        try
        {
            $this->getUnitDto()->units = $value;
            $this->getUnitDto()->graphicsUnit = GraphicsUnit::MILLIMETER;
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
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $point = $client->Unit_getPoint($this->getUnitDto());
        $thriftConnection->closeConnection();

        return $point;
    }

    /**
     * Sets size value in point.
     */
    public function setPoint(float $value): void
    {
        try
        {
            $this->getUnitDto()->units = $value;
            $this->getUnitDto()->graphicsUnit = GraphicsUnit::POINT;
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
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $document = $client->Unit_getDocument($this->getUnitDto());
        $thriftConnection->closeConnection();

        return $document;
    }

    /**
     * Sets size value in document units.
     */
    public function setDocument(float $value): void
    {
        try
        {
            $this->getUnitDto()->units = $value;
            $this->getUnitDto()->graphicsUnit = GraphicsUnit::DOCUMENT;
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
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->Unit_toString($this->getUnitDto());
        $thriftConnection->closeConnection();

        return $str;
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
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->Unit_equals($this->getUnitDTO(), $obj->getUnitDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }
}