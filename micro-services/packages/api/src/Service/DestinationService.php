<?php
/**
 * Created by PhpStorm.
 * User: abanob
 * Date: 2/22/2018
 * Time: 7:17 PM
 */

namespace tajawal\Api\Service;

use tajawal\Api\Service\ServiceInterface;

/**
 * Class DestinationService
 */
class DestinationService implements ServiceInterface
{


    /**
     * @var array
     */
    protected $hotels;

    /**
     * @var
     */
    protected $destination;



    /**
     * DestinationService constructor.
     * @param string $filterDestination
     */
    public function __construct(string $filterDestination)
    {
        $this->destination = $filterDestination;
    }

    /**
     * @return array
     */
    public function search() :array
    {
        $hotelsCollection = collect($this->hotels);
        $hotelsCollection = $hotelsCollection->where('city',$this->destination)->all();
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