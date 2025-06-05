@echo off
cd /d %~dp0

echo ===============================
echo Installing PHP dependencies...
echo ===============================

composer install --no-cache --no-interaction
REM composer install

if errorlevel 1 (
    echo Composer install failed!
    pause
    exit /b 1
)

echo Composer dependencies installed successfully.
pause
