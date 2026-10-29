<?php
namespace Aspose\Barcode\Internal;

use GdImage;
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

    public static function convertAreasToIntArray($areas): array
    {
        if (is_null($areas)) {
            return [];
        }

        $areas = is_array($areas) ? $areas : [$areas];

        if (CommonUtility::areAllNull($areas)) {
            return [];
        }

        $result = [];

        foreach ($areas as $area) {
            if (!($area instanceof Rectangle)) {
                throw new BarcodeException(
                    'All elements of $areas should be instances of Rectangle class'
                );
            }

            $result[] = $area->getX();
            $result[] = $area->getY();
            $result[] = $area->getWidth();
            $result[] = $area->getHeight();
        }

        return $result;
    }

    public static function convertImageResourceToBinary($imageResource): ?string
    {
        if ($imageResource === null) {
            return null;
        }

        if (is_resource($imageResource)) {
            $type = get_resource_type($imageResource);

            switch ($type) {
                case 'gd':
                    ob_start();

                    if (!imagepng($imageResource)) {
                        ob_end_clean();
                        throw new BarcodeException(
                            "Failed to convert GD image to binary data"
                        );
                    }

                    $imageData = ob_get_clean();

                    if ($imageData === false) {
                        throw new BarcodeException(
                            "Failed to get binary data from GD image"
                        );
                    }

                    return $imageData;

                case 'stream':
                    $imageData = stream_get_contents($imageResource);

                    if ($imageData === false) {
                        throw new BarcodeException(
                            "Failed to read from stream resource"
                        );
                    }

                    return $imageData;

                default:
                    throw new BarcodeException(
                        "Unsupported resource type: $type"
                    );
            }
        }

        if (is_string($imageResource)) {
            if (
                file_exists($imageResource) &&
                is_file($imageResource) &&
                is_readable($imageResource)
            ) {
                $imageData = file_get_contents($imageResource);

                if ($imageData === false) {
                    throw new BarcodeException(
                        "Failed to read file content: $imageResource"
                    );
                }

                return $imageData;
            }

            // Оставить только если публичный API по-прежнему
            // должен принимать Base64 от пользователя.
            $decoded = base64_decode($imageResource, true);

            if ($decoded !== false) {
                return $decoded;
            }

            throw new BarcodeException(
                "File does not exist, is unreadable, or invalid base64 string: $imageResource"
            );
        }

        throw new BarcodeException(
            "Unsupported input type. Expected GD resource, stream resource, base64 string, or valid file path."
        );
    }
}