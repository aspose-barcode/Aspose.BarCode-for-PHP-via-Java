<?php
namespace Aspose\Barcode\Bridge;

/**
 * Autogenerated by Thrift Compiler (0.20.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class AddressDTO
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'type',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'name',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'addressLine1',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'addressLine2',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'street',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        6 => array(
            'var' => 'houseNo',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        7 => array(
            'var' => 'postalCode',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        8 => array(
            'var' => 'town',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        9 => array(
            'var' => 'countryCode',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var int
     */
    public $type = null;
    /**
     * @var string
     */
    public $name = null;
    /**
     * @var string
     */
    public $addressLine1 = null;
    /**
     * @var string
     */
    public $addressLine2 = null;
    /**
     * @var string
     */
    public $street = null;
    /**
     * @var string
     */
    public $houseNo = null;
    /**
     * @var string
     */
    public $postalCode = null;
    /**
     * @var string
     */
    public $town = null;
    /**
     * @var string
     */
    public $countryCode = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['type'])) {
                $this->type = $vals['type'];
            }
            if (isset($vals['name'])) {
                $this->name = $vals['name'];
            }
            if (isset($vals['addressLine1'])) {
                $this->addressLine1 = $vals['addressLine1'];
            }
            if (isset($vals['addressLine2'])) {
                $this->addressLine2 = $vals['addressLine2'];
            }
            if (isset($vals['street'])) {
                $this->street = $vals['street'];
            }
            if (isset($vals['houseNo'])) {
                $this->houseNo = $vals['houseNo'];
            }
            if (isset($vals['postalCode'])) {
                $this->postalCode = $vals['postalCode'];
            }
            if (isset($vals['town'])) {
                $this->town = $vals['town'];
            }
            if (isset($vals['countryCode'])) {
                $this->countryCode = $vals['countryCode'];
            }
        }
    }

    public function getName()
    {
        return 'AddressDTO';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->type);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->name);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->addressLine1);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->addressLine2);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->street);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->houseNo);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->postalCode);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->town);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->countryCode);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('AddressDTO');
        if ($this->type !== null) {
            $xfer += $output->writeFieldBegin('type', TType::I32, 1);
            $xfer += $output->writeI32($this->type);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->name !== null) {
            $xfer += $output->writeFieldBegin('name', TType::STRING, 2);
            $xfer += $output->writeString($this->name);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->addressLine1 !== null) {
            $xfer += $output->writeFieldBegin('addressLine1', TType::STRING, 3);
            $xfer += $output->writeString($this->addressLine1);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->addressLine2 !== null) {
            $xfer += $output->writeFieldBegin('addressLine2', TType::STRING, 4);
            $xfer += $output->writeString($this->addressLine2);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->street !== null) {
            $xfer += $output->writeFieldBegin('street', TType::STRING, 5);
            $xfer += $output->writeString($this->street);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->houseNo !== null) {
            $xfer += $output->writeFieldBegin('houseNo', TType::STRING, 6);
            $xfer += $output->writeString($this->houseNo);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->postalCode !== null) {
            $xfer += $output->writeFieldBegin('postalCode', TType::STRING, 7);
            $xfer += $output->writeString($this->postalCode);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->town !== null) {
            $xfer += $output->writeFieldBegin('town', TType::STRING, 8);
            $xfer += $output->writeString($this->town);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->countryCode !== null) {
            $xfer += $output->writeFieldBegin('countryCode', TType::STRING, 9);
            $xfer += $output->writeString($this->countryCode);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
