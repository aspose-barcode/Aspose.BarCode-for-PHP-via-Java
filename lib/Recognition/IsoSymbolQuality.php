<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\IsoSymbolQualityDTO;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Exception;

/**
 * Stores ISO barcode quality information.
 */
class IsoSymbolQuality implements Communicator
{
    private Iso15416Quality $oneDimensional;
    private IsoSymbolQualityDTO $isoSymbolQualityDTO;

    /**
     * @return IsoSymbolQualityDTO instance
     */
    private function getIsoSymbolQualityDTO(): ?IsoSymbolQualityDTO
    {
        return $this->isoSymbolQualityDTO;
    }

    /**
     * @param IsoSymbolQualityDTO $isoSymbolQualityDTO
     */
    private function setIsoSymbolQualityDTO(?IsoSymbolQualityDTO $isoSymbolQualityDTO): void
    {
        $this->isoSymbolQualityDTO = $isoSymbolQualityDTO;
    }

    function __construct(IsoSymbolQualityDTO $isoSymbolQualityDTO)
    {
        $this->isoSymbolQualityDTO = $isoSymbolQualityDTO;
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
            if($this->getIsoSymbolQualityDTO()->oneDimensional !== null)
                $this->oneDimensional = new Iso15416Quality($this->getIsoSymbolQualityDTO()->oneDimensional);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets one-dimensional ISO/IEC 15416 quality information.
     */
    public function getOneDimensional(): Iso15416Quality
    {
        return $this->oneDimensional;
    }
}
