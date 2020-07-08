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
        while ($reader->read())
        {
            print($reader->getCodeText(false));
            print("\n");
            print($reader->getCodeTypeName());
        }
        $reader->close();
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

        while ($reader->read())
        {
            print($reader->getCodeText(false));
            print("\n");
            print($reader->getCodeTypeName());
        }
        $reader->close();
    }


    public function howToGetCodeBytes()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        $expectedCodeBytes = array("105", "99", "70", "1", "61", "0", "0", "2", "70", "10", "82", "20", "40", "0", "97", "106");
        $fileName = "example2.jpg";
        $reader = new BarcodeReader(loadImageByName($this->subfolder, $fileName), null, null);
       while($reader->read())
       {
           $actualCodeBytes = $reader->getCodeBytes();
           print("expected code bytes  : ".sizeof($expectedCodeBytes));
           print("\n");
           print("actual code bytes  : ".sizeof($actualCodeBytes));
       }
    }

    public function howToRecognitionCode128()
    {
        print("\n---\nfunction '".__FUNCTION__."'\n");
        try
        {
            $fileName = "code128.jpg";
            $reader = new BarcodeReader(loadImageByName($this->subfolder, $fileName), null, DecodeType::CODE_128);
            while($reader->read())
            {
                print("Code Text : ".$reader->getCodeTypeName());
                print("\n");
                print("Code Type : ".$reader->getCodeText(false));
            }
            $reader->close();
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
            while($reader->read())
            {
                print("Code Text : ".$reader->getCodeTypeName());
                print("\n");
                print("Code Type : ".$reader->getCodeText(false));
            }
            $reader->close();
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
            while($reader->read())
            {
                print("Code Text : ".$reader->getCodeTypeName());
                print("\n");
                print("Code Type : ".$reader->getCodeText(false));
            }
            $reader->close();
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
            while($reader->read())
            {
                print("Code Text : ".$reader->getCodeTypeName());
                print("\n");
                print("Code Type : ".$reader->getCodeText(false));
            }
            $reader->close();
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

        while($reader->read())
        {
            print("Code Text : ".$reader->getCodeTypeName());
            print("\n");
            print("Code Type : ".$reader->getCodeText(false));
        }
        $reader->close();
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
        while($reader->read())
        {
            print("CodeText : ".$reader->getCodeText(false));
            print("getMacroPdf417FileID : ".$reader->getMacroPdf417FileID()."\n");
            print("getMacroPdf417SegmentID : ".$reader->getMacroPdf417SegmentID()."\n");
            print('getMacroPdf417SegmentsCount : '.$reader->getMacroPdf417SegmentsCount()."\n");
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
        while ($reader->read())
        {
            print("CodeText : " . $reader->getCodeText(false));
            print "\n";
            print("CodeType : " . $reader->getCodeTypeName());
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
        while ($reader->read())
        {
            print("CodeText : " . $reader->getCodeText(false));
            print "\n";
            print("CodeType : " . $reader->getCodeTypeName());
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
        while ($reader->read())
        {
            print("CodeText : " . $reader->getCodeText(false));
            print "\n";
            print("CodeType : " . $reader->getCodeTypeName());
        }
    }


}