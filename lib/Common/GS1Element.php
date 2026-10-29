<?php
namespace Aspose\Barcode\Common;

use Aspose\Barcode\Bridge\GS1ElementDTO;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Represents one immutable GS1 Application Identifier and value pair.
 */
final class GS1Element {
    private $dto;

    /**
     * Creates a GS1 Application Identifier and value pair.
     *
     * @param string $applicationIdentifier Exact Application Identifier.
     * @param string $value Value associated with the Application Identifier.
     */
    public function __construct(string $applicationIdentifier, string $value) {
        // Pure DTO initialization: creating a value object does not require an RPC.
        $dto = new GS1ElementDTO();
        $dto->applicationIdentifier = $applicationIdentifier;
        $dto->value = $value;
        $this->dto = $dto;
    }

    /** Wrap an already-validated DTO without a redundant transport call. */
    public static function construct(?GS1ElementDTO $dto): ?self {
        if ($dto === null) return null;
        $reflection = new \ReflectionClass(self::class);
        $obj = $reflection->newInstanceWithoutConstructor();
        $obj->dto = $dto;
        return $obj;
    }

    /**
     * Gets the exact GS1 Application Identifier.
     *
     * @return string|null The exact GS1 Application Identifier.
     */
    public function getApplicationIdentifier(): ?string { return $this->dto->applicationIdentifier; }
    /**
     * Gets the validated value associated with the Application Identifier.
     *
     * @return string|null The validated value associated with the Application Identifier.
     */
    public function getValue(): ?string { return $this->dto->value; }
    public function getGS1ElementDto(): GS1ElementDTO { return $this->dto; }

    /**
     * Validates a value for an exact GS1 Application Identifier.
     *
     * @param string $applicationIdentifier Exact Application Identifier.
     * @param string $value Value to validate.
     * @return GS1ValidationResult Structured validation result.
     * @throws \TypeError If applicationIdentifier or value is null.
     */
    public static function validate(string $applicationIdentifier, string $value): GS1ValidationResult {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try {
            return GS1ValidationResult::construct($client->GS1Element_validate($applicationIdentifier, $value));
        } finally { $connection->closeConnection(); }
    }
}