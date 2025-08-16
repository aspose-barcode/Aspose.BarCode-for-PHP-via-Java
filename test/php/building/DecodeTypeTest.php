<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class DecodeTypeTest
{
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testDecodeTypes()
      {
          // printTestFullName ($this);

        $subfolder = \assist\TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code128";
        $fileName = "mzl.jpg";
        $decodeTypes = array(\Aspose\Barcode\DecodeType::ALL_SUPPORTED_TYPES, \Aspose\Barcode\DecodeType::TYPES_1D, \Aspose\Barcode\DecodeType::POSTAL_TYPES, \Aspose\Barcode\DecodeType::MOST_COMMON_TYPES);
        for($i = 0; $i < sizeof($decodeTypes); $i++)
        {
            $reader = new BarcodeReader(loadImageByName($subfolder, $fileName), null, $decodeTypes[$i]);
            Assert::assertEquals($reader->getBarCodeDecodeType(), $decodeTypes[$i]);
        }
    }
}
TestsLauncher::launch('\building\DecodeTypeTest', null);