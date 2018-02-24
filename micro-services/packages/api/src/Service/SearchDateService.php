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
 * Class SearchDateService
 * @package tajawal\Api\Service
 */
class SearchDateService implements SearchServiceInterface
{

    /**
     * @var array
     */
    protected $hotels;

    /**
     * @var
     */
    protected $from;

    /**
     * @var
     */
    protected $to;

    /**
     * DateService constructor.
     * @param string $from
     * @param string $to
     */
    public function __construct(string $from, string $to)
    {
        $this->from = strtotime($from);
        $this->to = strtotime($to);
    }

    /**
     * @return array
     */
    public function search(): array
    {
        $hotelsCollection = collect($this->hotels);
        $hotelsCollection = $hotelsCollection->filter(function ($value, $key) {
            $availability = $value['availability'];
            if (count($availability) && is_array($availability)) {
                return collect($availability)->filter(function ($value2, $key2) {
                    return (
                        $this->from >= strtotime($value2['from']) &&
                        $this->from <= strtotime($value2['to']) &&
                        $this->to >= strtotime($value2['from'])  &&
                        $this->to <= strtotime($value2['to'])
                    );
                })->toArray();


            }
        })->all();

        return $hotelsCollection;

    }

    /**
     * @param array $hotels
     */
    public function setHotels($hotels)
    {
        $this->hotels = $hotels;
    }
}