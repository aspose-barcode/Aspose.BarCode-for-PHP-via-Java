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

class SecondaryAndAdditionalDataDTO
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'expiryDateFormat',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'expiryDate',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        3 => array(
            'var' => 'lotNumber',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'serialNumber',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'dateOfManufacture',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        6 => array(
            'var' => 'quantity',
            'isRequired' => false,
            'type' => TType::I32,
        ),
    );

    /**
     * @var int
     */
    public $expiryDateFormat = null;
    /**
     * @var int
     */
    public $expiryDate = null;
    /**
     * @var string
     */
    public $lotNumber = null;
    /**
     * @var string
     */
    public $serialNumber = null;
    /**
     * @var int
     */
    public $dateOfManufacture = null;
    /**
     * @var int
     */
    public $quantity = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['expiryDateFormat'])) {
                $this->expiryDateFormat = $vals['expiryDateFormat'];
            }
            if (isset($vals['expiryDate'])) {
                $this->expiryDate = $vals['expiryDate'];
            }
            if (isset($vals['lotNumber'])) {
                $this->lotNumber = $vals['lotNumber'];
            }
            if (isset($vals['serialNumber'])) {
                $this->serialNumber = $vals['serialNumber'];
            }
            if (isset($vals['dateOfManufacture'])) {
                $this->dateOfManufacture = $vals['dateOfManufacture'];
            }
            if (isset($vals['quantity'])) {
                $this->quantity = $vals['quantity'];
            }
        }
    }

    public function getName()
    {
        return 'SecondaryAndAdditionalDataDTO';
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
                        $xfer += $input->readI32($this->expiryDateFormat);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->expiryDate);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->lotNumber);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->serialNumber);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->dateOfManufacture);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->quantity);
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
        $xfer += $output->writeStructBegin('SecondaryAndAdditionalDataDTO');
        if ($this->expiryDateFormat !== null) {
            $xfer += $output->writeFieldBegin('expiryDateFormat', TType::I32, 1);
            $xfer += $output->writeI32($this->expiryDateFormat);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->expiryDate !== null) {
            $xfer += $output->writeFieldBegin('expiryDate', TType::I32, 2);
            $xfer += $output->writeI32($this->expiryDate);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->lotNumber !== null) {
            $xfer += $output->writeFieldBegin('lotNumber', TType::STRING, 3);
            $xfer += $output->writeString($this->lotNumber);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->serialNumber !== null) {
            $xfer += $output->writeFieldBegin('serialNumber', TType::STRING, 4);
            $xfer += $output->writeString($this->serialNumber);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dateOfManufacture !== null) {
            $xfer += $output->writeFieldBegin('dateOfManufacture', TType::I32, 5);
            $xfer += $output->writeI32($this->dateOfManufacture);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->quantity !== null) {
            $xfer += $output->writeFieldBegin('quantity', TType::I32, 6);
            $xfer += $output->writeI32($this->quantity);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
