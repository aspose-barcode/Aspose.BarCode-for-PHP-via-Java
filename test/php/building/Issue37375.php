<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\QRStructuredAppendData;
use assist\TestsLauncher;
use assist\TestsAssist;

class Issue37375
{
    private $folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37375/";

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    private static function checkBarCodeResultsInQRStructuredAppendData(array $aResultList, QRStructuredAppendData $aDataItem)
    {
        for ($i = 0; $i < sizeof($aResultList); ++$i) {
            $lResultItem = $aResultList[$i];
            if (($aDataItem->CodeText == ($lResultItem->getCodeText("UTF-8"))) && ($aDataItem->CodeType == $lResultItem->getCodeType()) &&
                ($aDataItem->QRStructuredAppendModeBarCodesQuantity == $lResultItem->getExtended()->getQR()->getQRStructuredAppendModeBarCodesQuantity()) &&
                ($aDataItem->QRStructuredAppendModeParityData == $lResultItem->getExtended()->getQR()->getQRStructuredAppendModeParityData()) &&
                ($aDataItem->QRStructuredAppendModeBarCodeIndex == $lResultItem->getExtended()->getQR()->getQRStructuredAppendModeBarCodeIndex())) {
                return true;
            }
        }
        //
        Assert::fail("QR Structured Append Item Failed: CodeText=" . $aDataItem->CodeText . " CodeType =" . $aDataItem->CodeType .
            " QRStructuredAppendModeBarCodesQuantity=" . $aDataItem->QRStructuredAppendModeBarCodesQuantity .
            " QRStructuredAppendModeBarCodeIndex=" . $aDataItem->QRStructuredAppendModeBarCodeIndex .
            " QRStructuredAppendModeParityData=" . $aDataItem->QRStructuredAppendModeParityData);
    }

    private static function recognizeQRStructuredAppend($aFolder, $aFilename, array $aList)
    {
        $fileName = $aFolder . "/" . $aFilename;
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::QR);
        {
            $lResultsList = $reader->readBarCodes();
            for ($i = 0; $i < sizeof($aList); ++$i) {
                Assert::assertTrue(self::checkBarCodeResultsInQRStructuredAppendData($lResultsList, $aList[$i]));
            }
        }
    }

    public function test_sapp1_png()
    {
        $this->recognizeQRStructuredAppend($this->folder, "sapp1.png", array(new QRStructuredAppendData(\Aspose\Barcode\DecodeType::QR, "I read the new", 2, 0, 57),
            new QRStructuredAppendData(\Aspose\Barcode\DecodeType::QR, "s today oh boy", 2, 1, 57)));
    }

    public function test_sapp2_png()
    {
        $this->recognizeQRStructuredAppend($this->folder, "sapp2.png", array(
            new QRStructuredAppendData(\Aspose\Barcode\DecodeType::QR, "ABCDEFGHIJKLMN", 4, 0, 1),
            new QRStructuredAppendData(\Aspose\Barcode\DecodeType::QR, "OPQRSTUVWXYZ0123", 4, 1, 1),
            new QRStructuredAppendData(\Aspose\Barcode\DecodeType::QR, "456789ABCDEFGHIJ", 4, 2, 1),
            new QRStructuredAppendData(\Aspose\Barcode\DecodeType::QR, "KLMNOPQRSTUVWXYZ", 4, 3, 1)
        ));
    }

    public function test_sapp3_png()
    {
        $this->recognizeQRStructuredAppend($this->folder, "sapp3.png", array(
            new QRStructuredAppendData(\Aspose\Barcode\DecodeType::QR, "Yesterday\nAll my troubles see", 4, 0, 56),
            new QRStructuredAppendData(\Aspose\Barcode\DecodeType::QR, "med so far away\nNow it looks ", 4, 1, 56),
            new QRStructuredAppendData(\Aspose\Barcode\DecodeType::QR, "as though they're here to sta", 4, 2, 56),
            new QRStructuredAppendData(\Aspose\Barcode\DecodeType::QR, "y\nOh, I believe in yesterday", 4, 3, 56)
        ));
    }
}
//TestsLauncher::launch('\building\Issue37375', "setUp");
//TestsLauncher::launch('\building\Issue37375', "test_sapp1_png");
TestsLauncher::launch('\building\Issue37375', null);
