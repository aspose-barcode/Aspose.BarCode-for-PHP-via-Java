<?php
namespace assist;

/**
 * Patterns that mark a method as a test.
 * Adjust if your project uses different naming.
 */
define('testNameKeyWords', array("/test/i", "/issue/i", "/Test/"));

/**
 * Lightweight test launcher for ad-hoc suites.
 *
 * Key fixes vs previous version:
 *  - Failures are logged per METHOD (not per class).
 *  - Final "class passed" line is printed only when there are NO failures.
 *  - More explicit class summary (passed/failed counts).
 *  - Optional non-zero exit code for CI via env TESTS_EXIT_ON_FINISH=1.
 */
class TestsLauncher
{
    /**
     * Validate input arguments and determine run mode.
     * Returns TestMode::DONT_RUN / ALL_FUNCTIONS / SPECIFIC_FUNCTIONS.
     */
    private static function validateArguments($className, ...$testNames)
    {
        if (empty($className)) {
            TestsAssist::prt_mess("Class name is empty");
            return \assist\TestMode::DONT_RUN;
        }
        if (empty($testNames)) {
            TestsAssist::prt_mess("List of tests names is empty");
            return \assist\TestMode::ALL_FUNCTIONS;
        }
        foreach ($testNames as $testName) {
            if (empty($testName)) {
                TestsAssist::prt_mess("One empty test name was met");
                return \assist\TestMode::ALL_FUNCTIONS;
            }
        }
        // More accurate wording: the list was PROVIDED, not PASSED.
        TestsAssist::prt_mess("List of specified tests were provided");
        return \assist\TestMode::SPECIFIC_FUNCTIONS;
    }

    /**
     * Detects @skip or @disabled tags in a method's PHPDoc.
     * If present, the test method will be skipped. Optional text after the tag
     * is returned in $reason (e.g. "@skip: unstable on PHP 7.4").
     */
    private static function hasSkipTag($classOrObject, string $methodName, ?string &$reason = null): bool
    {
        $reason = null;
        try {
            $rm = new \ReflectionMethod($classOrObject, $methodName);
        } catch (\ReflectionException $e) {
            return false;
        }

        $doc = $rm->getDocComment();
        if ($doc === false || $doc === null) {
            return false;
        }

        // Flatten whitespace to simplify regex matching.
        $flat = preg_replace('/\s+/', ' ', $doc);
        if ($flat === null) {
            $flat = $doc;
        }

        // Matches:
        //   @skip
        //   @skip: some reason
        //   @disabled
        //   @disabled: some reason
        if (preg_match('/@(skip|disabled)\b\s*(?::\s*(.*?))?(?:\s*@|$)/i', $flat, $m) === 1) {
            $r = trim(isset($m[2]) ? $m[2] : '');
            if ($r !== '') {
                $reason = $r;
            }
            return true;
        }
        return false;
    }

