<?php

namespace Aspose\Barcode\Internal;

use Aspose\Barcode\Bridge\RectangleDTO;

class Rectangle implements Communicator
{
    private $rectangleDto;

    function getRectangleDto(): RectangleDTO
    {
        return $this->rectangleDto;
    }

    private function setRectangleDto(RectangleDTO $rectangleDto): void
    {
        $this->rectangleDto = $rectangleDto;
    }

    /**
     * Represents a Quadrangle structure with its properties left uninitialized.Value: Quadrangle
     */
    public static function EMPTY(): Rectangle
    {
        return new Rectangle(0, 0, 0, 0);
    }

    /**
     * Rectangle constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y, $width, $height)
    {
        $this->rectangleDto = new RectangleDTO();
        $this->getRectangleDto()->x = $x;
        $this->getRectangleDto()->y = $y;
        $this->getRectangleDto()->width = $width;
        $this->getRectangleDto()->height = $height;
    }

    /**
     * Rectangle constructor.
     * @param $x
     * @param $y
     */
    static function construct($rectangleDto): Rectangle
    {
        $rectangle = new Rectangle(0, 0, 0, 0);
        $rectangle->setRectangleDto($rectangleDto);
        return $rectangle;
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
    }

    public function getX(): int
    {
        return $this->getRectangleDto()->x;
    }

    public function getY(): int
    {
        return $this->getRectangleDto()->y;
    }

    public function getWidth(): int
    {
        return $this->getRectangleDto()->width;
    }

    public function getHeight(): int
    {
        return $this->getRectangleDto()->height;
    }

    public function getLeft(): int
    {
        return $this->getX();
    }

    public function getTop(): int
    {
        return $this->getY();
    }

    public function getRight(): int
    {
        return $this->getX() + $this->getWidth();
    }

    public function getBottom(): int
    {
        return $this->getY() + $this->getHeight();
    }

    public function toString(): string
    {
        return $this->getX() . ',' . $this->getY() . ',' . $this->getWidth() . ',' . $this->getHeight();
    }

    public function equals(Rectangle $obj): bool
    {
        return $this->getRectangleDto()->x == $obj->getRectangleDto()->x && $this->getRectangleDto()->y == $obj->getRectangleDto()->y && $this->getRectangleDto()->width == $obj->getRectangleDto()->width && $this->getRectangleDto()->height == $obj->getRectangleDto()->height;
    }

    private function intersectsWithInclusive(Rectangle $r): bool
    {
        return !(($this->getLeft() > $r->getRight()) || ($this->getRight() < $r->getLeft()) ||
            ($this->getTop() > $r->getBottom()) || ($this->getBottom() < $r->getTop()));
    }

    /**
     * Intersect Shared Method
     * Produces a new Rectangle by intersecting 2 existing
     * Rectangles. Returns null if there is no    intersection.
     */

    public static function intersect(Rectangle $a, Rectangle $b): Rectangle
    {
        // MS.NET returns a non-empty rectangle if the two rectangles
        // touch each other
        if (!$a->intersectsWithInclusive($b)) {
            return new Rectangle(0, 0, 0, 0);
        }

        return Rectangle::fromLTRB(
            max($a->getLeft(), $b->getLeft()),
            max($a->getTop(), $b->getTop()),
            min($a->getRight(), $b->getRight()),
            min($a->getBottom(), $b->getBottom()));
    }

    /**
     * FromLTRB Shared Method
     * Produces a Rectangle structure from left, top, right,
     * and bottom coordinates.
     */
    public static function fromLTRB(int $left, int $top, int $right, int $bottom): Rectangle
    {
        return new Rectangle($left, $top, $right - $left, $bottom - $top);
    }

    public function isEmpty(): bool
    {
        return ($this->getWidth() <= 0) || ($this->getHeight() <= 0);
    }
}