<?php

namespace Aspose\Barcode\Internal;

use Aspose\Barcode\Bridge\ThriftAsposeBarcodeServiceClient;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;

class ThriftConnection
{
    private $client;
    private $transport;

    function openConnection()
    {
        $socket = new TSocket('localhost', 9090);
        $socket->setSendTimeout(1000000);
        $socket->setRecvTimeout(2000000);
        $this->transport = new TBufferedTransport($socket);
        $protocol = new TBinaryProtocol($this->transport);

        $this->client = new ThriftAsposeBarcodeServiceClient($protocol);
        $this->transport->open();

        return $this->client;
    }

    function closeConnection()
    {
        $this->transport->close();
    }
}