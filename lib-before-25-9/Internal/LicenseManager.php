<?php

namespace Aspose\Barcode\Internal;

use Exception;

class LicenseManager
{
    private static ?LicenseManager $instance = null;
    private ?string $base64LicenseContent = null;
    private bool $isLicenseLoaded = false; // Flag: is the license file loaded

    private function __construct()
    {
    }

    public static function getInstance(): LicenseManager
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function loadLicense(string $licenseFilePath): void
    {
        // Ensure the license hasn’t been loaded yet
        if ($this->isLicenseLoaded) {
            return;
        }

        if (!is_file($licenseFilePath)) {
            throw new Exception("License file not found: $licenseFilePath");
        }

        $fileContents = file_get_contents($licenseFilePath);
        $this->base64LicenseContent = base64_encode($fileContents);
        $this->isLicenseLoaded = true; // Define the flag
    }

    public function setLicenseContent(?string $licenseContent): void
    {
        $this->base64LicenseContent = $licenseContent;
        $this->isLicenseLoaded = true; // Define the flag
    }

    public function getLicenseContent(): ?string
    {
        return $this->base64LicenseContent;
    }

    public function resetLicenseData(): void
    {
        $this->base64LicenseContent = null;
        $this->isLicenseLoaded = false; // Reset the loaded flag
    }
}