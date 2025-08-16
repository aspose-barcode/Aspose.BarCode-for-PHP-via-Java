<?php
namespace assist;
use Aspose\Barcode\Internal\License;
use Exception;

include_once('./tests_assist.php');

class LicenseAssist
{
    public static function set_license()
    {
        TestsAssist::prt_mess("called set_license()");
        try {
            LicenseAssist::set_license_file(TestsAssist::PHP_LICENSE_PATH);
        }
        catch (\Exception $ex) {
            TestsAssist::prt_error($ex->getMessage());
        }
    }

    static function set_license_file($path_to_license_file): void
    {
        try {
            $license = new License();
            if (!TestsAssist::check_is_exists($path_to_license_file)) {
                TestsAssist::prt_warn("Path \"" . $path_to_license_file . "\" doesn't exist");
            }
            else {
                $license->setLicense($path_to_license_file);
            }
            $is_licensed = $license->isLicensed();
            TestsAssist::prt_mess('is_licensed => ' . $is_licensed);
        }
        catch (\Exception $ex) {
            TestsAssist::prt_error($ex->getMessage());
        }
    }
}

LicenseAssist::set_license();