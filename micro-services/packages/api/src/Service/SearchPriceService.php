<?php
/**
 * Created by PhpStorm.
 * User: abanob
 * Date: 2/22/2018
 * Time: 7:17 PM
 */

namespace tajawal\Api\Service;

use tajawal\Api\Service\SearchServiceInterface;

/**
 * Class SearchPriceService
 * @package tajawal\Api\Service
 */
class SearchPriceService implements SearchServiceInterface
{


    /**
     * @var array
     */
    protected $hotels;

    /**
     * @var
     */
    protected $min;

    /**
     * @var
     */
    protected $max;

    /**
     * PriceService constructor.
     * @param float $filterMin
     * @param float $filterMax
     */
    public function __construct(float $filterMin,float $filterMax)
    {
        $this->min = $filterMin;
        $this->max = $filterMax;
    }

    /**
     * @return array
     */
    public function search() :array
    {
        $hotelsCollection = collect($this->hotels);
        $hotelsCollection = $hotelsCollection->filter(function ($value, $key) {
            return ($value['price'] >= $this->min && $value['price'] <= $this->max);
        })->all();
        return $hotelsCollection ;
    }

    /**
     * @param array $hotels
     */
    public function setHotels($hotels)
    {
        $this->hotels = $hotels;
    }
}