<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\QrParametersDTO;
use Exception;
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
     * <p>Gets or sets a value indicating whether GS1 special characters should be encoded in Byte mode for QR and RectMicroQR barcodes.</p>
     * <p>If false, GS1 separators may be encoded as '%' in Alphanumeric mode according to QR specification.</p>
     * <p>If true, GS1 group separators are encoded in Byte mode as the 0x1D character, and '%' characters are also encoded in Byte mode to preserve them as data.</p>
     * <p>This option may improve compatibility with decoders that expect byte-level GS1 group separators and prevents '%' data characters from being interpreted as GS1 separators.</p>
     * </p>
     *
     * @return a value indicating whether GS1 special characters should be encoded in Byte mode for QR and RectMicroQR barcodes.
     */
    public function getEncodeGS1SeparatorInByteMode() : bool
    {
        return $this->getQrParametersDto()->encodeGS1SeparatorInByteMode;
    }

    /**
     * <p>
     * <p>Gets or sets a value indicating whether GS1 special characters should be encoded in Byte mode for QR and RectMicroQR barcodes.</p>
     * <p>If false, GS1 separators may be encoded as '%' in Alphanumeric mode according to QR specification.</p>
     * <p>If true, GS1 group separators are encoded in Byte mode as the 0x1D character, and '%' characters are also encoded in Byte mode to preserve them as data.</p>
     * <p>This option may improve compatibility with decoders that expect byte-level GS1 group separators and prevents '%' data characters from being interpreted as GS1 separators.</p>
     * </p>
     *
     * @param value a value indicating whether GS1 special characters should be encoded in Byte mode for QR and RectMicroQR barcodes.
     */
    public function setEncodeGS1SeparatorInByteMode(bool $value) : void
    {
        $this->getQrParametersDto()->encodeGS1SeparatorInByteMode = $value;
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