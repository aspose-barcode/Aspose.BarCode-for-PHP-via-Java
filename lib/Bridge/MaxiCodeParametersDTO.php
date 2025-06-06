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

class MaxiCodeParametersDTO
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'maxiCodeMode',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'maxiCodeEncodeMode',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        3 => array(
            'var' => 'eCIEncoding',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        4 => array(
            'var' => 'maxiCodeStructuredAppendModeBarcodeId',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        5 => array(
            'var' => 'maxiCodeStructuredAppendModeBarcodesCount',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        6 => array(
            'var' => 'aspectRatio',
            'isRequired' => false,
            'type' => TType::DOUBLE,
        ),
    );

    /**
     * @var int
     */
    public $maxiCodeMode = null;
    /**
     * @var int
     */
    public $maxiCodeEncodeMode = null;
    /**
     * @var int
     */
    public $eCIEncoding = null;
    /**
     * @var int
     */
    public $maxiCodeStructuredAppendModeBarcodeId = null;
    /**
     * @var int
     */
    public $maxiCodeStructuredAppendModeBarcodesCount = null;
    /**
     * @var double
     */
    public $aspectRatio = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['maxiCodeMode'])) {
                $this->maxiCodeMode = $vals['maxiCodeMode'];
            }
            if (isset($vals['maxiCodeEncodeMode'])) {
                $this->maxiCodeEncodeMode = $vals['maxiCodeEncodeMode'];
            }
            if (isset($vals['eCIEncoding'])) {
                $this->eCIEncoding = $vals['eCIEncoding'];
            }
            if (isset($vals['maxiCodeStructuredAppendModeBarcodeId'])) {
                $this->maxiCodeStructuredAppendModeBarcodeId = $vals['maxiCodeStructuredAppendModeBarcodeId'];
            }
            if (isset($vals['maxiCodeStructuredAppendModeBarcodesCount'])) {
                $this->maxiCodeStructuredAppendModeBarcodesCount = $vals['maxiCodeStructuredAppendModeBarcodesCount'];
            }
            if (isset($vals['aspectRatio'])) {
                $this->aspectRatio = $vals['aspectRatio'];
            }
        }
    }

    public function getName()
    {
        return 'MaxiCodeParametersDTO';
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
                        $xfer += $input->readI32($this->maxiCodeMode);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->maxiCodeEncodeMode);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->eCIEncoding);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->maxiCodeStructuredAppendModeBarcodeId);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->maxiCodeStructuredAppendModeBarcodesCount);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::DOUBLE) {
                        $xfer += $input->readDouble($this->aspectRatio);
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
        $xfer += $output->writeStructBegin('MaxiCodeParametersDTO');
        if ($this->maxiCodeMode !== null) {
            $xfer += $output->writeFieldBegin('maxiCodeMode', TType::I32, 1);
            $xfer += $output->writeI32($this->maxiCodeMode);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->maxiCodeEncodeMode !== null) {
            $xfer += $output->writeFieldBegin('maxiCodeEncodeMode', TType::I32, 2);
            $xfer += $output->writeI32($this->maxiCodeEncodeMode);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->eCIEncoding !== null) {
            $xfer += $output->writeFieldBegin('eCIEncoding', TType::I32, 3);
            $xfer += $output->writeI32($this->eCIEncoding);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->maxiCodeStructuredAppendModeBarcodeId !== null) {
            $xfer += $output->writeFieldBegin('maxiCodeStructuredAppendModeBarcodeId', TType::I32, 4);
            $xfer += $output->writeI32($this->maxiCodeStructuredAppendModeBarcodeId);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->maxiCodeStructuredAppendModeBarcodesCount !== null) {
            $xfer += $output->writeFieldBegin('maxiCodeStructuredAppendModeBarcodesCount', TType::I32, 5);
            $xfer += $output->writeI32($this->maxiCodeStructuredAppendModeBarcodesCount);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->aspectRatio !== null) {
            $xfer += $output->writeFieldBegin('aspectRatio', TType::DOUBLE, 6);
            $xfer += $output->writeDouble($this->aspectRatio);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
