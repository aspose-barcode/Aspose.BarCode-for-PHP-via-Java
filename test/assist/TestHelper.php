<?php
namespace assist;
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\DecodeType;
use Aspose\Barcode\QualitySettings;
use assist\CodetextWithType;;
use assist\CollectionAssert;
use assist\TestAssist;

class TestHelper
{
    public static function compareImagesFromPathWithTolerance($image1Path, $image2Path, $tolerance = 10)
    {
        // Getting images from path
        $imageDataString1 = file_get_contents($image1Path);
        $imageDataString2 = file_get_contents($image2Path);
        return self::compareImagesStringsFromPathWithTolerance($imageDataString1, $imageDataString2, $tolerance);
    }

    public static function compareImagesStringsFromPathWithTolerance($imageDataString1, $imageDataString2, $tolerance)
    {
        // Загрузка изображений
        $imageResource1 = imagecreatefromstring($imageDataString1);
        $imageResource2 = imagecreatefromstring($imageDataString2);
        return self::compareImagesResourcesWithTolerance($imageDataString1, $imageDataString2, $tolerance);
    }

    public static function compareImagesResourcesWithTolerance($imageResource1, $imageResource2, $tolerance)
    {
        // Image size match check
        if (imagesx($imageResource1) != imagesx($imageResource2) || imagesy($imageResource1) != imagesy($imageResource2)) {
            return false; // Images have different sizes
        }

        $width = imagesx($imageResource1);
        $height = imagesy($imageResource1);
        $totalPixels = $width * $height;
        $differentPixels = 0;

        // Pixels comparison
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                if (imagecolorat($imageResource1, $x, $y) !== imagecolorat($imageResource2, $x, $y)) {
                    $differentPixels++;
                }
            }
        }

        // Calculate the percentage of differences
        $differencePercentage = ($differentPixels / $totalPixels) * 100;

        // Compare the percentage of differences with the given tolerance
        return $differencePercentage <= $tolerance;
    }


    public static function convertBase64ToBinaryImage($base64ImageData)
    {
        $base64Replaced = preg_replace('/^data:image\/\w+;base64,/', '', $base64ImageData);
        // Convert Base64 to binary data
        $imageData = base64_decode($base64Replaced);
        return $imageData;
    }

    public static function writeBinaryImageToFile($imageData, $outputFile)
    {
        // Write binary data to file
        file_put_contents($outputFile, $imageData);
    }

    /**
     * @deprecated use compareImagesFromPathWithTolerance(),compareImagesStringsFromPathWithTolerance,
     * compareImagesResourcesWithTolerance
     */
    public static function compareImages($expectedImagePath, $actualImagePath)
    {
        $imageExp = imagecreatefromstring(file_get_contents($expectedImagePath));
        $imageAct = imagecreatefromstring(file_get_contents($actualImagePath));

        if (imagesx($imageExp) != imagesx($imageAct) || imagesy($imageExp) != imagesy($imageAct)) {
            return false; // Images have different sizes
        }

        for ($x = 0; $x < imagesx($imageExp); $x++) {
            for ($y = 0; $y < imagesy($imageExp); $y++) {
                if (imagecolorat($imageExp, $x, $y) != imagecolorat($imageAct, $x, $y)) {
                    return false; // Pixels differ
                }
            }
        }
        return true; // Pixels the same
    }

    /**
     * @deprecated use compareImagesFromPathWithTolerance(),compareImagesStringsFromPathWithTolerance,
     * compareImagesResourcesWithTolerance
     */
    public static function compareImagesViaBase64($expectedImagePath, $actualImagePath)
    {
        $expectedImageBase64 = TestsAssist::load_image_base64_from_path($expectedImagePath);
        $actualImageBase64 = TestsAssist::load_image_base64_from_path($actualImagePath);
        TestHelper::compareImagesBase64($expectedImageBase64, $actualImageBase64);
    }

    /**
     * @deprecated use compareImagesFromPathWithTolerance(),compareImagesStringsFromPathWithTolerance,
     * compareImagesResourcesWithTolerance
     */
    public static function compareImagesBase64($expectedImageBase64, $actualImageBase64)
    {
        Assert::assertEquals($expectedImageBase64, $actualImageBase64);
    }

    public static function compareImagesDimensions($expectedImageBase64, $actualImageBase64)
    {
        $delta = 1;
        $actualImageDimension = self::getImageDimensions($actualImageBase64);
        $expectedImageDimension = self::getImageDimensions($expectedImageBase64);

        Assert::assertTrue(abs($actualImageDimension[0] - $expectedImageDimension[0]) <= $delta &&
            abs($actualImageDimension[1] - $expectedImageDimension[1]) <= $delta);
    }

    private static function getImageDimensions($bitmap)
    {
        $binary = base64_decode($bitmap);
        return getimagesizefromstring($binary);
    }

    public static function checkForFakeBarcodes($filename, $expectedBarcodes, $decodeType, $qualitySettings)
    {
        if ($qualitySettings == null)
            $qualitySettings = QualitySettings::getNormalQuality();
        if ($expectedBarcodes == null)
            $expectedBarcodes = array();
        if ($decodeType == null)
            $decodeType = DecodeType::ALL_SUPPORTED_TYPES;

        $reader = new BarCodeReader($filename, null, $decodeType);
        $reader->readBarCodes();

        $recognizedBarcodes = array();
        foreach($reader->getFoundBarCodes() as $result)
            array_push($recognizedBarcodes, new CodetextWithType($result->getCodeType(), $result->getCodeText("UTF-8")));

        CollectionAssert::isSubsetOf($recognizedBarcodes, $expectedBarcodes, false);
    }
}

?>
