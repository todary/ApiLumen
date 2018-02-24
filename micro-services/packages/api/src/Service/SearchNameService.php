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
 * Class SearchNameService
 * @package tajawal\Api\Service
 */
class SearchNameService implements SearchServiceInterface
{

    /**
     * @var array
     */
    protected $hotels;

    /**
     * @var
     */
    protected $name;



    /**
     * NameService constructor.
     * @param string $filterName
     */
    public function __construct(string $filterName)
    {
        $this->name = $filterName;
    }

    /**
     * @return array
     */
    public function search(): array
    {
        $hotelsCollection = collect($this->hotels);
        $hotelsCollection = $hotelsCollection->where('name',$this->name)->all();
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