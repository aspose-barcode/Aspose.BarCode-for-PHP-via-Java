<?php
include_once("ExamplesAssist.php");

class BarCodeReaderExamples
{
    private $subfolder = "resources/recognition/";

    public function howToReadFromFile()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        $file_name = "code11.png";
        $full_path = $this->subfolder.$file_name;
        print(file_exists($full_path)."\n");
        $reader = new BarCodeReader($full_path, null, null);
        forEach($reader->readBarCodes() as $res)
        {
            print("Code Text : ".$res->getCodeText()."\n");
            print("Code Type : ".$res->getCodeTypeName()."\n");
        }

    }

    public function howToSetQualitySettings()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        $file_name = "code11.png";
        $full_path = $this->subfolder.$file_name;
        print(file_exists($full_path)."\n");
        $reader = new BarCodeReader($full_path, null, null);
        $reader->setQualitySettings(QualitySettings::getHighPerformance());
        $reader->getQualitySettings()->setAllowMedianSmoothing(true);
        $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);

        forEach($reader->readBarCodes() as $res)
        {
            print("Code Text : ".$res->getCodeText()."\n");
            print("Code Type : ".$res->getCodeTypeName()."\n");
        }

    }


    public function howToGetCodeBytes()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        $fileName = "example2.jpg";
        $reader = new BarCodeReader(loadImageByName($this->subfolder, $fileName), null, null);
       forEach($reader->readBarCodes() as $res)
       {
           $actualCodeBytes = $res->getCodeBytes();
           print("code bytes  : ".sizeof($actualCodeBytes)."\n");
       }
    }

    public function howToRecognitionCode128()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        try
        {
            $fileName = "code128.jpg";
            $reader = new BarCodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::CODE_128);
            forEach($reader->readBarCodes() as $res)
            {
                print("Code Text : ".$res->getCodeTypeName()."\n");
                print("\n");
                print("Code Type : ".$res->getCodeText()."\n");
            }

        }
        catch (BarcodeException $e)
        {
            print($e->getMessage());
        }
    }

    public function howToRecognitionCode11()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        try
        {
            $fileName = "code11.png";
            $reader = new BarCodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::CODE_11);
            forEach($reader->readBarCodes() as $res)
            {
                print("Code Text : ".$res->getCodeTypeName()."\n");
                print("Code Type : ".$res->getCodeText()."\n");
            }

        }
        catch (BarcodeException $e)
        {
            print($e->getMessage());
        }
    }

  public function howToRecognitionCodeAllSupportedTypes()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        try
        {
            $fileName = "example2.jpg";
            $reader = new BarCodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::ALL_SUPPORTED_TYPES);
            forEach($reader->readBarCodes() as $res)
            {
                print("Code Text : ".$res->getCodeTypeName()."\n");;
                print("Code Type : ".$res->getCodeText()."\n");
            }

        }
        catch (BarcodeException $e)
        {
            print($e->getMessage());
        }
    }

