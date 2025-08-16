<?php
namespace assist;

use Aspose\Barcode\BarCodeImageFormat;
use Aspose\Barcode\BarCodeReader;
use Aspose\Barcode\Internal\License;
use Aspose\Barcode\Internal\Rectangle;
use Exception;

class TestsAssist
{
    public const CURRENT_PATH = __DIR__ . '/';
    public const TESTDATA_ROOT = self::CURRENT_PATH . '../../../../../../testdata/';
    public const GENERATED_IMAGES_FOLDER = self::TESTDATA_ROOT . 'Generated/';
    public const RESOURCES_ROOT = self::CURRENT_PATH . '../resources/';
    public const RESULTS_ROOT = self::RESOURCES_ROOT . 'results/';
    public const LICENSE_ROOT = self::TESTDATA_ROOT . 'License/';
    public const PHP_LICENSE_PATH = self::LICENSE_ROOT . 'sha256/Aspose/PHP/Aspose.BarCode.PHP.Java.256.lic';

    public static function prt_mess($in)
    {
        print($in . "\n");
    }

    public static function prt_warn($in)
    {
        error_log($in);

    }

    public static function prt_error($in)
    {
        trigger_error($in, E_USER_WARNING);
    }

    public static function pathCombine($folder, $file)
    {
        return $folder . "/" . $file;
    }

    /**
     * Create rectangle from points array
     *
     * @param region      Barcode region
     * @param points      points array
     * @param minMatching rectangles matching from 0 to 1
     */
    public static function checkBarcodesRegionMatching($region, $points, $minMatching)
    {
        //do quick solutuion by rectangles intersection
        $lRegRect = self::createRectangleFromPoints($region->getPoints());
        $lPointsRect = self::createRectangleFromPoints($points);

        //intersect rect
        $lIntersectRect = Rectangle::intersect($lRegRect, $lPointsRect);
        if ($lIntersectRect == null) {
            Assert::fail("Barcode rectangle " . $lRegRect->toString() . " and rectangle " . $lPointsRect->toString() . " don't intersect.\n");
        }

        //match
        $lRegRectSquare = $lRegRect->getWidth() * $lRegRect->getHeight();
        $lPointsRectSquare = $lPointsRect->getWidth() * $lPointsRect->getHeight();
        $lIntersectRectSquare = $lIntersectRect->getWidth() * $lIntersectRect->getHeight();
        $lMaxResultedRect = max($lRegRectSquare, $lPointsRectSquare);
        $lMatching = $lIntersectRectSquare / $lMaxResultedRect;

        //write
        print("Barcode rectangle " . $lRegRect->toString() . " and rectangle " . $lPointsRect->toString() . " intersect in rectangle " . $lIntersectRect->toString() . " with matching " . ($lMatching * 100.0) . "%");

        if ($lMatching < $minMatching) {
            Assert::fail("Barcode rectangle " . $lRegRect->toString() . " and rectangle " . $lPointsRect->toString() . " intersect in rectangle " . $lIntersectRect->toString() . " with matching " . ($lMatching * 100.0) . "%\n" . "Required matching is " . ($minMatching * 100.0) . "%\n");
        }
    }

    /**
     * Create rectangle from points array
     *
     * @param points points array
     * @return rectangle from the points
     */
    public static function createRectangleFromPoints($points)
    {
        $lMinX = $points[0]->getX();
        $lMaxX = $points[0]->getX();
        $lMinY = $points[0]->getY();
        $lMaxY = $points[0]->getY();
        for ($i = 0; $i < sizeof($points); ++$i) {
            $lItem = $points[$i];
            $lMinX = min($lMinX, $lItem->getX());
            $lMaxX = max($lMaxX, $lItem->getX());
            $lMinY = min($lMinY, $lItem->getY());
            $lMaxY = max($lMaxY, $lItem->getY());
        }

        return new Rectangle($lMinX, $lMinY, $lMaxX - $lMinX + 1, $lMaxY - $lMinY + 1);
    }

    public static function printClassName($name)
    {
        print("\n<br>-----<br>\n####### Class name = '" . $name . "'<\br>\n");
    }

    public static function printMethodName($name)
    {
        print("\n<br>-----<br>\n## test name = '" . $name . "'<\br>\n");
    }

    public static function printTestFullName($obj)
    {
        print("\n<br>-----<br>\n###### TEST '" . get_class($obj) . "->" . $obj->getName(true) . "'<\br>\n\n");
    }

