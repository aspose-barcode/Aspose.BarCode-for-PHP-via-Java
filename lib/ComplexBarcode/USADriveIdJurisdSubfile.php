<?php
namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
* <p>
    * Class for Jurisdiction specific fields for USA DL
    * </p>
*/
class USADriveIdJurisdSubfile  implements Communicator
{
    private $usaDriveIdJurisdSubfileDto;

    /**
     * @return mixed
     */
    public function getUSADriveIdJurisdSubfileDto(): \Aspose\Barcode\Bridge\USADriveIdJurisdSubfileDTO
    {
        return $this->usaDriveIdJurisdSubfileDto;
    }

    /**
     * @param mixed $addressDto
     */
    public function setUSADriveIdJurisdSubfileDto(\Aspose\Barcode\Bridge\USADriveIdJurisdSubfileDTO $usaDriveIdJurisdSubfileDto): void
    {
        $this->usaDriveIdJurisdSubfileDto = $usaDriveIdJurisdSubfileDto;
    }

    public function __construct()
    {
        $this->usaDriveIdJurisdSubfileDto = $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public static function _internal_construct($nativeObject)
    {
        $obj = new USADriveIdJurisdSubfile();
        $obj->usaDriveIdJurisdSubfileDto = $nativeObject;

        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $usaDriveIdJurisdSubfileDTO = $client->USADriveIdJurisdSubfilet_ctor();
        $thriftConnection->closeConnection();
        return $usaDriveIdJurisdSubfileDTO;
    }

    public function initFieldsFromDto()
    {
        // TODO: Implement initFieldsFromDto() method.
    }

    /**
    * <p>
    * Indexing by 3-letter element id
    * </p>
    * @return DataElement DataElement
    * @param string|int  id 3-letter element id
    */
    public function get_Item($key) : ?DataElement
    {
        if (is_string($key)) {
            foreach ($this->getUSADriveIdJurisdSubfileDto()->dataElements as $element) {
                if ($element->elementID == $key)
                    return DataElement::_internal_construct($element);
            }
        }
        else
            return $this->getUSADriveIdJurisdSubfileDto()->dataElements[$key];
        return null;
    }

    private static function data_element_array_search(array $array, $item)
    {
        foreach ($array as $key => $value) {
            if ($value->elementID == $item) {
                return $key;
            }
        }

        return false;
    }

    /**
    * <p>
    * Indexing by 3-letter element id
    * </p>
    * @param string|int id 3-letter element id
    */
    public function set_Item($key, DataElement $value) : void
    {
        if (is_string($key))
        {
            $index = USADriveIdJurisdSubfile::data_element_array_search($this->getUSADriveIdJurisdSubfileDto()->dataElements, $key);

            if ($index !== false)
            {
                array_push($this->getUSADriveIdJurisdSubfileDto()->dataElements, new DataElement($value->getDataElementDto()));
            }
            else
            {
                array_push($this->getUSADriveIdJurisdSubfileDto()->dataElements, $value);
            }
        }
        else
        {
            $this->getUSADriveIdJurisdSubfileDto()->dataElements[$key] = $value;
        }
    }

    /**
     * Searches for a data element by 3-letter id.
     *
     * @param string $id 3-letter id
     * @param bool $is_open_or_create If true, it will be created if not found
     * @return DataElement|null Found data element (or null if not found and not created)
     */
    public final function findDataElement(string $id, bool $is_open_or_create): ?DataElement
    {
        for ($i = 0, $n = sizeof($this->getUSADriveIdJurisdSubfileDto()->dataElements); $i < $n; $i++) {
            $x = $this->$this->getUSADriveIdJurisdSubfileDto()->dataElements[$i];
            if ($x !== null && $x->getElementID() === $id) {
                return $x;
            }
        }

        if (!$is_open_or_create)
        {
            return null;
        }

        $new_el = new DataElement();
        $new_el->setElementID($id);
        array_push($this->getUSADriveIdJurisdSubfileDto()->dataElements, $new_el);

        return $new_el;
    }

    /**
    * <p>
        * Returns number of data elements
        * </p>
    */
    public function size() : int
    {
        return  sizeof($this->getUSADriveIdJurisdSubfileDto()->dataElements);
    }

    /**
    * <p>
        * Clears all data elements
        * </p>
    */
    public function clear() : void
    {
        $this->getUSADriveIdJurisdSubfileDto()->dataElements = [];
    }

    /**
    * <p>
        * Tries to remove element at index
        * </p>
    * @return bool true if successful, false if out of range
    * @param int|string index index number
    */
    public function remove($index) : bool
    {
        if(is_string($index))
        {
            for ($i = 0, $n =sizeof($this->getUSADriveIdJurisdSubfileDto()->dataElements); $i < $n; $i++)
            {
                $x = $this->getUSADriveIdJurisdSubfileDto()->dataElements[$i];
                if ($x !== null && $x->getElementID() === $index) {
                    array_splice($this->getUSADriveIdJurisdSubfileDto()->dataElements, $i, 1);
                    return true;
                }
            }

            return false;
        }
        else
        {
            array_splice($this->getUSADriveIdJurisdSubfileDto()->dataElements, $index, 1);
            return true;
        }
    }

    /**
     * Inserts a DataElement at the specified index, or replaces an existing element
     * if an entry with the same ElementID is already present.
     *
     * @param int $index
     * @param DataElement $node
     * @return DataElement
     */
    public final function insert(int $index, DataElement $node): DataElement
    {
        for ($i = 0, $n = sizeof($this->getUSADriveIdJurisdSubfileDto()->dataElements); $i < $n; $i++)
        {
            $x = $this->getUSADriveIdJurisdSubfileDto()->dataElements[$i];
            if ($x !== null && $x->getElementID() === $node->getElementID())
            {
                array_splice($this->getUSADriveIdJurisdSubfileDto()->dataElements, $index, 0, [$node]);

                return $node;
            }
        }
        array_splice($this->getUSADriveIdJurisdSubfileDto()->dataElements, $index, 0, [$node]);
        return $this->getUSADriveIdJurisdSubfileDto()->dataElements[$index];
    }

    /**
     * Adds a new DataElement or replaces it if ElementID already exists.
     *
     * @param DataElement $node DataElement to add
     * @return DataElement Added/replaced data element
     */
    public final function addOrReplaceDataElement(DataElement $node): DataElement
    {
        for ($i = 0, $n = sizeof($this->getUSADriveIdJurisdSubfileDto()->dataElements); $i < $n; $i++)
        {
            $x = $this->$this->getUSADriveIdJurisdSubfileDto()->dataElements[$i];
            if ($x !== null && $x->getElementID() === $node->getElementID())
            {
                $this->getUSADriveIdJurisdSubfileDto()->dataElements[$i] = $node;
                return $node;
            }
        }

        // Not found -> add new
        array_push($this->getUSADriveIdJurisdSubfileDto()->dataElements, $node);
        return $node;
    }

    /**
     * Adds a new DataElement with the specified identifier and value,
     * or replaces (updates) the existing element if an entry with the same ElementID is already present.
     *
     * @param string $id    A 3-letter identifier that uniquely specifies the jurisdiction-related data element.
     * @param string $value The text value assigned to the data element; overwrites the existing one if the element already exists.
     * @return DataElement  The DataElement instance that was added to the collection or updated in place.
     */
    public final function addOrReplace(string $id, string $value): DataElement
    {
        // Try to find an existing element by ElementID
        for ($i = 0, $n = sizeof($this->getUSADriveIdJurisdSubfileDto()->dataElements); $i < $n; $i++) {
            /** @var DataElement $x */
            $x = $this->getUSADriveIdJurisdSubfileDto()->dataElements[$i];
            if ($x !== null && $x->elementID === $id) {
                $x->setValue($value);
                return $x;
            }
        }

        $tmp = new DataElement();
        $tmp->setElementID($id);
        $tmp->setValue($value);

        array_push($this->getUSADriveIdJurisdSubfileDto()->dataElements, $tmp->getDataElementDto());

        return DataElement::_internal_construct($this->getUSADriveIdJurisdSubfileDto()->dataElements[sizeof($this->getUSADriveIdJurisdSubfileDto()->dataElements) - 1]);
    }
}