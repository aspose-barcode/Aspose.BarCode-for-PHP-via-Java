<?php

namespace Aspose\Barcode\ComplexBarcode;
use Aspose\Barcode\Bridge\GS1ValidationExceptionDTO;
use Aspose\Barcode\Bridge\IComplexCodetextDTO;
use Aspose\Barcode\Bridge\GS1ElementDTO;
use Aspose\Barcode\Common\GS1Element;
use Aspose\Barcode\Common\GS1ValidationResult;
use Aspose\Barcode\Common\GS1ValidationException;
use Aspose\Barcode\Internal\ThriftConnection;

/** GS1 Digital Link URI and its ordered, repeated Application Identifier elements. */
final class GS1DigitalLink extends IComplexCodetext {
    /** @param GS1Element[]|null $elements */
    public function __construct(string $uriStem, ?string $primaryApplicationIdentifier = null, ?array $elements = null) {
        $items = null;
        if ($elements !== null) {
            $items = [];
            foreach ($elements as $element) {
                if (!$element instanceof GS1Element) throw new \InvalidArgumentException('elements must contain GS1Element');
                $items[] = $element->getGS1ElementDto();
            }
        }
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try {
            if($primaryApplicationIdentifier == null)
                $this->setIComplexCodetextDTO($client->GS1DigitalLink_ctor1($uriStem));
            elseif ($items == null)
                $this->setIComplexCodetextDTO($client->GS1DigitalLink_ctor2($uriStem, $primaryApplicationIdentifier));
            else
                $this->setIComplexCodetextDTO($client->GS1DigitalLink_ctor3($uriStem, $primaryApplicationIdentifier, $items));
            $this->initFieldsFromDto();
        } finally { $connection->closeConnection(); }
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

    public static function fromUriStemAndPrimaryApplicationIdentifier(string $uriStem, ?string $primaryAI): self {
        return new self($uriStem, $primaryAI);
    }

    /** @param GS1Element[] $elements */
    public static function fromUriStemPrimaryApplicationIdentifierAndElements(string $uriStem, ?string $primaryAI, array $elements): self {
        return new self($uriStem, $primaryAI, $elements);
    }

    public function getUriStem(): ?string { return $this->getIComplexCodetextDTO()->uriStem; }
    public function getPrimaryApplicationIdentifier(): ?string { return $this->getIComplexCodetextDTO()->primaryApplicationIdentifier; }
    public function getBarcodeType(): int { return $this->getIComplexCodetextDTO()->barcodeType; }

    public function setBarcodeType(int $value): void {
        $this->getIComplexCodetextDTO()->barcodeType = $value;
    }

    public function getCount(): int { return count($this->getIComplexCodetextDTO()->gs1Elements ?? []); }

    /** @return GS1Element[] */
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

    /** Append an AI/value pair to the local ordered DTO collection (no RPC). */
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
        try { return GS1ValidationResult::construct($client->GS1DigitalLink_validate($value)); }
        finally { $connection->closeConnection(); }
    }

    public static function parse(string $value): self {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try { return self::construct($client->GS1DigitalLink_parse($value)); }
        finally { $connection->closeConnection(); }
    }

    public static function tryParse(?string $value): GS1ParseResult {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try { return new GS1ParseResult($client->GS1DigitalLink_tryParse($value), self::class); }
        finally { $connection->closeConnection(); }
    }

    public static function create(string $uriStem, GS1Codetext $codetext, ?string $primaryApplicationIdentifier = null): self {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try {
            return self::construct($client->GS1DigitalLink_create($uriStem, $codetext->getIComplexCodetextDTO(), $primaryApplicationIdentifier));
        } finally { $connection->closeConnection(); }
    }

    public static function createWithUriStemCodetextPrimaryApplicationIdentifier(string $uriStem, GS1Codetext $codetext, string $primaryAI): self {
        return self::create($uriStem, $codetext, $primaryAI);
    }

    public function toGS1Codetext(): GS1Codetext {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try { return GS1Codetext::construct($client->GS1DigitalLink_toGS1Codetext($this->getIComplexCodetextDTO())); }
        finally { $connection->closeConnection(); }
    }

    public function toUriString(): string {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try {
            return $client->GS1DigitalLink_toUriString($this->getIComplexCodetextDTO());
        } catch (GS1ValidationExceptionDTO $ex) {
            throw GS1ValidationException::fromBridgeException($ex);
        } finally { $connection->closeConnection(); }
    }

    public function getConstructedCodetext(): string {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try { return $client->GS1DigitalLink_getConstructedCodetext($this->getIComplexCodetextDTO()); }
        finally { $connection->closeConnection(); }
    }

    public function initFromString(string $constructedCodetext): void {
        $connection = new ThriftConnection();
        $client = $connection->openConnection();
        try {
            $dto = $client->GS1DigitalLink_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext);
            $this->setIComplexCodetextDTO($dto);
        } finally { $connection->closeConnection(); }
    }
}
