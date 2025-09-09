<?php
namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\BarcodeExceptionDTO;
use Aspose\Barcode\Bridge\ExtCodeItemDTO;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\CommonUtility;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\License;
use Aspose\Barcode\Internal\ThriftConnection;


use Aspose\Barcode\Bridge\BorderParametersDTO;
use Aspose\Barcode\Bridge\HanXinParametersDTO;
use Aspose\Barcode\Bridge\CouponParametersDTO;
use Aspose\Barcode\Bridge\CodabarParametersDTO;
use Aspose\Barcode\Bridge\Code128ParametersDTO;
use Aspose\Barcode\Bridge\AztecParametersDTO;
use Aspose\Barcode\Bridge\MaxiCodeParametersDTO;
use Aspose\Barcode\Bridge\SupplementParametersDTO;
use Aspose\Barcode\Bridge\QrStructuredAppendParametersDTO;
use Aspose\Barcode\Bridge\QrParametersDTO;
use Aspose\Barcode\Bridge\Pdf417ParametersDTO;
use Aspose\Barcode\Bridge\ITFParametersDTO;
use Aspose\Barcode\Bridge\DotCodeParametersDTO;
use Aspose\Barcode\Bridge\Code16KParametersDTO;
use Aspose\Barcode\Bridge\DataMatrixParametersDTO;
use Aspose\Barcode\Bridge\CodablockParametersDTO;
use Aspose\Barcode\Bridge\GS1CompositeBarParametersDTO;
use Aspose\Barcode\Bridge\DataBarParametersDTO;
use Aspose\Barcode\Bridge\AustralianPostParametersDTO;
use Aspose\Barcode\Bridge\PostalParametersDTO;
use Aspose\Barcode\Bridge\CodetextParametersDTO;
use Aspose\Barcode\Bridge\PatchCodeParametersDTO;
use Aspose\Barcode\Bridge\BarcodeParametersDTO;
use Aspose\Barcode\Bridge\PaddingDTO;
use Aspose\Barcode\Bridge\FontUnitDTO;
use Aspose\Barcode\Bridge\CaptionParametersDTO;
use Aspose\Barcode\Bridge\UnitDTO;
use Aspose\Barcode\Bridge\SvgParametersDTO;
use Aspose\Barcode\Bridge\PdfParametersDTO;
use Aspose\Barcode\Bridge\ImageParametersDTO;
use Aspose\Barcode\Bridge\BaseGenerationParametersDTO;
use Aspose\Barcode\Bridge\BarcodeGeneratorDTO;
use DateTime;
use Exception;
use InvalidArgumentException;


/**
 * <p>
 * Level of Reed-Solomon error correction. From low to high: L1, L2, L3, L4.
 * </p>
 */
class HanXinErrorLevel
{
    /**
     * <p>
     * Allows recovery of 8% of the code text
     * </p>
     */
    const L1 = 0;
    /**
     * <p>
     * Allows recovery of 15% of the code text
     * </p>
     */
    const L2 = 1;
    /**
     * <p>
     * Allows recovery of 23% of the code text
     * </p>
     */
    const L3 = 2;
    /**
     * <p>
     * Allows recovery of 30% of the code text
     * </p>
     */
    const L4 = 3;
}
