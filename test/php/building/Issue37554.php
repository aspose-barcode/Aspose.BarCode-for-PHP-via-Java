<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class Issue37554
{
    private const Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37554/";

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_That_Barcode_Is_Recognized_With_HighQualityDetection()
    {
        $fileName = self::Folder. "000000019b5.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, \Aspose\Barcode\DecodeType::MOST_COMMON_TYPES);
        $reader->setQualitySettings(\Aspose\Barcode\QualitySettings::getHighQualityDetection());
        $reader->getQualitySettings()->setAllowMedianSmoothing(true);
        $res = $reader->readBarCodes();
        Assert::assertEquals(1, sizeof($res));
        Assert::assertEquals("FS-2068968-1", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }
}
TestsLauncher::launch('\building\Issue37554', null);

//$issue37554 = new Issue37554();
//$issue37554->test_That_Barcode_Is_Recognized_With_HighQualityDetection();