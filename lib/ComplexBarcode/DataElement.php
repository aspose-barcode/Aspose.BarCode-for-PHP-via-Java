<?php
namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Bridge\DataElementDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
* <p>
    * Represents a jurisdiction-specific data field used in documents,
    * for example ElementID = "ZVA" with Value = "01".
    * </p>
*/
class DataElement implements Communicator
{
    private $dataElementDto;

    /**
     * @return mixed
     */
    public function getDataElementDto(): \Aspose\Barcode\Bridge\DataElementDTO
    {
        return $this->dataElementDto;
    }

    /**
     * @param mixed $dataElementDto
     */
    public function setDataElementDto(\Aspose\Barcode\Bridge\DataElementDTO $dataElementDto): void
    {
        $this->dataElementDto = $dataElementDto;
    }

    public function __construct()
    {
        $this->dataElementDto = $this->obtainDto();
    }

    public static function _internal_construct(DataElementDTO $nativeObject)
    {
        $dataElement = new DataElement();
        $dataElement->dataElementDto = $nativeObject;

        return $dataElement;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dataElementDTO = $client->DataElement_ctor();
        $thriftConnection->closeConnection();
        return $dataElementDTO;
    }

    public function initFieldsFromDto()
    {
        // TODO: Implement initFieldsFromDto() method.
    }

    /**
    * <p>
        * A 3-character code that identifies the jurisdiction-specific field, e.g., "ZVA".
        * </p>
    */
    public function getElementID() : string
    {
        return $this->dataElementDto->elementID;
    }
    /**
    * <p>
        * A 3-character code that identifies the jurisdiction-specific field, e.g., "ZVA".
        * </p>
    */
    public function setElementID(string $value) : void
    {
        $this->dataElementDto->elementID = ($value);
    }
    /**
    * <p>
        * The text value associated with the field, typically defined by jurisdiction rules.
        * </p>
    */
    public function getValue() : string
    {
        return $this->dataElementDto->value;
    }

    /**
     * <p>
     * The text value associated with the field, typically defined by jurisdiction rules.
     * </p>
     */
    public function setValue(string $value) : void
    {
        $this->dataElementDto->value = ($value);
    }
}