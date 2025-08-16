<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';

use Aspose\Barcode\Internal\BarcodeException;
use assist\Assert;
use assist\TestsAssist as ta;
use assist\TestsLauncher;
use TypeError;

class AustraliaPostTest
{
     function setUp(): void
    {
        ta::set_slicense();
    }

    public function testAustraliaPostGenerating()
    {
        // printTestFullName ($this);
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AUSTRALIA_POST, "1136789101");
        $image_bytes = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        Assert::assertTrue(ta::saveImageResult($image_bytes, ta::RESULTS_ROOT . "AustraliaPostTests", "testAustraliaPost.png"));
    }

    public function testAustraliaPostGeneratingWrongCodeText()
       {
          // printTestFullName ($this);

        try
        {
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AUSTRALIA_POST, "1236789101");
            $image_bytes = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        }
        catch (\Exception $ex)
        {
            Assert::assertTrue($ex instanceof BarcodeException);
            Assert::assertStringContainsString("Unknown Format Control Code (first two digits in code text). Valid values are: 11, 45, 59, 62, 87, 92.", $ex->getMessage());
            //ta::prt($ex->getMessage());
        }
    }

    public function testAustraliaPostGeneratingWrongCodeType()
       {
        try
        {
            $generator = new \Aspose\Barcode\BarcodeGenerator("AUSTRALIA_POST"/*wrong because just the text*/, "1136789101");
            $image_bytes = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
        }
        catch (TypeError $ex)
        {
            Assert::assertStringContainsString("must be of the type int or null, string given", $ex->getMessage());
            ta::prt($ex->getMessage());
        }
    }

    public function testAustraliaPostGeneratingAndReading()
       {
          // printTestFullName ($this);

        try
        {
            $image_folder = "AustraliaPostTests";
            $image_name = "testAustraliaPostGeneratingAndReading.png";
            $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AUSTRALIA_POST, "1136789101");
            $image_bytes = $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG);
            Assert::assertTrue(ta::saveImageResult($image_bytes, ta::RESULTS_ROOT . $image_folder, $image_name));

            $image = ta::loadImageByName(ta::RESULTS_ROOT . $image_folder, $image_name);
            $reader = new \Aspose\Barcode\BarCodeReader($image, null, array(\Aspose\Barcode\DecodeType::AUSTRALIA_POST));
            $code_texts = array();
            $i = 0;
            ta::prt("code_text:".PHP_EOL );
            forEach ($reader->readBarCodes() as $res)
            {
                $code_texts[$i] = $res->getCodeText("UTF-8");
                $i++;
                ta::prt("i: $i". PHP_EOL );
                ta::prt("code_texts[i] : $code_texts[$i]". PHP_EOL );
            }

        }
        catch (\Exception $ex)
        {
            ta::prt($ex->getMessage());
        }
    }
}

//TestsLauncher::launch('\building\AustraliaPostTest', 'testAustraliaPostGeneratingWrongCodeType');
TestsLauncher::launch('\building\AustraliaPostTest', null);