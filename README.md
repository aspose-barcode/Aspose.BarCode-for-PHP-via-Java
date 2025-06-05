# Barcode Generation & Recognition via PHP

Aspose.BarCode for PHP via Java is a robust and reliable barcode generation and recognition component, written in PHP and Java. It allows developers to quickly and easily add barcode creation and scanning functionality to their PHP applications.

## General Barcode Features

- Supports most established barcode standards and barcode specifications.
- Ability to read & export barcodes in multiple image formats including BMP, GIF, JPEG & PNG.
- Provides full control over barcode images including background color, bar color, image quality, rotation angle, x-dimension, resolution and more.
- Complete control over barcode captions including caption font, back color, fore color, alignment, and location.
- Support for checksum.
- Support for X-dimension & Y-dimension for 2D BarCodes.
- Support for Wide to Narrow Ratio for supported symbologies.
- Support for DataMatrix barcode with X12, EDIFACT & Base 256 encoding.

## Barcode Recognition Features

- Can read most common 1D, 2D barcodes anywhere at any angle from an image.
- Specify an area in the image to scan the barcode
- Get region information for the barcodes recognized in the image

## Barcode Imaging Features

- Manipulate the barcodes image borders, border color, style, margins, width, etc.
- Rotate barcode images to any degree.
- Set anti-aliasing for barcode images.
- Manage barcode image margins.
- Customize image resolution.
- Set size in inches or millimeters.
- Auto size barcode images.

## Barcode Symbologies

**Numeric Only:** EAN13, EAN8, UPCA, UPCE, ISBN, ISMN, ISSN, Interleaved2of5, Standard2of5, MSI, Code11, Codabar, Postnet, Planet, EAN14(SCC14), SSCC18, ITF14, IATA 2 of 5, DatabarOmniDirectional, DatabarStackedOmniDirectional, DatabarExpandedStacked, DatabarStacked, DatabarLimited, DatabarTruncated\
**Alpha-Numeric:** GS1Code128, Code128, Code39 Extended, Code39 Standard, Code93 Extended, Code93 Standard, Australia Post, Italian Post 25, Matrix 2 of 5, DatabarExpanded, PatchCode\
**2D Symbologies:** PDF417, DataMatrix, Aztec, QR, MicroQR, GS1DataMatrix, Code16K, CompactPDF417, Swiss QR (QR Bill)

## Read Barcodes From

**Images:** BMP, GIF, JPEG, PNG, TIFF, TIFF_IN_CMYK, EMF, SVG, PDF

## Export Barcode Labels As Images

**Images:** BMP, GIF, JPEG, PNG, TIFF, TIFF_IN_CMYK, EMF, SVG, PDF

## Get Started with Aspose.BarCode for PHP via Java

Aspose.BarCode for PHP via Java is distributed uses a background Java server (via Apache Thrift) to bridge PHP and Java functionality.
#### Requirements
-Java 1.8 or higher
-PHP 7.4 or higher
-Composer

#### Installation Steps
1. Install the package via Composer:
   ```bash
   composer require aspose/barcode
   ```

2. In the root of the package, locate and run the `start_server.cmd` file to start the background Thrift server:
   ```batch
   start_server.cmd
   ```

   You can also embed a similar script into your own project:

   **Windows:**
   ```batch
   @echo off
   :: Get the directory where this script is located
   set SCRIPT_DIR=%~dp0

   :: Define the path to the JAR file relative to this script
   set JAR_PATH=%SCRIPT_DIR%vendor\aspose\barcode-php\lib\aspose-barcode-php-thrift-25.5.jar

   :: Define the log file path (optional)
   set LOG_FILE=%SCRIPT_DIR%server.log

   echo Starting Thrift server...
   start /B java -jar "%JAR_PATH%"
   echo Thrift server started! Logs are in %LOG_FILE%.
   exit
   ```

   **Linux and macOS:**
   ```bash
   #!/bin/bash

   # Get the directory where this script is located
   SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

   # Define the path to the JAR file relative to this script
   JAR_PATH="$SCRIPT_DIR/vendor/aspose/barcode-php/lib/aspose-barcode-php-thrift-25.5.jar"

   # Define the log file path (optional)
   LOG_FILE="$SCRIPT_DIR/server.log"

   echo "Starting Thrift server..."
   nohup java -jar "$JAR_PATH" > "$LOG_FILE" 2>&1 &
   echo "Thrift server started! Logs are in $LOG_FILE."
   ```

   This script launches a Java process using the JAR file:  
   `vendor/aspose/barcode-php/lib/aspose-barcode-php-thrift-25.5.jar`  
   Make sure the server is running by checking the console output or verifying that **port 9090** is open (e.g., using `netstat`).

3. Once the Thrift server is running, your PHP application can interact with the Java-based barcode engine  
   using the public API classes defined in the `Aspose\Barcode` namespace.  
   These classes act as **PHP client wrappers**, communicating with the backend over Apache Thrift.  
   You can use them to generate and recognize barcodes by simply calling methods as if they were native PHP objects,
   while the actual processing is performed on the Java side.

#### Sample code snippet for barcode recognition:
The example below shows how to initialize the barcode reader, apply a license, set checksum validation, and read barcodes 
from a sample image:  

```php
public function barcodeReaderExample()
{
  
    $license = new License();
    $license->setLicense(TestsAssist::PHP_LICENSE_PATH);
    $image_path = TestsAssist::TESTDATA_ROOT . "Recognition/1D/Code39/code39.gif";
    $reader = new BarCodeReader($image_path, null, null);
    $reader->getBarcodeSettings()->setChecksumValidation(ChecksumValidation::ON);
    $foundBarCodes = $reader->readBarCodes();
    $foundCount = $reader->getFoundCount();
    print("Count of found barcodes: ". $foundCount.PHP_EOL);
    print("CodeText " . $foundBarCodes[0]->getCodeText().PHP_EOL);
    print("CodeType " . $foundBarCodes[0]->getCodeType().PHP_EOL);
    print("CodeType " . $foundBarCodes[0]->getCodeTypeName().PHP_EOL);
}
```

#### Sample code snippet for barcode reading and generation:
The example below shows how to initialize the barcode generator, apply a license, generate barcode and read barcode:

```php
public function readAndGenerateExample()
{
    $license = new License();
    $license->setLicense(TestsAssist::PHP_LICENSE_PATH);
    $codeText = "12345678";
    $encodeType = EncodeTypes::CODE_11;
    $generator = new BarcodeGenerator($encodeType, $codeText);
    $base64Image = $generator->generateBarCodeImage(BarCodeImageFormat::PNG);
    $reader = new BarCodeReader($base64Image, null, null);
    $resultsArray = $reader->readBarCodes();
    $barCodeResult = $resultsArray[0];
    $codeText = $barCodeResult->getCodeText();
    $codeType = $barCodeResult->getCodeTypeName();
    print("codeText " . $codeText);
    print("codeType " . $codeType);
}
```

For detailed instructions, please refer to the [official documentation](https://docs.aspose.com/barcode/phpjava/).

[Product](https://products.aspose.com/barcode) | [Documentation](https://products.aspose.com/barcode/php-java) | [Blog](https://blog.aspose.com/category/barcode/) | [API Reference](https://apireference.aspose.com/barcode/java) | [Search](https://search.aspose.com/) | [Free Support](https://forum.aspose.com/c/barcode) | [Temporary License](https://purchase.aspose.com/temporary-license)
