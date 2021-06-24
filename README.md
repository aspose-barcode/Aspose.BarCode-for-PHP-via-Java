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

- Manipulate the barcode's image borders, border color, style, margins, width, etc.
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

**Images:** JPEG, TIFF, PNG, BMP

## Save Barcode Labels As

**Images:** JPEG, TIFF, PNG, BMP

## Get Started with Aspose.BarCode for PHP via Java

### Install PHP application into J2SE

1. Install Java 1.8 or above
2. Install PHP 7.0 or above into the operating system PATH.
3. Put `aspose-barcode-php-xx.x.jar` to certain location, for example folder 'jar'
4. Prepare JavaBridge. You need to place JavaBridge.jar to a specific path and add it to the classpath.
   Or you can just point the path to JavaBridge.jar via command
   `-jar path/to/JavaBridge.jar`
5. Launch the JavaBridge by command
   `"%JAVA_HOME%\bin\java" -Djava.ext.dirs=../jar -jar JavaBridge.jar SERVLET_LOCAL:8888`
   where `-Djava.ext.dirs=../jar` points to the location of `aspose-barcode-php-xx.x.jar`
   and `-jar  JavaBridge.jar` points to the location of `JavaBridge.jar`
   You can appoint a port by your choice. We use `8888` just for example to differ from standard servers port numbers.
6. Test the connection to JavaBridge
   `http://localhost:8888/JavaBridge/java/Java.inc`
7. Deploy php files from folder `lib` to your web application on webserver
   For example to `C:/xampp/htdocs/Barcode`
8. Add `require` statement to your php code
   `require_once("http://localhost:8888/JavaBridge/java/Java.inc");`
   You can find example in `examples/php_side/test_assist.php` file.
9. Now you can use the PHP API supplied by Aspose.Barcode PHP classes.
 
 
 ### Install PHP application by using Tomcat 
 
1. Download and install original Apache Tomcat software and copy JavaBridge.war to its autodeploy folder.
For example you can install Tomcat like  `C:/apache-tomcat-9.0.37` 
and copy JavaBridge.war to `webapps` folder of Tomcat`C:/apache-tomcat-9.0.37/webapps`.
3. Run `C:/apache-tomcat-9.0.37/bin/startup.bat`, JavaBridge.war will be deployed to `C:/apache-tomcat-9.0.37/webapps/JavaBridge`.
3. Copy aspose-barcode-php-xx.x.jar to `lib` folder, such as `C:/apache-tomcat-9.0.37/webapps/JavaBridge/WEB-INF/lib`.
Restart Tomcat.
5. Test `http://localhost:8080/JavaBridge/java/Java.inc` to ensure that PHP works fine.
6. Deploy php files from the folder 'lib' to your web application on webserver
For example to `C:/xampp/htdocs/Barcode`
7. Add 'require' statement to your php code
`require_once("http://localhost:8080/JavaBridge/java/Java.inc");`
You can find example in examples/php_side/test_assist.php file.
8. Now you can use the PHP API supplied by Aspose.Barcode PHP classes.

You can find the installation instructions for php/Java bridge on http://php-java-bridge.sourceforge.net/pjb/installation.php.

[Product](https://products.aspose.com/barcode) | [Documentation](https://products.aspose.com/barcode/php-java) | [Blog](https://blog.aspose.com/category/barcode/) | [API Reference](https://apireference.aspose.com/barcode/java) | [Search](https://search.aspose.com/) | [Free Support](https://forum.aspose.com/c/barcode) | [Temporary License](https://purchase.aspose.com/temporary-license)
