<?php

namespace assist;

use Aspose\Barcode\ BarcodeImageFormat;

include_once('../../assist/TestsAssist.php');
include_once('../../assist/Assert.php');
include_once('../../assist/TestsLauncher.php');
include_once('../../assist/IOTestUtils.php');

abstract class IgetBarcodeGenerator
{
    public abstract function getBarcodeGenerator();
}

class FrameworkTestUtils
{
    public static function getPostFixValue()
    {
        $res = "";
        return $res;
    }

    public static function addFrameworkPostFixToFileName(string $filepath)
    {
        $path = dirname($filepath);
        $filename = basename($filepath);
        $point = strripos($filename, '.');

        $fname = substr($filename, 0, $point);
        $ename = substr($filename, $point);
        $postfix = FrameworkTestUtils::getPostFixValue();

        $res = "";
        if (empty($postfix))
            $res = $path . "/" . $fname . $ename;
        else
            $res = $path . "/" . $fname . "_" . $postfix . $ename;
        return $res;
    }

    /// <summary>
    /// Stores bitmap to fileName
    /// </summary>
    /// <param name="filename">bitmap filename.</param>
    /// <param name="src">storing bitmap.</param>
    public static function storeBitmap(string $filename, string $src)
    {
        IOTestUtils::storeBitmap(FrameworkTestUtils::addFrameworkPostFixToFileName($filename), $src);
    }

    /// Compare two bitmaps by pixels.
    /// <param name="filenameExpected">Expected bitmap, filename.</param>
    /// <param name="srcReal">Generated bitmap, Base64</param>
    public static function compareBitmaps(string $filenameExpected, string $srcRealBase64)
    {
        $expected = IOTestUtils::loadToBase64Image(FrameworkTestUtils::addFrameworkPostFixToFileName($filenameExpected));
        TestHelper::compareImagesBase64($expected, $srcRealBase64);
    }

    public static function generateAndSave($gen, string $folder, string $filename)
    {
        $generator = $gen->getBarcodeGenerator(\Aspose\Barcode\BarCodeImageFormat::PNG);
        FrameworkTestUtils::generateAndSaveBarcodeGenerator($generator, $folder, $filename);
    }

    public static function generateAndSaveBarcodeGenerator($generator, string $folder, string $filename)
    {
        FrameworkTestUtils::storeBitmap(($folder . "/" . $filename), $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
    }

    static function generateAndCompare($gen, string $folder, string $filename)
    {
        $generator = $gen->getBarcodeGenerator(\Aspose\Barcode\BarCodeImageFormat::PNG);
        FrameworkTestUtils::generateAndCompareBarcodeGenerator($generator, $folder, $filename);
    }

    public static function generateAndCompareBarcodeGenerator($generator, string $folder, string $filename)
    {
        FrameworkTestUtils::compareBitmaps($folder . "/" . $filename, $generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG));
    }

    public static function compareImagesPathAndBase64($expectedImagePath, $actualImageBase64)
    {
        $imageDataExp = file_get_contents($expectedImagePath);
        $imageBase64Exp = base64_encode($imageDataExp);
        // Remove prefix in data if it's presented
        $base64ImageExp = preg_replace('/^data:image\/\w+;base64,/', '', $imageBase64Exp);
        return $base64ImageExp === $actualImageBase64;
    }
}