<?php
namespace Aspose\Barcode\Common;

use Aspose\Barcode\Bridge\GS1ValidationExceptionDTO;
use Aspose\Barcode\Bridge\GS1ValidationIssueDTO;
use Aspose\Barcode\Bridge\GS1ValidationResultDTO;
use Aspose\Barcode\Internal\BarcodeException;

/**
 * The exception that is thrown by strict GS1 operations when validation fails.
 */
class GS1ValidationException extends BarcodeException {
    private $validationResult;

    /**
     * Creates an exception from one GS1 validation issue or a complete validation result.
     *
     * @param int|GS1ValidationResult $errorOrResult Machine-readable validation error code or structured validation result.
     * @param string|null $applicationIdentifier Application Identifier, if known.
     * @param string|null $validationMessage Human-readable validation message.
     */
    public function __construct($errorOrResult, ?string $applicationIdentifier = null, ?string $validationMessage = null) {
        if ($errorOrResult instanceof GS1ValidationResult) {
            $this->validationResult = $errorOrResult;
            $message = $validationMessage ?? 'GS1 validation failed';
        } else {
            $issue = new GS1ValidationIssueDTO();
            $issue->code = (int)$errorOrResult;
            $issue->applicationIdentifier = $applicationIdentifier;
            $issue->message = $validationMessage ?? 'GS1 validation failed';
            $dto = new GS1ValidationResultDTO();
            $dto->valid = false;
            $dto->issues = [$issue];
            $this->validationResult = new GS1ValidationResult($dto);
            $message = $issue->message;
        }
        parent::__construct($message, __FILE__, __LINE__);
    }

    /**
     * Creates an exception containing a structured GS1 validation result.
     *
     * @param GS1ValidationResult $result Structured validation result.
     * @return GS1ValidationException A validation exception.
     */
    public static function fromValidationResult(GS1ValidationResult $result): self {
        return new self($result);
    }

    public static function fromBridgeException(GS1ValidationExceptionDTO $error): self {
        $result = GS1ValidationResult::construct($error->validationResult);
        if ($result === null) {
            $dto = new GS1ValidationResultDTO();
            $dto->valid = false;
            $dto->issues = [];
            $result = new GS1ValidationResult($dto);
        }
        return new self($result, null, $error->message);
    }

    /**
     * Gets all validation errors detected for the attempted operation,
     * including their machine-readable codes.
     *
     * @return GS1ValidationResult All validation errors for the attempted operation.
     */
    public function getValidationResult(): GS1ValidationResult { return $this->validationResult; }
}
