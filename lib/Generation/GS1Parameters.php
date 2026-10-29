<?php
namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\GS1ParametersDTO;
use Aspose\Barcode\Internal\Communicator;

/**
 * GS1 parameters.
 */
final class GS1Parameters implements Communicator {
    private $dto;

    public function __construct(GS1ParametersDTO $dto) { $this->dto = $dto; }
    public function getGS1ParametersDto(): GS1ParametersDTO { return $this->dto; }
    public function obtainDto(...$args) { return $this->dto; }
    public function initFieldsFromDto() { }

    /**
     * Specifies the level of GS1 data validation.
     * Default value: GS1ValidationLevel::CONTENT.
     *
     * @return int The level of GS1 data validation (GS1ValidationLevel).
     */
    public function getValidationLevel(): int { return $this->dto->validationLevel; }

    /**
     * Specifies the level of GS1 data validation.
     * Default value: GS1ValidationLevel::CONTENT.
     *
     * @param int $value The level of GS1 data validation (GS1ValidationLevel).
     */
    public function setValidationLevel(int $value): void {
        if ($value !== GS1ValidationLevel::SYNTAX && $value !== GS1ValidationLevel::CONTENT)
            throw new \InvalidArgumentException('Unknown GS1 validation level');
        $this->dto->validationLevel = $value;
    }
}
