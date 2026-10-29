<?php

namespace Aspose\Barcode\ComplexBarcode;
use Aspose\Barcode\Bridge\IComplexCodetextDTO;
use Aspose\Barcode\Bridge\GS1ElementDTO;
use Aspose\Barcode\Generation\EncodeTypes;
use Aspose\Barcode\Common\GS1Element;
use Aspose\Barcode\Common\GS1ValidationResult;
use Aspose\Barcode\Internal\ThriftConnection;

/** Ordered GS1 Application Identifier elements, including repeated identifiers. */
final class GS1Codetext extends IComplexCodetext {
    public function __construct() {
        // The Java default is GS_1_CODE_128. Initialize the DTO without Thrift.
        $dto = new IComplexCodetextDTO();
        $dto->complexCodetextType = 11; // ComplexCodetextType::GS1Codetext
        $dto->barcodeType = EncodeTypes::GS_1_CODE_128;
        $dto->gs1Elements = [];
        $this->setIComplexCodetextDTO($dto);
        $this->initFieldsFromDto();
    }

    public static function construct(?IComplexCodetextDTO $dto): ?self {
        if ($dto === null) return null;
        $reflection = new \ReflectionClass(self::class);
        $obj = $reflection->newInstanceWithoutConstructor();
        $obj->setIComplexCodetextDTO($dto);
        $obj->initFieldsFromDto();
        return $obj;
    }

    public function obtainDto(...$args) { return $this->getIComplexCodetextDTO(); }
    public function initFieldsFromDto() { }

    /** Alias retained for the generated Java API namesake. */
    public function getBarcodeType_Rename_Namesake(): int { return $this->getBarcodeType(); }
    public function getBarcodeType(): int { return $this->getIComplexCodetextDTO()->barcodeType; }

    public function setBarcodeType(int $value): void {
        $this->getIComplexCodetextDTO()->barcodeType = $value;
    }

    public function getCount(): int { return count($this->getIComplexCodetextDTO()->gs1Elements ?? []); }

    /** @return GS1Element[] Preserves source order and duplicate AIs. */
    public function getElements(): array {
        $output = [];
        foreach (($this->getIComplexCodetextDTO()->gs1Elements ?? []) as $item)
            $output[] = GS1Element::construct($item);
        return $output;
    }

    public function get_Item(int $index): GS1Element {
        $items = $this->getIComplexCodetextDTO()->gs1Elements ?? [];
        if ($index < 0 || $index >= count($items)) throw new \OutOfRangeException('GS1 element index out of range');
        return GS1Element::construct($items[$index]);
    }

    public function getFirst(string $applicationIdentifier): ?string {
        foreach ($this->getElements() as $element)
            if ($element->getApplicationIdentifier() === $applicationIdentifier) return $element->getValue();
        return null;
    }

    /** @return string[] */
    public function getAll(string $applicationIdentifier): array {
        $values = [];
        foreach ($this->getElements() as $element)
            if ($element->getApplicationIdentifier() === $applicationIdentifier) $values[] = $element->getValue();
        return $values;
    }

    /**
     * Append a value pair to the local ordered DTO list; no Java/Thrift call.
     * Complete GS1 rule validation is performed by Java business operations
     * (for example, validate/parse/format/generate), not by this setter.
     */
    public function add(string $applicationIdentifier, string $value): void {
        $element = new GS1ElementDTO();
        $element->applicationIdentifier = $applicationIdentifier;
        $element->value = $value;
        $dto = $this->getIComplexCodetextDTO();
        if ($dto->gs1Elements === null) $dto->gs1Elements = [];
        $dto->gs1Elements[] = $element;
    }

    public static function validate(string $value): GS1ValidationResult {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try {
            return GS1ValidationResult::construct($client->GS1Codetext_validate($value));
        } finally { $connection->closeConnection(); }
    }

    public static function parse(string $value): self {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try { return self::construct($client->GS1Codetext_parse($value)); }
        finally { $connection->closeConnection(); }
    }

    /** No PHP reference arguments: success, value, validation are returned together. */
    public static function tryParse(?string $value): GS1ParseResult {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try { return new GS1ParseResult($client->GS1Codetext_tryParse($value), self::class); }
        finally { $connection->closeConnection(); }
    }

    public function getConstructedCodetext(): string {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try { return $client->GS1Codetext_getConstructedCodetext($this->getIComplexCodetextDTO()); }
        finally { $connection->closeConnection(); }
    }

    public function initFromString(string $constructedCodetext): void {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try {
            $dto = $client->GS1Codetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext);
            $this->setIComplexCodetextDTO($dto);
        } finally { $connection->closeConnection(); }
    }
}
