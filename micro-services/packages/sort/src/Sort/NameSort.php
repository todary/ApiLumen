<?php

namespace tajawal\Sort\Sort;


class NameSort implements SortInterface
{
    /**
     * @var array
     */
    protected $data;

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
        $hotelsCollection = $hotelsCollection->sortBy('name')->all();
        return $hotelsCollection ;

    }


}