    public static function getResultsPath($sub_folder, $image_name)
    {
        try {
            return self::RESULTS_ROOT . $sub_folder . "/" . $image_name;
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function saveResult($generator, $sub_folder, $image_name)
    {
        try {
            return self::save($generator, results_root . $sub_folder . "/" . $image_name);
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function save($generator, $path): bool
    {
        try {
            self::prt("Will be saved to : " . $path);
            $generator->save($path, \Aspose\Barcode\BarCodeImageFormat::PNG);
            return file_exists($path);
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function saveImage($image_bytes, $path): bool
    {
        try {
            self::prt("Will be saved to : " . $path);
            file_put_contents($path, $image_bytes);
            return file_exists($path);
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function saveImageResult($image_bytes, $sub_folder, $image_name): bool
    {
        try {
            return TestsAssist::saveImage($image_bytes, $sub_folder . "/" . $image_name);
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function prt($in)
    {
        try {
            if (is_string($in)) {
                print ($in . "\n");
            } elseif (is_array($in)) {
                print_r($in);
            } elseif (is_object($in)) {
                if (is_a($in, 'java_InternalJava')) {
                    print("Class: ");
                    print ("java_InternalJava" . "\n");
                    print ("Wrapping Java class => " . $in->__signature . "\n");
                    echo("Actual value => " . $in . "\n");
                } else {
                    $class_name = get_class($in);
                    $about_class = "Class: ";
                    $about_class .= $class_name . "\n";
                    $class_methods = get_class_methods($in);
                    $about_class .= "List of methods: " . "\n";
                    foreach ($class_methods as $current) {
                        $about_class .= $current . "; " . "\n";
                    }
                    print($about_class . "\n");
                }
            }
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function check_is_exists(string $file_path, string $var_name = ""): bool
    {
        $var_info = $var_name ? " ($var_name)" : "";
        if (file_exists($file_path)) {
            print ("##path exists$var_info: '$file_path'\n");
            return true;
        }
        print ("##path doesn't exist$var_info: '$file_path'\n");
        return false;
    }

    public static function print_check_is_exists(string $file_path): void
    {
        if (file_exists($file_path)) {
            print ("##path exists : '$file_path'\n");
        } else {
            print ("##path doesnt exist : '$file_path'\n");
        }
    }

    public static function set_slicense(): void
    {
        self::set_license(\assist\TestsAssist::PHP_LICENSE_PATH);
    }

    public static function set_license($path_to_license_file): void
    {
        $license = new License();
        if (!file_exists($path_to_license_file)) {
            throw new BarcodeTestException("Path \"" . $path_to_license_file . "\" doesn't exist");
        } else {
            $license->setLicense($path_to_license_file);
        }
    }

    public static function check_image_from_path($file_path, $expected_code_text, $decode_type): bool
    {
        try {
            $image_data_base64 = self::load_image_base64_from_path($file_path);
            return self::check_image_base64($image_data_base64, $expected_code_text, $decode_type);
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    /**
     * Expects bytes that were read directly from image, not base64 encoded bytes
     * @param $image_bytes - bytes that were read directly from image, not base64 encoded bytes
     * @param $expected_code_text
     * @param $decode_type
     * @return bool
     * @throws BarcodeTestException
     */
    public static function check_image_bytes($image_bytes, $expected_code_text, $decode_type): bool
    {
        try {
            $actual_code_text = self::read_image_base64(($image_bytes), $decode_type);
            if (strcmp($actual_code_text, $expected_code_text) == 0) {
                return true;
            }
            return false;
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex);
            throw $barcode_exception;
        }
    }

    public static function check_image_base64($image_base64, $expected_code_text, $decode_type): bool
    {
        try {
            $actual_code_text = self::read_image_base64($image_base64, $decode_type);
            if (strcmp($actual_code_text, $expected_code_text) == 0) {
                return true;
            }
            return false;
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex);
            throw $barcode_exception;
        }
    }

    public static function check_image_path($image_path, $expected_code_text, $decode_type): bool
    {
        try {
            $actual_code_text = self::read_image_base64($image_path, $decode_type);
            if (strcmp($actual_code_text, $expected_code_text) == 0) {
                return true;
            }
            return false;
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex);
            throw $barcode_exception;
        }
    }

    public static function check_image_all_types($image, $expected_code_text): bool
    {
        try {
            $actual_code_text = self::read_image_base64_all_types($image);
            if (strcmp($actual_code_text, $expected_code_text) == 0) {
                return true;
            }
            return false;
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function read_image_base64($image_base64, $decode_type): string
    {
        $reader = null;
        try {
            $reader = new BarCodeReader($image_base64, null, array($decode_type));
            foreach ($reader->readBarCodes() as $result) {
                return $result->getCodeText("UTF-8");
            }
//        return $reader;
            return ""; //TODO
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function read_image_base64_all_types($image_base64): string
    {
        try {
            return TestsAssist::read_image_base64($image_base64, DecodeType::ALL_SUPPORTED_TYPES);
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function load_image_base64_from_path($filePath): string
    {
        try {
            $image_bytes = file_get_contents($filePath);
            $image_data_base64 = base64_encode($image_bytes);
            return $image_data_base64;
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function check_image_from_file_path($path, $file_name, $expected_code_text, $decode_type): bool
    {
        try {
            $file_path = $path . $file_name;
            return TestsAssist::check_image_from_path($file_path, $expected_code_text, $decode_type);
        } catch (\Exception $ex) {
            $barcode_exception = new BarcodeTestException($ex->getMessage());
            throw $barcode_exception;
        }
    }

    public static function loadImageByName($subFolder, $fileName): string
    {
        $filePath = "$subFolder/$fileName";
        $image_data_base64 = TestsAssist::load_image_base64_from_path($filePath);
        return $image_data_base64;
    }

    public static function assertValueCloseTo($check_value, $actual_value, $max_difference)
    {
        $diff = abs($check_value - $actual_value);
        $max_difference = abs($max_difference);
        $msg = "Checked Value is:" . $check_value . " Actual Value is:" . $actual_value . " Difference is:" . $diff . " Allowed difference is:" . $max_difference;
        if ($max_difference < $diff) {
            Assert::fail($msg);
        }
    }

    public static function saveBase64Image($base64Image, $filePath)
    {
        TestsAssist::prt("Image will be saved to : $filePath");
        $success = file_put_contents($filePath, base64_decode($base64Image));
        if ($success === false) {
            echo "Failed to write image to: $filePath\n";
        } else {
            echo "Image saved to: $filePath\n";
        }
    }

    public static function check_paths() {
        self::check_is_exists(self::CURRENT_PATH);
        self::check_is_exists(self::TESTDATA_ROOT);
        self::check_is_exists(self::RESULTS_ROOT);
        self::check_is_exists(self::PHP_LICENSE_PATH);
    }

}
