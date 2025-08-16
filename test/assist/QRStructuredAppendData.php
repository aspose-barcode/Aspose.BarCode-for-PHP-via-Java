<?php
namespace assist;
class QRStructuredAppendData
{
    public $CodeType;
    public $CodeText;
    public $QRStructuredAppendModeBarCodesQuantity;
    public $QRStructuredAppendModeBarCodeIndex;
    public $QRStructuredAppendModeParityData;

    public function __construct($aCodeType, $aCodeText,
                                $aQRStructuredAppendModeBarCodesQuantity, $aQRStructuredAppendModeBarCodeIndex, $aQRStructuredAppendModeParityData)
    {
        $this->CodeType = $aCodeType;
        $this->CodeText = $aCodeText;
        $this->QRStructuredAppendModeBarCodesQuantity = $aQRStructuredAppendModeBarCodesQuantity;
        $this->QRStructuredAppendModeBarCodeIndex = $aQRStructuredAppendModeBarCodeIndex;
        $this->QRStructuredAppendModeParityData = $aQRStructuredAppendModeParityData;
    }
}