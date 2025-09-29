<?php
namespace Aspose\Barcode\Recognition;

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