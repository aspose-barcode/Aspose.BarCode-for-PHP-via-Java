<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class Issue37391
{
    private $Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37391/";
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }
    public function test_barcode_code32_99700160_Code32()
    {
        $fileName = $this->Folder . "/barcode_code32_99700160.gif";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::CODE_32);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals("997001603", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }

    public function test_barcode_code32_99700160_AllSupportedTypes()
    {
        $fileName = $this->Folder . "/barcode_code32_99700160.gif";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        Assert::assertEquals(sizeof($reader->readBarCodes()), 1);
        Assert::assertEquals("997001603", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }
}
TestsLauncher::launch('\building\Issue37391', null);
