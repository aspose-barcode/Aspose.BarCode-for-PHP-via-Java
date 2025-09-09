<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\QuadrangleDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\Point;
use Aspose\Barcode\Internal\Rectangle;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 *
 * Stores a set of four Points that represent a Quadrangle region.
 *
 */
class Quadrangle implements Communicator
{
    private Point $leftTop;
    private Point $rightTop;
    private Point $rightBottom;
    private Point $leftBottom;
    private QuadrangleDTO $quadrangleDTO;

    /**
     * @return QuadrangleDTO instance
     */
    private function getQuadrangleDTO(): QuadrangleDTO
    {
        return $this->quadrangleDTO;
    }

    /**
     * @param QuadrangleDTO $quadrangleDTO
     */
    private function setQuadrangleDTO(QuadrangleDTO $quadrangleDTO): void
    {
        $this->quadrangleDTO = $quadrangleDTO;
    }

    /**
     * Represents a Quadrangle structure with its properties left uninitialized.Value: Quadrangle
     */
    public static function EMPTY(): Quadrangle
    {
        return new Quadrangle(new Point(0, 0), new Point(0, 0), new Point(0, 0), new Point(0, 0));
    }

    static function construct(QuadrangleDTO $quadrangleDTO): Quadrangle
    {
        $quadrangle = Quadrangle::EMPTY();
        $quadrangle->setQuadrangleDTO($quadrangleDTO);
        $quadrangle->initFieldsFromDto();
        return $quadrangle;
    }

    /**
     * Initializes a new instance of the Quadrangle structure with the describing points.
     *
     * @param Point $leftTop A Point that represents the left-top corner of the Quadrangle.
     * @param Point $rightTop A Point that represents the right-top corner of the Quadrangle.
     * @param Point $rightBottom A Point that represents the right-bottom corner of the Quadrangle.
     * @param Point $leftBottom A Point that represents the left-bottom corner of the Quadrangle.
     */
    public function __construct(Point $leftTop, Point $rightTop, Point $rightBottom, Point $leftBottom)
    {
        $this->quadrangleDTO = new QuadrangleDTO();
        $this->getQuadrangleDTO()->leftTop = $leftTop->getPointDTO();
        $this->getQuadrangleDTO()->rightTop = $rightTop->getPointDTO();
        $this->getQuadrangleDTO()->rightBottom = $rightBottom->getPointDTO();
        $this->getQuadrangleDTO()->leftBottom = $leftBottom->getPointDTO();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        $this->leftTop = Point::construct($this->getQuadrangleDTO()->leftTop);
        $this->rightTop = Point::construct($this->getQuadrangleDTO()->rightTop);
        $this->rightBottom = Point::construct($this->getQuadrangleDTO()->rightBottom);
        $this->leftBottom = Point::construct($this->getQuadrangleDTO()->leftBottom);
    }

    /**
     * Gets left-top corner Point of Quadrangle regionValue: A left-top corner Point of Quadrangle region
     */
    public function getLeftTop(): Point
    {
        return $this->leftTop;
    }

