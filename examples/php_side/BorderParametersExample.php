<?php
include_once("ExamplesAssist.php");

class BorderParametersExample
{
    private $subfolder = "resources/generating/";

    public function howToBorderParameters()
    {
        $expBorderColor = "#AAAAAA";
        $expDashStyle = BorderDashStyle::DOT;
        $expVisible = true;

        $barcodeGenerator = new BarcodeGenerator(EncodeTypes::CODE_128, "1234567891");
        $borderParameters = $barcodeGenerator->getParameters()->getBorder();
        $borderParameters->printJavaClassName();

        $unit = $borderParameters->getWidth();
        $expectedMm = 2;
        $unit->setMillimeters($expectedMm);

        $borderParameters->setVisible($expVisible);
        $borderParameters->setColor($expBorderColor);
        $borderParameters->setDashStyle($expDashStyle);

        print("visible: ".$borderParameters->getVisible()."\n");
        print("width in mm: ".$borderParameters->getWidth()->getMillimeters()."\n");
        print("color: ".$borderParameters->getColor()."\n");
        print("DashStyle: ".$borderParameters->getDashStyle()."\n");

        $path = $this->subfolder . "howToBorderParameters.png";
        $barcodeGenerator->save($path, BarCodeImageFormat::PNG);
        print("barcode image saved to ".$path."\n");
    }
}

set_license();
$borderParametersExample = new BorderParametersExample();
$borderParametersExample->howToBorderParameters();