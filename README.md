### Aspose.BarCode-for-PHP-via-Java
Aspose.BarCode for PHP via Java is a robust and reliable barcode generation and recognition component, 
written in PHP and Java.
It allows developers to quickly and easily add barcode generation and  recognition functionality 
to their PHP applications.  

#### General Barcode Features
   Aspose.BarCode for PHP via Java supports most established barcode standards 
  and barcode specifications. It has the ability to export to multiple image formats including: 
  BMP, GIF, JPEG, PNG.  
  With Aspose.BarCode for PHP via  Java, developers have full control over every aspect of the barcode image including: 
  background color, bar color, image quality, rotation angle, x-dimension, captions, 
  customer defined resolution and more.  
  Aspose.BarCode can read and recognize most common 1D and 2D barcodes from any image and at any angle.
   It's supported the different kinds of symbologies.
   Barcode Code text (data to be encoded to barcode image) can be set.
   Its appearance-related properties like font, back color, forecolor, alignment, and location (hide, above, below) etc. 
   can also be modified.
   Checksum is supported.
   Barcode Caption and its font, back color, fore color, alignment, and location (hide, above, below) can be managed.
   The bar height of the barcode images can be customized.
    X-dimension, Y-dimension (for 2D BarCodes) are also supported.
    Code128 encoding is exceptionally optimized.
    Wide to Narrow Ratio can be achieved for supported symbologies.
    DataMatrix barcode with X12, EDIFACT and Base 256 encoding 
    Available a lot of different Barcode types for recognizing and generating. 

#### Barcode Recognition Features
   BarcodeReader reads most common 1D, 2D barcodes anywhere at any angle from an image.
   Specify an area in the image to scan the barcode 
   Get region information for the barcodes recognized in the image
	
#### Barcode Imaging Features
  Manipulate the barcode image borders, border color, style, margins, width, etc.
  Barcode image color, back color, and bar color can be modified.
  Rotate barcode images to any degree.
  High-quality barcode images.
  Anti-Aliasing for barcode images.
  Barcode image margins can be managed.
  Customized resolution.
  Size in inches and millimeters.
  Auto Sizing of barcode images.
  Create barcode images in any desired image format like BMP, JPEG, GIF, PNG

#### Input Image Formats
JPEG
PNG
BMP
GIF

#### Output Image Formats
JPEG
PNG
BMP
GIF

#### Supported Barcode Symbologies
###### Numeric Only Symbologies
EAN13
EAN8
UPCA
UPCE
ISBN
ISMN
ISSN
Interleaved2of5
Standard2of5
MSI
Code11
Codabar
Postnet
Planet
EAN14(SCC14)
SSCC18
ITF14
IATA 2 of 5
DatabarOmniDirectional
DatabarStackedOmniDirectional
DatabarExpandedStacked
DatabarStacked
DatabarLimited
DatabarTruncated

###### Alpha-Numeric Symbologies
GS1Code128
Code128
Code39 Extended
Code39 Standard
Code93 Extended
Code93 Standard
Australia Post
Italian Post 25
Matrix 2 of 5
DatabarExpanded
PatchCode

###### 2D Symbologies
PDF417
DataMatrix
Aztec
QR
MicroQR
GS1DataMatrix
Code16K
CompactPDF417
Swiss QR (QR Bill)

Aspose.BarCode supports both encoding and decoding (generation and recognition) 
for all the listed symbologies.

#### Installation
###### Install PHP application into J2SE
1. Install Java 1.7 or above
2. Install PHP 7.0 or above into the operating system PATH.
3. Put `aspose-barcode-php-xx.x.jar` to certain location, for example folder 'jar'
4. Launch the JavaBridge by command
`"%JAVA_HOME%\bin\java" -Djava.ext.dirs=../jar -jar JavaBridge.jar SERVLET_LOCAL:8888`
where `-Djava.ext.dirs=../jar` points to the location of `aspose-barcode-php-xx.x.jar`
You can appoint a port by your choice. We use `8888` just for example to differ from standard servers port numbers.
5. Test the connection to JavaBridge
`http://localhost:8888/JavaBridge/java/Java.inc`
6. Deploy php files from folder `lib` to your web application on webserver
For example to `C:/xampp/htdocs/Barcode`
7. Add `require` statement to your php code
`require_once("http://localhost:8888/JavaBridge/java/Java.inc");`
You can find example in `examples/php_side/test_assist.php` file.
8. Now you can use the PHP API supplied by Aspose.Barcode PHP classes.
 
 
 ###### Install PHP application by using Tomcat 
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

You can find the installation instructions for php/Java bridge on page
http://php-java-bridge.sourceforge.net/pjb/installation.php

[Product Page](https://products.aspose.com/barcode) | [Product Documentation](https://products.aspose.com/barcode/php-java) | [Blog](https://blog.aspose.com/category/barcode/) |[API Reference](https://apireference.aspose.com/barcode/java) | [Source Code Samples](https://github.com/aspose-barcode/Aspose.BarCode-for-PHP-via-Java) | [Free Support](https://forum.aspose.com/c/barcode) | [Temporary License](https://purchase.aspose.com/temporary-license)