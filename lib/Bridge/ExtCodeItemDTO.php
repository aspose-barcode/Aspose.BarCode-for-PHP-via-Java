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

class ExtCodeItemDTO
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'extCodeItemType',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'arguments',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
    );

    /**
     * @var int
     */
    public $extCodeItemType = null;
    /**
     * @var string[]
     */
    public $arguments = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['extCodeItemType'])) {
                $this->extCodeItemType = $vals['extCodeItemType'];
            }
            if (isset($vals['arguments'])) {
                $this->arguments = $vals['arguments'];
            }
        }
    }

    public function getName()
    {
        return 'ExtCodeItemDTO';
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
                        $xfer += $input->readI32($this->extCodeItemType);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->arguments = array();
                        $_size42 = 0;
                        $_etype45 = 0;
                        $xfer += $input->readListBegin($_etype45, $_size42);
                        for ($_i46 = 0; $_i46 < $_size42; ++$_i46) {
                            $elem47 = null;
                            $xfer += $input->readString($elem47);
                            $this->arguments []= $elem47;
                        }
                        $xfer += $input->readListEnd();
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
        $xfer += $output->writeStructBegin('ExtCodeItemDTO');
        if ($this->extCodeItemType !== null) {
            $xfer += $output->writeFieldBegin('extCodeItemType', TType::I32, 1);
            $xfer += $output->writeI32($this->extCodeItemType);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->arguments !== null) {
            if (!is_array($this->arguments)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('arguments', TType::LST, 2);
            $output->writeListBegin(TType::STRING, count($this->arguments));
            foreach ($this->arguments as $iter48) {
                $xfer += $output->writeString($iter48);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
