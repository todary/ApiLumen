<?php

namespace tajawal\Sort\Sort;


/**
 * Interface SortInterface
 * @package tajawal\Sort\Sort
 */
interface SortInterface
{


    /**
     * @param string $field
     * @param array $data
     * @param $order
     * @return mixed
     */
    public function sort(string $field,array $data, $order);
}