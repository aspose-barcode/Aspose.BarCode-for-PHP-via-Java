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

class ThriftAsposeBarcodeService_MaxiCodeStructuredSecondMessage_equals_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'obj_1',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Aspose\Barcode\Bridge\MaxiCodeSecondMessageDTO',
        ),
        2 => array(
            'var' => 'obj_2',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Aspose\Barcode\Bridge\MaxiCodeSecondMessageDTO',
        ),
    );

    /**
     * @var \Aspose\Barcode\Bridge\MaxiCodeSecondMessageDTO
     */
    public $obj_1 = null;
    /**
     * @var \Aspose\Barcode\Bridge\MaxiCodeSecondMessageDTO
     */
    public $obj_2 = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['obj_1'])) {
                $this->obj_1 = $vals['obj_1'];
            }
            if (isset($vals['obj_2'])) {
                $this->obj_2 = $vals['obj_2'];
            }
        }
    }

    public function getName()
    {
        return 'ThriftAsposeBarcodeService_MaxiCodeStructuredSecondMessage_equals_args';
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
                    if ($ftype == TType::STRUCT) {
                        $this->obj_1 = new \Aspose\Barcode\Bridge\MaxiCodeSecondMessageDTO();
                        $xfer += $this->obj_1->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->obj_2 = new \Aspose\Barcode\Bridge\MaxiCodeSecondMessageDTO();
                        $xfer += $this->obj_2->read($input);
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
        $xfer += $output->writeStructBegin('ThriftAsposeBarcodeService_MaxiCodeStructuredSecondMessage_equals_args');
        if ($this->obj_1 !== null) {
            if (!is_object($this->obj_1)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('obj_1', TType::STRUCT, 1);
            $xfer += $this->obj_1->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->obj_2 !== null) {
            if (!is_object($this->obj_2)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('obj_2', TType::STRUCT, 2);
            $xfer += $this->obj_2->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
