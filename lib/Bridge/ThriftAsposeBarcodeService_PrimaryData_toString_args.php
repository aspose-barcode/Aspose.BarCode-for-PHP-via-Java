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

class ThriftAsposeBarcodeService_PrimaryData_toString_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'primaryDataDTO',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Aspose\Barcode\Bridge\PrimaryDataDTO',
        ),
    );

    /**
     * @var \Aspose\Barcode\Bridge\PrimaryDataDTO
     */
    public $primaryDataDTO = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['primaryDataDTO'])) {
                $this->primaryDataDTO = $vals['primaryDataDTO'];
            }
        }
    }

    public function getName()
    {
        return 'ThriftAsposeBarcodeService_PrimaryData_toString_args';
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
                        $this->primaryDataDTO = new \Aspose\Barcode\Bridge\PrimaryDataDTO();
                        $xfer += $this->primaryDataDTO->read($input);
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
        $xfer += $output->writeStructBegin('ThriftAsposeBarcodeService_PrimaryData_toString_args');
        if ($this->primaryDataDTO !== null) {
            if (!is_object($this->primaryDataDTO)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('primaryDataDTO', TType::STRUCT, 1);
            $xfer += $this->primaryDataDTO->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
