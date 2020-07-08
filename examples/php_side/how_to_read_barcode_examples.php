<?php

include_once("BarcodeReaderExamples.php");

$barcodeReaderTests = new BarcodeReaderExamples();
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
$barcodeReaderTests->howToCustomerInformationInterpretingType2();

?>
