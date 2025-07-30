@echo off
:: Get the directory where this script is located
set SCRIPT_DIR=%~dp0

:: Define the path to the JAR file relative to bin/
set JAR_PATH=%SCRIPT_DIR%..\lib\aspose-barcode-php-25.7.jar

:: Define the log file path
set LOG_FILE=%SCRIPT_DIR%\server.log

echo Starting Thrift server...

:: Run the JAR file in the background and redirect output to a log file
REM start /B java -jar "%JAR_PATH%" > "%LOG_FILE%" 2>&1
start /B java -jar "%JAR_PATH%"

echo Thrift server started! Logs are in %LOG_FILE%.
exit
