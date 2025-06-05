<?php

namespace Aspose\Barcode\Internal;

use Aspose\Barcode\Bridge\PointDTO;
use Exception;

class Point implements Communicator
{
    private $pointDTO;

    /**
     * @return PointDTO instance
     */
    function getPointDTO(): PointDTO
    {
        return $this->pointDTO;
    }

    /**
     * @param $qualitySettingsDTO PointDTO instance
     */
    private function setPointDTO($pointDTO): void
    {
        $this->pointDTO = $pointDTO;
    }


    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
    }

    /**
     * Represents a Quadrangle structure with its properties left uninitialized.Value: Quadrangle
     */
    public static function EMPTY(): Point
    {
        return new Point(0, 0);
    }

    /**
     * Rectangle constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        try {
            $this->pointDTO = new PointDTO();
            $this->getPointDTO()->x = $x;
            $this->getPointDTO()->y = $y;
            $this->obtainDto();
            $this->initFieldsFromDto();
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($dtoRef): Point
    {
        try {
            $point = Point::EMPTY();
            $point->setPointDTO($dtoRef);
            return $point;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function getX(): int
    {
        try {
            return $this->getPointDTO()->x;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function getY(): int
    {
        try {
            return $this->getPointDTO()->y;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function setX(int $x): void
    {
        try {
            $this->getPointDTO()->x = $x;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function setY(int $y): void
    {
        try {
            $this->getPointDTO()->y = $y;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function toString(): string
    {
        try {
            return $this->getPointDTO()->x . ',' . $this->getPointDTO()->y;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }

    public function equals(Point $obj): bool
    {
        try {
            return $this->getX() == $obj->getX() && $this->getY() == $obj->getY();
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }


    }
}