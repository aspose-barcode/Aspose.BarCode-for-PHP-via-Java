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

class ThriftAsposeBarcodeService_Code128DataPortion_toString_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'code128DataPortionDTO',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Aspose\Barcode\Bridge\Code128DataPortionDTO',
        ),
    );

    /**
     * @var \Aspose\Barcode\Bridge\Code128DataPortionDTO
     */
    public $code128DataPortionDTO = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['code128DataPortionDTO'])) {
                $this->code128DataPortionDTO = $vals['code128DataPortionDTO'];
            }
        }
    }

    public function getName()
    {
        return 'ThriftAsposeBarcodeService_Code128DataPortion_toString_args';
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
                        $this->code128DataPortionDTO = new \Aspose\Barcode\Bridge\Code128DataPortionDTO();
                        $xfer += $this->code128DataPortionDTO->read($input);
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
        $xfer += $output->writeStructBegin('ThriftAsposeBarcodeService_Code128DataPortion_toString_args');
        if ($this->code128DataPortionDTO !== null) {
            if (!is_object($this->code128DataPortionDTO)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('code128DataPortionDTO', TType::STRUCT, 1);
            $xfer += $this->code128DataPortionDTO->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
