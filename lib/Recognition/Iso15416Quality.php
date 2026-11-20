<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\Iso15416QualityDTO;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Exception;

/**
 * Stores ISO/IEC 15416 barcode quality grades.
 */
class Iso15416Quality implements Communicator
{
    private Iso15416QualityDTO $iso15416QualityDTO;

    /**
     * @return Iso15416QualityDTO instance
     */
    private function getIso15416QualityDTO(): Iso15416QualityDTO
    {
        return $this->iso15416QualityDTO;
    }

    /**
     * @param Iso15416QualityDTO $iso15416QualityDTO
     */
    private function setIso15416QualityDTO(Iso15416QualityDTO $iso15416QualityDTO): void
    {
        $this->iso15416QualityDTO = $iso15416QualityDTO;
    }

    function __construct(Iso15416QualityDTO $iso15416QualityDTO)
    {
        $this->iso15416QualityDTO = $iso15416QualityDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // No nested wrapper fields.
    }

    /**
     * Gets the overall barcode quality grade according to ISO/IEC 15416.
     * Value: The overall quality grade from 0 (lowest) to 4 (highest).
     */
    public function getGrade(): float
    {
        try
        {
            return $this->getIso15416QualityDTO()->grade;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the decode grade indicating whether the barcode can be decoded using the reference decode algorithm.
     */
    public function getDecode(): float
    {
        try
        {
            return $this->getIso15416QualityDTO()->decode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the symbol contrast grade based on the difference between maximum and minimum reflectance.
     */
    public function getSymbolContrast(): float
    {
        try
        {
            return $this->getIso15416QualityDTO()->symbolContrast;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the minimum reflectance grade based on the darkest bar reflectance.
     */
    public function getMinimumReflectance(): float
    {
        try
        {
            return $this->getIso15416QualityDTO()->minimumReflectance;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the minimum edge contrast grade based on the smallest reflectance difference between adjacent bars and spaces.
     */
    public function getMinimumEdgeContrast(): float
    {
        try
        {
            return $this->getIso15416QualityDTO()->minimumEdgeContrast;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the modulation grade based on the uniformity of edge contrast throughout the barcode.
     */
    public function getModulation(): float
    {
        try
        {
            return $this->getIso15416QualityDTO()->modulation;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the defects grade based on reflectance irregularities within bars and spaces.
     */
    public function getDefects(): float
    {
        try
        {
            return $this->getIso15416QualityDTO()->defects;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the decodability grade based on the accuracy of bar and space widths.
     */
    public function getDecodability(): float
    {
        try
        {
            return $this->getIso15416QualityDTO()->decodability;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets additional quality grades, including symbology-specific checks.
     *
     * @return array<string, float>
     */
    public function getDetailedGrades(): array
    {
        try
        {
            return $this->getIso15416QualityDTO()->detailedGrades;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}
