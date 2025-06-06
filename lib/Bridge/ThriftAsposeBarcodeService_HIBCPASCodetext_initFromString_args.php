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

class ThriftAsposeBarcodeService_HIBCPASCodetext_initFromString_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'HIBCPASCodetext',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Aspose\Barcode\Bridge\IComplexCodetextDTO',
        ),
        2 => array(
            'var' => 'constructedCodetext',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var \Aspose\Barcode\Bridge\IComplexCodetextDTO
     */
    public $HIBCPASCodetext = null;
    /**
     * @var string
     */
    public $constructedCodetext = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['HIBCPASCodetext'])) {
                $this->HIBCPASCodetext = $vals['HIBCPASCodetext'];
            }
            if (isset($vals['constructedCodetext'])) {
                $this->constructedCodetext = $vals['constructedCodetext'];
            }
        }
    }

    public function getName()
    {
        return 'ThriftAsposeBarcodeService_HIBCPASCodetext_initFromString_args';
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
                        $this->HIBCPASCodetext = new \Aspose\Barcode\Bridge\IComplexCodetextDTO();
                        $xfer += $this->HIBCPASCodetext->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->constructedCodetext);
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
        $xfer += $output->writeStructBegin('ThriftAsposeBarcodeService_HIBCPASCodetext_initFromString_args');
        if ($this->HIBCPASCodetext !== null) {
            if (!is_object($this->HIBCPASCodetext)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('HIBCPASCodetext', TType::STRUCT, 1);
            $xfer += $this->HIBCPASCodetext->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->constructedCodetext !== null) {
            $xfer += $output->writeFieldBegin('constructedCodetext', TType::STRING, 2);
            $xfer += $output->writeString($this->constructedCodetext);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
