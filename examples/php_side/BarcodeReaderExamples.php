<?php
include_once("tests_assist.php");

class BarcodeReaderExamples
{
    private $subfolder = "resources/recognition/";

    public function howToReadFromFile()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        $file_name = "code11.png";
        $full_path = $this->subfolder.$file_name;
        print(file_exists($full_path));
        $reader = new BarcodeReader($full_path, null, null);
        forEach($reader->readBarCodes() as $res)
        {
            print($res->getCodeText());
            print("\n");
            print($res->getCodeTypeName());
        }

    }

    public function howToSetQualitySettings()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        $file_name = "code11.png";
        $full_path = $this->subfolder.$file_name;
        print(file_exists($full_path));
        $reader = new BarcodeReader($full_path, null, null);
        $reader->setQualitySettings(QualitySettings::getHighPerformance());
        $reader->getQualitySettings()->setAllowMedianSmoothing(true);
        $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);

        forEach($reader->readBarCodes() as $res)
        {
            print($res->getCodeText());
            print("\n");
            print($res->getCodeTypeName());
        }

    }


    public function howToGetCodeBytes()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        $fileName = "example2.jpg";
        $reader = new BarcodeReader(loadImageByName($this->subfolder, $fileName), null, null);
       forEach($reader->readBarCodes() as $res)
       {
           $actualCodeBytes = $res->getCodeBytes();
           print("code bytes  : ".sizeof($actualCodeBytes));
       }
    }

    public function howToRecognitionCode128()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        try
        {
            $fileName = "code128.jpg";
            $reader = new BarcodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::CODE_128);
            forEach($reader->readBarCodes() as $res)
            {
                print("Code Text : ".$res->getCodeTypeName());
                print("\n");
                print("Code Type : ".$res->getCodeText());
            }

        }
        catch (BarcodeException $e)
        {
            print($e->getMessage());
        }
    }

    public function howToRecognitionCode11()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        try
        {
            $fileName = "code11.png";
            $reader = new BarcodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::CODE_11);
            forEach($reader->readBarCodes() as $res)
            {
                print("Code Text : ".$res->getCodeTypeName());
                print("\n");
                print("Code Type : ".$res->getCodeText());
            }

        }
        catch (BarcodeException $e)
        {
            print($e->getMessage());
        }
    }

  public function howToRecognitionCodeAllSupportedTypes()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        try
        {
            $fileName = "example2.jpg";
            $reader = new BarcodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::ALL_SUPPORTED_TYPES);
            forEach($reader->readBarCodes() as $res)
            {
                print("Code Text : ".$res->getCodeTypeName());
                print("\n");
                print("Code Type : ".$res->getCodeText());
            }

        }
        catch (BarcodeException $e)
        {
            print($e->getMessage());
        }
    }

public function howToRecognitionCodeAllSupportedTypes2()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        try
        {
            $fileName = "example1.png";
            $reader = new BarcodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::ALL_SUPPORTED_TYPES);
            forEach($reader->readBarCodes() as $res)
            {
                print("Code Text : ".$res->getCodeTypeName());
                print("\n");
                print("Code Type : ".$res->getCodeText());
            }

        }
        catch (BarcodeException $e)
        {
            print($e->getMessage());
        }
    }

    public function howToRecognitionSetBarCodeImage()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        $fileName = "code128.jpg";
        $reader = new BarcodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::ALL_SUPPORTED_TYPES);
        $reader->setBarCodeImage($this->subfolder . "code11.png", null);

        forEach($reader->readBarCodes() as $res)
        {
            print("Code Text : ".$res->getCodeTypeName());
            print("\n");
            print("Code Type : ".$res->getCodeText());
        }

    }

    public function howToMacroPdf417()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        $gen = new BarcodeGenerator(EncodeTypes::MACRO_PDF_417, null);
        $gen->setCodeText("codeSomecode");
        $gen->getParameters()->getBarcode()->getPdf417()->setPdf417MacroFileID(15900);
        $gen->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentID(2);
        $gen->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentsCount(3);
        $image = $gen->generateBarcodeImage("PNG");
        $reader = new BarCodeReader(($image), null, DecodeType::MACRO_PDF_417);
        forEach($reader->readBarCodes() as $res)
        {
            print("CodeText : ".$res->getCodeText());
            print("getMacroPdf417FileID : ".$res->getExtended()->getPdf417()->getMacroPdf417FileID()."\n");
            print("getMacroPdf417SegmentID : ".$res->getExtended()->getPdf417()->getMacroPdf417SegmentID()."\n");
            print('getMacroPdf417SegmentsCount : '.$res->getExtended()->getPdf417()->getMacroPdf417SegmentsCount()."\n");
        }

    }


    public function howToDetectEncodingEnabled()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        $gen = new BarcodeGenerator(EncodeTypes::QR, null);
        $gen->setCodeText("Слово");
        $gen->getParameters()->getBarcode()->getQR()->setCodeTextEncoding("UTF-8");
        $image = $gen->generateBarcodeImage("PNG");

        $reader = new BarCodeReader(($image), null, DecodeType::QR);
        $reader->setDetectEncoding(true);
        forEach($reader->readBarCodes() as $res)
        {
            print("CodeText : " . $res->getCodeText());
            print "\n";
            print("CodeType : " . $res->getCodeTypeName());
        }
    }

    public function howToCustomerInformationInterpretingType1()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, null);
        $generator->setCodeText("59123456781234567");
        $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::N_TABLE);
        $image = $generator->generateBarcodeImage("PNG");
        $reader = new BarCodeReader(($image), null, DecodeType::AUSTRALIA_POST);
        $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::N_TABLE);
        forEach($reader->readBarCodes() as $res)
        {
            print("CodeText : " . $res->getCodeText());
            print "\n";
            print("CodeType : " . $res->getCodeTypeName());
        }
    }

  public function howToCustomerInformationInterpretingType2()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, null);
        $generator->setCodeText("6212345678ABCdef123#");
        $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::C_TABLE);
        $image = $generator->generateBarcodeImage("PNG");
        $reader = new BarCodeReader(($image), null, DecodeType::AUSTRALIA_POST);
        $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::C_TABLE);
        forEach($reader->readBarCodes() as $res)
        {
            print("CodeText : " . $res->getCodeText());
            print "\n";
            print("CodeType : " . $res->getCodeTypeName());
        }
    }


}