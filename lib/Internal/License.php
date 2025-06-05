<?php

namespace Aspose\Barcode\Internal;

use Exception;

class License
{
    public function __construct()
    {
    }

    public function setLicense(string $licenseFileOrBase64Content): void
    {
        try {
            if (is_file($licenseFileOrBase64Content)) {
                $this->setLicenseFromFile($licenseFileOrBase64Content);
            } else {
                if ($this->isValidBase64($licenseFileOrBase64Content)) {
                    $this->setLicenseFromBase64($licenseFileOrBase64Content);
                } else {
                    throw new Exception("Invalid license content: not a valid file path or Base64 content.");
                }
            }
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public static function getLicenseContent(): string
    {
        $licenseContent = LicenseManager::getInstance()->getLicenseContent();

        if ($licenseContent === null) {
            throw new Exception("License content is not set. Make sure to call setLicense() first.");
        }

        return $licenseContent;
    }

    public function setLicenseFromFile(string $licenseFilePath): void
    {
        try {
            $licenseManager = LicenseManager::getInstance();
            $licenseManager->loadLicense($licenseFilePath);

            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $client->LicensePHP_setLicense($licenseManager->getLicenseContent());
            $thriftConnection->closeConnection();
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function setLicenseFromBase64(string $licenseContent): void
    {
        try {
            $licenseManager = LicenseManager::getInstance();
            $licenseManager->setLicenseContent($licenseContent);

            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $client->LicensePHP_setLicense($licenseManager->getLicenseContent());
            $thriftConnection->closeConnection();
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function isLicensed(): bool
    {
        $isLicensed = false;
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $isLicensed = $client->LicensePHP_isLicensed();
            $thriftConnection->closeConnection();
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
        return $isLicensed;
    }

    public function resetLicense(): void
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $client->LicensePHP_resetLicense();
            $thriftConnection->closeConnection();

            $licenseManager = LicenseManager::getInstance();
            $licenseManager->resetLicenseData(); // Clear license data
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * This method is intended only for cases where license content
     * is passed to the methods readBarCodes() and generateBarCodeImage()
     * with the flag $passLicense = true)
     * @param string $licenseFilePath path to license file
     * @return void
     * @throws Exception
     */
    public static function prepareLicenseContent(string $licenseFilePath)
    {
        $licenseManager = LicenseManager::getInstance();
        $licenseManager->loadLicense($licenseFilePath);
    }

    /**
     * Validation of the Base64 string
     */
    private function isValidBase64(string $string): bool
    {
        return base64_encode(base64_decode($string, true)) === $string;
    }
}