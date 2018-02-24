<?php
/**
 * Created by PhpStorm.
 * User: abanob
 * Date: 2/23/2018
 * Time: 7:10 PM
 */


namespace tajawal\Api\ServiceFactory;

use tajawal\Api\Service\NameService;
use tajawal\Api\Service\DestinationService;
use tajawal\Api\Service\PriceService;
use tajawal\Api\Service\DateService;


/**
 * Class ServiceFactory
 * @package Src\ServiceFactory
 */
class ServiceFactory extends FactoryMethod
{
    /**
     * @param string $type
     * @param array $data
     * @param array $filter
     * @return DisCount
     */
    protected function createRequest(string $path, string $method, array $headers, $data)
    {

        switch ($path) {
            case 'tajawal/name':
                $object = new NameService($data['name']);
                return $object;
            case 'tajawal/destination':
                $object = new DestinationService($data['city']);
                return $object;
            case 'tajawal/price':
                $object = new PriceService($data['min'], $data['max']);
                return $object;
            case 'tajawal/date':
                $object = new DateService($data['from'], $data['to']);
                return $object;
            default:
                throw new \InvalidArgumentException("$path is not a valid Transport");
        }
    }
}