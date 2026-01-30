<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\QrParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * QR parameters.
 */
class QrParameters implements Communicator
{
    private $qrParametersDto;

    private function getQrParametersDto(): QrParametersDTO
    {
        return $this->qrParametersDto;
    }

    private function setQrParametersDto(QrParametersDTO $qrParametersDto): void
    {
        $this->qrParametersDto = $qrParametersDto;
    }

    private $structuredAppend;

    function __construct(QrParametersDTO $qrParametersDto)
    {
        $this->qrParametersDto = $qrParametersDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
        try
        {
            $this->structuredAppend = new QrStructuredAppendParameters($this->getQrParametersDto()->structuredAppend);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     * Not supported by MicroQR.
     * </p>
     */
    public function getECIEncoding(): int
    {
        return $this->getQrParametersDto()->eciEncoding;
    }

    /**
     * <p>
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     * Not supported by MicroQR.
     * </p>
     */
    public function setECIEncoding(int $value): void
    {
        $this->getQrParametersDto()->eciEncoding = $value;
    }

    /**
     * QR structured append parameters.
     */
    public function getStructuredAppend(): QrStructuredAppendParameters
    {
        return $this->structuredAppend;
    }

    /**
     * QR structured append parameters.
     */
    public function setStructuredAppend(QrStructuredAppendParameters $value)
    {
        try
        {
            $this->structuredAppend = $value;
            $this->getQrParametersDto()->structuredAppend = $value->getQrStructuredAppendParametersDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * QR symbology type of BarCode's encoding mode.
     * Default value: QREncodeMode.Auto.
     * </p>
     */
    public function getEncodeMode(): int
    {
        return $this->getQrParametersDto()->encodeMode;
    }

    /**
     * <p>
     * QR symbology type of BarCode's encoding mode.
     * Default value: QREncodeMode.Auto.
     * </p>
     */
    public function setEncodeMode(int $value): void
    {
        $this->getQrParametersDto()->encodeMode = $value;
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getECIEncoding().
     */
    public function getQrECIEncoding(): int
    {
        try
        {
            return $this->getQrParametersDto()->eciEncoding;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setECIEncoding().
     */
    public function setQrECIEncoding(int $value): void
    {
        try
        {
            $this->getQrParametersDto()->eciEncoding = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR symbology type of BarCode's encoding mode.
     * Default value: QREncodeMode::AUTO.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getEncodeMode().
     */
    public function getQrEncodeMode(): int
    {
        try
        {
            return $this->getQrParametersDto()->encodeMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR symbology type of BarCode's encoding mode.
     * Default value: QREncodeMode::AUTO.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setEncodeMode().
     */
    public function setQrEncodeMode(int $value): void
    {
        try
        {
            $this->getQrParametersDto()->encodeMode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR / MicroQR selector mode. Select ForceQR for standard QR symbols, Auto for MicroQR.
     */
    public function getQrEncodeType(): int
    {
        try
        {
            return $this->getQrParametersDto()->qrEncodeType;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR / MicroQR selector mode. Select ForceQR for standard QR symbols, Auto for MicroQR.
     */
    public function setQrEncodeType(int $value): void
    {
        try
        {
            $this->getQrParametersDto()->qrEncodeType = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     *  Level of Reed-Solomon error correction for QR, MicroQR and RectMicroQR barcode.
     *  From low to high: LevelL, LevelM, LevelQ, LevelH. See QRErrorLevel.
     * </p>
     */
    public function getErrorLevel(): int
    {
        return $this->getQrParametersDto()->errorLevel;
    }

    /**
     * <p>
     *  Level of Reed-Solomon error correction for QR, MicroQR and RectMicroQR barcode.
     *  From low to high: LevelL, LevelM, LevelQ, LevelH. See QRErrorLevel.
     * </p>
     */
    public function setErrorLevel(int $value): void
    {
        $this->getQrParametersDto()->errorLevel = $value;
    }

    /**
     *  Level of Reed-Solomon error correction for QR barcode.
     *  From low to high: LEVEL_L, LEVEL_M, LEVEL_Q, LEVEL_H.
     * @see QRErrorLevel.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getErrorLevel().
     */
    public function getQrErrorLevel(): int
    {
        try
        {
            return $this->getQrParametersDto()->errorLevel;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Level of Reed-Solomon error correction for QR barcode.
     *  From low to high: LEVEL_L, LEVEL_M, LEVEL_Q, LEVEL_H.
     * @see QRErrorLevel.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setErrorLevel().
     */
    public function setQrErrorLevel(int $value): void
    {
        try
        {
            $this->getQrParametersDto()->errorLevel = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Version of QR Code.From Version1 to Version40.
     * Default value is QRVersion.Auto.
     * </p>
     */
    public function getVersion(): int
    {
        return $this->getQrParametersDto()->version;
    }

    /**
     * <p>
     * Version of QR Code.From Version1 to Version40.
     * Default value is QRVersion.Auto.
     * </p>
     */
    public function setVersion(int $value): void
    {
        $this->getQrParametersDto()->version = $value;
    }

    /**
     * Version of QR Code.
     * From Version1 to Version40 for QR code and from M1 to M4 for MicroQr.
     * Default value is QRVersion::AUTO.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getVersion().
     */
    public function getQrVersion(): int
    {
        try
        {
            return $this->getQrParametersDto()->version;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Version of QR Code.
     * From Version1 to Version40 for QR code and from M1 to M4 for MicroQr.
     * Default value is QRVersion::AUTO.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setVersion().
     */
    public function setQrVersion(int $value): void
    {
        try
        {
            $this->getQrParametersDto()->version = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Version of MicroQR Code. From version M1 to version M4.
     * Default value is MicroQRVersion.Auto.
     * </p>
     */
    public function getMicroQRVersion(): int
    {
        return $this->getQrParametersDto()->microQRVersion;
    }

    /**
     * <p>
     * Version of MicroQR Code. From version M1 to version M4.
     * Default value is MicroQRVersion.Auto.
     * </p>
     */
    public function setMicroQRVersion(int $value): void
    {
        $this->getQrParametersDto()->microQRVersion = $value;
    }

    /**
     * <p>
     * Version of RectMicroQR Code. From version R7x59 to version R17x139.
     * Default value is RectMicroQRVersion.Auto.
     * </p>
     */
    public function getRectMicroQrVersion(): int
    {
        return $this->getQrParametersDto()->rectMicroQrVersion;
    }

    /**
     * <p>
     * Version of RectMicroQR Code. From version R7x59 to version R17x139.
     * Default value is RectMicroQRVersion.Auto.
     * </p>
     */
    public function setRectMicroQrVersion(int $value): void
    {
        $this->getQrParametersDto()->rectMicroQrVersion = $value;
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return $this->getQrParametersDto()->aspectRatio;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getQrParametersDto()->aspectRatio = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this QrParameters.
     *
     * @return string that represents this QrParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->QrParameters_toString($this->getQrParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}