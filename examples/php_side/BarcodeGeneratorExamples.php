<?php
include_once('ExamplesAssist.php');

class BarcodeGeneratorExamples
{
    private $subfolder = "resources/generating/";

    function howToGenerateBarcodeImage()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $encode_type = EncodeTypes::CODE_128;
        $generator = new BarcodeGenerator($encode_type, null);
        $generator->setCodeText("123ABC");
        $path = $this->subfolder . "howToGenerateBarcodeImage.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
    }

    function howToSave()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $type_expected = EncodeTypes::AZTEC;
        $code_text_expected = "123678943";
        $generator = new BarcodeGenerator($type_expected, $code_text_expected);
        $path = $this->subfolder . "howToSave.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
    }

    function howToSetBarcodeType()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $generator = new BarcodeGenerator(EncodeTypes::CODE_128, "12367891011");
        $type_expected = EncodeTypes::CODABAR;
        $generator->setBarcodeType($type_expected);
        $type_actual = $generator->getBarcodeType();
        $path = $this->subfolder . "howToSetBarcodeType.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("type_expected = " . $type_expected . "\n");
        print("type_actual = " . $type_actual . "\n");
    }

    function howToGetCodeText()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $expected = "1234567890DCBV";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_128, $expected);
        $path = $this->subfolder . "howToGetCodeText.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("CodeText = " . $generator->getCodeText());

    }

    function howToGenerateOneD()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $codeText = '01234567';
        $encodeType = EncodeTypes::CODE_39_STANDARD;
        $generator = new BarcodeGenerator($encodeType, $codeText);
        $path = $this->subfolder . "howToGenerateOneD.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
    }

    function howToGenerateTwoD()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $codeText = '01234567';
        $encodeType = EncodeTypes::QR;
        $generator = new BarcodeGenerator($encodeType, $codeText);
        $path = $this->subfolder . "howToGenerateTwoD.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");;
    }

    function howToSetBackColor()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#FF0000";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $generator->getParameters()->setBackColor($color_expected);
        $color_actual = $generator->getParameters()->getBackColor();
        $generator->save($this->subfolder . "howToSetBackColor.png", BarCodeImageFormat::PNG);
        $path = $this->subfolder . "howToGetCodeText.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("color_expected = " . $color_expected . "\n");
        print("color_actual = " . $color_actual . "\n");
    }

    function howToGetDefaultBackColor()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#FFFFFF";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $color_actual = $generator->getParameters()->getBackColor();
        $path = $this->subfolder . "howToGetDefaultBackColor.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("color_expected = " . $color_expected . "\n");
        print("color_actual = " . $color_actual . "\n");
    }

    function howToGetDefaultForeColor()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#000000";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $color_actual = $generator->getParameters()->getBarcode()->getBarColor();
        $path = $this->subfolder . "howToGetDefaultForeColor.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("Color expected = " . $color_expected . "\n");
        print("Color actual = " . $color_actual . "\n");
    }

    function howToSetForeColor()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#FA00AA";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $generator->getParameters()->getBarcode()->setBarColor($color_expected);
        $color_actual = $generator->getParameters()->getBarcode()->getBarColor();
        $path = $this->subfolder . "howToSetForeColor.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("Color expected = " . $color_expected . "\n");
        print("Color actual = " . $color_actual . "\n");
    }


    function howToSetCodeText()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $encode_type = EncodeTypes::CODE_128;
        $generator = new BarcodeGenerator($encode_type, null);
        $expected = "555777";
        $generator->setCodeText($expected);
        $actual = $generator->getCodeText();
        $path = $this->subfolder . "howToSetCodeText.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("CodeText actual = " . $actual . "\n");
        print("CodeText expected = " . $expected . "\n");
    }


    function howToGetBarcodeTypeAndCodeText()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $encode_type_expected = EncodeTypes::AZTEC;
        $code_text_expected = "444555777665";
        $generator = new BarcodeGenerator($encode_type_expected, $code_text_expected);
        $encode_type_actual = $generator->getBarcodeType();
        $code_text_actual = $generator->getCodeText();
        $path = $this->subfolder . "howToGetBarcodeTypeAndCodeText.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("code text actual = " . $code_text_actual . "\n");
        print("code text expected = " . $code_text_expected . "\n");
        print("encode type actual = " . $encode_type_actual . "\n");
        print("encode type expected = " . $encode_type_expected . "\n");
    }

    function howToGetDefaultDashStyle()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $dash_style_expected = BorderDashStyle::SOLID;
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $dash_style_actual = $generator->getParameters()->getBorder()->getDashStyle();
        $path = $this->subfolder . "howToGetDefaultDashStyle.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("dash_style_actual = " . $dash_style_actual . "\n");
        print("dash_style_expected" . $dash_style_expected . "\n");
    }

    function howToDefaultBorderColor()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $border_color_expected = "#000000";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $border_color_actual = $generator->getParameters()->getBorder()->getColor();
        $path = $this->subfolder . "howToDefaultBorderColor.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("border_color_expected = " . $border_color_expected ."\n");
        print("border_color_actual = " . $border_color_actual ."\n");
    }

    function howToSetBorderColor()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $border_color_expected = "#AA00BB";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $generator->getParameters()->getBorder()->setColor($border_color_expected);
        $border_color_actual = $generator->getParameters()->getBorder()->getColor();
        $path = $this->subfolder . "howToSetBorderColor.png";
        $generator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
        print("border_color_expected = " . $border_color_expected ."\n");
        print("border_color_actual = " . $border_color_actual ."\n");
    }

    function howToSetFont()
    {
        print("\nfunction '" . __FUNCTION__ . "'\n");
        $generator = new BarcodeGenerator(EncodeTypes::CODE_128, null);
        $generator->getParameters()->getCaptionAbove()->setText("CAPTION ABOOVE");
        $generator->getParameters()->getCaptionAbove()->setVisible(true);
        $generator->getParameters()->getCaptionAbove()->getFont()->setStyle(FontStyle::ITALIC);
        $generator->getParameters()->getCaptionAbove()->getFont()->getSize()->setPoint(5);
        $save_path = $this->subfolder . "howToSetFont.bmp";
        $generator->save($save_path, BarCodeImageFormat::BMP);
        print("barcode image saved to ".$save_path."\n");
    }
}

set_license();
$barcodeGeneratorTests = new BarcodeGeneratorExamples();
$barcodeGeneratorTests->howToGenerateBarcodeImage();
$barcodeGeneratorTests->howToGetCodeText();
$barcodeGeneratorTests->howToGenerateOneD();
$barcodeGeneratorTests->howToGenerateTwoD();
$barcodeGeneratorTests->howToSetBackColor();
$barcodeGeneratorTests->howToGetDefaultBackColor();
$barcodeGeneratorTests->howToGetDefaultForeColor();
$barcodeGeneratorTests->howToSetForeColor();
$barcodeGeneratorTests->howToSetCodeText();
$barcodeGeneratorTests->howToGetBarcodeTypeAndCodeText();
$barcodeGeneratorTests->howToGetDefaultDashStyle();
$barcodeGeneratorTests->howToDefaultBorderColor();
$barcodeGeneratorTests->howToSetBorderColor();
$barcodeGeneratorTests->howToSave();
$barcodeGeneratorTests->howToSetBarcodeType();
$barcodeGeneratorTests->howToSetFont();