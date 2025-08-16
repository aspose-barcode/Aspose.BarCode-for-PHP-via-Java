<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class Issue37413
{
    private const Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37413";
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }
    public function test_012333016337_1()
    {
        $fileName = self::Folder . "/012333016337_1.jpg";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, array(\Aspose\Barcode\DecodeType::UPCA, \Aspose\Barcode\DecodeType::EAN_13));
        {
            //barocde sometimes split into two barcodes
            $lResDic = array();
            $results = $reader->readBarCodes();
            for ($i = 0; $i < sizeof($results); $i++)
            {
                $result = $results[$i];
                if (in_array($result ->getCodeText("UTF-8"), $lResDic)) continue;
                    array_push($lResDic, $result->getCodeText("UTF-8"));
            }

            Assert::assertEquals(sizeof($lResDic), 1);
            Assert::assertTrue(in_array("012333016337", $lResDic));
        }
    }


    public function test_barcode_question()
    {
        $fileName = self::Folder . "/barcode-question.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, array(\Aspose\Barcode\DecodeType::UPCA, \Aspose\Barcode\DecodeType::EAN_13, \Aspose\Barcode\DecodeType::SUPPLEMENT));
        {
            Assert::assertEquals(sizeof($reader->readBarCodes()), 2);
            Assert::assertEquals("070999006994", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals("33546", $reader->getFoundBarCodes()[1]->getCodeText("UTF-8"));
        }
    }
}

TestsLauncher::launch('\building\Issue37413', null);

//$issue37413 = new Issue37413();
//$issue37413->test_012333016337_1();
//$issue37413->test_barcode_question();