#!/bin/bash

# Get the directory where this script is located
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

# Define the path to the JAR file relative to this script
JAR_PATH="$SCRIPT_DIR/../lib/aspose-barcode-php-25.7.jar"

# Define the log file path (optional)
LOG_FILE="$SCRIPT_DIR/server.log"

echo "Starting Thrift server..."

# Run the JAR file in the background and redirect output to a log file
nohup java -jar "$JAR_PATH" > "$LOG_FILE" 2>&1 &

echo "Thrift server started! Logs are in $LOG_FILE."

