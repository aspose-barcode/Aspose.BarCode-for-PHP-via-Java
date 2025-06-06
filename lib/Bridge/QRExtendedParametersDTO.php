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

class QRExtendedParametersDTO
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'qRStructuredAppendModeBarCodesQuantity',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'qRStructuredAppendModeBarCodeIndex',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        3 => array(
            'var' => 'qRStructuredAppendModeParityData',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        4 => array(
            'var' => 'empty',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        5 => array(
            'var' => 'qrVersion',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        6 => array(
            'var' => 'microQRVersion',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        7 => array(
            'var' => 'rectMicroQRVersion',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        8 => array(
            'var' => 'qrErrorLevel',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        9 => array(
            'var' => 'toString',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var int
     */
    public $qRStructuredAppendModeBarCodesQuantity = null;
    /**
     * @var int
     */
    public $qRStructuredAppendModeBarCodeIndex = null;
    /**
     * @var int
     */
    public $qRStructuredAppendModeParityData = null;
    /**
     * @var bool
     */
    public $empty = null;
    /**
     * @var int
     */
    public $qrVersion = null;
    /**
     * @var int
     */
    public $microQRVersion = null;
    /**
     * @var int
     */
    public $rectMicroQRVersion = null;
    /**
     * @var int
     */
    public $qrErrorLevel = null;
    /**
     * @var string
     */
    public $toString = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['qRStructuredAppendModeBarCodesQuantity'])) {
                $this->qRStructuredAppendModeBarCodesQuantity = $vals['qRStructuredAppendModeBarCodesQuantity'];
            }
            if (isset($vals['qRStructuredAppendModeBarCodeIndex'])) {
                $this->qRStructuredAppendModeBarCodeIndex = $vals['qRStructuredAppendModeBarCodeIndex'];
            }
            if (isset($vals['qRStructuredAppendModeParityData'])) {
                $this->qRStructuredAppendModeParityData = $vals['qRStructuredAppendModeParityData'];
            }
            if (isset($vals['empty'])) {
                $this->empty = $vals['empty'];
            }
            if (isset($vals['qrVersion'])) {
                $this->qrVersion = $vals['qrVersion'];
            }
            if (isset($vals['microQRVersion'])) {
                $this->microQRVersion = $vals['microQRVersion'];
            }
            if (isset($vals['rectMicroQRVersion'])) {
                $this->rectMicroQRVersion = $vals['rectMicroQRVersion'];
            }
            if (isset($vals['qrErrorLevel'])) {
                $this->qrErrorLevel = $vals['qrErrorLevel'];
            }
            if (isset($vals['toString'])) {
                $this->toString = $vals['toString'];
            }
        }
    }

    public function getName()
    {
        return 'QRExtendedParametersDTO';
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
                        $xfer += $input->readI32($this->qRStructuredAppendModeBarCodesQuantity);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->qRStructuredAppendModeBarCodeIndex);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->qRStructuredAppendModeParityData);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->empty);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->qrVersion);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->microQRVersion);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->rectMicroQRVersion);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->qrErrorLevel);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->toString);
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
        $xfer += $output->writeStructBegin('QRExtendedParametersDTO');
        if ($this->qRStructuredAppendModeBarCodesQuantity !== null) {
            $xfer += $output->writeFieldBegin('qRStructuredAppendModeBarCodesQuantity', TType::I32, 1);
            $xfer += $output->writeI32($this->qRStructuredAppendModeBarCodesQuantity);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->qRStructuredAppendModeBarCodeIndex !== null) {
            $xfer += $output->writeFieldBegin('qRStructuredAppendModeBarCodeIndex', TType::I32, 2);
            $xfer += $output->writeI32($this->qRStructuredAppendModeBarCodeIndex);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->qRStructuredAppendModeParityData !== null) {
            $xfer += $output->writeFieldBegin('qRStructuredAppendModeParityData', TType::I32, 3);
            $xfer += $output->writeI32($this->qRStructuredAppendModeParityData);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->empty !== null) {
            $xfer += $output->writeFieldBegin('empty', TType::BOOL, 4);
            $xfer += $output->writeBool($this->empty);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->qrVersion !== null) {
            $xfer += $output->writeFieldBegin('qrVersion', TType::I32, 5);
            $xfer += $output->writeI32($this->qrVersion);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->microQRVersion !== null) {
            $xfer += $output->writeFieldBegin('microQRVersion', TType::I32, 6);
            $xfer += $output->writeI32($this->microQRVersion);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->rectMicroQRVersion !== null) {
            $xfer += $output->writeFieldBegin('rectMicroQRVersion', TType::I32, 7);
            $xfer += $output->writeI32($this->rectMicroQRVersion);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->qrErrorLevel !== null) {
            $xfer += $output->writeFieldBegin('qrErrorLevel', TType::I32, 8);
            $xfer += $output->writeI32($this->qrErrorLevel);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->toString !== null) {
            $xfer += $output->writeFieldBegin('toString', TType::STRING, 9);
            $xfer += $output->writeString($this->toString);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
