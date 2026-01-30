<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\PatchCodeParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * PatchCode parameters.
 */
class PatchCodeParameters implements Communicator
{
    private $patchCodeParametersDto;

    function getPatchCodeParametersDto(): PatchCodeParametersDTO
    {
        return $this->patchCodeParametersDto;
    }

    private function setPatchCodeParametersDto(PatchCodeParametersDTO $patchCodeParametersDto): void
    {
        $this->patchCodeParametersDto = $patchCodeParametersDto;
    }

    function __construct(PatchCodeParametersDTO $patchCodeParametersDto)
    {
        $this->patchCodeParametersDto = $patchCodeParametersDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
    }

    /**
     * Specifies codetext for an extra QR barcode, when PatchCode is generated in page mode.
     */
    public function getExtraBarcodeText(): ?string
    {
        try
        {
            $ExtraBarcodeText = $this->getPatchCodeParametersDto()->extraBarcodeText;
            if ($ExtraBarcodeText == "null")
            {
                return null;
            }
            return $ExtraBarcodeText;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Specifies codetext for an extra QR barcode, when PatchCode is generated in page mode.
     */
    public function setExtraBarcodeText(string $value): void
    {
        try
        {
            $this->getPatchCodeParametersDto()->extraBarcodeText = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * PatchCode format. Choose PatchOnly to generate single PatchCode. Use page format to generate Patch page with PatchCodes as borders.
     * Default value: PatchFormat.PatchOnly
     * </p>
     */
    public function getFormat(): int
    {
        return $this->getPatchCodeParametersDto()->format;
    }

    /**
     * <p>
     * PatchCode format. Choose PatchOnly to generate single PatchCode. Use page format to generate Patch page with PatchCodes as borders.
     * Default value: PatchFormat.PatchOnly
     * </p>
     */
    public function setFormat(int $value): void
    {
        $this->getPatchCodeParametersDto()->format = $value;
    }

    /**
     * PatchCode format. Choose PatchOnly to generate single PatchCode. Use page format to generate Patch page with PatchCodes as borders.
     * Default value: PatchFormat::PATCH_ONLY
     *
     * @return
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getFormat().
     */
    public function getPatchFormat(): int
    {
        try
        {
            return $this->getPatchCodeParametersDto()->format;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * PatchCode format. Choose PatchOnly to generate single PatchCode. Use page format to generate Patch page with PatchCodes as borders.
     * Default value: PatchFormat::PATCH_ONLY
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setFormat().
     */
    public function setPatchFormat(int $value): void
    {
        try
        {
            $this->getPatchCodeParametersDto()->format = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this PatchCodeParameters.
     * @return string A string that represents this PatchCodeParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->PatchCodeParameters_toString($this->getPatchCodeParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}