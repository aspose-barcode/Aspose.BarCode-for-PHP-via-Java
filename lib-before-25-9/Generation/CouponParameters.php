<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\CouponParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;
use Aspose\Barcode\Generation\Unit;

/**
 * Coupon parameters. Used for UpcaGs1DatabarCoupon, UpcaGs1Code128Coupon.
 */
class CouponParameters implements Communicator
{
    private $couponParametersDto;

    private function getCouponParametersDto(): CouponParametersDTO
    {
        return $this->couponParametersDto;
    }

    private function setCouponParametersDto(CouponParametersDTO $couponParametersDto): void
    {
        $this->couponParametersDto = $couponParametersDto;
    }

    private $_space;

    function __construct(CouponParametersDTO $couponParametersDto)
    {
        $this->couponParametersDto = $couponParametersDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
        try
        {
            $this->_space = new Unit($this->getCouponParametersDto()->supplementSpace);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Space between main the BarCode and supplement BarCode in Unit value.
     *
     * @exception IllegalArgumentException
     * The Space parameter value is less than 0.
     */
    public function getSupplementSpace(): Unit
    {
        return $this->_space;
    }

    /**
     * Space between main the BarCode and supplement BarCode in Unit value.
     *
     * @exception IllegalArgumentException
     * The Space parameter value is less than 0.
     */
    public function setSupplementSpace(Unit $value): void
    {
        try
        {
            $this->getCouponParametersDto()->supplementSpace = $value->getUnitDto();
            $this->_space = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this CouponParameters.
     *
     * @return string that represents this CouponParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->CouponParameters_toString($this->getCouponParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}