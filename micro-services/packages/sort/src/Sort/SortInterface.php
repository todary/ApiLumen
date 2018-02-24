<?php

namespace tajawal\Sort\Sort;


/**
 * Interface SortInterface
 * @package tajawal\Sort\Sort
 */
interface SortInterface
{
    /**
     * SortInterface constructor.
     * @param array $data
     */
    public function __construct(array  $data);
    /**
     * @return array
     */
    public function sort();
}