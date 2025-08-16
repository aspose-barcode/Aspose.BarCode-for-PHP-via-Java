<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use Aspose\Barcode\BarcodeGenerator;
use Aspose\Barcode\EncodeTypes;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist;

class BarcodeGeneratorTests
{
    private $subfolder = "../../resources/generating/";

     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function testGenerateBarcodeImage()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $encode_type = \Aspose\Barcode\EncodeTypes::CODE_128;
        $generator = new \Aspose\Barcode\BarcodeGenerator($encode_type, "123ABC");
        $image_to_save = $this->subfolder . "testGenerateBarcodeImage.png";
        $generator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }


    public function testGetCodeText()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $expected = "1234567890DCBV";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_128, $expected);
        $actual = $generator->getCodeText("UTF-8");
        Assert::assertEquals($expected, $actual);
    }

    function testOneDGeneration()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $codeText = '01234567';
        $encodeType = \Aspose\Barcode\EncodeTypes::CODE_39;
        $generator = new \Aspose\Barcode\BarcodeGenerator($encodeType, $codeText);
        $image_to_save = $this->subfolder . "testOneDGeneration.png";
        $generator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }

    function testTwoDGeneration()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $codeText = '01234567';
        $encodeType = \Aspose\Barcode\EncodeTypes::QR;
        $generator = new \Aspose\Barcode\BarcodeGenerator($encodeType, $codeText);
        $image_to_save = $this->subfolder . "testTwoDGeneration.png";
        $generator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }

    public function testSetBackColor()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#FF0000";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_39, '01234567');
        $generator->getParameters()->setBackColor($color_expected);
        $color_actual = $generator->getParameters()->getBackColor();
        Assert::assertEquals($color_expected, $color_actual);
    }

    public function testGetDefaultBackColor()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#FFFFFF";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_39, '01234567');
        $color_actual = $generator->getParameters()->getBackColor();
        Assert::assertEquals($color_expected, $color_actual);
    }

    public function testGetDefaultForeColor()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#000000";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_39, '01234567');
        $color_actual = $generator->getParameters()->getBarcode()->getBarColor();
        Assert::assertEquals($color_expected, $color_actual);
    }

    public function testSetForeColor()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#FA00AA";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_39, '01234567');
        $generator->getParameters()->getBarcode()->setForeColor($color_expected);
        $color_actual = $generator->getParameters()->getBarcode()->getBarColor();
        Assert::assertEquals($color_expected, $color_actual);
    }


    public function testSetCodeText()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $encode_type = \Aspose\Barcode\EncodeTypes::CODE_128;
        $generator = new \Aspose\Barcode\BarcodeGenerator($encode_type, "123456789");
        $expected = "555777";
        $generator->setCodeText($expected);
        $actual = $generator->getCodeText("UTF-8");
//        print("CodeText actual = ".$actual."\n");
//        print("CodeText expected = ".$expected."\n");
        Assert::assertEquals($expected, $actual);
    }

    public function testSetAutoSizeModeWidthHeight()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::DATA_MATRIX, "123456789");
        $generator->getParameters()->getBarcode()->setAutoSizeMode(AutoSizeMode::INTERPOLATION);
        $generator->getParameters()->getBarcode()->getBarCodeWidth()->setMillimeters(50);
        $generator->getParameters()->getBarcode()->getBarCodeHeight()->setInches(1.3);
        $image_to_save = $this->subfolder . "testSetAutoSizeModeWidthHeight.png";
        $generator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }

    public function testSetRotationAngle()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::DATA_MATRIX, "123456789");
        $generator->getParameters()->setRotationAngle(7);
        $image_to_save = $this->subfolder . "testSetRotationAngle.png";
        $generator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }

    public function testBaseGenerationParameters()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $barcodeGenerator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::EAN_14, "332211");
        $baseGenerationParameters = $barcodeGenerator->getParameters();

        $expectedBackColor = "#FFFFFF";
        $expectedResolution = 24;
        $expectedRotationAngle = 30;

        $baseGenerationParameters->setBackColor($expectedBackColor);
        $baseGenerationParameters->setResolution($expectedResolution);
        $baseGenerationParameters->setRotationAngle($expectedRotationAngle);

        Assert::assertEquals($expectedBackColor, $baseGenerationParameters->getBackColor());
        Assert::assertEquals($expectedResolution, $baseGenerationParameters->getResolution());
        Assert::assertEquals($expectedRotationAngle, $baseGenerationParameters->getRotationAngle());

        $image_to_save = $this->subfolder . "testBaseGenerationParameters.png";
        $barcodeGenerator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }

    public function testSetBarHeight()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $barcodeGenerator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_128, "12345");
        $barcodeGenerator->getParameters()->getBarcode()->getBarHeight()->setMillimeters(10);
        $image_to_save = $this->subfolder . "testSetBarHeight.png";
        $barcodeGenerator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }

    public function testSetAztecSymbolModeCompact()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $barcodeGenerator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, "12345678");
        $barcodeGenerator->getParameters()->getBarcode()->getAztec()->setAztecSymbolMode(AztecSymbolMode::COMPACT);
//        $barcodeGenerator->save($this->subfolder."testSetAztecSymbolModeCompact.png");
        $image_to_save = $this->subfolder . "testSetAztecSymbolModeCompact.png";
        $barcodeGenerator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }

    public function testSetAztecSymbolModeFullRange()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $barcodeGenerator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, "12345678");
        $barcodeGenerator->getParameters()->getBarcode()->getAztec()->setAztecSymbolMode(AztecSymbolMode::FULL_RANGE);
