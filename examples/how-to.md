# Instructions for Running Supplied Examples

## Required Software
To check the supplied examples, the following software must be available:

- **PHP 7.0 or higher**  
  [Download PHP](https://www.php.net/downloads.php)
- **Java SE 8 or higher**  
  [Download Java SE 8](https://www.oracle.com/java/technologies/javase/javase8u211-later-archive-downloads.html)

**Optional:**
- **Java Bridge**  
  [Download Java Bridge](https://sourceforge.net/projects/php-java-bridge/files/Binary%20package/php-java-bridge_7.2.1/exploded/JavaBridge.jar/download)

**Note:**  
`JavaBridge.jar` and `Java.inc` are components of Java Bridge.

---

## File Locations
- The script for launching the server resides in the `java_side` folder.
- The files relevant to the PHP side are located in the `php_side` folder.

---

## Procedure to Launch Examples

1. **Add the License File**
    - Place the license file `Aspose.BarCode.PHP.Java.lic` in the `lic` folder.
    - Running the examples without a license will restrict some functionality, as per the licensing rules.
    - The expected license file name is `Aspose.BarCode.PHP.Java.lic`.
    - If your license file has a different name, update the name in the `examples.ini` file.

2. **Run the JavaBridge Server**
    - Run JavaBridge server. The easiest way to start the server is by running the `run-bridge.bat` script.
    - By default, the server will run on port `8999`.
    - To use a different port, update the port number in the `run-bridge.bat` script.

3. **Run Example Scripts**

    - **To run `how_to_generate_and_read_example.php`:**
        - Open the file in an IDE and execute it, **or**
        - Run the following command from inside the `php_side` folder:
          ```bash
          php -n -dallow_url_include=On how_to_generate_and_read_example.php
          ```

    - **To run `how_to_generate_barcode_examples.php`:**
        - Open the file in an IDE and execute it, **or**
        - Use the following command:
          ```bash
          php -n -dallow_url_include=On how_to_generate_barcode_examples.php
          ```

    - **To run `how_to_read_barcode_examples.php`:**
        - Open the file in an IDE and execute it, **or**
        - Use the following command:
          ```bash
          php -n -dallow_url_include=On how_to_read_barcode_examples.php
          ```

---

## Notes on JavaBridge Integration

- If JavaBridge is running on port `8080`, you can use the following statement in your PHP script:
  ```php
  require_once("Java.inc");
  ```
Ensure that the Java.inc file is in the same folder as your PHP script.
If you are using a different port, update the statement as follows:
  ```php
   require_once("http://localhost:<port_number>/JavaBridge/java/Java.inc");
  ```
For example, if the port is 8083:
  ```php
   require_once("http://localhost:8083/JavaBridge/java/Java.inc");
  ```
The default statement for port 8080 is also acceptable:
  ```php
   require_once("http://localhost:8080/JavaBridge/java/Java.inc");
  ```