    /**
     * Launch tests for the given class.
     * If specific test names are provided, only those (that match filters) are executed.
     */
    public static function launch($className, ...$specifiedTestsNames)
    {
        $setUpName = "setUp";

        // Log prefixes/suffixes (kept to preserve your log style).
        $prefixNewTestClass       = "\n~Class tests: ";
        $prefixNewTestFunction    = "\n~Test function: ";
        $prefixPassedTestFunction = "\n~Passed test: ";
        $prefixFailedTestFunction = "\n~Failed test: ";          // per-method failure
        $prefixPassedTestClass    = "\n~Test class passed: ";
        $prefixFailedTestClass    = "\n~Test class failed: ";
        $suffix = '-----------';

        $testMode = self::validateArguments($className, ...$specifiedTestsNames);
        if (\assist\TestMode::DONT_RUN == $testMode) {
            TestsAssist::prt_mess("Class functions will be skipped");
            return;
        }

        TestsAssist::prt_mess($prefixNewTestClass . $className . $suffix);
        $classInstance = new $className;

        // 1) setUp (optional)
        if (method_exists($classInstance, $setUpName)) {
            TestsAssist::prt_mess("launch " . $setUpName);
            $setUpFunct = [$classInstance, $setUpName];
            $setUpFunct();
        }

        // 2) Build the list of methods to run
        $methodsToRun = [];
        $allMethods   = get_class_methods($classInstance) ?: [];
        $skippedCount = 0;
        $skippedNames = [];

        if (\assist\TestMode::ALL_FUNCTIONS == $testMode) {
            TestsAssist::prt_mess("All functions will be launched");
            foreach ($allMethods as $methodName) {
                if ($methodName === $setUpName) continue;

                // Filter by naming convention
                if (!self::isContainAtLeastOneWordInTestName($methodName, testNameKeyWords)) {
                    TestsAssist::prt_mess("method skipped: " . $methodName);
                    $skippedCount++;
                    $skippedNames[] = $methodName . " (filter)";
                    continue;
                }
                // Optional @skip/@disabled in PHPDoc
                $why = null;
                if (self::hasSkipTag($classInstance, $methodName, $why)) {
                    TestsAssist::prt_mess("method disabled by doc tag: {$methodName}" . ($why ? " ({$why})" : ""));
                    $skippedCount++;
                    $skippedNames[] = $methodName . ($why ? " ({$why})" : "");
                    continue;
                }
                $methodsToRun[] = $methodName;
            }
        } else {
            TestsAssist::prt_mess("Only specified functions will be launched");
            foreach ($specifiedTestsNames as $testName) {
                if ($testName === $setUpName) continue;

                if (!method_exists($classInstance, $testName)) {
                    TestsAssist::prt_mess("method not found: " . $testName);
                    $skippedCount++;
                    $skippedNames[] = $testName . " (not found)";
                    continue;
                }
                if (!self::isContainAtLeastOneWordInTestName($testName, testNameKeyWords)) {
                    TestsAssist::prt_mess("method skipped: " . $testName);
                    $skippedCount++;
                    $skippedNames[] = $testName . " (filter)";
                    continue;
                }
                $why = null;
                if (self::hasSkipTag($classInstance, $testName, $why)) {
                    TestsAssist::prt_mess("method disabled by doc tag: {$testName}" . ($why ? " ({$why})" : ""));
                    $skippedCount++;
                    $skippedNames[] = $testName . ($why ? " ({$why})" : "");
                    continue;
                }
                $methodsToRun[] = $testName;
            }
        }

        // 3) Run and collect results
        $passed = [];
        $failed = [];

        foreach ($methodsToRun as $methodName) {
            TestsAssist::prt_mess($prefixNewTestFunction . $methodName);
            try {
                $callable = [$classInstance, $methodName];
                $callable();
                TestsAssist::prt_mess($prefixPassedTestFunction . $className . "->" . $methodName . "!");
                $passed[] = $methodName;
            } catch (\Throwable $t) {
                // Log failure per METHOD (not class)
                TestsAssist::prt_mess($prefixFailedTestFunction . $className . "->" . $methodName . "!");
                TestsAssist::prt_mess("!#####! Error in test '{$methodName}': " . $t->getMessage());
                $failed[] = $methodName;
            }
        }

        // 4) Per-class summary
        $totalRun    = count($methodsToRun);
        $passedCount = count($passed);
        $failedCount = count($failed);

        if ($failedCount === 0 && $totalRun > 0) {
            TestsAssist::prt_mess($prefixPassedTestClass . $className . ", count of passed tests: " . $passedCount);
        } else {
            // Print a failed-class summary only if something actually ran
            // or if there were failures collected.
            TestsAssist::prt_mess($prefixFailedTestClass . $className . ", passed: {$passedCount}, failed: {$failedCount}");
        }

        // 5) Print a detailed summary block
        TestsAssist::prt_mess("\n===== Summary for {$className} =====");
        TestsAssist::prt_mess("Total tests run    : {$totalRun}");
        TestsAssist::prt_mess("Passed             : {$passedCount}" . ($passedCount ? " -> [" . implode(', ', $passed) . "]" : ""));

        if ($failedCount) {
            TestsAssist::prt_mess("Failed             : {$failedCount}");
            foreach ($failed as $name) {
                TestsAssist::prt_mess("  - {$name}");
            }
        } else {
            TestsAssist::prt_mess("Failed             : 0");
        }

        if ($skippedCount) {
            TestsAssist::prt_mess("Skipped (by filter/tags): {$skippedCount}");
            foreach ($skippedNames as $name) {
                TestsAssist::prt_mess("  - {$name}");
            }
        } else {
            TestsAssist::prt_mess("Skipped (by filter/tags): 0");
        }
        TestsAssist::prt_mess("====================================\n");

        // 6) Short compatibility lines used by existing logs
        TestsAssist::prt_mess("Total functions which were launched : {$totalRun} {$suffix}");
        TestsAssist::prt_mess("Tests have been passed : {$passedCount} {$suffix}");

        /**
         * 7) Optional exit code (useful for CI/IDE build steps).
         * Set environment variable TESTS_EXIT_ON_FINISH=1 to enable:
         *   - exit(0) when all tests passed;
         *   - exit(1) when there are failures.
         */
        if (getenv('TESTS_EXIT_ON_FINISH') === '1') {
            exit($failedCount > 0 ? 1 : 0);
        }
    }

    /**
     * Helper: does $className match a single regex $word ?
     */
    public static function isContainWordInTestName($className, $word)
    {
        if ($className === null || $word === null) {
            return false;
        }
        $result = @preg_match($word, $className);
        return $result === 1;
    }

    /**
     * Helper: does $className match at least one regex in $words ?
     */
    public static function isContainAtLeastOneWordInTestName($className, $words)
    {
        if ($className === null || $words === null || count($words) < 1) {
            return false;
        }
        foreach ($words as $word) {
            if (self::isContainWordInTestName($className, $word)) {
                return true;
            }
        }
        return false;
    }
}
