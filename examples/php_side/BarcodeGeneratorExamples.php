<?php
include_once('tests_assist.php');

class BarcodeGeneratorExamples
{
    private $subfolder = "resources/generating/";

    function howToGenerateBarcodeImage()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $encode_type = EncodeTypes::CODE_128;
        $generator = new BarcodeGenerator($encode_type, null);
        $generator->setCodeText("123ABC");
        $generator->save($this->subfolder . "howToGenerateBarcodeImage.png", "PNG");
        prt_mess("image saved to ". $this->subfolder ."howToGenerateBarcodeImage.png");
    }

    function howToSave()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $type_expected = EncodeTypes::AZTEC;
        $code_text_expected = "123678943";
        $generator = new BarcodeGenerator($type_expected, $code_text_expected);
        $generator->save($this->subfolder . "howToSave.png", "PNG");
        prt_mess("image saved to ". $this->subfolder ."howToSave.png");
    }

    function howToSetBarcodeType()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $generator = new BarcodeGenerator(EncodeTypes::CODE_128, "12367891011");
        $type_expected = EncodeTypes::CODABAR;
        $generator->setBarcodeType($type_expected);
        $generator->save($this->subfolder . "testSetBarcodeType.png", "PNG");
        $type_actual = $generator->getBarcodeType();
        $generator->save($this->subfolder . "howToSetBarcodeType.png", "PNG");
        print("type_expected = " . $type_expected . "\n");
        print("type_actual = " . $type_actual . "\n");
        prt_mess("image saved to ". $this->subfolder ."howToSetBarcodeType.png");
    }

    function howToGetCodeText()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $expected = "1234567890DCBV";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_128, $expected);
        $generator->save($this->subfolder . "howToGetCodeText.png", "PNG");
        print("CodeText = " . $generator->getCodeText());
        prt_mess("image saved to ". $this->subfolder ."howToGetCodeText.png");
    }

    function howToGenerateOneD()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $codeText = '01234567';
        $encodeType = EncodeTypes::CODE_39_STANDARD;
        $generator = new BarcodeGenerator($encodeType, $codeText);
        $generator->save($this->subfolder . "howToGenerateOneD.png", "PNG");
        prt_mess("image saved to ". $this->subfolder ."howToGenerateOneD.png");
    }

    function howToGenerateTwoD()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $codeText = '01234567';
        $encodeType = EncodeTypes::QR;
        $generator = new BarcodeGenerator($encodeType, $codeText);
        $generator->save($this->subfolder . "howToGenerateTwoD.png", "PNG");
        prt_mess("image saved to ". $this->subfolder ."howToGenerateTwoD.png");
    }

    function howToSetBackColor()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#FF0000";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $generator->getParameters()->setBackColor($color_expected);
        $color_actual = $generator->getParameters()->getBackColor();
        $generator->save($this->subfolder . "howToSetBackColor.png", "PNG");
        print("color_expected = " . $color_expected . "\n");
        print("color_actual = " . $color_actual . "\n");
        prt_mess("image saved to ". $this->subfolder ."howToSetBackColor.png");
    }

    function howToGetDefaultBackColor()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#FFFFFF";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $color_actual = $generator->getParameters()->getBackColor();
        $generator->save($this->subfolder . "howToGetDefaultBackColor.png", "PNG");
        print("color_expected = " . $color_expected . "\n");
        print("color_actual = " . $color_actual . "\n");
        prt_mess("image saved to ". $this->subfolder ."howToGetDefaultBackColor.png");
    }

    function howToGetDefaultForeColor()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#000000";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $color_actual = $generator->getParameters()->getBarcode()->getForeColor();
        $generator->save($this->subfolder . "howToGetDefaultForeColor.png", "PNG");
        print("Color expected = " . $color_expected . "\n");
        print("Color actual = " . $color_actual . "\n");
        prt_mess("image saved to ". $this->subfolder ."howToGetDefaultForeColor.png");
    }

    function howToSetForeColor()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $color_expected = "#FA00AA";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $generator->getParameters()->getBarcode()->setForeColor($color_expected);
        $color_actual = $generator->getParameters()->getBarcode()->getForeColor();
        $generator->save($this->subfolder . "howToSetForeColor.png", "PNG");
        print("Color expected = " . $color_expected . "\n");
        print("Color actual = " . $color_actual . "\n");
        prt_mess("image saved to ". $this->subfolder ."howToSetForeColor.png");

    }


    function howToSetCodeText()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $encode_type = EncodeTypes::CODE_128;
        $generator = new BarcodeGenerator($encode_type, null);
        $expected = "555777";
        $generator->setCodeText($expected);
        $actual = $generator->getCodeText();
        $generator->save($this->subfolder . "howToSetCodeText.png", "PNG");
        print("CodeText actual = " . $actual . "\n");
        print("CodeText expected = " . $expected . "\n");
        prt_mess("image saved to ". $this->subfolder ."howToSetCodeText.png");

    }


    function howToGetBarcodeTypeAndCodeText()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $encode_type_expected = EncodeTypes::AZTEC;
        $code_text_expected = "444555777665";
        $generator = new BarcodeGenerator($encode_type_expected, $code_text_expected);
        $encode_type_actual = $generator->getBarcodeType();
        $code_text_actual = $generator->getCodeText();
        $generator->save($this->subfolder . "howToGetBarcodeTypeAndCodeText.png", "PNG");
        print("code text actual = " . $code_text_actual . "\n");
        print("code text expected = " . $code_text_expected . "\n");
        print("encode type actual = " . $encode_type_actual . "\n");
        print("encode type expected = " . $encode_type_expected . "\n");
        prt_mess("image saved to ". $this->subfolder ."howToGetBarcodeTypeAndCodeText.png");

    }

    function howToGetDefaultDashStyle()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $dash_style_expected = BorderDashStyle::SOLID;
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $dash_style_actual = $generator->getParameters()->getBorder()->getDashStyle();
        $generator->save($this->subfolder . "howToGetDefaultDashStyle.png", "PNG");
        print("dash_style_actual = " . $dash_style_actual . "\n");
        print("dash_style_expected" . $dash_style_expected . "\n");
        prt_mess("image saved to ". $this->subfolder ."howToGetBarcodeTypeAndCodeText.png");

    }

    function howToDefaultBorderColor()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $border_color_expected = "#000000";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $border_color_actual = $generator->getParameters()->getBorder()->getColor();
        $generator->save($this->subfolder . "howToDefaultBorderColor.png", "PNG");
        print("border_color_expected = " . $border_color_expected . "\n");
        print("border_color_actual = " . $border_color_actual . "\n");
        prt_mess("image saved to ". $this->subfolder ."howToDefaultBorderColor.png");
    }

    function howToSetBorderColor()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $border_color_expected = "#AA00BB";
        $generator = new BarcodeGenerator(EncodeTypes::CODE_39_STANDARD, '01234567');
        $generator->getParameters()->getBorder()->setColor($border_color_expected);
        $border_color_actual = $generator->getParameters()->getBorder()->getColor();
        $generator->save($this->subfolder . "howToSetBorderColor.png", "PNG");
        print("border_color_expected = " . $border_color_expected . "\n");
        print("border_color_actual = " . $border_color_actual . "\n");
        prt_mess("image saved to ". $this->subfolder ."howToSetBorderColor.png");
    }

    function howToSetFont()
    {
        print("\n---\nfunction '" . __FUNCTION__ . "'\n");
        $generator = new BarcodeGenerator(EncodeTypes::CODE_128, null);
        $generator->getParameters()->getCaptionAbove()->setText("CAPTION ABOOVE");
        $generator->getParameters()->getCaptionAbove()->setVisible(true);
        $generator->getParameters()->getCaptionAbove()->getFont()->setStyle(FontStyle::ITALIC);
        $generator->getParameters()->getCaptionAbove()->getFont()->getSize()->setPoint(5);
        $save_path = $this->subfolder . "howToSetFont.bmp";
        $generator->save($save_path, "BMP");
        prt_mess("image is saved to $save_path");
    }
}