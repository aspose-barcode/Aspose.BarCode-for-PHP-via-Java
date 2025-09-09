<?php

namespace Aspose\Barcode\Generation;

/**
 * QR / MicroQR selector mode. Select FORCE_QR for standard QR symbols, AUTO for MicroQR.
 * FORCE_MICRO_QR is used for strongly MicroQR symbol generation if it is possible.
 */
class  QREncodeType
{
    /**
     * Mode starts barcode version negotiation from MicroQR V1
     */
    const AUTO = "0";
    /**
     * Mode starts barcode version negotiation from QR V1
     */
    const FORCE_QR = "1";
    /**
     * Mode starts barcode version negotiation from from MicroQR V1 to V4. If data cannot be encoded into MicroQR, exception is thrown.
     */
    const FORCE_MICRO_QR = "2";
}