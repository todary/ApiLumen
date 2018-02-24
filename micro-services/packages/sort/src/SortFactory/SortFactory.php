<?php

namespace tajawal\Sort\SortFactory;
use   tajawal\Sort\SortFactory\FactoryMethod;
use tajawal\Sort\Sort\NameSort;
use tajawal\Sort\Sort\PriceSort;

/**
 * Class SortFactory
 * @package App\Src\SortFactory
 */
class SortFactory extends FactoryMethod
{
    /**
     * @param string $type
     * @param array $data
     * @return NameSort|PriceSort
     */
    protected function createRequest(string $type, array $data)
    {

        switch ($type) {
            case 'name':
                $object = new NameSort($data);
                return $object;
            case 'price':
                $object = new PriceSort($data);
                return $object;
            default:
                throw new \InvalidArgumentException("$type is not a valid Transport");
        }
    }
}