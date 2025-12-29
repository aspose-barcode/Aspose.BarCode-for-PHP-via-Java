<?php
namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
* <p>
    * USA DL subfile properties, offset and length are set automatically.
    * </p>
*/
class SubfileProperties implements Communicator
{
    private $subfilePropertiesDto;

    /**
     * @return mixed
     */
    public function getSubfilePropertiesDto(): \Aspose\Barcode\Bridge\SubfilePropertiesDTO
    {
        return $this->subfilePropertiesDto;
    }

    public function setSubfilePropertiesDto(\Aspose\Barcode\Bridge\SubfilePropertiesDTO $subfilePropertiesDto): void
    {
        $this->subfilePropertiesDto = $subfilePropertiesDto;
    }

    public function __construct($type)
    {
        $this->subfilePropertiesDto = $this->obtainDto($type);
        $this->initFieldsFromDto();
    }

    public static function _internal_construct($dtoObject)
    {
        $obj = new SubfileProperties("");
        $obj->subfilePropertiesDto = ($dtoObject);

        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $mandatoryFieldsDTO = $client->SubfileProperties_ctor($args[0]);
        $thriftConnection->closeConnection();
        return $mandatoryFieldsDTO;
    }

    public function initFieldsFromDto()
    {
        // TODO: Implement initFieldsFromDto() method.
    }

    /**
     * <p>
     * 2 byte type of subfile, like "DL"
     * </p>
     */
    public function getType() : string
    {
        return $this->subfilePropertiesDto->type;
    }
    /**
     * <p>
     * 2 byte type of subfile, like "DL"
     * </p>
     */
    public function setType(string $value) : string
    {
        $this->subfilePropertiesDto->type = $value;
    }

    /**
     * <p>
     * 4 digit numeric value that specifies
     * the number of bytes from the head or beginning of the file to where
     * the data related to the particular sub-file is located.The first byte in
     * the file is located at offset 0.
     * </p>
     */
    public function getOffset() : int
    {
        return $this->subfilePropertiesDto->offset;
    }
    /**
     * <p>
     * 4 digit numeric value that specifies
     * the number of bytes from the head or beginning of the file to where
     * the data related to the particular sub-file is located.The first byte in
     * the file is located at offset 0.
     * </p>
     */
    public function setOffset(int $value) : string
    {
        $this->subfilePropertiesDto->offset = ($value);
    }
    /**
     * <p>
     * 4 These bytes contain a 4 digit numeric value that specifies
     * the length of the Subfile in bytes.The segment terminator must be
     * included in calculating the length of the subfile.A segment terminator
     * = 1. Each subfile must begin with the two-character Subfile Type and
     * these two characters must also be included in the length.
     * </p>
     */
    public function getLength() : int
    {
        return $this->subfilePropertiesDto->length;
    }
    /**
     * <p>
     * 4 These bytes contain a 4 digit numeric value that specifies
     * the length of the Subfile in bytes.The segment terminator must be
     * included in calculating the length of the subfile.A segment terminator
     * = 1. Each subfile must begin with the two-character Subfile Type and
     * these two characters must also be included in the length.
     * </p>
     */
    public function setLength(int $value) : string
    {
        $this->subfilePropertiesDto->length = ($value);
    }
}