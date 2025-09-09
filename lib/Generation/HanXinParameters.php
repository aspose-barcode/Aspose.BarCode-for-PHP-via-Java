<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\HanXinParametersDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * <p>
 * Han Xin parameters.
 * </p>
 */
class HanXinParameters implements Communicator
{
    private $hanXinParametersDto;

    private function getHanXinParametersDto(): HanXinParametersDTO
    {
        return $this->hanXinParametersDto;
    }

    private function setHanXinParametersDto(HanXinParametersDTO $hanXinParametersDto): void
    {
        $this->hanXinParametersDto = $hanXinParametersDto;
    }

    function __construct(HanXinParametersDTO $hanXinParametersDto)
    {
        $this->hanXinParametersDto = $hanXinParametersDto;
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
     * <p>
     * Version of HanXin Code.
     * From Version01 to Version84 for Han Xin code.
     * Default value is HanXinVersion.Auto.
     * </p>
     */
    public function getHanXinVersion(): int
    {
        return $this->getHanXinParametersDto()->hanXinVersion;
    }

    /**
     * <p>
     * Version of HanXin Code.
     * From Version01 to Version84 for Han Xin code.
     * Default value is HanXinVersion.Auto.
     * </p>
     */
    public function setHanXinVersion(int $value): void
    {
        $this->getHanXinParametersDto()->hanXinVersion = $value;
    }

    /**
     * <p>
     *  Level of Reed-Solomon error correction for Han Xin barcode.
     *  From low to high: L1, L2, L3, L4. see HanXinErrorLevel.
     * </p>
     */
    public function getHanXinErrorLevel(): int
    {
        return $this->getHanXinParametersDto()->hanXinErrorLevel;
    }

    /**
     * <p>
     *  Level of Reed-Solomon error correction for Han Xin barcode.
     *  From low to high: L1, L2, L3, L4. see HanXinErrorLevel.
     * </p>
     */
    public function setHanXinErrorLevel(int $value): void
    {
        $this->getHanXinParametersDto()->hanXinErrorLevel = $value;
    }

    /**
     * <p>
     * HanXin encoding mode.
     * Default value: HanXinEncodeMode::Mixed.
     * </p>
     */
    public function getHanXinEncodeMode(): int
    {
        return $this->getHanXinParametersDto()->hanXinEncodeMode;
    }

    /**
     * <p>
     * HanXin encoding mode.
     * Default value: HanXinEncodeMode::Mixed.
     * </p>
     */
    public function setHanXinEncodeMode(int $value): void
    {
        $this->getHanXinParametersDto()->hanXinEncodeMode = $value;
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     * </p>
     */
    public function getHanXinECIEncoding(): int
    {
        return $this->getHanXinParametersDto()->hanXinECIEncoding;
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     * </p>
     */
    public function setHanXinECIEncoding(int $value): void
    {
        $this->getHanXinParametersDto()->hanXinECIEncoding = $value;
    }


    /**
     * <p>
     * Returns a human-readable string representation of this {@code HanXinParameters}.
     * </p>
     * @return string that represents this {@code HanXinParameters}.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->HanXinParameters_toString($this->getHanXinParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}