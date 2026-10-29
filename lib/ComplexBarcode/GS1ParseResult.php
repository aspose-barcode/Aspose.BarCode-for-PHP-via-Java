<?php

namespace Aspose\Barcode\ComplexBarcode;
use Aspose\Barcode\Bridge\GS1ParseResultDTO;
use Aspose\Barcode\Common\GS1ValidationResult;

/** Immutable, by-value return result of GS1Codetext/GS1DigitalLink::tryParse(). */
final class GS1ParseResult {
    private $dto;
    private $result;
    private $validationResult;

    /**
     * @param string $resultClass GS1Codetext::class or GS1DigitalLink::class.
     */
    public function __construct(GS1ParseResultDTO $dto, string $resultClass) {
        if ($resultClass !== GS1Codetext::class && $resultClass !== GS1DigitalLink::class)
            throw new \InvalidArgumentException('Unknown GS1 parse result type');
        $this->dto = $dto;
        $this->result = $dto->result === null ? null : $resultClass::construct($dto->result);
        $this->validationResult = GS1ValidationResult::construct($dto->validationResult);
    }

    public function isSuccess(): bool { return $this->dto->success; }
    public function getResult(): ?IComplexCodetext { return $this->result; }
    public function getValidationResult(): ?GS1ValidationResult { return $this->validationResult; }
}
