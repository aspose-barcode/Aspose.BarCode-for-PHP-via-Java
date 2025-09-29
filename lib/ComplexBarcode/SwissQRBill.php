<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * SwissQR bill data
 */
final class SwissQRBill implements Communicator
{
    private $swissQRBillDto;

    /**
     * @return mixed
     */
    public function getSwissQRBillDto(): \Aspose\Barcode\Bridge\SwissQRBillDTO
    {
        return $this->swissQRBillDto;
    }

    /**
     * @param mixed $swissQRBillDto
     */
    public function setSwissQRBillDto(\Aspose\Barcode\Bridge\SwissQRBillDTO $swissQRBillDto): void
    {
        $this->swissQRBillDto = $swissQRBillDto;
    }


    private $creditor;
    private $debtor;


    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto()
    {
        try
        {
            $this->creditor = Address::construct($this->getSwissQRBillDto()->creditor);
            $this->debtor = Address::construct($this->getSwissQRBillDto()->debtor);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function __construct(\Aspose\Barcode\Bridge\SwissQRBillDTO $swissQRBillDto)
    {
        try
        {
            $this->swissQRBillDto = $swissQRBillDto;
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function convertAlternativeSchemes($javaAlternativeSchemes)
    {
        try
        {
            $alternativeSchemes = array();
            for ($i = 0; $i < sizeof($javaAlternativeSchemes); $i++)
            {
                $alternativeSchemes[$i] = AlternativeScheme::construct($javaAlternativeSchemes[$i]);
            }
            return $alternativeSchemes;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the version of the SwissQR bill standard.
     * Value: The SwissQR bill standard version.
     */
    public function getVersion(): int
    {
        try
        {
            return $this->getSwissQRBillDto()->version;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the version of the SwissQR bill standard.
     * Value: The SwissQR bill standard version.
     */
    public function setVersion(int $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->version = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the payment amount.
     *
     * Valid values are between 0.01 and 999,999,999.99.
     *
     * Value: The payment amount.
     */
    public function getAmount(): float
    {
        try
        {
            return $this->getSwissQRBillDto()->amount;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the payment amount.
     *
     * Valid values are between 0.01 and 999,999,999.99.
     *
     * Value: The payment amount.
     */
    public function setAmount(float $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->amount = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the payment currency.
     *
     * Valid values are "CHF" and "EUR".
     *
     * Value: The payment currency.
     */
    public function getCurrency(): string
    {
        try
        {
            return $this->getSwissQRBillDto()->currency;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the payment currency.
     *
     * Valid values are "CHF" and "EUR".
     *
     * Value: The payment currency.
     */
    public function setCurrency(string $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->currency = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the creditor's account number.
     *
     * Account numbers must be valid IBANs of a bank of Switzerland or
     * Liechtenstein. Spaces are allowed in the account number.
     *
     * Value: The creditor account number.
     */
    public function getAccount(): ?string
    {
        try
        {
            return $this->getSwissQRBillDto()->account;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the creditor's account number.
     *
     * Account numbers must be valid IBANs of a bank of Switzerland or
     * Liechtenstein. Spaces are allowed in the account number.
     * @param string $value Value: The creditor account number.
     * @throws BarcodeException
     */
    public function setAccount(string $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->account = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the creditor address.
     * @return Address The creditor address.
     */
    public function getCreditor(): Address
    {
        return $this->creditor;
    }

    /**
     * Sets the creditor address.
     * @param Address $value The creditor address.
     * @throws BarcodeException
     */
    public function setCreditor(Address $value): void
    {
        try
        {
            $this->creditor = $value;
            $this->getSwissQRBillDto()->creditor = $value->getAddressDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the creditor payment reference.
     *
     * The reference is mandatory for SwissQR IBANs, i.e.IBANs in the range
     * CHxx30000xxxxxx through CHxx31999xxxxx.
     *
     * If specified, the reference must be either a valid SwissQR reference
     * (corresponding to ISR reference form) or a valid creditor reference
     * according to ISO 11649 ("RFxxxx"). Both may contain spaces for formatting.
     *
     * @return string The creditor payment reference.
     */
    public function getReference(): string
    {
        try
        {
            return $this->getSwissQRBillDto()->reference;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the creditor payment reference.
     *
     * The reference is mandatory for SwissQR IBANs, i.e.IBANs in the range
     * CHxx30000xxxxxx through CHxx31999xxxxx.
     *
     * If specified, the reference must be either a valid SwissQR reference
     * (corresponding to ISR reference form) or a valid creditor reference
     * according to ISO 11649 ("RFxxxx"). Both may contain spaces for formatting.
     *
     * @param string $value The creditor payment reference.
     */
    public function setReference(string $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->reference = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Creates and sets a ISO11649 creditor reference from a raw string by prefixing
     * the String with "RF" and the modulo 97 checksum.
     *
     * Whitespace is removed from the reference
     *
     * @exception ArgumentException rawReference contains invalid characters.
     * @param string $rawReference The raw reference.
     */
    public function createAndSetCreditorReference(string $rawReference): void
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $this->setSwissQRBillDto($client->SwissQRBill_createAndSetCreditorReference($this->getSwissQRBillDto(), $rawReference));
            $thriftConnection->closeConnection();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the debtor address.
     *
     * The debtor is optional. If it is omitted, both setting this field to
     * null or setting an address with all null or empty values is ok.
     *
     * return Address The debtor address.
     */
    public function getDebtor(): Address
    {
        return $this->debtor;
    }

    /**
     * Sets the debtor address.
     *
     * The debtor is optional. If it is omitted, both setting this field to
     * null or setting an address with all null or empty values is ok.
     *
     * @param Address The debtor address.
     */
    public function setDebtor(Address $value): void
    {
        try
        {
            $this->debtor = $value;
            $this->getSwissQRBillDto()->debtor = $value->getAddressDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the additional unstructured message.
     * @return string The unstructured message.
     */
    public function getUnstructuredMessage(): string
    {
        try
        {
            return $this->getSwissQRBillDto()->UnstructuredMessage;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the additional unstructured message.
     * @param string $value The unstructured message.
     */
    public function setUnstructuredMessage(string $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->UnstructuredMessage = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the additional structured bill information.
     * @return string The structured bill information.
     */
    public function getBillInformation(): string
    {
        try
        {
            return $this->getSwissQRBillDto()->billInformation;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the additional structured bill information.
     * @param string The structured bill information.
     */
    public function setBillInformation(string $value): void
    {
        try
        {
            $this->getSwissQRBillDto()->billInformation = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets ors sets the alternative payment schemes.
     *
     * A maximum of two schemes with parameters are allowed.
     *
     * @return array The alternative payment schemes.
     */
    public function getAlternativeSchemes(): array
    {
        try
        {
            return self::convertAlternativeSchemes($this->getSwissQRBillDto()->alternativeSchemes);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets ors sets the alternative payment schemes.
     *
     * A maximum of two schemes with parameters are allowed.
     *
     * @param AlternativeScheme[] $alternativeSchemes
     */
    public function setAlternativeSchemes(array $alternativeSchemes): void
    {
        try
        {
            $dto = $this->getSwissQRBillDto();

            if (!is_array($dto->alternativeSchemes))
            {
                $dto->alternativeSchemes = [];
            }

            foreach ($alternativeSchemes as $value)
            {
                $dto->alternativeSchemes[] = $value->getAlternativeSchemeDto();
            }
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }


    /**
     * Determines whether the specified object is equal to the current object.
     * @param SwissQRBill $obj The object to compare with the current object.
     * @return bool true if the specified object is equal to the current object; otherwise, false.
     */
    public function equals(SwissQRBill $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->SwissQRBill_equals($this->getSwissQRBillDto(), $obj->getSwissQRBillDto());
        $thriftConnection->closeConnection();

        return $isEquals;
    }
}