public function howToRecognitionCodeAllSupportedTypes2()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        try
        {
            $fileName = "example1.png";
            $reader = new BarCodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::ALL_SUPPORTED_TYPES);
            forEach($reader->readBarCodes() as $res)
            {
                print("Code Text : ".$res->getCodeTypeName()."\n");
                print("Code Type : ".$res->getCodeText()."\n");
            }

        }
        catch (BarcodeException $e)
        {
            print($e->getMessage());
        }
    }

    public function howToRecognitionSetBarCodeImage()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        $fileName = "code128.jpg";
        $reader = new BarCodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::ALL_SUPPORTED_TYPES);
        $reader->setBarCodeImage($this->subfolder . "code11.png", null);

        forEach($reader->readBarCodes() as $res)
        {
            print("Code Text : ".$res->getCodeTypeName()."\n");
            print("Code Type : ".$res->getCodeText()."\n");
        }

    }

    public function howToMacroPdf417()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        $gen = new BarcodeGenerator(EncodeTypes::MACRO_PDF_417, null);
        $gen->setCodeText("codeSomecode");
        $gen->getParameters()->getBarcode()->getPdf417()->setPdf417MacroFileID(15900);
        $gen->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentID(2);
        $gen->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentsCount(3);
        $image = $gen->generateBarcodeImage(BarCodeImageFormat::PNG);
        $reader = new BarCodeReader(($image), null, DecodeType::MACRO_PDF_417);
        forEach($reader->readBarCodes() as $res)
        {
            print("CodeText : ".$res->getCodeText()."\n");
            print("getMacroPdf417FileID : ".$res->getExtended()->getPdf417()->getMacroPdf417FileID()."\n");
            print("getMacroPdf417SegmentID : ".$res->getExtended()->getPdf417()->getMacroPdf417SegmentID()."\n");
            print('getMacroPdf417SegmentsCount : '.$res->getExtended()->getPdf417()->getMacroPdf417SegmentsCount()."\n");
        }

    }


    public function howToDetectEncodingEnabled()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        $gen = new BarcodeGenerator(EncodeTypes::QR, null);
        $gen->setCodeText("Слово");
        $gen->getParameters()->getBarcode()->getQR()->setCodeTextEncoding("UTF-8");
        $image = $gen->generateBarcodeImage(BarCodeImageFormat::PNG);

        $reader = new BarCodeReader(($image), null, DecodeType::QR);
        $reader->setDetectEncoding(true);
        forEach($reader->readBarCodes() as $res)
        {
            print("CodeText : " . $res->getCodeText()."\n");
            print("CodeType : " . $res->getCodeTypeName()."\n");
        }
    }

    public function howToCustomerInformationInterpretingType1()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, null);
        $generator->setCodeText("59123456781234567");
        $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::N_TABLE);
        $generator->getParameters()->setAutoSizeMode(AutoSizeMode::NEAREST);
        $generator->getParameters()->getImageWidth()->setPixels(300);
        $generator->getParameters()->getImageHeight()->setPixels(150);
        $image = $generator->generateBarcodeImage(BarCodeImageFormat::PNG);
        $reader = new BarCodeReader(($image), null, DecodeType::AUSTRALIA_POST);
        $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::N_TABLE);
        forEach($reader->readBarCodes() as $res)
        {
            print("CodeText : " . $res->getCodeText()."\n");
            print("CodeType : " . $res->getCodeTypeName()."\n");
        }
    }

  public function howToCustomerInformationInterpretingType2()
    {
        print("\nfunction '".__FUNCTION__."'\n");
        $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, null);
        $generator->setCodeText("6212345678ABCdef123#");
        $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::C_TABLE);
        $generator->getParameters()->setAutoSizeMode(AutoSizeMode::NEAREST);
        $generator->getParameters()->getImageWidth()->setPixels(300);
        $generator->getParameters()->getImageHeight()->setPixels(150);
        $image = $generator->generateBarcodeImage(BarCodeImageFormat::PNG);
        $reader = new BarCodeReader(($image), null, DecodeType::AUSTRALIA_POST);
        $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::C_TABLE);
        forEach($reader->readBarCodes() as $res)
        {
            print("CodeText : " . $res->getCodeText()."\n");
            print("CodeType : " . $res->getCodeTypeName()."\n");
        }
    }
}

set_license();
$barcodeReaderTests = new BarCodeReaderExamples();
$barcodeReaderTests->howToReadFromFile();
$barcodeReaderTests->howToSetQualitySettings();
$barcodeReaderTests->howToGetCodeBytes();
$barcodeReaderTests->howToRecognitionCode128();
$barcodeReaderTests->howToRecognitionCode11();
$barcodeReaderTests->howToRecognitionCodeAllSupportedTypes();
$barcodeReaderTests->howToRecognitionCodeAllSupportedTypes2();
$barcodeReaderTests->howToRecognitionSetBarCodeImage();
$barcodeReaderTests->howToMacroPdf417();
$barcodeReaderTests->howToDetectEncodingEnabled();
$barcodeReaderTests->howToCustomerInformationInterpretingType1();
$barcodeReaderTests->howToCustomerInformationInterpretingType2();
