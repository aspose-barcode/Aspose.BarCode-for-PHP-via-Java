<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\BarCodeRegionParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\Point;
use Aspose\Barcode\Internal\Rectangle;
use Aspose\Barcode\Internal\ThriftConnection;
use Aspose\Barcode\Recognition\Quadrangle;

/**
 * Represents the recognized barcode's region and barcode angle
 *
 * This sample shows how to get barcode Angle and bounding quadrangle values
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", null, array( DecodeType::CODE_39, DecodeType::CODE_128));
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Angle: ".$result->getRegion()->getAngle());
 *    print("BarCode Quadrangle: ".$result->getRegion()->getQuadrangle());
 * }
 * @endcode
 */
final class BarCodeRegionParameters implements Communicator
{
    private $quad;
    private $rect;
    private array $points;
    private BarCodeRegionParametersDTO $barCodeRegionParametersDTO;

    /**
     * @return BarCodeRegionParametersDTO instance
     */
    private function getBarCodeRegionParametersDTO(): BarCodeRegionParametersDTO
    {
        return $this->barCodeRegionParametersDTO;
    }

    /**
     * @param $barCodeRegionParametersDTO
     */
    private function setBarCodeRegionParametersDTO($barCodeRegionParametersDTO): void
    {
        $this->barCodeRegionParametersDTO = $barCodeRegionParametersDTO;
    }

    function __construct(BarCodeRegionParametersDTO $barCodeRegionParametersDTO)
    {
        $this->barCodeRegionParametersDTO = $barCodeRegionParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        try
        {
            $this->quad = Quadrangle::construct($this->getBarCodeRegionParametersDTO()->quad);
            $this->rect = Rectangle::construct($this->getBarCodeRegionParametersDTO()->rectangle);
            $this->points = self::convertJavaPoints($this->getBarCodeRegionParametersDTO()->points);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function convertJavaPoints($javaPoints): array
    {
        $points = array();
        for ($i = 0; $i < sizeof($javaPoints); $i++)
        {
            $points[$i] = Point::construct($javaPoints[$i]);
        }

        return $points;
    }

    /**
     * @return Quadrangle Gets Quadrangle bounding barcode region Value: Returns Quadrangle bounding barcode region
     */
    public function getQuadrangle(): Quadrangle
    {
        return $this->quad;
    }

    /**
     * @return float Gets the angle of the barcode (0-360). Value: The angle for barcode (0-360).
     * @throws BarcodeException
     */
    public function getAngle(): float
    {
        try
        {
            return $this->getBarCodeRegionParametersDTO()->angle;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *
     */
    /**
     * @return array Gets Points array bounding barcode region Value: Returns Points array bounding barcode region
     */
    public function getPoints(): array
    {
        return $this->points;
    }

    /**
     * @return Rectangle Gets Rectangle bounding barcode region Value: Returns Rectangle bounding barcode region
     */
    public function getRectangle(): Rectangle
    {
        return $this->rect;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified BarCodeRegionParameters value.
     *
     * @param BarCodeRegionParameters $obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(BarCodeRegionParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->BarCodeRegionParameters_equals($this->getBarCodeRegionParametersDTO(), $obj->getBarCodeRegionParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this BarCodeRegionParameters.
     *
     * @return string A string that represents this BarCodeRegionParameters.
     */
    public function toString(): string
    {
        try
        {
            return $this->getBarCodeRegionParametersDTO()->toString;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}