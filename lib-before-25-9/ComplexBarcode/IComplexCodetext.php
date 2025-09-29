<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Bridge\IComplexCodetextDTO;
use Aspose\Barcode\Internal\Communicator;

/**
 * <p>
 * Interface for complex codetext used with ComplexBarcodeGenerator.
 * </p>
 */
abstract class IComplexCodetext implements Communicator
{
    private $complexCodetext;

    /**
     * @return mixed
     */
    public function getIComplexCodetextDTO(): IComplexCodetextDTO
    {
        return $this->complexCodetext;
    }

    /**
     * @param mixed $HIBCLICCombinedCodetextDto
     */
    public function setIComplexCodetextDTO(IComplexCodetextDTO $complexCodetext): void
    {
        $this->complexCodetext = $complexCodetext;
    }

    /**
     * Construct codetext for complex barcode
     * @return string Constructed codetext
     */
    abstract function getConstructedCodetext(): string;

    /**
     * Initializes instance with constructed codetext.
     * @param string $constructedCodetext Constructed codetext.
     */
    public abstract function initFromString(string $constructedCodetext): void;

    /**
     * Gets barcode type.
     * @return int Barcode type.
     */
    abstract function getBarcodeType(): int;
}