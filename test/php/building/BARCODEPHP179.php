<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;
use Exception;

class BARCODEPHP179
{
    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_correctPath()
    {
        $Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37390/";
        $fileName = $Folder . "code39_cut.png";
        $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, array(\Aspose\Barcode\DecodeType::CODE_39, \Aspose\Barcode\DecodeType::CODE_39));
        Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
        Assert::assertEquals("RM2019081900439", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }

    public function test_incorrectPath()
    {
        $Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue137390/";
        $fileName = $Folder . "code39_cut.png";
        $exceptionThrown = false;
        try
        {
            $reader = new \Aspose\Barcode\BarCodeReader($fileName, null, array(\Aspose\Barcode\DecodeType::CODE_39, \Aspose\Barcode\DecodeType::CODE_39));
        }
        catch (\Exception $e)
        {
            $exceptionThrown = true;
        }
        Assert::assertTrue($exceptionThrown);
    }

    public function test_image()
    {
        $Folder = \assist\TestsAssist::TESTDATA_ROOT . "Issues/Issue37390/";
        $fileName = $Folder . "code39_cut.png";
        $imagedata = file_get_contents($fileName);
        $image = base64_encode($imagedata);
        $reader = new \Aspose\Barcode\BarCodeReader($image, null, array(\Aspose\Barcode\DecodeType::CODE_39, \Aspose\Barcode\DecodeType::CODE_39));
        Assert::assertEquals(sizeOf($reader->readBarCodes()), 1);
        Assert::assertEquals("RM2019081900439", $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
    }

    public function test_incorrectImage()
    {
        $image = "aaaaaaaaaaaaa";
        $exceptionThrown = false;
        try
        {
            $reader = new \Aspose\Barcode\BarCodeReader($image, null, array(\Aspose\Barcode\DecodeType::CODE_39, \Aspose\Barcode\DecodeType::CODE_39));
        }
        catch (\Exception $e)
        {
            $exceptionThrown = true;
        }
        Assert::assertTrue($exceptionThrown);
    }
}

TestsLauncher::launch('\building\BARCODEPHP179', null);

?>