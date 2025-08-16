<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class Issue37390
{
    private $Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37390/";
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }
    public function test_code39_cut_Normal()
    {
        $fileName = $this->Folder . "code39_cut.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, array(\Aspose\Barcode\DecodeType::CODE_39, \Aspose\Barcode\DecodeType::CODE_39));
        Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
        Assert::assertEquals("RM2019081900439", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }
}

TestsLauncher::launch('\building\Issue37390', null);