//        $barcodeGenerator->save($this->subfolder."testSetAztecSymbolModeFullRange.png");
        $image_to_save = $this->subfolder . "testSetAztecSymbolModeFullRange.png";
        $barcodeGenerator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }

    public function testSetAztecSymbolModeAuto()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $barcodeGenerator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::AZTEC, "12345678");
        $barcodeGenerator->getParameters()->getBarcode()->getAztec()->setAztecSymbolMode(AztecSymbolMode::AUTO);
//        $barcodeGenerator->save($this->subfolder."testSetAztecSymbolModeAuto.png");
        $image_to_save = $this->subfolder . "testSetAztecSymbolModeAuto.png";
        $barcodeGenerator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }


    public function testGetBarcodeTypeAndCodeText()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $encode_type_expected = \Aspose\Barcode\EncodeTypes::AZTEC;
        $code_text_expected = "444555777665";
        $generator = new \Aspose\Barcode\BarcodeGenerator($encode_type_expected, $code_text_expected);
        $encode_type_actual = $generator->getBarcodeType();
        $code_text_actual = $generator->getCodeText("UTF-8");
        Assert::assertEquals($code_text_expected, $code_text_actual);
        Assert::assertEquals($encode_type_expected, $encode_type_actual);

    }

    public function testGetDefaultDashStyle()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $dash_style_expected = \Aspose\Barcode\BorderDashStyle::SOLID;
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_39, '01234567');
        $dash_style_actual = $generator->getParameters()->getBorder()->getDashStyle();
//        print("dash_style_actual = ".$dash_style_actual."\n");
//        print("dash_style_expected".$dash_style_expected."\n");
        Assert::assertEquals($dash_style_expected, $dash_style_actual);
    }

    public function testDefaultBorderColor()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $border_color_expected = "#000000";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_39, '01234567');
        $border_color_actual = $generator->getParameters()->getBorder()->getColor();
//        print("border_color_expected = ".$border_color_expected."\n");
//        print("border_color_actual = ".$border_color_actual."\n");
        Assert::assertEquals($border_color_expected, $border_color_actual);
    }

    public function testSetBorderColor()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $border_color_expected = "#AA00BB";
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_39, '01234567');
        $generator->getParameters()->getBorder()->setColor($border_color_expected);
//        $unit = new Unit(10, GraphicsUnit::PIXEL); //TODO BARCODEPHP-228
//        $generator->getParameters()->getBorder()->setWidth($unit);
        $generator->getParameters()->getBorder()->setVisible(true);
        $border_color_actual = $generator->getParameters()->getBorder()->getColor();
        $image_to_save = $this->subfolder . "testSetBorderColor.png";
        $generator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
        Assert::assertEquals($border_color_expected, $border_color_actual);
    }


    public function testSave()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $type_expected = \Aspose\Barcode\EncodeTypes::AZTEC;
        $code_text_expected = "123678943";
        $generator = new \Aspose\Barcode\BarcodeGenerator($type_expected, $code_text_expected);
        $image_to_save = $this->subfolder . "testSave.png";
        $generator->save($image_to_save, "PNG");
        Assert::assertFileExists($image_to_save);
    }

    public function testSetBarcodeType()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_128, "12367891011");
        $type_expected = \Aspose\Barcode\EncodeTypes::CODABAR;
        $generator->setBarcodeType($type_expected);
        $generator->save($this->subfolder . "testSetBarcodeType.png", "PNG");
        $type_actual = $generator->getBarcodeType();
        Assert::assertEquals($type_expected, $type_actual);
    }

    public function testSetFont()
    {
        // print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $generator = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::CODE_128, "123456789");
        $generator->getParameters()->getCaptionAbove()->setText("CAPTION ABOOVE");
        $generator->getParameters()->getCaptionAbove()->setVisible(true);
        $generator->getParameters()->getCaptionAbove()->getFont()->setStyle(FontStyle::ITALIC);
        $generator->getParameters()->getCaptionAbove()->getFont()->getSize()->setPoint(5);
        $image_to_save = $this->subfolder . "testSetFont.bmp";
        $generator->save($image_to_save, "BMP");
//        $generator->saveImageFormat($image_to_save, "PNG"); //TODO BARCODEPHP-87
        Assert::assertFileExists($image_to_save);

    }
}

TestsLauncher::launch('\building\BarcodeGeneratorTests', "testSetBorderColor");
//$barcodeGeneratorTests = new BarcodeGeneratorTests();
//$barcodeGeneratorTests->testGenerateBarcodeImage();
//$barcodeGeneratorTests->testGetCodeText();
//$barcodeGeneratorTests->testOneDGeneration();
//$barcodeGeneratorTests->testTwoDGeneration();

//$barcodeGeneratorTests->testSetBackColor();
//$barcodeGeneratorTests->testGetDefaultBackColor();
//$barcodeGeneratorTests->testGetDefaultForeColor();
//$barcodeGeneratorTests->testSetForeColor();
//$barcodeGeneratorTests->testSetCodeText();
//$barcodeGeneratorTests->testSetAutoSizeModeWidthHeight();
//$barcodeGeneratorTests->testSetRotationAngle();
//$barcodeGeneratorTests->testBaseGenerationParameters();
//$barcodeGeneratorTests->testSetBarHeight();
//$barcodeGeneratorTests->testSetAztecSymbolModeCompact();
//$barcodeGeneratorTests->testSetAztecSymbolModeFullRange();
//$barcodeGeneratorTests->testSetAztecSymbolModeAuto();
//$barcodeGeneratorTests->testGetBarcodeTypeAndCodeText();
//$barcodeGeneratorTests->testGetDefaultDashStyle();
//$barcodeGeneratorTests->testDefaultBorderColor();
//$barcodeGeneratorTests->testSetBorderColor();
//$barcodeGeneratorTests->testSave();
//$barcodeGeneratorTests->testSetBarcodeType();
//$barcodeGeneratorTests->testSetFont();
