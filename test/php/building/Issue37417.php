<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class Issue37417
{
    private const Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37417";
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }
    public function test_QR_with_no_quite_zone()
    {
        $fileName = self::Folder . "/asposenet_0613_src1.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES);
        $res = $reader->readBarCodes();
        Assert::assertEquals(sizeof($res), 1);
        Assert::assertEquals("MECARD:N:Name1;SOUND:Rad1;TEL:Phone1;EMAIL:email1@example.com;NOTE:Contoso1;BDAY:20200324;ADR:Addres1 line1 lin2 line4;URL:http://www.example.com1;NICKNAME:Nick1;", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }
}

TestsLauncher::launch('\building\Issue37417', null);

//$issue37417 = new Issue37417();
//$issue37417->test_QR_with_no_quite_zone();