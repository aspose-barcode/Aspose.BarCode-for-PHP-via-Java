<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\PaddingDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Paddings parameters.
 */
class Padding implements Communicator
{
    private $paddingDto;

    function getPaddingDto(): PaddingDTO
    {
        return $this->paddingDto;
    }

    private function setPaddingDto(PaddingDTO $paddingDto): void
    {
        $this->paddingDto = $paddingDto;
    }

    private $top;
    private $bottom;
    private $right;
    private $left;

    function __construct(PaddingDTO $paddingDto)
    {
        $this->paddingDto = $paddingDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
        $this->top = new Unit($this->getPaddingDto()->top);
        $this->bottom = new Unit($this->getPaddingDto()->bottom);
        $this->right = new Unit($this->getPaddingDto()->right);
        $this->left = new Unit($this->getPaddingDto()->left);
    }

    /**
     * Top padding.
     */
    public function getTop(): Unit
    {
        return $this->top;
    }

    /**
     * Top padding.
     */
    public function setTop(Unit $value): void
    {
        try
        {
            $this->getPaddingDto()->top = $value->getUnitDto();
            $this->top = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Bottom padding.
     */
    public function getBottom(): Unit
    {
        return $this->bottom;
    }

    /**
     * Bottom padding.
     */
    public function setBottom(Unit $value): void
    {
        try
        {
            $this->getPaddingDto()->bottom = $value->getUnitDto();
            $this->bottom = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Right padding.
     */
    public function getRight(): Unit
    {
        return $this->right;
    }

    /**
     * Right padding.
     */
    public function setRight(Unit $value): void
    {
        try
        {
            $this->getPaddingDto()->right = $value->getUnitDto();
            $this->right = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Left padding.
     */
    public function getLeft(): Unit
    {
        return $this->left;
    }

    /**
     * Left padding.
     */
    public function setLeft(Unit $value): void
    {
        try
        {
            $this->getPaddingDto()->left = $value->getUnitDto();
            $this->left = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this Padding.
     *
     * @return string A string that represents this Padding.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->Padding_toString($this->getPaddingDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}