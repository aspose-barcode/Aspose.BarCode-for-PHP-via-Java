<?php
namespace assist;

use Exception;

class Assert
{
    private static $prefix = "~ Assert :  ";

    private static function printMessage($message)
    {
        print(Assert::$prefix . $message . "\n");
    }

    private static function throwException($message, $file = "", $line = "")
    {
        Assert::printMessage("Position:" . $file . ":" . $line);
        print(Assert::$prefix . "Exception occurred:" . $message . "\n");
        throw new Exception(Assert::$prefix . $message . "\n");
    }

    public static function assertTrue($value, $file = "", $line = ""): void
    {
        Assert::printMessage("Position:" . $file . ":" . $line);
        if ($value === true || $value === "true") {
            Assert::printMessage("value is true as expected");
            return;
        }
        Assert::throwException("expected true, but value is false");
    }

    public static function assertFalse($value, $file = "", $line = ""): void
    {
        Assert::printMessage("Position:" . $file . ":" . $line);
        if ($value === false || $value === "false") {
            Assert::printMessage("value is false as expected");
            return;
        }
        Assert::throwException("expected false, but value is true");
    }

    public static function assertNull($value, $file = "", $line = ""): void
    {
        Assert::printMessage("Position:" . $file . ":" . $line);
        if (is_null($value)) {
            Assert::printMessage("value is null");
            return;
        }
        Assert::throwException("expected null, but value is not null");
    }

    public static function assertNotNull($value, $file = "", $line = ""): void
    {
        Assert::printMessage("Position:" . $file . ":" . $line);
        if (!is_null($value)) {
            Assert::printMessage("value is not null as expected");
            return;
        }
        Assert::throwException("expected not null, but value is null");
    }

    private static function formatValue($value): string
    {

        if (is_object($value)) {
            if (method_exists($value, "toString")) {
                return $value->toString();
            }
            if (method_exists($value, "__toString")) {
                return $value->__toString();
            } else {
                return "";
            }
        }
        return $string_value = strval($value);
    }

    public static function assertEquals($expected, $actual, $file = "", $line = ""): void
    {
        Assert::printMessage("Position:" . $file . ":" . $line);
        if (is_array($expected) && !is_array($actual)) {
            Assert::throwException("expected (". $expected . ") value is array but  actual (" . $actual . ") is not array");
        }
        if (!is_array($expected) && is_array($actual)) {
            Assert::throwException("expected (" . $expected . ") value is not array but  actual (" . $actual .") is array");
        }
        if (is_array($expected) && is_array($actual)) {
            if ($expected != $actual) {
                Assert::printMessage("expected and actual values are not equals");
                TestsAssist::prt("expected : ");
                TestsAssist::prt($expected);
                TestsAssist::prt("actual : ");
                TestsAssist::prt($actual);
                Assert::throwException("expected and actual arrays are not equals");
            } else {
                Assert::printMessage("expected and actual values equals --> ");
                TestsAssist::prt("expected : ");
                TestsAssist::prt($expected);
                TestsAssist::prt("actual : ");
                TestsAssist::prt($actual);
                return;
            }
        }
        $expected_formatted = self::formatValue($expected);
        $actual_formatted = self::formatValue($actual);

        if (method_exists($expected, "equals") && method_exists($actual, "equals")) {
            if ($expected->equals($actual)) {
                Assert::printMessage("expected and actual values equals --> " . $expected_formatted);
                return;
            }
        } else {
            if ($expected == $actual) {
                Assert::printMessage("expected and actual values equals --> " . $expected_formatted);
                return;
            }
        }
        Assert::throwException("expected $expected_formatted and actual $actual_formatted values are not equal");
    }

    public static function assertNotEquals($expected, $actual, $file = "", $line = ""): void
    {
        Assert::printMessage("Position:" . $file . ":" . $line);
        $expected_formatted = self::formatValue($expected);
        $actual_formatted = self::formatValue($actual);

        if (method_exists($expected, "equals") && method_exists($actual, "equals")) {
            if ($expected->equals($actual)) {
                Assert::throwException("expected and actual values equals --> " . $expected_formatted . ", but should not be equals");
            }
        } else {
            if ($expected == $actual) {
                Assert::throwException("expected and actual values equals --> " . $expected_formatted . ", but should not be equals");
            }
        }
        Assert::printMessage("expected $expected_formatted and actual $actual_formatted values are not equal as expected");
    }

    public static function assertEqualsSpecMess($expected, $actual, $message): void
    {
        if (method_exists($expected, "equals") && method_exists($actual, "equals")) {
            if ($expected->equals($actual)) {
                Assert::printMessage("expected ($expected) and actual ($actual) values are equals");
                return;
            }
        } else {
            if ($expected == $actual) {
                Assert::printMessage("expected ($expected) and actual ($actual) values are equals");
                return;
            }
        }

        if (empty($message)) {
            $message = "expected and actual values are different:\nexpected: $expected\nactual: $actual\n";
        }
        Assert::throwException($message);
    }

    public static function assertFileExists($file_path, $file = "", $line = ""): void
    {
        Assert::printMessage("Position:" . $file . ":" . $line);
        if (file_exists($file_path)) {
            Assert::printMessage("File path $file_path exists");
        } else {
            Assert::throwException("File path $file_path absent");
        }
    }

    public static function fail($message)
    {
        Assert::throwException($message);
    }

    public static function assertStringContainsString($subString, $wholeString, $file = "", $line = "")
    {
        Assert::printMessage("Position:" . $file . ":" . $line);
        if (strpos($wholeString, $subString) !== false) {
            Assert::printMessage("String contains substring: \n" .
                "  ~ wholeString -> \n" . $wholeString . "\n  ~ subString -> \n" . $subString);
        } else {
            Assert::throwException("String doesnt contain substring: \n" .
                "  ~ whole string -> \n $wholeString \n  ~ substring -> \n $subString");
        }
    }


}


//print(Assert::assertStringContainsString("We are tdhsdjashd", "dfd "));