    /**
     * Gets left-top corner Point of Quadrangle regionValue: A left-top corner Point of Quadrangle region
     */
    public function setLeftTop(Point $value): void
    {
        try
        {
            $this->leftTop = $value;
            $this->getQuadrangleDTO()->leftTop = $value->getPointDTO();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets right-top corner Point of Quadrangle regionValue: A right-top corner Point of Quadrangle region
     */
    public function getRightTop(): Point
    {
        return $this->rightTop;
    }

    /**
     * Gets right-top corner Point of Quadrangle regionValue: A right-top corner Point of Quadrangle region
     */
    public function setRightTop(Point $value): void
    {
        try
        {
            $this->rightTop = $value;
            $this->getQuadrangleDTO()->rightTop = $value->getPointDTO();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets right-bottom corner Point of Quadrangle regionValue: A right-bottom corner Point of Quadrangle region
     */
    public function getRightBottom(): Point
    {
        return $this->rightBottom;
    }

    /**
     * Gets right-bottom corner Point of Quadrangle regionValue: A right-bottom corner Point of Quadrangle region
     */
    public function setRightBottom(Point $value): void
    {
        try
        {
            $this->rightBottom = $value;
            $this->getQuadrangleDTO()->rightBottom = $value->getPointDTO();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets left-bottom corner Point of Quadrangle regionValue: A left-bottom corner Point of Quadrangle region
     */
    public function getLeftBottom(): Point
    {
        return $this->leftBottom;
    }

    /**
     * Gets left-bottom corner Point of Quadrangle regionValue: A left-bottom corner Point of Quadrangle region
     */
    public function setLeftBottom(Point $value): void
    {
        try
        {
            $this->leftBottom = $value;
            $this->getQuadrangleDTO()->leftBottom = $value->getPointDTO();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Tests whether all Points of this Quadrangle have values of zero.Value: Returns true if all Points of this Quadrangle have values of zero; otherwise, false.
     */
    public function isEmpty(): bool
    {
        return $this->equals(Quadrangle::EMPTY());
    }

    /**
     * Determines if the specified Point is contained within this Quadrangle structure.
     *
     * @param Point $pt
     * @return bool Returns true if Point is contained within this Quadrangle structure; otherwise, false.
     * @throws BarcodeException
     */
    public function containsPoint(Point $pt): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $containsPointResponse = $client->Quadrangle_containsPoint($this->getQuadrangleDTO(), $pt->getPointDTO());
            $thriftConnection->closeConnection();
            return $containsPointResponse;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified point is contained within this Quadrangle structure.
     *
     * @param int $x The x point cordinate.
     * @param int $y The y point cordinate.
     * @return bool Returns true if point is contained within this Quadrangle structure; otherwise, false.
     */
    public function containsCoordinates(int $x, int $y): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $containsPointResponse = $client->Quadrangle_containsCoordinates($this->getQuadrangleDTO(), $x, $y);
            $thriftConnection->closeConnection();
            return $containsPointResponse;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified Quadrangle is contained or intersect this Quadrangle structure.
     *
     * @param Quadrangle The Quadrangle to test.
     * @return bool Returns true if Quadrangle is contained or intersect this Quadrangle structure; otherwise, false.
     */
    public function containsQuadrangle(Quadrangle $quad): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $containsPointResponse = $client->Quadrangle_containsQuadrangle($this->getQuadrangleDTO(), $quad->getQuadrangleDTO());
            $thriftConnection->closeConnection();
            return $containsPointResponse;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified Rectangle is contained or intersect this Quadrangle structure.
     *
     * @param Rectangle $rect
     * @return bool Returns true if Rectangle is contained or intersect this Quadrangle structure; otherwise, false.
     * @throws BarcodeException
     */
    public function containsRectangle(Rectangle $rect): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $containsPointResponse = $client->Quadrangle_containsRectangle($this->getQuadrangleDTO(), $rect->getRectangleDto());
            $thriftConnection->closeConnection();
            return $containsPointResponse;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Quadrangle value.
     *
     * @param Quadrangle $obj
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(Quadrangle $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->Quadrangle_equals($this->getQuadrangleDTO(), $obj->getQuadrangleDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this Quadrangle.
     *
     * @return string A string that represents this Quadrangle.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->Quadrangle_toString($this->getQuadrangleDTO());
        $thriftConnection->closeConnection();

        return $str;
    }

    /**
     * Creates Rectangle bounding this Quadrangle
     *
     * @return Rectangle returns Rectangle bounding this Quadrangle
     */
    public function getBoundingRectangle(): Rectangle
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $boundingRectangleDTO = $client->Quadrangle_getBoundingRectangle($this->getQuadrangleDTO());
            $thriftConnection->closeConnection();
            return Rectangle::construct($boundingRectangleDTO);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}