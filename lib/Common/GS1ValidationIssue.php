<?php
namespace Aspose\Barcode\Common;

use Aspose\Barcode\Bridge\GS1ValidationIssueDTO;

/**
 * Describes one GS1 validation error.
 */
final class GS1ValidationIssue {
    private $dto;

    public function __construct(GS1ValidationIssueDTO $dto) { $this->dto = $dto; }

    public static function construct(?GS1ValidationIssueDTO $dto): ?self {
        return $dto === null ? null : new self($dto);
    }

    /**
     * Gets a stable machine-readable error code.
     *
     * @return int A stable machine-readable error code (GS1ValidationErrorCode).
     */
    public function getCode(): int { return $this->dto->code; }
    /**
     * Gets the Application Identifier related to the error, or null when the
     * Application Identifier could not be determined from the input.
     *
     * @return string|null The related Application Identifier, or null.
     */
    public function getApplicationIdentifier(): ?string { return $this->dto->applicationIdentifier; }
    /**
     * Gets the human-readable error message.
     *
     * @return string|null The human-readable error message.
     */
    public function getMessage(): ?string { return $this->dto->message; }
    public function getGS1ValidationIssueDto(): GS1ValidationIssueDTO { return $this->dto; }
}
