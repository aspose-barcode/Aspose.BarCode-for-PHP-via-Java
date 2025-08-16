<?php
//
//namespace building;
//
//require_once __DIR__ . '/../bootstrap.php';
//use assist\Assert;
//use assist\TestsLauncher;
//use assist\TestsAssist;
//
//class API_20_8_Tests
//{
//    private const folder_out = "../../resources/generating/";
//
//    function setUp(): void
//    {
//        \assist\TestsAssist::set_slicense();
//    }
//
//    public function testNewAPI1()
//    {
//        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
//        $fileName = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37391/barcode_code32_99700160.gif";
//        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType :: CODE_32);
//        $qualitySettings = $reader->getQualitySettings();
//        $qualitySettings->setReadTinyBarcodes(true);
//        $readTinyBarcodes = $reader->getQualitySettings()->getReadTinyBarcodes();
//        Assert::assertEquals(true, $readTinyBarcodes);
//    }
//}
//TestsLauncher::launch('\building\API_20_8_Tests', null);
