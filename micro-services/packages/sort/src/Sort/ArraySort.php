<?php

namespace tajawal\Sort\Sort;


class ArraySort implements SortInterface
{

    /**
     * @param string $field
     * @param array $data
     * @param $order
     * @return array
     */
    public function sort(string $field, array $data, $order): array
    {
        $hotelsCollection = collect($data);
        if ($order) {
            $hotelsCollection = $hotelsCollection->sortBy($field)->all();
        } else {
            $hotelsCollection = $hotelsCollection->sortByDesc($field)->all();
        }
        return $hotelsCollection;
    }


}