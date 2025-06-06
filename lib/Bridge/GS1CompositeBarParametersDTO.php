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

class GS1CompositeBarParametersDTO
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'linearComponentType',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'twoDComponentType',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        3 => array(
            'var' => 'isAllowOnlyGS1Encoding',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
    );

    /**
     * @var int
     */
    public $linearComponentType = null;
    /**
     * @var int
     */
    public $twoDComponentType = null;
    /**
     * @var bool
     */
    public $isAllowOnlyGS1Encoding = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['linearComponentType'])) {
                $this->linearComponentType = $vals['linearComponentType'];
            }
            if (isset($vals['twoDComponentType'])) {
                $this->twoDComponentType = $vals['twoDComponentType'];
            }
            if (isset($vals['isAllowOnlyGS1Encoding'])) {
                $this->isAllowOnlyGS1Encoding = $vals['isAllowOnlyGS1Encoding'];
            }
        }
    }

    public function getName()
    {
        return 'GS1CompositeBarParametersDTO';
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
                        $xfer += $input->readI32($this->linearComponentType);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->twoDComponentType);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->isAllowOnlyGS1Encoding);
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
        $xfer += $output->writeStructBegin('GS1CompositeBarParametersDTO');
        if ($this->linearComponentType !== null) {
            $xfer += $output->writeFieldBegin('linearComponentType', TType::I32, 1);
            $xfer += $output->writeI32($this->linearComponentType);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->twoDComponentType !== null) {
            $xfer += $output->writeFieldBegin('twoDComponentType', TType::I32, 2);
            $xfer += $output->writeI32($this->twoDComponentType);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->isAllowOnlyGS1Encoding !== null) {
            $xfer += $output->writeFieldBegin('isAllowOnlyGS1Encoding', TType::BOOL, 3);
            $xfer += $output->writeBool($this->isAllowOnlyGS1Encoding);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
