<?php

namespace tajawal\Sort\Sort;

class PriceSort implements SortInterface
{

    /**
     * @var array
     */
    protected $data;


    /**
     * @var array
     */
    protected $price;

    /**
     * SortInterface constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function sort(): array
    {
        $hotelsCollection = collect($this->data);
        $hotelsCollection = $hotelsCollection->sortBy('price')->all();
        return $hotelsCollection ;
    }
}