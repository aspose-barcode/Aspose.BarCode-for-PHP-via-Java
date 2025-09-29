<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\BarCodeExtendedParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * <p>
 * Stores extended parameters of recognized barcode
 * </p>
 */
class BarCodeExtendedParameters implements Communicator
{
    private $_oneDParameters;
    private $_code128Parameters;
    private $_qrParameters;
    private $_pdf417Parameters;
    private $_dataBarParameters;
    private $_maxiCodeParameters;
    private $_dotCodeExtendedParameters;
    private $_dataMatrixExtendedParameters;
    private $_aztecExtendedParameters;
    private $_gs1CompositeBarExtendedParameters;
    private BarCodeExtendedParametersDTO $barCodeExtendedParametersDTO;
    private $_codabarExtendedParameters;

    /**
     * @return BarCodeExtendedParametersDTO instance
     */
    private function getBarCodeExtendedParametersDTO(): BarCodeExtendedParametersDTO
    {
        return $this->barCodeExtendedParametersDTO;
    }

    /**
     * @param BarCodeExtendedParametersDTO $barCodeExtendedParametersDTO
     */
    private function setBarCodeExtendedParametersDTO(BarCodeExtendedParametersDTO $barCodeExtendedParametersDTO): void
    {
        $this->barCodeExtendedParametersDTO = $barCodeExtendedParametersDTO;
    }

    function __construct(BarCodeExtendedParametersDTO $barCodeExtendedParametersDTO)
    {
        $this->barCodeExtendedParametersDTO = $barCodeExtendedParametersDTO;
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
            $this->_oneDParameters = new OneDExtendedParameters($this->getBarCodeExtendedParametersDTO()->oneDParameters);
            $this->_code128Parameters = new Code128ExtendedParameters($this->getBarCodeExtendedParametersDTO()->code128Parameters);
            $this->_qrParameters = new QRExtendedParameters($this->getBarCodeExtendedParametersDTO()->qrParameters);
            $this->_pdf417Parameters = new Pdf417ExtendedParameters($this->getBarCodeExtendedParametersDTO()->pdf417Parameters);
            $this->_dataBarParameters = new DataBarExtendedParameters($this->getBarCodeExtendedParametersDTO()->dataBarParameters);
            $this->_maxiCodeParameters = new MaxiCodeExtendedParameters($this->getBarCodeExtendedParametersDTO()->maxiCodeParameters);
            $this->_dotCodeExtendedParameters = new DotCodeExtendedParameters($this->getBarCodeExtendedParametersDTO()->dotCodeExtendedParameters);
            $this->_dataMatrixExtendedParameters = new DataMatrixExtendedParameters($this->getBarCodeExtendedParametersDTO()->dataMatrixExtendedParameters);
            $this->_aztecExtendedParameters = new AztecExtendedParameters($this->getBarCodeExtendedParametersDTO()->aztecExtendedParameters);
            $this->_gs1CompositeBarExtendedParameters = new GS1CompositeBarExtendedParameters($this->getBarCodeExtendedParametersDTO()->gs1CompositeBarExtendedParameters);
            $this->_codabarExtendedParameters = new CodabarExtendedParameters($this->getBarCodeExtendedParametersDTO()->codabarExtendedParameters);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /** Gets a DataBar additional information DataBarExtendedParameters of recognized barcode
     * @return DataBarExtendedParameters A DataBar additional information DataBarExtendedParameters of recognized barcode
     */
    public function getDataBar(): DataBarExtendedParameters
    {
        return $this->_dataBarParameters;
    }

    /**
     * Gets a MaxiCode additional information<see cref="MaxiCodeExtendedParameters"/> of recognized barcode
     *
     * @return MaxiCodeExtendedParameters A MaxiCode additional information<see cref="MaxiCodeExtendedParameters"/> of recognized barcode
     */
    public function getMaxiCode(): MaxiCodeExtendedParameters
    {
        return $this->_maxiCodeParameters;
    }

    /**
     * <p>Gets a DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode</p>Value: A DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode
     */
    public function getDotCode(): DotCodeExtendedParameters
    {
        return $this->_dotCodeExtendedParameters;
    }

    /**
     * <p>Gets a DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode</p>Value: A DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode
     */
    public function getDataMatrix(): DataMatrixExtendedParameters
    {
        return $this->_dataMatrixExtendedParameters;
    }

    /**
     * <p>Gets a Aztec additional information{@code AztecExtendedParameters} of recognized barcode</p>Value: A Aztec additional information{@code AztecExtendedParameters} of recognized barcode
     */
    public function getAztec(): AztecExtendedParameters
    {
        return $this->_aztecExtendedParameters;
    }

    /**
     * <p>Gets a GS1CompositeBar additional information{@code GS1CompositeBarExtendedParameters} of recognized barcode</p>Value: A GS1CompositeBar additional information{@code GS1CompositeBarExtendedParameters} of recognized barcode
     */
    public function getGS1CompositeBar(): GS1CompositeBarExtendedParameters
    {
        return $this->_gs1CompositeBarExtendedParameters;
    }

    /**
     * Gets a Codabar additional information{@code CodabarExtendedParameters} of recognized barcode
     * @return CodabarExtendedParameters additional information
     */
    public function getCodabar(): CodabarExtendedParameters
    {
        return $this->_codabarExtendedParameters;
    }

    /**
     * @return OneDExtendedParameters Gets a special data OneDExtendedParameters of 1D recognized barcode Value: A special data OneDExtendedParameters of 1D recognized barcode
     */
    public function getOneD(): OneDExtendedParameters
    {
        return $this->_oneDParameters;
    }

    /**
     * @return Code128ExtendedParameters Gets a special data Code128ExtendedParameters of Code128 recognized barcode Value: A special data Code128ExtendedParameters of Code128 recognized barcode
     */
    public function getCode128(): Code128ExtendedParameters
    {
        return $this->_code128Parameters;
    }

    /**
     * @return QRExtendedParameters Gets a QR Structured Append information QRExtendedParameters of recognized barcode Value: A QR Structured Append information QRExtendedParameters of recognized barcode
     */
    public function getQR(): QRExtendedParameters
    {
        return $this->_qrParameters;
    }

    /**
     * @return Pdf417ExtendedParameters Gets a MacroPdf417 metadata information Pdf417ExtendedParameters of recognized barcode Value: A MacroPdf417 metadata information Pdf417ExtendedParameters of recognized barcode
     */
    public function getPdf417(): Pdf417ExtendedParameters
    {
        return $this->_pdf417Parameters;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified BarCodeExtendedParameters value.
     *
     * @param BarCodeExtendedParameters $obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(BarCodeExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->BarCodeExtendedParameters_equals($this->getBarCodeExtendedParametersDTO(), $obj->getBarCodeExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this BarCodeExtendedParameters.
     *
     * @return string A string that represents this BarCodeExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return $this->getBarCodeExtendedParametersDTO()->toString; // TODO need to implement
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}