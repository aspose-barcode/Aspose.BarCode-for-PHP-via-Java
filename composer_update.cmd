@echo off
cd /d %~dp0

echo ===============================
echo Updating PHP dependencies...
echo ===============================

composer update --no-cache --no-interaction

if errorlevel 1 (
    echo Composer update failed!
    pause
    exit /b 1
)

echo Composer dependencies updated successfully.
pause
