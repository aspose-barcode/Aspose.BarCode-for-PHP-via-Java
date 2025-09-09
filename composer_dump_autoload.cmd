@echo off
setlocal
cd /d "%~dp0"

rem 1) На всякий случай чистим служебную переменную Composer,
rem    чтобы она не подменяла путь к composer.json
set "COMPOSER="

if not exist "composer.json" (
  echo [ERROR] %CD%\composer.json not found
  exit /b 1
)

rem 2) Находим Composer-CLI
where composer >nul 2>nul
if %errorlevel%==0 (
  set "COMPOSER_CMD=composer"
) else (
  if exist "composer.phar" (
    set "COMPOSER_CMD=php -d xdebug.mode=off composer.phar"
  ) else (
    echo [ERROR] Composer not found in PATH and composer.phar is missing
    exit /b 1
  )
)

echo [INFO] %CD% -> %COMPOSER_CMD% dump-autoload -o
%COMPOSER_CMD% dump-autoload -o
exit /b %errorlevel%
