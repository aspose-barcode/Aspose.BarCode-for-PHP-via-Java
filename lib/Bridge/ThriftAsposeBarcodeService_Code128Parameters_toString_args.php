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

class ThriftAsposeBarcodeService_Code128Parameters_toString_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'Code128ParametersDto',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Aspose\Barcode\Bridge\Code128ParametersDTO',
        ),
    );

    /**
     * @var \Aspose\Barcode\Bridge\Code128ParametersDTO
     */
    public $Code128ParametersDto = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['Code128ParametersDto'])) {
                $this->Code128ParametersDto = $vals['Code128ParametersDto'];
            }
        }
    }

    public function getName()
    {
        return 'ThriftAsposeBarcodeService_Code128Parameters_toString_args';
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
                        $this->Code128ParametersDto = new \Aspose\Barcode\Bridge\Code128ParametersDTO();
                        $xfer += $this->Code128ParametersDto->read($input);
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
        $xfer += $output->writeStructBegin('ThriftAsposeBarcodeService_Code128Parameters_toString_args');
        if ($this->Code128ParametersDto !== null) {
            if (!is_object($this->Code128ParametersDto)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('Code128ParametersDto', TType::STRUCT, 1);
            $xfer += $this->Code128ParametersDto->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
