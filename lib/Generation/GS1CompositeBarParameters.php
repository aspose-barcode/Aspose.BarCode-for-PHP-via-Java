<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\GS1CompositeBarParametersDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * GS1 Composite bar parameters.
 */
class GS1CompositeBarParameters implements Communicator
{
    private $gs1CompositeBarParametersDto;

    function getGS1CompositeBarParametersDto(): GS1CompositeBarParametersDTO
    {
        return $this->gs1CompositeBarParametersDto;
    }

    private function setGS1CompositeBarParametersDto(GS1CompositeBarParametersDTO $gs1CompositeBarParametersDto): void
    {
        $this->gs1CompositeBarParametersDto = $gs1CompositeBarParametersDto;
    }

    function __construct(GS1CompositeBarParametersDTO $gs1CompositeBarParametersDto)
    {
        $this->gs1CompositeBarParametersDto = $gs1CompositeBarParametersDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
    }

    /**
     * Linear component type: GS1Code128, UPCE, EAN8, UPCA, EAN13, DatabarStacked, DatabarStackedOmniDirectional, DatabarLimited, DatabarOmniDirectional, DatabarExpanded, DatabarExpandedStacked
     */
    public function getLinearComponentType(): int
    {
        return $this->getGS1CompositeBarParametersDto()->linearComponentType;
    }

    /**
     * Linear component type: GS1Code128, UPCE, EAN8, UPCA, EAN13, DatabarStacked, DatabarStackedOmniDirectional, DatabarLimited, DatabarOmniDirectional, DatabarExpanded, DatabarExpandedStacked
     */
    public function setLinearComponentType(int $value): void
    {
        $this->getGS1CompositeBarParametersDto()->linearComponentType = $value;
    }

    /**
     * 2D component type
     */
    public function getTwoDComponentType(): int
    {
        return $this->getGS1CompositeBarParametersDto()->twoDComponentType;
    }

    /**
     * 2D component type
     */
    public function setTwoDComponentType(int $value): void
    {
        $this->getGS1CompositeBarParametersDto()->twoDComponentType = $value;
    }

    /**
     * <p>
     * If this flag is set, it allows only GS1 encoding standard for GS1CompositeBar 2D Component
     * </p>
     */
    public function isAllowOnlyGS1Encoding(): bool
    {
        return $this->getGS1CompositeBarParametersDto()->isAllowOnlyGS1Encoding;
    }

    /**
     * <p>
     * If this flag is set, it allows only GS1 encoding standard for GS1CompositeBar 2D Component
     * </p>
     */
    public function setAllowOnlyGS1Encoding(bool $value): void
    {
        $this->getGS1CompositeBarParametersDto()->isAllowOnlyGS1Encoding = $value;
    }

    /**
     * Returns a human-readable string representation of this <see cref="DataBarParameters"/>.
     * @return string that represents this <see cref="DataBarParameters"/>
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->GS1CompositeBarParameters_toString($this->getGS1CompositeBarParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}