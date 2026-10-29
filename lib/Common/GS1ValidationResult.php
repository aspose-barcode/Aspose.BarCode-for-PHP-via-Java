<?php
namespace Aspose\Barcode\Common;

use Aspose\Barcode\Bridge\GS1ValidationResultDTO;

/**
 * Contains all independently detectable errors for a GS1 element string,
 * Digital Link URI or one AI value.
 */
final class GS1ValidationResult {
    private $dto;

    public function __construct(GS1ValidationResultDTO $dto) { $this->dto = $dto; }

    public static function construct(?GS1ValidationResultDTO $dto): ?self {
        return $dto === null ? null : new self($dto);
    }

    /**
     * Gets a value indicating whether validation completed without errors.
     *
     * @return bool True if validation completed without errors.
     */
    public function isValid(): bool { return $this->dto->valid; }

    /**
     * Gets validation errors in deterministic order.
     *
     * @return GS1ValidationIssue[] Validation errors in deterministic order.
     */
    public function getIssues(): array {
        $issues = [];
        foreach (($this->dto->issues ?? []) as $issue)
            if ($issue !== null) $issues[] = GS1ValidationIssue::construct($issue);
        return $issues;
    }

    public function getGS1ValidationResultDto(): GS1ValidationResultDTO { return $this->dto; }
}
