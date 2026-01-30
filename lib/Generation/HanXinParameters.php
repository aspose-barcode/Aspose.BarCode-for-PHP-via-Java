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
     * Default value is Version.Auto.
     * </p>
     */
    public function getVersion(): int
    {
        return $this->getHanXinParametersDto()->version;
    }

    /**
     * <p>
     * Version of HanXin Code.
     * From Version01 to Version84 for Han Xin code.
     * Default value is Version.Auto.
     * </p>
     */
    public function setVersion(int $value): void
    {
        $this->getHanXinParametersDto()->version = $value;
    }

    /**
     * <p>
     * Version of HanXin Code.
     * From Version01 to Version84 for Han Xin code.
     * Default value is HanXinVersion.Auto.
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getVersion().
     */
    public function getHanXinVersion(): int
    {
        return $this->getHanXinParametersDto()->version;
    }

    /**
     * <p>
     * Version of HanXin Code.
     * From Version01 to Version84 for Han Xin code.
     * Default value is HanXinVersion.Auto.
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setVersion().
     */
    public function setHanXinVersion(int $value): void
    {
        $this->getHanXinParametersDto()->version = $value;
    }

    /**
     * <p>
     *  Level of Reed-Solomon error correction for Han Xin barcode.
     *  From low to high: L1, L2, L3, L4. see ErrorLevel.
     * </p>
     */
    public function getErrorLevel(): int
    {
        return $this->getHanXinParametersDto()->errorLevel;
    }

    /**
     * <p>
     *  Level of Reed-Solomon error correction for Han Xin barcode.
     *  From low to high: L1, L2, L3, L4. see ErrorLevel.
     * </p>
     */
    public function setErrorLevel(int $value): void
    {
        $this->getHanXinParametersDto()->errorLevel = $value;
    }
    /**
     * <p>
     *  Level of Reed-Solomon error correction for Han Xin barcode.
     *  From low to high: L1, L2, L3, L4. see HanXinErrorLevel.
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getErrorLevel().
     */
    public function getHanXinErrorLevel(): int
    {
        return $this->getHanXinParametersDto()->errorLevel;
    }

    /**
     * <p>
     *  Level of Reed-Solomon error correction for Han Xin barcode.
     *  From low to high: L1, L2, L3, L4. see HanXinErrorLevel.
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setErrorLevel().
     */
    public function setHanXinErrorLevel(int $value): void
    {
        $this->getHanXinParametersDto()->errorLevel = $value;
    }

    /**
     * <p>
     * HanXin encoding mode.
     * Default value: EncodeMode.Mixed.
     * </p>
     */
    public function getEncodeMode(): int
    {
        return $this->getHanXinParametersDto()->encodeMode;
    }

    /**
     * <p>
     * HanXin encoding mode.
     * Default value: EncodeMode.Mixed.
     * </p>
     */
    public function setEncodeMode(int $value): void
    {
        $this->getHanXinParametersDto()->encodeMode = $value;
    }

    /**
     * <p>
     * HanXin encoding mode.
     * Default value: HanXinEncodeMode::Mixed.
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getEncodeMode().
     */
    public function getHanXinEncodeMode(): int
    {
        return $this->getHanXinParametersDto()->encodeMode;
    }

    /**
     * <p>
     * HanXin encoding mode.
     * Default value: HanXinEncodeMode::Mixed.
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setEncodeMode().
     */
    public function setHanXinEncodeMode(int $value): void
    {
        $this->getHanXinParametersDto()->encodeMode = $value;
    }
    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation contains all well known charset encodings.
     * </p>
     */
    public function getECIEncoding(): int
    {
        return $this->getHanXinParametersDto()->eciEncoding;
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation contains all well known charset encodings.
     * </p>
     */
    public function setECIEncoding(int $value): void
    {
        $this->getHanXinParametersDto()->eciEncoding = $value;
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getECIEncoding().
     */
    public function getHanXinECIEncoding(): int
    {
        return $this->getHanXinParametersDto()->eciEncoding;
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setECIEncoding().
     */
    public function setHanXinECIEncoding(int $value): void
    {
        $this->getHanXinParametersDto()->eciEncoding = $value;
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