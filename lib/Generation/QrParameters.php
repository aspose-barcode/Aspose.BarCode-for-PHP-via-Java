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
     * Extended Channel Interpretation Identifiers. It is used to tell the barcode reader details
     * about the used references for encoding the data in the symbol.
     * Current implementation consists all well known charset encodings.
     */
    public function getQrECIEncoding(): int
    {
        try
        {
            return $this->getQrParametersDto()->qrECIEncoding;
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
     */
    public function setQrECIEncoding(int $value): void
    {
        try
        {
            $this->getQrParametersDto()->qrECIEncoding = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR symbology type of BarCode's encoding mode.
     * Default value: QREncodeMode::AUTO.
     */
    public function getQrEncodeMode(): int
    {
        try
        {
            return $this->getQrParametersDto()->qrEncodeMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * QR symbology type of BarCode's encoding mode.
     * Default value: QREncodeMode::AUTO.
     */
    public function setQrEncodeMode(int $value): void
    {
        try
        {
            $this->getQrParametersDto()->qrEncodeMode = $value;
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
     *  Level of Reed-Solomon error correction for QR barcode.
     *  From low to high: LEVEL_L, LEVEL_M, LEVEL_Q, LEVEL_H.
     * @see QRErrorLevel.
     */
    public function getQrErrorLevel(): int
    {
        try
        {
            return $this->getQrParametersDto()->qrErrorLevel;
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
     */
    public function setQrErrorLevel(int $value): void
    {
        try
        {
            $this->getQrParametersDto()->qrErrorLevel = $value;
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
     */
    public function getQrVersion(): int
    {
        try
        {
            return $this->getQrParametersDto()->qrVersion;
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
     */
    public function setQrVersion(int $value): void
    {
        try
        {
            $this->getQrParametersDto()->qrVersion = $value;
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