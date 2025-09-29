<?php
require_once __DIR__ . '/Generation.php';
require_once __DIR__ . '/Recognition.php';
require_once __DIR__ . '/ComplexBarcode.php';

// Include Thrift-generated DTOs (Bridge)
$bridgeDir = __DIR__ . '/Bridge';
foreach (glob($bridgeDir . '/*.php') as $bridgeFile) {
    require_once $bridgeFile;
}