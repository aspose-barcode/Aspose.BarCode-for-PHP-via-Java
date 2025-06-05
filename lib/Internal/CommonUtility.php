<?php
namespace Aspose\Barcode\Internal;

use ReflectionClass;

class CommonUtility
{
    public static function isPath($file)
    {
        if (strlen($file) < 256 && (strpos($file, "/") || strpos($file, "\\"))) {
            if (file_exists($file)) {
                return true;
            }
            self::println("The passed argument seems like a path but doesn't exist");
            return false;
        }
        return false;
    }

    //TODO BARCODEPHP-919 Make fixes and improvements in exception handling on the Java and PHP sides
    public static function convertBarcodeExceptionDto($barcodeExceptionDto): BarcodeException
    {
        $barcodeException = new BarcodeException();
        $barcodeException->setMessage($barcodeExceptionDto->message);
        $barcodeException->setKind($barcodeExceptionDto->kind);
        $barcodeException->setStackTrace($barcodeExceptionDto->getTraceAsString());
        return $barcodeException;
    }

    public static function are_all_null($array)
    {
        foreach ($array as $element) {
            if ($element != null) {
                return false;
            }
        }
        return true;
    }

    public static function is_any_null($array)
    {
        foreach ($array as $element) {
            if (is_null($element))
            {
                return true;
            }
        }
        return false;
    }

    public static function isClassContainsConstantValueFromArray($className, $array)
    {
        if (is_null($array)) {
            throw new BarcodeException('Passed parameter as array actually is null');
        }
        if (!is_array($array)) {
            throw new BarcodeException('Passed parameter is not array actually');
        }
        if (self::is_any_null($array)) {
            throw new BarcodeException('Passed array contains null element');
        }
        foreach ($array as $element) {
//            $className = 'DecodeType';
            if (self::isClassContainsConstValue($className, $element)) {
                return true;
//                throw new BarcodeException('All elements of passed array should be instances of DecodeType class');
            }
        }
        return false;
    }

    public static function isClassContainsConstValue($className, $expectedValue)
    {
        $reflectionClass = new ReflectionClass($className);
        $constants = $reflectionClass->getConstants();
        foreach ($constants as $name => $constantValue) {
            if ($constantValue === $expectedValue) {
//                echo "Class $className contains constant with value '$expectedValue'";
                return true;
            }
        }
        return false;
    }

    public static function println(string $string = '')
    {
        print($string . PHP_EOL);
    }

    public static function areAllNull($array)
    {
        foreach ($array as $element) {
            if ($element !== null) {
                return false;
            }
        }
        return true;
    }

    public static function convertAreasToStringFormattedAreas($areas): array
    {
        $stringFormattedAreas = array();
        if (!is_null($areas)) {
            if (is_array($areas)) {
                if (!CommonUtility::areAllNull($areas)) {
                    foreach ($areas as $area) {
                        if (is_null($area) || !($area instanceof Rectangle))
                            throw new BarcodeException('All elements of $areas should be instances of Rectangle class');
                        array_push($stringFormattedAreas, $area->toString());
                    }
                }
            } else {
                if (!($areas instanceof Rectangle))
                    throw new BarcodeException('All elements of $areas should be instances of Rectangle class');
                array_push($stringFormattedAreas, $areas->toString());
            }
        }
        return $stringFormattedAreas;
    }

    public static function convertImageResourceToBase64($imageResource): ?string
    {
        if (is_null($imageResource)) {
            return null;
        }

        // Handle resource types
        if (is_resource($imageResource)) {
            $type = get_resource_type($imageResource);

            if ($type === 'gd') {
                ob_start();
                imagepng($imageResource);
                $imageData = ob_get_contents();
                ob_end_clean();
                return base64_encode($imageData);
            }

            if ($type === 'file') {
                $imageData = stream_get_contents($imageResource);
                fclose($imageResource);
                return base64_encode($imageData);
            }

            throw new BarcodeException("This resource type is not supported: " . $type);
        }
        // Handle string input
        if (is_string($imageResource)) {
            // Check if it's already a valid base64 string
            if (base64_encode(base64_decode($imageResource, true)) === $imageResource) {
                return $imageResource;
            }

            // Check if it's a valid file path
            if (is_file($imageResource)) {
                $fileContent = file_get_contents($imageResource);
                return base64_encode($fileContent);
            }

            // If it's a string but file does not exist
            if (!file_exists($imageResource)) {
                throw new BarcodeException("File does not exist: " . $imageResource);
            }
        }

        throw new BarcodeException("Unsupported input type. Expected GD resource, file resource, base64 string, or valid file path.");
    }


}

