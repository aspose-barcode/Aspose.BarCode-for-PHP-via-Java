<?php
namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\CommonUtility;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\License;
use Aspose\Barcode\Internal\Point;
use Aspose\Barcode\Internal\Rectangle;
use Aspose\Barcode\Internal\ThriftConnection;
use DateTime;
use Exception;

use Aspose\Barcode\Bridge\QuadrangleDTO;
use Aspose\Barcode\Bridge\CodabarExtendedParametersDTO;
use Aspose\Barcode\Bridge\DataMatrixExtendedParametersDTO;
use Aspose\Barcode\Bridge\Code128DataPortionDTO;
use Aspose\Barcode\Bridge\AustraliaPostSettingsDTO;
use Aspose\Barcode\Bridge\GS1CompositeBarExtendedParametersDTO;
use Aspose\Barcode\Bridge\AztecExtendedParametersDTO;
use Aspose\Barcode\Bridge\DotCodeExtendedParametersDTO;
use Aspose\Barcode\Bridge\MaxiCodeExtendedParametersDTO;
use Aspose\Barcode\Bridge\DataBarExtendedParametersDTO;
use Aspose\Barcode\Bridge\Pdf417ExtendedParametersDTO;
use Aspose\Barcode\Bridge\QRExtendedParametersDTO;
use Aspose\Barcode\Bridge\Code128ExtendedParametersDTO;
use Aspose\Barcode\Bridge\OneDExtendedParametersDTO;
use Aspose\Barcode\Bridge\BarCodeExtendedParametersDTO;
use Aspose\Barcode\Bridge\BarCodeRegionParametersDTO;
use Aspose\Barcode\Bridge\BarCodeResultDTO;
use Aspose\Barcode\Bridge\QualitySettingsDTO;
use Aspose\Barcode\Bridge\BarcodeSettingsDTO;
use Aspose\Barcode\Bridge\BarcodeReaderDTO;
use InvalidArgumentException;
use TypeError;


/**
 * Enable checksum validation during recognition for 1D barcodes.
 * Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible.
 * Checksum never used: Codabar
 * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN
 * Checksum always used: Rest symbologies
 *
 * This sample shows influence of ChecksumValidation on recognition quality and results
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "1234567890128");
 * $generator->save("test.png", BarcodeImageFormat::PNG);
 * $reader = new BarCodeReader("test.png", null, DecodeType::EAN_13);
 * //checksum disabled
 * $reader->setChecksumValidation(ChecksumValidation::OFF);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
 *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
 * }
 * $reader = new BarCodeReader("test.png", null, DecodeType::EAN_13);
 * //checksum enabled
 * $reader->setChecksumValidation(ChecksumValidation::ON);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
 *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
 * }
 * @endcode
 */
class ChecksumValidation
{
    /**
     *    If checksum is required by the specification - it will be validated.
     */
    const DEFAULT = 0;

    /**
     *    Always validate checksum if possible.
     */
    const ON = 1;

    /**
     *    Do not validate checksum.
     */
    const OFF = 2;
}